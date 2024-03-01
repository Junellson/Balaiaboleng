<?php
include "../../config/koneksi.php";

if ($_GET['module']=='home'){
  include "sidebar.php";
  include "modul/mod_home/home.php";
}
elseif ($_GET['module']=='menu'){
  include "sidebar.php";
  include "modul/mod_menu/menu.php";
}
elseif ($_GET['module']=='hapus-menu'){
  include "sidebar.php";
  include "modul/mod_menu/hapus-menu.php";
}

// Apabila modul tidak ditemukan
else{
  include "sidebar.php";
  include "../../pages-error-404.html";
}
?>
