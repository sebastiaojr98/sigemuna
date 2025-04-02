@section('expenses') active @endsection
<div>
    <div class="row mb-3 g-3">
        <div class="col-lg-12 col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        @can('create expense')
                          <button class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#createExpense">
                              <i class="fas fa-coins"></i> Novo
                          </button>
                        @endcan
                        <form action="">
                            <input type="text" class="form form-control col-8" placeholder="Código" wire:keyup="search($event.target.value)">
                        </form>
                    </div>
                    <hr>
                    <livewire:expense-card-relatory />
                    <hr>

                    <form class="row align-items-center justify-content-center mr-2" wire:submit="createReport()">
                        <div class="form-group col-3">
                            <label for="">Tipo de Despesa</label>
                            <select name="" id="" class="form-control" wire:model="expense_type" required>
                              <option value="" selected>escolha...</option>  
                              <option value="all">Todos</option>
                                @foreach ($expense_types as $expense_type)
                                  <option value="{{$expense_type->id}}">{{$expense_type->label}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Inicio</label>
                            <input type="date" name="" id="" class="form form-control" max="{{date("Y-m-d")}}" wire:model="start_date" required>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Termino</label>
                            <input type="date" name="" id="" class="form form-control" max="{{date("Y-m-d")}}" wire:model="end_date" required>
                        </div>
                        <div class="form-group col-1" style="margin-top: 27px;">
                            <label for=""></label>
                            <button class="btn btn-primary btn-sm" type="submit">
                                <i class="far fa-file-pdf"></i>
                            </button>
                        </div>
                    </form>
                    <hr>
                    <div>
                        <table class="table table-striped">
                          <thead>
                            <tr class="btn-reveal-trigger">
                                <th scope="col"  style="font-size: 11pt;">Código</th>
                                <th scope="col"  style="font-size: 11pt;">Tipo de Despesa</th>
                                <th scope="col"  style="font-size: 11pt;" class="text-end">Custo</th>
                                <th scope="col"  style="font-size: 11pt;" class="text-center">Data</th>
                                <th scope="col"  style="font-size: 11pt;" class="text-center">Anexo</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($expenses as $expense)
                            <tr class="btn-reveal-trigger">
                                <td style="font-size: 10pt;">{{$expense->reference}}</td>
                                <td style="font-size: 10pt;">{{$expense->typeExpense->label}}</td>
                                <td style="font-size: 10pt;" class="text-end">{{number_format($expense->amount, 2, ".", " ")}} MT</td>
                                <td style="font-size: 10pt;" class="text-center">{{ date("d/m/Y", strtotime($expense->expense_date)) }}</td>
                                <td class="text-center">
                                  <a  target="_blank" href="{{asset("/storage/".$expense->document)}}" class="text-danger"> <i class="fas fa-file-pdf" style="font-size: 15pt;"></i> </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                              <td>---</td>
                              <td>---</td>
                              <td class="text-end">---</td>
                              <td class="text-center">---</td>
                              <td class="text-center">---</td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>
                        
                        <div>
                          {{$expenses->links()}}  
                        </div>                          
                    </div>
                    
                      
                      
                </div>
            </div>
        </div>
        
    </div>

    {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
    <div class="modal fade" id="createExpense" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md mt-6" role="document">
          <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="bg-light rounded-top-3 py-3 ps-4">
                <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-coins text-danger"></i> DESPESA</h4>
              </div>
              <div class="px-4 py-3">
                {{-- Dados do Modal --}}
                <livewire:formulario-despesas />
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