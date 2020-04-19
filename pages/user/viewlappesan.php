<!DOCTYPE html>
<html>
<?php
        include_once "../_partials/head.php";
?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!--header-->
    <?php
            include_once "../_partials/headeruser.php";
            date_default_timezone_set('Asia/Jakarta');
        $tgll = date("Y-m-d");
        $tgl = date("d");
        $tahun = date ("Y");
    ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php
        include_once "../_partials/sidebaruser.php";
    ?>    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               <?php if (isset($_POST['submit'])) {
                  $tahunpilih = $_POST['pilih'];
                  $lanjut = "select pemesanan.ID_PESAN, pemesanan.ID_PERUSAHAAN, perusahaan.NAMA_PERUSAHAAN, petani.KTP, pemesanan.TANGGAL, pemesanan.JUMLAH_PESAN, pemesanan.TOTAL_BIAYA, pemesanan.ID_PESAN_STATUS, pemesanan.ID_PANEN from pemesanan, perusahaan, petani WHERE pemesanan.ID_PERUSAHAAN=perusahaan.ID_PERUSAHAAN AND pemesanan.KTP=petani.KTP AND year(TANGGAL)=$tahunpilih and pemesanan.KTP=$ktppetani";
                  $sum = "select psum(pemesanan.JUMLAH_PESAN) from pemesanan, perusahaan, petani WHERE pemesanan.ID_PERUSAHAAN=perusahaan.ID_PERUSAHAAN AND pemesanan.KTP=petani.KTP AND year(TANGGAL)=$tahunpilih and pemesanan.KTP=$ktppetani";
                }else {
                  $tahunpilih = $tahun;
                    $lanjut = "select pemesanan.ID_PESAN, pemesanan.ID_PERUSAHAAN, perusahaan.NAMA_PERUSAHAAN, petani.KTP, pemesanan.TANGGAL, pemesanan.JUMLAH_PESAN, pemesanan.TOTAL_BIAYA, pemesanan.ID_PESAN_STATUS, pemesanan.ID_PANEN from pemesanan, perusahaan, petani WHERE pemesanan.ID_PERUSAHAAN=perusahaan.ID_PERUSAHAAN AND pemesanan.KTP=petani.KTP and pemesanan.KTP=$ktppetani";
                    $sum = "select sum(pemesanan.JUMLAH_PESAN) from pemesanan, perusahaan, petani WHERE pemesanan.ID_PERUSAHAAN=perusahaan.ID_PERUSAHAAN AND pemesanan.KTP=petani.KTP and pemesanan.KTP=$ktppetani";
                } ?>
              <h3 style="text-align: center;">Laporan Pemesanan <?php echo $tahunpilih; ?></h3>
              <h3>
                 <form action="" method="POST">
                    <?php

                        echo "<select name='pilih' class='form-control hidden-print'>";
                        

                        echo "<option value='".$tahun."' selected>--Pilih Tahun--</option>";
                        $cektahunpanen = mysqli_query($koneksi, "select year(TANGGAL) from pemesanan GROUP by year(TANGGAL) ");
                        while ($data=mysqli_fetch_array($cektahunpanen)) {
                        ?>
                        <option value="<?=$data[0]?>"><?=$data[0]?></option>
                        <?php
                        }

                        echo "</select><br>";
                        echo "<button type='submit' name='submit' class='btn btn-warning hidden-print'>Pilih</button>   ";
                        echo "<button type='submit' name='submit1' class='btn btn-warning hidden-print'>Semua</button>";
                    ?>
                  </form>
              </h3>
              <br>
              <?php 
              $hasilsum = mysqli_query($koneksi, $sum);
              while($tampilsum = mysqli_fetch_array($hasilsum)){ ?>
               <h3 class="box-title">Jumlah Pemesanan <b class="uang"><?php echo $tampilsum[0]; ?></b><b> KG</b>  </h3>
             <?php } ?>
               <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                  <th>ID PEMESANAN</th>
                  <th>NAMA PERUSAHAAN</th>
                  <th>TANGGAL</th>
                  <th>JUMLAH_PESAN (KG)</th>
                  <th>TOTAL BIAYA (RP)</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../../controller/admin/koneksi.php";
                    //query untuk menampilkan data table dari tb_siswa
                    $query = mysqli_query($koneksi, $lanjut);
                    //echo $query;
                    while ($data = mysqli_fetch_array($query)) {  //merubah array dari objek ke array yang biasanya
                    ?>
                    <tr>
                        <!--memangambil data dari tabel dengan mengisikan data di table-->
                        <td><?php echo $data ['ID_PESAN'];?></td>
                        <td><?php echo $data ['NAMA_PERUSAHAAN'];?></td>
                        <td><?php echo $data ['TANGGAL'];?></td>
                        <td class="uang"><?php echo $data ['JUMLAH_PESAN'];?></td>
                        <td class="uang"><?php echo $data ['TOTAL_BIAYA'];?></td>

                        </tr>
                    <?php
                    } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <?php
        include_once "../_partials/footer.php";
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
    include_once "../_partials/js.php";
?>
</body>



</html>
