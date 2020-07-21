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
                <form method="post" action="{{route('filterbarangtoko')}}" enctype="">
                  @csrf
                  <label for="sel1">Pilih Toko :</label>
                  <select class="form-control" id="filter" name="toko">
                    @foreach($users as $toko)
                    <option value="{{$toko->id}}">{{$toko->name}}</option>
                    @endforeach
                  </select>
                  <label for="sel1">Pilih Komoditas :</label>
                  <select class="form-control" id="filter" name="komoditas">
                    @foreach($komoditas as $komoditi)
                    <option value="{{$komoditi->id_komoditas}}">{{$komoditi->nama_komoditas}}</option>
                    @endforeach
                  </select>
                  <p> </p>
                    <input type="submit" name="filter" value="pilih" class="btn btn-primary">
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
                        {{$barang->total_barangmasuk}} Kg
                      </td>
                      <td>
                        @foreach($users->where('id', $barang->toko_id) as $user)
                          {{$user->name}}
                        @endforeach
                      </td>
                      <td>
                        @foreach($users->where('id', $barang->user_id) as $user)
                          {{$user->name}}
                        @endforeach
                      </td>
                      <td>
                        {{$barang->tanggal_masuk}}
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