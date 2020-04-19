<?php 
    require_once "../../controller/koneksi.php";
    include "../../controller/session.php";
?>

<header class="header-area">
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="akameNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index"><h3>INFO TANI</h3></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li><a href="./index">Beranda</a></li>
                                <li><a href="#cari" target="_top" onclick="document.getElementById(&#39;popup_searchBox&#39;).style.display = &#39;block&#39;;" id="search-text" name="cari" placeholder="" type="text" >Cari</a></li>
                                <li><a href="./tentangkami">Tentang Kami</a></li>
                                <li><a href="./contact">Kontak</a></li>
                            </ul>

                            <!-- Book Icon -->
                            <div class="book-now-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                                <a href="./login" class="btn akame-btn"><?php if(isset($login_session)||isset($id_pengguna)){ 
                                    echo "Dashboard";
                                    }else{ echo "Masuk";}?></a>
                            </div>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
    
  <div id ="cari">
<div id="popup_searchBox" style="display:none;">
  <button class='keluar' onclick="document.getElementById('popup_searchBox').style.display = 'none';">Close</button>
  <div id="popup_searchBox_Data">
    <div class="search-form-wrapper" style="display: block;">
      <form action="cariHasil" class="search-form" method="post">
        <input class="search-text" placeholder="Cari Data" name="cari" type="text" value="" />
        <button type="submit" class="btn btn-md" name="submitcari" ><svg width="15px" height="15px" style="color:white;">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868
                            11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0
                            2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895
                            6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg></button>
      </form>
    </div>
  </div>
</div>
</div>
</header>
