@extends('layouts.app')

@section('content')
<div class="panel-heading"><h3>Dashboard</h3></div>

<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4><strong>KAS</strong></h4>

              <p><strong>Rp. {{ number_format($kas, 2) }}</strong></p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4><strong>Simpanan Pokok</strong></h4>

              <p><strong>Rp. {{ number_format($simpanan_pokok, 2) }}</strong></p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h4><strong>Simpanan Wajib</strong></h4>

              <p><strong>Rp. {{ number_format($simpanan_wajib, 2) }}</strong></p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h4><strong>Simpanan Sukarela</strong></h4>

              <p><strong>Rp. {{ number_format($simpanan_sukarela, 2) }}</strong></p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
              <h4><strong>Jasa</strong></h4>

              <p><strong>Rp. {{ number_format($jasa, 2) }}</strong></p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4><strong>Denda</strong></h4>

              <p><strong>Rp. {{ number_format($denda, 2) }}</strong></p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4><strong>Dana Pinjaman</strong></h4>

              <p><strong>Rp. {{ number_format($dana_pinjaman, 2) }}</strong></p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa"></i></a>
          </div>
        </div>
        
      </div>
      <!-- /.row -->
     
      <!-- /.row (main row) -->

    </section>

@endsection
