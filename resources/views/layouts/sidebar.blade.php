
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
            <i class="fa fa-user"></i> <span>Profil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Data Pribadi</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kepangkatan</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Jabatan Fungsional</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-mortar-board"></i> <span>Kualifikasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Diklat</a></li> -->
            <li><a href="#"><i class="fa fa-circle-o"></i> Pendidikan Formal</a></li>
          </ul>
        </li>

        <li class="{{ Request::segment(1) === 'logout' ? 'active' : '' }} " ><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>
      
    </section>
    <!-- /.sidebar -->
  </aside>

  