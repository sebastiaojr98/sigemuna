<?php
    namespace App\Services\Pdf;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

    class DomPdfService{

        public static function make(string $view, string $directoryName):  StreamedResponse|\Exception
        {
            try{
                $dompdf = new Dompdf();
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->loadHtml($view);
                $dompdf->setOptions(new Options([
                    'isPhpEnabled' => true,
                ]));
                $dompdf->render();

                $fileName = uniqid().".pdf";
                $directoryFile = "{$directoryName}/{$fileName}";

                Storage::disk('public')
                    ->put($directoryFile, $dompdf->output());

                return Storage::disk('public')
                    ->download($directoryFile, $fileName);
            $dompdf->render();
            }catch(\Exception $e){
                return throw new \Exception($e->getMessage());
            }
        }

    }