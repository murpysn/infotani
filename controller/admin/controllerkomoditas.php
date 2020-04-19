<?php
require "koneksi.php";

    if (isset($_POST['simpan'])) {
        //memanggil sebuah nilai dari sebuah inputan dari form pendaftaran.php
        $komoditas = $_POST['namakomoditas'];

        //sebuah query untuk menginputkan data ke table tb_siswa
        $query = "INSERT INTO komoditas (NAMA_komoditas) VALUES ('$komoditas')";

        $result = mysqli_query($koneksi, $query);

        if ($result) {?>
            <script language="JavaScript">
            alert('Tambah Berhasil !');
            setTimeout(function() {window.location.href='../../pages/admin/viewkomoditas'},10);
            </script><?php
        } else {
            ?>
                <script language="JavaScript">
                alert('Tambah Gagal !');
                setTimeout(function() {window.location.href='../../pages/admin/viewkomoditas'},10);
                </script><?php
        }
    } else if (isset($_POST['ubah'])) {
        //memanggil sebuah nilai dari sebuah inputan dari form pendaftaran
        $id = $_POST['idkomoditas'];
        $komoditas = $_POST['namakomoditas'];

        //sebuah query untuk menginputkan data ke table tb_siswa
        $query = "UPDATE komoditas SET NAMA_komoditas='$komoditas' where ID_komoditas='$id'";

        $result = mysqli_query($koneksi, $query);

        if ($result) {?>
            <script language="JavaScript">
            alert('Ubah Berhasil !');
            setTimeout(function() {window.location.href='../../pages/admin/viewkomoditas'},10);
            </script><?php
        }
    } else if(isset($_POST['hapus'])){
        $id = $_POST['idhapus'];
        //query untuk menampilkan sebuah query select dari table tb_siswa dengan id siswa sebagai parameter
        $query = "Delete FROM komoditas WHERE ID_komoditas='$id'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {?>
            <script language="JavaScript">
            alert('Hapus Berhasil !');
            setTimeout(function() {window.location.href='../../pages/admin/viewkomoditas'},10);
            </script><?php
        }
    }
