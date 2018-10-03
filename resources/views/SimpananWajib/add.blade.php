@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Tambah Simpanan Wajib
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Simpanan</a></li>
        <li><a href="#">Detail Simpanan Wajib</a></li>
        <li class="active">Tambah Simpanan Wajib</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('SimpananWajib.create') }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama" name="id_user" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Simpanan Wajib</label>
                  <input type="text" class="form-control" placeholder="Masukkan Jumlah Simpanan Wajib" name="jumlah" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal</label>
                  <input type="text" class="form-control" placeholder="Masukkan Tanggal" name="tanggal" required="required">
                </div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('SimpananWajib.detail') }}" type="button" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
             
                
              
            </form>
          </div>
    </section>
@endsection

