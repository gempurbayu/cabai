@extends('layouts.front')
@section('content')

    <section class="ftco-section ftco-cart">
			<div class="container">
        <h2 class="navbar-brand" style="color: #82ae46">Daftar Keranjang</h2>
        @if(!empty($pesanan))
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Nama Komoditas</th>
						        <th>Jumlah</th>
						        <th>Harga</th>
						        <th>Total Harga</th>
						      </tr>
						    </thead>
						    <tbody>
                  <?php $no = 1; ?>
                  @foreach($pesanan_details as $pesanan_detail)
						      <tr class="text-center">
						        <td class="action"><form action="{{url('checkout/'.$pesanan_detail->id)}}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn"><i class="fas fa-trash"></i></button>
                      </form></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url({{asset('img_komoditas/'.$pesanan_detail->komoditas->img_komoditas)}})"></div></td>
						        
						        <td class="product-name">
						        	<h3>{{$pesanan_detail->komoditas->nama_komoditas}}</h3>
						        </td>
						        
						        <td class="jumlah">{{$pesanan_detail->jumlah}}</td>
						        
						        <td class="harga">Rp. {{$pesanan_detail->komoditas->harga}}</td>
						        
						        <td class="total">Rp. {{$pesanan_detail->jumlah_harga}}</td>
						      </tr><!-- END TR-->
                  @endforeach
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
        <br>
          <p><input type="submit" class="btn btn-primary py-3 px-4" onclick="showhide()" value="Kirim Barang"></input></p>
    		
        <div class="row justify-content-end">
          <!-- coupon
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Coupon Code</h3>
    					<p>Enter your coupon code if you have one</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Coupon code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
    			</div>

    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Estimate shipping and tax</h3>
    					<p>Enter your destination to get a shipping estimate</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Country</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">State/Province</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">Zip/Postal Code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
    			</div>
        -->
        <div class="col-lg-8 mt-5 cart-wrap ftco-animate" id="kirim" style="display: none">
            <div class="cart-total mb-3">
              <h3>Data Pengiriman (Abaikan jika barang akan diambil)</h3>
              <p>Masukkan Kecamatan Pengambil dan Pengantar</p>
              <form action="{{route('alamatantar')}}" class="info" method="post"> 
                @csrf
                <div class="row">
                  <div class="form-group col-lg-6">
                    <label for="">Kecamatan Pembeli</label>
                    <select class="form-control" id="filter" name="kecamatanpembeli">
                      @foreach($kecamatans as $kecamatan)
                      <option value="{{$kecamatan->kode_kecamatan}}">{{$kecamatan->nama_kecamatan}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="country">Kecamatan Toko</label>
                    <select class="form-control" id="filter" name="kecamatantoko">
                      @foreach($toko as $tokos)
                      <option value="{{$tokos->kecamatan}}">{{$tokos->name}} | @foreach($kecamatans->where('kode_kecamatan', $tokos->kecamatan) as $kecamatan){{$kecamatan->nama_kecamatan}}@endforeach</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-lg-6">
                  <label for="country">Kelurahan</label>
                  <input type="text" class="form-control text-left px-3" placeholder="" name="kelurahan" value="{{$pembeli->kelurahan}}">
                  </div>
                  <div class="form-group col-lg-6">
                  <label for="country">No Handphone Aktif</label>
                  <input type="text" class="form-control text-left px-3" placeholder="" name="nohp" value="{{$pembeli->telepon}}">
                  </div>
                  <div class="form-group col-lg-12">
                  <label for="country">Alamat</label>
                  <input type="textbox" class="form-control text-left px-3" placeholder="" name="alamat" value="{{$pembeli->alamat}}">
                  </div>
                </div>
                <p><input type="submit" class="btn btn-primary py-3 px-4" value="Proses Alamat"></input></p>
              </form>
            </div>
          </div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Total Keranjang</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>Rp. {{number_format($pesanan->jumlah_harga)}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Ongkir</span>
    						<span> 
                  @if(!empty($ongkir))
                  Rp. {{number_format($ongkir->ongkir)}}
                  @else
                  Ambil Di Toko
                  @endif
                </span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rp. 
                  @if(!empty($ongkir))
                  {{number_format($ongkir->ongkir + $pesanan->jumlah_harga)}}
                  @else
                  {{number_format($pesanan->jumlah_harga)}}
                  @endif</span>
    					</p>
              <form action="{{route('tglcheckout')}}" method="post">
                @csrf
              @if(!empty($ongkir))
              <input id="toko_id" type="text" class="form-control" name="toko" required="" placeholder="" hidden="" value="
              {{$toko_id->id}}">
              <p>Diantar Dari Toko : <b>{{$toko_id->name}}</b></p>
              @else
              <div class="form-group">
                    <label for="country">Pilih Toko</label>
                    <select class="form-control" id="filter" name="toko">
                      @foreach($toko as $tokos)
                      <option value="{{$tokos->id}}">{{$tokos->name}}</option>
                      @endforeach
                    </select>
              </div>
              @endif
              <label>Diambil/Diantar pada :</label>
              <input id="hari" type="date" class="form-control" name="hari" required="" placeholder="masukkan hari ke-berapa diambil">
              <input id="ongkir" type="text" class="form-control" name="ongkir" required="" placeholder="" hidden="" value="@if(!empty($ongkir))
                  {{($ongkir->ongkir)}}
                  @else
                  0
                  @endif">
              
    				</div>
            @if(!empty($ongkir))
            @if($ongkir->status == 99)
            <p><b>PEMESANAN TIDAK DAPAT DIPROSES KARENA KURIR TIDAK MELAYANI ANTAR BARANG KE KECAMATAN TUJUAN</b>(Silahkan mengganti alamat dan toko tujuan yang tersedia)</p>
            @else
    				<p><input type="submit" class="btn btn-primary py-3 px-4" value="Proses Pemesanan"></input></p>
            @endif
            @else
            <p><input type="submit" class="btn btn-primary py-3 px-4" value="Proses Pemesanan"></input></p>
            @endif
          </form>
    			</div>
    		</div>
			</div>
      @endif
		</section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

<script>
  function showhide() {
  var x = document.getElementById("kirim");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
   @endsection