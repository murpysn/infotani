<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="../../img/pengusaha/user/<?php echo $gambar2;?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $_SESSION['USERNAME'] ?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
      <a href="./riwayat">
        <i class="fa fa-send"></i> <span>Riwayat Pemesanan</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
    <li class="treeview">
      <a href="./viewlaporan">
        <i class="fa fa-book"></i> <span>Laporan Pemesanan</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
    
    <?php  if($nama_pengguna != ""){            
          ?>
    <li class="treeview">
      <a href="../frontend/cariHasil">
        <button class="btn btn-success btn-md"><span>Pesan Disini</span></button> 
        <span class="pull-right-container">
        </span>
      </a>
        </li> <?php }?>
  </ul>

  </section>
