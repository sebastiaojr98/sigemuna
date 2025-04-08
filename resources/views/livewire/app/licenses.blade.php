@section('licenses') active @endsection

<div>
    <div class="row mb-3 g-3">
        
      <div class="col-lg-12 col-xxl-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col-5">
                        <h1 class="h3 text-primary">Licenças</h1>
                    </div>
                    <div class="col-7"></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <a style="text-decoration: none" href="#" class="col-4 text-warning">
                                <div class="card overflow-hidden" style="min-width: 12rem">
                                <div class="bg-holder bg-card" style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-2.png')}});"></div>
                                <div class="card-body position-relative">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4">
                                            <i class="fa fa-coins text-warning" style="font-size: 25pt;"></i>
                                        </div>
                                        <div class="col-8 text-center" style="font-size: 11pt;">
                                            <span><strong>Não impressas</strong></span><br>
                                            <span>{{$report->notPrinted}}</span>
                                        </div>  
                                    </div>
                                    
                                </div>
                                </div>
                            </a>
                            <a style="text-decoration: none" href="#" class="col-4">
                                <div class="card overflow-hidden" style="min-width: 12rem">
                                <div class="bg-holder bg-card" style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-2.png')}});"></div>
                                <div class="card-body position-relative">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4">
                                            <i class="fa fa-file-invoice-dollar text-primary" style="font-size: 25pt;"></i>
                                        </div>
                                        <div class="col-8 text-center" style="font-size: 11pt;">
                                            <span><strong>Não assinadas</strong></span><br>
                                            <span>{{$report->notSigned}}</span>
                                        </div>  
                                    </div>
                                    
                                </div>
                                </div>
                            </a>
                            <a style="text-decoration: none" href="#" class="col-4">
                                <div class="card overflow-hidden" style="min-width: 12rem">
                                <div class="bg-holder bg-card" style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-2.png')}});"></div>
                                <div class="card-body position-relative">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4">
                                            <i class="fa fa-receipt text-danger" style="font-size: 25pt;"></i>
                                        </div>
                                        <div class="col-8 text-center text-danger" style="font-size: 11pt;">
                                            <span><strong>Vencidas</strong></span><br>
                                            <span>{{$report->expired}}</span>
                                        </div>  
                                    </div>
                                    
                                </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <table class="table table-striped table-sms">
                      <thead>
                        <tr class="btn-reveal-trigger">
                            <th scope="col"  style="font-size: 11pt;">Código</th>
                            <th scope="col"  style="font-size: 11pt;">Licença</th>
                            <th scope="col"  style="font-size: 11pt;">Cliente</th>
                            <th scope="col"  style="font-size: 11pt;" class="text-center">Impressa</th>
                            <th scope="col"  style="font-size: 11pt;" class="text-center">Assinada</th>
                            <th scope="col"  style="font-size: 11pt;" class="text-center">Estado</th>
                            <th scope="col"  style="font-size: 11pt;" class="text-center">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($licenses as $license)
                        <tr class="btn-reveal-trigger">
                            <td style="font-size: 10pt;">{{$license->code}}</td>
                            <td style="font-size: 10pt;">{{$license->serviceContracted->service->name}}</td>
                            <td style="font-size: 10pt;">{{$license->customer->name}}</td>
                            <td style="font-size: 10pt;" class="text-center">{{$license->printed}}</td>
                            <td style="font-size: 10pt;" class="text-center">{{$license->signed}}</td>
                            <td style="font-size: 10pt;" class="text-center">
                                @if ($license->status == "Emitida")
                                    <span class="badge bg-success">Activa</span>
                                @elseif($license->status == "Expirada")
                                    <span class="badge bg-warning">Expirada</span>
                                @else
                                    <span class="badge bg-danger">Cancelada</span>
                                @endif

                            </td>

                            
                            <td style="font-size: 10pt;" class="text-center">
                                <button class="btn btn-secondary btn-sm" wire:click='print({{$license->id}})'>
                                    <i class="fa fa-print"></i>
                                </button>

                                @if($license->signed === "Não")
                                    <button class="btn btn-primary btn-sm" wire:click='subscribe({{$license->id}})'>
                                        <i class="fa fa-check"></i>
                                    </button>
                                @endif
                            </td>
                            
                        </tr>
                        @empty
                            <tr>
                                <td colspan="8">Nenhum registro encontrado!</td>
                            </tr>
                        @endforelse
                      </tbody>
                    </table>
                    <div>
                      {{$licenses->links()}}
                    </div>                          
                  </div>
                  
                  
            </div>
        </div>
      </div>
        
    </div>

    {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
    <div class="modal fade" id="makePayment" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md mt-4" role="document">
          <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="bg-light rounded-top-3 py-3 ps-4">
                <h5 class="mb-1" id="staticBackdropLabel">Efetuar Pagamento</h5>
              </div>
              <div class="px-4 py-3">


                {{--<livewire:finances.payment-form/>--}}

              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- MODAL DE CADASTRO DE FUNCIONARIOS--}}
</div>