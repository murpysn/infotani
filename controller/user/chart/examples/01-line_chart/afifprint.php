<?php 
include "conn.php";
date_default_timezone_set('Asia/Jakarta');

        $month = date ("Y");
        $bulan = date("m");


//==========================================================================
//pemeriksaan
          $query1 = "SELECT count(*) FROM detail_pemeriksaan1 WHERE year(TGL_DAFTAR) = $month";
          $sql1 = mysqli_query($koneksi,$query1);
          while($data1 = mysqli_fetch_row($sql1)){
          $id1 = $data1[0];}

          $query2 = "SELECT count(*) FROM detail_pemeriksaan2  WHERE year(TGL_DAFTAR) = $month";
          $sql2 = mysqli_query($koneksi,$query2);
          while($data2 = mysqli_fetch_row($sql2)){
          $id2 = $data2[0];}

          $query3 = "SELECT count(*) FROM detail_pemeriksaan3 WHERE year(TGL_DAFTAR) = $month";
          $sql3 = mysqli_query($koneksi,$query3);
          while($data3 = mysqli_fetch_row($sql3)){
          $id3 = $data3[0];}

          $query4 = "SELECT count(*) FROM detail_pemeriksaan4 WHERE year(TGL_DAFTAR) = $month";
          $sql4 = mysqli_query($koneksi,$query4);
          while($data4 = mysqli_fetch_row($sql4)){
          $id4 = $data4[0];}

          $query5 = "SELECT count(*) FROM detail_pemeriksaan5 WHERE year(TGL_DAFTAR) = $month";
          $sql5 = mysqli_query($koneksi,$query5);
          while($data5 = mysqli_fetch_row($sql5)){
          $id5 = $data5[0];}

          $query6 = "SELECT count(*) FROM detail_pemeriksaan6 WHERE year(TGL_DAFTAR) = $month";
          $sql6 = mysqli_query($koneksi,$query6);
          while($data6 = mysqli_fetch_row($sql6)){
          $id6 = $data6[0];}

          $query7 = "SELECT count(*) FROM detail_pemeriksaan7 WHERE year(TGL_DAFTAR) = $month";
          $sql7 = mysqli_query($koneksi,$query7);
          while($data7 = mysqli_fetch_row($sql7)){
          $id7 = $data7[0];}

          $query8 = "SELECT count(*) FROM detail_pemeriksaan8 WHERE year(TGL_DAFTAR) = $month";
          $sql8 = mysqli_query($koneksi,$query8);
          while($data8 = mysqli_fetch_row($sql8)){
          $id8 = $data8[0];}

          $query9 = "SELECT count(*) FROM detail_pemeriksaan9 WHERE year(TGL_DAFTAR) = $month";
          $sql9 = mysqli_query($koneksi,$query9);
          while($data9 = mysqli_fetch_row($sql9)){
          $id9 = $data9[0];}

          $query10 = "SELECT count(*) FROM detail_pemeriksaan10 WHERE year(TGL_DAFTAR) = $month";
          $sql10 = mysqli_query($koneksi,$query10);
          while($data10 = mysqli_fetch_row($sql10)){
          $id10 = $data10[0];}

          $query11 = "SELECT count(*) FROM detail_pemeriksaan11 WHERE year(TGL_DAFTAR) = $month";
          $sql11 = mysqli_query($koneksi,$query11);
          while($data11 = mysqli_fetch_row($sql11)){
          $id11 = $data11[0];}

          $query12 = "SELECT count(*) FROM detail_pemeriksaan12 WHERE year(TGL_DAFTAR) = $month";
          $sql12 = mysqli_query($koneksi,$query12);
          while($data12 = mysqli_fetch_row($sql12)){
          $id12 = $data12[0];}


//===========================================================================//
//detail pendaftaran tiap bulan
          $queryy1 = "SELECT count(*) FROM detail_pendaftaran1 WHERE year(TGL_DAFTAR) = $month";
          $sqll1 = mysqli_query($koneksi,$queryy1);
          while($dataa1 = mysqli_fetch_row($sqll1)){
          $idl1 = $dataa1[0];}

          $queryy2 = "SELECT count(*) FROM detail_pendaftaran2 WHERE year(TGL_DAFTAR) = $month";
          $sqll2 = mysqli_query($koneksi,$queryy2);
          while($dataa2 = mysqli_fetch_row($sqll2)){
          $idl2 = $dataa2[0];}

          $queryy3 = "SELECT count(*) FROM detail_pendaftaran3 WHERE year(TGL_DAFTAR) = $month";
          $sqll3 = mysqli_query($koneksi,$queryy3);
          while($dataa3= mysqli_fetch_row($sqll3)){
          $idl3 = $dataa3[0];}

          $queryy4 = "SELECT count(*) FROM detail_pendaftaran4 WHERE year(TGL_DAFTAR) = $month";
          $sqll4 = mysqli_query($koneksi,$queryy4);
          while($dataa4 = mysqli_fetch_row($sqll4)){
          $idl4 = $dataa4[0];}

          $queryy5 = "SELECT count(*) FROM detail_pendaftaran5 WHERE year(TGL_DAFTAR) = $month";
          $sqll5 = mysqli_query($koneksi,$queryy5);
          while($dataa5 = mysqli_fetch_row($sqll5)){
          $idl5 = $dataa5[0];}

          $queryy6 = "SELECT count(*) FROM detail_pendaftaran6 WHERE year(TGL_DAFTAR) = $month";
          $sqll6 = mysqli_query($koneksi,$queryy6);
          while($dataa6 = mysqli_fetch_row($sqll6)){
          $idl6 = $dataa6[0];}

          $queryy7 = "SELECT count(*) FROM detail_pendaftaran7 WHERE year(TGL_DAFTAR) = $month";
          $sqll7 = mysqli_query($koneksi,$queryy7);
          while($dataa7 = mysqli_fetch_row($sqll7)){
          $idl7 = $dataa7[0];}

          $queryy8 = "SELECT count(*) FROM detail_pendaftaran8 WHERE year(TGL_DAFTAR) = $month";
          $sqll8 = mysqli_query($koneksi,$queryy8);
          while($dataa8 = mysqli_fetch_row($sqll8)){
          $idl8 = $dataa8[0];}

          $queryy9 = "SELECT count(*) FROM detail_pendaftaran9 WHERE year(TGL_DAFTAR) = $month";
          $sqll9 = mysqli_query($koneksi,$queryy9);
          while($dataa9 = mysqli_fetch_row($sqll9)){
          $idl9 = $dataa9[0];}

          $queryy10 = "SELECT count(*) FROM detail_pendaftaran10 WHERE year(TGL_DAFTAR) = $month";
          $sqll10 = mysqli_query($koneksi,$queryy10);
          while($dataa10 = mysqli_fetch_row($sqll10)){
          $idl10 = $dataa10[0];}

          $queryy11 = "SELECT count(*) FROM detail_pendaftaran11 WHERE year(TGL_DAFTAR) = $month";
          $sqll11 = mysqli_query($koneksi,$queryy11);
          while($dataa11 = mysqli_fetch_row($sqll11)){
          $idl11 = $dataa11[0];}

          $queryy12 = "SELECT count(*) FROM detail_pendaftaran12 WHERE year(TGL_DAFTAR) = $month";
          $sqll12 = mysqli_query($koneksi,$queryy12);
          while($dataa12 = mysqli_fetch_row($sqll12)){
          $idl12 = $dataa12[0];}

//===================================================================================//
//detail pembayaran
          $queryyy1 = "SELECT count(*) FROM detail_pembayaran_1 WHERE year(TGL_BAYAR) = $month";
          $sqlll1 = mysqli_query($koneksi,$queryyy1);
          while($dataaa1 = mysqli_fetch_row($sqlll1)){
          $idll1 = $dataaa1[0];}

          $queryyy2 = "SELECT count(*) FROM detail_pembayaran_2 WHERE year(TGL_BAYAR) = $month";
          $sqlll2 = mysqli_query($koneksi,$queryyy2);
          while($dataaa2 = mysqli_fetch_row($sqlll2)){
          $idll2 = $dataaa2[0];}

          $queryyy3 = "SELECT count(*) FROM detail_pembayaran_3 WHERE year(TGL_BAYAR) = $month";
          $sqlll3 = mysqli_query($koneksi,$queryyy3);
          while($dataaa3 = mysqli_fetch_row($sqlll3)){
          $idll3 = $dataaa3[0];}

          $queryyy4 = "SELECT count(*) FROM detail_pembayaran_4 WHERE year(TGL_BAYAR) = $month";
          $sqlll4 = mysqli_query($koneksi,$queryyy4);
          while($dataaa4 = mysqli_fetch_row($sqlll4)){
          $idll4 = $dataaa4[0];}

          $queryyy5 = "SELECT count(*) FROM detail_pembayaran_5 WHERE year(TGL_BAYAR) = $month";
          $sqlll5 = mysqli_query($koneksi,$queryyy5);
          while($dataaa5 = mysqli_fetch_row($sqlll5)){
          $idll5 = $dataaa5[0];}

          $queryyy6 = "SELECT count(*) FROM detail_pembayaran_6 WHERE year(TGL_BAYAR) = $month";
          $sqlll6 = mysqli_query($koneksi,$queryyy6);
          while($dataaa6 = mysqli_fetch_row($sqlll6)){
          $idll6 = $dataaa6[0];}

          $queryyy7 = "SELECT count(*) FROM detail_pembayaran_7 WHERE year(TGL_BAYAR) = $month";
          $sqlll7 = mysqli_query($koneksi,$queryyy7);
          while($dataaa7 = mysqli_fetch_row($sqlll7)){
          $idll7 = $dataaa7[0];}

          $queryyy8 = "SELECT count(*) FROM detail_pembayaran_8 WHERE year(TGL_BAYAR) = $month";
          $sqlll8 = mysqli_query($koneksi,$queryyy8);
          while($dataaa8 = mysqli_fetch_row($sqlll8)){
          $idll8 = $dataaa8[0];}

          $queryyy19 = "SELECT count(*) FROM detail_pembayaran_9 WHERE year(TGL_BAYAR) = $month";
          $sqlll19 = mysqli_query($koneksi,$queryyy19);
          while($dataaa19 = mysqli_fetch_row($sqlll19)){
          $idll9 = $dataaa19[0];}

          $queryyy10 = "SELECT count(*) FROM detail_pembayaran_10 WHERE year(TGL_BAYAR) = $month";
          $sqlll10 = mysqli_query($koneksi,$queryyy10);
          while($dataaa10 = mysqli_fetch_row($sqlll10)){
          $idll10 = $dataaa10[0];}

          $queryyy11 = "SELECT count(*) FROM detail_pembayaran_11 WHERE year(TGL_BAYAR) = $month";
          $sqlll11 = mysqli_query($koneksi,$queryyy11);
          while($dataaa11 = mysqli_fetch_row($sqlll11)){
          $idll11 = $dataaa11[0];}

          $queryyy12 = "SELECT count(*) FROM detail_pembayaran_12 WHERE year(TGL_BAYAR) = $month";
          $sqlll12 = mysqli_query($koneksi,$queryyy12);
          while($dataaa12 = mysqli_fetch_row($sqlll12)){
          $idll12 = $dataaa12[0];}

?>
<!DOCTYPE HTML>
<html>
<head>
     <script type="text/javascript">
          window.onload = function () {
               var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                         text: "Laporan Poliklinik Mawar Husada <?php echo $month;?>"
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
                         name:"Laporan Pemeriksaan",
                         dataPoints: [
                              { x: new Date(<?php echo $month;?>, 0, 1), y: <?php echo $id1;?> },
                              { x: new Date(<?php echo $month;?>, 1, 1), y: <?php echo $id2;?> },
                              { x: new Date(<?php echo $month;?>, 2, 1), y: <?php echo $id3;?> },
                              { x: new Date(<?php echo $month;?>, 3, 1), y: <?php echo $id4;?> },
                              { x: new Date(<?php echo $month;?>, 4, 1), y: <?php echo $id5;?> },
                              { x: new Date(<?php echo $month;?>, 5, 1), y: <?php echo $id6;?> },
                              { x: new Date(<?php echo $month;?>, 6, 1), y: <?php echo $id7;?> },
                              { x: new Date(<?php echo $month;?>, 7, 1), y: <?php echo $id8;?> },
                              { x: new Date(<?php echo $month;?>, 8, 1), y: <?php echo $id9;?> },
                              { x: new Date(<?php echo $month;?>, 9, 1), y: <?php echo $id10;?> },
                              { x: new Date(<?php echo $month;?>, 10, 1), y: <?php echo $id11;?> },
                              { x: new Date(<?php echo $month;?>, 11, 1), y: <?php echo $id12;?> }
                         ]
                    }, {
                         showInLegend: true,
                         type: "line",
                         name:"Laporan Pendaftaran",
                         dataPoints: [
                              { x: new Date(<?php echo $month;?>, 0, 1), y: <?php echo $idl1;?> },
                              { x: new Date(<?php echo $month;?>, 1, 1), y: <?php echo $idl2;?> },
                              { x: new Date(<?php echo $month;?>, 2, 1), y: <?php echo $idl3;?> },
                              { x: new Date(<?php echo $month;?>, 3, 1), y: <?php echo $idl4;?> },
                              { x: new Date(<?php echo $month;?>, 4, 1), y: <?php echo $idl5;?> },
                              { x: new Date(<?php echo $month;?>, 5, 1), y: <?php echo $idl6;?> },
                              { x: new Date(<?php echo $month;?>, 6, 1), y: <?php echo $idl7;?> },
                              { x: new Date(<?php echo $month;?>, 7, 1), y: <?php echo $idl8;?> },
                              { x: new Date(<?php echo $month;?>, 8, 1), y: <?php echo $idl9;?> },
                              { x: new Date(<?php echo $month;?>, 9, 1), y: <?php echo $idl10;?> },
                              { x: new Date(<?php echo $month;?>, 10, 1), y: <?php echo $idl11;?> },
                              { x: new Date(<?php echo $month;?>, 11, 1), y: <?php echo $idl12;?> }
                         ]
                    }/*, {
                         showInLegend: true,
                         type: "line",
                         name:"Laporan Pembayaran",
                         dataPoints: [
                              { x: new Date(<?php //echo $month;?>, 0, 1), y: <?php //echo $idll1;?> },
                              { x: new Date(<?php //echo $month;?>, 1, 1), y: <?php //echo $idll2;?> },
                              { x: new Date(<?php //echo $month;?>, 2, 1), y: <?php //echo $idll3;?> },
                              { x: new Date(<?php //echo $month;?>, 3, 1), y: <?php //echo $idll4;?> },
                              { x: new Date(<?php //echo $month;?>, 4, 1), y: <?php //echo $idll5;?> },
                              { x: new Date(<?php //echo $month;?>, 5, 1), y: <?php //echo $idll6;?> },
                              { x: new Date(<?php //echo $month;?>, 6, 1), y: <?php //echo $idll7;?> },
                              { x: new Date(<?php //echo $month;?>, 7, 1), y: <?php //echo $idll8;?> },
                              { x: new Date(<?php //echo $month;?>, 8, 1), y: <?php //echo $idll9;?> },
                              { x: new Date(<?php //echo $month;?>, 9, 1), y: <?php //echo $idll10;?> },
                              { x: new Date(<?php //echo $month;?>, 10, 1), y: <?php //echo $idll11;?> },
                              { x: new Date(<?php //echo $month;?>, 11, 1), y: <?php //echo $idll12;?> }
                         ]
                    }*/]
               });

               chart.render();
          }
     </script>
     <script src="../../canvasjs.min.js"></script>
     <title>CanvasJS Example</title>
</head>
<body>
     <!--<div id="chartContainer" style="height: 400px; width: 100%;">
     </div>-->
</body>
</html>
<script>
   window.print();
</script>
<script>
  //setTimeout(function() {window.location.href='#'},10);
  //setTimeout(function() {window.location.href='./afif.php'},10);
  setTimeout(function() {window.location.href='./../../../../advancedasli/backend/web/index.php'},10);
</script>