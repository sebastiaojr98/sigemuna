@section('investments') active @endsection
<div>
    <div class="row mb-3 g-3">
        <div class="col-lg-12 col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        @can('create investment')
                          <button class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#createEmployee">
                              <i class="fas fa-coins"></i> Novo
                          </button>
                        @endcan
                        {{--<form action="">
                            <input type="text" class="form form-control col-8" placeholder="numero do processo">
                        </form>--}}
                    </div>
                    {{--<hr>
                    <form class="row align-items-center mr-2" wire:submit="printRelatoty()">
                        <div class="form-group col-3">
                            <label for="">Investidor</label>
                            <select class="form-control" wire:model="investor" required>
                                <option value="" selected>escolha...</option>
                                <option value="all">Todos</option>
                                @foreach ($investors as $investor)
                                <option value="{{$investor->id}}">{{$investor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-2">
                            <label for="">Data de Inicio</label>
                            <input type="date" name="" id="" class="form form-control" max="{{date("Y-m-d")}}" wire:model="start_date" required>
                        </div>
                        <div class="form-group col-2">
                            <label for="">Data de Termino</label>
                            <input type="date" name="" id="" class="form form-control"   wire:model="end_date" required>
                        </div>
                        <div class="form-group col-1" style="margin-top: 30px;">
                            <label for=""></label>
                            <button class="btn btn-primary" type="submit">
                                <i class="far fa-file-pdf"></i>
                            </button>
                        </div>
                    </form>--}}
                    <hr>
                    <livewire:investment-card-relatory />
                    <hr>
                    <div>
                        <table class="table table-striped table-sms">
                          <thead>
                            <tr class="btn-reveal-trigger">
                                <th scope="col"  style="font-size: 11pt;">Processo</th>
                                <th scope="col"  style="font-size: 11pt;">Investidor</th>
                                <th scope="col"  style="font-size: 11pt;" class="text-end">Montante</th>
                                <th scope="col"  style="font-size: 11pt;"  class="text-center">Data de Inicio</th>
                                <th scope="col"  style="font-size: 11pt;"  class="text-center">Data de Termino</th>
                                <th scope="col"  style="font-size: 11pt;"  class="text-center">Taxa de Retorno</th>
                                <th scope="col"  style="font-size: 11pt;"  class="text-center">Estado</th>
                                <th scope="col"  style="font-size: 11pt;"  class="text-center">Anexo</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($investments as $investment)
                            <tr class="btn-reveal-trigger">
                                <td style="font-size: 10pt;">{{$investment->process_number}}</td>
                                <td style="font-size: 10pt;">{{$investment->investor->name}}</td>
                                <td style="font-size: 10pt;" class="text-end">{{number_format($investment->amount, 2, ".", " ")}} MT</td>
                                <td style="font-size: 10pt;"  class="text-center">{{$investment->start_date}}</td>
                                <td style="font-size: 10pt;"  class="text-center">{{$investment->end_date}}</td>
                                <td style="font-size: 10pt;"  class="text-center">{{$investment->return_rate}} %</td>
                                @if ($investment->status == "0")
                                    <td style="font-size: 10pt;" class="text-danger text-center"><span class="badge bg-danger">Cancelado</span></td>
                                  @elseif($investment->status == "1")
                                    <td style="font-size: 10pt;" class="text-primary text-center"><span class="badge bg-primary">Ativo</span></td>
                                  @elseif($investment->status == "2")
                                    <td style="font-size: 10pt;" class="text-success text-center"><span class="badge bg-success">Concluido</span></td>
                                  @endif
                                <td class="text-center">
                                  <a target="_blank" href="{{asset("/storage/".$investment->document)}}" class="text-danger"> <i class="fas fa-file-pdf" style="font-size: 17pt;"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        
                        <div class="text-center">
                          {{$investments->links()}}
                        </div>
                      </div>
                      
                      
                </div>
            </div>
        </div>
        {{--<div class="col-xxl-4">
          <div class="card">
            <div class="card-header d-flex flex-between-center py-2 border-bottom">
              <h6 class="mb-0">Analise grafica de Investimentos</h6>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="row align-items-center">
                <div class="col-md-5 col-xxl-12 mb-xxl-1">
                  <div class="position-relative">
                    <div id="chartx2"></div>
                  </div>
                  <div class="col-xxl-12 col-md-7">
                    <hr class="mx-nx1 mb-0 d-md-none d-xxl-block" />
                    <div class="d-flex flex-between-center border-bottom py-3 pt-md-0 pt-xxl-3">
                      <div class="d-flex">
                        <h6 class="text-700 mb-0"><i class="fas fa-male"></i> Homens </h6>
                      </div>
                      <p class="fs--1 text-500 mb-0 fw-semi-bold">1052</p>
                      <h6 class="text-700 mb-0">33%</h6>
                    </div>
                    <div class="d-flex flex-between-center border-bottom py-3 pt-md-0 pt-xxl-3">
                      <div class="d-flex">
                        <h6 class="text-700 mb-0"><i class="fas fa-female"></i> Mulheres </h6>
                      </div>
                      <p class="fs--1 text-500 mb-0 fw-semi-bold">2200</p>
                      <h6 class="text-700 mb-0">67%</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>--}}
        
    </div>

    {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
    <div class="modal fade" id="createEmployee" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md mt-6" role="document">
          <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="bg-light rounded-top-3 py-3 ps-4">
                <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-coins text-success"></i> INVESTIMENTO</h4>
              </div>
              <div class="px-4 py-3">
                {{-- Dados do Modal --}}
                <livewire:formulario-investimento />
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