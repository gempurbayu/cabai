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
                <h3>{{$komoditas->count('id_komoditas')}}</h3>

                <p>Banyak Komoditas</p>
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
                      <th style="width: 10px">#</th>
                      <th>Nama</th>
                      <th>Jenis</th>
                      <th>Harga</th>
                      <th>Jumlah Stok</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($komoditas as $komoditi)
                    <tr>
                      <td>1.</td>
                      <td>{{$komoditi->nama_komoditas}}</td>
                      <td>
                        {{$komoditi->jenis}}
                      </td>
                      <td>
                        Rp. {{$komoditi->harga}}
                      </td>
                      <td>
                        {{$komoditi->inventory->sum('qty_stok') + $komoditi->barangmasuk->sum('qty_barangmasuk') - $komoditi->pesanan_detail->sum('jumlah')}} kg
                      </td>
                      <td>
                      <img src="{{asset('img_komoditas/'.$komoditi->img_komoditas)}}" class="img-fluid" alt="Colorlib Template" width="100px" height="100px">
                      </td>
                      <td>
                        <form action="{{ url('/admin/komoditas/delete', $komoditi->id_komoditas)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        <a href="{{ url('/admin/komoditas/edit', $komoditi->id_komoditas)}}" class="btn btn-primary"> Edit</a>
                        <a href="{{ url('/admin/stok', $komoditi->id_komoditas)}}" class="btn btn-success">Update Stok</a>
                        <a href="{{ url('/admin/barangmasuk', $komoditi->id_komoditas)}}" class="btn btn-info">Barang Masuk</a>
                      </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
                <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    {{ $komoditas->links() }}
                  </ul>
                </div>
              <!-- /.card-body -->
            <!-- /.card -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Komoditas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ route('insertkomoditas') }}" enctype="multipart/form-data">
                {{csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama Komoditas</label>
                    <input type="text" class="form-control" id="nama" name="nama_komoditas" placeholder="masukkan nama">
                  </div>
                  <div class="form-group">
                    <label for="nama">Jenis</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" placeholder="masukkan jenis">
                  </div>
                  <div class="form-group">
                    <label for="nama">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="masukkan harga">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                       <input id="img_komoditas" type="file" name="img_komoditas" class="form-control{{ $errors->has('img_komoditas') ? ' is-invalid' : '' }}" >
                                @if ($errors->has('img_komoditas'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('img_komoditas') }}</strong>
                                    </span>
                                @endif
                      </div>
                    </div>
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
