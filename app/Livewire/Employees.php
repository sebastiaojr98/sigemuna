<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Gender;
use App\Models\ProfessionalDevelopment;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use App\Support\Traits\Logo;

class Employees extends Component
{
    use WithPagination;
    use Logo;
    
    private $employees, $employees_report = [];

    public $department, $gender, $status;

    //busaa
    private $search_employee;

    public $employee_status;

    public $employees2, $active, $fired, $vacation, $suspended, $paternity, $maternity, $sick;

    public function mount()
    {
        $this->employees2 = Employee::all()->count();
        $this->active = Employee::where("working_status", "=", "1")->get()->count();
        $this->fired = Employee::where("working_status", "=", "0")->get()->count();
        $this->vacation = Employee::where("working_status", "=", "2")->get()->count();
        $this->suspended = Employee::where("working_status", "=", "3")->get()->count();
        $this->paternity = Employee::where("working_status", "=", "4")->get()->count();
        $this->maternity = Employee::where("working_status", "=", "5")->get()->count();
        $this->sick = Employee::where("working_status", "=", "6")->get()->count();

        $this->employee_status = [
            $this->employees2,
            $this->active,
            $this->fired,
            $this->vacation,
            $this->suspended,
            $this->paternity,
            $this->maternity,
            $this->sick
        ];
    }
    
    public function render()
    {
        if ($this->search_employee):
            //$internal_revenues = InternalRevenue::where("process_number", "LIKE", "%{$this->search_employee}%")->orderBy("status", "asc")->orderBy("id", "desc")->paginate(3);
            $this->employees = Employee::with(["gender"])->orWhere("code", "LIKE", "%{$this->search_employee}%")->orWhere("first_name", "LIKE", "%{$this->search_employee}%")->orWhere("last_name", "LIKE", "%{$this->search_employee}%")->orWhere("nuit", "LIKE", "%{$this->search_employee}%")->paginate(4);
        else:
            $this->employees = Employee::with(["gender"])->paginate(4);
        endif;

        $departments = Department::all();
        $genders = Gender::all();
        $statuses = [
            "0" => "Demitidos",
            "1" => "Ativo",
            "2" => "Férias",
            "3" => "Suspenso",
            "4" => "Lic. Paternidade",
            "5" => "Lic. Maternidade",
            "6" => "Doente",
        ];

        return view('livewire.employees')->with(["employees" => $this->employees, "departments" => $departments, "genders" => $genders, "statuses" => $statuses]);
    }


    public function generateReport()
    {
        $employees = Employee::get();

        $women = 0;
        $men = 0;
        if ($this->department == "all") {

            foreach ($employees as $employee) {
                
                $department = ProfessionalDevelopment::where("employee_id", "=", $employee->id)->latest()->first();

                if(isset($department)){

                    if ($this->gender == "all") {
                        if ($this->status == "all") {
                            $this->employees_report[] = $employee;
                            //Separando mulheres do homens
                            if ($employee->gender_id = 1):
                                $men++;
                            elseif($employee->gender_id = 2):
                                $women++;
                            endif;
                        }else {
                            if($employee->working_status == $this->status){
                                $this->employees_report[] = $employee;
                                //Separando mulheres do homens
                                if ($employee->gender_id = 1):
                                    $men++;
                                elseif($employee->gender_id = 2):
                                    $women++;
                                endif;
                            }
                        }
                    } else {
                        if($employee->gender_id == $this->gender){
                            if ($this->status == "all") {
                                $this->employees_report[] = $employee;
                                //Separando mulheres do homens
                                if ($employee->gender_id = 1):
                                    $men++;
                                elseif($employee->gender_id = 2):
                                    $women++;
                                endif;
                            }else {
                                if($employee->working_status == $this->status){
                                    $this->employees_report[] = $employee;
                                    //Separando mulheres do homens
                                    if ($employee->gender_id = 1):
                                        $men++;
                                    elseif($employee->gender_id = 2):
                                        $women++;
                                    endif;
                                }
                            }
                        }
                    }

                }
            }

        } else {
            foreach ($employees as $employee) {
                
                $department = ProfessionalDevelopment::where("employee_id", "=", $employee->id)->latest()->first();

                if(isset($department)){

                    if ($department->department_id == $this->department) {
                        if ($this->gender == "all") {
                            if ($this->status == "all") {
                                $this->employees_report[] = $employee;
                                //Separando mulheres do homens
                                if ($employee->gender_id = 1):
                                    $men++;
                                elseif($employee->gender_id = 2):
                                    $women++;
                                endif;
                            }else {
                                if($employee->working_status == $this->status){
                                    $this->employees_report[] = $employee;
                                    //Separando mulheres do homens
                                    if ($employee->gender_id = 1):
                                        $men++;
                                    elseif($employee->gender_id = 2):
                                        $women++;
                                    endif;
                                }
                            }
                        } else {
                            if($employee->gender_id == $this->gender){
                                if ($this->status == "all") {
                                    $this->employees_report[] = $employee;
                                    //Separando mulheres do homens
                                    if ($employee->gender_id = 1):
                                        $men++;
                                    elseif($employee->gender_id = 2):
                                        $women++;
                                    endif;
                                }else {
                                    if($employee->working_status == $this->status){
                                        $this->employees_report[] = $employee;
                                        //Separando mulheres do homens
                                        if ($employee->gender_id = 1):
                                            $men++;
                                        elseif($employee->gender_id = 2):
                                            $women++;
                                        endif;
                                    }
                                }
                            }
                        }
                    }

                }
            }
        }

        //Criando o filtro de Departamentos
        if($this->department == "all"):
            $department = "Todos";
        else:
            $department = Department::find($this->department);
            $department = $department->label;
        endif;

        //Criando o Filtro de Sexo
        if($this->gender == "all"):
            $gender = "Todos";
        else:
            $gender = Gender::find($this->gender);
            $gender = $gender->description;
        endif;

        //Criando Filtro de Estados
        $status;
        /*
            "0" => "Demitidos",
            "1" => "Ativo",
            "2" => "Férias",
            "3" => "Suspenso",
            "4" => "Lic. Paternidade",
            "5" => "Lic. Maternidade",
            "6" => "Doente",
        **/
        switch ($this->status) {
            case 'all':
                $status = "Todos";
                break;
            case 0:
                $status = "Demitidos";
                break;
            case 1:
                $status = "Ativo";
                break;
            case 2:
                $status = "Férias";
                break;
            case 3:
                $status = "Suspenso";
                break;
            case 4:
                $status = "Lic. Paternidade";
                break;
            case 5:
                $status = "Lic. Maternidade";
                break;
            case 6:
                $status = "Doente";
                break;
        }

        //Dados Filtrados e Prontos
        
        $relatory = view("relatories.employees", [
            "logo" => $this->createLogo(),
            "logo_cmcn" => $this->createLogoCMCN(),
            "filter_department" => $department,
            "filter_condition_type" => $status,
            "filter_gender" => $gender,
            "women" => $women,
            "men" => $men,
            "employees" => $this->employees_report,
        ])->render();

        $dompdf = new Dompdf();
        $dompdf->setPaper("A4", "landscape");
        $dompdf->loadHtml($relatory);
        $dompdf->setOptions(new Options([
                'isPhpEnabled' => true,
            ]));

        $dompdf->render();

        $nomeDoArquivo = 'funcionarios'.date("-Y-m-d-H-i-s").'.pdf';
        //$caminhoDoArquivo = storage_path("app/public/relatories/$nomeDoArquivo");
        $caminhoDoArquivo = "relatories/$nomeDoArquivo";


        try {
            Storage::disk("public")->put($caminhoDoArquivo, $dompdf->output());
            return Storage::disk("public")->download($caminhoDoArquivo, $nomeDoArquivo);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    public function search($value)
    {
        $this->search_employee = $value;
    }

}
