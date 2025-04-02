<?php

namespace App\Livewire;

use App\Models\AccountType;
use App\Models\Client;
use App\Models\LicenseOrder;
use Livewire\Component;
use Livewire\WithPagination;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use App\Support\Traits\Logo;

class Clients extends Component
{
    use WithPagination;
    use Logo;

    public $chart_clients, $chart_licenses;

    private $clients, $clients2;

    public $account;

    private $accounts = [];

    //busaa
    private $search_client;

    public function mount()
    {
        $this->clients2 = Client::all()->count();
        $this->licenses = LicenseOrder::all()->count();
        $this->valid_licenses = LicenseOrder::where("due_date", ">=", date("Y-m-d"))->get()->count();
        $this->expired_licenses = LicenseOrder::where("due_date", "<", date("Y-m-d"))->get()->count();

        //Clientes
        $this->physical_person = Client::where("account_type_id", "=", "1")->get()->count();
        $this->legal_entities = Client::where("account_type_id", "=", "2")->get()->count();

        $this->chart_licenses  = [$this->licenses, $this->valid_licenses, $this->expired_licenses];
        $this->chart_clients = [$this->clients2, $this->legal_entities, $this->physical_person];
    }



    public function render()
    {
        if ($this->search_client):
            $this->clients = Client::orWhere("code", "LIKE", "%{$this->search_client}%")->orWhere("full_name", "LIKE", "%{$this->search_client}%")->orWhere("nuit", "LIKE", "%{$this->search_client}%")->paginate(4);
        else:
            $this->clients = Client::paginate(4);
        endif;

        $account_types = AccountType::all();
        return view('livewire.clients')->with(["clients" => $this->clients, "account_types" => $account_types]);
    }

    public function createReport()
    {
        $clients = Client::all();

        if ($this->account == "all") {
            $this->accounts = $clients; 
        }else{
            foreach ($clients as $key => $client) {
                if ($this->account == $client->account_type_id) {
                    $this->accounts[] = $client;
                }
            }
        }

        $pj = 0;
        $pf = 0;
        foreach ($this->accounts as $key => $account) {
            if ($account->accountType->label == "PJ") {
                $pj = $pj + 1;
            }else{
                $pf = $pf + 1;
            }
        }

        //Dados Filtrados e Prontos
        
        $relatory = view("relatories.clients", [
            "logo" => $this->createLogo(),
            "logo_cmcn" => $this->createLogoCMCN(),
            "clients" => $this->accounts,
            "pj" => $pj,
            "pf" => $pf
        ])->render();

        $dompdf = new Dompdf();
        $dompdf->setPaper("A4", "landscape");
        $dompdf->loadHtml($relatory);
        $dompdf->setOptions(new Options([
                'isPhpEnabled' => true,
            ]));

        $dompdf->render();

        $nomeDoArquivo = 'clientes'.date("-Y-m-d-H-i-s").'.pdf';
        //$caminhoDoArquivo = storage_path("app/public/relatories/$nomeDoArquivo");
        $caminhoDoArquivo = "clients/$nomeDoArquivo";


        try {
            Storage::disk("public")->put($caminhoDoArquivo, $dompdf->output());
            return Storage::disk("public")->download($caminhoDoArquivo, $nomeDoArquivo);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function search($value)
    {
        $this->search_client = $value;
    }
}
