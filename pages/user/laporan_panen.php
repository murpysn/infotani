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
              <h3 class="box-title">Laporan Panen <?php echo $_SESSION['USERNAME'] ?></h3>

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
                  <th>HASIL PANEN AWAL (KG)</th>
                  <th>HASIL SISA PANEN (KG)</th>
                  <th>HARGA/KG (RP)</th>
                  <th>STATUS PANEN</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../../controller/admin/koneksi.php";
                    //query untuk menampilkan data table dari tb_siswa
                    $query = mysqli_query($koneksi, "select * from panen where KTP=$ktppetani");
                    //echo $query;
                    while ($data = mysqli_fetch_array($query)) {  //merubah array dari objek ke array yang biasanya
                    ?>
                    <tr>
                        <!--memangambil data dari tabel dengan mengisikan data di table-->
                        <td><?php echo $data ['ID_PANEN'];?></td>
                        <td><?php echo $data ['KTP'];?></td>
                        <td><?php echo $data ['KOMODITAS'];?></td>
                        <td><?php echo DATE_FORMAT(date_create($data ['TGL_PANEN']),'d M Y');?></td>
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
