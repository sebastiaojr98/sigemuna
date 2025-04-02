<div class="col-xxl-7 order-xxl-1 order-lg-2 order-1">
    <div class="card h-100" id="paymentHistoryTable">
        <div class="card-header d-flex flex-between-center">
          <h5 class="mb-0 text-nowrap py-2 py-xl-0">CONTACTOS ALTERNATIVOS</h5>
          <div>
            <button class="btn btn-primary btn-sm me-2 px-4" type="button"  data-bs-toggle="modal" data-bs-target="#alternativePerson">
                <span class="fas fa-address-book fs--2"></span><span class="d-none d-sm-inline-block ms-1 align-middle">Novo</span>
            </button>
        </div>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0 fs--1 border-200">
                <thead class="bg-light text-900 font-sans-serif">
                  <tr class="bg-success text-white">
                    <th>Nome da Pessoa</th>
                    <th>Grau de Parentesco</th>
                    <th>Contacto</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach ($employee->alternativeContact as $contact)
                  <tr class="fw-semi-bold">
                    <td>{{$contact->full_name}}</td>
                    <td>{{$contact->degreeOfKinship->label}}</td>
                    <td>{{$contact->phone}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
      </div>

      {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
      <div class="modal fade" id="alternativePerson" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md mt-6" role="document">
          <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="bg-light rounded-top-3 py-3 ps-4">
                <h5 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-address-card"></i> INFORMAÇÃO DE CONTACTO</h5>
              </div>
              <div class="px-4 py-3">
                <livewire:formulario-contacto-alternativo :employee="$employee" />
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