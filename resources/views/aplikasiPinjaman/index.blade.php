@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Aplikasi Pinjaman
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Simpanan</a></li>
        <li class="active">Simpanan Wajib</li>
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
              
            </div>
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>jumlah diajukan</th>
                  <th>jumlah disetujui</th>
                  <th>bulan cicilan diajukan</th>
                  <th>bulan cicilan disetujui</th>
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
                    <td>{{ $value['status'] }}</td>
                    <td>
                        <a href="{{ route('aplikasi_pinjaman.detail', ['id' => $value['id']]) }}"><i class="fa fa-search"></i></a> 
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>jumlah diajukan</th>
                  <th>jumlah disetujui</th>
                  <th>bulan cicilan diajukan</th>
                  <th>bulan cicilan disetujui</th>
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

