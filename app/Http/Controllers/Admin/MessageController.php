<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends BaseController
{
    public function index(Request $request)
    {
        abort(404);
        $type = $request->get('type');
        $reports = $this->findResource(null, $type);

        $data = MessageResource::collection($reports);

        return $this->sendResponse($data);
    }

    public function show(int $id)
    {
        abort(404);
        $report = $this->findResource($id);

        $data = new MessageResource($report);

        return $this->sendResponse($data);
    }

    public function destroy(int $id)
    {
        abort(404);
        $item = $this->findResource($id);

        try {
            $item->delete();
            Log::channel('db')->info('daily deleted', ['id' => $item->id]);

            return $this->sendResponse(__('Deleted'), __('Deleted successfully'));
        } catch (\Exception $e) {
            return $this->sendError(__('Delete failed'), $e->getMessage());
        }    }

    /** type: 1: sent box, 0|null: inbox */
    private function findResource($id = null, $sent = false)
    {
        $user = auth()->user();
        $schools = $user->getSchoolIds();

      /*  $users = User::whereHas('allSchools', function ($query) use ($schools) {
                $query->whereIn('school_id', $schools)
                    ->where(function ($query) {
                        $query->where('role', User::ROLE_TEACHER)
                        ->orWhere('role', User::ROLE_PARENT);
                     });
        });
        $userIds = $users->pluck('id');*/

        if ($id) {
/*            $resource = Message::where('id', $id)
                ->with('user')
                ->whereIn('user_id', $userIds)
                ->firstOrFail();*/
            $resource = Message::where('id', $id)
                ->with('user')
                ->whereIn('school_id', $schools)
                ->when($type, function ($query) use ($type) {
                    return $query->where('type', $type);
                })
                ->firstOrFail();
        } else {
/*            $resource = Message::whereIn('user_id', $userIds)
                ->with('user')
                ->orderByDesc('id')
                ->take(100)->get();*/
            $resource = Message::whereIn('school_id', $schools)
                ->where('user_id', $user->id)
                ->with('user')
                ->when($sent, function ($query) use ($user) {
                    return $query->where('user_id', $user->id);
                })
                ->orderByDesc('id')
                ->take(100)->get();
        }

        return $resource;
    }
}
