<?php
require "koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$tgl = date("Y-m-d");
if (isset($_POST['pesan'])) {        //memanggil sebuah nilai dari sebuah inputan dari form pendaftaran.php
    $id = $_POST['idperusahaan'];
    $ktp = $_POST['ktp'];
    $jumlah = $_POST['jmlpesan'];
    $total = $_POST['total'];

    //sebuah query untuk menginputkan data ke table tb_siswa
    $query = "INSERT INTO pemesanan(ID_PERUSAHAAN, KTP, TANGGAL, JUMLAH_PESAN, TOTAL_BIAYA, ID_PESAN_STATUS) values('$id','$ktp','$tgl','$jumlah','$total','1')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {?>
        <script language="JavaScript">
        alert('Tambah Pemesanan Berhasil !, Segera Bayar Tagihan sebelum 1 jam setelah pemesanan');
        setTimeout(function() {window.location.href='../../pages/pengusaha/riwayat'},10);
        </script><?php
    } else {
        ?>
        <script language="JavaScript">
        alert('Tambah Pemesanan Gagal !');
        setTimeout(function() {window.location.href='../../pages/pengusaha/riwayat'},10);
        </script>
    <?php
    }
} elseif (isset($_POST['konfirmasi'])) {
    $id = $_POST['idpesan'];
    $jumlah = $_POST['jmlpesan'];
    $jumlah_fix = str_replace(".","",$jumlah);
    $ktp = $_POST['ktp'];
    $idpanen = $_POST['idpanen'];
    $idperusahaan = $_POST['idperusahaan'];
        $sql = mysqli_query
        ($koneksi, "UPDATE pemesanan SET ID_PESAN_STATUS = '2' WHERE ID_PESAN = '$id'") or die(mysqli_error($koneksi));

/*        $cekkurang = mysqli_query($koneksi, "SELECT * FROM panen, petani, pemesanan WHERE petani.KTP=panen.KTP AND petani.KTP=pemesanan.KTP AND panen.ID_PANEN=$idpanen AND pemesanan.KTP=$ktp AND pemesanan.ID_PERUSAHAAN=$idperusahaan AND pemesanan.ID_PESAN=$id");
        while ($data = mysqli_fetch_array($cekkurang)) {
            $hasil = $data['HASIL'] - $jumlah_fix;
            };

        $kurang = mysqli_query($koneksi,"UPDATE panen, petani, pemesanan set PANEN.hasil=$hasil WHERE petani.KTP=panen.KTP AND petani.KTP=pemesanan.KTP AND panen.ID_PANEN=$idpanen AND pemesanan.KTP=$ktp AND pemesanan.ID_PERUSAHAAN=$idperusahaan AND pemesanan.ID_PESAN=$id");*/

        if($sql){
            echo '?>
        <script language="JavaScript">
        alert("Tambah Pemesanan Berhasil !");
        setTimeout(function() {window.location.href="../../pages/user/riwayat"},10);
        </script><?php';
        }
        else{
            echo '<script language="JavaScript">
        alert("Tambah Pemesanan Gagal !"");
        setTimeout(function() {window.location.href="../../pages/user/riwayat"},10);
        </script>';
        }
} elseif (isset($_POST['batal'])) {
    $id = $_POST['idpesan'];
    $jumlah = $_POST['jmlpesan'];
    $jumlah_fix = str_replace(".","",$jumlah);
    $ktp = $_POST['ktp'];
    $idpanen = $_POST['idpanen'];
    $idperusahaan = $_POST['idperusahaan'];
        
        $cekkurang = mysqli_query($koneksi, "SELECT * FROM panen, petani, pemesanan WHERE petani.KTP=panen.KTP AND petani.KTP=pemesanan.KTP AND panen.ID_PANEN=$idpanen AND pemesanan.KTP=$ktp AND pemesanan.ID_PERUSAHAAN=$idperusahaan AND pemesanan.ID_PESAN=$id");
        while ($data = mysqli_fetch_array($cekkurang)) {
            $hasil = $data['HASIL'] + $jumlah_fix;
            };

        $Tambah = mysqli_query($koneksi,"UPDATE panen, petani, pemesanan set panen.hasil=$hasil WHERE petani.KTP=panen.KTP AND petani.KTP=pemesanan.KTP AND panen.ID_PANEN=$idpanen AND pemesanan.KTP=$ktp AND pemesanan.ID_PERUSAHAAN=$idperusahaan AND pemesanan.ID_PESAN=$id");
        $sql = mysqli_query
        ($koneksi, "DELETE FROM pemesanan WHERE ID_PESAN = '$id'") or die(mysqli_error($koneksi));
        if($sql){
            echo '?>
        <script language="JavaScript">
        alert("Hapus Pemesanan Berhasil !");
        setTimeout(function() {window.location.href="../../pages/user/riwayat"},10);
        </script><?php';
        }
        else{
            echo '<script language="JavaScript">
        alert("Hapus Pemesanan Gagal !"");
        setTimeout(function() {window.location.href="../../pages/user/riwayat"},10);
        </script>';
        }
}
