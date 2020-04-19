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
        Tambah Data Petani
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Tambah Petani</li>
      </ol>
    </section>
    <section class="content">
        <div class="container">
        <br>
        <!--membuat sebuah form-->
        <form method="post" action="../../controller/admin/controllerpetani">
          <div class="form-group">
            <label>KTP</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <input type="text" class="form-control" name="KTP" placeholder="Masukkan KTP" required onkeypress="return hanyaAngka(event)">
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
            <input type="text" class="form-control" name="namapetani" placeholder="Masukkan Nama Petani" required onkeypress="return hanyaTulisan(event)">
          </div>
          <div class="form-group">
            <label>Alamat Petani</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <input type="text" class="form-control" name="alamatpetani" placeholder="Masukkan alamat Desa" required>
          </div>

          <div class="form-group">
            <label>No HP Petani</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <input type="text" class="form-control" name="nohp" placeholder="Masukkan No hp" onkeypress="return hanyaAngka(event)" required>
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
            <input type="text" class="form-control" name="luassawah" placeholder="Masukkan Luas Sawah" required onkeypress="return hanyaAngka(event)">
          </div>
          <div class="form-group">
            <label>Alamat Sawah</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <input type="text" class="form-control" name="alamatsawah" placeholder="Masukkan Alamat Sawah" required>
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
            <input type="date" class="form-control" name="tgltanam" placeholder="Masukkan tanggal tanam" required>
          </div>
          <div class="form-group">
            <label>Tanggal Panen</label>
            <!--menginputkan sebuah inputan nim bertipe text-->
            <input type="date" class="form-control" name="tglpanen" placeholder="Masukkan tanggal panen" required>
          </div>
           <div class="form-group">
              <label>Status</label>
              <!--menginputkan sebuah inputan nim bertipe text-->
             <?php
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
