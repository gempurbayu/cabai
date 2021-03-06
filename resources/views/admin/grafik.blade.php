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




</head>
   
<body>
<div class="container">
        <a href="/admin" class="btn btn-success btn-sm">Hari</a>
        <a href="/admin/omsetbulan" class="btn btn-primary btn-sm">Bulan</a>
        <a href="/admin/omsettahun" class="btn btn-primary btn-sm">Tahun</a>
      <div class="row">
      <canvas id="canvas" class="" width="600"></canvas>
      <canvas id="canvas2" class="col-lg-6"></canvas>
        </div>
</div>
</body>

<script src="https://raw.githubusercontent.com/nnnick/Chart.js/master/dist/Chart.bundle.js"></script>
<script>
    var tanggal = <?php echo $tanggal; ?>;
    var data_viewer = <?php echo $omset; ?>;


    var barChartData = {
        labels: tanggal,
        datasets: [{
            label: 'Omset',
            backgroundColor: "rgba(151,187,205,0.5)",
            data: data_viewer
        }]
    };


    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },

                responsive: true,
                title: {
                    display: true,
                    text: 'Data Omset Perhari'
                }
            }
        });


    };
</script>



</html>

@endsection