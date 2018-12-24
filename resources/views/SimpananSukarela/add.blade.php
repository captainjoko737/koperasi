@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Tambah Simpanan Sukarela
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Simpanan</a></li>
        <li><a href="#">Detail Simpanan Sukarela</a></li>
        <li class="active">Tambah Simpanan Sukarela</li>
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
            <form role="form" action="{{ route('SimpananSukarela.create') }}">
              <input hidden type="text" id="id_user" name="id_user" value="{{ $anggota['id'] }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  
                  <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" readonly required="required" value="{{ $anggota['nama'] }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Simpanan Sukarela</label>
                  <input type="text" class="form-control" placeholder="Masukkan Jumlah Simpanan Sukarela" name="jumlah" required="required" value="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal</label>
                  <input type="date" class="form-control" placeholder="Masukkan Tanggal" name="tanggal" required="required">
                </div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('SimpananSukarela.detail', ['id' => $anggota['id']]) }}" type="button" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
             
                
              
            </form>
          </div>
    </section>
@endsection

