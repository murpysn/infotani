 <?php
 require "koneksi.php";

 if (isset($_POST['ubah'])) {
         //memanggil sebuah nilai dari sebuah inputan dari form pendaftaran.php
         $KTP = $_POST['KTP'];
         $komoditas = $_POST['idkomoditas'];
         $namapetani = $_POST['namapetani'];
         $alamatpetani = $_POST['alamatpetani'];
         $nohp = $_POST['nohp'];
         $luassawah = $_POST['luassawah'];
         $alamatsawah = $_POST['alamatsawah'];
         $tgltanam = $_POST['tgltanam'];
         $tgltanam1 = date('Y-m-d',strtotime($tgltanam));
         $tglpanen = $_POST['tglpanen'];
         $tglpanen1 = date('Y-m-d',strtotime($tglpanen));
         $status = $_POST['idstatus'];

         //sebuah query untuk menginputkan data ke table tb_siswa
         $query = "UPDATE petani SET ID_KOMODITAS='$komoditas', 
         ID_STATUS='$status', NAMA_PETANI='$namapetani', ALAMAT_PETANI='$alamatpetani', NO_HP='$nohp', LUAS_SAWAH='$luassawah',
         ALAMAT_SAWAH='$alamatsawah', TANAM='$tgltanam1', PANEN='$tglpanen1' where KTP='$KTP'";

         $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

         if ($result) {?>
             <script language="JavaScript">
             alert('Ubah Berhasil !');
             setTimeout(function() {window.location.href='../../pages/user/index'},10);
             </script><?php
         } else {
            ?>
                <script language="JavaScript">
                alert('Gagal Mengubah Data !');
                setTimeout(function() {window.location.href='../../pages/user/index'},10);
                </script><?php
        }
     } else if (isset($_POST['simpan'])) {
         //memanggil sebuah nilai dari sebuah inputan dari form pendaftaran
         $iduser= $_POST['iduser'];
         $KTP = $_POST['KTP'];
         $DESA = $_POST['iddesa'];
         $komoditas = $_POST['idkomoditas'];
         $namapetani = $_POST['namapetani'];
         $alamatpetani = $_POST['alamatpetani'];
         $nohp = $_POST['nohp'];
         $luassawah = $_POST['luassawah'];
         $alamatsawah = $_POST['alamatsawah'];
         $tgltanam = $_POST['tgltanam'];
         $tgltanam1 = date('Y-m-d',strtotime($tgltanam));
         $tglpanen = $_POST['tglpanen'];
         $tglpanen1 = date('Y-m-d',strtotime($tglpanen));
         $status = $_POST['idstatus'];

         //sebuah query untuk menginputkan data ke table tb_siswa
         $query = "INSERT INTO petani (KTP,ID_DESA,ID_KOMODITAS,ID_STATUS,ID_USER,NAMA_PETANI,ALAMAT_PETANI,LUAS_SAWAH,ALAMAT_SAWAH,TANAM,PANEN,NO_HP) 
         VALUES ('$KTP','$DESA','$komoditas','2','$iduser','$namapetani','$alamatpetani','$luassawah','$alamatsawah','$tgltanam1','$tglpanen1','$nohp')";

         $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

         if ($result) {?>
             <script language="JavaScript">
             alert('Ubah Berhasil !');
             setTimeout(function() {window.location.href='../../pages/user/index'},10);
             </script><?php
         } else {
            ?>
                <script language="JavaScript">
                alert('Gagal Mengubah Data !');
                setTimeout(function() {window.location.href='../../pages/user/index'},10);
                </script><?php
        }
     }
