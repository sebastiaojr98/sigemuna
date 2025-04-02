<?php

namespace App\Livewire;

use App\Models\Infrastructure;
use App\Models\InfrastructureHistory;
use App\Models\InfrastructureHistoryFile;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioHistoricoInfraestrutura extends Component
{
    
    use WithFileUploads;

    public $activity_date, $begin_time, $end_time, $status, $responsible_technician, $images = [], $activities_performed;

    public $infra;

    public function mount($infra)
    {
        $this->infra = $infra;
    }

    public function render()
    {
        return view('livewire.formulario-historico-infraestrutura');
    }

    public function createLog(Infrastructure $infrastructure)
    {
        $this->validate([
            'activity_date' => 'required|date',
            'begin_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:begin',
            'status' => 'required|in:0,1,2', // Substitua com os valores permitidos
            'responsible_technician' => 'required|string',
            'activities_performed' => 'required|string',
            'images.*' => 'required|image:jpg,jpeg,png',
        ]);

        DB::beginTransaction();

        try {
            $infrastructure->update([
                "status" => $this->status
            ]);

            $history = InfrastructureHistory::create([
                'activity_date' => $this->activity_date,
                'begin' => $this->begin_time,
                'end' => $this->end_time,
                'responsible_technician' => $this->responsible_technician,
                'activities_performed' => $this->activities_performed,
                'infrastructure_id' => $infrastructure->id,
                "user_id" => auth()->user()->id
            ]);

            foreach ($this->images as $image) {
                $file = $image->store("history_infra_images");
                InfrastructureHistoryFile::create([
                    "path" => $file,
                    "infrastructure_history_id" => $history->id
                ]);
            }
            DB::commit();
            $this->dispatch("cadastrado", [
                "modal" => "#createInfra", //id do modal
                "title" => "Registo de Atividade!",
                "icon" => "success",
                "text" => "Uma atividade foi cadastrada com sucesso."
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
