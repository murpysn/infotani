<?php
include "../koneksi.php";
require_once "../session.php";
session_start();
if (isset($login_session)) {

    $userid =  $user_check;
} else {
    die("Error. No ID Selected!");
}

//Ganti password
if (isset($_POST['Ganti'])) {
    $userid = $_POST['userid'];
    $pass_lama = $_POST['pass_lama'];
    $pass_baru = $_POST['pass_baru'];
    $pass_konf = $_POST['pass_konf'];

    //Cek Password Lama
    $query = "SELECT * FROM user WHERE ID_USER='$userid' AND password=md5('$pass_lama')";
    $sql = mysqli_query($koneksi, $query);
    $hasil = mysqli_num_rows($sql);
    if (!$hasil >= 1) {
    ?>
        <script language="JavaScript">
        alert('Password lama tidak sesuai, Silahkan ulang kembali !');
        setTimeout(function() {window.location.href='../../pages/admin/pengaturan'},10);
        </script>
    <?php
        // unset($_SESSION['userid']);
        // session_destroy();
    }
    //Validasi data data kosong
    else if (empty($_POST['pass_baru']) || empty($_POST['pass_konf'])) {
        ?>
        <script language="JavaScript">
        alert('Gagal ganti password, Data tidak boleh kosong !');
        setTimeou t(function() {window.location.href='../../pages/admin/pengaturan'},10);
        </script>
    <?php

    }
    //Validasi input konfirm
    else if (($_POST['pass_baru']) !=($_POST['pass_konf'])) {
        ?>
        <script language="JavaScript">
        alert('Gagal Ganti Password,New Password harus sama dengan Confirm Password !');
        setTimeout(function() {window.location.href='../../pages/admin/pengaturan'},10);
        </script>
    <?php
    }
    //Update data
    else{
        $query = "UPDATE user SET password = md5('$pass_baru') WHERE ID_USER='$userid'";
        $sql = mysqli_query($koneksi,$query);
        //Setelah diupdate
        if($sql){
            ?>
            <script language="JavaScript">
            alert('Password Berhasil di Update!');
            setTimeout(function() {window.location.href='../../pages/admin/pengaturan'},10);
            </script>
        <?php
            }
        else{
            ?>
            <script language="JavaScript">
            alert('Password Gagal di Update !');
            </script>
        <?php

            }
    }
}
?>
