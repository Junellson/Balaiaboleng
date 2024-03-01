<?php
include "../../config/koneksi.php";

if ($_GET['module']=='home'){
  include "sidebar.php";
  include "modul/mod_home/home.php";
}
elseif ($_GET['module']=='delete-cart'){
  include "modul/mod_transaksi/delete-cart.php";
}
if ($_GET['module']=='record-transaksi'){
  include "sidebar.php";
  include "modul/mod_record_transaksi/record-transaksi.php";
}
elseif ($_GET['module']=='pembatalan-transaksi'){
  include "modul/mod_record_transaksi/pembatalan-transaksi.php";
}
elseif ($_GET['module']=='delete-diskon'){
  include "modul/mod_transaksi/delete-diskon.php";
}


// Apabila modul tidak ditemukan
else{
  include "sidebar.php";
  include "../../pages-error-404.html";
}
?>
