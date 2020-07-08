@extends('layouts.toko')
@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$pesanans->count('id')}}</h3>

                <p>Banyak Pesanan</p>
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
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
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
                <h3>44</h3>

                <p>User Registrations</p>
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
                <h3>65</h3>

                <p>Unique Visitors</p>
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
                        @if($pesanan->status == 1)
                          <a href="{{url('toko/pesanan/success/'.$pesanan->id)}}" class="btn btn-success btn-sm">Sudah Diambil</a>
                          <a href="{{url('toko/pesanan/detail/'.$pesanan->id)}}" class="btn btn-primary btn-sm">Lihat Detail</a>
                          <p> </p>
                          <a href="{{url('toko/pesanan/cancel/'.$pesanan->id)}}" class="btn btn-danger btn-sm">Batalkan</a>
                        @else
                        <a href="{{url('toko/pesanan/detail/'.$pesanan->id)}}" class="btn btn-primary btn-sm">Lihat Detail</a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
