<?php

namespace App\Livewire;

use App\Support\SMS;
use App\Support\Strings;
use App\Models\Client;
use App\Models\CommunalUnity;
use App\Models\FormPayment;
use App\Models\InternalRevenue;
use App\Models\License;
use App\Models\LicenseOrder;
use App\Models\LicenseStatus;
use App\Models\LicenseType;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioLicenca extends Component
{
    use WithFileUploads;

    public $licenses = [], $amount = 0;

    public $client, $form_payment, $license_type, $license, $car_registration, $car_model, $car_brand, $township, $communal_unity, $house_number, $block_number, $observation;

    public $showFormLA, $showFormLT;

    public  function mount($client)
    {
        $this->client = $client;
    }

    public function render()
    {
        $license_types = LicenseType::get();
        $communal_units = CommunalUnity::get();
        $form_payments = FormPayment::get();
        
        return view('livewire.client.formulario-licenca')->with(["license_types" => $license_types, "communal_units" => $communal_units, "form_payments" => $form_payments]);
    }


    public function setLicense()
    {
        $this->licenses = [];
        $this->license = "";
        $this->showFormLT = false;
        $this->showFormLA = false;


        if ($this->license_type) {
            $this->licenses = License::where("license_type_id", "=", $this->license_type)->get();
        }else{
            $this->licenses = [];
            $this->amount = 0;
        }
    }

    public function setAmount()
    {
        if($this->license){
            $license = License::find($this->license);
            $this->amount = $license->amount;

            if ($license->licenseType->label == "LT") {
                $this->showFormLT = true;
                $this->showFormLA = false;
            } elseif($license->licenseType->label == "LA") {
                $this->showFormLT = false;
                $this->showFormLA = true;
            }
            
        }else{
            $this->amount = 0;
        }
    }

    public function createLicense(Client $client)
    {
        $this->validate([
            'license_type' => 'required',
            "form_payment" => "required",
            'license' => 'required',
            'township' => "required",
            'observation' => 'nullable',
        ]);

        $license_type = LicenseType::find($this->license_type);

        if ($license_type->label == "LT") {
            $this->createLT($client, $license_type);
        }elseif($license_type->label == "LA") {
            $this->createLA($client, $license_type);
        }
    }


    //Funcao que cria licencas de Transporte
    private function createLT($client, $type)
    {
        
        $this->validate([
            'car_model' => 'required',
            'car_registration' => 'required',
            'car_brand' => 'required',
        ]);

        //Iniciando a Transacao
        DB::beginTransaction();

        try {
            $license = License::find($this->license);
            $status = LicenseStatus::where("label", "=", "PT")->first();
            
            $license_order = LicenseOrder::create([
                'reference' => 'LIC-'. date('ym'). "-" .$this->reference(),
                'license_status_id' => $status->id,
                'client_id' => $client->id,
                'user_id' => auth()->user()->id,
                'issue_date' => date('Y-m-d'),
                'due_date' => Carbon::now()->addDay(365)->isoFormat("Y-M-D"),
                'license_type_id' => $type->id,
                'license_id' => $this->license,
                'observation' => $this->observation,
                "township" => $this->township,
                "car_brand" => $this->car_brand,
                "car_registration" => $this->car_registration,
                "car_model" => $this->car_model,
            ]);
            
            //Criando a transacao automaticamente
            InternalRevenue::create([
                'reference' => 'IR-'. date('ym'). "-" .$this->reference(),
                "process_number" => $license_order->reference,
                "form_payment_id" => $this->form_payment,
                "type_revenue_id" => 3,
                "client_id" => $client->id,
                "description" => "Referente a licença: {$license_order->license->name}",
                "revenue_date" => date("Y-m-d"),
                "amount" => $license->amount,
                "status" => '0',
                "user_create_id" => auth()->user()->id
            ]);

            DB::commit();

            $this->sendMessage($client->full_name, $client->phone, $license_order->reference);
            $this->clearLicense();

            return $this->dispatch("cadastrado", [
                "modal" => "#minhasLicencas", //id do modal
                "title" => "Licença!",
                "icon" => "success",
                "text" => "A licença de ". $license_order->license->name. " foi solicitada com sucesso! Dirija-se ao sector financeiro para efetuar o pagamento."
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    //Funcao que cria licencas de Transporte
    private function createLA($client, $type)
    {
        $this->validate([
            'communal_unity' => 'required',
            'house_number' => 'nullable|integer',
            'block_number' => 'nullable|integer',
        ]);

        //Iniciando a Transacao
        DB::beginTransaction();

        try {
            $license = License::find($this->license);
            $status = LicenseStatus::where("label", "=", "PT")->first();
            
            $license_order = LicenseOrder::create([
                'reference' => 'LIC-'. date('ym'). "-" .$this->reference(),
                'license_status_id' => $status->id,
                'client_id' => $client->id,
                'user_id' => auth()->user()->id,
                'issue_date' => date('Y-m-d'),
                'due_date' => Carbon::now()->addDay(365)->isoFormat("Y-M-D"),
                'license_type_id' => $type->id,
                'license_id' => $this->license,
                'observation' => $this->observation,
                "township" => $this->township,
                "communal_unit_id" => $this->communal_unity,
                "house_number" => $this->house_number,
                "block" => $this->block_number
            ]);

            //Criando a transacao automaticamente
            InternalRevenue::create([
                'reference' => 'IR-'. date('ym'). "-" .$this->reference(),
                "process_number" => $license_order->reference,
                "form_payment_id" => $this->form_payment,
                "type_revenue_id" => 3,
                "revenue_date" => date("Y-m-d"),
                "description" => "Referente a licença: {$license_order->license->name}",
                "client_id" => $client->id,
                "amount" => $license->amount,
                "status" => '0',
                "user_create_id" => auth()->user()->id
            ]);
            DB::commit();
            $this->sendMessage($client->full_name, $client->phone, $license_order->reference);
            $this->clearLicense();
            return $this->dispatch("cadastrado", [
                "modal" => "#minhasLicencas", //id do modal
                "title" => "Licença!",
                "icon" => "success",
                "text" => "A licença de ". $license_order->license->name. " foi solicitada com sucesso! Dirija-se ao sector financeiro para efetuar o pagamento."
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    //Gerador de Codigo
    private function reference(){
        return rand(10000, 99999);
    }


    private function clearLicense()
    {
        $this->form_payment = "";
        $this->license_type = "";
        $this->license = "";
        $this->car_registration = "";
        $this->car_model = "";
        $this->car_brand = "";
        $this->township = "";
        $this->communal_unity = "";
        $this->house_number = "";
        $this->block_number = "";
        $this->observation = "";
    }


    private function sendMessage($name, $phone, $code)
    {
        $name = Strings::removeAccents($name);
        $message = "[EMUSANA PORTAL] Ola senhor/a {$name} o codigo da sua licenca e: ". $code. ". Conserve e dirija-se com o no sector financeiro!";
        return SMS::send($phone, $message);
    }
}
