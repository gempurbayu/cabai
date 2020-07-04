@extends('layouts.front')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->

<section id="home-section" class="hero">
          <div class="home-slider owl-carousel">
          <div class="slider-item" style="background-image: url({{ asset ('front/images/bg_1.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
              <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-12 ftco-animate text-center">
                  <h1 class="mb-2">CABE MERAH</h1>
                  <h2 class="subheading mb-4">CABE MERAH</h2>
                  <p><a href="#" class="btn btn-primary">View Details</a></p>
                </div>

              </div>
            </div>
          </div>

          <div class="slider-item" style="background-image: url({{ asset ('front/images/bg_2.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
              <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-sm-12 ftco-animate text-center">
                  <h1 class="mb-2">CABE MERAH</h1>
                  <h2 class="subheading mb-4">CABE MERAH</h2>
                  <p><a href="#" class="btn btn-primary">View Details</a></p>
                </div>

              </div>
            </div>
          </div>
        </div>
    </section>
@endsection