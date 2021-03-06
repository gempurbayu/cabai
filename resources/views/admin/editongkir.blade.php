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
                <h3 class="card-title">Edit Ongkir</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ url('admin/ongkir/edit', $ongkirs->id) }}" enctype="multipart/form-data">
                {{csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Status</label>
                    <input type="text" class="form-control" id="harga" name="status" placeholder="masukkan status" value="{{$ongkirs->status}}">
                  </div>
                  <div class="form-group">
                    <label for="nama">Ongkir</label>
                    <input type="text" class="form-control" id="ongkir" name="ongkir" placeholder="masukkan ongkir" value="{{$ongkirs->ongkir}}">
                  </div>
                  <div class="form-group">
                    <label for="nama">Keterangan</label>
                    <input type="text" class="form-control" id="jenis" name="keterangan" placeholder="masukkan keterangan" value="{{$ongkirs->keterangan}}">
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
