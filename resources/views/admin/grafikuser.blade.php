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
<form enctype="multipart/data" method="get" action="/admin/bulan" class="col-lg-3">
    <label for="sel1">Pilih Bulan :</label>
                  <select class="form-control" id="filter" name="month">
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
    <input type="submit" name="" value="submit" class="btn btn-primary btn-sm">
  </form>
  <canvas id="lineChart" height="280" width="600" class="col-lg-4"></canvas>
<div id="container">
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