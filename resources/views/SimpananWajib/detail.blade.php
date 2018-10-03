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
              <div class="box-footer clearfix no-border">
              <a  href="{{ route('SimpananWajib.add') }}"  type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
            </div>
              
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Simpanan Wajib</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($result as $key => $value)
                  <tr>
                    <td>{{ $value['id_user'] }}</td>
                    <td>Rp. {{ number_format($value['jumlah'], 2) }}</td>
                    <td>{{ $value['tanggal'] }}</td>
                    <td>
                    
                        <a href="{{ route('SimpananWajib.edit', ['id_user' => $value['id_user']]) }}"><i class="fa fa-edit"></i></a> 
                        <a href="{{ route('SimpananWajib.delete', ['id_user' => $value['id_user']]) }}"><i class="fa fa-trash-o"></i></a>
                        
                      
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                   <th>Simpanan Wajib</th>
                  <th>Tanggal</th>
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

