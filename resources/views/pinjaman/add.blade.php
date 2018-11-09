@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Tambah Aplikasi Pinjaman
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Pinjaman</a></li>
        <li><a href="#">Aplikasi Pinjaman</a></li>
        <li class="active">Tambah Aplikasi Pinjaman</li>
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
            <form role="form" action="{{ route('aplikasi_pinjaman.create') }}">
              <input hidden type="text" id="id_user" name="id_user" value="">
              <div class="box-body">
                <label>Nama Peminjam</label>
                <div class="form-group">
                  <select id="singleSelectExample" name="id_user">
                    <option></option>
                    @foreach ($anggota as $key => $value)
                      <option value="{{ $value['id'] }}">{{ $value['nama'] }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Pinjaman</label>
                  <input type="text" class="form-control" placeholder="Masukkan Jumlah yang diajukan" name="jumlah_diajukan" required="required" value="">
                </div>
                <label for="exampleInputPassword1">Tenor / Lama Pinjaman</label>
                <div class="form-group">
                  
                  <select id="singleSelectExamples" name="bulan_cicilan_diajukan" required="required">
                    @foreach ($tenor as $key => $value)
                      <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>      
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('aplikasi_pinjaman') }}" type="button" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
             
                
              
            </form>
          </div>
    </section>
@endsection

