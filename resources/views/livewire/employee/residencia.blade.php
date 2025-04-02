<div>
  <div class="col-lg-12 col-xxl-12">
    <div class="card h-100">
    <div class="card-header bg-light d-flex flex-between-center py-2">
        <h6 class="mb-0">RESIDÊNCIA</h6>
        <button class="btn btn-primary btn-sm me-2 px-4" type="button"  data-bs-toggle="modal" data-bs-target="#residencia">
          <span class="fas fa-plus fs--2"></span><span class="d-none d-sm-inline-block ms-1 align-middle">Novo</span>
        </button>
    </div>
    <div class="card-body">
        <div class="row g-3 h-100">
            <div class="col-sm-6 col-lg-12">
                <table class="table table-sm mb-0 fs--1 border-200 overflow-hidden">
                    <thead class="bg-light text-900 font-sans-serif">
                      <tr class="bg-primary text-white">
                        <th class="sort align-middle fw-medium" data-sort="date">Bairro</th>
                        <th class="sort align-middle fw-medium">U/C</th>
                        <th class="sort align-middle fw-medium text-center">Quarterao</th>
                        <th class="sort align-middle fw-medium text-center">Casa</th>
                        <th class="sort align-center fw-medium text-center">Documento</th>
                      </tr>
                    </thead>
                    <tbody class="lists">
                      @forelse ($addresses as $address)
                        <tr class="fw-semi-bolds">
                            <td class="align-middle pe-5 py-3 course">{{$address->neighborhood->label}}</td>
                            <td class="align-middle white-space-nowrap pe-6 py-3 invoice">{{$address->communalUnity->label}}</td>
                            <td class="align-middle white-space-nowrap py-3 text-center">{{$address->block_number}}</td>
                            <td class="align-middle white-space-nowrap py-3 text-center">{{$address->house_number}}</td>
                            @if ($address->document)
                            <td class="text-center">
                              <a target="_blank" href="{{asset("/storage/".$address->document)}}" class="text-danger"> <i class="fas fa-file-pdf mt-2" style="font-size: 18pt;"></i> </a>
                            </td>
                            @else
                              <td class="text-center">
                                ---
                              </td>
                            @endif
                        </tr>
                      @empty
                          <tr>
                            <td colspan="3" ><h5 class="text-warning">Nenhum Endereço Residencial!</h5></td>
                          </tr>
                      @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    </div>
</div>

{{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
<div class="modal fade" id="residencia" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md mt-6" role="document">
    <div class="modal-content border-0">
      <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
          <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="bg-light rounded-top-3 py-3 ps-4">
          <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-map-marker-alt"></i> Endereço Residencial</h4>
        </div>
        <div class="px-4 py-3">
          <livewire:formulario-cadastro-endereco-funcionario :employee="$employee" />
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
