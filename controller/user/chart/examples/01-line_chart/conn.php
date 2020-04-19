<?php
$host="localhost";
$user="root";
$pass="";
$db="poliklinik_asli";
$koneksi=mysqli_connect($host,$user,$pass,$db);
//$pilih_db=mysqli_select_db($db,$koneksi);
$sql1 = "SELECT count(*) FROM pembayaran";
$query1 = mysqli_query($koneksi, $sql1);
	
?>
<!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {

      title:{
      text: "Earthquakes - per month"
      },
       data: [
      {
        type: "line",

        dataPoints: [
        { x: new Date(2018, 00, 1), y: 890 },
        { x: new Date(2018, 01, 2), y: 414 },
        { x: new Date(2018, 02, 3), y: 520 },
        { x: new Date(2018, 03, 4), y: 460 },
        { x: new Date(2018, 04, 5), y: 450 },
        { x: new Date(2018, 05, 6), y: 500 },
        { x: new Date(2018, 06, 7), y: 480 },
        { x: new Date(2018, 07, 8), y: 480 },
        { x: new Date(2018, 08, 9), y: 410 },
        { x: new Date(2018, 09, 10), y: 500 },
        { x: new Date(2018, 10, 11), y: 480 },
        { x: new Date(2018, 11, 12), y: 200 }
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
</html>