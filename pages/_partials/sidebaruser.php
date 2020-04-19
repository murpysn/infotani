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
      <a href="./viewpetani">
        <i class="fa fa-users"></i> <span>Data Petani</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
    <li class="treeview">
      <a href="./tambahpanen">
        <i class="fa fa-users"></i> <span>Form Panen</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
    <li><a href="../user/laporan_panen"><i class="fa fa-book"></i> <span>Data Panen </span></a></li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-book"></i> <span>Laporan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="./viewlaporan"><i class="fa fa-leaf"></i>Data Panen</a></li>
        <li><a href="./viewlappesan"><i class="fa fa-send"></i>Data Pemesanan</a></li>
        <!--<li><a href="viewlappanenpadi"><i class="fa fa-map-o"></i> Data Panen Padi</a></li>-->
      </ul>
    </li>
  </ul>

  </section>
