@extends('layouts.app')

@section('content')

<section class="content-header">
      <h1>
        Pengurus
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Pengurus</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Pengurus</h3> 
              <div class="box-footer clearfix no-border">
              <a  href="{{ route('Karyawan.add') }}"  type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Karyawan</th>
                  <th>TTL</th>
                  <th>Jenis Kelamin</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($result as $key => $value)
                  <tr>
                    <td>{{ $value['nama'] }}</td>
                    <td>{{ $value['ttl'] }}</td>
                    <td>{{ $value['jenis_kelamin'] }}</td>
                    <td>{{ $value['telepon'] }}</td>
                    <td>{{ $value['email'] }}</td>
                    <td>{{ $value['jabatan'] }}</td>
                    <td>
                    
                        <a href="{{ route('Karyawan.edit', ['id' => $value['id']]) }}"><i class="fa fa-edit"></i></a> 
                        <a href="{{ route('Karyawan.delete', ['id' => $value['id']]) }}"><i class="fa fa-trash-o"></i></a> 
                      
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Karyawan</th>
                  <th>TTL</th>
                  <th>Jenis Kelamin</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Jabatan</th>
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
