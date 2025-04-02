@section('dash-infra') active @endsection
<div>
    <div class="row mb-3 g-3">
        <div class="col-lg-12 col-xxl-8">
          <div class="row g-3 mb-3">

            <div class="col-sm-6 col-md-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">

                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-primary-subtle shadow-none me-2 bg-primary-subtle"><span class="fs--2 fas fa-building text-primary"></span></div>
                      <h6 class="mb-0">Total <span class="badge badge-subtle-primary rounded-pill ms-2">{{number_format(($operation + $closed + $maintenance) * 100 / (($operation + $closed + $maintenance) > 0 ? ($operation + $closed + $maintenance) : 1), 2)}}%</span></h6>
                    </div>
  
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-primary" data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>{{ ($operation + $closed + $maintenance) < 10 ? '0'.($operation + $closed + $maintenance) : ($operation + $closed + $maintenance) }}</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-2.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-success-subtle shadow-none me-2 bg-success-subtle"><span class="fs--2 fas fa-building text-success"></span></div>
                      <h6 class="mb-0">Funcionamento <span class="badge badge-subtle-success rounded-pill ms-2">{{number_format( $operation * 100 / (($operation + $closed + $maintenance) > 0 ? ($operation + $closed + $maintenance) : 1), 2)}}%</span></h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-success" data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>{{ $operation < 10 ? '0'.$operation : $operation }}</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-2.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-warning-subtle shadow-none me-2 bg-warning-subtle"><span class="fs--2 fas fa-building text-warning"></span></div>
                      <h6 class="mb-0">Manutenção <span class="badge badge-subtle-warning rounded-pill ms-2">{{number_format( $maintenance * 100 / (($operation + $closed + $maintenance) > 0 ? ($operation + $closed + $maintenance) : 1), 2)}}%</span></h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-warning" data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>{{ $maintenance < 10 ? '0'.$maintenance : $maintenance }}</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-2.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-danger-subtle shadow-none me-2 bg-danger-subtle"><span class="fs--2 fas fa-building text-danger"></span></div>
                      <h6 class="mb-0">Encerrada <span class="badge badge-subtle-danger rounded-pill ms-2">{{number_format( $closed * 100 / (($operation + $closed + $maintenance) > 0 ? ($operation + $closed + $maintenance) : 1), 2)}}%</span></h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-danger" data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>{{ $closed < 10 ? '0'.$closed : $closed }}</div>
                  </div>
                </div>
              </div>
            </div>

            @if ($activities->count())
            <div class="col-xxl-8 col-lg-6 order-xxl-1">
              <div class="card h-100">
                <div class="card-header">
                  <h6 class="mb-0">Atividades recentes</h6>
                </div>
                <div class="card-body scrollbar recent-activity-body-height ps-2">

                  @foreach ($activities as $activity)
                    <div class="row g-3 timeline timeline-primary timeline-past pb-x1">
                      <div class="col-auto ps-4 ms-2">
                        <div class="ps-2">
                          <div class="icon-item icon-item-sm rounded-circle bg-200 shadow-none"><span class="text-primary fas fa-building"></span></div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="row gx-0 border-bottom pb-x1">
                          <div class="col">
                            <h6 class="text-800 mb-1">Codigo: {{$activity->infrastructure->code}}</h6>
                            <p class="fs--1 text-600 mb-0 text-justify">Atividades executadas: {{$activity->activities_performed}}</p>
                            <p class="fs--1 text-600 mb-0">Técnico Responsável: {{$activity->responsible_technician}}</p>
                            <p class="fs--2 text-500 mb-0">{{$activity->created_at->format("d-m-Y")}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach

                </div>
              </div>
            </div>
            @endif
          </div>
        </div>

        @if ($operation + $closed + $maintenance)
        <div class="col-xxl-4">
          <div class="card">
            <div class="card-header d-flex flex-between-center py-2 border-bottom">
              <h6 class="mb-0">Analise grafica de Infraestrutras</h6>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="row align-items-center">
                <div class="col-md-5 col-xxl-12 mb-xxl-1">
                  <div class="position-relative">
                    <livewire:chart-infra :data="$infras" />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer"></div>
          </div>
        </div>
        @endif
        
    </div>
</div>