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

//LAKUKAN PENCARIAN TOTAL HARGA
$q_totalharga = mysqli_query($koneksi, "SELECT SUM(total_harga) AS total_harga FROM tb_cart JOIN tb_transaksi ON (tb_cart.id_transaksi=tb_transaksi.id_transaksi) WHERE tb_cart.id_transaksi='$getrecenttransaction[id_cari]'");
$totalharga = mysqli_fetch_array($q_totalharga);

?>
<div class="p-4" id="main-content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" style="overflow-y: scroll;">
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

                                            <a href="#" onClick="window.open('modul/mod_menu/edit-menu.php?id=<?php echo $loop['id_menu']; ?>', '_blank', 'toolbar=no,scrollbars=yes,resizable=no,top=300,left=500,width=550,height=500')" class="stretched-link"></a>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="col-md-3">
                                    <div class="card" style="height: 8rem;margin:15px;">
                                        <div class="card-body text-center" style="margin:auto;padding:30px">
                                            <h1 class="font-weight-bold">
                                                +
                                                </h2>
                                        </div>

                                        <a href="#" onClick="window.open('modul/mod_menu/tambah-menu.php', '_blank', 'toolbar=no,scrollbars=yes,resizable=no,top=300,left=500,width=550,height=500')" class="stretched-link"></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</div>