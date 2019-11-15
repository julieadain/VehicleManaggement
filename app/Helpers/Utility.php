<?php

if (!function_exists('sendSms')) {
    function sendSms($to, $message, $from = null)
    {
//        $message = 'ksbekgjkjsk sdkjs the message body';
        $uri = 'https://cheapsms.com.bd/api/send';
        $auth = base64_encode('example@latentsoft.com:JDJ5J*****WT0RH');
        $data = [
            'client_phone' => $to,
            'org_name' => $from,
            'message' => $message,
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $uri,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
                "auth: $auth"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($response) {
            return json_decode($response);
        } else {
            return $err;
        }
    }
}

