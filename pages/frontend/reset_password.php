<?php
	if(isset($_POST["reset-password"])) {
		$conn = mysqli_connect("localhost", "root", "", "infotani");
		$sql = "UPDATE `infotani`.`perusahaan` SET `PASSWORD` = '" . md5($_POST["member_password"]). "' WHERE `perusahaan`.`USERNAME` = '" . $_GET["name"] . "'";
		$result = mysqli_query($conn,$sql);
		$success_message = "Password is reset successfully.";
		
	}
?>
<link href="../../controller/frontend/lupapassword/demo-style.css" rel="stylesheet" type="text/css">
<script>
function validate_password_reset() {
	if((document.getElementById("member_password").value == "") && (document.getElementById("confirm_password").value == "")) {
		document.getElementById("validation-message").innerHTML = "Please enter new password!"
		return false;
	}
	if(document.getElementById("member_password").value  != document.getElementById("confirm_password").value) {
		document.getElementById("validation-message").innerHTML = "Both password should be same!"
		return false;
	}
	
	return true;
}
</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INFOTANI - LOGIN</title>

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
      <form class="form-signin" name="frmForgot" id="frmForgot" action="" method="post" onSubmit="return validate_password_reset();">
        <br>
		<?php if(!empty($success_message)) { ?>
		<div class="success_message"><?php echo $success_message; ?></div>
		<?php } ?>

		<div id="validation-message">
			<?php if(!empty($error_message)) { ?>
		<?php echo $error_message; ?>
		<?php } ?>
		</div>
        <h2 class="form-signin-heading" align="center" style="color: #FFFFFF;">ATUR ULANG KATASANDI</h2>

        <br>
        <label for="username" class="sr-only">Katasandi</label>
        <input type="password" name="member_password" id="member_password" class="form-control" placeholder="Katasandi" autofocus>
        <br>
        <label for="password" class="sr-only">Konfirmasi Katasandi</label>
        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Konfirmasi Katasandi">
		    <input type="submit" name="reset-password" id="reset-password" value="Kirim" class="form-submit-button btn btn-lg btn-block">
       <br>
  		<a href="./index" class="btn btn-warning btn-block">Kembali</a>
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