<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\UserDevice;
use App\Models\UserNotification;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Laravel\Firebase\Facades\Firebase;

class SendFirebaseNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private UserNotification $notification;

    /**
     * Create a new job instance.
     */
    public function __construct(UserNotification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = [
            'page' => config('app.app_prefix') . $this->notification->page,
        ];
        $message = [
            //'token' => $userDevice->token,
            'notification' => [
                'title' => $this->notification->title,
                'body' => $this->notification->description,
            ],
            'data' => $data,
        ];

        $user = $this->notification->user;
        $service = Firebase::messaging();

        foreach ($user->devices as $userDevice) {
            // TODO: Spam öncelemek için son gönderilen notification'un tarihine bakılıp,
            //  üzerinden belli bir süre geçmemişse gönderilmemesi sağlanabilir.
            if ($userDevice->status == UserDevice::STATUS_OPEN) {
                $message['token'] = $userDevice->token;

                $result = $service->send(CloudMessage::fromArray($message));

                if(isset($result['name'])) {
                    Log::info('push notification sent', ['user' => $user->id, 'title' => $this->notification->title, 'result' => $result['name']]);
                    $this->notification->sent_at = Carbon::now();
                    $this->notification->update();
                } else {
                    Log::error('push notification sent failed', ['user' => $user->id, 'title' => $this->notification->title, 'result' => $result]);
                }
            }
        }
    }
}
