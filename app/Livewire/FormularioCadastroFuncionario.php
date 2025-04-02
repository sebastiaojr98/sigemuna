<?php

namespace App\Livewire;

use App\Models\District;
use App\Models\Employee;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\Nationality;
use App\Models\Province;
use Exception;
use Livewire\Component;

class FormularioCadastroFuncionario extends Component
{
    public $nationalities = [], $provinces = [], $districts = [], $genders = [], $marital_statuses = [];

    public $code, $nuit, $first_name, $last_name, $birth, $gender, $height, $marital_status, $nationality, $province, $district, $foreign_birthplace, $father_name, $name_mother;


    public function render()
    {

        $this->nationalities = Nationality::get();
        $this->genders = Gender::get();
        $this->marital_statuses = MaritalStatus::get();

        return view('livewire.employee.formulario-cadastro-funcionario');
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

    //Cadastrando o functionario
    public function createEmployee()
    {
        $this->validate([
            'nuit' => 'required|size:9',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'birth' => 'date',
            'gender' => 'required',
            'height' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'marital_status' => 'required',
            'nationality' => 'required',
            'province' => 'required',
            'district' => 'required',
            'father_name' => 'required|min:7',
            'name_mother' => 'required|min:7'
        ]);

        try {
            $employee = Employee::create([
                'code' => $this->code ? $this->code : date("y-m")."-".$this->reference(),
                'nuit' => $this->nuit,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'birth' => $this->birth,
                'gender_id' => $this->gender,
                'height' => $this->height,
                'marital_status_id' => $this->marital_status,
                'nationality_id' => $this->nationality,
                'province_id' => $this->province,
                'district_id' => $this->district,
                'foreign_birthplace' => $this->foreign_birthplace,
                'father_name' => $this->father_name,
		'working_status' => '1',
                'name_mother' => $this->name_mother,
                'user_create_id' => auth()->user()->id
            ]);
            return redirect()->route('employee', $employee->id);
        } catch (Exception $e) {
            dd($e);
        }

    }

    //Gerador de codigos
    public function reference(){
        return rand(10000, 99999);
    }
}
