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
              <h3 class="box-title">Data Tabel Pemesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                  <th>ID PESAN</th>
                  <TH>NAMA PERUSAHAAN</TH>
                  <th>TANGGAL</th>
                  <th>JUMLAH PESAN (KG)</th>
                  <th>TOTAL PESAN (RP)</th>
                  <th>STATUS BAYAR</th>
                  <th>AKSI(s)</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../../controller/admin/koneksi.php";
                    //query untuk menampilkan data table dari tb_siswa
                    $query = mysqli_query($koneksi, "SELECT ID_PESAN, NAMA_PERUSAHAAN, KTP, TANGGAL, JUMLAH_PESAN, TOTAL_BIAYA, STATUS_PESAN FROM pemesanan, pesan, perusahaan where pesan.ID_PESAN_STATUS=pemesanan.ID_PESAN_STATUS and pemesanan.ID_PERUSAHAAN=perusahaan.ID_PERUSAHAAN and KTP=$ktppetani");
                    //echo $query;
                    while($data = mysqli_fetch_array($query)) {  //merubah array dari objek ke array yang biasanya
                    ?>
                    <tr>
                        <!--memangambil data dari tabel dengan mengisikan data di table-->
                        <td><?php echo $data ['ID_PESAN'];?></td>
                        <td><?php echo $data ['NAMA_PERUSAHAAN'];?></td>
                        <td><?php echo DATE_FORMAT(date_create($data ['TANGGAL']),'d M Y');?></td>
                        <td class="uang"><?php echo $data ['JUMLAH_PESAN'];?></td>
                        <td class="uang"><?php echo $data ['TOTAL_BIAYA'];?></td>
                        <td><?php echo $data ['STATUS_PESAN'];?></td>
                        <td>
                        <!--<a href="ubahdesa.php?id=<?php //echo $data['ID_LEVEL'];?>"><button class="pilih btn btn-primary"><span class="fa fa-pencil">
                        </span></button></a>-->
                        <?php if($data ['STATUS_PESAN']=='Belum Konfirmasi'){?>
                          <a href="#konfir<?php echo $data['ID_PESAN'];?>" data-toggle="modal" class="btn btn-danger"><span class="fa">Konfirmasi</a>
                        <!-- Delete -->
                        <div class="modal fade" id="konfir<?php echo $data['ID_PESAN']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <form action="./konfirmasi" method="post">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel">Kembali</h4></center>   <!-- button untuk pilihan del -->
                                        </div>
                                        <?php
                                            require_once "../../controller/pengusaha/koneksi.php";
                                          $konfir=mysqli_query($koneksi, "select * from pemesanan where ID_PESAN='".$data['ID_PESAN']."'");
                                          $drow=mysqli_fetch_array($konfir);
                                        ?>
                                        <div class="modal-footer">    <!-- pilihan button yang terdapat dalam delete ada cancel dan delete -->
                                            <input type="hidden" name="id" value="<?php echo $drow['ID_PESAN']; ?>">
                                            <h5><center>Apakah yakin ingin mengkonfirmasi pemesanan <strong><?php echo $drow['ID_PESAN']; ?></strong> ?</center></h5>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                                            <button type="submit" class="btn btn-danger" name="batal"><span class="fa fa-trash"></span> Hapus Pemesanan</button>
                                            <button type="submit" class="btn btn-success" name="konfirmasi"><span class="fa fa-pencil"></span> Konfirmasi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><?php } else {?>
                          <a href="#konfir<?php echo $data['ID_PESAN'];?>" data-toggle="modal" class="btn btn-primary"><span class="fa" readonly>Konfirmasi</a>
                        <!-- Delete -->
                        <div class="modal fade" id="konfir<?php echo $data['ID_PESAN']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <form>
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel">Kembali</h4></center>   <!-- button untuk pilihan del -->
                                        </div>
                                        <?php
                                            require_once "../../controller/pengusaha/koneksi.php";
                                          $konfir=mysqli_query($koneksi, "select * from pemesanan where ID_PESAN='".$data['ID_PESAN']."'");
                                          $drow=mysqli_fetch_array($konfir);
                                        ?>
                                        <div class="modal-footer">    <!-- pilihan button yang terdapat dalam delete ada cancel dan delete -->
                                            <input type="hidden" name="id" value="<?php echo $drow['ID_PESAN']; ?>">
                                            <h5><center>Apakah yakin ingin mengkonfirmasi pemesanan <strong><?php echo $drow['ID_PESAN']; ?></strong> ?</center></h5>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class=""></span> Batal</button>
                                            <button type="button" class="btn btn-rrimary" data-dismiss="modal">Sudah Konfirmasi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                          <?php?>
                        
                        <!-- /.modal -->
                        </td>
                        </tr>
                    <?php
                    }} ?>
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
