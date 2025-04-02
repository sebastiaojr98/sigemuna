<div>
    <div id="chart-infras"></div>
</div>

<script src="{{ asset("js/apexcharts.js") }}"></script>
<script>
  var options = {
    chart: {
      type: 'donut',
    },
    series: {{$data}},
    labels: ['Todos', 'Funcionamento', 'Manutenção', 'Encerrada']
  };

  var chart = new ApexCharts(document.querySelector("#chart-infras"), options);
  chart.render();
</script>