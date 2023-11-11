<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserNotificationResource;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NotificationController extends BaseController
{

    public function index(Request $request)
    {
        $user = $this->getUser();

        $type = $request->get('type');

        $items = UserNotification::where('user_id', $user->id);

        if ($type && $type == UserNotification::TYPE_UNREAD)
            $items = $items->whereNull('read_at');

        $items = $items->orderByDesc('id')->take(20)->get();

        $unreadCount = UserNotification::where('user_id', $user->id)
            ->whereNull('read_at')
            ->count();

        $data = [
            'notifications' => UserNotificationResource::collection($items),
            'unread_count' => $unreadCount,
        ];
        return $this->sendResponse($data);
    }

    public function read(Request $request)
    {
        $user = $this->getUser();

        UserNotification::where('user_id', $user->id)
            ->whereNull('read_at')
            ->update(['read_at' => Carbon::now()]);

        return $this->sendResponse(true);
    }
}
