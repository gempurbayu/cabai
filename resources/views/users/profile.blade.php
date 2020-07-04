@extends('layouts.front')
@section('content')
<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="{{asset('ktp/'. $user->ktp)}}" class="avatar img-circle" alt="avatar" width="120px" height="120px">
          <h6>Ganti foto profil</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Info Personal</h3>
        
        <form class="form-horizontal" role="form" method="post" action="{{route('updateprofile')}}">
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama Lengkap :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{$user->name}}" required="" name="name">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{$user->email}}" required="" name="email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">No Handphone :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{$user->telepon}}" required="" name="telepon">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Kecamatan :</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value="{{$user->kecamatan}}" disabled="" name="kecamatan">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Alamat :</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value="{{$user->alamat}}" required="" name="alamat">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="" placeholder="******" required="" name="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Simpan Perubahan">
              <span></span>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
@endsection