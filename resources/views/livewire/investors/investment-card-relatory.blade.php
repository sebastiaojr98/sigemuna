<div class="card mb-3 px-5" wire:poll.5000ms>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6 col-xxl-4">
          <div class="card h-md-100">
            <div class="card-header d-flex flex-between-center pb-0">
              <h6 class="mb-0">Ativos</h6>
            </div>
            <div class="card-body pt-2">
              <div class="row g-0 h-100 align-items-center">
                <div class="col">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-coins text-primary" style="font-size: 30pt; margin-right: 20px;"></i>
                    <div>
                      <h6 class="mb-2">Relatorio Mensal</h6>
                      <div class="fs--2 fw-semi-bold">Montante: {{number_format($active, 2, ".", " ")}}MT</div>
                    </div>
                  </div>
                </div>
                <div class="col-auto text-center ps-2">
                  <div class="fs-1 fw-normal font-sans-serif text-primary mb-1 lh-1">
                    @if ($active > 0)
                        {{number_format($active * 100 / ($active + $completed + $canceled), 2)}}%
                    @else
                        0%
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xxl-4">
          <div class="card h-md-100">
            <div class="card-header d-flex flex-between-center pb-0">
              <h6 class="mb-0">Concluídos</h6>
            </div>
            <div class="card-body pt-2">
              <div class="row g-0 h-100 align-items-center">
                <div class="col">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-coins text-success" style="font-size: 30pt; margin-right: 20px;"></i>
                    <div>
                      <h6 class="mb-2">Relatorio Mensal</h6>
                      <div class="fs--2 fw-semi-bold">Montante: {{number_format($completed, 2, ".", " ")}}MT</div>
                    </div>
                  </div>
                </div>
                <div class="col-auto text-center ps-2">
                  <div class="fs-1 fw-normal font-sans-serif text-success mb-1 lh-1">
                    @if ($completed > 0)
                        {{number_format($completed * 100 / ($active + $completed + $canceled), 2)}}%
                    @else
                        0%
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xxl-4">
          <div class="card h-md-100">
            <div class="card-header d-flex flex-between-center pb-0">
              <h6 class="mb-0">Cancelados</h6>
            </div>
            <div class="card-body pt-2">
              <div class="row g-0 h-100 align-items-center">
                <div class="col">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-coins text-danger" style="font-size: 30pt; margin-right: 20px;"></i>
                    <div>
                      <h6 class="mb-2">Relatorio Mensal</h6>
                      <div class="fs--2 fw-semi-bold">Montante: {{number_format($canceled, 2, ".", " ")}}MT</div>
                    </div>
                  </div>
                </div>
                <div class="col-auto text-center ps-2">
                  <div class="fs-1 fw-normal font-sans-serif text-danger mb-1 lh-1">
                    @if ($canceled > 0)
                        {{number_format($canceled * 100 / ($active + $completed + $canceled), 2)}}%
                    @else
                        0%
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>