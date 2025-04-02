@section('dash-finance') active @endsection
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
                      <h6 class="mb-0">Total</h6>
                    </div>
                  </div>
                  <div class="display-5 fs-1 my-3 fw-normal font-sans-serif text-primary" style="font-size: 10pt;">{{formatAmount($total)}} MT</div>
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
                      <h6 class="mb-0">Receitas</h6>
                    </div>
                  </div>
                  <div class="display-5 fs-1 my-3 fw-normal font-sans-serif text-primary" style="font-size: 10pt;">{{number_format($revenue, 2, ".", " ")}} MT</div>
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
                      <div class="icon-item icon-item-sm bg-danger-subtle shadow-none me-2 bg-danger-subtle"><span class="fs--2 fas fa-building text-warning"></span></div>
                      <h6 class="mb-0">Despesas</h6>
                    </div>
                  </div>
                  <div class="display-5 fs-1 my-3 fw-normal font-sans-serif text-primary" style="font-size: 10pt;">{{number_format($expense, 2, ".", " ")}} MT</div>
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
                      <h6 class="mb-0">Financiamentos</h6>
                    </div>
                  </div>
                  <div class="display-5 fs-1 my-3 fw-normal font-sans-serif text-primary" style="font-size: 10pt;">{{number_format($financing, 2, ".", " ")}} MT</div>
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
                      <div class="icon-item icon-item-sm bg-primary-subtle shadow-none me-2 bg-primary-subtle"><span class="fs--2 fas fa-building text-primary"></span></div>
                      <h6 class="mb-0">Investimentos</h6>
                    </div>
                  </div>
                  <div class="display-5 fs-1 my-3 fw-normal font-sans-serif text-primary" style="font-size: 10pt;">{{number_format($investment, 2, ".", " ")}} MT</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xxl-4">
          <div class="card">
            <div class="card-header d-flex flex-between-center py-2 border-bottom">
              <h6 class="mb-0">Analise grafica de transaçoes</h6>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="row align-items-center">
                <div class="col-md-5 col-xxl-12 mb-xxl-1">
                  <div class="position-relative">

                    <livewire:chart-finance :dataCharts="$dataCharts" />
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer"></div>
          </div>
        </div>
        
    </div>
</div>