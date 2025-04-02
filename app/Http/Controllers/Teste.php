<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\Traits\Logo;
use Dompdf\Dompdf;

class Teste extends Controller
{
    use Logo;
    //
    public function index()
    {
        $data = view('relatories.ficha-funcionario', [
            "logo_emusana" => $this->createLogo(),
            "logo_cmcn" => $this->createLogoCMCN(),
            "seal" => $this->createSeal(),
            "qrcode" => $this->createQrCode()
        ])->render();

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml($data);
        $dompdf->render();
        $dompdf->stream('teste'.".pdf", ["Attachment" => true]);
    }
}
