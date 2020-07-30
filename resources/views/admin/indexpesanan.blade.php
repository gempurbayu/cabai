@extends('layouts.panel')
@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->

            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$pesanans->where('status', 0)->count('id')}}</h3>

                <p>Pesanan Belum Checkout</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$pesanans->where('status', 1)->count('id')}}</h3>

                <p>Pesanan Menunggu Diambil</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$pesanans->where('status', 2)->count('id')}}</h3>

                <p>Pesanan Selesai</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$pesanans->where('status', 3)->count('id')}}</h3>

                <p>Pesanan Dibatalkan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
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
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" id="filter" name="status">
                        <option selected>Choose...</option>
                        <option value="0">Belum Checkout</option>
                        <option value="1">Menunggu Pengambilan</option>
                        <option value="2">Selesai</option>
                        <option value="3">Batal</option>
                        </select>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit" name="filter" value="filter">Submit</button>
                    </div>
                </form>
                </div>
              </div>


                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama Pemesan</th>
                      <th>Tanggal Pemesanan</th>
                      <th>Kode Transaksi</th>
                      <th>Tanggal Ambil</th>
                      <th>Total Harga</th>
                      <th>Status Pesanan</th>
                      <th>Keterangan</th>
                      <th>aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $no = 1;
                    ?>
                    @foreach($pesanans as $pesanan)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$pesanan->user->name}}</td>
                      <td>
                        {{$pesanan->tanggal}}
                      </td>
                      <td>
                        {{$pesanan->kode_transaksi}}
                      </td>
                      <td>
                        {{$pesanan->tanggal_ambil}}
                      </td>
                      <td>
                        {{$pesanan->jumlah_harga}}
                      </td>
                      <td>
                        @if($pesanan->status == 0)
                            <p class="badge badge-danger">Belum Checkout</p>
                        @elseif($pesanan->status == 1)
                            <p class="badge badge-primary">Belum Diambil</p>
                        @elseif($pesanan->status == 2)
                            <p class="badge badge-success">Selesai</p>
                        @else
                            <p class="badge badge-danger">Dibatalkan</p>
                        @endif
                      </td>
                      <td>
                          {{$pesanan->keterangan}}
                      </td>
                      <td>
                        <a href="{{url('admin/pesanan/detail/'.$pesanan->id)}}" class="btn btn-primary btn-sm">Detail</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  {{ $pesanans->links() }}
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