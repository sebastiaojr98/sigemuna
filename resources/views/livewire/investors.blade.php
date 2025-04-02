@section('investors') active @endsection
<div>
    <div class="row mb-3 g-3">
        <div class="col-lg-12 col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        @can('create investor')
                          <button class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#createEmployee">
                              <i class="fas fa-university"></i> Novo
                          </button>
                        @endcan
                        {{--<form action="">
                            <input type="text" class="form form-control col-8" placeholder="nome">
                        </form>--}}
                    </div>
                    <hr>
                    {{--<form class="row align-items-center mr-2" wire:submit="printRelatory()">
                        <div class="form-group col-3">
                            <label for="">Tipo de Investidor</label>
                            <select name="" id="" class="form-control" wire:model="investor" required>
                                <option value="" selected>escolha...</option>
                                <option value="all">Todos</option>
                                @foreach ($investor_types as $investor_type)
                                <option value="{{$investor_type->id}}">{{$investor_type->label}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-1 pl-3" style="margin-top: 30px;">
                            <label for=""></label>
                            <button class="btn btn-primary" type="submit">
                                <i class="far fa-file-pdf"></i>
                            </button>
                        </div>
                    </form>
                    <hr>--}}
                    <div>
                        <table class="table table-striped table-sms">
                          <thead>
                            <tr class="btn-reveal-trigger">
                                <th scope="col"  style="font-size: 9pt;">Tipo de Investidor</th>
                                <th scope="col"  style="font-size: 9pt;">Nome</th>
                                <th scope="col"  style="font-size: 9pt;">País</th>
                                <th scope="col"  style="font-size: 9pt;">Cidade</th>
                                <th scope="col"  style="font-size: 9pt;">Endereco</th>
                                <th scope="col"  style="font-size: 9pt;">Telefone</th>
                                <th scope="col"  style="font-size: 9pt;">Email</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($investors as $investor)
                            <tr class="btn-reveal-trigger">
                                <td style="font-size: 9pt;">{{$investor->investorType->label}}</td>
                                <td style="font-size: 9pt;">{{$investor->name}}</td>
                                <td style="font-size: 9pt;">{{$investor->country}}</td>
                                <td style="font-size: 9pt;">{{$investor->city}}</td>
                                <td style="font-size: 9pt;">{{$investor->address}}</td>
                                <td style="font-size: 9pt;">{{$investor->phone}}</td>
                                <td style="font-size: 9pt;">{{$investor->email}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <div>
                          {{$investors->links()}}  
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
                <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-university text-primary"></i> INVESTIDOR</h4>
              </div>
              <div class="px-4 py-3">
                {{-- Dados do Modal --}}
                <livewire:formulario-investidor />
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