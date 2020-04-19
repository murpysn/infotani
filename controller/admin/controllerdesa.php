<?php
require "koneksi.php";

    if (isset($_POST['simpan'])) {
        //memanggil sebuah nilai dari sebuah inputan dari form pendaftaran.php
        $desa = $_POST['namadesa'];
        $Kecamatan = $_POST['idkecamatan'];

        //sebuah query untuk menginputkan data ke table tb_siswa
        $query = "INSERT INTO desa (ID_KECAMATAN, NAMA_DESA) VALUES ('$Kecamatan','$desa')";

        $result = mysqli_query($koneksi, $query);

        if ($result) {?>
            <script language="JavaScript">
            alert('Tambah Berhasil !');
            setTimeout(function() {window.location.href='../../pages/admin/viewdesa'},10);
            </script><?php
        } else {
            ?>
                <script language="JavaScript">
                alert('Tambah Gagal !');
                setTimeout(function() {window.location.href='../../pages/admin/viewdesa'},10);
                </script><?php
        }
    } else if (isset($_POST['ubah'])) {
        //memanggil sebuah nilai dari sebuah inputan dari form pendaftaran
        $id = $_POST['iddesa'];
        $desa = $_POST['namadesa'];
        $idkecamatan = $_POST['idkecamatan'];

        //sebuah query untuk menginputkan data ke table tb_siswa
        $query = "UPDATE desa SET NAMA_DESA='$desa', ID_KECAMATAN='$idkecamatan' where ID_DESA='$id'";

        $result = mysqli_query($koneksi, $query);

        if ($result) {?>
            <script language="JavaScript">
            alert('Ubah Berhasil !');
            setTimeout(function() {window.location.href='../../pages/admin/viewdesa'},10);
            </script><?php
        }
    } else if(isset($_POST['hapus'])){
        $id = $_POST['idhapus'];
        //query untuk menampilkan sebuah query select dari table tb_siswa dengan id siswa sebagai parameter
        $query = "Delete FROM desa WHERE ID_DESA='$id'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {?>
            <script language="JavaScript">
            alert('Hapus Berhasil !');
            setTimeout(function() {window.location.href='../../pages/admin/viewdesa'},10);
            </script><?php
        } else {?>
            <script language="JavaScript">
            alert('Hapus Gagal ! Data digunakan di Data Kecamatan');
            setTimeout(function() {window.location.href='../../pages/admin/viewdesa'},10);
            </script><?php
        }
    }
