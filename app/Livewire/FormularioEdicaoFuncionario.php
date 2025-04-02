<?php

namespace App\Livewire;

use App\Models\District;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\Nationality;
use App\Models\Province;
use Exception;
use Livewire\Component;

class FormularioEdicaoFuncionario extends Component
{
    public $nationalities = [], $provinces = [], $districts = [], $genders = [], $marital_statuses = [];

    public $code, $nuit, $first_name, $last_name, $birth, $gender, $height, $marital_status, $nationality, $province, $district, $foreign_birthplace, $father_name, $name_mother;

    public $employee;

    public  function mount($employee)
    {
        $this->employee = $employee;

        //Carregando as Provincias e distritos
        $this->provinces = Province::get();
        $this->districts = District::get();

        $this->code = $this->employee->code;
        $this->nuit = $this->employee->nuit;
        $this->first_name = $this->employee->first_name;
        $this->last_name = $this->employee->last_name;
        $this->birth = $this->employee->birth;
        $this->gender = $this->employee->gender_id;
        $this->height = $this->employee->height;
        $this->marital_status = $this->employee->marital_status_id;
        $this->nationality = $this->employee->nationality_id;
        $this->province = $this->employee->province_id;
        $this->district = $this->employee->district_id;
        $this->foreign_birthplace = $this->employee->foreign_birthplace;
        $this->father_name = $this->employee->father_name;
        $this->name_mother = $this->employee->name_mother;
    }

    public function render()
    {
        $this->nationalities = Nationality::get();
        $this->genders = Gender::get();
        $this->marital_statuses = MaritalStatus::get();

        return view('livewire.employee.formulario-edicao-funcionario');
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
    public function updateEmployee()
    {
        //dd($this->employee);
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
            $this->employee->update([
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
                'name_mother' => $this->name_mother,
                'user_create_id' => auth()->user()->id
            ]);
            return $this->dispatch("cadastrado", [
                "modal" => "#editEmployee", //id do modal
                "title" => "{$this->first_name} {$this->last_name}",
                "icon" => "success",
                "text" => "Os dados foram alterados com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e);
        }

    }
}
