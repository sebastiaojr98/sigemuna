@section('dash-finance') active @endsection
<div>
    <div class="row mb-3 g-3">
        <div class="col-12">
            <div class="row">
                <div style="text-decoration: none" href="#" class="col-3">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-2.png')}});"></div>
                    <div class="card-body position-relative">
                        <div class="row d-flex align-items-center">
                            <div class="col-4">
                                <i class="fas fa-hand-holding-usd text-success" style="font-size: 35pt;"></i>
                            </div>
                            <div class="col-8 text-center text-success" style="font-size: 11pt;">
                                <span><strong>Total a Receber</strong></span><br>
                                <span>{{formatAmount($totalReceber)}}</span>
                            </div>  
                        </div>
                        
                    </div>
                    </div>
                </div>
    
                <div style="text-decoration: none" href="#" class="col-3">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-2.png')}});"></div>
                    <div class="card-body position-relative">
                        <div class="row d-flex align-items-center">
                            <div class="col-4">
                                <i class="fas fa-credit-card text-danger" style="font-size: 35pt;"></i>
                            </div>
                            <div class="col-8 text-center text-danger" style="font-size: 11pt;">
                                <span><strong>Total a Pagar</strong></span><br>
                                <span>{{formatAmount($totalPagar)}}</span>
                            </div>  
                        </div>
                        
                    </div>
                    </div>
                </div>
    
                <div style="text-decoration: none" href="#" class="col-3">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-2.png')}});"></div>
                    <div class="card-body position-relative">
                        <div class="row d-flex align-items-center">
                            <div class="col-4">
                                <i class="fas fa-exclamation-triangle text-warning" style="font-size: 35pt;"></i>
                            </div>
                            <div class="col-8 text-center text-warning" style="font-size: 11pt;">
                                <span><strong>Total atrasado</strong></span><br>
                                <span>{{formatAmount($totalAtrasado)}}</span>
                            </div>  
                        </div>
                        
                    </div>
                    </div>
                </div>
    
                <div style="text-decoration: none" href="#" class="col-3">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-2.png')}});"></div>
                    <div class="card-body position-relative">
                        <div class="row d-flex align-items-center">
                            <div class="col-4">
                                <i class="fas fa-wallet text-primary" style="font-size: 35pt;"></i>
                            </div>
                            <div class="col-8 text-center text-primary" style="font-size: 11pt;">
                                <span><strong>Saldo</strong></span><br>
                                <span>{{formatAmount($saldoAtual)}}</span>
                            </div>  
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
          <div class="row g-3 mb-3">

        <div class="col-7">
          <div class="card">
            <div class="card-header d-flex flex-between-center py-2 border-bottom">
              <h5 class="mb-0">Receitas/Despesas</h5>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="row align-items-center">
                <div class="col-md-5 col-xxl-12 mb-xxl-1">
                  <div class="position-relative">

                    <div id="chart-revenue-expense"></div>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer"></div>
          </div>
        </div>

        <div class="col-5">
            <div class="card" style="height: 40vh !important">
              <div class="card-header">
                <h5 class="mb-0">Pagamentos Recentes</h5>
              </div>
              <div class="card-body scrollbar recent-activity-body-height ps-2">

                @forelse ($recibosDeHoje as $recibo)
                  <div class="row g-3 timeline timeline-primary timeline-past pb-x1">
                    <div class="col-auto ps-4 ms-2">
                      <div class="ps-2">
                        <div class="icon-item icon-item-sm rounded-circle bg-200 shadow-none"><span class="text-primary fas fa-file-alt"></span></div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="row gx-0 border-bottom pb-x1">
                        <div class="col">
                          <h6 class="text-800 mb-1">Factura: {{ $recibo->invoice->number }}</h6>
                          <p class="fs--1 text-600 mb-0 text-justify">Montante: {{formatAmount($recibo->amount_paid)}} MT</p>
                          <p class="fs--1 text-600 mb-0">Operador: {{$recibo->userCreated->name}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                @empty
                  <div class="px-3"><h5>Nenhum item recente!</h5></div>
                @endforelse

              </div>
              <div class="card-footer"></div>
            </div>
          </div>

          <div class="col-7"></div>
          <div class="col-5" style="margin-top: -110px !important">
            <div class="card" style="height: 40vh !important">
              <div class="card-header">
                <h5 class="mb-0">Facturas Recentes</h5>
              </div>
              <div class="card-body scrollbar recent-activity-body-height ps-2">
                @forelse ($facturasMaisRecentes as $factura)
                  <div class="row g-3 timeline timeline-primary timeline-past pb-x1">
                    <div class="col-auto ps-4 ms-2">
                      <div class="ps-2">
                        <div class="icon-item icon-item-sm rounded-circle bg-200 shadow-none"><span class="text-primary fas fa-file-alt"></span></div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="row gx-0 border-bottom pb-x1">
                        <div class="col">
                          <h6 class="text-800 mb-1">Factura: {{ $factura->number }}</h6>
                          <p class="fs--1 text-600 mb-0 text-justify">Montante: {{formatAmount($factura->total_amount)}} MT</p>
                          <p class="fs--1 text-600 mb-0 text-justify">Serviço: {{$factura->serviceContracted->service->name}}</p>
                          <p class="fs--1 text-600 mb-0 text-justify">Cliente: {{$factura->customer->name}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                @empty
                  <div class="px-3"><h5>Nenhum item recente!</h5></div>
                @endforelse

              </div>
              <div class="card-footer"></div>
            </div>
          </div>
    </div>


    <script src="{{ asset("js/apexcharts.js") }}"></script>
    <script>
        var options = {
          series: [
            {
                name: 'Despesas',
                data: @json(array_values($despesasPorMes))
            }, 
            {
                name: 'Receitas',
                data: @json(array_values($receitasPorMes))
            },
            {
                name: 'Saldo',
                data: @json($this->saldosPorMes),
            }
        ],
          chart: {
          type: 'area',
          height: 300
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '70%'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: @json($meses),
        },
        yaxis: {
          title: {
            text: 'MZN (Metical)'
          }
        },
        fill: {
          opacity: 1
        },
        colors: ['#dc3545', '#28a745', '#007bff'],
        tooltip: {
          y: {
            formatter: function (val) {
              return "MNZ " + val
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart-revenue-expense"), options);
        chart.render();
        
    </script>
</div>