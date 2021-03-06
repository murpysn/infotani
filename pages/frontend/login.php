
<?php include ('../../controller/session.php'); ?>
<?php
  if(isset($login_session)) {
	header('Location:./register'); // Mengarahkan ke Home Page
	}

      if ($_SESSION['ID_LEVEL']==1){
          header('Location:../admin/index');
    } elseif ($_SESSION['ID_LEVEL']==2) {
        header('Location:../user/index');
    } elseif ($_SESSION['ID_LEVEL']==3) {
        header('Location:../pengusaha/index');
    } 
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INFOTANI - MASUK</title>

    <!-- logo infotani -->
    <link rel="icon" href="../../img/logo.png">
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">
    
    
    
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="../js/ie-emulation-modes-warning.js"></script-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <form class="form-signin" id="login" name="login" action="../../controller/frontend/proses_login.php" method="post">
        <br>
        <h2 class="form-signin-heading" align="center" style="color: #FFFFFF;">MASUK INFOTANI</h2>

        <br>
        <label for="username" class="sr-only">Nama Pengguna</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Nama Pengguna" required autofocus>
        <br>
        <label for="password" class="sr-only">Kata Sandi</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Kata Sandi" required>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Masuk</button>
        <br>
        <a href="./button_lupa.php" style="color:whitesmoke">Lupa Kata Sandi Anda?</a></p>
        <center> <p>------------------- atau --------------------</p> </center>
        <a href="./button_register.php" class="btn btn-success btn-block">Buat Akun Baru?</a>
        
      	<br>
	<a href="../../pages/frontend/index.php" class="btn btn-warning btn-block">Kembali</a>
      <br>
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
