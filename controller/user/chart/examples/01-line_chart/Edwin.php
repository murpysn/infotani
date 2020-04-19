<!DOCTYPE HTML>
<html>

<head>
	<script type="text/javascript">
		window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Line Chart Penjualan dan Pembelian",
					fontSize: 30
				},
				animationEnabled: true,
				axisX: {
					gridColor: "Silver",
					tickColor: "silver",
					valueFormatString: "DD/MMM"
				},
				toolTip: {
					shared: true
				},
				theme: "theme2",
				axisY: {
					gridColor: "Silver",
					tickColor: "silver"
				},
				legend: {
					verticalAlign: "center",
					horizontalAlign: "right"
				},
				data: [
				{
					type: "line",
					showInLegend: true,
					lineThickness: 2,
					name: "Penjualan",
					markerType: "square",
					color: "#20B2AA",
					dataPoints: [
					
					<?php 
					date_default_timezone_set('Asia/Jakarta');
					include "Koneksi.php";
					$tahun = date ("Y") ; 
					
					$query1 = "SELECT SUM(TOTAL) FROM penjualan where MONTH(TANGGAL)='1' AND YEAR(TANGGAL)='$tahun'";
					$sql1 = mysqli_query ($v_koneksi,$query1);
					$data1 = mysqli_fetch_row($sql1);
					$total1 = $data1[0];
					if($total1==null){
					$total1 = 0;
					}
					
					$query2 = "SELECT SUM(TOTAL) FROM penjualan where MONTH(TANGGAL)='2' AND YEAR(TANGGAL)='$tahun'";
					$sql2 = mysqli_query ($v_koneksi,$query2);
					$data2 = mysqli_fetch_row($sql2);
					$total2 = $data2[0];
					if($total2==null){
					$total2 = 0;
					}
					
					$query3 = "SELECT SUM(TOTAL) FROM penjualan where MONTH(TANGGAL)='3' AND YEAR(TANGGAL)='$tahun'";
					$sql3 = mysqli_query ($v_koneksi,$query3);
					$data3 = mysqli_fetch_row($sql3);
					$total3 = $data3[0];
					if($total3==null){
					$total3 = 0;
					}
					
					$query4 = "SELECT SUM(TOTAL) FROM penjualan where MONTH(TANGGAL)='4' AND YEAR(TANGGAL)='$tahun'";
					$sql4 = mysqli_query ($v_koneksi,$query4);
					$data4 = mysqli_fetch_row($sql4);
					$total4 = $data4[0];
					if($total4==null){
					$total4 = 0;
					}
					
					$query5 = "SELECT SUM(TOTAL) FROM penjualan where MONTH(TANGGAL)='5' AND YEAR(TANGGAL)='$tahun'";
					$sql5 = mysqli_query ($v_koneksi,$query5);
					$data5 = mysqli_fetch_row($sql5);
					$total5 = $data5[0];
					if($total5==null){
					$total5 = 0;
					}
					
					$query6 = "SELECT SUM(TOTAL) FROM penjualan where MONTH(TANGGAL)='6' AND YEAR(TANGGAL)='$tahun'";
					$sql6 = mysqli_query ($v_koneksi,$query6);
					$data6 = mysqli_fetch_row($sql6);
					$total6 = $data6[0];
					if($total6==null){
					$total6 = 0;
					}
					
					$query7 = "SELECT SUM(TOTAL) FROM penjualan where MONTH(TANGGAL)='7' AND YEAR(TANGGAL)='$tahun'";
					$sql7 = mysqli_query ($v_koneksi,$query7);
					$data7 = mysqli_fetch_row($sql7);
					$total7 = $data7[0];
					if($total7==null){
					$total7 = 0;
					}
					
					$query8 = "SELECT SUM(TOTAL) FROM penjualan where MONTH(TANGGAL)='8' AND YEAR(TANGGAL)='$tahun'";
					$sql8 = mysqli_query ($v_koneksi,$query8);
					$data8 = mysqli_fetch_row($sql8);
					$total8 = $data8[0];
					if($total8==null){
					$total8 = 0;
					}
					
					$query9 = "SELECT SUM(TOTAL) FROM penjualan where MONTH(TANGGAL)='9' AND YEAR(TANGGAL)='$tahun'";
					$sql9 = mysqli_query ($v_koneksi,$query9);
					$data9 = mysqli_fetch_row($sql9);
					$total9 = $data9[0];
					if($total9==null){
					$total9 = 0;
					}
					
					$query10 = "SELECT SUM(TOTAL) FROM penjualan where MONTH(TANGGAL)='10' AND YEAR(TANGGAL)='$tahun'";
					$sql10 = mysqli_query ($v_koneksi,$query10);
					$data10 = mysqli_fetch_row($sql10);
					$total10 = $data10[0];
					if($total10==null){
					$total10 = 0;
					}
					
					$query11 = "SELECT SUM(TOTAL) FROM penjualan where MONTH(TANGGAL)='11' AND YEAR(TANGGAL)='$tahun'";
					$sql11 = mysqli_query ($v_koneksi,$query11);
					$data11 = mysqli_fetch_row($sql11);
					$total11 = $data11[0];
					if($total11==null){
					$total11 = 0;
					}
					
					$query12 = "SELECT SUM(TOTAL) FROM penjualan where MONTH(TANGGAL)='12' AND YEAR(TANGGAL)='$tahun'";
					$sql12 = mysqli_query ($v_koneksi,$query12);
					$data12 = mysqli_fetch_row($sql12);
					$total12 = $data12[0];
					if($total12==null){
					$total12 = 0;
					}
					
					echo "{ x: new Date( $tahun , 0, 1), y: $total1 },";
					echo "{ x: new Date( $tahun , 1, 1), y: $total2 },";
					echo "{ x: new Date( $tahun , 2, 1), y: $total3 },";
					echo "{ x: new Date( $tahun , 3, 1), y: $total4 },";
					echo "{ x: new Date( $tahun , 4, 1), y: $total5 },";
					echo "{ x: new Date( $tahun , 5, 1), y: $total6 },";
					echo "{ x: new Date( $tahun , 6, 1), y: $total7 },";
					echo "{ x: new Date( $tahun , 7, 1), y: $total8 },";
					echo "{ x: new Date( $tahun , 8, 1), y: $total9 },";
					echo "{ x: new Date( $tahun , 9, 1), y: $total10 },";
					echo "{ x: new Date( $tahun , 10, 1), y: $total11 },";
					echo "{ x: new Date( $tahun , 11, 1), y: $total12 }";
					
					
					?>
					
					]
				},
				{
					type: "line",
					showInLegend: true,
					name: "Pembelian",
					color: "#F08080",
					lineThickness: 2,

					dataPoints: [
					
					
					<?php 
					date_default_timezone_set('Asia/Jakarta');
					include "Koneksi.php";
					$tahun = date ("Y") ; 
					
					$query1 = "SELECT SUM(TOTAL_HARGA) FROM pembelian where MONTH(TANGGAL)='1' AND YEAR(TANGGAL)='$tahun'";
					$sql1 = mysqli_query ($v_koneksi,$query1);
					$data1 = mysqli_fetch_row($sql1);
					$total1 = $data1[0];
					if($total1==null){
					$total1 = 0;
					}
					
					$query2 = "SELECT SUM(TOTAL_HARGA) FROM pembelian where MONTH(TANGGAL)='2' AND YEAR(TANGGAL)='$tahun'";
					$sql2 = mysqli_query ($v_koneksi,$query2);
					$data2 = mysqli_fetch_row($sql2);
					$total2 = $data2[0];
					if($total2==null){
					$total2 = 0;
					}
					
					$query3 = "SELECT SUM(TOTAL_HARGA) FROM pembelian where MONTH(TANGGAL)='3' AND YEAR(TANGGAL)='$tahun'";
					$sql3 = mysqli_query ($v_koneksi,$query3);
					$data3 = mysqli_fetch_row($sql3);
					$total3 = $data3[0];
					if($total3==null){
					$total3 = 0;
					}
					
					$query4 = "SELECT SUM(TOTAL_HARGA) FROM pembelian where MONTH(TANGGAL)='4' AND YEAR(TANGGAL)='$tahun'";
					$sql4 = mysqli_query ($v_koneksi,$query4);
					$data4 = mysqli_fetch_row($sql4);
					$total4 = $data4[0];
					if($total4==null){
					$total4 = 0;
					}
					
					$query5 = "SELECT SUM(TOTAL_HARGA) FROM pembelian where MONTH(TANGGAL)='5' AND YEAR(TANGGAL)='$tahun'";
					$sql5 = mysqli_query ($v_koneksi,$query5);
					$data5 = mysqli_fetch_row($sql5);
					$total5 = $data5[0];
					if($total5==null){
					$total5 = 0;
					}
					
					$query6 = "SELECT SUM(TOTAL_HARGA) FROM pembelian where MONTH(TANGGAL)='6' AND YEAR(TANGGAL)='$tahun'";
					$sql6 = mysqli_query ($v_koneksi,$query6);
					$data6 = mysqli_fetch_row($sql6);
					$total6 = $data6[0];
					if($total6==null){
					$total6 = 0;
					}
					
					$query7 = "SELECT SUM(TOTAL_HARGA) FROM pembelian where MONTH(TANGGAL)='7' AND YEAR(TANGGAL)='$tahun'";
					$sql7 = mysqli_query ($v_koneksi,$query7);
					$data7 = mysqli_fetch_row($sql7);
					$total7 = $data7[0];
					if($total7==null){
					$total7 = 0;
					}
					
					$query8 = "SELECT SUM(TOTAL_HARGA) FROM pembelian where MONTH(TANGGAL)='8' AND YEAR(TANGGAL)='$tahun'";
					$sql8 = mysqli_query ($v_koneksi,$query8);
					$data8 = mysqli_fetch_row($sql8);
					$total8 = $data8[0];
					if($total8==null){
					$total8 = 0;
					}
					
					$query9 = "SELECT SUM(TOTAL_HARGA) FROM pembelian where MONTH(TANGGAL)='9' AND YEAR(TANGGAL)='$tahun'";
					$sql9 = mysqli_query ($v_koneksi,$query9);
					$data9 = mysqli_fetch_row($sql9);
					$total9 = $data9[0];
					if($total9==null){
					$total9 = 0;
					}
					
					$query10 = "SELECT SUM(TOTAL_HARGA) FROM pembelian where MONTH(TANGGAL)='10' AND YEAR(TANGGAL)='$tahun'";
					$sql10 = mysqli_query ($v_koneksi,$query10);
					$data10 = mysqli_fetch_row($sql10);
					$total10 = $data10[0];
					if($total10==null){
					$total10 = 0;
					}
					
					$query11 = "SELECT SUM(TOTAL_HARGA) FROM pembelian where MONTH(TANGGAL)='11' AND YEAR(TANGGAL)='$tahun'";
					$sql11 = mysqli_query ($v_koneksi,$query11);
					$data11 = mysqli_fetch_row($sql11);
					$total11 = $data11[0];
					if($total11==null){
					$total11 = 0;
					}
					
					$query12 = "SELECT SUM(TOTAL_HARGA) FROM pembelian where MONTH(TANGGAL)='12' AND YEAR(TANGGAL)='$tahun'";
					$sql12 = mysqli_query ($v_koneksi,$query12);
					$data12 = mysqli_fetch_row($sql12);
					$total12 = $data12[0];
					if($total12==null){
					$total12 = 0;
					}
					
					echo "{ x: new Date( $tahun , 0, 1), y: $total1 },";
					echo "{ x: new Date( $tahun , 1, 1), y: $total2 },";
					echo "{ x: new Date( $tahun , 2, 1), y: $total3 },";
					echo "{ x: new Date( $tahun , 3, 1), y: $total4 },";
					echo "{ x: new Date( $tahun , 4, 1), y: $total5 },";
					echo "{ x: new Date( $tahun , 5, 1), y: $total6 },";
					echo "{ x: new Date( $tahun , 6, 1), y: $total7 },";
					echo "{ x: new Date( $tahun , 7, 1), y: $total8 },";
					echo "{ x: new Date( $tahun , 8, 1), y: $total9 },";
					echo "{ x: new Date( $tahun , 9, 1), y: $total10 },";
					echo "{ x: new Date( $tahun , 10, 1), y: $total11 },";
					echo "{ x: new Date( $tahun , 11, 1), y: $total12 }";
					
					
					?>
					
					
					]
				}
				],
				legend: {
					cursor: "pointer",
					itemclick: function (e) {
						if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
							e.dataSeries.visible = false;
						}
						else {
							e.dataSeries.visible = true;
						}
						chart.render();
					}
				}
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
