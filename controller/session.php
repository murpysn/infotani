<?php
error_reporting(0);
include "./koneksi.php";
session_start();// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['USERNAME'];

// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
$sql = "select * from user where USERNAME='$user_check'" ;
$ses_sql=mysqli_query($koneksi,$sql);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['ID_USER'];
$AKSES =$row['ID_LEVEL'];
$pass =$row['PASSWORD'];
$userr = $row['USERNAME'];
$gambar = $row['FOTO_USER'];

$ses_sql_petani=mysqli_query($koneksi,"select * from petani where ID_USER='$login_session'");
$rowpetani = mysqli_fetch_assoc($ses_sql_petani);
$ktppetani =$rowpetani['KTP'];


$pengusaha=$_SESSION['ID_PERUSAHAAN'];

$sql2 = "select * from perusahaan where ID_PERUSAHAAN='$pengusaha'" ;
$ses_sql2=mysqli_query($koneksi, $sql2);
$row2 = mysqli_fetch_assoc($ses_sql2);
$login_pengusaha =$row2['ID_USER'];
$id_pengguna =$row2['ID_PERUSAHAAN'];
$nama_pengguna =$row2['NAMA_PERUSAHAAN'];
$gambar2 = $row2['LOGO'];
$nama_manager = $row2['NAMA_MANAGER'];
$alamat_usaha = $row2['ALAMAT_PERUSAHAAN'];

?>
