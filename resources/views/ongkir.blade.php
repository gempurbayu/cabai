@extends('layouts.front')

@section('content')


<div class="cart_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="cart_container">
					<div class=" text-center">
            		<h1 class="mb-0 bread">Cek Ongkir</h1> <br><br>
          			</div>
					
				<form action="#" method="get">
					<div class="row">
					    <div class="col-md-6">
					        
					          <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pengirim</label>
                                <input type="text" name="nama1" value="{{ old('nama1') }}" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">kecamatan Asal</label>
                                <select class="kecamatan1 form-control" name="kecamatan1">
                                    <option selected="" disabled="">Pilih kecamatan</option>
                                    
                                    <option value=""></option>
                                    
                                </select>
                              </div>                           
					    </div>
					    <div class="col-md-6">
					        
					          <div class="form-group">
                                <label for="exampleInputEmail1">Nama Penerima</label>
                                <input type="text" name="nama2" value="{{ old('nama2') }}" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">kecamatan Tujuan</label>
                                <select class="kecamatan2 form-control" name="kecamatan2">
                                    <option selected="" disabled="">Pilih kecamatan</option>
                                    
                                    <option value=""></option>
                                </select>
                              </div>
					    </div>
					    
					</div>
					
					<div class="row">
					    <div class="col-md-6">
					        
                              <div class="form-group">
                                <label for="exampleInputEmail1">Kurir</label>
                                <select class="kurir form-control" name="kurir">
                                    <option selected="" disabled="">Pilih Kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS</option>
                                </select>
                              </div>
                            
					    </div>
					    <div class="col-md-6">
					        
                              <div class="form-group">
                                <label for="exampleInputEmail1">Kode Pos</label>
                                <input type="number" class="form-control" name="kode_pos" value="{{ old('kode_pos') }}">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">No. Handphone</label>
                                <input type="number" class="form-control" name="nope" value="{{ old('nope') }}">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Alamat Lengkap</label>
                                <textarea class="form-control" name="alamat" rows="10">Misal: Kp.contoh, jl. Lamin rt02/03 no.04 kel.jatiluhur kec.jatiasih Bekasi Jawa barat 17425</textarea>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Layanan</label>
                                <select class="form-control layananNya" name="layanan">
                                    <option selected="" disabled="">Klik Cek Ongkir terlebih Dahulu</option>
                                </select>
                              </div>
                            
					    </div>
					</div>
					<div class="bawah">
						<button type="submit" class="btn btn-primary"><a class="cek-ongkir">Cek Ongkir</a></button>

						<button type="submit" class="btn btn-primary">Lanjut Bayar</button>
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

@endsection