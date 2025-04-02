<div class="col-xxl-12">
    <div class="card h-100">
      <div class="card-header d-flex flex-between-center">
        <h5 class="mb-0 text-nowrap py-2 py-xl-0">LICENÇAS CONTRATADAS</h5>
        <div>
          <button class="btn btn-primary btn-sm me-2 px-4" type="button" data-bs-toggle="modal" data-bs-target="#minhasLicencas">
              <span class="fas fa-file fs--2"></span><span class="d-none d-sm-inline-block ms-1 align-middle">Novo</span>
          </button>
      </div>
      </div>
      <div class="card-body p-0">
          <table class="table mb-0 fs--1 border-200">
            <thead class="bg-light text-900 font-sans-serif">
              <tr class="bg-info text-white">
                <th>Codigo</th>
                <th>Tipo de Licença</th>
                <th>Data de Emissão</th>
                <th>Data de Validade</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Anexo</th>
                {{--<th class="text-center">Ação</th>--}}
              </tr>
            </thead>
            <tbody class="list">
              @foreach ($licenses as $license)
              <tr class="fw-semi-bold">
                <td>{{$license->reference}}</td>
                <td>{{$license->license->name}}</td>
                <td>{{$license->issue_date}}</td>
                <td>{{$license->due_date}}</td>
                <td class="text-center">
                  @if ($license->licenseStatus->label == "AV")
                    <span class="badge bg-success">{{$license->licenseStatus->description}}</span>
                  @elseif($license->licenseStatus->label == "PT")
                    <span class="badge bg-primary">{{$license->licenseStatus->description}}</span>
                  @elseif($license->licenseStatus->label == "VD")
                    <span class="badge bg-warning">{{$license->licenseStatus->description}}</span>
                  @elseif($license->licenseStatus->label == "SS")
                    <span class="badge bg-danger">{{$license->licenseStatus->description}}</span>
                  @endif
                </td>
                <td class="text-center">
                  @if ($license->licenseStatus->label == "AV")
                  <button class="btn btn-sm btn-transparent" wire:click="downloadLicense({{$license->id}})">
                    <i class="fas fa-file-pdf text-danger" style="font-size: 15pt;"></i>  
                  </button>
                  @else
                      ---
                  @endif  
                </td>
                {{--<td class="text-center">
                  <div class="dropdown font-sans-serif position-static">
                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                      <span class="fas fa-ellipsis-h fs--1"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end border py-0">
                      <div class="py-2">
                        <a class="dropdown-item" href="#!">Edit</a>
                        <a class="dropdown-item text-danger" href="#!">Delete</a>
                        
                        @if ($license->payday && $license->licenseStatus->label != "VD")
                          <div class="dropdown-divider"></div>
                          <button class="btn btn-sm btn-secondary dropdown-items text-successs form-control" wire:click="payLicense({{$license}})">
                            <i class="fas fa-print"></i> Imprimir
                          </button>
                        @endif

                        @if ($license->licenseStatus->label == "PT")
                          <div class="dropdown-divider"></div>
                          <button class="btn btn-sm btn-success dropdown-items text-successs form-control" wire:click="payLicense({{$license}})">Efetuar Pagamento</button>
                        @endif

                        @if ($license->licenseStatus->label == "VD")
                          <div class="dropdown-divider"></div>
                          <button class="btn btn-sm btn-warning dropdown-items text-successs form-control" wire:click="renovarLicense({{$license}})">Renovar</button>
                        @endif
                      </div>
                    </div>
                  </div>
                </td>--}}
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
<div class="modal fade" id="minhasLicencas" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md mt-6" role="document">
    <div class="modal-content border-0">
      <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
          <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="bg-light rounded-top-3 py-3 ps-4">
          <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-file"></i> DADOS DA LICENÇA</h4>
        </div>
        <div class="px-4 py-3">
          <livewire:formulario-licenca :client="$client" />
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