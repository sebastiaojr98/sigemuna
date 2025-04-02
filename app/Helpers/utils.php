<?php
    function formatNumberMoz($number):string
    {
        $number = preg_replace('/\D/', '', $number);

        if (strlen($number) == 9) {
            $number = "+258 " . substr($number, 0, 2) . " " . substr($number, 2, 3) . " " . substr($number, 5);
        } 
        
        elseif (strlen($number) == 12 && substr($number, 0, 3) == "258") {
            $number = "+258 " . substr($number, 3, 2) . " " . substr($number, 5, 3) . " " . substr($number, 8);
        }
    
        return $number;
    }

    function formatAmount($amount): string
    {
        return number_format($amount, 2, ".", " ");
    }

    function logoBase64(): string
    {
        $logo = file_get_contents(public_path("img/logo.png"));

        return "data:image/png;base64,".base64_encode($logo);
    }

    