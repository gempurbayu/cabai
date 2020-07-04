@extends('layouts.front')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url({{ asset ('front/images/bg_1.jpg')}});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span> <span>Tentang Kami</span></p>
            <h1 class="mb-0 bread">Tentang Kami</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset ('frontt/images/about.jpg')}});">
            <!-- <a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
              <span class="icon-play"></span>
            </a> -->
            <iframe width="560" height="315" src="https://www.youtube.com/embed/9AALILYu58w?start=8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
            <div class="heading-section-bold mb-4 mt-md-5">
              <div class="ml-md-0">
                <h2 class="mb-4">Selamat datang di situs CABEMERAH</h2>
              </div>
            </div>
            <div class="pb-md-5">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
              <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
              <p><a href="{{ url('/komoditas') }}" class="btn btn-primary">Pesan Sekarang</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
