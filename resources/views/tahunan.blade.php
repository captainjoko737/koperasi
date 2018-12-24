@extends('layouts.app')

@section('content')

<section class="content-header">
      <h1>
         Laporan Tahunan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active">Tahunan </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Hover Data Table</h3> -->
              
              <form role="form" action="{{ route('tahunan.search', ['state' => 'search']) }}">
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-xs-3">
                    <label for="date_from">Date From</label>
                    <input type="date" class="form-control" placeholder="Select Date From" name="date_from" value="{{ isset($request['date_from']) ? $request['date_from'] : ''  }}" required="required">
                  </div>

                  <div class="form-group col-xs-3">
                    <label for="date_to">Date To</label>
                    <input type="date" class="form-control" placeholder="Select Date To" name="date_to" value="{{ isset($request['date_to']) ? $request['date_to'] : ''  }}" required="required">
                  </div>

                  <div class="form-group col-xs-3">
                    <label for="bjs">BJS</label>
                    <input type="text" class="form-control" placeholder="Masukkan BJS" name="bjs" value="{{ isset($request['bjs']) ? $request['bjs'] : ''  }}" required="required">
                  </div>

                  <div class="form-group col-xs-3">
                    <label for="bjs">BJP</label>
                    <input type="text" class="form-control" placeholder="Masukkan BJP" name="bjp" value="{{ isset($request['bjp']) ? $request['bjp'] : ''  }}" required="required">
                    <input type="text" class="form-control hidden" name="state" value="search">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> Search</button>
              </div>
            </form>
            </div>
            <!-- /.box-body -->
          </div>

          @if (isset($data))
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">{{ $from }} - {{ $to }}</h3>
                  <div class="box-footer clearfix no-border">

                  <!-- <a href="{{ route('tahunan.search', ['state' => 'print', 'request' => $request]) }}" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i>  Cetak</a> -->
                  <form role="form" target="_blank" action="{{ route('tahunan.search', ['state' => 'print']) }}">
                    <div class="box-body hidden">
                      <div class="row">
                        <div class="form-group col-xs-3">
                          <label for="date_from">Date From</label>
                          <input type="date" class="form-control" placeholder="Select Date From" name="date_from" value="{{ isset($request['date_from']) ? $request['date_from'] : ''  }}" required="required">
                        </div>

                        <div class="form-group col-xs-3">
                          <label for="date_to">Date To</label>
                          <input type="date" class="form-control" placeholder="Select Date To" name="date_to" value="{{ isset($request['date_to']) ? $request['date_to'] : ''  }}" required="required">
                        </div>

                        <div class="form-group col-xs-3">
                          <label for="bjs">BJS</label>
                          <input type="text" class="form-control" placeholder="Masukkan BJS" name="bjs" value="{{ isset($request['bjs']) ? $request['bjs'] : ''  }}" required="required">
                        </div>

                        <div class="form-group col-xs-3">
                          <label for="bjs">BJP</label>
                          <input type="text" class="form-control" placeholder="Masukkan BJP" name="bjp" value="{{ isset($request['bjp']) ? $request['bjp'] : ''  }}" required="required">
                          <input type="text" class="form-control hidden" name="state" value="print">
                        </div>
                      </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary pull-right"> <i class="fa fa-print"></i> Cetak</button>
                    </div>
                  </form>

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">

                  <table id="example1" class="table display nowrap table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>S.Pokok</th>
                      <th>S.Wajib</th>
                      <th>S.Sukarela</th>
                      <th>SP+SW+SS</th>
                      <th>Sisa Pinjaman</th>
                      <th>Angsuran</th>
                      <th>Jasa</th>
                      <th>BJS</th>
                      <th>BJP</th>
                      <th>BJS+BJP</th>
                      <th>Sukarela</th>
                      <th>(BJS+BJP)-Sukarela</th>
                    </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($result as $key => $value)
                        <tr>
                          <td>{{ $key + 1 }}</td>
                          <td>{{ $value['nama'] }}</td>
                          @if ($value['simpanan_pokok'] != 0)
                            <td>Rp. {{ number_format($value['simpanan_pokok'], 2) }}</td>
                          @else
                            <td>-</td>
                          @endif

                          @if ($value['simpanan_wajib'] != 0)
                            <td>Rp. {{ number_format($value['simpanan_wajib'], 2) }}</td>
                          @else
                            <td>-</td>
                          @endif

                          @if ($value['simpanan_sukarela'] != 0)
                            <td>Rp. {{ number_format($value['simpanan_sukarela'], 2) }}</td>
                          @else
                            <td>-</td>
                          @endif

                          @if ($value['sp_sw_ss'] != 0)
                            <td>Rp. {{ number_format($value['sp_sw_ss'], 2) }}</td>
                          @else
                            <td>-</td>
                          @endif

                          @if ($value['sisa_pinjaman'] != 0)
                            <td>Rp. {{ number_format($value['sisa_pinjaman'], 2) }}</td>
                          @else
                            <td>-</td>
                          @endif

                          @if ($value['angsuran'] != 0)
                            <td>Rp. {{ number_format($value['angsuran'], 2) }}</td>
                          @else
                            <td>-</td>
                          @endif

                          @if ($value['jasa'] != 0)
                            <td>Rp. {{ number_format($value['jasa'], 2) }}</td>
                          @else
                            <td>-</td>
                          @endif

                          @if ($value['bjs'] != 0)
                            <td>Rp. {{ number_format($value['bjs'], 2) }}</td>
                          @else
                            <td>-</td>
                          @endif

                          @if ($value['bjp'] != 0)
                            <td>Rp. {{ number_format($value['bjp'], 2) }}</td>
                          @else
                            <td>-</td>
                          @endif

                          @if ($value['bjs_bjp'] != 0)
                            <td>Rp. {{ number_format($value['bjs_bjp'], 2) }}</td>
                          @else
                            <td>-</td>
                          @endif

                          @if ($value['sukarela'] != 0)
                            <td>Rp. {{ number_format($value['sukarela'], 2) }}</td>
                          @else
                            <td>-</td>
                          @endif

                          @if ($value['bjs_bjp_sukarela'] != 0)
                            <td>Rp. {{ number_format($value['bjs_bjp_sukarela'], 2) }}</td>
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
                      <th>Rp. {{ number_format($simpanan_pokok, 2) }}</th>
                      <th>Rp. {{ number_format($simpanan_wajib, 2) }}</th>
                      <th>Rp. {{ number_format($simpanan_sukarela, 2) }}</th>
                      <th>Rp. {{ number_format($sp_sw_ss, 2) }}</th>
                      <th>Rp. {{ number_format($sisa_pinjaman, 2) }}</th>
                      <th>Rp. {{ number_format($angsuran, 2) }}</th>
                      <th>Rp. {{ number_format($jasa, 2) }}</th>
                      <th>Rp. {{ number_format($bjs, 2) }}</th>
                      <th>Rp. {{ number_format($bjp, 2) }}</th>
                      <th>Rp. {{ number_format($bjs_bjp, 2) }}</th>
                      <th>Rp. {{ number_format($sukarela, 2) }}</th>
                      <th>Rp. {{ number_format($bjs_bjp_sukarela, 2) }}</th>
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
          @endif        
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection
