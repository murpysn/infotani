<?php
  if(!empty($_POST["forgot-password"])){
    $conn = mysqli_connect("localhost", "root", "", "infotani");
    
    $condition = "";
    if(!empty($_POST["user-login-name"])) 
      $condition = " USERNAME = '" . $_POST["user-login-name"] . "'";
    if(!empty($_POST["user-email"])) {
      if(!empty($condition)) {
        $condition = " and ";
      }
      $condition = " EMAIL = '" . $_POST["user-email"] . "'";
    }
    
    if(!empty($condition)) {
      $condition = " where " . $condition;
    }

    $sql = "Select * from perusahaan " . $condition;
    $result = mysqli_query($conn,$sql);
    $user = mysqli_fetch_array($result);
    
    if(!empty($user)) {
      require_once("../../controller/frontend/lupapassword/forgot-password-recovery-mail.php");
    } else {
      $error_message = 'No User Found';
    }
  }
?>
<link href="../../controller/frontend/lupapassword/demo-style.css" rel="stylesheet" type="text/css">
<script>
function validate_forgot() {
  if((document.getElementById("user-login-name").value == "") && (document.getElementById("user-email").value == "")) {
    document.getElementById("validation-message").innerHTML = "Login name or Email is required!"
    return false;
  }
  return true
}
</script>
<!--<form name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();">
<h1>Forgot Password?</h1>
  <?php if(!empty($success_message)) { ?>
  <div class="success_message"><?php echo $success_message; ?></div>
  <?php } ?>

  <div id="validation-message">
    <?php if(!empty($error_message)) { ?>
  <?php echo $error_message; ?>
  <?php } ?>
  </div>

  <div class="field-group">
    <div><label for="username">Username</label></div>
    <div><input type="text" name="user-login-name" id="user-login-name" class="input-field"> Or</div>
  </div>
  
  <div class="field-group">
    <div><label for="email">Email</label></div>
    <div><input type="text" name="user-email" id="user-email" class="input-field"></div>
  </div>
  
  <div class="field-group">
    <div><input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button"></div>
  </div>  
</form>
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INFOTANI - LUPA KATA SANDI</title>

    <!-- logo infotani -->
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
      <form class="form-signin" name="frmForgot" id="frmForgot" action="" method="post" onSubmit="return validate_forgot();">
        <br>
         <?php if(!empty($success_message)) { ?>
          <div class="success_message"><?php echo $success_message; ?></div>
          <?php } ?>

          <div id="validation-message">
            <?php if(!empty($error_message)) { ?>
          <?php echo $error_message; ?>
          <?php } ?>
          </div>
        <h3 class="form-signin-heading" align="center" style="color: #FFFFFF;">ATUR ULANG KATASANDI</h3>

        <br>
          <label for="username" class="sr-only">Nama Pengguna</label>
          <input type="text" name="user-login-name" id="user-login-name" class="form-control" placeholder="Nama Pengguna" autofocus>
        <br>
        <label for="password" class="sr-only">Email</label>
          <input type="email" name="user-email" id="user-email" class="form-control" placeholder="Email">
          <input type="submit" name="forgot-password" id="forgot-password" value="Kirim" class="form-submit-button btn btn-lg btn-block btn-success">
        <br>
  <a href="./button_login" class="btn btn-warning btn-block">Kembali</a>
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