@extends('layouts.front')

@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach($komoditas as $komoditi)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product d-flex flex-column align-items-center justify-content-center">
                        <a href="{{ URL::to('komoditas/show/'.$komoditi->id_komoditas)}}" class="img-prod" width="400" height="400"><img style="width: 260px;height: 260px;" class="img-fluid" src="{{asset('img_komoditas/'.$komoditi->img_komoditas)}}" alt="Colorlib Template" width="400" height="400">
                            <!--<span class="status">30%</span> -->
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">{{$komoditi->nama_komoditas}}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price">Rp. {{$komoditi->harga}}</span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
            </div>
          </div>
        </div>
        </div>
    </section>
    
@endsection
