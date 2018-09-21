
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center">
          <img src="{{ url('assets/image_assets/logo.png') }}" class="img-circle" alt="User Image">
        </div>
        
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ Request::segment(1) === 'home' ? 'active' : '' }}" ><a href="{{ url('/home') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('anggota') }}"><i class="fa fa-circle-o"></i> Anggota</a></li>
            <li><a href="{{ route('pengurus') }}"><i class="fa fa-circle-o"></i> Pengurus</a></li>
            <li><a href="{{ route('karyawan') }}"><i class="fa fa-circle-o"></i> Karyawan</a></li>
            <li><a href="{{ route('CalonAnggota') }}"><i class="fa fa-circle-o"></i> Calon Anggota</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Simpanan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Diklat</a></li> -->
            <li><a href="{{ route('DataSimpananAnggota') }}"><i class="fa fa-circle-o"></i> Data Simpanan Anggota</a></li>
            <li><a href="{{ route('DaftarTunggakan') }}"><i class="fa fa-circle-o"></i> Daftar Tunggakan</a></li>
            <li><a href="{{ route('JenisSimpanan') }}"><i class="fa fa-circle-o"></i> Jenis Simpanan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bank"></i> <span>Pinjaman</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('DataPinjaman') }}"><i class="fa fa-circle-o"></i>Data Pinjaman</a></li>
            <li><a href="{{ route('AngsuranTunggakan') }}"><i class="fa fa-circle-o"></i>Angsuran Tunggakan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('bulanan') }}"><i class="fa fa-circle-o"></i>Bulanan</a></li>
            <li><a href="{{ route('tahunan') }}"><i class="fa fa-circle-o"></i>Tahunan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Pengaturan</span>
          </a>

        <li class="{{ Request::segment(1) === 'logout' ? 'active' : '' }} " ><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>
      
    </section>
    <!-- /.sidebar -->
  </aside>

  