<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KOPERASI FKIP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admin/dist/css/AdminLTE.min.css')}}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globes">Angsuran #{{ $angsuran_ke }}</i> 
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
            <strong>Nama : {{ $pinjaman['nama'] }}</strong><br>
            Alamat : {{ $pinjaman['alamat'] }}<br>
            Phone: {{ $pinjaman['telepon'] }}<br>
            Email: {{ $pinjaman['email'] }}
          </address>
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Tanggal Jatuh Tempo</th>
              <th>Angsuran Ke</th>
              <th>Angsuran Pokok</th>
              <th>Bunga</th>
              <th>Denda</th>
              <th>Subtotal Angsuran</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($result as $key => $value) 
              <tr>
                <td>{{ $value['tanggal_jatuh_tempo']->format('d-m-Y') }}</td>
                <td>{{ $value['angsuran_ke'] }}</td>
                <td>Rp. {{ number_format($value['angsuran_pokok'], 2) }}</td>
                <td>Rp. {{ number_format($value['angsuran_bunga'], 2) }}</td>
                <td>Rp. {{ number_format($value['denda'], 2) }}</td>
                <td>Rp. {{ number_format($value['total_angsuran'], 2) }}</td>
              </tr>
            @endforeach
            
            </tbody>
          </table>
        </div>
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
                <th style="width:50%">Angsuran Pokok :</th>
                <td> Rp. {{ number_format($total_angsuran_pokok, 2) }}</td>
              </tr>
              <tr>
                <th>Bunga :</th>
                <td> Rp. {{ number_format($total_bunga, 2) }}</td>
              </tr>
              <tr>
                <th>Denda :</th>
                <td> Rp. {{ number_format($total_denda, 2) }}</td>
              </tr>
              <tr>
                <th>Total :</th>
                <td> Rp. {{ number_format($total_bayar, 2) }}</td>
              </tr>

              <tr>
                <th>Sisa Pinjaman : </th>
                <td>Rp. {{ number_format($sisa_pinjaman, 2) }}</td>
              </tr>

            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        
    </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
