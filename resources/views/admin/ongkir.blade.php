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
             <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">id</th>
                      <th>status</th>
                      <th>ongkir</th>
                      <th>keterangan</th>
                      <th>aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($ongkirs as $ongkir)
                    <tr>
                      <td>{{$ongkir->id}}</td>
                      <td>{{$ongkir->status}}</td>
                      <td>
                        {{$ongkir->ongkir}}
                      </td>
                      <td>
                        {{$ongkir->keterangan}}
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