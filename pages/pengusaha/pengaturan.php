<!DOCTYPE html>
<html>
<?php
        require_once "../_partials/head.php";
?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!--header-->
    <?php
            require_once "../_partials/headerusaha.php";
    ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php
        require_once "../_partials/sidebarusaha.php";
    ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengaturan
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Pengaturan Data</li>
      </ol>
    </section>
    <section class="content">
        <div class="container">
            <br>
            <div class="col-md-5 col-md-offset-3 form-login" style="position:static">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="fa fa-hand-o-right" style="position:static"></span>
                  Form Ganti Kata Sandi </div>
                    <div class="panel-body" style="min-height:450px">
                        <form action="../../controller/pengusaha/gantipassword" method="POST" name="ganti_password" enctype="multipart/form-data">

                          <input type="hidden" name="userid" id="userid" value="<?php echo $pengusaha ?>">
                            <div class="form-group">
                            Foto
                                <img src="../../img/pengusaha/user/<?php echo $gambar2;?>" style="height:160px; width:120px;" class="img-rectangle" alt="User Image">
                                <input type="file" id="foto" name="foto" >
                            </div>
                          <div class="form-group">
                            Katasandi Lama
                                <input type="password" class="form-control" placeholder="Masukkan Kata Sandi Lama"  name="pass_lama" id="pass_lama" required/>
                            </div>

                          <div class="form-group">
                            Katasandi Baru
                                <input type="password" class="form-control" placeholder="Masukkan Kata Sandi Baru"  name="pass_baru" id="pass_baru" required/>
                            </div>

                          <div class="form-group">
                            Konfirmasi Kata Sandi
                                <input type="password" class="form-control" placeholder="Ulangi Kata Sandi Baru"  name="pass_konf" id="pass_konf" required/>
                            </div>

                          <input class="btn btn-block sub-hover" type="submit" name="Ganti" value="Ganti">

                        </form>
                    </div>
                </div>
            </div>
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
