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
        Ubah Data User
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
            <form method="POST" action="../../controller/admin/controlleruser" enctype="multipart/form-data">
                <?php
                require_once "../../controller/koneksi.php";?>
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama pengguna" name="username" required onkeypress="return hanyaTulisan(event)">
                </div>
                <div class="form-group">
                    <label>Level</label>
						<div class='form-check form-check-inline'>
				  			<input class='form-check-input' type='radio' name='level' value='1'>
				  			<label class='form-check-label' >Admin</label>
						</div>
						<div class='form-check form-check-inline'>
				  			<input class='form-check-input' type='radio' name='level' value='2'>
				  			<label class='form-check-label' >User</label>
						</div>
                </div>
                <div class="form-group">
                    <label>Katasandi</label>
                    <input type="password" class="form-control" placeholder="Masukkan katasandi" name="password" required">
                </div>

                <div class="form-group">
                    <label>Katasandi Konfirmasi</label>
                    <input type="password" class="form-control" placeholder="Masukkan katasandi" name="passwordConf" required ">
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" id="foto" >
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
