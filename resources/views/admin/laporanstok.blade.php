@extends('layouts.panel')
@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <!-- /.card -->
             <div class="card-body">
              <div class="row">
                <div class="form-group">
                <form method="post" action="{{route('filterpesanan')}}" enctype="">
                  @csrf
                  <label for="sel1">Pilih Status Pemesanan :</label>
                  <select class="form-control" id="filter" name="status">
                    <option value="0">Belum Checkout</option>
                    <option value="1">Menunggu Pengambilan</option>
                    <option value="2">Selesai</option>
                    <option value="3">Batal</option>
                  </select>
                  <p> </p>
                    <input type="submit" name="filter" value="filter" class="btn btn-primary">
                </form>
                </div>
              </div>


                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama Komoditas</th>
                      <th>Jenis</th>
                      <th>Barang Masuk</th>
                      <th>Toko</th>
                      <th>Admin</th>
                      <th>Tanggal Masuk</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $no = 1;
                    ?>
                    @foreach($barangs as $barang)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$barang->nama_komoditas}}</td>
                      <td>
                        {{$barang->jenis}}
                      </td>
                      <td>
                        {{$barang->qty_stok}}
                      </td>
                      <td>
                        @foreach($users->where('id', $barang->toko_id) as $user)
                          {{$user->name}}
                        @endforeach
                      </td>
                      <td>
                        @foreach($users->where('id', $barang->created_by) as $user)
                          {{$user->name}}
                        @endforeach
                      </td>
                      <td>
                        {{$barang->created_at}}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
    
                </ul>
              </div>
            </div>
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