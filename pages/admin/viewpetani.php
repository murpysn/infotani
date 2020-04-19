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
              <h3 class="box-title">Data Tabel Petani</h3>
              <h3><a href="./tambahpetani"><span class="fa fa-plus" style="position:static;float:Left"> Tambah Data</span></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>KTP</th>
                  <th>USERNAME</th>
                  <th>NAMA PETANI</th>
                  <th>ALAMAT PETANI</th>
                  <th>NO HP</th>
                  <th>KOMODITAS</th>
                  <th>LUAS SAWAH (ha)</th>
                  <th>ALAMAT SAWAH</th>
                  <th>DESA</th>
                  <th>TANAM</th>
                  <th>PANEN</th>
                  <th>STATUS</th>
                  <th>AKSI(s)</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../../controller/admin/koneksi.php";
                    //query untuk menampilkan data table dari tb_siswa
                    $query = mysqli_query($koneksi, "SELECT petani.KTP as ktp, petani.ID_DESA, desa.NAMA_DESA as desa, petani.ID_KOMODITAS, komoditas.NAMA_KOMODITAS as komoditas, petani.ID_USER, user.USERNAME, petani.ID_STATUS, status.STATUS, petani.NAMA_PETANI, petani.ALAMAT_PETANI, petani.LUAS_SAWAH, petani.ALAMAT_SAWAH, petani.TANAM, petani.PANEN, petani.NO_HP FROM komoditas, desa, petani, user, status WHERE komoditas.ID_KOMODITAS=petani.ID_KOMODITAS AND desa.ID_DESA=petani.ID_DESA AND status.ID_STATUS=petani.ID_STATUS and user.ID_USER=petani.ID_USER")or die(mysqli_error($koneksi));
                    //echo $query;
                    while($data = mysqli_fetch_array($query)) {  //merubah array dari objek ke array yang biasanya
                    ?>
                    <tr>
                        <!--memangambil data dari tabel dengan mengisikan data di table-->
                        <td><?php echo $data ['ktp'];?></td>
                        <td><?php echo $data ['USERNAME'];?></td>
                        <td><?php echo $data ['NAMA_PETANI'];?></td>
                        <td><?php echo $data ['ALAMAT_PETANI'];?></td>
                        <td><?php echo $data ['NO_HP'];?></td>
                        <td><?php echo $data ['komoditas'];?></td>
                        <td><?php echo $data ['LUAS_SAWAH'];?></td>
                        <td><?php echo $data ['ALAMAT_SAWAH'];?></td>
                        <td><?php echo $data ['desa'];?></td>
                        <td><?php echo DATE_FORMAT(date_create($data ['TANAM']),'d M Y');?></td>
                        <td><?php echo DATE_FORMAT(date_create($data ['PANEN']),'d M Y');?></td>
                        <td><?php echo $data ['STATUS'];?></td>
                        <td>
                        <a href="./ubahpetani?id=<?php echo $data['ktp'];?>"><button class="pilih btn btn-primary"><span class="fa fa-pencil">
                        </span></button></a>
                        <a href="#del<?php echo $data['ktp'];?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-trash"></a>
                        <!-- Delete -->
                        <div class="modal fade" id="del<?php echo $data['ktp']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <form action="../../controller/admin/controllerpetani" method="post">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel">Hapus</h4></center>   <!-- button untuk pilihan del -->
                                        </div>
                                        <?php
                                            require_once "../../controller/admin/koneksi.php";
                                  $del=mysqli_query($koneksi, "select * from petani where KTP='".$data['ktp']."'") or die(mysqli_error($koneksi));
                                  $drow=mysqli_fetch_array($del);
                                ?>
                                        <div class="modal-footer">    <!-- pilihan button yang terdapat dalam delete ada cancel dan delete -->
                                            <input type="hidden" name="idhapus" value="<?php echo $drow['KTP']; ?>">
                                            <input type="hidden" name="iduser" value="<?php echo $drow['ID_USER']; ?>">
                                            <h5><center>Apakah yakin ingin menghapus  <strong><?php echo $drow['NAMA_PETANI']; ?></strong> ?</center></h5>
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
