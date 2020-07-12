@extends('layouts.panel')
@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <!-- /.card -->
              <!-- /.card-body -->
            <!-- /.card -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Stok</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ url('admin/stok', $komoditas->id_komoditas) }}" enctype="multipart/form-data">
                {{csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama Komoditas</label>
                    <input type="text" class="form-control" id="nama" name="nama_komoditas" 
                   disabled="" placeholder="masukkan nama" value="{{$komoditas->nama_komoditas}}">
                  </div>
                  <div class="form-group">
                        <label>Pilih Toko</label>
                        <select class="form-control" name="toko_id">
                          @foreach($toko as $tokos)
                          <option value="{{$tokos->id}}">{{$tokos->name}}</option>
                          @endforeach
                        </select>
                      </div>
                  <div class="form-group">
                    <label for="nama">Jumlah Stok</label>
                    <input type="text" class="form-control" id="harga" name="qty_stok" placeholder="masukkan jumlah stok" value="{{$komoditas->harga}}">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form> 
            </div>
              <!-- /.card-body -->
            
            <!-- /.card -->
            <!-- DIRECT CHAT -->
            
            <!--/.direct-chat -->

            <!-- TO DO List -->
            
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <!-- <section class="col-lg-5 connectedSortable"> -->

            <!-- Map card -->
            
            <!-- /.card -->

            <!-- solid sales graph -->
            
            <!-- /.card -->

            <!-- Calendar -->

            <!-- /.card -->
         <!-- </section> -->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  @endsection