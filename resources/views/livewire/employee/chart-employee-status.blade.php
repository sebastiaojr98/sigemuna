<div id="chart-employee-status"></div>
<script src="{{ asset("js/apexcharts.js") }}"></script>
<script>
    var options = {
        chart: {
            type: 'donut',
            height: 400,
        },
        series: {{$data}},
        labels: ['Todos', 'Ativos', 'Demitidos', "Ferias", "Suspensos", "L. Paternidade", "L. Maternidade", "Doentes"]
    };

  var chart = new ApexCharts(document.querySelector("#chart-employee-status"), options);
  chart.render();
</script>