@extends('layouts.app')

@section('content')

<section class="content-header">
      <h1>
        Data Pinjaman
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Dashboard</a></li>
        <li><a href="#">Pinjaman</a></li>
        <li class="active">Data Pinjaman</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Peminjam</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10%">ID Pinjaman</th>
                  <th>Nama Peminjam</th>
                  <th>Jumlah Pinjaman</th>
                  <th>Tenor</th>
                  <th>Angsuran Ke</th>
                  <th>Sisa Pinjaman</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($result as $key => $value)
                <tr>
                  <td>{{ $value['id'] }}</td>
                  <td>{{ $value['nama'] }}</td>
                  <td>Rp. {{ number_format($value['jumlah_pinjaman'], 2) }}</td>
                  <td>{{ $value['tenor'] }} Bulan</td>
                  <td>{{ $value['angsuran_ke'] }}</td>
                  @if ($value['angsuran_ke'] == $value['tenor'])
                      <td>Rp. 0.00</td>
                  @else
                      <td>Rp. {{ number_format($value['sisa_pinjaman'], 2) }}</td>
                  @endif
                  <td>

                      <a href="{{ route('pinjaman.detail', ['id' => $value['id']]) }}" ><i class="fa fa-search"></i></a>

                      <a href="{{ route('pinjaman.detail.print', ['id' => $value['id']]) }}" target="_blank"><i class="fa fa-print"></i></a> 
                        @if ($value['angsuran_ke'] == 0)

                          <form class="delete" action="{{ route('pinjaman.hapus') }}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="id" value="{{$value->id}}">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <button type="submit" >delete</button> 
                          </form>

                        @endif
                  </td>
                </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                  <th>ID Pinjaman</th>
                  <th>Nama Peminjam</th>
                  <th>Jumlah Pinjaman</th>
                  <th>Tenor</th>
                  <th>Angsuran Ke</th>
                  <th>Sisa Pinjaman</th>
                  <th>Aksi</th>
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


