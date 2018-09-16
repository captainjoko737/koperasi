@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Jenis Simpanan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Simpanan</a></li>
        <li class="active">Jenis Simpanan  </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Jenis Simpanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Kode Print</th>
                  <th>Deskripsi</th>
                  <th>Jasa Bulanan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>001</td>
                  <td>Simpanan Pokok</td>
                  <td>SP</td>
                  <td>Simpanan yang dibayarkan pada saat pertama kali menjadi anggota koperas</td>
                  <td>0 %</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>002</td>
                  <td>Simpanan Wajib</td>
                  <td>SW</td>
                  <td>Simpanan yang dibayarkan setiap bulan</td>
                  <td>0 %</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>003</td>
                  <td>Simpanan Sukarela</td>
                  <td>SS</td>
                  <td>Simpanan yang bisa dibayar kapan saja</td>
                  <td>0 %</td>
                  
                </tr>
                <tr>
                  <td>4</td>
                  <td>004</td>
                  <td>Harkop</td>
                  <td>SH</td>
                  <td></td>
                  <td>0 %</td>
                  
                </tr>
                <tr>
                  <td>5</td>
                  <td>005</td>
                  <td>Simpanan Wajib Khusus</td>
                  <td>SWK</td>
                  <td></td>
                  <td></td>
                  
                </tr>
                <tr>
                  <td>6</td>
                  <td>006</td>
                  <td>Sukarela Khusus</td>
                  <td>SK</td>
                  <td></td>
                  <td></td>
                  
                </tr>
                <tr>
                  <td>7</td>
                  <td>007</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  
                </tr>
                <tr>
                  <td>8</td>
                  <td>008</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  
                </tr>
                <tr>
                  <td>9</td>
                  <td>009</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  
                </tr>
                <tr>
                  <td>10</td>
                  <td>0010</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Kode Print</th>
                  <th>Deskripsi</th>
                  <th>Jasa Bulanan</th>
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
