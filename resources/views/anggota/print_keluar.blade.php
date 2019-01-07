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
      
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-4">
          <p class="lead"></p>

          <div class="table-responsive">
            <table>
              <tr>
                <th style="width:50%">Ketua</th>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <p class="lead"></p>

          <div class="table-responsive">
            <table>
              <tr>
                <th style="width:50%">Bendahara</th>
              </tr>
            </table>
          </div>
        </div>

        <div class="col-xs-4">
          <p class="lead"></p>

          <div class="table-responsive">
            <table>
              <tr>
                <th style="width:50%">Yang Bersangkutan</th>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>

      <br><br>

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-4">
          <p class="lead"></p>

          <div class="table-responsive">
            <table>
              <tr>
                <td style="width:50%">{{ $ketua != null ? $ketua : 'Tidak Ada'}}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <p class="lead"></p>

          <div class="table-responsive">
            <table>
              <tr>
                <td style="width:50%">{{ $bendahara['nama'] != null ? $bendahara['nama'] : 'Tidak Ada'}}</td>
              </tr>
            </table>
          </div>
        </div>

        <div class="col-xs-4">
          <p class="lead"></p>

          <div class="table-responsive">
            <table>
              <tr>
                <td style="width:50%">{{ $bendahara['nama'] != null ? $bendahara['nama'] : 'Tidak Ada'}}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      
      

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        
    </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
