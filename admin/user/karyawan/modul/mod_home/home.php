<?php
//DAPATKAN ID TRANSAKSI TERBARU JIKA REQUEST DEFAULT, JIKA TIDAK MUNCULKAN SESUAI ID YANG DICARI
$id_transaksi = $_GET['id'];
if ($id_transaksi == "") {
    $q_gettransaction = mysqli_query($koneksi, "SELECT MAX(tb_cart.id_transaksi) as id_cari FROM tb_cart LEFT JOIN tb_transaksi ON (tb_cart.id_transaksi=tb_transaksi.id_transaksi) WHERE (tb_transaksi.metode_pembayaran IS NULL)");
    $getrecenttransaction = mysqli_fetch_array($q_gettransaction);
} else {
    $q_gettransaction = mysqli_query($koneksi, "SELECT id_transaksi as id_cari FROM tb_cart WHERE id_transaksi='$id_transaksi'");
    $getrecenttransaction = mysqli_fetch_array($q_gettransaction);
}

//LAKUKAN PENGECEKAN DISKON?
$q_cekdiskon = mysqli_query($koneksi, "SELECT * FROM tb_diskon WHERE id_transaksi='$getrecenttransaction[id_cari]'");
$cekdiskon = mysqli_fetch_array($q_cekdiskon);

//LAKUKAN PENCARIAN TOTAL HARGA
$q_totalhargaoffline = mysqli_query($koneksi, "SELECT SUM(tb_menu.harga_offline * tb_cart.qty) AS total_harga_offline FROM tb_cart JOIN tb_menu ON (tb_menu.id_menu=tb_cart.id_menu) WHERE id_transaksi='$getrecenttransaction[id_cari]'");
$totalhargaoffline = mysqli_fetch_array($q_totalhargaoffline);

$q_totalhargaonline = mysqli_query($koneksi, "SELECT SUM(tb_menu.harga_online * tb_cart.qty) AS total_harga_online FROM tb_cart JOIN tb_menu ON (tb_menu.id_menu=tb_cart.id_menu) WHERE id_transaksi='$getrecenttransaction[id_cari]'");
$totalhargaonline = mysqli_fetch_array($q_totalhargaonline);






?>
<div class="p-4" id="main-content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8" style="overflow-y: scroll;">
                    <div class="card">
                        <div class="card-body" style="background-color: #d1d9e6;">
                            <div class="row">
                                <?php
                                //LAKUKAN LOOPING MENU DISINI
                                $q_loop = mysqli_query($koneksi, "SELECT * FROM tb_menu");
                                while ($loop = mysqli_fetch_array($q_loop)) {
                                ?>
                                    <div class="col-md-3">
                                        <div class="card" style="height: 8rem;margin:15px;">
                                            <div class="card-body text-center">
                                                <h2 class="font-weight-bold">
                                                    <?php
                                                    //MUNCULKAN KODE MENU
                                                    echo $loop['kode_menu'];
                                                    ?>
                                                </h2>
                                                <div class="text-primary">
                                                    <?php
                                                    //MUNCULKAN NAMA MENU
                                                    echo $loop['nama_menu'];
                                                    ?>
                                                </div>

                                            </div>

                                            <a href="#" onClick="window.open('modul/mod_transaksi/insert-cart.php?id=<?php echo $loop['id_menu']; ?>&&id_trans=<?php echo $getrecenttransaction['id_cari']; ?>', '_blank', 'toolbar=no,scrollbars=yes,resizable=no,top=300,left=500,width=550,height=500')" class="stretched-link"></a>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body" style="background: #e0e0e0;">
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-title">
                                            <select class="form-control" style="text-align:center;font-weight:bold; background:grey;color:black;" onchange="set_jenis()" id="jenis_payment">
                                                <option value="offline">Offline</option>
                                                <option value="online">Online</option>
                                            </select>
                                        </div>
                                        <div class="card-body" id="card-offline">
                                            <table class="table table-hover" width="100%">
                                                <?php
                                                //LAKUKAN LOOP MENU PADA TABLE
                                                $q_getcartoffline = mysqli_query($koneksi, "SELECT * FROM tb_cart JOIN tb_menu ON (tb_menu.id_menu=tb_cart.id_menu) WHERE id_transaksi='$getrecenttransaction[id_cari]'");

                                                //BACA DULU KONDISINYA, JIKA KOSONG MAKA MUNCULKAN PESAN
                                                $num_rows_offline = mysqli_num_rows($q_getcartoffline);
                                                if ($num_rows_offline < 1) {
                                                    echo "
                                                    <tr>
                                                        <td colspan='4' class='text-center font-weight-bold text-dark'>Empty Cart</td>
                                                    </tr>
                                                    ";
                                                } else {

                                                    while ($getcartoffline = mysqli_fetch_array($q_getcartoffline)) {


                                                ?>
                                                        <tr>
                                                            <td colspan="2"><?php echo $getcartoffline['nama_menu']; ?></td>
                                                            <td class="text-muted">x <?php echo $getcartoffline['qty'] ?></td>
                                                            <td class="text-right"><?php echo number_format($getcartoffline['harga_offline'], 0, ",", ".") ?> <a href="media.php?module=delete-cart&&id=<?php echo $getcartoffline['id_cart'] ?>"><i class="bi bi-trash"></i></a></td>
                                                        </tr>
                                                <?php

                                                    }
                                                }
                                                ?>
                                            </table>
                                            <hr>
                                            <table class="table">
                                                <tr>
                                                    <td>Diskon <?php echo $cekdiskon['persentase_diskon']?>%</td>
                                                    <td>:</td>
                                                    <td class="text-right">Rp. <?php echo number_format($totalhargaoffline['total_harga_offline'] * $cekdiskon['persentase_diskon'] / 100, 0, ",", "."); ?> <a href="media.php?module=delete-diskon&&id=<?php echo $getrecenttransaction['id_cari'];?>"><i class="bi bi-trash"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold" width="40%">
                                                        Total
                                                    </td>
                                                    <td class="font-weight-bold" width="5%">:</td>
                                                    <td width="55%" class="font-weight-bold text-right">Rp. <?php echo number_format($totalhargaoffline['total_harga_offline'] - ($totalhargaoffline['total_harga_offline'] * $cekdiskon['persentase_diskon'] / 100), 0, ",", "."); ?></td>
                                                </tr>
                                            </table>
                                            <div class="row mb-3 gy-3">
                                                <div class="col-md-6">
                                                    <button class="btn btn-secondary btn-block btn-lg" onClick="window.open('modul/mod_transaksi/simpan-bill.php?id=<?php echo $getrecenttransaction['id_cari']; ?>&&total=<?php echo $totalhargaoffline['total_harga_offline'] - ($totalhargaoffline['total_harga_offline'] * $cekdiskon['persentase_diskon'] / 100) ?>', '_blank', 'toolbar=no,scrollbars=yes,resizable=no,top=300,left=500,width=550,height=500')">Simpan Bill</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-secondary btn-block btn-lg" onClick="window.open('modul/mod_transaksi/lihat-bill.php', '_blank', 'toolbar=no,scrollbars=yes,resizable=no,top=300,left=500,width=550,height=500')">Lihat Bill</button>
                                                </div>
                                            </div>
                                            <div class="row mb-3 gy-3">
                                                <div class="col-md-12">
                                                    <button class="btn btn-secondary btn-block btn-lg" onClick="window.open('modul/mod_transaksi/tambah-diskon.php?id=<?php echo $getrecenttransaction['id_cari']; ?>', '_blank', 'toolbar=no,scrollbars=yes,resizable=no,top=300,left=500,width=550,height=500')" <?php if (($cekdiskon['id_diskon']!="") || $totalhargaoffline == "") {echo "disabled";}?>>Diskon</button>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button id="btn-offline" <?php if ($totalhargaoffline['total_harga_offline'] == 0) {
                                                                                    echo "disabled";
                                                                                } ?> class="btn btn-secondary btn-block btn-lg" onClick="window.open('modul/mod_transaksi/input-pembayaran.php?id=<?php echo $getrecenttransaction['id_cari']; ?>&&jenis=offline&&total=<?php echo $totalhargaoffline['total_harga_offline'] - ($totalhargaoffline['total_harga_offline'] * $cekdiskon['persentase_diskon'] / 100); ?>&&diskon=<?php echo $totalhargaoffline['total_harga_offline'] * $cekdiskon['persentase_diskon'] / 100;?>', '_blank', 'toolbar=no,scrollbars=no,resizable=no,top=300,left=500,width=550,height=500')"><?php if ($totalhargaoffline['total_harga_offline'] == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                    echo "Empty Cart";
                                                                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                    echo number_format($totalhargaoffline['total_harga_offline'] - ($totalhargaoffline['total_harga_offline'] * $cekdiskon['persentase_diskon'] / 100), 0, ",", ".");
                                                                                                                                                                                                                                                                                                                                                                                                                                } ?></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" id="card-online" style="display: none;">
                                            <table class="table table-hover" width="100%">
                                                <?php
                                                //LAKUKAN LOOP MENU PADA TABLE
                                                $q_getcartonline = mysqli_query($koneksi, "SELECT * FROM tb_cart JOIN tb_menu ON (tb_menu.id_menu=tb_cart.id_menu) WHERE id_transaksi='$getrecenttransaction[id_cari]'");

                                                //BACA DULU KONDISINYA, JIKA KOSONG MAKA MUNCULKAN PESAN
                                                $num_rows_online = mysqli_num_rows($q_getcartonline);
                                                if ($num_rows_online < 1) {
                                                    echo "
                                                    <tr>
                                                        <td colspan='4' class='text-center font-weight-bold text-dark'>Empty Cart</td>
                                                    </tr>
                                                    ";
                                                } else {

                                                    while ($getcartonline = mysqli_fetch_array($q_getcartonline)) {


                                                ?>
                                                        <tr>
                                                            <td colspan="2"><?php echo $getcartonline['nama_menu']; ?></td>
                                                            <td class="text-muted">x <?php echo $getcartonline['qty'] ?></td>
                                                            <td class="text-right"><?php echo number_format($getcartonline['harga_online'], 0, ",", ".") ?> <a href="media.php?module=delete-cart&&id=<?php echo $getcartonline['id_cart'] ?>"><i class="bi bi-trash"></i></a></td>
                                                        </tr>
                                                <?php

                                                    }
                                                }
                                                ?>
                                            </table>
                                            <hr>
                                            <table class="table">
                                                <tr>
                                                    <td>Diskon <?php echo $cekdiskon['persentase_diskon']?>%</td>
                                                    <td>:</td>
                                                    <td class="text-right">Rp. <?php echo number_format($totalhargaonline['total_harga_online'] * $cekdiskon['persentase_diskon'] / 100, 0, ",", "."); ?> <a href="media.php?module=delete-diskon&&id=<?php echo $getrecenttransaction['id_cari'];?>"><i class="bi bi-trash"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold" width="40%">
                                                        Total
                                                    </td>
                                                    <td class="font-weight-bold" width="5%">:</td>
                                                    <td width="55%" class="font-weight-bold text-right">Rp. <?php echo number_format($totalhargaonline['total_harga_online'] - ($totalhargaonline['total_harga_online'] * $cekdiskon['persentase_diskon'] / 100), 0, ",", "."); ?></td>
                                                </tr>
                                            </table>
                                            <div class="row mb-3 gy-3">
                                                <div class="col-md-6">
                                                    <button class="btn btn-secondary btn-block btn-lg" onClick="window.open('modul/mod_transaksi/simpan-bill.php?id=<?php echo $getrecenttransaction['id_cari']; ?>&&total=<?php echo $totalhargaonline['total_harga_online'] - ($totalhargaonline['total_harga_online'] * $cekdiskon['persentase_diskon'] / 100)?>', '_blank', 'toolbar=no,scrollbars=yes,resizable=no,top=300,left=500,width=550,height=500')">Simpan Bill</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-secondary btn-block btn-lg" onClick="window.open('modul/mod_transaksi/lihat-bill.php', '_blank', 'toolbar=no,scrollbars=yes,resizable=no,top=300,left=500,width=550,height=500')">Lihat Bill</button>
                                                </div>
                                            </div>
                                            <div class="row mb-3 gy-3">
                                                <div class="col-md-12">
                                                    <button class="btn btn-secondary btn-block btn-lg" onClick="window.open('modul/mod_transaksi/tambah-diskon.php?id=<?php echo $getrecenttransaction['id_cari']; ?>', '_blank', 'toolbar=no,scrollbars=yes,resizable=no,top=300,left=500,width=550,height=500')" <?php if (($cekdiskon['id_diskon']!="") || $totalhargaonline == "") {echo "disabled";}?>>Diskon</button>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button id="btn-online" <?php if ($totalhargaonline['total_harga_online'] == 0) {
                                                                                    echo "disabled";
                                                                                } ?> class="btn btn-secondary btn-block btn-lg" onClick="window.open('modul/mod_transaksi/input-pembayaran.php?id=<?php echo $getrecenttransaction['id_cari']; ?>&&jenis=online&&total=<?php echo $totalhargaonline['total_harga_online']; ?>', '_blank', 'toolbar=no,scrollbars=no,resizable=no,top=300,left=500,width=550,height=500')"><?php if ($totalhargaonline['total_harga_online'] == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                    echo "Empty Cart";
                                                                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                    echo number_format($totalhargaonline['total_harga_online'] - ($totalhargaonline['total_harga_online'] * $cekdiskon['persentase_diskon'] / 100), 0, ",", ".");
                                                                                                                                                                                                                                                                                                                                                                                                                                } ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function set_jenis() {
        var jenis_payment = document.getElementById("jenis_payment");
        if (jenis_payment.value == "online") {
            document.getElementById("card-online").style.display = 'block';
            document.getElementById("card-offline").style.display = 'none';
        } else {
            document.getElementById("card-online").style.display = 'none';
            document.getElementById("card-offline").style.display = 'block';

        }
    }
</script>