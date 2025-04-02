<?php
    namespace App\Services\Finance;

use Exception;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Facades\Pdf;

    class PdfService{

        public static function browserShot(string $view, string $file): void
        {
            try {
                $a = Browsershot::html($view)
                ->format('A4')
                ->showBackground()
                ->footerHtml("<h1>Sebastião WEB</h1>")
                ->savePdf($file);
            } catch (\Throwable $th) {
                throw new Exception($th->getMessage());
            }
        } 

    }