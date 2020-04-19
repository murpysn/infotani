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
        Ubah Data Pengusaha
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
            <form method="post" action="../../controller/admin/controllerpengusaha.php" enctype="multipart/form-data">
                <?php
                require_once "../../controller/koneksi.php";
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    //query untuk menampilkan sebuah query select dari table tb_siswa dengan id siswa sebagai parameter
                    $query = mysqli_query($koneksi, "SELECT * from perusahaan where ID_PERUSAHAAN='$id'");
                    while ($data = mysqli_fetch_array($query)) {?>
                <input type="hidden" name="idperusahaan" value="<?php echo $data[0]?>">
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" class="form-control" value="<?php echo $data[1]?>" name="username" required onkeypress="return hanyaTulisan(event)" readonly>
                </div><div class="form-group">
                    <label>Kata Sandi</label>
                    <input type="text" class="password form-control" placeholder="Masukkan Kata Sandi" name="password" required onkeypress="return hanyaTulisan(event)">
                    <input type="checkbox" id="cek"> Centang untuk Ubah Kata Sandi
                </div>
                <div class="form-group">
                    <label>SIUP</label>
                    <img style="height:160px; width:120px;" src="../../img/pengusaha/SIUP/<?php echo $data[3]?>">
                    <input type="hidden" name="fotosiup" value="<?php echo $data[3]?>">
                    <input type="file" name="siup" >
                </div>
                <div class="form-group">
                    <label>LOGO</label>
                    <img style="height:160px; width:120px;" src="../../img/pengusaha/user/<?php echo $data [4];?>">
                    <input type="hidden" name="fotologo" value="<?php echo $data[4]?>">
                    <input type="file" name="logo" >
                </div>
                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" class="form-control" value="<?php echo $data[5]?>" name="namaperusahaan" required onkeypress="return hanyaTulisan(event)">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" value="<?php echo $data[6]?>" name="email" required onkeypress="return hanyaTulisan(event)">
                </div>
                <div class="form-group">
                    <label>Alamat Perusahaan</label>
                    <input type="text" class="form-control" value="<?php echo $data[7]?>" name="alamat" required>
                </div>
                <div class="form-group">
                    <label>No Telp</label>
                    <input type="text" class="form-control" value="<?php echo $data[8]?>" name="notelp" required>
                </div>
                <div class="form-group">
                    <label>Nama Manager</label>
                    <input type="text" class="form-control" value="<?php echo $data[9]?>" name="manager" required>
                </div>
                <input type="submit" name="ubah" class="btn btn-success" value="Simpan">
                <input type="reset" name="reset" class="btn btn-danger" value="Hapus">
            </form>

            <?php
        }} ?>
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
