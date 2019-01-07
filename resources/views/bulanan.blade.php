@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
         Bulanan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active">Bulanan </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Bulan {{ $date }}</h3>
              <div class="box-footer clearfix no-border">
              <a href="{{ route('bulanan.print') }}" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i>  Cetak</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Simpanan Wajib</th>
                  <th>Angsuran</th>
                  <th>Jasa</th>
                  <th>Denda</th>
                  <th>Jumlah</th>
                  <th>Sisa Pinjaman</th>
                  <th>Ket</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($result as $key => $value)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $value['nama'] }}</td>
                  @if ($value['simpanan_wajib'] != 0)
                    <td>{{ number_format($value['simpanan_wajib'], 2) }}</td>
                  @else
                    <td>-</td>
                  @endif

                  @if ($value['angsuran'] != 0)
                    <td>{{ number_format($value['angsuran'], 2) }}</td>
                  @else
                    <td>-</td>
                  @endif

                  @if ($value['jasa'] != 0)
                    <td>{{ number_format($value['jasa'], 2) }}</td>
                  @else
                    <td>-</td>
                  @endif

                  @if ($value['denda'] != 0)
                    <td>{{ number_format($value['denda'], 2) }}</td>
                  @else
                    <td>-</td>
                  @endif

                  @if ($value['jumlah'] != 0)
                    <td>{{ number_format($value['jumlah'], 2) }}</td>
                  @else
                    <td>-</td>
                  @endif

                  @if ($value['sisa_pinjaman'] != 0)
                    <td>{{ number_format($value['sisa_pinjaman'], 2) }}</td>
                  @else
                    <td>-</td>
                  @endif

                  @if ($value['keterangan'] != 0)
                    <td>{{ $value['keterangan'] }} / {{ $value['tenor'] }}</td>
                  @else
                    <td>-</td>
                  @endif

                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <td></td>
                  <th>JUMLAH</th>
                  <th>Rp. {{ number_format($total_simpanan_wajib, 2) }}</th>
                  <th>Rp. {{ number_format($total_angsuran, 2) }}</th>
                  <th>Rp. {{ number_format($total_jasa, 2) }}</th>
                  <th>Rp. {{ number_format($total_denda, 2) }}</th>
                  <th>Rp. {{ number_format($total, 2) }}</th>
                  <th>Rp. {{ number_format($total_sisa_pinjaman, 2) }}</th>
                  <td></td>
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
