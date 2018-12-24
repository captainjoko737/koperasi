@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Simpanan Sukarela
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Simpanan</a></li>
        <li class="active">Simpanan Sukarela  </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Simpanan Sukarela</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Simpanan Wajib</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($result as $key => $value)
                  <tr>
                    <td>{{ $value['nama'] }}</td>
                    <td>{{ $value['telepon'] }}</td>
                    <td>{{ $value['email'] }}</td>
                    <td>Rp. {{ number_format($value['simpanan_sukarela'], 2) }}</td>
                    <td>{{ $value['status'] }}</td>
                    <td>
                        <a href="{{ route('SimpananSukarela.detail', ['id' => $value['id']]) }}"><i class="fa fa-edit"></i></a> 
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Simpanan Wajib</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection
