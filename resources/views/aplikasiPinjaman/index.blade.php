@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Aplikasi Pinjaman
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Pinjaman</a></li>
        <li class="active">Aplikasi Pinjaman</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Aplikasi Pinjaman</h3> 
              <div class="box-footer clearfix no-border">
              <a  href="{{ route('aplikasi_pinjaman.add') }}"  type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if (session('status'))
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Perhatian!</h4>
                    {{ session('status') }}
                  </div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Jumlah Diajukan</th>
                  <th>Jumlah Disetujui</th>
                  <th>Bulan Cicilan Diajukan</th>
                  <th>Bulan Cicilan Disetujui</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($result as $key => $value)
                  <tr>
                    <td>{{ $value['nama'] }}</td>
                    <td>Rp. {{ number_format($value['jumlah_diajukan'], 2) }}</td>
                    <td>Rp. {{ number_format($value['jumlah_disetujui'], 2) }}</td>
                    <td>{{ $value['bulan_cicilan_diajukan'] }}</td>
                    <td>{{ $value['bulan_cicilan_disetujui'] }}</td>
                    <td>

                      @if ($value['status'] == 'sedang di proses')
                        <span class="badge label-warning"> Sedang di Proses</span>
                      @elseif ($value['status'] == 'disetujui')
                        <span class="badge label-success">Di Setujui</span>
                      @else
                        <span class="badge label-danger">Tidak di Setujui</span>
                      @endif
 
                    </td>

                    <td>
                        @if ($value['status'] != 'tidak disetujui')
                          <a href="{{ route('aplikasi_pinjaman.detail', ['id' => $value['id']]) }}"><i class="fa fa-search"></i></a> 
                        @endif
                        <!-- <a href="{{ route('aplikasi_pinjaman.detail', ['id' => $value['id']]) }}"><i class="fa fa-pencil"></i></a>  -->
                        <a href="{{ route('aplikasi_pinjaman.delete', ['id' => $value['id']]) }}"><i class="fa fa-trash"></i></a> 
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Jumlah Diajukan</th>
                  <th>Jumlah Disetujui</th>
                  <th>Bulan Cicilan Diajukan</th>
                  <th>Bulan Cicilan Disetujui</th>
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

