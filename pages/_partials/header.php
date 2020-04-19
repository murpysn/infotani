<?php
    require_once "../../controller/koneksi.php";
    include "../../controller/session.php";
  if(!isset($login_session)) {
      ?>
      <script language="JavaScript">
  		alert('Anda Belum Login !');
  		setTimeout(function() {window.location.href="../frontend/login"},10);
  		</script>
      <?php
	header('Location: ../frontend/login'); // Mengarahkan ke Home Page
	}

  if ($_SESSION['ID_LEVEL']!=1){
  ?>
	<script language="JavaScript">
		alert('Anda Bukan Admin !');
		setTimeout(function() {window.location.href="../frontend/login"},10);
		</script>
	<?php
}
?>
<header class="main-header">
  <!-- Logo -->
  <a href="../frontend/index" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>I</b>T</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Info</b>Tani</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="../../img/user/<?php echo $gambar;?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $_SESSION['USERNAME'] ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="../../img/user/<?php echo $gambar;?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $_SESSION['USERNAME'] ?>
                <small>Admin Info Tani</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="./pengaturan" class="btn btn-default btn-flat"><span class="fa fa-gears"></span>Pengaturan</a>
              </div>
              <div class="pull-right">
                <a href="../../controller/logout" class="btn btn-default btn-flat"><span class="fa fa-power-off"></span>Keluar</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
