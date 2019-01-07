@extends('layouts.app')

@section('content')

    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globes">Anggota Keluar</i> 
            <small class="pull-right">Date: {{ $date }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Dari
          <address>
            <strong>Nama : {{ $admin['nama'] }}</strong><br>
            Alamat : -<br>
            Phone: {{ $admin['telepon'] }}<br>
            Email: {{ $admin['email'] }}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Kepada
          <address>
            <strong>Nama : {{ $anggota['nama'] }}</strong><br>
            Alamat : {{ $anggota['alamat'] }}<br>
            Phone: {{ $anggota['telepon'] }}<br>
            Email: {{ $anggota['email'] }}
          </address>
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead"></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Simpanan Pokok :</th>
                <td> Rp. {{ number_format($simpanan_pokok, 2) }} </td>
              </tr>
              <tr>
                <th>Simpanan Wajib :</th>
                <td> Rp. {{ number_format($simpanan_wajib, 2) }}</td>
              </tr>
              <tr>
                <th>Simpanan Sukarela :</th>
                <td> Rp. {{ number_format($simpanan_sukarela, 2) }}</td>
              </tr>
              <tr>
                <th>Angsuran Tunggakan :</th>
                <td> Rp. {{ number_format($angsuran_tunggakan, 2) }}</td>
              </tr>

              <tr>
                <th>Dana yang harus dibayar : </th>
                <td>Rp. {{ number_format($dana_bayar, 2) }}</td>
              </tr>

              <tr>
                <th>Dana yang harus di kembalikan : </th>
                <td>Rp. {{ number_format($dana_kembali, 2) }}</td>
              </tr>

            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <!-- <a href="{{ route('pinjaman.print.cepat', 1) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i>  Cetak</a> -->
          <a type="button" href="{{ route('anggota.konfirmasi.keluar', ['id' => $id_user]) }}" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Setujui
          </a>
        </div>
      </div>
    </section>
    
@endsection

