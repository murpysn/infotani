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
                  $lanjut = "select panen.ID_PANEN, petani.KTP, panen.KOMODITAS, komoditas.NAMA_KOMODITAS, panen.TGL_PANEN, panen.HASIL_AWAL,panen.HASIL, panen.HARGA, panen.STATUS_PANEN from panen, petani, komoditas WHERE petani.KTP=panen.KTP AND komoditas.ID_KOMODITAS=petani.ID_KOMODITAS AND year(TGL_PANEN) = $tahunpilih and petani.KTP=$ktppetani";
                  $sum = "select sum(panen.HASIL_AWAL), sum(panen.HASIL) from panen, petani, komoditas WHERE petani.KTP=panen.KTP AND komoditas.ID_KOMODITAS=petani.ID_KOMODITAS AND year(TGL_PANEN) = $tahunpilih and petani.KTP=$ktppetani";
                }else {
                    $tahunpilih = $_POST['pilih'];
                    $lanjut = "select panen.ID_PANEN, petani.KTP, panen.KOMODITAS, komoditas.NAMA_KOMODITAS, panen.TGL_PANEN,panen.HASIL_AWAL, panen.HASIL, panen.HARGA, panen.STATUS_PANEN from panen, petani, komoditas WHERE petani.KTP=panen.KTP AND komoditas.ID_KOMODITAS=petani.ID_KOMODITAS AND petani.KTP=$ktppetani";
                    $sum = "select sum(panen.HASIL_AWAL), sum(panen.HASIL) from panen, petani, komoditas WHERE petani.KTP=panen.KTP AND komoditas.ID_KOMODITAS=petani.ID_KOMODITAS AND petani.KTP=$ktppetani";
                } ?>
              <h3 style="text-align: center;">Laporan Panen Tahun <?php echo $tahunpilih; ?></h3>
              <h3>
                  <form action="" method="POST">
                    <?php

                        echo "<select name='pilih' class='form-control hidden-print'>";
                        

                        echo "<option value='".$tahun."' selected>--Pilih Tahun--</option>";
                        $cektahunpanen = mysqli_query($koneksi, "select year(TGL_PANEN) from panen GROUP by year(TGL_PANEN) ");
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
               <h3 class="box-title">Jumlah Awal Panen      : <b class="uang"><?php echo $tampilsum[0]; ?></b><b> KG</b>  </h3>
               <br/>
               <h3 class="box-title">Jumlah Sisa Panen :<b class="uang"><?php echo $tampilsum[1]; ?></b><b>  KG</b>  </h3>
             <?php } ?>
               <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                  <th>ID PANEN</th>
                  <th>KTP</th>
                  <th>KOMODITAS</th>
                  <th>TANGGAL PANEN</th>
                  <th>HASIL AWAL PANEN (KG)</th>
                  <th>SISA PANEN (KG)</th>
                  <th>HARGA/KG (RP)</th>
                  <th>STATUS PANEN</th>
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
                        <td><?php echo $data ['ID_PANEN'];?></td>
                        <td><?php echo $data ['KTP'];?></td>
                        <td><?php echo $data ['NAMA_KOMODITAS'];?></td>
                        <td><?php echo $data ['TGL_PANEN'];?></td>
                        <td class="uang"><?php echo $data ['HASIL_AWAL'];?></td>
                        <td class="uang"><?php echo $data ['HASIL'];?></td>
                        <td class="uang"><?php echo $data ['HARGA'];?></td>
                        <td><?php echo $data ['STATUS_PANEN'];?></td>
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
