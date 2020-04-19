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
              <h3 class="box-title">Data Pengguna</h3>
              <h3><a href="./tambahuser"><span class="fa fa-plus" style="position:static;float:Left"> Tambah Data</span></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                  <th>ID PENGGUNA</th>
                  <th>LEVEL</th>
                  <th>NAMA PENGGUNA</th>
                  <th>KATA SANDI</th>
                  <th>FOTO</th>
                  <th>AKSI(s)</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../../controller/admin/koneksi.php";
                    //query untuk menampilkan data table dari tb_siswa
                    $query = mysqli_query($koneksi, "SELECT ID_USER, user.ID_LEVEL, NAMA_LEVEL, USERNAME, PASSWORD, user.FOTO_USER FROM user, level where level.ID_LEVEL=user.ID_LEVEL");
                    //echo $query;
                    while($data = mysqli_fetch_array($query)) {  //merubah array dari objek ke array yang biasanya
                    ?>
                    <tr>
                        <!--memangambil data dari tabel dengan mengisikan data di table-->
                        <td><?php echo $data ['ID_USER'];?></td>
                        <td><?php echo $data ['NAMA_LEVEL'];?></td>
                        <td><?php echo $data ['USERNAME'];?></td>
                        <td><?php echo $data ['PASSWORD'];?></td>
                        <td><img style="height:160px; width:120px;" src="../../img/user/<?php echo $data ['FOTO_USER'];?>"></td>
                        <td>
                        <a href="./ubahuser?id=<?php echo $data['ID_USER'];?>"><button class="pilih btn btn-primary"><span class="fa fa-pencil">
                        </span></button></a>
                        <a href="#del<?php echo $data['ID_USER'];?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-trash"></a>
                        <!-- Delete -->
                        <div class="modal fade" id="del<?php echo $data['ID_USER']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <form action="../../controller/admin/controlleruser" method="post" enctype="multipart/form-data">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel">Hapus</h4></center>
                                        </div>
                                        <?php
                                            require_once "../../controller/admin/koneksi.php";
                                            $del=mysqli_query($koneksi, "select * from user where ID_USER='".$data['ID_USER']."'") or die(mysqli_error($koneksi));
                                            $drow=mysqli_fetch_array($del);
                                        ?>
                                        <div class="modal-footer">        <!-- pilihan button yang terdapat dalam delete ada cancel dan delete -->
                                            <input type="hidden" name="idhapus" value="<?php echo $drow['ID_USER'];?>">
                                            <input type="hidden" name="fotouser" value="<?php echo $data['FOTO_USER'];?>">
                                            <h5><center>Apakah yakin ingin menghapus Username dari  <strong><?php echo $drow['ID_USER']; ?></strong> ?</center></h5>
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
