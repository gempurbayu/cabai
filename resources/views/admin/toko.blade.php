@extends('layouts.panel')
@section('content')
<!-- Default box -->
      <div class="card card-solid">
        <a href="/admin/toko/baru" class="btn btn-primary">Buat Toko Baru</a>
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
          	@foreach($tokos as $toko)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Agen CabeMerah
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$toko->name}}</b></h2>
                      <p class="text-muted text-sm"><b>Email : </b> {{$toko->email}} </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: {{$toko->kecamatan}}, {{$toko->alamat}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> No Telepon: {{$toko->telepon}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{asset('avatar/'. $toko->avatar)}}" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <!-- /.card -->
@endsection