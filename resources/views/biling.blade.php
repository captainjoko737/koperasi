@extends('layouts.app')

@section('content')

<section class="content-header">
      <h1>
         Billing
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Billing</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Hover Data Table</h3> -->
              
              <form role="form" action="{{ route('biling.search', ['state' => 'search']) }}">
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-xs-3">
                    <label for="date_from">Pilih Bulan</label>
                    <input type="date" class="form-control" placeholder="Select Date From" name="date_from" value="{{ isset($request['date_from']) ? $request['date_from'] : ''  }}" required="required">
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
                  <h3 class="box-title">{{ $from }}</h3>
                  <div class="box-footer clearfix no-border">

                  <!-- <a href="{{ route('tahunan.search', ['state' => 'print', 'request' => $request]) }}" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i>  Cetak</a> -->
                  <form role="form" target="_blank" action="{{ route('biling.search', ['state' => 'print']) }}">
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
                      <!-- <button type="submit" class="btn btn-primary pull-right"> <i class="fa fa-print"></i> Cetak</button> -->
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
                      <th>Bulan</th>
                      <th>Simpanan Wajib</th>
                      <th>Total Angsuran</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($result as $key => $value)
                        <tr>

                          <form role="form" action="{{ route('biling.post', ['id' => $value['id']]) }}">
                           
                            <td>{{ $key + 1 }} <input type="text" name="id" value="{{ $value['id'] }}" hidden></td>
                            <td>{{ $value['nama'] }}</td>
                            <td>{{ $value['bulan'] }} <input type="text" name="date" value="{{ $request['date_from'] }}" class="hidden" hidden> <input type="text" name="id_angsuran" value="{{ $value['id_angsuran'] }}" class="hidden" hidden></td>
                            @if ($value['simpanan_wajib'] != '-')
                              <td>Rp.{{ number_format($value['simpanan_wajib'], 2) }} <input type="checkbox" name="simpanan_wajib" value="{{ $value['simpanan_wajib'] }}"></td>
                            @else
                              <td>-</td>
                            @endif

                            @if ($value['total_angsuran'] != '-')
                              <td>Rp.{{ number_format($value['total_angsuran'], 2) }} <input type="checkbox" name="total_angsuran" value="{{ $value['total_angsuran'] }}"></td>
                            @else
                              <td>-</td>
                            @endif

                            <td><button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-money"></i> Submit</button></td>
                          </form>

                        </tr>
                        @endforeach
                      
                    </tbody>
                    <tfoot>
                    
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
