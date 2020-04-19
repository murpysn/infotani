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
        Ubah Data Petani
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
            <form method="post" action="../../controller/admin/controllerpetani" enctype="multipart/form-data">
                <?php
                require_once "../../controller/koneksi.php";
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    //query untuk menampilkan sebuah query select dari table tb_siswa dengan id siswa sebagai parameter
                    $query = mysqli_query($koneksi, "SELECT petani.KTP as ktpp, petani.ID_DESA, desa.NAMA_DESA as desa, petani.ID_KOMODITAS, komoditas.NAMA_KOMODITAS as komoditas, petani.ID_USER, user.USERNAME, petani.ID_STATUS, status.STATUS, petani.NAMA_PETANI, petani.ALAMAT_PETANI, petani.LUAS_SAWAH, petani.ALAMAT_SAWAH, petani.TANAM, petani.PANEN, petani.NO_HP FROM komoditas, desa, petani, user, status WHERE komoditas.ID_KOMODITAS=petani.ID_KOMODITAS AND desa.ID_DESA=petani.ID_DESA AND status.ID_STATUS=petani.ID_STATUS and user.ID_USER=petani.ID_USER and petani.ktp=$id");
                    while ($data = mysqli_fetch_array($query)) {?>
                <div class="form-group">
            <label>KTP</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <input type="text" class="form-control" name="KTP" value="<?php echo $data['ktpp']?>"  required onkeypress="return hanyaAngka(event)" readonly>
          </div>
          <div class="form-group">
            <label>Username</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <?php
                        require_once "../../controller/admin/koneksi.php";
                        $query = "select * from user";
                        $resultuser = mysqli_query($koneksi, $query);
                       // ----------------------------------------
                        echo "<select name='iduser' class='form-control' onchange='changeValue(this.value)' required>";
                        echo "<option value='' selected>=== Pilih User ===</option>";
                            while($row2=mysqli_fetch_array($resultuser))
                            {
                                echo "<option value=$row2[0]>$row2[2]</option>";
                            }
                       echo "</select>";
                   ?>
          </div>
          <div class="form-group">
            <label>Nama Petani</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <input type="text" class="form-control" name="namapetani" value="<?php echo $data['NAMA_PETANI']?>"  required onkeypress="return hanyaTulisan(event)">
          </div>
          <div class="form-group">
            <label>Alamat Petani</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <input type="text" class="form-control" name="alamatpetani" value="<?php echo $data['ALAMAT_PETANI']?>"  required>
          </div>

          <div class="form-group">
            <label>No HP Petani</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <input type="text" class="form-control" name="nohp" value="<?php echo $data['NO_HP']?>"  required>
          </div>
          <div class="form-group">
            <label>Komoditas</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <?php
                        require_once "../../controller/admin/koneksi.php";
                        $query = "select * from komoditas";
                        $resultkomoditas = mysqli_query($koneksi, $query);
                       // ----------------------------------------
                        echo "<select name='idkomoditas' class='form-control' onchange='changeValue(this.value)' required>";
                        echo "<option value='' selected>=== Pilih Komoditas ===</option>";
                            while($row2=mysqli_fetch_array($resultkomoditas))
                            {
                                echo "<option value=$row2[0]>$row2[1]</option>";
                            }
                       echo "</select>";
                   ?>
                </div>
          <div class="form-group">
            <label>Luas Sawah</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <input type="text" class="form-control" name="luassawah" value="<?php echo $data['LUAS_SAWAH']?>"  required onkeypress="return hanyaAngka(event)">
          </div>
          <div class="form-group">
            <label>Alamat Sawah</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <input type="text" class="form-control" name="alamatsawah" value="<?php echo $data['ALAMAT_SAWAH']?>"  required>
          </div>
          <div class="form-group">
            <label>Desa</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <?php
                        require_once "../../controller/admin/koneksi.php";
                        $query = "select * from desa";
                        $resultdesa = mysqli_query($koneksi, $query);
                       // ----------------------------------------
                        echo "<select name='iddesa' class='form-control' onchange='changeValue(this.value)' required>";
                        echo "<option value='' selected>=== Pilih Desa ===</option>";
                            while($row2=mysqli_fetch_array($resultdesa))
                            {
                                echo "<option value=$row2[0]>$row2[2]</option>";
                            }
                       echo "</select>";
                   ?>
                </div>
          <div class="form-group">
            <label>Tanggal Tanam</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <input type="date" class="form-control" name="tgltanam" value="<?php echo $data['TANAM']?>"  required>
          </div>
          <div class="form-group">
            <label>Tanggal Panen</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <input type="date" class="form-control" name="tglpanen" value="<?php echo $data['PANEN']?>"  required>
          </div>
          <div class="form-group">
            <label>Status</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
           <?php
                        require_once "../../controller/admin/koneksi.php";
                        $query = "select * from status";
                        $resultstatus = mysqli_query($koneksi, $query);
                       // ----------------------------------------
                        echo "<select name='idstatus' class='form-control' onchange='changeValue(this.value)' required>";
                        echo "<option value='' selected>=== Pilih Status Panen ===</option>";
                            while($row2=mysqli_fetch_array($resultstatus))
                            {
                                echo "<option value=$row2[0]>$row2[1]</option>";
                            }
                       echo "</select>";
                   ?>
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
