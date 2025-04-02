<?php

namespace App\Livewire;

use App\Support\SMS;
use App\Support\Strings;
use App\Models\AccountType;
use App\Models\Client;
use App\Models\District;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\Nationality;
use App\Models\Province;
use Exception;
use Livewire\Component;

class FormularioCadastroCliente extends Component
{
    public $nationalities = [], $provinces = [], $districts = [], $genders = [], $marital_statuses = [], $account_types = [];

    public $account_type, $full_name, $nuit, $birth, $gender, $marital_status, $nationality, $phone, $province, $district, $foreign_birthplace;

    public $showFormPF, $showFormPJ;

    public function mount(){
        //$this->account_type = AccountType::where("label", "=", "PF")->first();
    }

    public function render()
    {
        $this->nationalities = Nationality::get();
        $this->genders = Gender::get();
        $this->marital_statuses = MaritalStatus::get();
        $this->account_types = AccountType::get();
        return view('livewire.client.formulario-cadastro-cliente');
    }

    //carregando as provincias do pais
    public function setProvinces()
    {
        $this->provinces = Province::where("nationality_id", "=", $this->nationality)->get();
        $this->districts = [];
    }

    //Carregando Distritos
    public function setDistricts()
    {
        $this->districts = District::where("province_id", "=", $this->province)->get();
    }

    //Cadastrando o Cliente
    public function createClient()
    {
        $this->validate([
            'account_type' => 'required'
        ]);
        $account_type = AccountType::find($this->account_type);
        if ($account_type->label == "PF") {
            $this->validate([
                'nuit' => 'required|size:9',
                'full_name' => 'required|min:3',
                'phone' => 'required|size:9',
                'birth' => 'date|required',
                'gender' => 'required',
                'marital_status' => 'required',
                'nationality' => 'required',
                'province' => 'required',
                'district' => 'required',
                'foreign_birthplace' => 'nullable|min:7'
            ]);

            try {
                $client = Client::create([
                    'code' => "CF-".date("y-m")."-".$this->reference(),
                    'nuit' => $this->nuit,
                    'full_name' => $this->full_name,
                    'birth' => $this->birth,
                    'account_type_id' => $this->account_type,
                    'gender_id' => $this->gender,
                    'marital_status_id' => $this->marital_status,
                    'nationality_id' => $this->nationality,
                    'province_id' => $this->province,
                    'district_id' => $this->district,
                    'phone' => $this->phone,
                    'foreign_birthplace' => $this->foreign_birthplace,
                    'user_create_id' => auth()->user()->id
                ]);
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        } else {
            $this->validate([
                'nuit' => 'required|size:9',
                'full_name' => 'required|min:6',
                'phone' => 'required|size:9'
            ]);

            try {
                $client = Client::create([
                    'code' => "CJ-".date("y-m")."-".$this->reference(),
                    'nuit' => $this->nuit,
                    'full_name' => $this->full_name,
                    'account_type_id' => $this->account_type,
                    'user_create_id' => auth()->user()->id,
                    'phone' => $this->phone
                ]);
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }

        //$this->sendMessage($client->full_name, $client->phone, $client->code);
        return redirect()->route('client', $client->id);

    }

    //Gerador de codigos
    private function reference(){
        return rand(10000, 99999);
    }

    //Atualizando o tipo de conta
    public function updateAccountType()
    {
        if ($this->account_type) {
            $account_type = AccountType::find($this->account_type);
            if ($account_type->label == "PF") {
                $this->showFormPF = true;
                $this->showFormPJ = false;
            } else {
                $this->showFormPF = false;
                $this->showFormPJ = true;
                $this->clearVar();
            }
        }else{
            $this->showFormPF = false;
            $this->showFormPJ = true;
            $this->clearVar();
        }
        
    }

    private function clearVar()
    {
        $this->full_name = "";
        $this->nuit = "";
        $this->birth = "";
        $this->gender = "";
        $this->marital_status = "";
        $this->nationality = "";
        $this->province = "";
        $this->district = "";
        $this->foreign_birthplace = "";
    }

    private function sendMessage($name, $phone, $code)
    {
        $name = Strings::removeAccents($name);
        $message = "[EMUSANA PORTAL] Ola senhor/a {$name} o seu codigo e: ". $code. ". Anote e conserve em um lugar seguro!";
        return SMS::send($phone, $message);
    }
}
