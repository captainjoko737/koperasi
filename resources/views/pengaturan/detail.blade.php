@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Pengaturan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Pengaturan</a></li>
        <li><a href="#">Edit</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Pengaturan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('pengaturan.simpan') }}">
              <input type="text" hidden placeholder="Masukkan Nama" name="id" value="{{ $result['id'] }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">KEY</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" readonly required="required" value="{{ $result['key'] }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">VALUE</label>
                  <input type="text" class="form-control" placeholder="Masukkan Angka" name="value" required="required" value="{{ $result['value'] }}">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('pengaturan.index') }}" type="button" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Save</button>
              </div>
            </form>
          </div>
    </section>
@endsection

