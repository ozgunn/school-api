<?php

namespace App\Services\Sms;

interface SmsInterface
{
    public function sendSms($phoneNumber, $message);
}
