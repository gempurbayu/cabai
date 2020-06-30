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
                <h3 class="card-title">Edit Komoditas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ url('admin/komoditas/edit', $komoditas->id_komoditas) }}" enctype="multipart/form-data">
                {{csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama Komoditas</label>
                    <input type="text" class="form-control" id="nama" name="nama_komoditas" placeholder="masukkan nama" value="{{$komoditas->nama_komoditas}}">
                  </div>
                  <div class="form-group">
                    <label for="nama">Jenis</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" placeholder="masukkan jenis" value="{{$komoditas->jenis}}">
                  </div>
                  <div class="form-group">
                    <label for="nama">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="masukkan harga" value="{{$komoditas->harga}}">
                  </div>
                  <div class="form-group">
                    <label for="nama">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" placeholder="masukkan stok" value="{{$komoditas->stok}}">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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
