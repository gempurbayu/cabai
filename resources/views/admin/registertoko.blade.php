@extends('layouts.panel')
@section('content')
<section class="pt60 pb60">
    <div class="container">
        <div class="row">
            <div class="col-sm-16 col-md-11 col-lg-7 mx-auto">
                <!-- Login Card Starts-->
                <div class="card card-signin mt20 mb20">
                    <div class="card-body">
                    	    	<h3><b>Buat Toko Baru</b></h3>
                        <form method="POST" action="{{ route('storetoko') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Toko') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telepon" class="col-md-4 col-form-label text-md-right">{{ __('No Telepon') }}</label>

                            <div class="col-md-6">
                                <input id="telepon" type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" required autocomplete="telepon" autofocus>

                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kecamatan" class="col-md-4 col-form-label text-md-right">{{ __('Kecamatan') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="filter" name="kecamatan">
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

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kelurahan" class="col-md-4 col-form-label text-md-right">{{ __('Kelurahan') }}</label>

                            <div class="col-md-6">
                                <input id="kelurahan" type="text" class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" value="{{ old('kelurahan') }}" required autocomplete="kelurahan" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('kecamatan') }}" required autocomplete="alamat" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Foto Profile') }}</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" name="avatar" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" >
                                @if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('KTP') }}</label>

                            <div class="col-md-6">
                                <input id="ktp" type="file" name="ktp" class="form-control{{ $errors->has('ktp') ? ' is-invalid' : '' }}" >
                                @if ($errors->has('ktp'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ktp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Buat Toko') }}
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





@endsection