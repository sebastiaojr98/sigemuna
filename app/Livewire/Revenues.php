<?php

namespace App\Livewire;

use App\Models\InternalRevenue;
use App\Models\LicenseOrder;
use App\Models\ServiceOrder;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\TypeRevenue;
use App\Services\Finance\PdfService;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use App\Support\Traits\Logo;
use phputil\extenso\Extenso;


use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Revenues extends Component
{
    use WithPagination;
    use Logo;

    public $type, $status, $start_date, $end_date;

    private $revenues;

    //busaa
    private $search_revenue;


    public function mount()
    {
        $this->start_date = date("Y-m-d");
        $this->end_date = date("Y-m-d");
    }

    public function render()
    {
        $revenue_types = TypeRevenue::all();
        $statuses = [
            "0" => "Pendente",
            "1" => "Pago"
        ];

        if ($this->search_revenue):
            $internal_revenues = InternalRevenue::where("process_number", "LIKE", "%{$this->search_revenue}%")->orderBy("status", "asc")->orderBy("id", "desc")->paginate(3);
        else:
            $internal_revenues = InternalRevenue::whereMonth("created_at", date("m"))->orderBy("status", "asc")->orderBy("id", "desc")->paginate(3);
        endif;

        return view('livewire.revenues')->with(["internal_revenues" => $internal_revenues, "revenue_types" => $revenue_types, "statuses" => $statuses]);
    }

    public function payRevenue(InternalRevenue $internalRevenue)
    {
        $result = $this->checkProcessType($internalRevenue->process_number);

        if ($result === 'license') {
            $pay = $this->payLicense($internalRevenue);
        }else if($result === 'service'){
            $pay = $this->payService($internalRevenue);
        }else if($result === 'other'){
            $pay = $this->payOther($internalRevenue);
        }

        if ($pay) {
            return $this->dispatch("pagamento", [
                "title" => "Pagamento Efetuado!",
                "icon" => "success",
                "text" => "O seu pagamento foi processado com sucesso."
            ]);
        } else {
            return $this->dispatch("pagamento", [
                "title" => "Erro no Pagamento",
                "icon" => "error",
                "text" => "Ocorreu um erro ao processar o pagamento. Por favor, tente novamente."
            ]);
        }
        
    }


    private function checkProcessType($process_number)
    {

        $license = strpos($process_number, 'LIC-');
        $service = strpos($process_number, 'SRC-');
        
        if ($license === 0) {
            return 'license';
        }else if($service === 0){
            return 'service';
        }else{
            return 'other';
        }

    }


    private function payLicense($revenue)
    {
        DB::beginTransaction();
        try {
            
            $license = LicenseOrder::where('reference', "=", $revenue->process_number)->first();
            
            $revenue->update([
                "status" => '1',
                "user_pay_id" => auth()->user()->id,
                "payday" => date("y-m-d")
            ]);

            $license->update([
                "license_status_id" => '1'
            ]);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            //dd($e->getMessage());
            return false;
        }
    }

    private function payService($revenue)
    {
        DB::beginTransaction();
        try {
            
            $service = ServiceOrder::where('reference', "=", $revenue->process_number)->first();
            
            $revenue->update([
                "status" => '1',
                "user_pay_id" => auth()->user()->id,
                "payday" => date("y-m-d")
            ]);

            $service->update([
                "status" => '1'
            ]);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            //dd($e->getMessage());
            return false;
        }
    }

    private function payOther($revenue)
    {
        try {
            
            $revenue->update([
                "status" => '1',
                "user_pay_id" => auth()->user()->id,
                "payday" => date("y-m-d")
            ]);
            return true;
        } catch (Exception $e) {
            //dd($e->getMessage());
            return false;
        }
    }

    public function printReport()
    {
        $revenue_types = TypeRevenue::all();

        //verificando os tipos de despesas
        if($this->type == "all"):
            $revenues = InternalRevenue::where( 'status', ($this->status == "all" ? '!=' : '='), ($this->status == "all" ? 'all' : $this->status) )->where("revenue_date", ">=", $this->start_date)->where("revenue_date", "<=", $this->end_date)->orderBy("revenue_date")->get();
        else:
            $revenues = InternalRevenue::where("type_revenue_id", "=", $this->type)->where( 'status', ($this->status == "all" ? '!=' : '='), ($this->status == "all" ? 'all' : $this->status) )->where("revenue_date", ">=", $this->start_date)->where("revenue_date", "<=", $this->end_date)->orderBy("revenue_date")->get();
        endif;
        
        $revenue_type_legend = $this->type == "all" ? "Todos" : (TypeRevenue::find($this->type))->label;

        

        foreach ($revenues as $key => $revenue) {
            foreach ($revenue_types as $key => $revenue_type) {
                if ($revenue->type_revenue_id == $revenue_type->id) {
                    $revenue_type->amount = $revenue_type->amount + $revenue->amount;
                }
            }
        }

        //dd($revenue_type_legend);

        $relatory = view("relatories.revenues", [
            "logo" => $this->createLogo(),
            "logo_cmcn" => $this->createLogoCMCN(),
            "revenues" => $revenues,
            "revenue_types" => $revenue_types,
            "total" => $revenues->sum("amount"),
            "revenue_type_legend" => $revenue_type_legend,
            "status" => ($this->status == "all" ? "Todos" : ($this->status == "0" ? "Pendente" : "Pago")),
            "start_date" => $this->start_date,
            "end_date" => $this->end_date
        ])->render();

        $dompdf = new Dompdf();
        $dompdf->setPaper("A4", "landscape");
        $dompdf->loadHtml($relatory);
        $dompdf->setOptions(new Options([
                'isPhpEnabled' => true,
            ]));

        $dompdf->render();

        $nomeDoArquivo = 'receitas'.date("-Y-m-d-H-i-s").'.pdf';
        //$caminhoDoArquivo = storage_path("app/public/relatories/$nomeDoArquivo");
        $caminhoDoArquivo = "revenues/$nomeDoArquivo";


        try {
            Storage::disk("public")->put($caminhoDoArquivo, $dompdf->output());
            return Storage::disk("public")->download($caminhoDoArquivo, $nomeDoArquivo);
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        //dd($this->revenues);
    }

    //Imprimindo Factura
    public function printInvoice(InternalRevenue $internalRevenue):StreamedResponse
    {
        $data = view('relatories.invoice', ["revenue" => $internalRevenue])->render();

        $fileName = uniqid().".pdf";

        try {
            PdfService::browserShot($data, (storage_path("/app/invoices/".$fileName)));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return Storage::disk('local')->download("invoices/".$fileName, $fileName);

    }


    //Imprimindo Recibo
    public function printRevenue(InternalRevenue $internalRevenue)
    {
        $internalRevenue->logo = $this->createLogo();
        $internalRevenue->qrcode = $this->makeQrcodeRecipt($internalRevenue);

        $data = view('relatories.receipt', ["revenue" => $internalRevenue])->render();

        $dompdf = new Dompdf();
        $dompdf->setPaper('A5', 'portrait');
        $dompdf->loadHtml($data);
        $dompdf->setOptions(new Options([
            'isPhpEnabled' => true,
        ]));
        $dompdf->render();
        
        $nomeDoArquivo = 'recibo-'.$internalRevenue->reference.'.pdf';
        //$caminhoDoArquivo = storage_path("app/public/relatories/$nomeDoArquivo");
        $caminhoDoArquivo = "receipts/$nomeDoArquivo";


        try {
            Storage::disk("public")->put($caminhoDoArquivo, $dompdf->output());
            return Storage::disk("public")->download($caminhoDoArquivo, $nomeDoArquivo);
        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }

    private function makeQrcodeRecipt($internalRevenue)
    {
        $writer = new PngWriter();
        
        // Create QR code
        $amount = number_format($internalRevenue->amount, 2, '.', ' ');
        $qrCode = QrCode::create("Referencia: {$internalRevenue->reference}\nProcesso: {$internalRevenue->process_number}\nMontante: {$amount} MT\nCliente: {$internalRevenue->client->full_name}\nReferente: {$internalRevenue->typeRevenue->label}")
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(255, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        $result = $writer->write($qrCode);

        $file_name = md5($internalRevenue->reference).date('dmyhis').'.jpg';
        
        $path = __DIR__."/../../public/qrcodes_receipt/{$file_name}";

        $result->saveToFile($path);

        $qrcode = base64_encode(file_get_contents($path));
        return 'data:image/png;base64,' . $qrcode;
    }

    public function search($value)
    {
        $this->search_revenue = $value;
    }

    public function atualizar()
    {
    }
}
