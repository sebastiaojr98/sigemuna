<div>
    <div id="chart-clients"></div>
</div>

<script src="{{ asset("js/apexcharts.js") }}"></script>
<script>
  var options = {
    chart: {
      type: 'donut',
    },
    series: {{$data}},
    labels: ['Todos', 'Jurídicos', 'Físicos']
  };

  var chart = new ApexCharts(document.querySelector("#chart-clients"), options);
  chart.render();
</script>