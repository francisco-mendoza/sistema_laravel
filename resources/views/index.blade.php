@extends('layouts.principal')

@section('content')


<script type="text/javascript">
    var tabButton = document.getElementById("dashboard");
    tabButton.className = "active";
</script>
	

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/funnel.js"></script>

<script src="https://code.highcharts.com/highcharts-3d.js"></script>



<div class="widget widget-nopad">
	<div class="widget-header"> <i class="icon-list-alt"></i>
	<h3>Dashboard</h3>
	</div>


<div id="container" style="min-width: 410px; max-width: 410px; height: 400px; float: left;"></div>

<div id="container2" style="height: 400px;max-width: 410px; float: left	;	"></div>




</div>

<script type="text/javascript">

$(function () {

    $('#container').highcharts({
        chart: {
            type: 'pyramid',
            marginRight: 100
        },
        title: {
            text: 'Ventas',
            x: -50
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b> ({point.y:,.0f})',
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                    softConnector: true
                }
            }
        },
        legend: {
            enabled: false
        },
        series: [{
            name: 'Usuarios unicos',
            data: [
                ['Sitios Webs visitados',      654],
                ['Descargas',            4064],
                ['Lista de precios solicitadas', 1987],
                ['Facturas enviadas',          976],
                ['Finalizadas',             846]
            ]
        }]
    });
});

</script>

<script type="text/javascript">

$(function () {
    $('#container2').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Campañas 2015'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Firefox', 45.0],
                ['IE', 26.8],
                {
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },
                ['Safari', 8.5],
                ['Opera', 6.2],
                ['Others', 0.7]
            ]
        }]
    });
});



</script>

@stop