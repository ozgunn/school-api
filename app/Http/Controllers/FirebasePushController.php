<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Laravel\Firebase\Facades\Firebase;

class FirebasePushController extends Controller
{
    private \Kreait\Firebase\Contract\Messaging $notification;

    public function __construct()
    {
        $this->notification = Firebase::messaging();
    }

    public function setToken(Request $request)
    {
        $token = $request->input('fcm_token');
        $request->user()->update([
            'fcm_token' => $token
        ]);
        return response()->json([
            'message' => 'Successfully Updated FCM Token'
        ]);
    }

    public function notification(Request $request)
    {
        $FcmToken = auth()->user()->fcm_token;
        $title = $request->input('title', 'test');
        $body = $request->input('body', 'test body');

        $data = [
            'page' => 'kaptanyuva://daily'
        ];

        $message = CloudMessage::fromArray([
            'token' => $FcmToken,
            'notification' => [
                'title' => $title,
                'body' => $body,
            ],
            'data' => $data,
        ]);

        $result = $this->notification->send($message);
        if(isset($result['name'])) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json($result);
        }

    }

}
