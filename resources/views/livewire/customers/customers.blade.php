@section('clients') active @endsection

<div>
    <div class="row mb-3 g-3">
        
      <div class="col-lg-12 col-xxl-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    @can('create customer')
                      <button class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#createClient">
                          <i class="fas fa-user-plus"></i> Novo
                      </button>
                    @endcan
                    <form action="">
                        <input type="text" class="form form-control col-8" placeholder="Código, Nome, NUIT" wire:keyup="search($event.target.value)">
                    </form>
                </div>
                <hr>
                <!--form class="row align-items-center mr-2" wire:submit="createReport()">
                    <div class="form-group col-4">
                        <label for="">Tipo de Conta</label>
                        <select name="" id="" class="form-control" wire:model="account" required>
                            <option value="" selected>escolha...</option>
                            <option value="all">Todas</option>
                            {{--@foreach ($account_types as $account)
                            <option value="{{$account->id}}">{{$account->description}}</option>
                            @endforeach--}}
                        </select>
                    </div>
                    <div class="form-group col-1 pl-3">
                        <label for=""></label>
                        <button class="btn btn-primary" type="submit">
                            <i class="far fa-file-pdf"></i>
                        </button>
                    </div>
                </form>
                <hr-->
                <div>
                    <table class="table table-striped table-sms">
                      <thead>
                        <tr class="btn-reveal-trigger">
                            <th scope="col"  style="font-size: 11pt;">Tipo de Conta</th>
                            <th scope="col"  style="font-size: 11pt;">Nome</th>
                            <th scope="col"  style="font-size: 11pt;">NUIT</th>
                            <th scope="col"  style="font-size: 11pt;">Telefone</th>
                            <th scope="col"  style="font-size: 11pt;" class="text-center">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($customers as $customer)
                        <tr class="btn-reveal-trigger">
                            <td style="font-size: 10pt;">{{($customer->type_customer === "PF") ? "Pessoa Física" : "Pessoa Jurídica"}}</td>
                            <td style="font-size: 10pt;">{{$customer->name}}</td>
                            <td style="font-size: 10pt;">{{$customer->nuit ? $customer->nuit : "-"}}</td>
                            <td style="font-size: 10pt;">{{formatNumberMoz($customer->phone)}}</td>
                            @can('view customer')
                              <td style="font-size: 10pt;" class="text-center">
                                  <a href="{{route("customer", $customer->id)}}" class="btn btn-primary btn-sm px-4">
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
                      {{$customers->links()}}
                    </div>                          
                  </div>
                  
                  
            </div>
        </div>
      </div>
        
    </div>

    {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
    <div class="modal fade" id="createClient" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md mt-4" role="document">
          <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="bg-light rounded-top-3 py-3 ps-4">
                <h5 class="mb-1" id="staticBackdropLabel">Cadastrar Cliente</h5>
              </div>
              <div class="px-4 py-3">


                <livewire:customers.customer-registration-form />

              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- MODAL DE CADASTRO DE FUNCIONARIOS--}}
</div>