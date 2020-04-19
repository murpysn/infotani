<?php
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
    include "./_partials/head.php";
?>
<head>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <!--manual CSS-->
    <link rel="stylesheet" href="./css/tentangkami.css">
    <link rel="stylesheet" href="./css/cariHasil.css">
    

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <?php
        require_once "./_partials/header.php";
    ?>


    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area section-padding-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Pencarian</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index"><i class="icon_house_alt"></i>Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cari</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    
    <?php
if(isset($_POST['submitcari'])||isset($_POST['submitcariHasil'])):
    $_SESSION['pos']=$_POST;
elseif(isset($_POST['filter'])):
    $_SESSION['posF']=$_POST;
endif;
if (isset($_SESSION['pos'])):
    $cari =$_SESSION['pos']['cari'];
elseif(isset($_SESSION['posF'])):
    if (isset($_POST['komoditas'])):
        $komoditas = $_SESSION['posF']['komoditas'];
    endif;
    if (isset($_REQUEST['kecamatan'])):
        $kecamatan = $_SESSION['posF']['kecamatan'];
        //foreach ($_SESSION['posF']['kecamatan'] as $kecamatan){     
          //   $camat[] = mysqli_real_escape_string ($koneksi, $kecamatan);
        //}
    endif;
    if (isset($_POST['tglpanen'])):
        $tglpanen= $_SESSION['posF']['tglpanen'];
    endif;
else:
    $cari="";
    $komoditas ="";
    $tglpanen = "";
    $kecamatan = "";
endif;
?>


<div id="flipkart-navbar" class="navbar navbar-top">
    <div class="container">
        <div class="row row1">
            <ul class="largenav pull-right">


            </ul>
        </div>
        <div class="row row2">
            <div class="col-sm-2">
                <h2 style="margin:0px;"><a class="nav menu" href="index" style="text-decoration:none;color:black;"></a></h2>
                <!--<h1 style="margin:0px;"><span class="nav-brand" href="index.php"><h3>INFO TANI</h3></span></h1>-->
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                <div class="row">

                  <form role="search" action="cariHasil" method="post">
                  <?php 
                  if(isset($_POST['submitcari'])||isset($_SESSION['pos']['cari'])){
                      if(isset($_POST['cari'])){
                      $cari=$_POST['cari'];
                      }else{
                          $cari=$_SESSION['pos']['cari'];
                      }
                ?>
                    <input class="flipkart-navbar-input col-xs-11 cari" type="text" id="cari" name="cari" placeholder="Cari Data..." value="<?php echo $cari;?>">
                <?php
                }else{?>
               <input class="flipkart-navbar-input col-xs-11 cari" type="text" id="cari" name="cari" placeholder="Cari Data..." value="">
                <?php
               }
                ?>
                  
                  <button class="flipkart-navbar-button col-xs-1" id="btnsearch" name="submitcariHasil" onclick="" >
                        <svg width="15px" height="15px">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868
                            11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0
                            2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895
                            6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg>
                    </button>  
                </div>
            </div> 
            </div>                
        </div>
    </div>
</div>

<div class="fluid-container">
    <div class="left-sidebar col">
    <h3><span class="fa fa-filter"> Filters </span></h3>
        <details class="navigasi" open>
            <summary><h4>Komoditas</h4></summary>
            <?php 
                 require_once "../../controller/admin/koneksi.php";
                $sql=mysqli_query($koneksi, "SELECT * FROM komoditas");
                while ($data=mysqli_fetch_array($sql)) {
                ?>
                <h5>
                <input type="radio" name="komoditas" value="<?=$data['ID_KOMODITAS']?>">
                <?=$data['NAMA_KOMODITAS']?>
                </h5>
                <?php
                }
                ?>   
        </details>
        
        <details class="navigasi" open>
            <summary><h4>Kecamatan</h4></summary>   
                <?php 
                 require_once "../../controller/admin/koneksi.php";
                $sql=mysqli_query($koneksi, "SELECT * FROM kecamatan");
                while ($data=mysqli_fetch_array($sql)) {
                ?>
                <h5>
                <input type="checkbox" name="kecamatan[]" value="<?=$data['ID_KECAMATAN']?>">
                <?=$data['NAMA_KECAMATAN']?>
                </h5>
                <?php
                }
                ?>
        </details>
           <h4 id="bulanPanen">Bulan Panen</h4>
           <select name="tglpanen">
            <option selected="selected" disabled>==Pilih Bulan==</option>
            <?php
            $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            $jlh_bln=count($bulan);
            for($c=0; $c<$jlh_bln; $c+=1){
                $vbln=$c+1;
                echo"<option value=$vbln> $bulan[$c] </option>";
            }
            ?>
            </select>
            <br/><br/>
                <!--<button type="submit" class="btn btn-success" name="filter" value="Filter">Cari Filter</button>-->
                <button type="submit" class="btn btn-success" name="filter" value="Filter">Filter</button>    
            <br/><br/>
                <button class="btn btn-warning" name="reset" title="Klik 2X">Reset</button>  
                    
            
            <?php if(isset($_POST['reset'])){
                        
                unset($_SESSION['posF']['komoditas']);
                unset($_SESSION['posF']['kecamatan']);
                unset($_SESSION['posF']['tglpanen']);
             }?>
</div>
<div class="container">
<div class ="content">
<div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">NO.</th>
                  <th class="text-center">KOMODITAS</th>
                  <th class="text-center">TGL PANEN</th>
                  <th class="text-center">NAMA PETANI</th>
                  <th class="text-center">ALAMAT</th>
                  <th class="text-center">NO HP</th>
                  <th class="text-center">HASIL PANEN (KG)</th>
                  <th class="text-center">PESAN</th>
                  
                </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../../controller/admin/koneksi.php";
                    //query untuk menampilkan data table dari tb_siswa
                    $halaman = 10;
                     $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                     $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                    
                    //query view data berdasar filter
             
            if(isset($_POST['filter'])||isset($_SESSION['posF']['komoditas'])
                                    ||isset($_SESSION['posF']['kecamatan'])
                                    ||isset($_SESSION['posF']['tglpanen'])) {
                if(!empty($_SESSION['pos']['cari'])){
                    $cari = $_SESSION['pos']['cari'];
                }
                else{
                    $cari = "";
                }
                if(!empty($_POST['komoditas'])&&!empty($_POST['kecamatan'])&&!empty($_POST['tglpanen'])
                ||!empty($_SESSION['posF']['komoditas'])&&!empty($_SESSION['posF']['kecamatan'])&&!empty($_SESSION['posF']['tglpanen'])){
                    if(isset($_POST['filter'])){
                        $komoditas = $_POST['komoditas'];
                    $kecamatan = $_REQUEST['kecamatan'];
                    $tglpanen= $_POST['tglpanen']; 
                    //$jmlLoop = count($kecamatan);
                    foreach ($_REQUEST['kecamatan'] as $kecamatan){
                        $statearray[] = mysqli_real_escape_string ($koneksi, $kecamatan);
                    }
                    }else{
                        $komoditas = $_SESSION['posF']['komoditas'];
                        $kecamatan = $_SESSION['posF']['kecamatan'];
                        foreach ($_SESSION['posF']['kecamatan'] as $camat){
                            $statearray[] = mysqli_real_escape_string ($koneksi, $camat);
                        }
                        $tglpanen = $_SESSION['posF']['tglpanen'];
                    }
                    $states = implode("','", $statearray);
                    $query = mysqli_query($koneksi, "SELECT * FROM panen
                    INNER JOIN petani on petani.KTP = panen.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                    WHERE (petani.NAMA_PETANI like '%".$cari."%'
                        OR petani.ALAMAT_PETANI like '%".$cari."%'
                        OR petani.NO_HP like '%".$cari."%'
                        OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                        OR petani.LUAS_SAWAH like '%".$cari."%'
                        OR petani.ALAMAT_SAWAH like '%".$cari."%'
                        OR desa.NAMA_DESA like '%".$cari."%'
                        )
                    AND (panen.HASIL != 0)
                    AND (panen.KOMODITAS = $komoditas)
                    AND (kecamatan.ID_KECAMATAN IN ('$states'))
                    AND (month(panen.TGL_PANEN) = '".$tglpanen."')
                    ");

                    $query_tampil = mysqli_query($koneksi, "SELECT * FROM panen
                    INNER JOIN petani on petani.KTP = panen.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                    WHERE (petani.NAMA_PETANI like '%".$cari."%'
                        OR petani.ALAMAT_PETANI like '%".$cari."%'
                        OR petani.NO_HP like '%".$cari."%'
                        OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                        OR petani.LUAS_SAWAH like '%".$cari."%'
                        OR petani.ALAMAT_SAWAH like '%".$cari."%'
                        OR desa.NAMA_DESA like '%".$cari."%'
                        )
                        AND (panen.HASIL != 0)
                    AND (panen.KOMODITAS = $komoditas)
                    AND (kecamatan.ID_KECAMATAN IN ('$states'))
                    AND (month(panen.TGL_PANEN) = '".$tglpanen."')
                    ORDER BY panen.TGL_PANEN
                    LIMIT $mulai, $halaman
                    ");
                   
                }elseif(!empty($_POST['komoditas'])&&!empty($_POST['kecamatan'])&&empty($_POST['tglpanen'])
                ||!empty($_SESSION['posF']['komoditas'])&&!empty($_SESSION['posF']['kecamatan'])&&empty($_SESSION['posF']['tglpanen'])){
                    
                    if(isset($_POST['filter'])){
                        $komoditas = $_POST['komoditas'];
                    $kecamatan = $_REQUEST['kecamatan']; 
                    //$jmlLoop = count($kecamatan);
                    foreach ($_REQUEST['kecamatan'] as $kecamatan){
                        $statearray[] = mysqli_real_escape_string ($koneksi, $kecamatan);
                    }
                    }else{
                        $komoditas = $_SESSION['posF']['komoditas'];
                        $kecamatan = $_SESSION['posF']['kecamatan'];
                        foreach ($_SESSION['posF']['kecamatan'] as $camat){
                            $statearray[] = mysqli_real_escape_string ($koneksi, $camat);
                        }
                    }
                    $states = implode("','", $statearray);
                    $query = mysqli_query($koneksi, "SELECT * FROM panen
                    INNER JOIN petani on petani.KTP = panen.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                    WHERE (petani.NAMA_PETANI like '%".$cari."%'
                        OR petani.ALAMAT_PETANI like '%".$cari."%'
                        OR petani.NO_HP like '%".$cari."%'
                        OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                        OR petani.LUAS_SAWAH like '%".$cari."%'
                        OR petani.ALAMAT_SAWAH like '%".$cari."%'
                        OR desa.NAMA_DESA like '%".$cari."%'
                        )
                        AND (panen.HASIL != 0)
                    AND (panen.KOMODITAS = $komoditas)
                    AND (kecamatan.ID_KECAMATAN IN ('$states'))
                    ");

                   $query_tampil = mysqli_query($koneksi, "SELECT * FROM panen
                   INNER JOIN petani on petani.KTP = panen.KTP
                   INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                   INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                   WHERE (petani.NAMA_PETANI like '%".$cari."%'
                       OR petani.ALAMAT_PETANI like '%".$cari."%'
                       OR petani.NO_HP like '%".$cari."%'
                       OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                       OR petani.LUAS_SAWAH like '%".$cari."%'
                       OR petani.ALAMAT_SAWAH like '%".$cari."%'
                       OR desa.NAMA_DESA like '%".$cari."%'
                       )
                       AND (panen.HASIL != 0)
                   AND (panen.KOMODITAS = $komoditas)
                   AND (kecamatan.ID_KECAMATAN IN ('$states'))
                   ORDER BY panen.TGL_PANEN
                   LIMIT $mulai, $halaman
                   ");
                }elseif(!empty($_POST['komoditas'])&&!empty($_POST['tglpanen'])&&empty($_POST['kecamatan'])){
                    if(isset($_POST['filter'])){
                        $komoditas = $_POST['komoditas'];
                    $tglpanen= $_POST['tglpanen']; 
                    }else{
                        $komoditas = $_SESSION['posF']['komoditas'];
                        $tglpanen = $_SESSION['posF']['tglpanen'];
                    }
                    
                    $query = mysqli_query($koneksi, "SELECT * FROM panen
                    INNER JOIN petani on petani.KTP = panen.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                WHERE (petani.NAMA_PETANI like '%".$cari."%'
                    OR petani.ALAMAT_PETANI like '%".$cari."%'
                    OR petani.NO_HP like '%".$cari."%'
                    OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                    OR petani.LUAS_SAWAH like '%".$cari."%'
                    OR petani.ALAMAT_SAWAH like '%".$cari."%'
                    OR desa.NAMA_DESA like '%".$cari."%'
                    )

                    AND (panen.HASIL != 0)
                AND (panen.KOMODITAS = $komoditas)
                AND (month(panen.TGL_PANEN) = '".$tglpanen."')
               
                ");

                 $query_tampil = mysqli_query($koneksi, "SELECT * FROM panen
                 INNER JOIN petani on petani.KTP = panen.KTP
                 INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                 INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                 WHERE (petani.NAMA_PETANI like '%".$cari."%'
                     OR petani.ALAMAT_PETANI like '%".$cari."%'
                     OR petani.NO_HP like '%".$cari."%'
                     OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                     OR petani.LUAS_SAWAH like '%".$cari."%'
                     OR petani.ALAMAT_SAWAH like '%".$cari."%'
                     OR desa.NAMA_DESA like '%".$cari."%'
                     )
 
                     AND (panen.HASIL != 0)
                 AND (panen.KOMODITAS = $komoditas)
                 AND (month(panen.TGL_PANEN) = '".$tglpanen."')
                 ORDER BY panen.TGL_PANEN
                 limit $mulai, $halaman
                 ");
                }elseif(!empty($_POST['kecamatan'])&&!empty($_POST['tglpanen'])&&empty($_POST['komoditas'])){
                    if(isset($_POST['filter'])){
                    $kecamatan = $_REQUEST['kecamatan'];
                    $tglpanen= $_POST['tglpanen']; 
                    //$jmlLoop = count($kecamatan);
                    foreach ($_REQUEST['kecamatan'] as $kecamatan){
                        $statearray[] = mysqli_real_escape_string ($koneksi, $kecamatan);
                    }
                    }else{
                        $kecamatan = $_SESSION['posF']['kecamatan'];
                        foreach ($_SESSION['posF']['kecamatan'] as $camat){
                            $statearray[] = mysqli_real_escape_string ($koneksi, $camat);
                        }
                        $tglpanen = $_SESSION['posF']['tglpanen'];
                    }
                    $states = implode("','", $statearray);
                    $query = mysqli_query($koneksi, "SELECT * FROM panen
                    INNER JOIN petani on petani.KTP = panen.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                    WHERE (petani.NAMA_PETANI like '%".$cari."%'
                        OR petani.ALAMAT_PETANI like '%".$cari."%'
                        OR petani.NO_HP like '%".$cari."%'
                        OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                        OR petani.LUAS_SAWAH like '%".$cari."%'
                        OR petani.ALAMAT_SAWAH like '%".$cari."%'
                        OR desa.NAMA_DESA like '%".$cari."%'
                        )
                        AND (panen.HASIL != 0)
                    AND (kecamatan.ID_KECAMATAN IN ('$states'))
                    AND (month(panen.TGL_PANEN) = '".$tglpanen."')
                    ");

                    $query_tampil = mysqli_query($koneksi, "SELECT * FROM panen
                    INNER JOIN petani on petani.KTP = panen.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                    WHERE (petani.NAMA_PETANI like '%".$cari."%'
                        OR petani.ALAMAT_PETANI like '%".$cari."%'
                        OR petani.NO_HP like '%".$cari."%'
                        OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                        OR petani.LUAS_SAWAH like '%".$cari."%'
                        OR petani.ALAMAT_SAWAH like '%".$cari."%'
                        OR desa.NAMA_DESA like '%".$cari."%'
                        )
                        AND (panen.HASIL != 0)
                    AND (kecamatan.ID_KECAMATAN IN ('$states'))
                    AND (month(panen.TGL_PANEN) = '".$tglpanen."')
                    ORDER BY panen.TGL_PANEN
                LIMIT $mulai, $halaman
                    ");
                   
                }
                elseif(!empty($_POST['komoditas'])&&empty($_POST['kecamatan'])&&empty($_POST['tglpanen'])
                    ||!empty($_SESSION['posF']['komoditas'])&&empty($_SESION['posF']['kecamatan'])&&empty($_SESSION['posF']['tglpanen'])){
                    if(isset($_POST['filter'])){
                        $komoditas = $_POST['komoditas'];
                    }else{
                        $komoditas = $_SESSION['posF']['komoditas'];
                    }
                
                $query = mysqli_query($koneksi, "SELECT * FROM panen
                INNER JOIN petani on petani.KTP = panen.KTP
                INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                WHERE (petani.NAMA_PETANI like '%".$cari."%'
                    OR petani.ALAMAT_PETANI like '%".$cari."%'
                    OR petani.NO_HP like '%".$cari."%'
                    OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                    OR petani.LUAS_SAWAH like '%".$cari."%'
                    OR petani.ALAMAT_SAWAH like '%".$cari."%'
                    OR desa.NAMA_DESA like '%".$cari."%'
                    )

                    AND (panen.HASIL != 0)
                AND (panen.KOMODITAS = $komoditas)
               
                ");

                $query_tampil = mysqli_query($koneksi, "SELECT * FROM panen
                INNER JOIN petani on petani.KTP = panen.KTP
                INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                WHERE (petani.NAMA_PETANI like '%".$cari."%'
                    OR petani.ALAMAT_PETANI like '%".$cari."%'
                    OR petani.NO_HP like '%".$cari."%'
                    OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                    OR petani.LUAS_SAWAH like '%".$cari."%'
                    OR petani.ALAMAT_SAWAH like '%".$cari."%'
                    OR desa.NAMA_DESA like '%".$cari."%'
                    )

                    AND (panen.HASIL != 0)
                AND (panen.KOMODITAS = $komoditas)
                ORDER BY panen.TGL_PANEN
                LIMIT $mulai, $halaman
                ");
                }elseif(!empty($_POST['kecamatan'])&&empty($_POST['komoditas'])&&empty($_POST['tglpanen'])
                ||!empty($_SESSION['posF']['kecamatan'])&&empty($_SESSION['posF']['komoditas'])&&empty($_SESSION['posF']['tglpanen'])){
                    if(isset($_REQUEST['kecamatan'])){
                        $kecamatan = $_REQUEST['kecamatan'];
                        //$jmlLoop = count($kecamatan);
                        foreach ($_REQUEST['kecamatan'] as $kecamatan){
                            $statearray[] = mysqli_real_escape_string ($koneksi, $kecamatan);
                        }
                    }else{
                        $kecamatan = $_SESSION['posF']['kecamatan'];
                        foreach ($_SESSION['posF']['kecamatan'] as $camat){
                            $statearray[] = mysqli_real_escape_string ($koneksi, $camat);
                        }
                    }   
                    $states = implode("','", $statearray);
                    $query = mysqli_query($koneksi, "SELECT * FROM panen
                    INNER JOIN petani on petani.KTP = panen.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                    WHERE (petani.NAMA_PETANI like '%".$cari."%'
                        OR petani.ALAMAT_PETANI like '%".$cari."%'
                        OR petani.NO_HP like '%".$cari."%'
                        OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                        OR petani.LUAS_SAWAH like '%".$cari."%'
                        OR petani.ALAMAT_SAWAH like '%".$cari."%'
                        OR desa.NAMA_DESA like '%".$cari."%'
                        )
                        AND (panen.HASIL != 0)
                    AND (kecamatan.ID_KECAMATAN IN ('$states'))
                    ");

                    $query_tampil = mysqli_query($koneksi, "SELECT * FROM panen
                    INNER JOIN petani on petani.KTP = panen.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                    WHERE (petani.NAMA_PETANI like '%".$cari."%'
                        OR petani.ALAMAT_PETANI like '%".$cari."%'
                        OR petani.NO_HP like '%".$cari."%'
                        OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                        OR petani.LUAS_SAWAH like '%".$cari."%'
                        OR petani.ALAMAT_SAWAH like '%".$cari."%'
                        OR desa.NAMA_DESA like '%".$cari."%'
                        )
                        AND (panen.HASIL != 0)
                    AND (kecamatan.ID_KECAMATAN IN ('$states'))
                    ORDER BY panen.TGL_PANEN
                    LIMIT $mulai, $halaman
                    ");
                   
                }elseif(!empty($_POST['tglpanen'])&&empty($_POST['komoditas'])&&empty($_POST['kecamatan'])
                ||isset($_SESSION['posF']['tglpanen'])&&empty($_SESSION['posF']['kecamatan'])&&empty($_SESSION['posF']['komoditas'])){
                    if(isset($_POST['tglpanen'])){
                        $tglpanen= $_POST['tglpanen'];
                    }else{
                        $tglpanen = $_SESSION['posF']['tglpanen'];
                    }
                    //$tglpanen1 = date('Y-m-d',strtotime($tglpanen));
                    //echo $tglpanen;
                    
                    
                    $query = mysqli_query($koneksi, "SELECT * FROM panen
                    INNER JOIN petani on petani.KTP = panen.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                WHERE (petani.NAMA_PETANI like '%".$cari."%'
                    OR petani.ALAMAT_PETANI like '%".$cari."%'
                    OR petani.NO_HP like '%".$cari."%'
                    OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                    OR petani.LUAS_SAWAH like '%".$cari."%'
                    OR petani.ALAMAT_SAWAH like '%".$cari."%'
                    OR desa.NAMA_DESA like '%".$cari."%'
                    )

                    AND (panen.HASIL != 0)
                AND (month(panen.TGL_PANEN) = '".$tglpanen."')
               
                ");

                $query_tampil = mysqli_query($koneksi, "SELECT * FROM panen
                INNER JOIN petani on petani.KTP = panen.KTP
                INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                WHERE (petani.NAMA_PETANI like '%".$cari."%'
                    OR petani.ALAMAT_PETANI like '%".$cari."%'
                    OR petani.NO_HP like '%".$cari."%'
                    OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                    OR petani.LUAS_SAWAH like '%".$cari."%'
                    OR petani.ALAMAT_SAWAH like '%".$cari."%'
                    OR desa.NAMA_DESA like '%".$cari."%'
                    )

                    AND (panen.HASIL != 0)
                AND (month(panen.TGL_PANEN) = '".$tglpanen."')
                ORDER BY panen.TGL_PANEN
                LIMIT $mulai, $halaman
                ");
                }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM panen
                    INNER JOIN petani on petani.KTP = panen.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                    WHERE (petani.NAMA_PETANI like '%".$cari."%'
                    OR petani.ALAMAT_PETANI like '%".$cari."%'
                    OR petani.NO_HP like '%".$cari."%'
                    OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                    OR petani.LUAS_SAWAH like '%".$cari."%'
                    OR petani.ALAMAT_SAWAH like '%".$cari."%'
                    OR desa.NAMA_DESA like '%".$cari."%')
                    AND (panen.HASIL != 0)
                    ");
                $query_tampil = mysqli_query($koneksi, "SELECT * FROM panen
                INNER JOIN petani on petani.KTP = panen.KTP
                INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                WHERE (petani.NAMA_PETANI like '%".$cari."%'
                OR petani.ALAMAT_PETANI like '%".$cari."%'
                OR petani.NO_HP like '%".$cari."%'
                OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                OR petani.LUAS_SAWAH like '%".$cari."%'
                OR petani.ALAMAT_SAWAH like '%".$cari."%'
                OR desa.NAMA_DESA like '%".$cari."%')
                AND (panen.HASIL != 0)
                ORDER BY panen.TGL_PANEN
                LIMIT $mulai, $halaman 
                ");
                    //echo "<script>alert('Silahkan Pilih Filters Terlebih Dahulu!');history.back(self);</script>";
                }
                
            }elseif(isset($_POST['submitcari'])||isset($_POST['submitcariHasil'])||isset($_SESSION['pos']['cari'])) {
                if(isset($_POST['submitcariHasil'])){
                    $cari = $_POST['cari'];
                }
                else{
                    $cari = $_SESSION['pos']['cari'];
                }
                $query = mysqli_query($koneksi, "SELECT * FROM panen
                INNER JOIN petani on petani.KTP = panen.KTP
                INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                WHERE (petani.NAMA_PETANI like '%".$cari."%'
                OR petani.ALAMAT_PETANI like '%".$cari."%'
                OR petani.NO_HP like '%".$cari."%'
                OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                OR desa.NAMA_DESA like '%".$cari."%'
                OR panen.HASIL like '%".$cari."%')
                AND (panen.HASIL != 0)
                ORDER BY panen.TGL_PANEN
                   
                    ");
                $query_tampil = mysqli_query($koneksi, "SELECT * FROM panen
                INNER JOIN petani on petani.KTP = panen.KTP
                INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                WHERE (petani.NAMA_PETANI like '%".$cari."%'
                OR petani.ALAMAT_PETANI like '%".$cari."%'
                OR petani.NO_HP like '%".$cari."%'
                OR komoditas.NAMA_KOMODITAS like '%".$cari."%'
                OR desa.NAMA_DESA like '%".$cari."%'
                OR panen.HASIL like '%".$cari."%')
                AND (panen.HASIL != 0)
                ORDER BY panen.TGL_PANEN
                LIMIT $mulai, $halaman 
                ");
                
            }
            else{
                $query = mysqli_query($koneksi, "SELECT * FROM panen
                INNER JOIN petani on petani.KTP = panen.KTP
                INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                    INNER JOIN kecamatan on kecamatan.ID_KECAMATAN = desa.ID_KECAMATAN
                WHERE (panen.HASIL != 0)");
                $query_tampil = mysqli_query($koneksi, "SELECT * FROM panen
                INNER JOIN petani on petani.KTP = panen.KTP
                INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                INNER JOIN desa on desa.ID_DESA = petani.ID_DESA
                WHERE (panen.HASIL != 0)
                LIMIT $mulai, $halaman 
                ");
            }
            
                             
            $total = mysqli_num_rows($query);
            $pages = ceil($total/$halaman);
                    //start no tabel
                    $no = $mulai+1;
                    //echo $query;
                    
                    if ($total != 0){
                    while($data = mysqli_fetch_array($query_tampil)) {  //merubah array dari objek ke array yang biasanya
                    ?>
                    <tr>
                        <!--memangambil data dari tabel dengan mengisikan data di table-->
                        <td><?php echo $no;?></td>
                        <td><?php echo $data ['NAMA_KOMODITAS'];?></td>
                        <td><?php echo DATE_FORMAT(date_create($data ['TGL_PANEN']),'d M Y');?></td>
                        <td><?php echo $data ['NAMA_PETANI'];?></td>
                        <td><?php echo $data ['ALAMAT_PETANI']; echo ", ";
                                echo "Desa/Kel. "; echo $data ['NAMA_DESA']; 
                                echo", Kec. "; echo $data ['NAMA_KECAMATAN'];
                            ?></td>
                        <td><?php echo $data ['NO_HP'];?></td>
                        <td class="uang text-right"><?php echo $data ['HASIL'];?></td>
                    </form>
                    <td class="text-center"><a href="../pengusaha/pemesanan?id=<?php echo $data['ID_PANEN'];?>&tgl=<?php echo $data['TGL_PANEN'];?>"><button class="pilih btn btn-primary btn-xs">Pesan</button></a></td>
                    </tr>
                    <?php
                    $no++;
                    } }else{?>
                        <td><?php echo "Tidak Ada Data";?></td>
                    <?php } ?>
                    </tbody>
                    </table>
<ul class="pagination pagination-sm" style="margin:0">
  <?php 
  if (isset($_SESSION['pos']['cari'])){
      $cari = $_SESSION['pos']['cari'];
  }else{
      $cari = "";
  }
  if(isset($_SESSION['posF']['komoditas'])||isset($_SESSION['posF']['kecamatan'])||isset($_SESSION['posF']['tglpanen'])){
      $tf="true";
  }else{
      $tf="false";
  }
    for ($i=1; $i<=$pages ; $i++){
        echo "<li><a href='?cari=$cari&filter=$tf&halaman=$i'>$i</a></li>";
   } ?>
</ul>


</div>
                </div>

  </div>
 </div>
 </section>
    <!-- Our Expert Area End -->

<!-- Footer Area Start -->
<?php
        require_once "./_partials/footer.php";
    ?>
    <!-- Footer Area End -->
    
    <!-- All JS Files -->
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="js/akame.bundle.js"></script>
    <!-- Active -->
    <script src="js/default-assets/active.js"></script>

  <script src="../../assets/js/jquery.mask.min.js"></script>
   <script type="text/javascript">          
     $(document).ready(function(){
             // Format mata uang.
     $( '.uang' ).mask('000.000.000', {reverse: true});
    })
    </script>
</body>

</html>