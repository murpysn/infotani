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
      <form class="form-signin" action="../../controller/frontend/proses_register_pengusaha" method="post" enctype="multipart/form-data">
      
      
        <br> 
        <h2 class="form-signin-heading" align="center" >REGISTRASI</h2>
        
        <br>
        <label for="username" >Nama Pengguna</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Nama Pengguna" required autofocus>
        
        <label for="password" >Kata Sandi</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Kata Sandi" required autofocus>
        <label for="passwordConf" >Confirm Password</label>
        <input type="password" id="passwordConf" name="passwordConf" class="form-control" placeholder="Ulangi Kata Sandi" required>
        <label for="foto" > SIUP </label>
        <input type="file" id="foto" name="foto" >
        <br>
        <br>
        <a href="../../pages/frontend/button_register" class="btn btn-lg btn-warning">Batal</a>
        <button class="btn btn-lg btn-success " type="submit" name="submit">Registrasi</button>
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
