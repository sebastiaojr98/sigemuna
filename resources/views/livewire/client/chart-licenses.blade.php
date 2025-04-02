<div>
    <div id="chartx"></div>
</div>

<script src="{{ asset("js/apexcharts.js") }}"></script>
<script>
  var options = {
    chart: {
      type: 'donut',
    },
    series: {{$data}},
    labels: ['Emitidas', 'Validas ', 'Vencidas']
  };

  var chart = new ApexCharts(document.querySelector("#chartx"), options);
  chart.render();
</script>