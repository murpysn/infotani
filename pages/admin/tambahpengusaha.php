<!DOCTYPE html>
<html>
<?php
        include "../_partials/head.php";
?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!--header-->
    <?php
            include "../_partials/header.php";
    ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php
        include "../_partials/sidebar.php";
    ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Data Perusahaan
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Tambah Data</li>
      </ol>
    </section>
    <section class="content">
        <div class="container">
            <br>
            <?php

             ?>
            <!--membuat sebuah form-->
            <form method="POST" action="../../controller/admin/controllerpengusaha" enctype="multipart/form-data">
                <?php
                require_once "../../controller/koneksi.php";?>
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama pengguna" name="username" required onkeypress="return hanyaTulisan(event)">
                </div><div class="form-group">
                    <label>katasandi</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama pengguna" name="password" required onkeypress="return hanyaTulisan(event)">
                </div>
                <div class="form-group">
                    <label>SIUP</label>
                    <input type="file" name="siup" id="foto" >
                </div>
                <div class="form-group">
                    <label>LOGO</label>
                    <input type="file" name="logo" id="foto" >
                </div>
                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama Perusahaan" name="namaperusahaan" required onkeypress="return hanyaTulisan(event)">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan nama email" name="email" required onkeypress="return hanyaTulisan(event)">
                </div>
                <div class="form-group">
                    <label>Alamat Perusahaan</label>
                    <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat" required>
                </div>
                <div class="form-group">
                    <label>No Telp</label>
                    <input type="text" class="form-control" placeholder="Masukkan No Telp Perusahaan" name="notelp" required >
                </div>
                <div class="form-group">
                    <label>Nama Manager</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Manager" name="manager" required >
                </div>
                <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                <input type="reset" name="reset" class="btn btn-danger" value="Hapus">
            </form>
        </div>
    </section>
    <br><br>
    </div>
  <!-- /.content-wrapper -->
  <?php
        include "../_partials/footer.php";
  ?>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<?php
    include "../_partials/js.php";
?>
</body>
</html>
