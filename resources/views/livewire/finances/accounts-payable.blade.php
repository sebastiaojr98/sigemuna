@section('accounts-payable') active @endsection

<div>
    <div class="row mb-3 g-3">
        
      <div class="col-lg-12 col-xxl-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col-5">
                        <h1 class="h3 text-primary">Contas a Pagar</h1>
                    </div>
                    <div class="col-7">
                        <div class="row justify-content-between align-items-center"">
                            <div class="d-flex col-6 align-items-center">
                                <h5 class="me-3">Filtro: </h5>
                                <select class="from form-control" wire:model='filter'>
                                    <option value="">escolha...</option>
                                    @foreach ($filters as $filter)
                                        <option value="{{$filter}}">{{$filter}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form form-control col-8" placeholder="escreva o(a) " wire:keyup="search($event.target.value)">
                            </div>
                        </div>
                    </div>
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
                                            <span><strong>Pendente</strong></span><br>
                                            <span>{{--$pending--}}</span>
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
                                            <span><strong>A pagar</strong></span><br>
                                            <span>MT {{--formatAmount($toReceive)--}}</span>
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
                                            <span>{{--$expired--}}</span>
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
                            <th scope="col"  style="font-size: 11pt;">Despesa</th>
                            <th scope="col"  style="font-size: 11pt;">Fornecedor</th>
                            <th scope="col"  style="font-size: 11pt;">Valor (MT)</th>
                            <th scope="col"  style="font-size: 11pt;">Pago (MT)</th>
                            <th scope="col"  style="font-size: 11pt;">Vencimento</th>
                            <th scope="col"  style="font-size: 11pt;">Comprovativos</th>
                            <th scope="col"  style="font-size: 11pt;">Estado</th>
                            <th scope="col"  style="font-size: 11pt;">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($accountsPayable as $ap)
                        <tr class="btn-reveal-trigger">
                            <td style="font-size: 10pt;">{{$ap->expense->name}}</td>
                            <td style="font-size: 10pt;">{{$ap->supplier->name}}</td>
                            <td style="font-size: 10pt;">{{formatAmount($ap->amount_due)}}</td>
                            <td style="font-size: 10pt;">{{formatAmount($ap->amount_paid)}}</td>
                            <td style="font-size: 10pt;">
                                @if ($ap->status == "Pago")
                                    -
                                @else
                                    {{date('d-m-Y', strtotime($ap->due_date))}}                                    
                                @endif
                            </td>
                            <td style="font-size: 10pt;" class="text-center">
                                
                                @forelse ($ap->supplierPayment as $supplierPayment)
                                    <a target="_blank" href="#"><i class="fa fa-file-pdf text-danger"></i></a>
                                @empty
                                    -
                                @endforelse

                            </td>
                            <td style="font-size: 10pt;" class="text-center">
                                @if ($ap->status == "Pendente")
                                    <span class="badge bg-warning">{{$ap->status}}</span>
                                @elseif($ap->status == "Parcial")
                                    <span class="badge bg-primary">{{$ap->status}}</span>
                                @else
                                    <span class="badge bg-success">{{$ap->status}}</span>
                                @endif

                            </td>
                            <td style="font-size: 10pt;" class="text-center">
                                @if ($ap->status != "Pago")
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#makePayment" wire:click='selectAccountReceivable({{$ap}})'>
                                        <i class="fa fa-check"></i>
                                    </button>
                                @else
                                    -
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
                      {{$accountsPayable->links()}}
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


                <livewire:finances.payment-form/>

              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- MODAL DE CADASTRO DE FUNCIONARIOS--}}
</div>