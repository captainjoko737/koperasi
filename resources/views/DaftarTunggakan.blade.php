@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
         Daftar Tunggakan 
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Simpanan</a></li>
        <li class="active"> Daftar Tunggakan  </li>
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
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table-bordered table-striped table display nowrap" width="100%">
                <thead>
                <tr>
                  <th>Nama Nasabah</th>
                  <th>No.Rek</th>
                  <th>Tanggal Registrasi</th>
                  <th>Transaksi Terakhir</th>
                  <th>Transaksi Selanjutnya</th>
                  <th>Tanggal Tagihan</th>
                  <th>Besaran Bulanan</th>
                  <th>Tunggakan Wajib</th>
                  <th>Tunggakan Pokok Angsuran</th>
                  <th>Jumlah</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Nasabah</th>
                  <th>No.Rek</th>
                  <th>Tanggal Registrasi</th>
                  <th>Transaksi Terakhir</th>
                  <th>Transaksi Selanjutnya</th>
                  <th>Tanggal Tagihan</th>
                  <th>Besaran Bulanan</th>
                  <th>Tunggakan Wajib</th>
                  <th>Tunggakan Pokok Angsuran</th>
                  <th>Jumlah</th>
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
