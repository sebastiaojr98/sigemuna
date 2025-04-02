<?php

namespace App\Livewire;

use Livewire\Component;
use PDO;

class Complaints extends Component
{
    private $token;
    public $complaints;
    private $url = "/api/v1/complaints";


    public function mount()
    {
        $this->getComplaints(env("WEB_HOST"). $this->url);
    }

    public function render()
    {
        return view('livewire.complaints');
    }

    private function getToken(){
        $url = env('WEB_HOST').'/oauth/token';

        $data = [
            'grant_type' => 'password',
            'client_id' => '2',
            'client_secret' => '5YlIxajhyc49joXXItmNB2DxWR2gdAKZZqDj8ScW',
            'username' => 'web@emusana.org.mz',
            'password' => 'password',
            'scope' => '',
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        $response = curl_exec($ch);

        if(curl_errno($ch)){
            return "Erro". curl_error($ch);
        }

        curl_close($ch);
        
        //Guardar token

        $path = __DIR__."/../../config/";
        
        $file_name = "token.txt";
        $path = $path . $file_name;

        $file = fopen($path, "w");

        if($file){
            fwrite($file, json_decode($response)->access_token);
            fclose($file);
            $this->getComplaints(env("WEB_HOST"). $this->url);
        }else{
            return false;
        }
    }

    public function getComplaints($url)
    {
        $token = file_get_contents(__DIR__."/../../config/token.txt");
        
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer ". $token,
                'Accept: application/json'
            ]
        ];

        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $response = curl_exec($curl);

        //verificando a occorencia de um erro;
        if (curl_errno($curl)) {
            dd(curl_error($curl));
        }

        curl_close($curl);

        $data = json_decode($response);
        if (isset($data->message) == "Unauthenticated.") {
            $this->getToken();
        }

        //dd($data->complaints);
        $this->complaints = $data->complaints;
    }
}
