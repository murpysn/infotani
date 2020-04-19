<!DOCTYPE html>
<html>
<?php
        require_once "../_partials/head.php";
?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!--header-->
    <?php
            require_once "../_partials/header.php";
    ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php
        require_once "../_partials/sidebar.php";
    ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Kecamatan
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
                <div class="form-group">
                    <label>Nama Kecamatan</label>
                    <!--menginputkan sebuah inputan nim bertipe text-->
                    <input type="text" class="form-control" name="namakec" placeholder="Nama Kecamatan" required onkeypress="return hanyaTulisan(event)">
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
        require_once "../_partials/footer.php";
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
    require_once "../_partials/js.php";
?>
</body>
</html>
