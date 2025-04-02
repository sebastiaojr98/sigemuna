<?php

namespace App\Livewire;

use App\Models\LicenseOrder;
use Livewire\Component;
use App\Support\Traits\Logo;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;


use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class MinhasLicencasCliente extends Component
{
    use Logo;

    public $client;

    public function mount($client)
    {
        $this->client = $client;
    }
    
    public function render()
    {
        $licenses = LicenseOrder::where("client_id", "=", $this->client->id)->get();
        return view('livewire.client.minhas-licencas-cliente')->with([
            "licenses" => $licenses
        ]);
    }

    public function payLicense($license)
    {
        $my_license = LicenseOrder::find($license["id"]);
        
        $my_license->update([
            "license_status_id" => 1,
            "payday" => date("Y-m-d")
        ]);
    }

    //Renovando a licenca
    public function renovarLicense($license)
    {
        dd("Renovando!!!");
        $my_license = LicenseOrder::find($license["id"]);
        
        $my_license->update([
            "license_status_id" => 1,
            "payday" => date("Y-m-d")
        ]);
    }


    public function downloadLicense(LicenseOrder $licenseOrder)
    {
        $data = view('relatories.license', [
            "license" => $licenseOrder,
            "logo_emusana" => $this->createLogo(),
            "logo_cmcn" => $this->createLogoCMCN(),
            "seal" => $this->createSeal(),
            "qrcode" => $this->makeQrcodeLicense($licenseOrder)
        ])->render();

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml($data);
        $dompdf->setOptions(new Options([
            'isPhpEnabled' => true,
        ]));
        $dompdf->render();
        
        $nomeDoArquivo = 'licensa-'.$licenseOrder->reference.'.pdf';
        //$caminhoDoArquivo = storage_path("app/public/relatories/$nomeDoArquivo");
        $caminhoDoArquivo = "licenses/$nomeDoArquivo";


        try {
            Storage::disk("public")->put($caminhoDoArquivo, $dompdf->output());
            return Storage::disk("public")->download($caminhoDoArquivo, $nomeDoArquivo);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    private function makeQrcodeLicense($license)
    {

        $writer = new PngWriter();
        
        // Create QR code
        $qrCode = QrCode::create("Referencia: {$license->reference}\nProprietário: {$license->client->full_name}\n".($license->car_brand != null ? "Marca: {$license->car_brand}\nModelo: {$license->car_model}\nMatricula: {$license->car_registration}" : "Bairro: {$license->communal_unit->neighborhood->label}\nUnidade Comunal: {$license->communal_unit->label}\nQuarteirão: {$license->block}\nCasa: {$license->house_number}"))
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(255, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        $result = $writer->write($qrCode);

        $file_name = md5($license->reference).date('dmyhis').'.jpg';
        
        $path = __DIR__."/../../public/qrcodes_licenses/{$file_name}";

        $result->saveToFile($path);

        $qrcode = base64_encode(file_get_contents($path));
        return 'data:image/png;base64,' . $qrcode;
    }

    public function atualizar()
    {
    }
}
