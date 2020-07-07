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
                          <div class="container">
                @if(!empty($pesanan))
                <p style="font-size: 20px">Kode Pemesanan : <b style="color: #82ae46">{{$pesanan->kode_transaksi}}</b></p>
                <div class="row">
                  <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                      <table class="table">
                        <thead class="thead-primary">
                          <tr class="text-center">
                            <th>No</th>
                            <th>Nama Komoditas</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1; ?>
                          @foreach($pesanan_details as $pesanan_detail)
                          <tr class="text-center">
                            <td>{{$no++}}</td>
                            <td class="product-name">
                              {{$pesanan_detail->komoditas->nama_komoditas}}
                            </td>
                            
                            <td class="jumlah">{{$pesanan_detail->jumlah}} Kg</td>
                            
                            <td class="harga">Rp. {{$pesanan_detail->komoditas->harga}}</td>
                            
                            <td class="total">Rp. {{$pesanan_detail->jumlah_harga}}</td>
                          </tr><!-- END TR-->
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                  <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                      <h3>Total Belanja</h3>
                      <p class="d-flex">
                        <span>Subtotal</span>
                        <span>Rp. {{number_format($pesanan->jumlah_harga)}}</span>
                      </p>
                      <p class="d-flex">
                        <span>Diskon</span>
                        <span>Rp. 0</span>
                      </p>
                      <hr>
                      <p class="d-flex total-price">
                        <span>Total</span>
                        <span>Rp. {{number_format($pesanan->jumlah_harga)}}</span>
                      </p>
                    </div>
                </div>
              </div>
              @endif
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