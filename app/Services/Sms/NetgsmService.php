<?php

namespace App\Services\Sms;

class NetgsmService implements SmsInterface
{
    private $apiURL;
    private $username;
    private $password;
    private $header;

    public function __construct()
    {
        $this->username = env("SMS_SERVICE_USERNAME");
        $this->password = env("SMS_SERVICE_PASSWORD");
        $this->header = env("SMS_SERVICE_HEADER");
        $this->apiURL = "https://api.netgsm.com.tr/sms/send/get";
    }

    public function sendSms($phoneNumber, $message)
    {
        $message = [
            'usercode' => $this->username,
            'password' => $this->password,
            'msgheader' => $this->header,
            'gsmno' => $phoneNumber,
            'message' => $message
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiURL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $message,
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $this->response($response);
    }

    public function response($result)
    {
        $error = null;
        $errorCodes = [
            "20" => "Karakter sayısı 917den büyük olamaz.",
            "30" => "API erişim izni yok.",
            "40" => "Gönderici adı sistemde tanımlı değil.",
            "50" => "Abone hesabınızla IYS gönderimi yapılamaz.",
            "51" => "Aboneliğinize tanımlı IYS marka bilgisi bulunamadı",
            "70" => "Parametre eksik/hatalı",
            "85" => "Gönderim sınırı aşıldı"
        ];

        $successCodes = [
            "00", "01", "02"
        ];

        $result = explode(" ", $result);

        if (!in_array($result[0], $successCodes)) {
            $error = "Bir hata oluştu";
        }

        if (isset($errorCodes[$result[0]])) {
            $error = $errorCodes[$result[0]];
        }

        $response = new \stdClass();

        if ($error) {
            $response->success = false;
            $response->error = $error;

            return $response;
        }

        $response->success = true;
        $response->trackId = $result[1] ?? null;
        $response->error = "";

        return $response;
    }
}
