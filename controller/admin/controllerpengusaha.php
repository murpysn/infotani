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
			$siup = $_FILES['siup']['name'];
			$tmp = $_FILES['siup']['tmp_name'];

			//merename foto dengan menambah tgl dan jam upload
			$fotobaru = $siup;
			$fotobaru = date('dmYHis').".jpg";
			//set path folder tempat menyimpan foto
			$path = "../../img/pengusaha/SIUP/".$fotobaru;

            $logo = $_FILES['logo']['name'];
            $tmp2 = $_FILES['logo']['tmp_name'];

            //merename foto dengan menambah tgl dan jam upload
            $fotologo = $logo;
            $fotologo = date('dmYHis').".jpg";
            //set path folder tempat menyimpan foto
            $path2 = "../../img/pengusaha/user/".$fotologo;


            $perusahaan           = $_POST['namaperusahaan'];
            $email           = $_POST['email'];
            $alamat           = $_POST['alamat'];
            $no           = $_POST['notelp'];
            $manager           = $_POST['manager'];

            //cek database dengan select nim dari tb_siswa
			$cek = mysqli_query ($koneksi, "SELECT * FROM perusahaan WHERE username='$username' and NAMA_PERUSAHAAN='$perusahaan'") or die(mysqli_error($koneksi));
			//dilakukan jika data = 0
			if(mysqli_num_rows($cek) == 0){
				if(move_uploaded_file($tmp, $path)){
                    if(move_uploaded_file($tmp2, $path2)){
                    $sql = mysqli_query
                    ($koneksi, "INSERT INTO perusahaan(USERNAME, PASSWORD, SIUP, LOGO, NAMA_PERUSAHAAN, EMAIL, ALAMAT_PERUSAHAAN, NO_TELP_PERUSAHAAN, NAMA_MANAGER, ID_LEVEL)
                    VALUES('$username', md5('$password'), '$fotobaru', '$fotologo', '$perusahaan', '$email', '$alamat', '$no', '$manager',3)") or die(mysqli_error($koneksi));
                        if($sql){
                            echo '<script>alert("Berhasil menambahkan data!"); document.location="../../pages/admin/viewpengusaha";</script>';
                        }
                        else{
                            echo '<div class="alert alert-warning">Gagal melakukan Tambah Data</div>';
                        }
                    }
				}
            }
            else{
				echo '<script>alert("Gagal! Username telah terdaftar"); document.location="../../pages/admin/viewpengusaha";</script>';
			}
        } else if (isset($_POST['ubah'])) {
            $idperusahaan = $_POST['idperusahaan'];
            $username           = $_POST['username'];
            $password           = $_POST['password'];
            $siup = $_FILES['siup']['name'];
            $tmp = $_FILES['siup']['tmp_name'];
            if(isset($_POST['fotosiup'])){
            $fotosiup= $_POST['fotosiup'];
            }
            else{
                $fotosiup = date('dmYHis').".jpg";
            }
            //set path folder tempat menyimpan foto
            $fotobaru = $siup;
            $fotobaru = $fotosiup; 
            $path = "../../img/pengusaha/SIUP/".$fotobaru;


            $logo = $_FILES['logo']['name'];
            $tmp2 = $_FILES['logo']['tmp_name'];
            if(!empty($_POST['fotologo'])){
            $fotolamalogo = $_POST['fotologo'];
            }else{
                $fotolamalogo = date('dmYHis').".jpg";
            }
            //merename foto dengan menambah tgl dan jam upload
            $fotologo = $logo;
            $fotologo = $fotolamalogo;
            $path2 = "../../img/pengusaha/user/".$fotologo;


            $perusahaan      = $_POST['namaperusahaan'];
            $email           = $_POST['email'];
            $alamat          = $_POST['alamat'];
            $no              = $_POST['notelp'];
            $manager         = $_POST['manager'];

            if (file_exists($fotolamalogo)||file_exists($fotosiup)) {
                if (file_exists($fotolamalogo)){
                unlink($fotolamalogo);
                }
                if (file_exists($fotosiup)) {
                    unlink($fotosiup);   
                }
            } else{
                if(move_uploaded_file($tmp, $path)&&move_uploaded_file($tmp2, $path2)){
                    if(isset($_POST['password'])){
                    $sql = mysqli_query
                    ($koneksi, "update perusahaan set USERNAME='$username', PASSWORD=md5('$password'), SIUP='$fotobaru', LOGO='$fotologo', NAMA_PERUSAHAAN='$perusahaan', EMAIL='$email', ALAMAT_PERUSAHAAN='$alamat', NO_TELP_PERUSAHAAN='$no', NAMA_MANAGER='$manager' WHERE ID_PERUSAHAAN='$idperusahaan'") or die(mysqli_error($koneksi));
                    }else{
                        $sql = mysqli_query
                        ($koneksi, "update perusahaan set USERNAME='$username',  SIUP='$fotobaru', LOGO='$fotologo', NAMA_PERUSAHAAN='$perusahaan', EMAIL='$email', ALAMAT_PERUSAHAAN='$alamat', NO_TELP_PERUSAHAAN='$no', NAMA_MANAGER='$manager' WHERE ID_PERUSAHAAN='$idperusahaan'") or die(mysqli_error($koneksi));
    
                    }
                }else if(move_uploaded_file($tmp, $path)){
                    if(isset($_POST['password'])){
                    $sql = mysqli_query
                    ($koneksi, "update perusahaan set USERNAME='$username', PASSWORD=md5('$password'), SIUP='$fotobaru', NAMA_PERUSAHAAN='$perusahaan', EMAIL='$email', ALAMAT_PERUSAHAAN='$alamat', NO_TELP_PERUSAHAAN='$no', NAMA_MANAGER='$manager' WHERE ID_PERUSAHAAN='$idperusahaan'") or die(mysqli_error($koneksi));
                    }else{
                        $sql = mysqli_query
                    ($koneksi, "update perusahaan set USERNAME='$username',  SIUP='$fotobaru',  NAMA_PERUSAHAAN='$perusahaan', EMAIL='$email', ALAMAT_PERUSAHAAN='$alamat', NO_TELP_PERUSAHAAN='$no', NAMA_MANAGER='$manager' WHERE ID_PERUSAHAAN='$idperusahaan'") or die(mysqli_error($koneksi));

                    }
                }else if(move_uploaded_file($tmp2, $path2)){
                    if(isset($_POST['password'])){
                    $sql = mysqli_query
                    ($koneksi, "update perusahaan set USERNAME='$username', PASSWORD=md5('$password'), LOGO='$fotolamalogo', NAMA_PERUSAHAAN='$perusahaan', EMAIL='$email', ALAMAT_PERUSAHAAN='$alamat', NO_TELP_PERUSAHAAN='$no', NAMA_MANAGER='$manager' WHERE ID_PERUSAHAAN='$idperusahaan'") or die(mysqli_error($koneksi));
                    }else{
                        $sql = mysqli_query
                        ($koneksi, "update perusahaan set USERNAME='$username',  LOGO='$fotologo', NAMA_PERUSAHAAN='$perusahaan', EMAIL='$email', ALAMAT_PERUSAHAAN='$alamat', NO_TELP_PERUSAHAAN='$no', NAMA_MANAGER='$manager' WHERE ID_PERUSAHAAN='$idperusahaan'") or die(mysqli_error($koneksi));      
                    }
                }else{
                    if(isset($_POST['password'])){
                    $sql = mysqli_query
                    ($koneksi, "update perusahaan set USERNAME='$username', PASSWORD=md5('$password'), NAMA_PERUSAHAAN='$perusahaan', EMAIL='$email', ALAMAT_PERUSAHAAN='$alamat', NO_TELP_PERUSAHAAN='$no', NAMA_MANAGER='$manager' WHERE ID_PERUSAHAAN='$idperusahaan'") or die(mysqli_error($koneksi));
                    }else{
                        $sql = mysqli_query
                        ($koneksi, "update perusahaan set USERNAME='$username', NAMA_PERUSAHAAN='$perusahaan', EMAIL='$email', ALAMAT_PERUSAHAAN='$alamat', NO_TELP_PERUSAHAAN='$no', NAMA_MANAGER='$manager' WHERE ID_PERUSAHAAN='$idperusahaan'") or die(mysqli_error($koneksi));      
                    }
                }
                    if($sql){
                            echo '<script>alert("Berhasil mengubah data!"); document.location="../../pages/admin/viewpengusaha";</script>';
                        }
                        else{
                            echo '<div class="alert alert-warning">Gagal melakukan Ubah Data</div>';
                        } echo "s";
            } echo "a";
        } else if(isset($_POST['hapus'])){
            $id = $_POST['idhapus'];
            $siup = $_POST['foto'];
            $path = "../../img/pengusaha/SIUP/".$siup;

            $logo = $_POST['foto'];
            $path2 = "../../img/pengusaha/user/".$logo;


            if (file_exists($path)) {
                unlink($path);
                if (file_exists($path2)) {
                    unlink($path2);   
                }
            }
            //query untuk menampilkan sebuah query select dari table tb_siswa dengan id siswa sebagai parameter
            $query = "Delete FROM perusahaan WHERE ID_PERUSAHAAN='$id'";
            $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

            if ($result) {?>
                <script language="JavaScript">
                alert('Hapus Berhasil !');
                setTimeout(function() {window.location.href='../../pages/admin/viewpengusaha'},10);
                </script><?php
            } else {?>
                <script language="JavaScript">
                alert('Hapus Gagal ! Silahkan Hapus Data pengusaha terlebih Dahulu');
                setTimeout(function() {window.location.href='../../pages/admin/viewpengusaha'},10);
                </script><?php
            }
    }
        
?>