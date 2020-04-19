 <?php
 require "koneksi.php";

     if (isset($_POST['simpan'])) {
         //memanggil sebuah nilai dari sebuah inputan dari form pendaftaran.php
         $kec = $_POST['namakec'];

         //sebuah query untuk menginputkan data ke table tb_siswa
         $query = "INSERT INTO kecamatan (NAMA_KECAMATAN) VALUES ('$kec')";

         $result = mysqli_query($koneksi, $query);

         if ($result) {?>
             <script language="JavaScript">
             alert('Tambah Berhasil !');
             setTimeout(function() {window.location.href='../../pages/admin/viewkecamatan'},10);
             </script><?php
         } else {
             ?>
                 <script language="JavaScript">
                 alert('Tambah Gagal !');
                 setTimeout(function() {window.location.href='../../pages/admin/viewkecamatan'},10);
                 </script><?php
         }
     } else if (isset($_POST['ubah'])) {
         //memanggil sebuah nilai dari sebuah inputan dari form pendaftaran
         $id = $_POST['idkecamatan'];
         $nama = $_POST['namakec'];

         //sebuah query untuk menginputkan data ke table tb_siswa
         $query = "UPDATE kecamatan SET NAMA_KECAMATAN='$nama' where ID_KECAMATAN='$id'";

         $result = mysqli_query($koneksi, $query);

         if ($result) {?>
             <script language="JavaScript">
             alert('Ubah Berhasil !');
             setTimeout(function() {window.location.href='../../pages/admin/viewkecamatan'},10);
             </script><?php
         }
     } else if(isset($_POST['hapus'])){
         $id = $_POST['idhapus'];
         //query untuk menampilkan sebuah query select dari table tb_siswa dengan id siswa sebagai parameter
         $query = "Delete FROM kecamatan WHERE ID_KECAMATAN='$id'";
         $result = mysqli_query($koneksi, $query);

         if ($result) {?>
             <script language="JavaScript">
             alert('Hapus Berhasil !');
             setTimeout(function() {window.location.href='../../pages/admin/viewkecamatan'},10);
             </script><?php
         }
     }
