<?php

namespace App\Providers;

use App\Services\Sms\NetgsmService;
use App\Services\Sms\SmsInterface;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->singleton(SmsInterface::class, function ($app) {
            $provider = env('SMS_SERVICE_PROVIDER');

            switch ($provider) {
                case 'netgsm':
                    return new NetgsmService();
                // Diğer sağlayıcılar
            }
        });
    }
}
