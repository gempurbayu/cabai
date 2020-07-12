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
  <canvas id="canvas" height="280" width="600" class="col-lg-4"></canvas>
<div id="container">
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



</html> -->

@endsection