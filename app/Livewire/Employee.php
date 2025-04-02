<?php

namespace App\Livewire;

use App\Models\Employee as ModelsEmployee;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Support\Traits\Logo;
use Dompdf\Dompdf;
use Dompdf\Options;

class Employee extends Component
{
    use Logo;

    public $employee;

    public function mount(ModelsEmployee $employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.employee');
    }

    public function printUser(ModelsEmployee $employee_single)
    {
        //dd($employee_single->performanceEvaluation);
        $employee_single->logo = $this->createLogoCMCN();

        $data = view('relatories.ficha-funcionario', ["employee" => $employee_single])->render();

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml($data);
        $dompdf->setOptions(new Options([
            'isPhpEnabled' => true,
        ]));
        $dompdf->render();
        
        $nomeDoArquivo = 'ficha-funcionario-'.$employee_single->reference.'.pdf';
        //$caminhoDoArquivo = storage_path("app/public/relatories/$nomeDoArquivo");
        $caminhoDoArquivo = "fichas/$nomeDoArquivo";


        try {
            Storage::disk("public")->put($caminhoDoArquivo, $dompdf->output());
            return Storage::disk("public")->download($caminhoDoArquivo, $nomeDoArquivo);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        dd($employee_single);
    }
}
