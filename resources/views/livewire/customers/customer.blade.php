@section('clients') active @endsection

<div>
        <div class="card mb-3">
          <div class="card-body row d-flex align-items-center">
                <div class="col-4">
                    <h6 class="text-primary">{{($customer->type_customer === "PF") ? "Pessoa Física" : "Pessoa Jurídica"}}</h6>
                    <h5 class="mb-0">{{$customer->name}}</h5>
                </div>
                <div class="col-8 row">
                    <a style="text-decoration: none" href="#" class="col-4 text-warning">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                          <div class="bg-holder bg-card" style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-2.png')}});"></div>
                          <div class="card-body position-relative">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <i class="fa fa-coins text-warning" style="font-size: 25pt;"></i>
                                </div>
                                <div class="col-8 text-center" style="font-size: 11pt;">
                                    <span><strong>Dívida</strong></span><br>
                                    <span>{{formatAmount($customer->debt)}} MT</span>
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
                                    <span><strong>Faturas</strong></span><br>
                                    <span>{{$customer->invoices->count()}}</span>
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
                                    <span><strong>L. Vencidas</strong></span><br>
                                    <span>{{$customer->expiredLicenses->count()}}</span>
                                </div>  
                            </div>
                            
                          </div>
                        </div>
                    </a>
                </div>
          </div>
        </div>
  
      <div class="row mb-3">
          <div class="col-5">
            
              <div class="row">
                  <div class="col-12">
                      <div class="card font-sans-serif">
                          <div class="card-body d-flex gap-3 flex-column flex-sm-row align-items-center">
                              <img class="rounded-3" src="{{asset('dashboard/img/consumer-icon.png')}}" alt="" width="100" />
                              <div>
                                    <h5>Dados</h5>
                                    <table class="table table-borderless fs--1 fw-medium mb-0">
                                        <tbody>
                                        <tr>
                                            <td class="p-1" style="width: 35%;">NUIT:</td>
                                            <td class="p-1 text-600">{{$customer->nuit}}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-1" style="width: 35%;">Telefone:</td>
                                            <td class="p-1 text-600">{{formatNumberMoz($customer->phone)}}</td>
                                        </tr>
                                        @if ($customer->secondary_phone)
                                            <tr>
                                                <td class="p-1" style="width: 35%;">Secundário:</td>
                                                <td class="p-1 text-600">{{formatNumberMoz($customer->secondary_phone)}}</td>
                                            </tr>
                                        @endif
                                        @if ($customer->email)
                                            <tr>
                                                <td class="p-1" style="width: 35%;">E-mail:</td>
                                                <td class="p-1 text-600">{{$customer->email}}</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                    
                                    <h5>Documentos</h5>
                                    <ul>
                                        @foreach ($customer->documents as $document)
                                            <li style="margin-left: 5px; font-size: 11pt;">{{$document->documentType->description}} 
                                                <a target="_blank" href="/storage/{{$document->file_path}}" class="ml-5"><i class="fas fa-file-pdf text-danger"></i></a>
                                            </li>
                                        @endforeach
                                    </ul>
                              </div>
                          </div>
                      </div>
                  </div>
            </div>
          </div>
          <div class="col-7">
            <div class="card h-100">
              <div class="card-header d-flex flex-between-center">
                <h5 class="mb-0 text-nowrap py-2 py-xl-0">Serviços contratados</h5>
                <div>
                  <button class="btn btn-primary btn-sm me-2 px-4" type="button" data-bs-toggle="modal" data-bs-target="#meusServicos">
                      <span class="fas fa-file fs--2"></span><span class="d-none d-sm-inline-block ms-1 align-middle">Novo</span>
                  </button>
              </div>
              </div>
              <div class="card-body p-0">
                  <table class="table mb-0 fs--1 border-200">
                    <thead class="bg-light text-900 font-sans-serif">
                      <tr class="bg-success text-white">
                        <th>Tipo de serviço</th>
                        {{--<th>Data de inicio</th>
                        <th>Data de termino</th>--}}
                        <th class="text-center">Estado</th>
                        <th class="text-center">Ação</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      @foreach ($contractedServices as $service)
                      <tr class="fw-semi-bold">
                        <td>{{$service->service->name}}</td>
                        {{--<td>{{$service->start_date ? $service->start_date : "-"}}</td>
                        <td>{{$service->end_date ? $service->end_date : "-"}}</td>--}}
                        <td class="text-center">
                            @if ($service->status == "Pendente")
                                <span class="badge bg-warning">Pendente</span>
                            @elseif($service->status == "Activo")
                                <span class="badge bg-primary">Activo</span>
                            @elseif($service->status == "Cancelado")
                                <span class="badge bg-danger">Cancelado</span>
                            @else
                                <span class="badge bg-success">Finalizado</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($service->status ==  "Activo")
                                <button class="btn btn-warning btn-sm" wire:click='disableService({{$service->id}})'>
                                    <i class="fa fa-ban"></i>
                                </button>
                            @else
                            -
                            @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="my-3 mx-2">
                    {{$contractedServices->links()}}
                  </div>
              </div>
            </div>
          {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
            <div class="modal fade" id="meusServicos" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md mt-6" role="document">
                <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="bg-light rounded-top-3 py-3 ps-4">
                    <h5 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-file"></i> Contratação do serviço</h5>
                    </div>
                    <div class="px-4 py-3">
                        <livewire:customers.contracted-service-form :customer="$customer" />
                    </div>
                </div>
                </div>
            </div>
            </div>
        {{-- MODAL DE CADASTRO DE FUNCIONARIOS--}}
        </div>
        
        
        {{--<script>
          document.addEventListener('livewire:initialized', () => {
              window.document.addEventListener("cadastrado", (event) => {
                  @this.atualizar();
              });
          });
        </script>--}}
      </div>
  </div>
  