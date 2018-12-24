@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Pengaturan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Pengaturan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>KEY</th>
                  <th>VALUE</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($result as $key => $value)
                <tr>
                  <td>{{ $value['key'] }}</td>
                  @if ($value['key'] == 'bunga' || $value['key'] == 'provisi')
                    <td>{{ $value['value'] }} %</td>
                  @else
                    <td>Rp. {{ number_format($value['value'], 2) }}</td>
                  @endif

                  
                  <td>
                      <a href="{{ route('pengaturan.detail', ['id' => $value['id']]) }}"><i class="fa fa-edit"></i></a>     
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>KEY</th>
                  <th>VALUE</th>
                  <th>Aksi</th>
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
