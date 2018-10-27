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
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Jumlah Disetujui</label>
                            <input type="text" id="jumlah_disetujui" class="form-control" placeholder="" name="jumlah_disetujui" value="{{ $aplikasi_pinjaman['jumlah_disetujui'] }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Tenor / Lama Cicilan Disetujui</label>
                            <div class="form-group">
                              <select id="singleSelectExample" name="bulan_cicilan_disetujui">
                                <option></option>
                                @foreach ($tenor as $key => $value)
                                  <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
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
                <!-- /.box-body -->
                
              </div>
              
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

