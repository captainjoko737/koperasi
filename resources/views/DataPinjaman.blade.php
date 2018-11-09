@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Data Pinjaman
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Pinjaman</a></li>
        <li class="active">Data Pinjaman</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Peminjam</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Peminjam</th>
                  <th>Jumlah Pinjaman</th>
                  <th>Tenor</th>
                  <th>Angsuran Ke</th>
                  <th>Sisa Pinjaman</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($result as $key => $value)
                <tr>
                  <td>{{ $value['nama'] }}</td>
                  <td>Rp. {{ number_format($value['jumlah_pinjaman'], 2) }}</td>
                  <td>{{ $value['tenor'] }}</td>
                  <td>{{ $value['angsuran_ke'] }}</td>
                  <td>Rp. {{ number_format($value['sisa_pinjaman'], 2) }}</td>
                  <td>
                      <a href="{{ route('pinjaman.detail', ['id' => $value['id']]) }}"><i class="fa fa-search"></i></a> 
                  </td>
                </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Peminjam</th>
                  <th>Jumlah Pinjaman</th>
                  <th>Tenor</th>
                  <th>Angsuran Ke</th>
                  <th>Sisa Pinjaman</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
              <!-- 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Nama Peminjam</th>
                  <th>Jumlah Pinjaman</th>
                  <th>Tenor</th>
                  <th>Angsuran Ke</th>
                  <th>Sisa Pinjaman</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($result as $key => $value)
                <tr>
                  <td>{{ $value['nama'] }}</td>
                  <td>Rp. {{ number_format($value['jumlah_pinjaman'], 2) }}</td>
                  <td>{{ $value['tenor'] }}</td>
                  <td>{{ $value['angsuran_ke'] }}</td>
                  <td>Rp. {{ number_format($value['sisa_pinjaman'], 2) }}</td>
                </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                  
                  <th>Nama Peminjam</th>
                  <th>Jumlah Pinjaman</th>
                  <th>Tenor</th>
                  <th>Angsuran Ke</th>
                  <th>Sisa Pinjaman</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table> -->
            </div>
            <!-- /.box-body -->
          </div>
                    
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection
