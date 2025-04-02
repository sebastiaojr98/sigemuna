<div>
    <div class="card mb-3">
          <div class="card-body d-flex flex-wrap flex-between-center">
              <div>
                  <h6 class="text-primary">{{$client->accountType->description}}</h6>
                  <h5 class="mb-0">{{$client->full_name}}</h5>
              </div>
              {{--<div>
                <button class="btn btn-warning btn-md me-2" type="button" data-bs-toggle="modal" data-bs-target="#editEmployee">
                  <span class="fas fa-user-edit me-md-1"> </span><span class="d-none d-md-inline">Editar</span>
                </button>
                <button class="btn btn-primary btn-md me-2" type="button">
                  <span class="fas fa-print me-md-1"> </span><span class="d-none d-md-inline">Imprimir</span>
                </button>
              </div>--}}
          </div>
      </div>
  
      <div class="row g-3 mb-3">
          <div class="col-xxl-6">
            
              <div class="row g-3">
                  <div class="col-12">
                      <div class="card font-sans-serif">
                          <div class="card-body d-flex gap-3 flex-column flex-sm-row align-items-center">
                              <img class="rounded-3" src="../../assets/img/elearning/avatar/student.png" alt="" width="112" />
                              <table class="table table-borderless fs--1 fw-medium mb-0">
                                  <tbody>
                                    <tr>
                                        <td class="p-1" style="width: 35%;">Código:</td>
                                        <td class="p-1 text-600">{{$client->code}}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1" style="width: 35%;">NUIT:</td>
                                        <td class="p-1 text-600">{{$client->nuit}}</td>
                                    </tr>
                                    <tr>
                                      <td class="p-1" style="width: 35%;">Telefone:</td>
                                      <td class="p-1 text-600">{{$client->phone}}</td>
                                  </tr>
                                    @if ($client->accountType->label == "PF")
                                    <tr>
                                        <td class="p-1" style="width: 35%;">Estado Civil:</td>
                                        <td class="p-1"><a class="text-600 text-decoration-none" href="tel:+01234567890 ">{{$client->maritalStatus->description}}</a></td>
                                    </tr>
                                    <tr>
                                        <td class="p-1" style="width: 35%;">Sexo:</td>
                                        <td class="p-1"><a class="text-600 text-decoration-none" href="tel:+01234567890 ">{{$client->gender->description}}</a></td>
                                    </tr>
                                    <tr>
                                        <td class="p-1" style="width: 35%;">Data de Nascimento:</td>
                                        <td class="p-1"><a class="text-600 text-decoration-none" href="tel:+01234567890 ">{{$client->birth}}</a></td>
                                    </tr>
                                    <tr>
                                        <td class="p-1" style="width: 35%;">Nacionalidade:</td>
                                        <td class="p-1"><a class="text-600 text-decoration-none" href="tel:+01234567890 ">{{$client->nationality->description}}</a></td>
                                    </tr>
                                    @endif
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
  
                  {{-- Componente de Residencia --}}
                  {{-- <livewire:residencia :employee="$employee" /> --}}
            </div>
          </div>

          <livewire:endereco-cliente :client="$client" />

          @if ($client->accountType->label == "PJ")
          <livewire:pessoa-responsavel :client="$client" />
          @endif

      </div>
  
      <div class="row g-3 mb-3">

        @if ($client->accountType->label == "PF")
        <livewire:meus-documentos-cliente :client="$client" />
        @endif

        <livewire:minhas-licencas-cliente :client="$client" />

        <livewire:meus-servicos-cliente :client="$client" />
      </div>
  
  
      {{-- MODAL DE EDICAO DE FUNCIONARIOS --}}
      <div class="modal fade" id="editEmployee" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-6" role="document">
          <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="bg-light rounded-top-3 py-3 ps-4">
                <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-user-edit"></i> DADOS PESSOAIS</h4>
              </div>
              <div class="px-4 py-3">
                {{-- Dados do Modal --}}
                {{--<livewire:formulario-edicao-funcionario :employee="$employee" />--}}
                {{-- Dados do Modal --}}
  
              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- MODAL DE EDICAO DE FUNCIONARIOS--}}
  </div>
  