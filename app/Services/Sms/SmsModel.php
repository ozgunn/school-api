<?php

namespace App\Services\Sms;

class SmsModel
{
    private string $phoneNumber;
    private string $message;
    private $service;

    public function __construct($phoneNumber, $message)
    {
        $this->service = app(SmsInterface::class);
        $this->phoneNumber = $phoneNumber;
        $this->message = $message;
    }

    public function send()
    {
        return $this->service->sendSms($this->phoneNumber, $this->message);
    }
}
