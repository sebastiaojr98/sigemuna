<div id="chart-employee-department"></div>
<script src="{{ asset("js/apexcharts.js") }}"></script>
<script>
    var options = {
    series: [
      {
        name: 'Homens',
        data: [44, 55, 57, 56]
      }, 
      {
        name: 'Mulheres',
        data: [76, 85, 101, 98]
      }
    ],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '60%',
            endingShape: 'rounded'
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
          categories: ['Administrativo', 'Comunicacao', 'Infraestruturas', 'Residuos Solidos'],
        },
        yaxis: {
          title: {
            text: 'Funcionarios por Departamentos'
          }
        },
        fill: {
          opacity: 1
        },
        }; 

        var chart = new ApexCharts(document.querySelector("#chart-employee-department"), options);
        chart.render();
</script>