@section('complaints') active @endsection
<div>
    <div class="row mb-3 g-3">
        <div class="col-lg-12 col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div></div>
                        <form action="">
                            <input type="text" class="form form-control col-8" placeholder="referencia">
                        </form>
                    </div>
                    <hr>
                    {{--<form class="row align-items-center mr-2">
                        <div class="form-group col-4">
                            <label for="">Departamento</label>
                            <select name="" id="" class="form-control">
                                <option value="">escolha...</option>
                                <option value="">escolha...</option>
                                <option value="">escolha...</option>
                                <option value="">escolha...</option>
                                <option value="">escolha...</option>
                                <option value="">escolha...</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Sexo</label>
                            <select name="" id="" class="form-control">
                                <option value="">escolha...</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Estado</label>
                            <select name="" id="" class="form-control">
                                <option value="">escolha...</option>
                            </select>
                        </div>
                        <div class="form-group col-1 pl-3">
                            <label for=""></label>
                            <button class="btn btn-primary">
                                <i class="far fa-file-pdf"></i>
                            </button>
                        </div>
                    </form>
                    <hr>--}}
                    <div>
                        <table class="table table-striped">
                          <thead>
                            <tr class="btn-reveal-trigger">
                                <th scope="col"  style="font-size: 11pt;">Referencia</th>
                                <th scope="col"  style="font-size: 11pt;">Nome</th>
                                <th scope="col"  style="font-size: 11pt;">Telefone</th>
                                <th scope="col"  style="font-size: 11pt;">Data</th>
                                <th scope="col"  style="font-size: 11pt;" class="text-center">Estado</th>
                                <th scope="col"  style="font-size: 11pt;" class="text-center">Acao</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($complaints->data as $complaint)
                            <tr class="btn-reveal-trigger">
                                <td style="font-size: 11pt;">{{$complaint->reference}}</td>
                                <td style="font-size: 11pt;">{{$complaint->name}}</td>
                                <td style="font-size: 11pt;">{{$complaint->phone}}</td>
                                <td style="font-size: 11pt;">{{date("d/m/Y H:i:s", strtotime($complaint->created_at))}}</td>
                                <td style="font-size: 11pt;" class="text-center">
                                    @if ($complaint->status == "0")
                                        <span class="badge bg-danger">Pendente</span>
                                    @else
                                        <span class="badge bg-success">Respondida</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                @if ($complaints->prev_page_url)
                                  <li class="page-item">
                                      <button class="page-link" wire:click='getComplaints("{{$complaints->prev_page_url}}")'>Anterior</button>
                                  </li>
                                @else
                                  <li class="page-item disabled">
                                      <a class="page-link" href="javascript:void(0)">Anterior</a>
                                  </li>
                                @endif
                                
                                @foreach ($complaints->links as $link)
                                  @if ($link->label != "pagination.previous" && $link->label != "pagination.next")
                                    <li class="page-item {{$link->active ? 'active' : ''}}">
                                      <button class="page-link" wire:click='getComplaints("{{$link->url}}")'>{{$link->label}}</button>
                                    </li>
                                  @endif
                                @endforeach

                                @if ($complaints->next_page_url)
                                  <li class="page-item">
                                    <button class="page-link" wire:click='getComplaints("{{$complaints->next_page_url}}")'>Proximo</button>
                                  </li>
                                @else
                                  <li class="page-item disabled">
                                    <button class="page-link">Proximo</button>
                                  </li>
                                @endif
                            </ul>
                        </nav>
                                               
                      </div>
                      
                      
                </div>
            </div>
        </div>
        {{--<div class="col-xxl-4">
          <div class="card">
            <div class="card-header d-flex flex-between-center py-2 border-bottom">
              <h6 class="mb-0">Analise grafica pelo Genero</h6>
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
                <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-user-plus"></i> DADOS DO CLIENTE</h4>
              </div>
              <div class="px-4 py-3">
                {{-- Dados do Modal --}}
                <livewire:formulario-cadastro-cliente />
                {{-- Dados do Modal --}}

              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- MODAL DE CADASTRO DE FUNCIONARIOS--}}
</div>
