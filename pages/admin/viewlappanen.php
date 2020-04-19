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
               <?php 
               if (isset($_POST['submit'])) {
                  $pilih = $_POST['pilih'];

                  $tipe = "SELECT petani.KTP, petani.NAMA_PETANI, panen.TGL_PANEN, desa.NAMA_DESA, kecamatan.NAMA_KECAMATAN, panen.HASIL,panen.HASIL_AWAL FROM petani, panen, desa, kecamatan WHERE desa.ID_KECAMATAN=kecamatan.ID_KECAMATAN AND desa.ID_DESA=petani.ID_DESA AND petani.KTP=panen.KTP AND panen.KOMODITAS=$pilih";
                  $sum = "SELECT sum(panen.HASIL_AWAL) FROM petani, panen, desa, kecamatan WHERE desa.ID_KECAMATAN=kecamatan.ID_KECAMATAN AND desa.ID_DESA=petani.ID_DESA AND petani.KTP=panen.KTP AND panen.KOMODITAS=$pilih";
                }else {
                  $tipe = "SELECT petani.KTP, petani.NAMA_PETANI, panen.TGL_PANEN, desa.NAMA_DESA, kecamatan.NAMA_KECAMATAN, panen.HASIL,panen.HASIL_AWAL FROM petani, panen, desa, kecamatan WHERE desa.ID_KECAMATAN=kecamatan.ID_KECAMATAN AND desa.ID_DESA=petani.ID_DESA AND petani.KTP=panen.KTP";
                  $sum = "SELECT sum(panen.HASIL_AWAL) FROM petani, panen, desa, kecamatan WHERE desa.ID_KECAMATAN=kecamatan.ID_KECAMATAN AND desa.ID_DESA=petani.ID_DESA AND petani.KTP=panen.KTP";
                } ?>
              <h3 style="text-align: center;">Laporan Panen <?php echo $komoditaspanen; ?></h3>
              <h3>
                  <form action="" method="POST">
                    <?php

                        echo "<select name='pilih' class='form-control hidden-print'>";
                        

                        echo "<option value='belum memilih' selected>--Pilih Komoditas--</option>";
                        $cekkomoditastampil = mysqli_query($koneksi, "select * from komoditas") or die(mysqli_error($koneksi));
                        while ($data=mysqli_fetch_array($cekkomoditastampil)) {
                        ?>
                        <option value="<?=$data['ID_KOMODITAS']?>"><?=$data['NAMA_KOMODITAS']?></option>
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
               <h3 class="box-title">Jumlah Panen : <b class="uang"><?php echo $tampilsum[0]; ?> </b><b> KG</b>  </h3>
             <?php } ?>
               <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                  <th>ID PETANI</th>
                  <th>NAMA PETANI</th>
                  <th>TANGGAL PANEN</th>
                  <th>DESA</th>
                  <th>KECAMATAN</th>
                  <th>HASIL PANEN AWAL (KG)</th>
                  <th>HASIL SISA PANEN (KG)</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../../controller/admin/koneksi.php";
                    //query untuk menampilkan data table dari tb_siswa
                    $query = mysqli_query($koneksi, $tipe) or die(mysqli_error($koneksi));
                    //echo $query;
                    while ($data = mysqli_fetch_array($query)) {  //merubah array dari objek ke array yang biasanya
                    ?>
                    <tr>
                        <!--memangambil data dari tabel dengan mengisikan data di table-->
                        <td><?php echo $data ['KTP'];?></td>
                        <td><?php echo $data ['NAMA_PETANI'];?></td>
                        <td><?php echo DATE_FORMAT(date_create($data ['TGL_PANEN']),'d M Y');?></td>
                        <td><?php echo $data ['NAMA_DESA'];?></td>
                        <td><?php echo $data ['NAMA_KECAMATAN'];?></td>
                        <td class="uang"><?php echo $data ['HASIL_AWAL'];?></td>
                        <td class="uang"><?php echo $data ['HASIL'];?></td>

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
