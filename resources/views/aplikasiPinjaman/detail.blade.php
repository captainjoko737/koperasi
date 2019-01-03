@extends('layouts.app')

@section('content')


<section class="content-header">

  <h1>
    Detail Aplikasi Pinjaman
    
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"> Dashboard</a></li>
    <li><a href="#">Pinjaman</a></li>
    <li class="active">Aplikasi Pinjaman</li>
    <li class="active">Detail Aplikasi Pinjaman</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3> 
          @if ( $status_user == 'accounting' &&  $aplikasi_pinjaman['status'] == 'sedang di proses')
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tangani Aplikasi Pinjaman</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="{{ route('aplikasi_pinjaman.tangani') }}" id="form1">
              <input type="text" hidden id="id"  name="id" value="{{ $aplikasi_pinjaman['id'] }}">
              <input type="text" hidden id="status"  name="status" value="disetujui">
              <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Nama Peminjam</label>
                        <input type="text" id="nama" class="form-control" placeholder="" name="nama" readonly value="{{ $aplikasi_pinjaman['nama'] }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Jumlah Diajukan</label>
                        <input type="text" id="jumlah_diajukan" class="form-control" placeholder="" readonly name="jumlah_diajukan" value="Rp. {{ number_format($aplikasi_pinjaman['jumlah_diajukan'], 2) }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Tenor / Lama Cicilan Diajukan</label>
                        <input type="text" id="bulan_cicilan_diajukan" class="form-control" placeholder="" readonly name="bulan_cicilan_diajukan" value="{{ $aplikasi_pinjaman['bulan_cicilan_diajukan'] }} Bulan">
                    </div>
                </div>
                
              </div>

              <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Bulan / Tahun Mulai</label>
                        <input type="date" id="bulan_mulai" class="form-control" placeholder="" name="bulan_mulai" value="{{ $aplikasi_pinjaman['bulan_mulai'] }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Jumlah Disetujui</label>
                        <input type="text" id="jumlah_disetujui" class="form-control" placeholder="" name="jumlah_disetujui" value="{{ $aplikasi_pinjaman['jumlah_disetujui'] }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Tenor / Lama Cicilan Disetujui</label>
                        <div class="form-group">
                          <select id="singleSelectExample" name="bulan_cicilan_disetujui" required>
                            <option></option>
                            @foreach ($tenor as $key => $value)
                              <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Denda</label>
                        <div class="form-group">
                          <select name="denda" required>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                          </select>
                        </div>
                    </div>
                </div>
              </form>  
              </div>

              <form hidden action="{{ route('aplikasi_pinjaman.tangani') }}" id="form2">
                <input type="text" hidden id="id" class="form-control" placeholder="" name="id" readonly value="{{ $aplikasi_pinjaman['id'] }}">
                <input type="text" hidden id="status" class="form-control" placeholder="" name="status" readonly value="tidak disetujui">
              </form>

              <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                  <button type="submit" form="form1" class="btn btn-block btn-success" value="Submit">Setujui</button>
                </div>
                <div class="col-md-3">
                  <button type="submit" form="form2" class="btn btn-block btn-danger" value="Submit">Tidak Setujui</button>
                </div>
              </div>
            </div>
            @endif

            @if ( $aplikasi_pinjaman['status'] == 'disetujui')

            <p>Aplikasi Pinjaman anda telah di setujui oleh accounting dengan rincian sebagai berikut: </p>
            <p>Jika anda setuju dengan rincian sebagai berikut maka silahkan tekan tombol setuju untuk proses lebih lanjut</p>
            <form hidden action="{{ route('aplikasi_pinjaman.proses_pinjaman') }}" id="form3">
              <input type="text" hidden id="id" class="form-control" placeholder="" name="id" readonly value="{{ $aplikasi_pinjaman['id'] }}">
              <input type="text" hidden id="status" class="form-control" placeholder="" name="status" readonly value="setuju">
            </form>

            <form hidden class="delete" action="{{ route('aplikasi_pinjaman.proses_pinjaman') }}" id="form4">
              <input type="text" hidden id="id" class="form-control" placeholder="" name="id" readonly value="{{ $aplikasi_pinjaman['id'] }}">
              <input type="text" hidden id="status" class="form-control" placeholder="" name="status" readonly value="tidak setuju">
            </form>

            <div class="row">
              
              <div class="col-md-3">
                <button type="submit" form="form3" class="btn btn-block btn-success" value="Submit">Setuju</button>
              </div>
              <div class="col-md-3">
                <button type="submit" form="form4" class="btn btn-block btn-danger" value="Submit">Tidak Setuju</button>
              </div>
            </div>

            @endif
            <hr>
          
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tabel Angsuran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Bulan</th>
                  <th>Angsuran Bunga</th>
                  <th>Angsuran Pokok</th>
                  <th>Total Angsuran</th>
                  <th>Sisa Pinjaman</th>
                </tr>

                @foreach ($result as $key => $value)

                    @if($loop->last)
                      <tr>
                        <td></td>
                        <td><strong> {{ $value['bulan'] }}</strong></td>
                        <td><strong> Rp. {{ number_format($value['angsuran_bunga'], 2) }}</strong></td>
                        <td><strong> Rp. {{ number_format($value['angsuran_pokok'], 2) }}</strong></td>
                        <td><strong> Rp. {{ number_format($value['total_angsuran'], 2) }}</strong></td>
                        <td><strong></strong></td>
                      </tr>
                    @else
                      <tr>
                        <td></td>
                        <td>{{ $value['bulan'] }}</td>
                        <td>Rp. {{ number_format($value['angsuran_bunga'], 2) }}</td>
                        <td>Rp. {{ number_format($value['angsuran_pokok'], 2) }}</td>
                        <td>Rp. {{ number_format($value['total_angsuran'], 2) }}</td>
                        <td>Rp. {{ number_format($value['sisa_pinjaman'], 2) }}</td>
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
