@section('dash-employes') active @endsection
<div>
    <div class="row mb-3 g-3">
        <div class="col-lg-12 col-xxl-6">
          <div class="row g-3 mb-3">

            <div class="col-sm-6 col-md-6">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">

                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-primary-subtle shadow-none me-2 bg-primary-subtle"><span class="fs--2 fas fa-users text-primary"></span></div>
                      <h6 class="mb-0">Todos</h6>
                    </div>
  
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-primary">{{ $employees < 10 ? '0'.$employees : $employees }}</div>
                  </div>

                  {{--<a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">
                    Visualizar<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                  </a>--}}
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-2.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-success-subtle shadow-none me-2 bg-success-subtle"><span class="fs--2 fas fa-users text-success"></span></div>
                      <h6 class="mb-0">Ativos</h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-success">{{ $active < 10 ? '0'.$active : $active }}</div>
                  </div>
                  {{--<a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">
                    Visualizar<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                  </a>--}}
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-3.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-danger-subtle shadow-none me-2 bg-danger-subtle"><span class="fs--2 fas fa-users text-danger"></span></div>
                      <h6 class="mb-0">Demitidos</h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-danger">{{ $fired < 10 ? '0'.$fired : $fired }}</div>
                  </div>
                  {{--<a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">
                    Visualizar<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                  </a>--}}
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-3.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-secondary-subtle shadow-none me-2 bg-secondary-subtle"><span class="fs--2 fas fa-users text-secondary"></span></div>
                      <h6 class="mb-0">Ferias</h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-secondary">{{ $vacation < 10 ? '0'.$vacation : $vacation }}</div>
                  </div>
                  {{--<a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">
                    Visualizar<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                  </a>--}}
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-2.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-warning-subtle shadow-none me-2 bg-warning-subtle"><span class="fs--2 fas fa-users text-warning"></span></div>
                      <h6 class="mb-0">Suspensos</h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-warning">{{ $suspended < 10 ? '0'.$suspended : $suspended }}</div>
                  </div>
                  {{--<a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">
                    Visualizar<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                  </a>--}}
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-primary-subtle shadow-none me-2 bg-primary-subtle"><span class="fs--2 fas fa-users text-primary"></span></div>
                      <h6 class="mb-0">L. Paternidade</h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-primary">{{ $paternity < 10 ? '0'.$paternity : $paternity }}</div>
                  </div>
                  {{--<a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">
                    Visualizar<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                  </a>--}}
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-2.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-secondary-subtle shadow-none me-2 bg-secondary-subtle"><span class="fs--2 fas fa-users text-secondary"></span></div>
                      <h6 class="mb-0">L. Maternidade</h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-secondary">{{ $maternity < 10 ? '0'.$maternity : $maternity }}</div>
                  </div>
                  {{--<a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">
                    Visualizar<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                  </a>--}}
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="icon-item icon-item-sm bg-danger-subtle shadow-none me-2 bg-danger-subtle"><span class="fs--2 fas fa-users text-danger"></span></div>
                      <h6 class="mb-0">Doentes</h6>
                    </div>
                    <div class="display-4 fs-4 my-2 fw-normal font-sans-serif text-danger">{{ $sick < 10 ? '0'.$sick : $sick }}</div>
                  </div>
                  {{--<a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">
                    Visualizar<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                  </a>--}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-6">
          <div class="card">
            <div class="card-header d-flex flex-between-center py-2 border-bottom">
              <h6 class="mb-0">Analise grafica por estado</h6>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="row align-items-center">
                <div class="col-md-12 col-xxl-12 mb-xxl-1">

                  <div class="position-relative">
                    <livewire:chart-employee-status :data="$employee_status" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
    </div>
</div>