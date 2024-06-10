<?php

namespace App\Http\Controllers\Admin;

use App\Http\Components\Paginator;
use App\Http\Controllers\BaseController;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Jobs\SendFirebaseNotification;
use App\Models\Message;
use App\Models\Student;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MessageController extends BaseController
{
    public function index(Request $request)
    {
        $query = $this->findResource();

        $allowedSort = ['id'];
        $messages = Paginator::sort($request, $query, $allowedSort, 'desc')->paginate(100);
        $data = [
            'messages' => MessageResource::collection($messages),
            'pagination' => Paginator::paginate($messages)
        ];

        return $this->sendResponse($data);
    }

    public function show(int $id)
    {
        $messages = $this->findResource($id);

        $data = MessageResource::collection($messages);

        return $this->sendResponse($data);
    }

    public function store(MessageRequest $request)
    {
        $user = auth()->user();
        $school = $user->getSchool();
        $validated = $request->validated();
        $validated['school_id'] = $school->id;
        $validated['user_id'] = $user->id;
        //$validated['student_id'] = $student->id;
        $validated['ip'] = $request->getClientIp();
        $validated['type'] = Message::TYPE_SCHOOL;

        $student = Student::where(['id' => $validated['student_id']])->firstOrFail();

        $message = Message::create($validated);

        if ($message) {
            // send notification
            $n = new UserNotification();
            $n->sender_id = $user->id;
            $n->user_id = $student->parent_id;
            $n->title = __('New message from school');
            $n->description = __(':name sent a new message', ['name' => __('School')]);
            $n->page = 'messagesschool';
            $n->page_id = $message->id;
            $n->save();

            dispatch(new SendFirebaseNotification($n));
        }

        return $this->sendResponse($message ? new MessageResource($message) : null);
    }

    public function destroy(int $id)
    {
        $item = $this->findResource($id);

        try {
            $item->delete();
            Log::channel('db')->info('message deleted', ['id' => $item->id]);

            return $this->sendResponse(__('Deleted'), __('Deleted successfully'));
        } catch (\Exception $e) {
            return $this->sendError(__('Delete failed'), $e->getMessage());
        }
    }

    private function findResource($id = null)
    {
        $user = auth()->user();
        $schools = $user->getSchoolIds();
        $sent = \request()->get('sent');
        $requestedType = \request()->get('type');
        $type = ($requestedType && in_array($requestedType, array_values(Message::TYPES))) ? $requestedType : Message::TYPE_SCHOOL;

      /*  $users = User::whereHas('allSchools', function ($query) use ($schools) {
                $query->whereIn('school_id', $schools)
                    ->where(function ($query) {
                        $query->where('role', User::ROLE_TEACHER)
                        ->orWhere('role', User::ROLE_PARENT);
                     });
        });
        $userIds = $users->pluck('id');*/

        if ($id) {
            $message = Message::where('id', $id)->whereIn('school_id', $schools)
                ->where(['type' => $type])
                ->firstOrFail();

            $resource = Message::where('student_id', $message->student_id)
                ->where(['type' => $type])
                ->with('user')
                ->with('student')
                ->with('student.parent')
                ->take(100)->get();
        } else {
            $resource = Message::whereIn('school_id', $schools)
                ->with('user')
                ->with('student')
                ->with('student.parent')
                ->whereHas('user', function($query) use ($sent) {
                    if ($sent)
                        $query->where('role', '>=', User::ROLE_MANAGER);
                    else
                        $query->where('role', '<', User::ROLE_MANAGER);
                })
                ->where(['type' => $type]);
        }

        return $resource;
    }
}
