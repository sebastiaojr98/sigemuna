<?php
    namespace App\Support;

    class SMS{
        public static function send($phone, $message)
        {
            $phone = str_replace(' ', '', $phone);
            
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', env('SMS_HOST').'/v1/sms/send?phone='.$phone.'&message='.$message);
            
            if ($response->getStatusCode() === 200) {
                return response()->json(["success" => "Uma mensagem foi enviada para o seguinte telefone: ". $phone]);
            } else {
                return response()->json(["fail" => "Tenta mais tarde!"]);
            }
            
        }
    }