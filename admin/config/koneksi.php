<?php
$koneksi = mysqli_connect('localhost','root','','db_balai_aboleng');
	if (mysqli_connect_error()){
		echo "database gagal :" . mysqli_connect_error();
	}
?>