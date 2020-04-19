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
              <h3 class="box-title">Data Tabel Pengusaha</h3>
              <h3><a href="./tambahpengusaha"><span class="fa fa-plus" style="position:static;float:Left"> Tambah Data</span></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID PERUSAHAAN</th>
                  <th>USERNAME</th>
                  <th>PASSWORD</th>
                  <th>SIUP</th>
                  <th>LOGO</th>
                  <th>NAMA_PERUSAHAAN</th>
                  <th>EMAIL</th>
                  <th>ALAMAT PERUSAHAAN</th>
                  <th>NO TELP</th>
                  <th>NAMA MANAGER</th>
                  <th>AKSI(s)</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../../controller/admin/koneksi.php";
                    //query untuk menampilkan data table dari tb_siswa
                    $query = mysqli_query($koneksi, "SELECT * FROM perusahaan") or die(mysqli_error($koneksi));
                    //echo $query;
                    while($data = mysqli_fetch_array($query)) {  //merubah array dari objek ke array yang biasanya
                    ?>
                    <tr>
                        <!--memangambil data dari tabel dengan mengisikan data di table-->
                        <td><?php echo $data [0];?></td>
                        <td><?php echo $data [1];?></td>
                        <td><?php echo $data [2];?></td>
                        <td><img style="height:160px; width:120px;" src="../../img/pengusaha/SIUP/<?php echo $data [3];?>"></td>
                        <td><img style="height:160px; width:120px;" src="../../img/pengusaha/user/<?php echo $data [4];?>"></td>
                        <td><?php echo $data [5];?></td>
                        <td><?php echo $data [6];?></td>
                        <td><?php echo $data [7];?></td>
                        <td><?php echo $data [8];?></td>
                        <td><?php echo $data [9];?></td>
                        <td>
                        <a href="./ubahpengusaha?id=<?php echo $data[0];?>"><button class="pilih btn btn-primary"><span class="fa fa-pencil">
                        </span></button></a>
                        <a href="#del<?php echo $data[0];?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-trash"></a>
                        <!-- Delete -->
                        <div class="modal fade" id="del<?php echo $data[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <form action="../../controller/admin/controllerpengusaha" method="post">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel">Hapus</h4></center>   <!-- button untuk pilihan del -->
                                        </div>
                                        <?php
                                            require_once "../../controller/admin/koneksi.php";
                                  $del=mysqli_query($koneksi, "select * from perusahaan where ID_PERUSAHAAN='".$data[0]."'") or die(mysqli_error($koneksi));
                                  $drow=mysqli_fetch_array($del);
                                ?>
                                        <div class="modal-footer">    <!-- pilihan button yang terdapat dalam delete ada cancel dan delete -->
                                            <input type="hidden" name="idhapus" value="<?php echo $drow[0]; ?>">
                                            <input type="hidden" name="foto" value="<?php echo $drow[3]; ?>">
                                            <h5><center>Apakah yakin ingin menghapus  <strong><?php echo $drow['NAMA_PERUSAHAAN']; ?></strong> ?</center></h5>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                                            <button type="submit" class="btn btn-danger" name="hapus"><span class="fa fa-trash"></span> Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal -->
                        </td>
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
