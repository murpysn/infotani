 <?php
 require "../koneksi.php";

if (isset($_POST['simpan'])) {
         //memanggil sebuah nilai dari sebuah inputan dari form pendaftaran.php
        $id= $_POST['id'];
        $username = $_POST['username'];
        $nama = $_POST['namaperusahaan'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $no = $_POST['no'];
        $manager = $_POST['manager'];
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        //merename foto dengan menambah tgl dan jam upload
        $fotobaru = $foto;
        $fotobaru = date('dmYHis').".jpg";
        //set path folder tempat menyimpan foto
        $path = "../../img/pengusaha/user/".$fotobaru;

         //sebuah query untuk menginputkan data ke table tb_siswa
        if(move_uploaded_file($tmp, $path)){
            $query = "update perusahaan set NAMA_PERUSAHAAN='$nama', EMAIL='$email', ALAMAT_PERUSAHAAN='$alamat', NO_TELP_PERUSAHAAN='$no', NAMA_MANAGER='$manager', LOGO = '$fotobaru' where ID_PERUSAHAAN='$id'";

             $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

             if ($result) {?>
                 <script language="JavaScript">
                 alert('Ubah Berhasil !');
                 setTimeout(function() {window.location.href='../../pages/pengusaha/index'},10);
                 </script><?php
             } else {
                ?>
                    <script language="JavaScript">
                    alert('Gagal Mengubah Data !');
                    setTimeout(function() {window.location.href='../../pages/pengusaha/index'},10);
                    </script><?php
            }
        } else {
            ?>
                    <script language="JavaScript">
                    alert('Gagal Unggah Foto !');
                    setTimeout(function() {window.location.href='../../pages/pengusaha/index'},10);
                    </script><?php
        }
         
     }

