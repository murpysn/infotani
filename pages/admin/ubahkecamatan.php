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
        Ubah Data Desa
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Tambah Data</li>
      </ol>
    </section>
    <section class="content">
        <div class="container">
            <br>
            <!--membuat sebuah form-->
            <form method="post" action="../../controller/admin/controllerkecamatan">
                <?php
                require_once "../../controller/koneksi.php";
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    //query untuk menampilkan sebuah query select dari table tb_siswa dengan id siswa sebagai parameter
                    $sql = "SELECT * FROM kecamatan WHERE kecamatan.ID_KECAMATAN='$id'";
                    $querykec = mysqli_query($koneksi, $sql);
                    while ($data = mysqli_fetch_array($querykec)) {?>
                <input type="hidden" name="idkecamatan" value="<?php echo $data['ID_KECAMATAN']?>">
                <div class="form-group">
                    <label>Nama Kecamatan</label>
                    <!--menginputkan sebuah inputan nim bertipe text-->
                    <input type="text" class="form-control" value="<?php echo $data['NAMA_KECAMATAN']?>"
                    name="namakec" required onkeypress="return hanyaTulisan(event)">
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
