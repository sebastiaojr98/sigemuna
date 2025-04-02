<div class="col-xxl-12">
      <div class="card h-100">
        <div class="card-header d-flex flex-between-center">
          <h5 class="mb-0 text-nowrap py-2 py-xl-0">MEUS DOCUMENTOS</h5>
          <div>
            <button class="btn btn-primary btn-sm me-2 px-4" type="button" data-bs-toggle="modal" data-bs-target="#documentos">
                <span class="fas fa-file fs--2"></span><span class="d-none d-sm-inline-block ms-1 align-middle">Novo</span>
            </button>
        </div>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0 fs--1 border-200">
              <thead class="bg-light text-900 font-sans-serif">
                <tr class="bg-secondary text-white">
                  <th>Tipo de Documento</th>
                  <th>Numero</th>
                  <th>Local de Emissão</th>
                  <th>Data de Emissão</th>
                  <th>Data de Validade</th>
                  <th class="text-center">Comprovativo</th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($client->myDocuments as $document)
                <tr class="fw-semi-bold">
                  <td>{{$document->documentType->description}}</td>
                  <td>{{$document->number}}</td>
                  <td>{{$document->place_of_issue}}</td>
                  <td>{{$document->date_of_issue}}</td>
                  <td>{{$document->expiration_date}}</td>
                  <td class="text-center">
                      <a  target="_blank" href="{{asset("/storage/".$document->document)}}" class="text-danger"> <i class="fas fa-file-pdf" style="font-size: 20pt;"></i> </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
  <div class="modal fade" id="documentos" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md mt-6" role="document">
      <div class="modal-content border-0">
        <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
            <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <div class="bg-light rounded-top-3 py-3 ps-4">
            <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-file"></i> DADOS</h4>
          </div>
          <div class="px-4 py-3">
            <livewire:formulario-meu-documento-cliente :client="$client" />
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