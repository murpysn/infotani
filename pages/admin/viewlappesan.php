<!DOCTYPE html>
<html>
<?php
        include_once "../_partials/head.php";
?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!--header-->
    <?php
            include_once "../_partials/header.php";
            date_default_timezone_set('Asia/Jakarta');
        $tgll = date("Y-m-d");
        $tgl = date("d");
        $tahun = date ("Y");
    ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php
        include_once "../_partials/sidebar.php";
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
                  $lanjut = "SELECT * FROM pemesanan
                  INNER JOIN panen on panen.ID_PANEN = pemesanan.ID_PANEN
                  INNER JOIN perusahaan on perusahaan.ID_PERUSAHAAN = pemesanan.ID_PERUSAHAAN
                  INNER JOIN petani on petani.KTP = pemesanan.KTP
                  INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                  INNER JOIN pesan on pesan.ID_PESAN_STATUS = pemesanan.ID_PESAN_STATUS
                   where year(TANGGAL)=$tahunpilih";
                  $sum = "SELECT SUM(JUMLAH_PESAN), SUM(TOTAL_BIAYA) FROM pemesanan
                  INNER JOIN panen on panen.ID_PANEN = pemesanan.ID_PANEN
                  INNER JOIN perusahaan on perusahaan.ID_PERUSAHAAN = pemesanan.ID_PERUSAHAAN
                  INNER JOIN petani on petani.KTP = pemesanan.KTP
                  INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                  INNER JOIN pesan on pesan.ID_PESAN_STATUS = pemesanan.ID_PESAN_STATUS 
                  where year(TANGGAL)=$tahunpilih";
                }else {
                  $tahunpilih = $_POST['pilih'];
                    $lanjut = "SELECT * FROM pemesanan
                    INNER JOIN panen on panen.ID_PANEN = pemesanan.ID_PANEN
                    INNER JOIN perusahaan on perusahaan.ID_PERUSAHAAN = pemesanan.ID_PERUSAHAAN
                    INNER JOIN petani on petani.KTP = pemesanan.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN pesan on pesan.ID_PESAN_STATUS = pemesanan.ID_PESAN_STATUS";
                  $sum = "SELECT SUM(JUMLAH_PESAN), SUM(TOTAL_BIAYA) FROM pemesanan
                  INNER JOIN panen on panen.ID_PANEN = pemesanan.ID_PANEN
                  INNER JOIN perusahaan on perusahaan.ID_PERUSAHAAN = pemesanan.ID_PERUSAHAAN
                  INNER JOIN petani on petani.KTP = pemesanan.KTP
                  INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                  INNER JOIN pesan on pesan.ID_PESAN_STATUS = pemesanan.ID_PESAN_STATUS";
                } ?>
              <h3 style="text-align: center;">Laporan Pemesanan <?php echo $tahunpilih; ?></h3>
              <h3>
                  <form action="" method="POST">
                    <?php

                        echo "<select name='pilih' class='form-control hidden-print'>";
                        

                        echo "<option value='".$tahun."' selected>--Pilih Tahun--</option>";
                        $cektahunpanen = mysqli_query($koneksi, "select year(TANGGAL) from pemesanan GROUP by year(TANGGAL) ") or die(mysqli_error($koneksi));
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
              $hasilsum = mysqli_query($koneksi, $sum) or die(mysqli_error($koneksi));
              while($tampilsum = mysqli_fetch_array($hasilsum)){ ?>
               <h3 class="box-title">Jumlah Pemesanan : <b class="uang"><?php echo $tampilsum[0]; ?> </b><b> KG</b>  </h3>
             <?php } ?>
               <br>
               
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                  <th>ID PEMESANAN</th>
                  <TH>NAMA PERUSAHAAN</TH>
                  <TH>NAMA PETANI</TH>
                  <th>KOMODITAS</th>
                  <th>TANGGAL</th>
                  <th>JUMLAH PESAN (KG)</th>
                  <th>TOTAL HARGA PESAN (RP)</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../../controller/admin/koneksi.php";
                    //query untuk menampilkan data table dari tb_siswa
                    $query = mysqli_query($koneksi, $lanjut) or die(mysqli_error($koneksi));
                    //echo $query;
                    while ($data = mysqli_fetch_array($query)) {  //merubah array dari objek ke array yang biasanya
                    ?>
                    <tr>
                        <!--memangambil data dari tabel dengan mengisikan data di table-->
                        <td><?php echo $data ['ID_PESAN'];?></td>
                        <td><?php echo $data ['NAMA_PERUSAHAAN'];?></td>
                        <td><?php echo $data ['NAMA_PETANI'];?></td>
                        <td><?php echo $data ['NAMA_KOMODITAS'];?></td>
                        <td><?php echo DATE_FORMAT(date_create($data ['TANGGAL']),'d M Y');?></td>
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
