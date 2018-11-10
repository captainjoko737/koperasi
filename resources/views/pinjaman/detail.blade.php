@extends('layouts.app')

@section('content')


<section class="content-header">

  <h1>
    Detail Simpanan Wajib
    
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"> Dashboard</a></li>
    <li><a href="#">Simpanan</a></li>
    <li class="active">Simpanan Wajib</li>
    <li class="active">Detail Simpanan Wajib</li>
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
              <a  href="{{ route('pinjaman.print') }}"  type="button" class="btn btn-info pull-right"><i class="fa fa-print"></i> Print Billing </a>
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
                  <th>Tanggal Pembayaran</th>
                </tr>

                @foreach ($result as $key => $value)

                    @if($loop->first)
                      <tr>
                        
                      </tr>
                    @elseif($loop->last)
                    <tr>
                        
                      </tr>
                    @else
                      <tr>
                        <td>{{ $value['angsuran_ke'] }}</td>
                        <td>Rp. {{ number_format($value['angsuran_bunga'], 2) }}</td>
                        <td>Rp. {{ number_format($value['angsuran_pokok'], 2) }}</td>
                        <td>Rp. {{ number_format($value['total_angsuran'], 2) }}</td>
                        <td>Rp. {{ number_format($value['sisa_pinjaman'], 2) }}</td>
                        <td>{{ $value['jumlah'] }}</td>
                        <td>{{ $value['denda'] }}</td>
                        <td>{{ $value['status'] }}</td>
                        <th>{{ $value['updated_at'] }}</th>
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
