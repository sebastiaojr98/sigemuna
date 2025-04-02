<div>
    <div class="card mb-3">
        <div class="card-header position-relative min-vh-50 mb-7">
          <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url({{asset("/storage/".$infrastructure->image)}});"></div>
          <!--/.bg-holder-->
          <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="{{asset("/storage/".$infrastructure->image)}}" width="200" alt="" /></div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8">
              <h4 class="mb-1"> {{$infrastructure->infrastructureType->label}}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h4>
              <h5 class="fs-0 fw-normal">{{$infrastructure->neighborhood->label}}</h5>
              <p class="text-500">{{$infrastructure->description}}</p>
              <div class="border-bottom border-dashed my-4 d-lg-none"></div>
            </div>
            <div class="col ps-2 ps-lg-3">
                <a class="d-flex align-items-center mb-2" href="#">
                    <span class="fas fa-key fs-1 me-2 text-700" data-fa-transform="grow-2"></span>
                    <div class="flex-1">
                        <h6 class="mb-0">{{$infrastructure->code}}</h6>
                    </div>
                </a>
                <a class="d-flex align-items-center mb-2" href="#">
                    <span class="fas fa-calendar fs-1 me-2 text-700" data-fa-transform="grow-2"></span>
                    <div class="flex-1">
                        <h6 class="mb-0">{{$infrastructure->year}}</h6>
                    </div>
                </a>
                <h5>
                    @if ($infrastructure->status == "0")
                    <span class="badge bg-danger">Encerrado</span>
                    @elseif($infrastructure->status == "1")
                    <span class="badge bg-primary">Funcionamento</span>
                    @elseif($infrastructure->status == "2")
                    <span class="badge bg-warning">Manutenção</span>
                    @endif
                </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="row g-0">
        <div class="col-lg-12 ps-lg-2">
          <div class="sticky-sidebar">
            <div class="card mb-3 mb-lg-0">
              <div class="card-header d-flex justify-content-between align-items-center bg-light">
                <h5 class="mb-0">Registo de Atividades</h5>
                <button class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#createInfra">
                    <i class="fas fa-building"></i> Novo
                </button>
              </div>
              <div class="card-body fs--1">

                @foreach($histories as $history)
                <div class="d-flex btn-reveal-trigger">
                    <div class="calendar">
                        <span class="calendar-month">{{date("F", strtotime($history->activity_date))}}</span>
                        <span class="calendar-day">{{date("d", strtotime($history->activity_date))}}</span>
                    </div>
                    <div class="flex-1 position-relative ps-3">
                        <h6 class="fs-0 mb-1 text-primary">Técnico Responsável: <a href="#!" class="text-700">{{$history->responsible_technician}}</a></h6>
                        <p class="text-1000 mb-0">Duração: {{$history->begin}} - {{$history->end}}</p><span class="text-primary">Atividades executadas:</span> {{$history->activities_performed}}
                        <br><br>
                        @foreach ($history->files as $file)
                        <a  target="_blank" href="{{asset("/storage/".$file->path)}}" class="text-primary mx-2 my-5"> <i class="fas fa-image" style="font-size: 20pt;"></i> </a>
                        @endforeach
                        <div class="border-bottom border-dashed my-3"></div>
                    </div>
                </div>
                @endforeach
              </div>
                <div class="card-footer bg-light py-2 border-top">
                    {{ $histories->links() }}
                </div>
            </div>
          </div>
        </div>
      </div>

      {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
    <div class="modal fade" id="createInfra" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md mt-6" role="document">
          <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="bg-light rounded-top-3 py-3 ps-4">
                <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-building text-secondary"></i> Registo de Atividades</h4>
              </div>
              <div class="px-4 py-3">
                {{-- Dados do Modal --}}
                <livewire:formulario-historico-infraestrutura :infra="$infrastructure" />
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
