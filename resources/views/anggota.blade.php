@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Anggota
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Anggota</h3>
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
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>A-0001</td>
                  <td>ROMULUS, SE</td>
                  <td>Simalunggun, 1977-09-09</td>
                  <td>Laki-Laki</td>
                  <td>Jl.Prof.M.Yamin, SH Tembilahan</td>
                  <td>081910672765</td>
                  <td>achmadrosyad2012@gmail.com</td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>A-0002</td>
                  <td>Ali bin Abi Thalib</td>
                  <td>,0000-00-00</td>
                  <td>Laki-laki</td>
                  <td></td>
                  <td></td>
                  <td>anggota1234@gmail.com</td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>A-0003</td>
                  <td>Zaid bin Haritsah</td>
                  <td>,0000-00-00</td>
                  <td>Laki-laki</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>A-0004</td>
                  <td>Abu Bakar ash-Shiddiq</td>
                  <td>,0000-00-00</td>
                  <td>Laki-laki</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>A-0005</td>
                  <td>Umar bin Khattab</td>
                  <td>,0000-00-00</td>
                  <td>Laki-laki</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>A-0006</td>
                  <td>Utsman bin Affan</td>
                  <td>,0000-00-00</td>
                  <td>Laki-laki</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>A-0007</td>
                  <td>Abbas bin Abdul Muthalib</td>
                  <td>,0000-00-00</td>
                  <td>Laki-laki</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>A-0008</td>
                  <td>Hamzah bin Abdul Muthalib</td>
                  <td>,0000-00-00</td>
                  <td>Laki-laki</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>A-0009</td>
                  <td>Ja'far bin Abi Thalib</td>
                  <td>,0000-00-00</td>
                  <td>Laki-laki</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>A-00010</td>
                  <td>Khalid bin Walid</td>
                  <td>,0000-00-00</td>
                  <td>Laki-laki</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Aktif</td>
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
                  <th>Status</th>
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

