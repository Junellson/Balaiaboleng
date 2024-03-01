<?php
include "config/koneksi.php";

$username=$_POST['username'];
$password= md5($_POST['password']);

$qry=mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
$jumpa=mysqli_num_rows($qry);
$hasil=mysqli_fetch_array($qry);

//FUNGSI UNTUK CLEARKAN TRANSAKSI TEMPORARY SEBELUMNYA
$q_clean = mysqli_query($koneksi, "DELETE FROM tb_cart WHERE nama_bill=''");

if ($jumpa > 0) {
	session_start();
    $_SESSION['id_user']= $hasil['id_user'];
	$_SESSION['username']= $hasil['username'];
    $_SESSION['level']= $hasil['level'];
	
    if ($hasil['level']=="admin") {
        echo 
        '<script language="javascript">
        alert("Berhasil Login!");
        window.location="user/admin/media.php?module=home";
        </script>';
        exit();
        
    } elseif ($hasil['level']=="karyawan") {
        echo 
        '<script language="javascript">
        alert("Berhasil Login!");
        window.location="user/karyawan/media.php?module=home";
        </script>';
        exit();
        
    } else {
        echo 
        '<script language="javascript">
        alert("Invalid Account!");
        window.location="index.php";
        </script>';
        exit();
    }

	
}
else {
	echo '<script language="javascript">
	alert("Username atau Password yang Anda Masukkan Salah, Silahkan Coba Kembali!");
	window.location="index.php";
	</script>';
	exit();
}
