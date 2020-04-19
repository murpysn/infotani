<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="../../img/user/<?php echo $gambar;?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $_SESSION['USERNAME'] ?></p>
    </div>
  </div>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">NAVIGASI</li>
    <li class="treeview">
      <a href="./index">
        <i class="fa fa-dashboard"></i> <span>Beranda</span>
      </a>
    </li>
    <li class="treeview">
      <a href="./viewlevel">
        <i class="fa fa-eye"></i> <span>Data Level</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-map"></i> <span>Data Master Lokasi</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="./viewdesa"><i class="fa fa-map-marker"></i>Data Desa</a></li>
        <li><a href="./viewkecamatan"><i class="fa fa-map-o"></i> Data Kecamatan</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="./viewkomoditas">
        <i class="fa fa-tree"></i> <span>Data Komoditas</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
    <li class="treeview">
      <a href="./viewpetani">
        <i class="fa fa-users"></i> <span>Data Petani</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
    <li class="treeview">
      <a href="./viewpengusaha">
        <i class="fa fa-user-secret"></i> <span>Data Pengusaha</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
    <li class="treeview">
      <a href="./viewuser">
        <i class="fa fa-user"></i> <span>Data User</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-book"></i> <span>Laporan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="./viewlappanen"><i class="fa fa-leaf"></i>Data Panen</a></li>
        <li><a href="./viewlappesan"><i class="fa fa-send"></i>Data Pemesanan</a></li>
        <!--<li><a href="viewlappanenpadi"><i class="fa fa-map-o"></i> Data Panen Padi</a></li>-->
      </ul>
    </li>
    <!--<li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>-->
  </ul>

  </section>
