@extends('layouts.app')

@section('content')


<section class="content-header">

  <h1>
    Detail Pinjaman
    
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"> Dashboard</a></li>
    <li><a href="#">Pinjaman</a></li>
    <li class="active">Detail Data Pinjaman</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3> 
          
            <hr>
          
          <div class="box">
            <div class="box-header with-border">
              <div class="box-footer clearfix no-border">
            </div>
              <h3 class="box-title">Tabel Angsuran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  
                  <th>Bulan</th>
                  <th>Angsuran Bunga</th>
                  <th>Angsuran Pokok</th>
                  <th>Total Angsuran</th>
                  <th>Sisa Pinjaman</th>
                  <th>Pembayaran</th>
                  <th>Denda</th>
                  <th>Status</th>
                  <th>Jatuh Tempo</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Aksi</th>
                </tr>

                @foreach ($result as $key => $value)

                    @if($loop->first)
                      <tr>
                        
                      </tr>
                    
                    @else
                      <tr>
                        <td>{{ $value['angsuran_ke'] }}</td>
                        <td>Rp. {{ number_format($value['angsuran_bunga'], 2) }}</td>
                        <td>Rp. {{ number_format($value['angsuran_pokok'], 2) }}</td>
                        <td>Rp. {{ number_format($value['total_angsuran'], 2) }}</td>
                        <td>Rp. {{ number_format($value['sisa_pinjaman'], 2) }}</td>
                        <td>Rp. {{ number_format($value['jumlah'], 2) }}</td>
                        <td>Rp. {{ number_format($value['denda'], 2) }}</td>
                        <td>{{ $value['status'] }}</td>
                        <th>{{ $value->tanggal_jatuh_tempo->format('d M Y') }}</th>
                        <th>
                            @if ($value['tanggal_pembayaran'] != null)
                              {{ $value->tanggal_pembayaran->format('d M Y') }}
                            @endif
                        </th>
                        <th>
                          @if ($value['tanggal_pembayaran'] == null && $value['status_bayar'] == true)
                            <a href="{{ route('pinjaman.bayar', ['id' => $value['id'], 'id_pinjaman' => $value['id_pinjaman']]) }}" class="btn btn-default"> <i class="fa fa-money"></i> Bayar</a>
                          @elseif ($value['jumlah'] != 0)
                            @if ($value['json_data'] != null)
                              <a href="{{ route('pinjaman.cetak', ['id' => $value['id'], 'id_pinjaman' => $value['id_pinjaman']]) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i>  Cetak</a>
                            @endif
                          @endif
                            
                        </th>
                      </tr>
                    @endif
                
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
        
        </div>
        <!-- /.box-header -->
        
        <!-- /.box-body -->
      </div>
                
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

@endsection

@section('js')
<script>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>
@endsection
