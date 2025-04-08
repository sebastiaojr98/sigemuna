@section('infrastructures') active @endsection
<div>
    <div class="row mb-3 g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        @can('create infrastructure')
                          <button class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#createInfra">
                              <i class="fas fa-building"></i> Novo
                          </button>
                        @endcan
                        <form action="">
                            <input type="text" class="form form-control col-8" placeholder="Código" wire:keyup="search($event.target.value)">
                        </form>
                    </div>
                    <hr>
                    <form class="row col-8 align-items-center mr-2" wire:submit="printReport()">
                        <div class="form-group col-4">
                            <label for="">Tipo</label>
                            <select name="" id="" class="form-control" wire:model="type" required>
                                <option value="" selected>escolha...</option>
                                <option value="all">Todos</option>
                                @foreach ($types as $type)
                                  <option value="{{$type->id}}">{{$type->label}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Bairro</label>
                            <select name="" id="" class="form-control" wire:model="location" required>
                                <option value="" selected>escolha...</option>
                                <option value="all">Todos</option>
                                @foreach ($locations as $location)
                                    <option value="{{$location->id}}">{{$location->label}}</option>
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
                        <div class="form-group col-1 pl-3">
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
                                <th style="font-size: 10pt;" scope="col">Código</th>
                                <th style="font-size: 10pt;" scope="col">Tipo</th>
                                <th style="font-size: 10pt;" scope="col">Bairro</th>
                                <th style="font-size: 10pt;" scope="col" class="text-center">Estado</th>
                                <th style="font-size: 10pt;" scope="col" class="text-center">Ação</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($infrastructures as $infrastructure)
                            <tr class="btn-reveal-trigger">
                                <td style="font-size: 10pt;">{{$infrastructure->code}}</td>
                                <td style="font-size: 10pt;">{{$infrastructure->infrastructureType->label}}</td>
                                <td style="font-size: 10pt;">{{$infrastructure->neighborhood->label}}</td>
                                @if ($infrastructure->status == "0")
                                <td style="font-size: 10pt;" class="text-center"><span class="badge bg-danger">Encerrado</span></td>
                                @elseif($infrastructure->status == "1")
                                <td style="font-size: 10pt;" class="text-center"><span class="badge bg-primary">Funcionamento</span></td>
                                @elseif($infrastructure->status == "2")
                                <td style="font-size: 10pt;" class="text-center"><span class="badge bg-warning">Manutenção</span></td>
                                @endif
                                @can('create infrastructure')
                                  <td style="font-size: 10pt;" class="text-center">
                                      <a href="{{route("infrastructure", $infrastructure->id)}}" class="btn btn-primary btn-sm px-4">
                                          <i class="fas fa-eye"></i>
                                      </a>
                                  </td>
                                @else
                                  ---
                                @endcan
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <div>
                          {{ $infrastructures->links() }}  
                        </div>                         
                      </div>
                      
                      
                </div>
            </div>
        </div>
        {{--<div class="col-xxl-4">
          <div class="card">
            <div class="card-header d-flex flex-between-center py-2 border-bottom">
              <h6 class="mb-0">Analise grafica de Infraestrutras</h6>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="row align-items-center">
                <div class="col-md-5 col-xxl-12 mb-xxl-1">
                  <div class="position-relative">
                    <livewire:chart-infra :data="$infras2" />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer"></div>
          </div>
        </div>--}}
        
    </div>

    {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
    <div class="modal fade" id="createInfra" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md mt-6" role="document">
          <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="bg-light rounded-top-3 py-3 ps-4">
                <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-building"></i> Infraestrutura</h4>
              </div>
              <div class="px-4 py-3">
                {{-- Dados do Modal --}}
                <livewire:formulario-infraestrutura />
                {{-- Dados do Modal --}}

              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- MODAL DE CADASTRO DE FUNCIONARIOS--}}
</div>


<script>
  document.addEventListener('livewire:initialized', () => {
      window.document.addEventListener("cadastrado", (event) => {
          @this.atualizar();
      });
  });
</script>