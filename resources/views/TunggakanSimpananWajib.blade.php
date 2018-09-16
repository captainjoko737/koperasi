@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Tunggakan Simpanan Wajib
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Simpanan</a></li>
        <li class="active">Tunggakan Simpanan Wajib </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Tunggakan Simpanan Wajib</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Nasabah</th>
                  <th>No.Rek</th>
                  <th>Tanggal Registrasi</th>
                  <th>Transaksi Terakhir</th>
                  <th>Transaksi Selanjutnya</th>
                  <th>Tanggal Tagihan</th>
                  <th>Besaran Bulanan</th>
                  <th>Tunggakan</th>
                  <th>Jumlah</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>ROMULUS, SE</td>
                  <td>002.K-002</td>
                  <td>31 Dec 2017</td>
                  <td>31 Dec 2017 <b>Jam 19:11:23</b></td>
                  <td>28 Jan 2018</td>
                  <td>Setiap tanggal 28</td>
                  <td>Rp. 10.000</td>
                  <td>9 bulan</td>
                  <td>Rp. 90.000</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>A-0002</td>
                  <td>Ali bin Abi Thalib</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>A-0003</td>
                  <td>Zaid bin Haritsah</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>A-0004</td>
                  <td>Abu Bakar ash-Shiddiq</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>A-0005</td>
                  <td>Umar bin Khattab</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>A-0006</td>
                  <td>Utsman bin Affan</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>A-0007</td>
                  <td>Abbas bin Abdul Muthalib</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>A-0008</td>
                  <td>Hamzah bin Abdul Muthalib</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>A-0009</td>
                  <td>Ja'far bin Abi Thalib</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>A-00010</td>
                  <td>Khalid bin Walid</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nama Nasabah</th>
                  <th>No.Rek</th>
                  <th>Tanggal Registrasi</th>
                  <th>Transaksi Terakhir</th>
                  <th>Transaksi Selanjutnya</th>
                  <th>Tanggal Tagihan</th>
                  <th>Besaran Bulanan</th>
                  <th>Tunggakan</th>
                  <th>Jumlah</th>
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
