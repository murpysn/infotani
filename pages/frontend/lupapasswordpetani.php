<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>INFOTANI - REGISTRASI</title>
    <link rel="icon" href="../../img/logo.png">
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    
    <link href="./css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <form  class="form-signin" action="../../controller/frontend/gantipassword" method="POST" enctype="multipart/form-data">
        <br> 
        <?php
        
            require "../../controller/koneksi.php";
        if (isset($_POST['submit'])) {
           $username = $_POST['username'];
           $no = $_POST['nohp'];
           $query = mysqli_query($koneksi, "select user.ID_USER FROM user, petani WHERE user.ID_USER=petani.ID_USER and username='$username' and petani.NO_HP='$no'");
           $hasil = mysqli_fetch_array($query);
           if ($hasil == 0) {
             ?>
                <script language="JavaScript">
                alert('Tidak ditemukan nama Pengguna');
                setTimeout(function() {window.location.href='../../pages/frontend/formlupapass'},10);
                </script>
            <?php
           }
           $query = mysqli_query($koneksi, "select user.ID_USER FROM user, petani WHERE user.ID_USER=petani.ID_USER and username='$username' and petani.NO_HP='$no'");
            while($data = mysqli_fetch_array($query)){?>
              <h2 class="form-signin-heading" align="center" >Atur Ulang Kata Sandi</h2>
            <input type="hidden" name="iduser" style="color: black;" value="<?php echo $data['ID_USER']; ?>">
            <br>
            <label for="password" >Katasandi Baru</label>
            <input type="password" id="password" name="pass_baru" class="form-control" placeholder="Kata Sandi" required autofocus>

            <label for="passwordConf" >Konfirmasi password</label>
            <input type="password" id="passwordConf" name="pass_konf" class="form-control" placeholder="Ulangi Kata Sandi" required>

             <a href="../../pages/frontend/login" class="btn btn-lg btn-warning">Batal</a>
            <button class="btn btn-lg btn-success " type="submit" name="Gantipetani">Simpan</button>             
         <?php
          }
       }
        ?>

      </form>

    </div> <!-- /container -->

     <script>window.jQuery || document.write('<script src="./assets/jquery.min.js"><\/script>')</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        setTimeout(function(){
          $(".alert").slideUp();
        },3000);
      });
    </script>
  </body>
</html>
