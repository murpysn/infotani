<!DOCTYPE html>
<html>
<?php
    require_once "../../controller/koneksi.php";
        include "../_partials/head.php";
        date_default_timezone_set('Asia/Jakarta');
        $tgll = date("Y-m-d");
        $tahun = date("Y");
?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!--header-->
    <?php
        include "../_partials/headerusaha.php";
    ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php
        include "../_partials/sidebarusaha.php";
    ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Beranda
        <small>InfoTani</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Beranda</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12">
         <?php
         $cekdata = "SELECT * FROM perusahaan WHERE perusahaan.ID_PERUSAHAAN='$id_pengguna' AND perusahaan.NAMA_PERUSAHAAN=''";
            $querydata = mysqli_query($koneksi, $cekdata);
            $hasilcekdata=mysqli_fetch_array($querydata);
            if($hasilcekdata!=null) {
                ?>
                  <script language="JavaScript">
                  alert('Lengkapi Data !');
                  setTimeout(function() {window.location.href='./tambahdata'},10);
                  </script>
                <?php
            }
        include "../../controller/admin/koneksi.php";
            $query1 = "SELECT count(*) FROM pemesanan WHERE id_perusahaan= $id_pengguna AND month(TANGGAL) = 01 and year(TANGGAL) = $tahun";
            $sql1 = mysqli_query($koneksi, $query1);
            while ($data1 = mysqli_fetch_row($sql1)) {
                $id1 = $data1[0];
            }

            $query2 = "SELECT count(*) FROM pemesanan WHERE id_perusahaan = $id_pengguna AND month(TANGGAL) = 02 and year(TANGGAL) = $tahun";
            $sql2 = mysqli_query($koneksi, $query2);
            while ($data2 = mysqli_fetch_row($sql2)) {
                $id2 = $data2[0];
            }

            $query3 = "SELECT count(*) FROM pemesanan WHERE id_perusahaan = $id_pengguna AND month(TANGGAL) = 03 and year(TANGGAL) = $tahun";
            $sql3 = mysqli_query($koneksi, $query3);
            while ($data3 = mysqli_fetch_row($sql3)) {
                $id3 = $data3[0];
            }

            $query4 = "SELECT count(*) FROM pemesanan WHERE id_perusahaan = $id_pengguna AND month(TANGGAL) = 04 and year(TANGGAL) = $tahun";
            $sql4 = mysqli_query($koneksi, $query4);
            while ($data4 = mysqli_fetch_row($sql4)) {
                $id4 = $data4[0];
            }

            $query5 = "SELECT count(*) FROM pemesanan WHERE id_perusahaan = $id_pengguna AND month(TANGGAL) = 05 and year(TANGGAL) = $tahun";
            $sql5 = mysqli_query($koneksi, $query5);
            while ($data5 = mysqli_fetch_row($sql5)) {
                $id5 = $data5[0];
            }

            $query6 = "SELECT count(*) FROM pemesanan WHERE id_perusahaan = $id_pengguna AND month(TANGGAL) = 06 and year(TANGGAL) = $tahun";
            $sql6 = mysqli_query($koneksi, $query6);
            while ($data6 = mysqli_fetch_row($sql6)) {
                $id6 = $data6[0];
            }

            $query7 = "SELECT count(*) FROM pemesanan WHERE id_perusahaan = $id_pengguna AND month(TANGGAL) = 07 and year(TANGGAL) = $tahun";
            $sql7 = mysqli_query($koneksi, $query7);
            while ($data7 = mysqli_fetch_row($sql7)) {
                $id7 = $data7[0];
            }

            $query8 = "SELECT count(*) FROM pemesanan WHERE id_perusahaan = $id_pengguna AND month(TANGGAL) = 08 and year(TANGGAL) = $tahun";
            $sql8 = mysqli_query($koneksi, $query8);
            while ($data8 = mysqli_fetch_row($sql8)) {
                $id8 = $data8[0];
            }

            $query9 = "SELECT count(*) FROM pemesanan WHERE id_perusahaan = $id_pengguna AND month(TANGGAL) = 09 and year(TANGGAL) = $tahun";
            $sql9 = mysqli_query($koneksi, $query9);
            while ($data9 = mysqli_fetch_row($sql9)) {
                $id9 = $data9[0];
            }

            $query10 = "SELECT count(*) FROM pemesanan WHERE id_perusahaan = $id_pengguna AND month(TANGGAL) = 10 and year(TANGGAL) = $tahun";
            $sql10 = mysqli_query($koneksi, $query10);
            while ($data10 = mysqli_fetch_row($sql10)) {
                $id10 = $data10[0];
            }

            $query11 = "SELECT count(*) FROM pemesanan WHERE id_perusahaan = $id_pengguna AND month(TANGGAL) = 11 and year(TANGGAL) = $tahun";
            $sql11 = mysqli_query($koneksi, $query11);
            while ($data11 = mysqli_fetch_row($sql11)) {
                $id11 = $data11[0];
            }

            $query12 = "SELECT count(*) FROM pemesanan WHERE id_perusahaan = $id_pengguna AND month(TANGGAL) = 12 and year(TANGGAL) = $tahun";
            $sql12 = mysqli_query($koneksi, $query12);
            while ($data12 = mysqli_fetch_row($sql12)) {
                $id12 = $data12[0];
            }



            ?><!DOCTYPE HTML>
            <html>
            <head>
                 <script type="text/javascript">
                      window.onload = function () {
                           var chart = new CanvasJS.Chart("chartContainer", {
                                title: {
                                     text: "Laporan Pemesanan <?php echo $tahun;?>"
                                },
                                legend: {
                                     cursor: "pointer",
                                     itemclick: function (e) {
                                          if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                                               e.dataSeries.visible = false;
                                          } else {
                                               e.dataSeries.visible = true;
                                          }

                                          e.chart.render();
                                     }
                                },
                                data: [{
                                     showInLegend: true,
                                     type: "line",
                                     name:"Pemesanan",
                                     dataPoints: [
                                          { x: new Date(<?php echo $tahun;?>, 0, 1), y: <?php echo $id1;?> },
                                          { x: new Date(<?php echo $tahun;?>, 1, 1), y: <?php echo $id2;?> },
                                          { x: new Date(<?php echo $tahun;?>, 2, 1), y: <?php echo $id3;?> },
                                          { x: new Date(<?php echo $tahun;?>, 3, 1), y: <?php echo $id4;?> },
                                          { x: new Date(<?php echo $tahun;?>, 4, 1), y: <?php echo $id5;?> },
                                          { x: new Date(<?php echo $tahun;?>, 5, 1), y: <?php echo $id6;?> },
                                          { x: new Date(<?php echo $tahun;?>, 6, 1), y: <?php echo $id7;?> },
                                          { x: new Date(<?php echo $tahun;?>, 7, 1), y: <?php echo $id8;?> },
                                          { x: new Date(<?php echo $tahun;?>, 8, 1), y: <?php echo $id9;?> },
                                          { x: new Date(<?php echo $tahun;?>, 9, 1), y: <?php echo $id10;?> },
                                          { x: new Date(<?php echo $tahun;?>, 10, 1), y: <?php echo $id11;?> },
                                          { x: new Date(<?php echo $tahun;?>, 11, 1), y: <?php echo $id12;?> }
                                     ]
                                }/*, {
                                     showInLegend: true,
                                     type: "line",
                                     name:"Jagung",
                                     dataPoints: [
                                          { x: new Date(<?php //echo $tahun;?>, 0, 1), y: <?php //echo $idl1;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 1, 1), y: <?php //echo $idl2;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 2, 1), y: <?php //echo $idl3;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 3, 1), y: <?php //echo $idl4;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 4, 1), y: <?php //echo $idl5;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 5, 1), y: <?php //echo $idl6;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 6, 1), y: <?php //echo $idl7;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 7, 1), y: <?php //echo $idl8;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 8, 1), y: <?php //echo $idl9;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 9, 1), y: <?php //echo $idl10;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 10, 1), y: <?php// echo $idl11;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 11, 1), y: <?php// echo $idl12;?> }
                                     ]
                                }/*, {
                                     showInLegend: true,
                                     type: "line",
                                     name:"Laporan Pembayaran",
                                     dataPoints: [
                                          { x: new Date(<?php //echo $tahun;?>, 0, 1), y: <?php //echo $idll1;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 1, 1), y: <?php //echo $idll2;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 2, 1), y: <?php //echo $idll3;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 3, 1), y: <?php //echo $idll4;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 4, 1), y: <?php //echo $idll5;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 5, 1), y: <?php //echo $idll6;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 6, 1), y: <?php //echo $idll7;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 7, 1), y: <?php //echo $idll8;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 8, 1), y: <?php //echo $idll9;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 9, 1), y: <?php //echo $idll10;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 10, 1), y: <?php //echo $idll11;?> },
                                          { x: new Date(<?php //echo $tahun;?>, 11, 1), y: <?php //echo $idll12;?> }
                                     ]
                                }*/]
                           });

                           chart.render();
                      }
                 </script>
                 <script src="../../chart/canvasjs.min.js"></script>
                 <title>CanvasJS Example</title>
            </head>
            <body>
                 <div id="chartContainer" style="height: 400px; width: 100%;">

                 </div>

            </body>
            </html>
        </div>
    </section>
    <!-- /.content -->
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
<?php //} ?>
