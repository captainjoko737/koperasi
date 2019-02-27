
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center">
          <img src="{{ url('public/images/logo_fkip.png') }}" class="img-circle" alt="User Image">
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
            <li {{ isset($status_user) ? $status_user == 'accounting' ? '' : 'hidden' : '' }}><a href="{{ route('karyawan') }}"><i class="fa fa-circle-o"></i> Pengurus</a></li>
            <li><a href="{{ route('CalonAnggota') }}"><i class="fa fa-circle-o"></i> Calon Anggota</a></li>
          </ul>
        </li>

        <li class="treeview" {{ isset($status_user) ? $status_user == 'accounting' ? '' : 'hidden' : '' }}>
          <a href="#">
            <i class="fa fa-book"></i> <span>Simpanan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Diklat</a></li> -->
            <li><a href="{{ route('DataSimpananAnggota') }}" {{ isset($status_user) == 'accounting' ? '' : 'hidden' }}><i class="fa fa-circle-o"></i> Data Simpanan Anggota</a></li>
            <li><a href="{{ route('SimpananWajib') }}"><i class="fa fa-circle-o"></i> Simpanan Wajib</a></li>
            <li><a href="{{ route('SimpananSukarela') }}"><i class="fa fa-circle-o"></i> Simpanan Sukarela</a></li>
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
            <li {{ isset($status_user) ? $status_user == 'accounting' ? '' : 'hidden' : '' }}><a href="{{ route('AngsuranTunggakan') }}"><i class="fa fa-circle-o"></i>Angsuran Tunggakan</a></li>
            <li><a href="{{ route('aplikasi_pinjaman') }}"><i class="fa fa-circle-o"></i>Aplikasi Pinjaman</a></li>
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
            <li {{ isset($status_user) ? $status_user == 'accounting' ? '' : 'hidden' : '' }}><a href="{{ route('tahunan') }}"><i class="fa fa-circle-o"></i>Tahunan</a></li>
          </ul>
        </li>

        <li {{ isset($status_user) ? $status_user == 'accounting' ? '' : 'hidden' : '' }}><a href="{{ route('biling') }}"><i class="fa fa-money"></i>Billing</a></li>

        <li {{ isset($status_user) ? $status_user == 'accounting' ? '' : 'hidden' : '' }}><a href="{{ route('pengaturan.index') }}"><i class="fa fa-gear"></i>Pengaturan</a></li>

        <li class="treeview" {{ isset($status_user) ? $status_user == 'accounting' ? '' : 'hidden' : '' }}>
        

        <li class="{{ Request::segment(1) === 'logout' ? 'active' : '' }} " ><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>
      
    </section>
    <!-- /.sidebar -->
  </aside>

  