<?php
include "./../koneksi.php";
date_default_timezone_set('Asia/Jakarta');

        $month = date ("Y");
        $bulan = date("m");

        //--------------------------------------------------//
        $query1 = "SELECT count(*) FROM reservation1 WHERE month(RESERVATION_DATE) = $bulan";
        $sql1 = mysqli_query($koneksi,$query1);
        while($data1 = mysqli_fetch_row($sql1)){
        $id1 = $data1[0];}

        $query2 = "SELECT count(*) FROM reservation2 WHERE month(RESERVATION_DATE) = $bulan";
        $sql2 = mysqli_query($koneksi,$query2);
        while($data2 = mysqli_fetch_row($sql2)){
        $id2 = $data2[0];}

        $query3 = "SELECT count(*) FROM reservation3 WHERE month(RESERVATION_DATE) = $bulan";
        $sql3 = mysqli_query($koneksi,$query3);
        while($data3 = mysqli_fetch_row($sql3)){
        $id3 = $data3[0];}

        $query4 = "SELECT count(*) FROM reservation4 WHERE month(RESERVATION_DATE) = $bulan";
        $sql4 = mysqli_query($koneksi,$query4);
        while($data4 = mysqli_fetch_row($sql4)){
        $id4 = $data4[0];}

        $query5 = "SELECT count(*) FROM reservation5 WHERE month(RESERVATION_DATE) = $bulan";
        $sql5 = mysqli_query($koneksi,$query5);
        while($data5 = mysqli_fetch_row($sql5)){
        $id5 = $data5[0];}

        $query6 = "SELECT count(*) FROM reservation6 WHERE month(RESERVATION_DATE) = $bulan";
        $sql6 = mysqli_query($koneksi,$query6);
        while($data6 = mysqli_fetch_row($sql6)){
        $id6 = $data6[0];}

        $query7 = "SELECT count(*) FROM reservation7 WHERE month(RESERVATION_DATE) = $bulan";
        $sql7 = mysqli_query($koneksi,$query7);
        while($data7 = mysqli_fetch_row($sql7)){
        $id7 = $data7[0];}

        $query8 = "SELECT count(*) FROM reservation8 WHERE month(RESERVATION_DATE) = $bulan";
        $sql8 = mysqli_query($koneksi,$query8);
        while($data8 = mysqli_fetch_row($sql8)){
        $id8 = $data8[0];}

        $query9 = "SELECT count(*) FROM reservation9 WHERE month(RESERVATION_DATE) = $bulan";
        $sql9 = mysqli_query($koneksi,$query9);
        while($data9 = mysqli_fetch_row($sql9)){
        $id9 = $data9[0];}

        $query10 = "SELECT count(*) FROM reservation10 WHERE month(RESERVATION_DATE) = $bulan";
        $sql10 = mysqli_query($koneksi,$query10);
        while($data10 = mysqli_fetch_row($sql10)){
        $id10 = $data10[0];}

        $query11 = "SELECT count(*) FROM reservation11 WHERE month(RESERVATION_DATE) = $bulan";
        $sql11 = mysqli_query($koneksi,$query11);
        while($data11 = mysqli_fetch_row($sql11)){
        $id11 = $data11[0];}

        $query12 = "SELECT count(*) FROM reservation12 WHERE month(RESERVATION_DATE) = $bulan";
        $sql12 = mysqli_query($koneksi,$query12);
        while($data12 = mysqli_fetch_row($sql12)){
        $id12 = $data12[0];}
?>

<!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {

      title:{
      text: "Laporan Pemesanan Tiket- per Bulan"
      },
       data: [
      {
        type: "line",

        dataPoints: [
        { x: new Date(<?php echo $month;?>, 00, 1), y: <?php echo $id1;?> },
        { x: new Date(<?php echo $month;?>, 01, 1), y: <?php echo $id2;?> },
        { x: new Date(<?php echo $month;?>, 02, 1), y: <?php echo $id3;?> },
        { x: new Date(<?php echo $month;?>, 03, 1), y: <?php echo $id4;?> },
        { x: new Date(<?php echo $month;?>, 04, 1), y: <?php echo $id5;?> },
        { x: new Date(<?php echo $month;?>, 05, 1), y: <?php echo $id6;?> },
        { x: new Date(<?php echo $month;?>, 06, 1), y: <?php echo $id7;?> },
        { x: new Date(<?php echo $month;?>, 07, 1), y: <?php echo $id8;?> },
        { x: new Date(<?php echo $month;?>, 08, 1), y: <?php echo $id9;?> },
        { x: new Date(<?php echo $month;?>, 09, 1), y: <?php echo $id10;?> },
        { x: new Date(<?php echo $month;?>, 10, 1), y: <?php echo $id11;?> },
        { x: new Date(<?php echo $month;?>, 11, 1), y: <?php echo $id12;?> }
        ]
      }
      ]
    });

    chart.render();
  }
	</script>
	<script src="../../canvasjs.min.js"></script>
	<title>CanvasJS Example</title>
</head>
<body>
	<div id="chartContainer" style="height: 400px; width: 100%;">
	</div>
</body>
<script>
   window.print();
</script>
</html>