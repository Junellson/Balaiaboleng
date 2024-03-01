<?php
include "../../../../config/koneksi.php";

$cari_tanggal = $_GET['cari_tanggal'];

$query = mysqli_query($koneksi, "SELECT *, SUM(harga) AS total_harga FROM tb_cart JOIN tb_menu ON (tb_menu.id_menu=tb_cart.id_menu) JOIN tb_transaksi ON (tb_cart.id_transaksi=tb_transaksi.id_transaksi) WHERE tgl_transaksi LIKE '%$cari_tanggal%' GROUP BY tb_cart.id_transaksi");
$num_rows = mysqli_num_rows($query);
if ($num_rows == 0) {
    echo '
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start bg-dark text-light">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Hasil Pencarian'.$cari_tanggal.'</h5>
            </div>
        </a>
        <div class="row">
            <div class="col-md-12">No Data</div>
        </div>
    ';
} else {

echo 
    '
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start bg-dark text-light">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Hasil Pencarian'.$cari_tanggal.'</h5>
            </div>
        </a>
        <div class="row">
            <div class="col-md-12">No Data</div>
        </div>
    ';
}
