@extends('layouts.panel')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Chart</title>

<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/data.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
<script src="{{asset('chart/Chart.min.js')}}"></script>
</head>
   
<body>
<div class="container">
        <a href="/admin/grafikuser" class="btn btn-success btn-sm">Hari</a>
        <a href="#" class="btn btn-primary btn-sm">Bulan</a>
        <a href="/admin/grafikuserh" class="btn btn-primary btn-sm">Tahun</a>
</div>
<div class="row row-cards-one">

        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <h5 class="card-header">{{ __('Total User Dalam 30 Hari Terakhir') }}</h5>
                <div class="card-body">

                    <canvas id="lineChart"></canvas>

                </div>
            </div>

        </div>

    </div>
</div>
</body>

<script src="https://raw.githubusercontent.com/nnnick/Chart.js/master/dist/Chart.bundle.js"></script>
<script language="JavaScript">
    displayLineChart();

    function displayLineChart() {
        var data = {
            labels:
            [
            {!!$days!!}
            ],

            datasets: [{
                label: "Prime and Fibonacci",
                reverse:"true",
                fillColor: "#3dbcff",
                strokeColor: "#0099ff",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [
                {!!$userr!!}
                ]
            }]
        };
    var ctx = document.getElementById("lineChart").getContext("2d");
        var options = {
            responsive: true
        
        };
        var lineChart = new Chart(ctx).Line(data, options);
    }


    
</script>
</html>

@endsection