@section('employees') active @endsection
<div>
    <div class="row mb-3 g-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        @can('create employee')
                          <button class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#createEmployee">
                              <i class="fas fa-user-plus"></i> Novo
                          </button>
                        @endcan
                        <form action="">
                            <input type="text" class="form form-control col-8" placeholder="Código, Nome, NUIT" wire:keyup="search($event.target.value)">
                        </form>
                    </div>
                    <hr>
                    <form class="row align-items-center mr-2" wire:submit="generateReport()">
                        <div class="form-group col-4">
                            <label for="">Departamento</label>
                            <select name="" id="" class="form-control" wire:model="department" required>
                              <option value="" selected>escolha...</option>  
                              <option value="all">Todos</option>
                                @foreach ($departments as $department)
                                  <option value="{{$department->id}}">{{$department->label}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Sexo</label>
                            <select name="" id="" class="form-control" wire:model="gender" required>
                              <option value="" selected>escolha...</option>  
                              <option value="all">Todos</option>
                                @foreach ($genders as $gender)
                                  <option value="{{$gender->id}}">{{$gender->description}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Estado</label>
                            <select name="" id="" class="form-control" wire:model="status" required>
                              <option value="" selected>escolha...</option>  
                              <option value="all">Todos</option>
                                @foreach ($statuses as $key => $status)
                                  <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-1 pt-2">
                            <label for=""></label>
                            <button class="btn btn-primary" type="submit">
                                <i class="far fa-file-pdf"></i>
                            </button>
                        </div>
                    </form>
                    <hr>
                    <div>
                        <table class="table table-striped table-sms">
                          <thead>
                            <tr class="btn-reveal-trigger">
                                <th scope="col">Processo</th>
                                <th scope="col">NUIT</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Nascimento</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Estado Civil</th>
                                <th scope="col" class="text-center">Ação</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($employees as $employee)
                            <tr class="btn-reveal-trigger">
                              <td style="font-size: 10pt;">{{$employee->code}}</td>
                              <td style="font-size: 10pt;">{{$employee->nuit}}</td>
                              <td style="font-size: 10pt;">{{$employee->first_name}} {{$employee->last_name}}</td>
                              <td style="font-size: 10pt;">{{$employee->birth}}</td>
                              <td style="font-size: 10pt;">{{$employee->gender->description}}</td>
                              <td style="font-size: 10pt;">{{$employee->maritalStatus->description}}</td>
                              <td style="font-size: 10pt;" class="text-center">
                                  @can('create employee')
                                    <a href="{{route("employee", $employee->id)}}" class="btn btn-primary btn-sm px-4">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                  @else
                                    ---
                                  @endcan
                              </td>
                          </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <div>
                          {{ $employees->links() }}  
                        </div>                        
                      </div>
                      
                      
                </div>
            </div>
        </div>
        
        {{--<div class="col-xxl-5">
          <div class="card">
            <div class="card-header d-flex flex-between-center py-2 border-bottom">
              <h6 class="mb-0">Analise grafica por estado</h6>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="row align-items-center">
                <div class="col-md-12 col-xxl-12 mb-xxl-1">

                  <div class="position-relative">
                    <livewire:chart-employee-status :data="$employee_status" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>--}}
    </div>

    {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
    <div class="modal fade" id="createEmployee" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-6" role="document">
          <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="bg-light rounded-top-3 py-3 ps-4">
                <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-user-plus"></i> DADOS PESSOAIS</h4>
              </div>
              <div class="px-4 py-3">
                {{-- Dados do Modal --}}
                <livewire:formulario-cadastro-funcionario />
                {{-- Dados do Modal --}}

              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- MODAL DE CADASTRO DE FUNCIONARIOS--}}
</div>