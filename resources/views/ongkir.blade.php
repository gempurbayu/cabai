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
            <img src="{{ asset ('front/images/peta.jpg')}}" width="120%" height="80%" style="display: block; margin: auto;">
          </div>
          <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
            <div class="heading-section-bold mb-4 mt-md-5">
              <div class="ml-md-0">
                <h2 class="mb-4">cek ongkir</h2>
              </div>
            </div>
            <div class="cart_section">


    <div class="container">
      <div class="row">
      <div class="col-lg-10 offset-lg-1">
        <div class="cart_container">
            <form action="#" method="get">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">kecamatan Toko</label>
                      <select class="kecamatan1 form-control" name="kecamatan1">
                        <option selected="" disabled="">Pilih kecamatan</option>
                        <option value="1">Batam Kota</option>
                        <option value="2">Batu Aji</option>
                        <option value="3">Batu Ampar</option>
                        <option value="4">Belakang Padang</option>
                        <option value="5">Bengkong</option>
                        <option value="6">Bulang</option>
                        <option value="7">Galang</option>
                        <option value="8">Lubuk Baja</option>
                        <option value="9">Nongsa</option>
                        <option value="10">Sagulung</option>
                        <option value="11">Sei Beduk</option>
                        <option value="12">Sekupang</option>
                      </select>
                    </div>                           
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">kecamatan Pembeli</label>
                      <select class="kecamatan2 form-control" name="kecamatan2">
                        <option selected="" disabled="">Pilih kecamatan</option>
                        <option value="1">Batam Kota</option>
                        <option value="2">Batu Aji</option>
                        <option value="3">Batu Ampar</option>
                        <option value="4">Belakang Padang</option>
                        <option value="5">Bengkong</option>
                        <option value="6">Bulang</option>
                        <option value="7">Galang</option>
                        <option value="8">Lubuk Baja</option>
                        <option value="9">Nongsa</option>
                        <option value="10">Sagulung</option>
                        <option value="11">Sei Beduk</option>
                        <option value="12">Sekupang</option>
                        <option value=""></option>
                      </select>
                    </div>
                  </div>
              </div>

              <button type="submit" class="btn btn-primary"><a class="cek-ongkir">Cek Ongkir</a></button>
              <br>

          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ongkir</label>
                    <input type="number" class="form-control" name="Ongkir" value="{{ old('Ongkir') }}">
                </div>
              </div>      
          </div>
              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">kecamatan Toko</label>
                  <select class="kecamatan1 form-control" name="kecamatan1">
                  <option selected="" disabled="">Cek ongkir terlebih dahulu</option>
                  </select>
              </div>                           
              </div>
              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">kecamatan Pembeli</label>
                  <select class="kecamatan2 form-control" name="kecamatan2">
                  <option selected="" disabled="">Cek Ongkir terlebih dahulu</option>   
                  </select>
              </div>
              </div>
              </div>

          <div class="bawah">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="{{ old('keterangan') }}">
                </div>
              </div>      
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-ongkir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <!--<h4 class="modal-title" id="myModalLabel">Modal title</h4>-->
      </div>
      <div class="modal-body">
        <p><b><i>Harap tunggu.. </i></b></p>
      </div>
    </div>
  </div>
</div>
          </div>
        </div>
      </div>
    </section>
@endsection
