<?php
require "koneksi.php";
if (isset($_POST['ubah'])) {        //memanggil sebuah nilai dari sebuah inputan dari form pendaftaran.php
        $id = $_POST['id'];
        $hasil = $_POST['hasil'];
        $hasil_fix = str_replace(".","",$hasil);
        $harga = $_POST['harga'];
        $harga_fix = str_replace(".","",$harga);
        $status = $_POST['panen'];
        $tgl = $_POST['tgl'];
        $max = $_POST['max'];

        //sebuah query untuk menginputkan data ke table tb_siswa
        $query = "UPDATE panen SET HASIL_AWAL=$hasil_fix,HASIL=$hasil_fix, HARGA=$harga_fix, STATUS_PANEN='$status' where ID_PANEN=$max";

        $result = mysqli_query($koneksi, $query);

    if ($result) {?>
        <script language="JavaScript">
        alert('Tambah Panen Berhasil !');
        setTimeout(function() {window.location.href='../../pages/user/index'},10);
        </script><?php
    } else {?>
        <script language="JavaScript">
        alert('Tidak Bisa Menambah !');
        setTimeout(function() {window.location.href='../../pages/user/index'},10);
        </script><?php
    }
}
