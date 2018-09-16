@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Data Simpanan Wajib
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Simpanan</a></li>
        <li class="active">Data Simpanan Wajib </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Rekening</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Jumlah Rekening</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Jumlah Saldo</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>ROMULUS, SE</td>
                  <td>5 rekening</td>
                  <td></td>
                  <td></td>
                  <td>Rp. 4.312.000.00</td>
                  <td>Anggota</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Ali bin Abi Thalib</td>
                  <td>8 rekening</td>
                  <td></td>
                  <td></td>
                  <td>Rp. 6.123.000.00</td>
                  <td>Anggota</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Zaid bin Haritsah</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Anggota</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Abu Bakar ash-Shiddiq</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Anggota</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Umar bin Khattab</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Anggota</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Utsman bin Affan</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Anggota</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Abbas bin Abdul Muthalib</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Anggota</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Hamzah bin Abdul Muthalib</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Anggota</td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Ja'far bin Abi Thalib</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Anggota</td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Khalid bin Walid</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Anggota</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Jumlah Rekening</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Jumlah Saldo</th>
                  <th>Keterangan</th>
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
