<!DOCTYPE html>
<html>
<?php
        include "../_partials/head.php";
?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!--header-->
    <?php
            include "../_partials/headeruser.php";
    ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php
        include "../_partials/sidebaruser.php";
    ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Petani
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="container">
            <br>
            <?php

             ?>
            <!--membuat sebuah form-->
                <?php
                require_once "../../controller/koneksi.php";
                $iduserpetani = $_SESSION['ID_USER'];
                $cekdata = "select KTP from petani where petani.id_user='$iduserpetani'";
                $querydata = mysqli_query($koneksi, $cekdata);
                $hasilcekdata=mysqli_fetch_array($querydata);
                if($hasilcekdata==0) {
                  ?>
                     <form method="post" action="../../controller/user/controllerpetani">
                        <?php 
                        $query = mysqli_query($koneksi, "SELECT username, id_user FROM user WHERE id_user='$login_session'");
                        while ($data = mysqli_fetch_array($query)) {?>
                      <input type="hidden" name="iduser" value="<?php echo $data['id_user']?>">
                    <div class="form-group">
                      <label>KTP</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" name="KTP" placeholder="Masukkan KTP" maxlength="20" required onkeypress="return hanyaAngka(event)">
                    </div>
                    
                    <div class="form-group">
                      <label>Username</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" name="username" value="<?php echo $data['username']?>" required readonly>
                    </div>
                    <div class="form-group">
                      <label>Nama Petani</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" name="namapetani" placeholder="Masukkan Nama Petani" maxlength="30" required onkeypress="return hanyaTulisan(event)">
                    </div>
                    <div class="form-group">
                      <label title="Alamat Tinggal Yang Dekat Dengan Sawah Anda">Alamat Petani</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" name="alamatpetani" placeholder="Masukkan Alamat Tinggal Saat Ini" maxlength="100" required>
                    </div>

                    <div class="form-group">
                      <label>No HP Petani</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" name="nohp" placeholder="Masukkan No hp" maxlength="15" onkeypress="return hanyaAngka(event)" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Komoditas</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <?php
                          $query = "select * from komoditas";
                          $resultkomoditas = mysqli_query($koneksi, $query);
                         // ----------------------------------------
                          echo "<select name='idkomoditas' class='form-control' onchange='changeValue(this.value)' required>";
                          echo "<option value='' selected>=== Pilih Komoditas ===</option>";
                              while($row2=mysqli_fetch_array($resultkomoditas))
                              {
                                  echo "<option value=$row2[0]>$row2[1]</option>";
                              }
                         echo "</select>";
                      ?>
                      <h6>*Hubungi admin jika komoditas tidak tersedia</h6>
                          </div>
                    <div class="form-group">
                      <label>Luas Sawah (ha)</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" name="luassawah" placeholder="Masukkan Luas Sawah" required onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="form-group">
                      <label>Alamat Sawah</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" name="alamatsawah" placeholder="Masukkan Alamat Sawah" maxlength="100" required>
                    </div>
                    <div class="form-group">
                      <label>Desa/Kelurahan</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <?php
                            $query = "select * from desa";
                            $resultDESA = mysqli_query($koneksi, $query);
                           // ----------------------------------------
                            echo "<select name='iddesa' class='form-control' onchange='changeValue(this.value)' required>";
                            echo "<option value='' selected>=== Pilih Desa ===</option>";
                                while($row2=mysqli_fetch_array($resultDESA))
                                {
                                    echo "<option value=$row2[0]>$row2[2]</option>";
                                }
                           echo "</select>";
                       ?>
                       <h6>*Hubungi admin jika Desa/Kel. tidak tersedia</h6>
                    </div>
                    
                    <div class="form-group">
                      <label>Tanggal Tanam</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" id="tgl" name="tgltanam" placeholder="Masukkan tanggal tanam" required>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Panen</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                      <input type="text" class="form-control" id="tgl2" name="tglpanen" placeholder="Masukkan tanggal panen" required>
                    </div>
                     <div class="form-group">
                      <label>Status</label>
                      <!--menginputkan sebuah inputan nim bertipe text-->
                     <?php
                          $query = "select * from status";
                          $resultstatus = mysqli_query($koneksi, $query);
                         // ----------------------------------------
                          echo "<select name='idstatus' class='form-control' onchange='changeValue(this.value)' required>";
                          echo "<option value='' selected>=== Pilih Status Panen ===</option>";
                              while($row2=mysqli_fetch_array($resultstatus))
                              {
                                  echo "<option value=$row2[0]>$row2[1]</option>";
                              }
                         echo "</select>";
                     ?>
                    </div>
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
              <input type="reset" name="reset" class="btn btn-danger" value="Hapus">
            </form>
                <?php }
                } else {
                  ?>
                  
                  <?php
                    require_once "../../controller/koneksi.php";
                    $query = mysqli_query($koneksi, "SELECT petani.KTP as ktp, user.username as username, petani.ID_DESA, desa.NAMA_DESA as desa, petani.ID_KOMODITAS, komoditas.NAMA_KOMODITAS as komoditas, petani.ID_USER, user.USERNAME, petani.ID_STATUS, status.STATUS, petani.NAMA_PETANI, petani.ALAMAT_PETANI, petani.LUAS_SAWAH, petani.ALAMAT_SAWAH, petani.TANAM, petani.PANEN, petani.NO_HP FROM komoditas, desa, petani, user, status WHERE komoditas.ID_KOMODITAS=petani.ID_KOMODITAS AND desa.ID_DESA=petani.ID_DESA AND status.ID_STATUS=petani.ID_STATUS and user.ID_USER=petani.ID_USER  and petani.id_user=$login_session and petani.id_status=2 GROUP BY petani.KTP");
                    $hasilcek=mysqli_fetch_array($query);
                    if($hasilcek!=0) {?>
                      <form method="post" action="../../controller/user/controllerpetani" enctype="multipart/form-data" sdfsdf>
                      <?php
                      $querys = mysqli_query($koneksi, "SELECT petani.KTP as ktp, user.username as username, petani.ID_DESA, desa.NAMA_DESA as desa, petani.ID_KOMODITAS, komoditas.NAMA_KOMODITAS as komoditas, petani.ID_USER, user.USERNAME, petani.ID_STATUS, status.STATUS, petani.NAMA_PETANI, petani.ALAMAT_PETANI, petani.LUAS_SAWAH, petani.ALAMAT_SAWAH, petani.TANAM, petani.PANEN, petani.NO_HP FROM komoditas, desa, petani, user, status WHERE komoditas.ID_KOMODITAS=petani.ID_KOMODITAS AND desa.ID_DESA=petani.ID_DESA AND status.ID_STATUS=petani.ID_STATUS and user.ID_USER=petani.ID_USER  and petani.id_user=$login_session and petani.id_status=2 GROUP BY petani.KTP");
                        while ($datas = mysqli_fetch_array($querys)) {?>
                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="hidden" class="form-control" name="KTP" value="<?php echo $datas['ktp']?>"  required onkeypress="return hanyaAngka(event)" readonly>
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="username" value="<?php echo $datas['username']?>"  required onkeypress="return hanyaAngka(event)" readonly>
                      </div>
                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="hidden" class="form-control" name="namapetani" value="<?php echo $datas['NAMA_PETANI']?>"  required onkeypress="return hanyaTulisan(event)" readonly>
                      </div>
                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="hidden" class="form-control" name="alamatpetani" value="<?php echo $datas['ALAMAT_PETANI']?>"  required readonly>
                      </div>

                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="hidden" class="form-control" name="nohp" value="<?php echo $datas['NO_HP']?>"  required readonly>
                      </div>
                      <div class="form-group">
                        <label>Komoditas</label>
                        <input type="hidden" class="form-control" name="idkomoditas" value="<?php echo $datas['ID_KOMODITAS']?>"  required readonly>
                        <input type="text" class="form-control" value="<?php echo $datas['komoditas']?>"  required readonly>
                        <h6>*Hubungi admin jika komoditas tidak tersedia</h6>
                        </div>
                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="hidden" class="form-control" name="luassawah" value="<?php echo $datas['LUAS_SAWAH']?>"  required onkeypress="return hanyaAngka(event)">
                      </div>
                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="hidden" class="form-control" name="alamatsawah" value="<?php echo $datas['ALAMAT_SAWAH']?>"  required readonly>
                      </div>
                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="hidden" class="form-control" name="iddesa" value="<?php echo $datas['ID_DESA']?>"  required readonly>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Tanam</label>
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="text" class="form-control" id="tgl" name="tgltanam" value="<?php echo $datas['TANAM']?>"  required readonly>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Panen</label>
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="text" class="form-control" id="tgl2" name="tglpanen" value="<?php echo $datas['PANEN']?>"  required>
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                        <input type="hidden" class="form-control" name="idstatus" value="<?php echo $datas['ID_STATUS']?>"  required>
                        <input type="text" class="form-control" value="<?php echo $datas['STATUS']?>"  required readonly>
                      </div>
                
                      <input type="submit" name="ubah" class="btn btn-success" value="Simpan">
                      <input type="reset" name="reset" class="btn btn-danger" value="Hapus">
                    <?php } ?>  
                    </form>
                     <?php } else { ?>
                      <form method="post" action="../../controller/user/controllerpetani" enctype="multipart/form-data">
                   <?php
                    $query1 = mysqli_query($koneksi, "SELECT petani.KTP as ktp, user.username as username, petani.ID_DESA, desa.NAMA_DESA as desa, petani.ID_KOMODITAS, komoditas.NAMA_KOMODITAS as komoditas, petani.ID_USER, user.USERNAME, petani.ID_STATUS, status.STATUS, petani.NAMA_PETANI, petani.ALAMAT_PETANI, petani.LUAS_SAWAH, petani.ALAMAT_SAWAH, petani.TANAM, petani.PANEN, petani.NO_HP FROM komoditas, desa, petani, user, status WHERE komoditas.ID_KOMODITAS=petani.ID_KOMODITAS AND desa.ID_DESA=petani.ID_DESA AND status.ID_STATUS=petani.ID_STATUS and user.ID_USER=petani.ID_USER  and petani.id_user=$login_session and petani.id_status=1 GROUP BY petani.KTP");
                    while ($data = mysqli_fetch_array($query1)) {?>
                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="text" class="form-control" name="KTP" value="<?php echo $data['ktp']?>"  required onkeypress="return hanyaAngka(event)" readonly>
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="username" value="<?php echo $data['username']?>"  required onkeypress="return hanyaAngka(event)" readonly>
                      </div>
                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="hidden" class="form-control" name="namapetani" value="<?php echo $data['NAMA_PETANI']?>"  required onkeypress="return hanyaTulisan(event)" readonly>
                      </div>
                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="hidden" class="form-control" name="alamatpetani" value="<?php echo $data['ALAMAT_PETANI']?>"  required readonly>
                      </div>

                      <div class="form-group">
                        <label>No HP Petani</label>
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="text" class="form-control" name="nohp" value="<?php echo $data['NO_HP']?>" maxlength="15" onkeypress="return hanyaAngka(event)" required>
                      </div>
                      <div class="form-group">
                        <label>Komoditas</label>
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <?php
                                    require_once "../../controller/admin/koneksi.php";
                                    $query = "select * from komoditas";
                                    $resultkomoditas = mysqli_query($koneksi, $query);
                                   // ----------------------------------------
                                    echo "<select name='idkomoditas' class='form-control' onchange='changeValue(this.value)' required>";
                                    echo "<option value='' selected>=== Pilih Komoditas ===</option>";
                                        while($row2=mysqli_fetch_array($resultkomoditas))
                                        {
                                            echo "<option value=$row2[0]>$row2[1]</option>";
                                        }
                                   echo "</select>";
                               ?>
                          <h6>*Hubungi admin jika komoditas tidak tersedia</h6>
                            </div>
                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="hidden" class="form-control" name="luassawah" value="<?php echo $data['LUAS_SAWAH']?>"  required onkeypress="return hanyaAngka(event)">
                      </div>
                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="hidden" class="form-control" name="alamatsawah" value="<?php echo $data['ALAMAT_SAWAH']?>"  required readonly>
                      </div>
                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="hidden" class="form-control" name="iddesa" value="<?php echo $data['ID_DESA']?>"  required readonly>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Tanam</label>
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="text" class="form-control" id="tgl" name="tgltanam" value="<?php echo $data['TANAM']?>"  required>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Panen</label>
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="text" class="form-control" id="tgl2" name="tglpanen" value="<?php echo $data['PANEN']?>"  required>
                      </div>
                      <div class="form-group">
                        <!--menginputkan sebuah inputan nim bertipe text-->
                        <input type="hidden" name="idstatus" value="2">
                        
                      </div>
                
                      <input type="submit" name="ubah" class="btn btn-success" value="Simpan">
                      <input type="reset" name="reset" class="btn btn-danger" value="Hapus">
                    <?php } ?>
                  </form>
                    <?php
                }
              } ?>
        </div>
    </section>
    <br><br>
    </div>
  <!-- /.content-wrapper -->
  <?php
        include "../_partials/footer.php";
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
    include "../_partials/js.php";
?>
</body>
</html>
