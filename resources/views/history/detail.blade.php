@extends('layouts.front')
@section('content')
    <section class="ftco-section ftco-cart">
			<div class="container">
        <h2 class="navbar-brand" style="color: #82ae46">Detail Pemesanan</h2>
        @if(!empty($pesanan))
        <p style="font-size: 20px">Kode Pemesanan : <b style="color: #82ae46">{{$pesanan->kode_transaksi}}</b></p>
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>No</th>
						        <th>Gambar</th>
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
                    <td>{{$no++}}</td>
						        <td class="image-prod"><div class="img" style="background-image:url({{asset('img_komoditas/'.$pesanan_detail->komoditas->img_komoditas)}})"></div></td>
						        
						        <td class="product-name">
						        	<h3>{{$pesanan_detail->komoditas->nama_komoditas}}</h3>
						        </td>
						        
						        <td class="jumlah">{{$pesanan_detail->jumlah}} Kg</td>
						        
						        <td class="harga">Rp. {{$pesanan_detail->komoditas->harga}}</td>
						        
						        <td class="total">Rp. {{$pesanan_detail->jumlah_harga}}</td>
						      </tr><!-- END TR-->
                  @endforeach
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		
        <div class="row justify-content-end">
    			<div class="col-lg-8 mt-5 cart-wrap ftco-animate">
            <div class="cart-total mb-6">
              <h2>Berhasil Checkout</h2>
              <p style="font-size: 20px">Silahkan untuk ke toko pada tanggal : <b style="color: #82ae46">{{$pesanan->tanggal_ambil}}</b></p>
              <p style="font-size: 20px">Alamat Toko : <b style="color: #82ae46">Kec. {{$pesanan->toko->kecamatan}}, Kel. {{$pesanan->toko->kelurahan}}, {{$pesanan->toko->alamat}}</b></p>

            </div>
    			</div>
          <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
            <div class="cart-total mb-3">
              <h3>Total Belanja</h3>
              <p class="d-flex">
                <span>Subtotal</span>
                <span>Rp. {{number_format($pesanan->jumlah_harga)}}</span>
              </p>
              <p class="d-flex">
                <span>Diskon</span>
                <span>Rp. 0</span>
              </p>
              <hr>
              <p class="d-flex total-price">
                <span>Total</span>
                <span>Rp. {{number_format($pesanan->jumlah_harga)}}</span>
              </p>
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
   @endsection