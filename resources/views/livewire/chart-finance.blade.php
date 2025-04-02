<div>
   <div id="chart-finance"></div>
</div>

<script src="{{ asset("js/apexcharts.js") }}"></script>
<script>

var options = {
    chart: {
      type: 'donut',
    },
    series: {{$data}},
    labels: ['Receitas', 'Despesas', 'Investimentos', 'Financiamentos', 'Total']
  };

  var chart = new ApexCharts(document.querySelector("#chart-finance"), options);
  chart.render();

  addEventListener("updateChart", (event) => {
      //options.series = event.detail
      console.log(event.detail);
  });
</script>