@section('revenues') active @endsection
<div>
    <div class="row mb-3 g-3">
        <div class="col-lg-12 col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        @can('create revenue')
                          <button class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#createRevenue">
                              <i class="fas fa-coins"></i> Novo
                          </button>
                        @endcan
                        <form action="">
                            <input type="text" class="form form-control col-8" placeholder="Código" wire:keyup="search($event.target.value)">
                        </form>
                    </div>
                    <hr>
                    <livewire:revenue-card-relatory />
                    <hr>
                    <form class="row align-items-center justify-content-center mr-2"  wire:submit="printReport()">
                        <div class="form-group col-3">
                            <label for="">Tipo de Receita</label>
                            <select name="" id="" class="form-control" wire:model="type" required>
                                <option value="" selected>escolha...</option>
                                <option value="all">Todas</option>
                                @foreach ($revenue_types as $item)
                                <option value="{{$item->id}}">{{$item->label}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-2">
                          <label for="">Inicio</label>
                          <input type="date" name="" id="" class="form form-control" max="{{date("Y-m-d")}}" wire:model="start_date" required>
                      </div>
                      <div class="form-group col-2">
                          <label for="">Termino</label>
                          <input type="date" name="" id="" class="form form-control" max="{{date("Y-m-d")}}" wire:model="end_date" required>
                      </div>
                        <div class="form-group col-2">
                          <label for="">Estado</label>
                          <select name="" id="" class="form-control" wire:model="status" required>
                              <option value="" selected>escolha...</option>
                              <option value="all">Todos</option>
                              @foreach ($statuses as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
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
                    <hr>
                    <div>
                        <table class="table table-striped table-sms">
                          <thead>
                            <tr class="btn-reveal-trigger">
                                <th scope="col"  style="font-size: 11pt;">Código</th>
                                <th scope="col"  style="font-size: 11pt;">Tipo de Receita</th>
                                <th scope="col"  style="font-size: 11pt;">Cliente</th>
                                <th scope="col"  style="font-size: 11pt;" class="text-end">Custo</th>
                                <th scope="col"  style="font-size: 11pt;" class="text-center">Estado</th>
                                <th scope="col"  style="font-size: 11pt;" class="text-center">Ação</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($internal_revenues as $internal_revenue)
                            <tr class="btn-reveal-trigger">
                                <td style="font-size: 10pt;">{{$internal_revenue->process_number}}</td>
                                <td style="font-size: 10pt;">{{$internal_revenue->typeRevenue->label}}</td>
                                <td style="font-size: 10pt;">{{$internal_revenue->client->full_name}}</td>
                                <td style="font-size: 10pt;" class="text-end">{{number_format($internal_revenue->amount, 2, ".", " ")}} MT</td>
                                @if ($internal_revenue->status == "0")
                                <td style="font-size: 10pt;" class="text-center"><span class="badge bg-warning">Pendente</span></td>
                                @elseif($internal_revenue->status == "1")
                                <td style="font-size: 10pt;" class="text-center"><span class="badge bg-success">Pago</span></td>
                                @endif
                                <td style="font-size: 10pt;" class="text-center">
                                    @if ($internal_revenue->status == "1")
                                      <button class="btn btn-sm btn-transparent" wire:click="printRevenue({{$internal_revenue->id}})">
                                        <i class="fas fa-file-pdf text-danger" style="font-size: 15pt;"></i>
                                      </button>
                                    @else
                                      <button class="btn btn-sm btn-transparent" wire:click="printInvoice({{$internal_revenue->id}})">
                                        <i class="fas fa-file-pdf text-danger" style="font-size: 15pt;"></i>
                                      </button>
                                      @can('pay revenue')
                                        <button class="btn btn-sm btn-primary" wire:click="$dispatch('make-payment', { code: '{{$internal_revenue->process_number}}', revenue: {{$internal_revenue->id}} })">
                                          <i class="fas fa-check"></i>
                                        </button>
                                      @else
                                        ---
                                      @endcan
                                    @endif
                                </td>
                            </tr>
                            @empty
                              <tr>
                                <td>---</td>
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
                          {{$internal_revenues->links()}}  
                        </div>                        
                      </div>
                      
                      
                </div>
            </div>
        </div>
        
    </div>

    {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
    <div class="modal fade" id="createRevenue" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md mt-6" role="document">
          <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="bg-light rounded-top-3 py-3 ps-4">
                <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-coins text-success"></i> RECEITA</h4>
              </div>
              <div class="px-4 py-3">
                {{-- Dados do Modal --}}
                <livewire:formulario-receita-interna />
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
    window.document.addEventListener("make-payment", (event) => {
    //console.log(event.__livewire.params);
    
      Swal.fire({
        title: "Efetuar Pagamento?",
        text: `Atenção! Ao clicar em Confirmar, você irá efetuar o pagamento do movimento: ${event.__livewire.params.code}.`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00d27a",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, Pagar-o!",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
          @this.payRevenue(event.__livewire.params.revenue);
        }

      });
    
    });

    window.document.addEventListener("cadastrado", (event) => {
      @this.atualizar();
    });
  });
</script>
