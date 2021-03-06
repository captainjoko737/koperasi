@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Data Simpanan Anggota
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Simpanan</a></li>
        <li class="active">Data Simpanan Anggota </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Simpanan Pokok</th>
                  <th>Simpanan Wajib</th>
                  <th>Simpanan Sukarela</th>
                  <th>Jumlah Saldo</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($result as $key => $value)
                  <tr>
                    <td>{{ $value['nama'] }}</td>
                    <td>Rp. {{ number_format($value['simpanan_pokok'], 2) }}</td>
                    <td>Rp. {{ number_format($value['simpanan_wajib'], 2) }}</td>
                    <td>Rp. {{ number_format($value['simpanan_sukarela'], 2) }}</td>
                    <td>Rp. {{ number_format($value['total_simpanan'], 2) }}</td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Simpanan Pokok</th>
                  <th>Simpanan Wajib</th>
                  <th>Simpanan Sukarela</th>
                  <th>Jumlah Saldo</th>
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
