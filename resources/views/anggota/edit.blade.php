@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Anggota
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Data Master</a></li>
        <li><a href="#">Anggota</a></li>
        <li class="active">Edit Anggota</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Anggota</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
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
                  <label>Status</label>
                  <select class="form-control" name="status" required="required">
                    <option>-</option>
                    <option>Aktif</option>
                    <option>Tidak Aktif</option>
                    <option>Calon Anggota</option>
                  </select>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </section>
@endsection

