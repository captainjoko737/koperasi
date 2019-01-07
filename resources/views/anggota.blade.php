@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Anggota
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Anggota</h3> 
              <div class="box-footer clearfix no-border">
              <a  href="{{ route('anggota.add') }}"  type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            
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
                    
                        <a href="{{ route('anggota.edit', ['id' => $value['id']]) }}"><i class="fa fa-edit"></i></a> 

                        @if ($value['status'] == 'Aktif' && $value['json_data'] == NULL)
                            <a href="{{ route('anggota.keluar', ['id' => $value['id']]) }}"><i class="fa fa-share-square-o"></i></a> 
                        @elseif ($value['json_data'] != NULL)
                            <a href="{{ route('anggota.keluar.print', ['id' => $value['id']]) }}" target="_blank"><i class="fa fa-print"></i></a> 
                        @endif
                        
                        <!-- <a href="{{ route('anggota.delete', ['id' => $value['id']]) }}"><i class="fa fa-trash-o"></i></a>  -->
                        <form class="delete" action="{{ route('anggota.delete', ['id' => $value['id']]) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="{{$value->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <button type="submit" ><i class="fa fa-trash"></i></button> 
                        </form>
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

