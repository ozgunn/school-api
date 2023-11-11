<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserNotificationResource;
use App\Models\UserNotification;
use Illuminate\Http\Request;

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

        return $this->sendResponse(UserNotificationResource::collection($items ?? []));
    }
}
