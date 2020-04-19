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
            <form method="post" action="../../controller/admin/controlleruser" enctype="multipart/form-data">
                <?php $id= $_GET['id'];
                require_once "../../controller/koneksi.php";
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    //query untuk menampilkan sebuah query select dari table tb_siswa dengan id siswa sebagai parameter
                    $query = mysqli_query($koneksi, "SELECT user.ID_LEVEL, USERNAME, ID_USER, NAMA_LEVEL, PASSWORD, FOTO_USER FROM user, level WHERE level.ID_LEVEL=user.ID_LEVEL AND ID_USER='$id'") or die(mysqli_error($koneksi));
                }
                    while ($data = mysqli_fetch_array($query)) {?>
                <input type="hidden" name="id_user" value="<?php echo $data['ID_USER']?>">
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" class="form-control" value="<?php echo $data['USERNAME']?>" name="username" required onkeypress="return hanyaTulisan(event)" readonly>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <?php
					if($data['ID_LEVEL']==1) {
						echo "
						<div class='form-check form-check-inline'>
				  			<input class='form-check-input' checked='checked' type='radio' name='level' value='1'>
				  			<label class='form-check-label' >Admin</label>
						</div>
						<div class='form-check form-check-inline'>
				  			<input class='form-check-input' type='radio' name='level' value='2'>
				  			<label class='form-check-label' >User</label>
						</div>";
					} else {
						echo "
						<div class='form-check form-check-inline'>
				  			<input class='form-check-input' type='radio' name='level' value='1'>
				  			<label class='form-check-label' >Admin</label>
						</div>
						<div class='form-check form-check-inline'>
				  			<input class='form-check-input' checked='checked' type='radio' name='level' value='2'>
				  			<label class='form-check-label' >User</label>
						</div>";
					}
					?>
                </div>
                <div class="form-group">
                    <label>Katasandi</label>
                    <input type="text" class="password form-control" placeholder="Masukkan Katasandi" name="password">
                    <input type="checkbox" id="cek"> Centang untuk Ubah Kata Sandi
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <img style="height:160px; width:120px;" src="../../img/user/<?php echo $data ['FOTO_USER'];?>">
                    <input type="hidden" name="fotouser" value="<?php echo $data['FOTO_USER'];?>">
                    <input type="file" name="foto" >
                </div>
                <input type="submit" name="ubah" class="btn btn-success" value="Simpan">
                <input type="reset" name="reset" class="btn btn-danger" value="Hapus">
            </form>

            <?php
        } ?>
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
