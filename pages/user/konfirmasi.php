<!DOCTYPE html>
<html>
<?php
    require_once "../../controller/admin/koneksi.php";
        include "../_partials/head.php";
        date_default_timezone_set('Asia/Jakarta');
        $tgll = date("Y-m-d");
        $tahun = date("Y");
?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!--header-->
    <?php
        include "../_partials/headeruser.php";
    ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php
        include "../_partials/sidebaruser.php";
    ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Halaman Pemesanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Halaman Pemesanan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12">
          <?php
          require_once "../../controller/koneksi.php";
          if(isset($_POST['konfirmasi'])) { 
          ?>
          <form action="../../controller/user/pemesanan" method="post" enctype="multipart/form-data">
            <?php
                    $id = $_POST['id'];

                    //query untuk menampilkan sebuah query select dari table tb_siswa dengan id siswa sebagai parameter
                    $query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE ID_PESAN='$id'");
                    while ($data = mysqli_fetch_array($query)) {?>
            <fieldset><legend><h5>Data Pemesanan</h5></legend></fieldset>
            <input type="hidden" name="idpanen" value="<?php echo $data['ID_PANEN'] ?>">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>ID Pesan</label>
                  <input type="text" value="<?php echo $data['ID_PESAN']?>" name="idpesan" class="form-control" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label>ID Perusahaan</label>
                  <input type="text" value="<?php echo $data['ID_PERUSAHAAN']?>" name="idperusahaan" class="form-control" readonly>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label >KTP</label>
                  <input type="text" value="<?php echo $data['KTP']?>" name="ktp" class="form-control" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label >Tanggal</label>
                  <input type="text" name="Tanggal" value="<?php echo $data['TANGGAL']?>" class="form-control" readonly>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label>Jumlah Pemesanan (Kg)</label>
                <input type="text" id="jmlpesan" value="<?php echo $data['JUMLAH_PESAN']?>" name="jmlpesan" class="uang form-control" readonly="">
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label>Total Harga Pemesanan (Rp)</label>
                  <input type="text" name="total" value="<?php echo $data['TOTAL_BIAYA']?>" id="total" class="uang form-control" readonly>
                </div>
              </div>
              <input type="submit" name="konfirmasi" class="btn btn-success" value="konfirmasi">
              <a href="./riwayat" class="btn btn-danger" value="Kembali">Kembali</a>

            <?php
          }
            ?>
            </form>
          <?php } elseif(isset($_POST['batal'])) { 
          ?>
          <form action="../../controller/user/pemesanan" method="post" enctype="multipart/form-data">
            <?php
                    $id = $_POST['id'];
                    //query untuk menampilkan sebuah query select dari table tb_siswa dengan id siswa sebagai parameter
                    $query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE ID_PESAN='$id'");
                    while ($data = mysqli_fetch_array($query)) {?>
            <fieldset><legend><h5>Data Pemesanan</h5></legend></fieldset>
            <input type="hidden" name="idpanen" value="<?php echo $data['ID_PANEN'] ?>">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>ID Pesan</label>
                  <input type="text" value="<?php echo $data['ID_PESAN']?>" name="idpesan" class="form-control" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label>ID Perusahaan</label>
                  <input type="text" value="<?php echo $data['ID_PERUSAHAAN']?>" name="idperusahaan" class="form-control" readonly>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label >KTP</label>
                  <input type="text" value="<?php echo $data['KTP']?>" name="ktp" class="form-control" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label >Tanggal</label>
                  <input type="text" name="Tanggal" value="<?php echo $data['TANGGAL']?>" class="form-control" readonly>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label>Jumlah Pemesanan (Kg)</label>
                <input type="text" id="jmlpesan" value="<?php echo $data['JUMLAH_PESAN']?>" name="jmlpesan" class="uang form-control" readonly="">
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label>Total Harga Pemesanan (Rp)</label>
                  <input type="text" name="total" value="<?php echo $data['TOTAL_BIAYA']?>" id="total" class="uang form-control" readonly>
                </div>
              </div>
              <input type="submit" name="batal" class="btn btn-success" value="Batal Konfirmasi">
              <a href="./riwayat" class="btn btn-danger" value="Kembali">Kembali</a>

            <?php
          }
            ?>
            </form>
          <?php } ?>

        </div>
    </section>
    <!-- /.content -->
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
