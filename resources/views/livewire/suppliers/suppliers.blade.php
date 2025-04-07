@section('suppliers') active @endsection

<div>
    <div class="row mb-3 g-3">
        
      <div class="col-lg-12 col-xxl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9 d-flex">
                        <h1 class="h3 text-primary me-3">Fronecedores</h1>
                    </div>
                    <div class="col-3">
                        {{--<form action="">
                            <input type="text" class="form form-control col-8" placeholder="Código, Nome, NUIT" wire:keyup="search($event.target.value)">
                        </form>--}}
                    </div>
                </div>
                <hr>
                <div class="d-flex align-items-center justify-content-between mr-2">
                    <div class="form-group col-3">
                        <!--<label for="">Filtro</label>
                        <select name="" id="" class="form-control" wire:model="account" required>
                            <option value="" selected>escolha...</option>
                            <option value="all">Todas</option>
                            {{--@foreach ($account_types as $account)
                            <option value="{{$account->id}}">{{$account->description}}</option>
                            @endforeach--}}
                        </select>-->
                    </div>
                    <div class="form-group mt-4 col-7">
                        {{--<label for=""></label>
                        <button class="btn btn-primary" type="submit">
                            <i class="far fa-file-pdf"></i>
                        </button>--}}
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#createSupplier">
                            <i class="fas fa-user-plus"></i> Novo
                        </button>
                    </div>
                </div>
                <hr>
                <div>
                    <table class="table table-striped table-sms">
                      <thead>
                        <tr class="btn-reveal-trigger">
                            <th scope="col"  style="font-size: 11pt;">Nome</th>
                            <th scope="col"  style="font-size: 11pt;" class="text-center">NUIT</th>
                            <th scope="col"  style="font-size: 11pt;">Telefone</th>
                            <th scope="col"  style="font-size: 11pt;">Email</th>
                            <th scope="col"  style="font-size: 11pt;">Endereço</th>
                            <th scope="col"  style="font-size: 11pt;">Estado</th>
                            <th scope="col"  style="font-size: 11pt;" class="text-center">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($suppliers as $supplier)
                        <tr class="btn-reveal-trigger">
                            <td style="font-size: 10pt;">{{$supplier->name}}</td>
                            <td style="font-size: 10pt;" class="text-center">{{$supplier->nuit ? $supplier->nuit : "-"}}</td>
                            <td style="font-size: 10pt;">{{formatNumberMoz($supplier->phone)}}</td>
                            <td style="font-size: 10pt;">{{$supplier->email ? $supplier->email : "-"}}</td>
                            <td style="font-size: 10pt;">{{$supplier->address}}</td>
                            <td class="text-center">
                                @if ($supplier->status == "Activo")
                                    <span class="badge bg-success">{{$supplier->status}}</span>
                                @else
                                    <span class="badge bg-danger">{{$supplier->status}}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($supplier->status ==  "Activo")
                                    <button class="btn btn-warning btn-sm" wire:click='disableSupplier({{$supplier->id}})'>
                                        <i class="fa fa-ban"></i>
                                    </button>
                                @else
                                    <button class="btn btn-success btn-sm" wire:click='disableSupplier({{$supplier->id}})'>
                                        <i class="fa fa-check"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div>
                      {{--$customers->links()--}}
                    </div>                          
                  </div>
                  
                  
            </div>
        </div>
      </div>
        
    </div>

    {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
    <div class="modal fade" id="createSupplier" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md mt-4" role="document">
          <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="bg-light rounded-top-3 py-3 ps-4">
                <h5 class="mb-1" id="staticBackdropLabel">Cadastrar Fornecedor</h5>
              </div>
              <div class="px-4 py-3">


                <livewire:suppliers.supplier-registration-form />

              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- MODAL DE CADASTRO DE FUNCIONARIOS--}}
</div>