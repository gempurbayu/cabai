@extends('layouts.front')
@section('content')

    <section class="ftco-section ftco-cart">
			<div class="container">
        <h2 class="navbar-brand" style="color: #82ae46">Detail Pemesanan</h2>
        @if(!empty($pesanans))
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>No</th>
						        <th>Tanggal Pemesanan</th>
						        <th>Status</th>
						        <th>Total Harga</th>
						        <th>Detail</th>
						      </tr>
						    </thead>
						    <tbody>
                  <?php $no = 1; ?>
                  @foreach($pesanans as $pesanan)
						      <tr class="text-center">
						        <td class="no">{{$no++}}</td>
						        
						        <td class="tanggal">{{$pesanan->tanggal}}</td>
						        
						        <td class="status">
						        	@if($pesanan->status == 1)
                        Menunggu Pengambilan Barang
                      @elseif($pesanan->status == 2)
                        Pesanan Akan Diantar
                      @else
                        Pesanan Selesai
                      @endif
						        </td>
						        
						        <td class="jumlah">Rp. {{number_format($pesanan->jumlah_harga)}}</td>
                    <td>
                      <a href="{{url('history/'.$pesanan->id)}}" class="btn btn-primary"><i class="fas fa-info"></i>  Lihat</a>
                    </td>
						        
						      </tr><!-- END TR-->
                  @endforeach
						    </tbody>
						  </table>
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