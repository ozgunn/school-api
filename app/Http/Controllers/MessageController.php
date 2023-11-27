<?php

namespace App\Http\Controllers;

use App\Http\Components\Paginator;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Http\Services\NotificationService;
use App\Jobs\SendFirebaseNotification;
use App\Models\Message;
use App\Models\Student;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

class MessageController extends BaseController
{
    /**
     * List school messages
     */
    public function school(Request $request)
    {
        $user = auth()->user();
        if ($user->role != User::ROLE_PARENT)
            abort(404);

        $student = $user->getParentsStudent();

        $query = Message::where(['school_id' => $student->school_id, 'student_id' => $student->id]);

        $allowedSort = ['id'];
        $messages = Paginator::sort($request, $query, $allowedSort, 'desc')->paginate(config('app.defaults.pageSize'));

        $data = [
            'messages' => MessageResource::collection($messages),
            'pagination' => Paginator::paginate($messages)
        ];

        return $this->sendResponse($data);
    }

    /**
     * List teacher messages
     */
    public function teacher(Request $request)
    {
        $user = auth()->user();
        if ($user->role != User::ROLE_PARENT)
            abort(404);

        $student = $user->getParentsStudent();

        $teacher_id = $student->class->teacher_id;

        $query = Message::where(['teacher_id' => $teacher_id, 'student_id' => $student->id]);

        $allowedSort = ['id'];
        $messages = Paginator::sort($request, $query, $allowedSort, 'desc')->paginate(config('app.defaults.pageSize'));

        $data = [
            'messages' => MessageResource::collection($messages),
            'pagination' => Paginator::paginate($messages)
        ];

        return $this->sendResponse($data);
    }

    public function teacherStore(MessageRequest $request)
    {
        $user = auth()->user();
        if ($user->role != User::ROLE_PARENT)
            abort(404);

        $student = $user->getParentsStudent();
        $teacher_id = $student->class->teacher_id;

        $validated = $request->validated();

        $validated['teacher_id'] = $teacher_id;

        $validated['user_id'] = $user->id;
        $validated['student_id'] = $student->id;
        $validated['ip'] = $request->getClientIp();
        $validated['type'] = Message::TYPE_TEACHER;

        $message = Message::create($validated);

        if ($message) {
            // send notification
            $n = new UserNotification();
            $n->sender_id = $user->id;
            $n->user_id = $teacher_id;
            $n->title = __('New message from student');
            $n->description = __(':name sent a new message', ['name' => $student->name]);
            $n->page = 'messages/students';
            $n->page_id = $student->id;
            $n->save();

            dispatch(new SendFirebaseNotification($n));
        }

        return $this->sendResponse($message ? new MessageResource($message) : null);
    }

    public function schoolStore(MessageRequest $request)
    {
        $user = auth()->user();
        if ($user->role != User::ROLE_PARENT)
            abort(404);

        $student = $user->getParentsStudent();
        $school_id = $student->school_id;

        $validated = $request->validated();
        $validated['school_id'] = $school_id;

        $validated['user_id'] = $user->id;
        $validated['student_id'] = $student->id;
        $validated['ip'] = $request->getClientIp();
        $validated['type'] = Message::TYPE_SCHOOL;

        $message = Message::create($validated);

        return $this->sendResponse($message ? new MessageResource($message) : null);
    }

    public function allMessages(Request $request)
    {
        // TODO: ileride yapılabilir
        return $this->sendResponse(null);
        $user = auth()->user();
        if ($user->role != User::ROLE_TEACHER)
            abort(404);

        $query = Message::select('student_id')
            ->selectRaw('MAX(created_at) AS last_created_at')
            ->selectRaw('(SELECT read_at
                FROM messages AS m2
                WHERE m2.student_id = messages.student_id
                ORDER BY created_at DESC
                LIMIT 1) AS last_read_at')
            ->where(function ($query) {
                $query->where('user_id', 2)
                    ->orWhere('teacher_id', 2);
            })
            ->orderByDesc('id')
            ->groupBy('student_id')
            ->with('student')
            ->with('user');

        $allowedSort = ['id'];
        $messages = Paginator::sort($request, $query, $allowedSort, 'desc')->paginate(config('app.defaults.pageSize'));

        $data = [
            'messages' => MessageResource::collection($query->get()),
            'pagination' => Paginator::paginate($messages)
        ];

        return $this->sendResponse($data);
    }

    public function student(Request $request, int $id)
    {
        $user = auth()->user();
        if ($user->role != User::ROLE_TEACHER)
            abort(404);

        $student = Student::where(['id' => $id, 'class_id' => $user->teachersClass->id])->firstOrFail();

        $query = Message::where(['teacher_id' => $user->id, 'student_id' => $student->id]);

        $allowedSort = ['id'];
        $messages = Paginator::sort($request, $query, $allowedSort, 'desc')->paginate(config('app.defaults.pageSize'));

        $data = [
            'messages' => MessageResource::collection($messages),
            'pagination' => Paginator::paginate($messages)
        ];

        return $this->sendResponse($data);
    }

    public function studentStore(MessageRequest $request, int $id)
    {
        /** @var User $user */
        $user = auth()->user();

        if ($user->role != User::ROLE_TEACHER)
            abort(404);

        $student = Student::where(['id' => $id, 'class_id' => $user->teachersClass->id])->firstOrFail();

        $validated = $request->validated();
        $validated['teacher_id'] = $user->id;
        $validated['user_id'] = $user->id;
        $validated['student_id'] = $student->id;
        $validated['ip'] = $request->getClientIp();
        $validated['type'] = Message::TYPE_TEACHER;

        $message = Message::create($validated);

        if ($message) {
            // send notification
            $n = new UserNotification();
            $n->sender_id = $user->id;
            $n->user_id = $student->id;
            $n->title = __('New message from teacher');
            $n->description = __('Click for detail');
            $n->page = 'messages/teacher';
            $n->save();

            dispatch(new SendFirebaseNotification($n));
        }

        return $this->sendResponse($message ? new MessageResource($message) : null);
    }

}
