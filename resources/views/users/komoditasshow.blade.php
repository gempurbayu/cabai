@extends('layouts.front')
@section('content')
<section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="#" class="image-popup"><img src="{{asset('img_komoditas/'.$data->img_komoditas)}}" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>{{$data->nama_komoditas}}</h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
						</div>
    				<p class="price"><span>Rp. {{$data->harga}}</span></p>
    				<p>Daftar Stok : </p>
    				@foreach($stok as $stoks)
						<p>
						@foreach($toko->where('id', $stoks->toko_id) as $tokos)
                          {{$tokos->name}}
                          	@foreach($kecamatan->where('kode_kecamatan', $tokos->kecamatan) as $kecamatans)
                          		({{$kecamatans->nama_kecamatan}})
                        	@endforeach
                        @endforeach
                         : <b>{{$stoks->stok_update}} Kg</b>
                		</p>
                		 @endforeach
						</p>
						{{$stok->links()}}
				<div class="row">
					<div class="col-md-8">
						<form method="post" action="{{url('pesan')}}/{{$data->id_komoditas}}">
							@csrf
							<div class="input-group col-md-8 d-flex mb-1">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	            	
	             	<input type="text" id="jumlah_pesan" name="jumlah_pesan" class="form-control input-number col-lg-12" value="1" min="1">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
          	</div>
          	<button type="submit" class="btn btn-success btn-lg" style="color: green">Tambahkan ke Keranjang</button>
          	</form>
    			</div>
    		</div>
    	</div>
    </section>
@endsection