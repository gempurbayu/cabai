
<html>
<head>
	<title></title>
</head>
<body bgcolor="red">

@foreach($totals as $total)

<h1 style="color: white">{{$total->komoditas_id}}</h1>
<h1 style="color: white">{{$total->jumlah}}</h1>

@endforeach
</body>
</html>
