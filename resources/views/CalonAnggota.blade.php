@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Calon Anggota
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Calon Anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Calon Anggota</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Simpanan Pokok</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($result as $key => $value)
                <tr>
                  <td>{{ $value['nama'] }}</td>
                  <td>{{ $value['ttl'] }}</td>
                  <td>{{ $value['jenis_kelamin'] }}</td>
                  <td>{{ $value['alamat'] }}</td>
                  <td>{{ $value['telepon'] }}</td>
                  <td>{{ $value['email'] }}</td>
                  <td>Rp. {{ number_format($value['simpananPokok']['jumlah'], 2) }}</td>
                  <td>{{ $value['simpananPokok']['tanggal'] }}</td>
                  <td>{{ $value['status'] }}</td>
                  <td>
                      <a href="{{ route('CalonAnggota.edit', ['id' => $value['id']]) }}"><i class="fa fa-edit"></i></a> 
                      <a href="{{ route('anggota.delete', ['id' => $value['id']]) }}"><i class="fa fa-trash-o"></i></a>     
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Simpanan Pokok</th>
                  <th>Tanggal</th>
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
