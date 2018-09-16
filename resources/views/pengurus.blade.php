@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Pengurus
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Pengurus</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Pengurus</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>No. Anggota</th>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Jabatan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>A-024</td>
                  <td>Bilal bin Rabah</td>
                  <td>,0000-00-00</td>
                  <td>Laki-laki</td> 
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Ketua</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>No.Anggota</th>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Jabatan</th>
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
