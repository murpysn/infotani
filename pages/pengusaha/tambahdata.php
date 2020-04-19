<!DOCTYPE html>
<html>
<?php
        include "../_partials/head.php";
?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!--header-->
    <?php
            include "../_partials/headerusaha.php";
    ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php
        include "../_partials/sidebarusaha.php";
    ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Perusahaan
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="container">
            <br>
            <!--membuat sebuah form-->
            <?php 
            require "../../controller/koneksi.php";
            $cekdata = "SELECT * FROM perusahaan WHERE perusahaan.ID_PERUSAHAAN='$id_pengguna' AND perusahaan.NAMA_PERUSAHAAN=''";
            $querydata = mysqli_query($koneksi, $cekdata);
            $hasilcekdata=mysqli_fetch_array($querydata);
            if($hasilcekdata==null) {
                ?>
                  <script language="JavaScript">
                  alert('Data Lengkap!');
                  setTimeout(function() {window.location.href='./index'},10);
                  </script>
                <?php
            }?>
                  <form method="post" action="../../controller/pengusaha/controllerusaha" enctype="multipart/form-data">
                        <?php 
                        $query = mysqli_query($koneksi, "SELECT Username, ID_PERUSAHAAN FROM perusahaan WHERE ID_PERUSAHAAN=$id_pengguna");
                        while ($data = mysqli_fetch_array($query)) {?>
                    <div class="form-group">
                      <label>ID PERUSAHAAN</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" name="id" value="<?php echo $data['ID_PERUSAHAAN']?>" required readonly>
                    </div>
                    
                    <div class="form-group">
                      <label>Nama Pengguna</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" name="username" value="<?php echo $data['Username']?>" required readonly>
                    </div>
                    <div class="form-group">
                      <label>Nama Perusahaan</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" name="namaperusahaan" placeholder="Masukkan Nama Perusahaan" maxlength="50" required onkeypress="return hanyaTulisan(event)">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="Email" class="form-control" name="email" placeholder="Masukkan Alamat Email" maxlength="30" required>
                    </div>

                    <div class="form-group">
                      <label>Alamat Perusahaan</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Perusahaan" maxlength="100" onkeypress="return hanyaTulisan(event)" required>
                    </div>
                    <div class="form-group">
                      <label>No Telp Perusahaan</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" name="no" placeholder="Masukkan No Telepon" maxlength="16" required onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="form-group">
                      <label>Nama Manager</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" name="manager" placeholder="Masukkan Nama Manager" maxlength="50" required onkeypress="return hanyaTulisan(event)">
                    </div> 
                    <div class="form-group">
                      <label>Logo Perusahaan/Foto Manager</label>
                      <input type="file" name="foto" id="foto" >
                     </div>
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
              <input type="reset" name="reset" class="btn btn-danger" value="Hapus">
            <?php }  ?>
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
