@extends('layouts.admin')

@section('content')
    <h1>Dashboard</h1>

    <div id="chart"></div>

    <script type="text/javascript">
        const data = @json($chartArray);

        const title = 'Quantidade de notícias por categorias';
        const options = {
            chart: {
                type: 'pie',
                renderTo: document.getElementById('chart'),
            },
            title: {
                text: title
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    showInLegend: true,
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}',
                    }
                }
            },
            series: [
                {
                    name: "Quantidade",
                    data: data
                }
            ]
        };
        new Highcharts.chart(options);
    </script>
@endsection()