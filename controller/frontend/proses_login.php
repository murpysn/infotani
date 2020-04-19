<?php
session_start();
$error='';
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "Username or Password is invalid";
        } else {
            // Variabel username dan password
            $username=$_POST['username'];
            $password=$_POST['password'];
            // Membangun koneksi ke database
            include "../koneksi.php";
            // Mencegah MySQL injection
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysqli_real_escape_string($koneksi, $username);
            $password = mysqli_real_escape_string($koneksi, $password);

            // SQL query untuk memeriksa apakah karyawan terdapat di database?
            $sql = "select * from user where PASSWORD=md5('$password') AND USERNAME='$username' AND ID_LEVEL in(1,2)";
            $query = mysqli_query($koneksi, $sql);
            $rows = mysqli_num_rows($query);
            if ($rows != 0) {
                $c = mysqli_fetch_array($query);// Membuat Sesi/session

                $_SESSION['USERNAME'] = $c['USERNAME'];
                $_SESSION['ID_LEVEL'] = $c['ID_LEVEL'];
                $_SESSION['ID_USER'] = $c['ID_USER'];

                if ($c['ID_LEVEL']==1) {
                    header("location:..\..\pages\admin\index");
                } elseif ($c['ID_LEVEL']==2) {
                    header("location:..\..\pages\user\index");
                } else {
                    die("error");
                }

    // header("location: index"); // Mengarahkan ke halaman awal
            } else { 
                $sql = "select * from perusahaan where PASSWORD=md5('$password') AND USERNAME='$username'";
                $query = mysqli_query($koneksi, $sql);
                $rows = mysqli_num_rows($query);
                if ($rows != 0) {
                    $c = mysqli_fetch_array($query);// Membuat Sesi/session

                    $_SESSION['USERNAME'] = $c['USERNAME'];
                    $_SESSION['ID_LEVEL'] = $c['ID_LEVEL'];
                    $_SESSION['ID_PERUSAHAAN'] = $c['ID_PERUSAHAAN'];

                    if ($c['ID_LEVEL']==3) {
                        header("location:..\..\pages\pengusaha\index");
                    } else {
                        die("error");
                    }

                } else {
            ?>
                <script language="JavaScript">
                    alert('Nama Pengguna atau Kata Sandi Salah Untuk Pengguna !');
                    setTimeout(function() {window.location.href='../../pages/frontend/login'},10);
                </script>
            <?php
                }
            }
            ?>

            <script language="JavaScript">
                alert('Nama Pengguna atau Kata Sandi Salah Untuk Admin !');
                setTimeout(function() {window.location.href='../../pages/frontend/login'},10);
            </script>
            <?php
            mysqli_close($koneksi);
        }
} 
?>