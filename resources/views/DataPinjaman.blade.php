@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Data Pinjaman
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Pinjaman</a></li>
        <li class="active">Data Pinjaman</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Peminjam</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Nama Peminjam</th>
                  <th>Total Plafon</th>
                  <th>Total Jasa Terhitung</th>
                  <th>Total Bayar</th>
                  <th>Sisa Plafon</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                

                </tbody>
                <tfoot>
                <tr>
                  
                  <th>Nama Peminjam</th>
                  <th>Total Plafon</th>
                  <th>Total Jasa Terhitung</th>
                  <th>Total Bayar</th>
                  <th>Sisa Plafon</th>
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
