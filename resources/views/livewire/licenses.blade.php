@section('licenses') active @endsection
<div>
    <div class="row mb-3 g-3">
        <div class="col-lg-12 col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        @can('create activity')
                          <button class="btn btn-primary btn-md me-2" type="button" data-bs-toggle="modal" data-bs-target="#administrativePosts">
                              <span class="fas fa-plus"></span> <span class="d-none d-md-inline">Novo</span>
                          </button>
                        @endcan
                        {{--<form action="">
                            <input type="text" class="form form-control col-8" placeholder="nome">
                        </form>--}}
                    </div>
                    <hr>
                    <div>
                        <table class="table table-striped table-sms">
                          <thead>
                            <tr class="btn-reveal-trigger">
                                <th scope="col"  style="font-size: 11pt;">Especificação</th>
                                <th scope="col"  style="font-size: 11pt;">Tipo de Licença</th>
                                <th scope="col"  style="font-size: 11pt;" class="text-end">Custo</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($licenses as $license)
                            <tr class="btn-reveal-trigger">
                                <td style="font-size: 11pt;">{{$license->name}}</td>
                                <td style="font-size: 11pt;">{{$license->licenseType->description}}</td>
                                <td style="font-size: 11pt;" class="text-end">{{number_format($license->amount, 2, ".", " ")}} MT</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                         {{ $licenses->links() }}                      
                      </div>
                      
                      
                </div>
            </div>
        </div>
        
    </div>

    {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
    <div class="modal fade" id="administrativePosts" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md mt-6" role="document">
          <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="bg-light rounded-top-3 py-3 ps-4">
                <h4 class="mb-1" id="staticBackdropLabel">LICENÇA</h4>
              </div>
              <div class="px-4 py-3">
                {{-- Dados do Modal --}}
                <livewire:formulario-cadastrar-licenca />
                {{-- Dados do Modal --}}

              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- MODAL DE CADASTRO DE FUNCIONARIOS--}}
</div>