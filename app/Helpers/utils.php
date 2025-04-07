<?php

use App\Models\License;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

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

    function logoCMCNBase64(): string
    {
        $logo = file_get_contents(public_path("img/logo-cmcn.png"));

        return "data:image/png;base64,".base64_encode($logo);
    }

    function sealBase64(): string
    {
        $logo = file_get_contents(public_path("img/seal.png"));

        return "data:image/png;base64,".base64_encode($logo);
    }

    function makeQrcodeLicense(License $license): string|\Exception
    {
        try {
            $writer = new PngWriter();
        
            // Create QR code
            $qrCode = QrCode::create($license->code)
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                ->setSize(300)
                ->setMargin(10)
                ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                ->setForegroundColor(new Color(255, 0, 0))
                ->setBackgroundColor(new Color(255, 255, 255));

            $result = $writer->write($qrCode);

            $fileName = uniqid().'.jpg';
            
            $path = public_path("qrcodes_licenses/{$fileName}");

            $result->saveToFile($path);

            $qrcode = base64_encode(file_get_contents($path));

            return 'data:image/png;base64,' . $qrcode;
        } catch (\Exception $e) {
            return throw new \Exception($e->getMessage());
        }
    }

    