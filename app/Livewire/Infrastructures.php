<?php

namespace App\Livewire;

use App\Models\Infrastructure;
use App\Models\InfrastructureType;
use App\Models\Neighborhood;
use Livewire\Component;
use Livewire\WithPagination;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use App\Support\Traits\Logo;

class Infrastructures extends Component
{
    use WithPagination;
    use Logo;

    public $type, $location, $status, $infras2;

    private $infras = [];

    //busaa
    private $search_infra;

    public function mount()
    {
        $this->operation = Infrastructure::where("status", "=", "1")->get()->count();
        $this->closed = Infrastructure::where("status", "=", "0")->get()->count();
        $this->maintenance = Infrastructure::where("status", "=", "2")->get()->count();

        $this->infras2 = [
            $this->operation + $this-> closed + $this->maintenance,
            $this->operation,
            $this->maintenance,
            $this->closed,
        ];

        //$this->activities = InfrastructureHistory::take(7)->orderBy("id", "desc")->get();
    }

    public function render()
    {
        $types = InfrastructureType::all();
        $locations = Neighborhood::all();
        $statuses = [
            "0" => "Encerrado",
            "1" => "Ativo",
            "2" => "Manutenção"
        ];

        if ($this->search_infra):
            //$internal_revenues = InternalRevenue::where("process_number", "LIKE", "%{$this->search_employee}%")->orderBy("status", "asc")->orderBy("id", "desc")->paginate(3);
            $infrastructures = Infrastructure::where("code", "LIKE", "%{$this->search_infra}%")->paginate(5);
        else:
            $infrastructures = Infrastructure::paginate(5);
        endif;
        return view('livewire.infrastructures')->with(["infrastructures" => $infrastructures, "types" => $types, "locations" => $locations, "statuses" => $statuses]);
    }

    public function printReport()
    {
        $infras = Infrastructure::all();

        foreach ($infras as $key => $infra) {
            if($this->type == "all"){
                if ($this->location == "all") {
                    if ($this->status == "all") {
                        $this->infras[] = $infra;
                    } else {
                        if ($this->status == $infra->status) {
                            $this->infras[] = $infra;
                        }
                    } 
                }else{
                    if ($this->location == $infra->neighborhood_id) {
                        if ($this->status == "all") {
                            $this->infras[] = $infra;
                        } else {
                            if ($this->status == $infra->status) {
                                $this->infras[] = $infra;
                            }
                        } 
                    }
                }
            }else {
                if($this->type == $infra->infrastructure_type_id){
                    if ($this->location == "all") {
                        if ($this->status == "all") {
                            $this->infras[] = $infra;
                        } else {
                            if ($this->status == $infra->status) {
                                $this->infras[] = $infra;
                            }
                        } 
                    }else{
                        if ($this->location == $infra->neighborhood_id) {
                            if ($this->status == "all") {
                                $this->infras[] = $infra;
                            } else {
                                if ($this->status == $infra->status) {
                                    $this->infras[] = $infra;
                                }
                            } 
                        }
                    }
                }
            }
        }

        
        //Dados Filtrados e Prontos
        
        $relatory = view("relatories.infras", [
            "logo" => $this->createLogo(),
            "logo_cmcn" => $this->createLogoCMCN(),
            "infras" => $this->infras,
        ])->render();

        $dompdf = new Dompdf();
        $dompdf->setPaper("A4", "landscape");
        $dompdf->loadHtml($relatory);
        $dompdf->setOptions(new Options([
                'isPhpEnabled' => true,
            ]));

        $dompdf->render();

        $nomeDoArquivo = 'infraestruturas'.date("-Y-m-d-H-i-s").'.pdf';
        //$caminhoDoArquivo = storage_path("app/public/relatories/$nomeDoArquivo");
        $caminhoDoArquivo = "infras/$nomeDoArquivo";


        try {
            Storage::disk("public")->put($caminhoDoArquivo, $dompdf->output());
            return Storage::disk("public")->download($caminhoDoArquivo, $nomeDoArquivo);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function search($value)
    {
        $this->search_infra = $value;
    }

    public function atualizar()
    {
    }
}
