<div>
  <div class="col-xxl-12 order-xxl-1 order-lg-2 order-1">
    <div class="card h-100">
      <div class="card-header d-flex flex-between-center">
        <h5 class="mb-0 text-nowrap py-2 py-xl-0">CÔNJUGE</h5>
        @if (!$employee->spouse)
        <div>
          <button class="btn btn-primary btn-sm me-2 px-4" type="button" data-bs-toggle="modal" data-bs-target="#conjuge">
              <span class="fas fa-user-plus fs--2"></span><span class="d-none d-sm-inline-block ms-1 align-middle">Novo</span>
          </button>
        </div>
        @endif
      </div>
      <div class="card-body p-0">
          <table class="table mb-0 fs--1 border-200">
              <thead class="bg-light text-900 font-sans-serif">
                <tr class="bg-primary text-white">
                  <th>Nome Completo</th>
                  <th>Nacionalidade</th>
                  <th>Data de Nascimento</th>
                  <th>Profissão</th>
                  <th>Local de Trabalho</th>
                  <th class="text-center">Documento</th>
                </tr>
              </thead>
              <tbody class="list">
                @if ($spouse)
                <tr class="fw-semi-bold">
                  <td>{{$spouse->full_name}}</td>
                  <td>{{$spouse->nationality->description}}</td>
                  <td>{{$spouse->birth}}</td>
                  <td>{{$spouse->profession}}</td>
                  <td>{{$spouse->workplace}}</td>
                  <td class="text-center">
                      <a target="_blank" href="{{asset("/storage/".$spouse->document)}}" class="text-danger"> <i class="fas fa-file-pdf" style="font-size: 20pt;"></i> </a>
                  </td>
                </tr>
                @endif
              </tbody>
            </table>
      </div>
    </div>
</div>

{{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
<div class="modal fade" id="conjuge" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg mt-6" role="document">
    <div class="modal-content border-0">
      <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
          <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="bg-light rounded-top-3 py-3 ps-4">
          <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-user-plus"></i> DADOS DO/A CONJUGE</h4>
        </div>
        <div class="px-4 py-3">
          <livewire:formulario-conjuge :employee="$employee" />
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