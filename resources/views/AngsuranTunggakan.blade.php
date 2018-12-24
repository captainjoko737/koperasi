@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Angsuran Tunggakan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Pinjaman</a></li>
        <li class="active">Angsuran Tunggakan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Tunggakan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Nama</th>
                  <th>No. Tlp</th>
                  <th>Angsuran Ke</th>
                  <th>Denda</th>
                  <th>Tanggal Jatuh Tempo</th>
                </tr>
                </thead>
                <tbody>
                  
                @foreach ($result as $key => $value)
                  <tr>
                    <td>{{ $value['nama'] }}</td>
                    <td>{{ $value['telepon'] }}</td>
                    <td>{{ $value['angsuran_ke'] }}</td>
                    <td>Rp. {{ number_format($value['denda'], 2) }}</td>
                    <td>{{ $value['jatuh_tempo'] }}</td>
                  </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  
                  <th>Nama</th>
                  <th>No. Tlp</th>
                  <th>Angsuran Ke</th>
                  <th>Denda</th>
                  <th>Tanggal Jatuh Tempo</th>
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
