<?php

namespace App\Livewire\App;

use App\Models\License;
use App\Support\SMS;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportEvents\Event;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Licenses extends Component
{
    use WithPagination;
    public function render()
    {
        $report = License::where('status', '!=', 'Pendente')
            ->selectRaw("
                COUNT(CASE WHEN signed = 'Não' THEN 1 END) as notSigned,
                COUNT(CASE WHEN printed = 'Não' THEN 1 END) as notPrinted,
                COUNT(CASE WHEN status = 'Expirada' THEN 1 END) as expired
            ")
            ->first();

        $licenses = License::with(['serviceContracted', 'customer'])
            ->where('status', '!=', 'Pendente')
            ->orderBy('printed', 'asc')
            ->orderBy('signed', 'asc')
            ->paginate(5);

        
        return view('livewire.app.licenses')->with([
            'licenses' => $licenses,
            'report' => $report
        ]);
    }

    public function print(License $license): StreamedResponse|\Exception
    {
        DB::beginTransaction();

        try {

            $data = view('relatories.license', [
                "license" => $license,
                "logo_emusana" => logoBase64(),
                "logo_cmcn" => logoCMCNBase64(),
                "seal" => sealBase64(),
                "qrcode" => makeQrcodeLicense($license)
            ])->render();

            $dompdf = new Dompdf();
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->loadHtml($data);
            $dompdf->setOptions(new Options([
                'isPhpEnabled' => true,
            ]));
            $dompdf->render();

            $fileName = uniqid().".pdf";
            $directoryFile = "licenses/files/{$fileName}";

            Storage::disk('public')
                ->put($directoryFile, $dompdf->output());

            $license->printed = "Sim";
            $license->save();
            DB::commit();
            return Storage::disk('public')
            ->download($directoryFile, $fileName);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return throw new \Exception($e->getMessage());
        }
    }

    public function subscribe(License $license): Event
    {
        try {
            $license->signed = 'Sim';
            $license->save();
            SMS::send($license->customer->phone, "A sua Licenca N. ". $license->code ." foi emitida. dirija-se a EMUSANA para levantar, Obrigado!");
            return $this->dispatch("pagamento", [
                "modal" => "#makePayment",
                "title" => "Sucesso",
                "icon" => "success",
                "text" => "Pedido processado com sucesso."
            ]);
        } catch (\Exception $e) {
            return $this->dispatch("pagamento", [
                "modal" => "#makePayment",
                "title" => "Falha",
                "icon" => "error",
                "text" => "Falha ao processar o pedido, tenta novamente mais tarde."
            ]);
        }
    }
}
