<div>
  <div class="card mb-3">
        <div class="card-body d-flex flex-wrap flex-between-center">
            <div>
                <h6 class="text-primary">Chefe de Recursos Humanos</h6>
                <h5 class="mb-0">{{$employee->first_name}} {{$employee->last_name}}</h5>
            </div>
            <div>
              @can('update employee')
                <button class="btn btn-warning btn-md me-2" type="button" data-bs-toggle="modal" data-bs-target="#editEmployee">
                  <span class="fas fa-user-edit me-md-1"> </span><span class="d-none d-md-inline">Editar</span>
                </button>
              @endcan
              <button class="btn btn-primary btn-md me-2" type="button" wire:click="printUser({{$employee->id}})">
                <span class="fas fa-print me-md-1"> </span><span class="d-none d-md-inline">Imprimir</span>
              </button>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-xxl-6">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card font-sans-serif">
                        <div class="card-body d-flex gap-3 flex-column flex-sm-row align-items-center">
                            <img class="rounded-3" src="{{asset("img/avatar.png")}}" alt="" width="112" />
                            <table class="table table-borderless fs--1 fw-medium mb-0">
                                <tbody>
                                <tr>
                                    <td class="p-1" style="width: 35%;">Número do processo:</td>
                                    <td class="p-1 text-600">{{$employee->code}}</td>
                                </tr>
                                <tr>
                                    <td class="p-1" style="width: 35%;">NUIT:</td>
                                    <td class="p-1 text-600">{{$employee->nuit}}</td>
                                </tr>
                                <tr>
                                    <td class="p-1" style="width: 35%;">Nome do Pai:</td>
                                    <td class="p-1"><a class="text-600 text-decoration-none" href="tel:+01234567890 ">{{$employee->father_name}}</a></td>
                                </tr>
                                <tr>
                                    <td class="p-1" style="width: 35%;">Nome da Mae:</td>
                                    <td class="p-1"><a class="text-600 text-decoration-none" href="tel:+01234567890 ">{{$employee->name_mother}}</a></td>
                                </tr>
                                <tr>
                                    <td class="p-1" style="width: 35%;">Estado Civil:</td>
                                    <td class="p-1"><a class="text-600 text-decoration-none" href="tel:+01234567890 ">{{$employee->maritalStatus->description}}</a></td>
                                </tr>
                                <tr>
                                  <td class="p-1" style="width: 35%;">Sexo:</td>
                                  <td class="p-1"><a class="text-600 text-decoration-none" href="tel:+01234567890 ">{{$employee->gender->description}}</a></td>
                              </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Componente de Residencia --}}
                <livewire:residencia :employee="$employee" />
          </div>
        </div>
        <div class="col-xxl-6">
            <div class="row">
              {{-- Domicilio Bancario --}}  
              <livewire:domicilio-bancario :employee="$employee" />
            </div>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <livewire:meus-documentos :employee="$employee" />

        @if ($employee->maritalStatus->label != "S")
        <livewire:conjuge :employee="$employee" />
        @endif

        <livewire:agregado-familiar :employee="$employee" />

        <livewire:contactos-pessoais :employee="$employee" />

        <livewire:contactos-alternativos :employee="$employee" />

        <livewire:qualificacoes-academicas :employee="$employee" />

        <livewire:experiencias-profissionais :employee="$employee" />

        <livewire:contratacao :employee="$employee" />

        @if ($employee->hiring)
        <livewire:nomeacao-provisoria :employee="$employee" />
        @endif

        @if ($employee->provisionalAppointment)
        <livewire:nomeacao-definitiva :employee="$employee" />
        @endif

        @if ($employee->hiring)
        <livewire:desenvolvimento-profissional-interno :employee="$employee" />
        @endif

        @if ($employee->hiring)
              <livewire:avaliacao-desempenho :employee="$employee" />
            @endif

            <livewire:minhas-ocorrencias :employee="$employee" />
    </div>


    {{-- MODAL DE EDICAO DE FUNCIONARIOS --}}
    <div class="modal fade" id="editEmployee" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg mt-6" role="document">
        <div class="modal-content border-0">
          <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
              <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-0">
            <div class="bg-light rounded-top-3 py-3 ps-4">
              <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-user-edit"></i> DADOS PESSOAIS</h4>
            </div>
            <div class="px-4 py-3">
              {{-- Dados do Modal --}}
              <livewire:formulario-edicao-funcionario :employee="$employee" />
              {{-- Dados do Modal --}}

            </div>
          </div>
        </div>
      </div>
    </div>
  {{-- MODAL DE EDICAO DE FUNCIONARIOS--}}
</div>