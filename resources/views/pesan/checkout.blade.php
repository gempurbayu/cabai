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

    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
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
              <label>Diambil hari ke :</label>
              <form action="{{route('tglcheckout')}}" method="post">
                @csrf
              <input id="hari" type="date" class="form-control" name="hari" required="" placeholder="masukkan hari ke-berapa diambil">
              
    				</div>
    				<p><input type="submit" class="btn btn-primary py-3 px-4" value="Proses Pemesanan"></input></p>
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
   @endsection