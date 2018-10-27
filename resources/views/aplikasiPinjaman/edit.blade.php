@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Edit Simpanan Wajib
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Simpanan</a></li>
        <li><a href="#">Simpanan Wajib</a></li>
        <li class="active">Detail Simpanan Wajib</li>
        <li class="active">Edit Simpanan Wajib</li>
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
            <form role="form" action="{{ route('SimpananWajib.save') }}">
              <input type="text" hidden placeholder="Masukkan Nama" name="id" value="{{ $result['id_user'] }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Jumlah Uang</label>
                  <input type="text" class="form-control" placeholder="Masukkan Jumlah Uang" name="jumlah" required="required" value="{{ $result['jumlah'] }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal</label>
                  <input type="text" class="form-control" placeholder="Masukkan Tanggal" name="tanggal" required="required" value="{{ $result['tanggal'] }}">
                </div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('SimpananWajib.detail') }}" type="button" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Save</button>
              </div>
            </form>
          </div>
    </section>
@endsection

