@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Pengurus
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Data Master</a></li>
        <li><a href="#"> Pengurus</a></li>
        <li class="active">Tambah Pengurus</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Pengurus</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('Karyawan.create') }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">TTL</label>
                  <input type="text" class="form-control" placeholder="Masukkan Tempat Tanggal Lahir" name="ttl" required="required">
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin" required="required">
                    <option>-</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Telepon</label>
                  <input type="text" class="form-control" placeholder="Masukkan Telepon" name="telepon" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" class="form-control" placeholder="Masukkan Email" name="email" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" placeholder="Masukkan Password" name="password" required="required">
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <select class="form-control" name="jabatan" required="required">
                    <option>-</option>
                    <option>Ketua</option>
                    <option>Sekertaris</option>
                    <option>Bendahara</option>
                    <option>Juru Bayar</option>
                  </select>
                </div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('karyawan') }}" type="button" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
             
                
              
            </form>
          </div>
    </section>
@endsection

