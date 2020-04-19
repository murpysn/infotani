<?php include "../koneksi.php"; ?>
<?php
		if(isset($_POST['submit'])){
			//memanggil nilai dari sebuah inputan dan ditampung kedalam variabel
			$username			= $_POST['username'];
			$password   		= $_POST['password'];
			$passwordConf			= $_POST['passwordConf'];
			$id_level	= 3;
			$foto = $_FILES['foto']['name'];
			$tmp = $_FILES['foto']['tmp_name'];

			//merename foto dengan menambah tgl dan jam upload
			$fotobaru = $foto;
			$fotobaru = date('dmYHis').".jpg";
			//set path folder tempat menyimpan foto
			$path = "../../img/pengusaha/SIUP/".$fotobaru;

            //cek database dengan select nim dari tb_siswa
			$cek = mysqli_query ($koneksi, "SELECT * FROM perusahaan, user, level WHERE perusahaan.ID_LEVEL=level.ID_LEVEL AND level.ID_LEVEL=perusahaan.ID_LEVEL AND user.USERNAME='$username' OR perusahaan.USERNAME='$username'") or die(mysqli_error($koneksi));
			//dilakukan jika data = 0
			if(mysqli_num_rows($cek) == 0){
                if($password == $passwordConf){
					if(move_uploaded_file($tmp, $path)){
				    	$sql = mysqli_query
				    	($koneksi, "INSERT INTO perusahaan(username, password, siup, id_level)
				    	VALUES('$username', md5('$password'),'$fotobaru', '$id_level')") or die(mysqli_error($koneksi));

				    	if($sql){
					    	echo '<script>alert("Berhasil menambahkan data - Silahkan Masuk."); document.location="../../pages/frontend/login";</script>';
                    	}
                    	else{
					    	echo '<script>alert("Gagal melakukan registrasi!"); document.location="../../pages/frontend/register_pengusaha";</script>';
						}
					}
					else{
						echo '<script>alert("Gagal - Mohon sertakan bukti SIUP!"); document.location="../../pages/frontend/register_pengusaha";</script>';
					}
                }
                else{
                    echo '<script>alert("Gagal! Kata Sandi tidak sama."); document.location="../../pages/frontend/register_pengusaha";</script>';
                }
            }
            else{
				echo '<script>alert("Gagal! Nama Pengguna telah terdaftar"); document.location="../../pages/frontend/register";</script>';
			}
		}
	?>
