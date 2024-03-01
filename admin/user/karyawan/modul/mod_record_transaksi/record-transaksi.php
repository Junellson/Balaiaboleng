<?php
//FUNGSI UNTUK SET DEFAULT TIMEZONE
date_default_timezone_set('Asia/Jakarta');
$hari_ini = date("Y-m-d H:i:s");
$today = date("Y-m-d");
$kemarin = date('Y-m-d', strtotime('-1 days', strtotime($hari_ini)));
$lastweek = date('Y-m-d', strtotime('-7 days', strtotime($hari_ini)));

//DAPATKAN ID TRANSAKSI
$id_transaksi = $_GET['id'];

$q_gettransaction = mysqli_query($koneksi, "SELECT id_transaksi as id_cari FROM tb_cart WHERE id_transaksi='$id_transaksi'");
$getrecenttransaction = mysqli_fetch_array($q_gettransaction);

//DAPATKAN INFORMASI DISKON
$q_cekdiskon = mysqli_query($koneksi, "SELECT * FROM tb_diskon WHERE id_transaksi='$id_transaksi'");
$cekdiskon = mysqli_fetch_array($q_cekdiskon);


?>
<div class="p-4" id="main-content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Cari Tanggal</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" id="cari_tanggal" name="cari_tanggal">

                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-dark">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row mt-2" style="height: 350px;overflow-y: scroll;">
                                <div class="col-md-12" id="hasil_cari">
                                    <div class="list-group">
                                        <?php
                                        $cari = $_POST['cari_tanggal'];

                                        if ($cari == "") {
                                            //LOOP TRANSAKSI SEMINGGU TERAKHIR
                                            $q_looptransaksi = mysqli_query($koneksi, "SELECT * FROM tb_cart JOIN tb_menu ON (tb_menu.id_menu=tb_cart.id_menu) JOIN tb_transaksi ON (tb_cart.id_transaksi=tb_transaksi.id_transaksi) WHERE tgl_transaksi BETWEEN '$lastweek' and '$hari_ini' GROUP BY tgl_transaksi_final ORDER BY tgl_transaksi DESC");
                                            $ceklooptransaksi = mysqli_num_rows($q_looptransaksi);
                                            if ($ceklooptransaksi > 0) {
                                                while ($looptransaksi = mysqli_fetch_array($q_looptransaksi)) {
                                                    
                                        ?>


                                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start bg-dark text-light">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <h5 class="mb-1">
                                                                    <?php
                                                                    //KONDISIKAN HEADER NYA
                                                                    if ($today == $looptransaksi['tgl_transaksi_final']) {
                                                                        echo "Today";
                                                                    } elseif ($kemarin == $looptransaksi['tgl_transaksi_final']) {
                                                                        echo "Yesterday";
                                                                    } else {
                                                                        echo date('d F Y', strtotime($looptransaksi['tgl_transaksi_final']));
                                                                    }
                                                                    ?>
                                                                </h5>
                                                            </div>
                                                        </a>
                                                        <?php
                                                        $q_loopmenuterjual = mysqli_query($koneksi, "SELECT * FROM tb_cart JOIN tb_menu ON (tb_cart.id_menu=tb_menu.id_menu) JOIN tb_transaksi ON (tb_transaksi.id_transaksi=tb_cart.id_transaksi) WHERE tgl_transaksi like '%$looptransaksi[tgl_transaksi_final]%' GROUP BY tb_cart.id_transaksi ORDER BY tgl_transaksi DESC");
                                                        while ($loopmenuterjual = mysqli_fetch_array($q_loopmenuterjual)) {
                                                        ?>
                                                        <a href="media.php?module=record-transaksi&&id=<?php echo $loopmenuterjual['id_transaksi']; ?>" class="list-group-item list-group-item-action flex-column align-items-start <?php if ($loopmenuterjual['metode_pembayaran'] == "WAITING PAYMENT") {echo "bg-danger text-light";} ?>">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <?php
                                                                    if ($loopmenuterjual['metode_pembayaran'] == "Cash") {
                                                                        echo "C";
                                                                    } else if ($loopmenuterjual['metode_pembayaran'] == "Bank Transfer") {
                                                                        echo "TF";
                                                                    } else if ($loopmenuterjual['metode_pembayaran'] == "GoPay") {
                                                                        echo "G";
                                                                    } else if ($loopmenuterjual['metode_pembayaran'] == "GoFood") {
                                                                        echo "GF";
                                                                    } else {
                                                                        echo "#";
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <?php echo number_format($loopmenuterjual['total_harga'], 0, ",", "."); ?> <br>
                                                                    <?php
                                                                    echo $loopmenuterjual['nama_menu'];
                                                                    ?>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <?php
                                                                    //POTONG DAN AMBIL JAM NYA AJA
                                                                    $jamtransaksi = substr($loopmenuterjual['tgl_transaksi'], 11, 5);
                                                                    echo $jamtransaksi;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </a>
                                                <?php
                                                    }
                                                }
                                            } else {
                                                ?>
                                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start text-center">
                                                    <p class="mb-1">No Data.</p>
                                                    <small class="text-muted">No Transaction Found.</small>
                                                </a>

                                            <?php

                                            }

                                            ?>
                                    </div>
                                </div>
                            <?php
                                        } else {
                            ?>
                                <div class="col-md-12" id="hasil_cari">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start bg-dark text-light">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Transaksi Tanggal <?php echo date("d/m/Y", strtotime($cari)); ?></h5>
                                            </div>
                                        </a>
                                        <?php
                                            //MULAI LOOPING UNTUK TRANSAKSI HARI INI
                                            $q_loopcari = mysqli_query($koneksi, "SELECT * FROM tb_cart JOIN tb_menu ON (tb_menu.id_menu=tb_cart.id_menu) JOIN tb_transaksi ON (tb_cart.id_transaksi=tb_transaksi.id_transaksi) WHERE tgl_transaksi LIKE '%$cari%' GROUP BY tb_cart.id_transaksi ORDER BY tgl_transaksi DESC");
                                            $cekloopcari = mysqli_num_rows($q_loopcari);
                                            if ($cekloopcari > 0) {
                                                while ($loopcari = mysqli_fetch_array($q_loopcari)) {
                                                    //CARI TOTAL
                                                    $totalakhircari = $loopcari['total_harga'];


                                        ?>
                                                <a href="media.php?module=record-transaksi&&id=<?php echo $loopcari['id_transaksi']; ?>" class="list-group-item list-group-item-action flex-column align-items-start <?php if ($loopcari['metode_pembayaran'] == "WAITING PAYMENT") { echo "bg-danger text-light";} ?>">
                                                
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <?php
                                                            if ($loopcari['metode_pembayaran'] == "Cash") {
                                                                echo "C";
                                                            } else if ($loopcari['metode_pembayaran'] == "Bank Transfer") {
                                                                echo "TF";
                                                            } else if ($loopcari['metode_pembayaran'] == "GoPay") {
                                                                echo "G";
                                                            } else if ($loopcari['metode_pembayaran'] == "GoFood") {
                                                                echo "G";
                                                            } else {
                                                                echo "#";
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <?php echo number_format($totalakhircari, 0, ",", "."); ?> <br>
                                                            <?php
                                                            echo $loopcari['nama_menu'];
                                                            ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <?php
                                                            //POTONG DAN AMBIL JAM NYA AJA
                                                            $jamtransaksicari = substr($loopcari['tgl_transaksi'], 11, 5);
                                                            echo $jamtransaksicari;
                                                            ?>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php
                                                }
                                            } else {
                                            ?>
                                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start text-center">
                                                <p class="mb-1">No Data.</p>
                                                <small class="text-muted">No Transaction Found.</small>
                                            </a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card p-4">
                <div class="card-title font-weight-bold">
                    <h4>INFORMASI TRANSAKSI</h4>
                </div>
                <div>
                    <div class="card-body">
                        <?php
                        //DAPATKAN DATA BERDASARKAN DATA YANG DIPILIH
                        $q_getdata = mysqli_query($koneksi, "SELECT * FROM tb_cart JOIN tb_menu ON (tb_menu.id_menu=tb_cart.id_menu) JOIN tb_transaksi ON (tb_cart.id_transaksi=tb_transaksi.id_transaksi) WHERE tb_cart.id_transaksi='$getrecenttransaction[id_cari]'");
                        $getdata = mysqli_fetch_array($q_getdata);
                        ?>
                        <table width="100%" class="table table-hover">
                            <tr>
                                <td width="40%">Metode Pembayaran</td>
                                <td width="10%">:</td>
                                <td width="50%"><?php echo $getdata['metode_pembayaran']; ?></td>
                            </tr>
                            <tr>
                                <td>Waktu Transaksi</td>
                                <td>:</td>
                                <td><?php echo date('d F Y, H:i:s', strtotime($getdata['tgl_transaksi'])); ?></td>
                            </tr>
                            <tr>
                                <td>Uang yang Dibayar</td>
                                <td>:</td>
                                <td>Rp. <?php echo number_format($getdata['uang_diterima'], 0, ",", ".") ?></td>
                            </tr>
                            <tr>
                                <td>Kembalian</td>
                                <td>:</td>
                                <td>Rp. <?php
                                        //JIKA MASIH WAITING PAYMENT BERARTI KEMBALIAN == 0
                                        if ($getdata['metode_pembayaran'] == "WAITING PAYMENT") {
                                            echo "0";
                                        } else {
                                            echo number_format(($getdata['uang_diterima'] - ($getdata['total_harga'])), 0, ",", ".");
                                        } ?>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="card-title font-weight-bold">
                        <h4>MENU</h4>
                    </div>
                    <div class="card-body" style="background-color: #d1d9e6;">
                        <table class="table">
                            <?php
                            //LOOP MENU BERDASARKAN TRANSAKSI
                            $q_loopmenu = mysqli_query($koneksi, "SELECT * FROM tb_cart JOIN tb_menu ON (tb_menu.id_menu=tb_cart.id_menu) WHERE id_transaksi='$getrecenttransaction[id_cari]'");
                            while ($loopmenu = mysqli_fetch_array($q_loopmenu)) {


                            ?>
                                <tr>
                                    <td><?php echo $loopmenu['nama_menu']; ?></td>
                                    <td>x <?php echo $loopmenu['qty']; ?></td>
                                    <td>
                                        Rp. <?php if ($getdata['jenis_pembayaran'] == 'online') {
                                                echo number_format($loopmenu['harga_online'], 0, ",", ".");
                                            } else {
                                                echo number_format($loopmenu['harga_offline'], 0, ",", ".");
                                            }; ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                            <tr>
                                <td colspan="3" style="border-bottom: 1px solid grey;"></td>
                            </tr>
                            <tr>
                                <td>Diskon <?php echo $cekdiskon['persentase_diskon']; ?>%</td>
                                <td>:</td>
                                <td>Rp. <?php echo number_format($getdata['nominal_diskon'], 0, ",", "."); ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>:</td>
                                <td class="font-weight-bold">Rp. <?php echo number_format($getdata['total_harga'], 0, ",", "."); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-12">
                            <a href="media.php?module=pembatalan-transaksi&&id=<?php echo $getrecenttransaction['id_cari'] ?>" class="btn btn-danger btn-block" onclick="return confirm('Yakin Ingin Membatalkan Transaksi Ini?')">Batalkan Transaksi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
    function hide() {
        document.getElementById("hasil_cari").style.display = 'none';

    }
</script>