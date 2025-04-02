@section('dash-home') active @endsection
<div wire:poll="update()">
    <div class="row mb-3 g-3">
        <div class="col-lg-12 col-xxl-8">
          <div class="row g-3 mb-3">

            <div class="col-md-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-3.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-danger-subtle shadow-none me-2 bg-danger-subtle"><span class="fs--2 fas fa-users text-danger"></span></div>
                      <h6 class="mb-0">Clientes</h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-danger" data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>{{ $clients < 10 ? '0'.$clients : $clients }}</div>
                  </div>
                  {{--<a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">
                    Visualizar<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                  </a>--}}
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-primary-subtle shadow-none me-2 bg-primary-subtle"><span class="fs--2 fas fa-users text-primary"></span></div>
                      <h6 class="mb-0">Licenças de Emitidas </h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-primary" data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>{{ $licenses < 10 ? '0'.$licenses : $licenses }}</div>
                  </div>
                  {{--<a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">
                    Visualizar<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                  </a>--}}
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-success-subtle shadow-none me-2 bg-success-subtle"><span class="fs--2 fas fa-users text-success"></span></div>
                      <h6 class="mb-0">Licenças Validas </h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-success">{{ $valid_licenses < 10 ? '0'.$valid_licenses : $valid_licenses }}</div>
                  </div>
                  {{--<a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">
                    Visualizar<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                  </a>--}}
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-warning-subtle shadow-none me-2 bg-warning-subtle"><span class="fs--2 fas fa-users text-warning"></span></div>
                      <h6 class="mb-0">Licenças Vencidas</h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-warning">{{ $expired_licenses < 10 ? '0'.$expired_licenses : $expired_licenses }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xxl-4">
          <div class="card">
            <div class="card-header d-flex flex-between-center py-2 border-bottom">
              <h6 class="mb-0">Analise grafica de Clientes</h6>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="row align-items-center">
                <div class="col-md-5 col-xxl-12 mb-xxl-1">
                  <div class="position-relative">
                    <livewire:chart-clients :data="$chart_clients"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer"></div>
          </div>
        </div>

        <div class="col-xxl-8"></div>
        <div class="col-xxl-4">
          <div class="card">
            <div class="card-header d-flex flex-between-center py-2 border-bottom">
              <h6 class="mb-0">Analise grafica de Licenças</h6>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="row align-items-center">
                <div class="col-md-5 col-xxl-12 mb-xxl-1">
                  <div class="position-relative">
                    <livewire:chart-licenses :data="$chart_licenses"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer"></div>
          </div>
        </div>
        
    </div>
</div>