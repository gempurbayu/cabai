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
            <a href="{{ url('/admin/ongkir/baru')}}" class="btn btn-success">Buat Baru</a>
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
                      <td>
                        <form action="{{ url('/admin/ongkir/delete', $ongkir->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('/admin/ongkir/edit', $ongkir->id)}}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" type="submit">Hapus</button>
                      </form></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

    @endsection