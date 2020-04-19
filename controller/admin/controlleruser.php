<?php include "../koneksi.php"; 
require_once "../session.php";
session_start();
if (isset($login_session)) {

    $userid =  $user_check;
} else {
    die("Error. No ID Selected!");
}?>
<?php
		if(isset($_POST['simpan'])){
			//memanggil nilai dari sebuah inputan dan ditampung kedalam variabel
			$username			= $_POST['username'];
			$password   		= $_POST['password'];
			$passwordConf			= $_POST['passwordConf'];
			$id_level	= $_POST['level'];
			$foto = $_FILES['foto']['name'];
			$tmp = $_FILES['foto']['tmp_name'];

			//merename foto dengan menambah tgl dan jam upload
			$fotobaru = $foto;
			$fotobaru = date('dmYHis').".jpg";
			//set path folder tempat menyimpan foto
			$path = "../../img/user/".$fotobaru;

            //cek database dengan select nim dari tb_siswa
			$cek = mysqli_query ($koneksi, "SELECT * FROM user WHERE username='$username'") or die(mysqli_error($koneksi));
			//dilakukan jika data = 0
			if(mysqli_num_rows($cek) == 0){
                if($password == $passwordConf){
					if(move_uploaded_file($tmp, $path)){
				    	$sql = mysqli_query
				    	($koneksi, "INSERT INTO user(id_level, username, password, foto_user)
				    	VALUES('$id_level', '$username', md5('$password'), '$fotobaru')") or die(mysqli_error($koneksi));

				    	if($sql){
					    	echo '<script>alert("Berhasil menambahkan data!"); document.location="../../pages/frontend/login";</script>';
                    	}
                    	else{
					    	echo '<div class="alert alert-warning">Gagal melakukan registrasi</div>';
						}
					}
                }
                else{
                    echo '<script>alert("Gagal! Password tidak sama."); document.location="../../pages/frontend/register";</script>';
                }
            }
            else{
				echo '<script>alert("Gagal! Username telah terdaftar"); document.location="../../pages/frontend/register";</script>';
			}
        }
        else if (isset($_POST['ubah'])) {
            //memanggil sebuah nilai dari sebuah inputan dari form pendaftaran
            $id = $_POST['id_user'];
            $username			= $_POST['username'];
            $password = $_POST['password'];
			$id_level	= $_POST['level'];
            
            $foto = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];
            $fotouser= $_POST['fotouser'];//['name'];
            //$tmpo = $_POST['fotouser']['tmp_name'];

            //merename foto dengan menambah tgl dan jam upload
            $fotobaru = $foto;
            $fotobaru = $fotouser;
            //set path folder tempat menyimpan foto
            $path = "../../img/user/".$fotobaru;

            
            if (file_exists($fotouser)) {
                unlink($fotouser);
            }else{
                if(move_uploaded_file($tmp, $path)){
                    if(isset($_POST['password'])){
                    $query = "UPDATE user SET ID_LEVEL='$id_level', USERNAME='$username', PASSWORD=md5('$password'),  FOTO_USER='$fotobaru' where ID_USER='$id'";
                    }else{
                        $query = "UPDATE user SET ID_LEVEL='$id_level', USERNAME='$username', FOTO_USER='$fotobaru' where ID_USER='$id'";
                    }
                }else if(isset($_POST['password'])){
                    $query = "UPDATE user SET ID_LEVEL='$id_level', USERNAME='$username', PASSWORD=md5('$password')  where ID_USER='$id'";                 
                }else{
                    $query = "UPDATE user SET ID_LEVEL='$id_level', USERNAME='$username'  where ID_USER='$id'";
                }
                    $result = mysqli_query($koneksi, $query);
            
                    if ($result) {?>
                        <script language="JavaScript">
                        alert('Ubah Berhasil !');
                        setTimeout(function() {window.location.href='../../pages/admin/viewuser'},10);
                        </script><?php
                    }
                
                    
            }
          
        } else if(isset($_POST['hapus'])){
            $id = $_POST['idhapus'];
            $fotouser = $_POST['fotouser'];
            $path = "../../img/user/".$fotouser;
            if (file_exists($path)) {
                unlink($path);}
            //query untuk menampilkan sebuah query select dari table tb_siswa dengan id siswa sebagai parameter
            $query = "Delete FROM user WHERE ID_USER='$id'";
            $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

            if ($result) {?>
                <script language="JavaScript">
                alert('Hapus Berhasil !');
                setTimeout(function() {window.location.href='../../pages/admin/viewuser'},10);
                </script><?php
            } else {?>
                <script language="JavaScript">
                alert('Hapus Gagal ! Silahkan Hapus Data Petani terlebih Dahulu');
                setTimeout(function() {window.location.href='../../pages/admin/viewuser'},10);
                </script><?php
            }
        }
        
?>