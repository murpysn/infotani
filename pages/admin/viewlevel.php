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
              <h3 class="box-title">Data Tabel Level</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                  <th>ID LEVEL</th>
                  <th>NAMA LEVEL</th>
                  <!--<th>AKSI(s)</th>-->
                </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../../controller/admin/koneksi.php";
                    //query untuk menampilkan data table dari tb_siswa
                    $query = mysqli_query($koneksi, "SELECT * FROM level") or die(mysqli_error($koneksi));;
                    //echo $query;
                    while($data = mysqli_fetch_array($query)) {  //merubah array dari objek ke array yang biasanya
                    ?>
                    <tr>
                        <!--memangambil data dari tabel dengan mengisikan data di table-->
                        <td><?php echo $data ['ID_LEVEL'];?></td>
                        <td><?php echo $data ['NAMA_LEVEL'];?></td>
                        <!--<td>
                        <a href="ubahdesa.php?id=<?php //echo $data['ID_LEVEL'];?>"><button class="pilih btn btn-primary"><span class="fa fa-pencil">
                        </span></button></a>
                        <a href="#del<?php //echo $data['ID_LEVEL'];?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-trash"></a>-->
                        <!-- Delete -->
                        <div class="modal fade" id="del<?php echo $data['ID_LEVEL']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <form action="../../controller/admin/controllerdesa.php" method="post">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel">Hapus</h4></center>		<!-- button untuk pilihan del -->
                                        </div>
                                        <?php
                                            require_once "../../controller/admin/koneksi.php";
                        					$del=mysqli_query($koneksi, "select * from level where ID_LEVEL='".$data['ID_LEVEL']."'") or die(mysqli_error($koneksi));
                        					$drow=mysqli_fetch_array($del);
                        				?>
                                        <div class="modal-footer">		<!-- pilihan button yang terdapat dalam delete ada cancel dan delete -->
                                            <input type="hidden" name="idhapus" value="<?php echo $drow['ID_LEVEL']; ?>">
                                            <h5><center>Apakah yakin ingin menghapus Desa <strong><?php echo $drow['NAMA_LEVEL']; ?></strong> ?</center></h5>
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
