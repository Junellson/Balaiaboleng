<?php
//SETING WAKTU
date_default_timezone_set('Asia/Jakarta');
$sekarang = date("d/m/Y H:i:s");
$tgl_sekarang = date("Y-m-d");
$bulan_sekarang = date("m");
$tahun_sekarang = date("Y");
$bulan_tahun_sekarang = $tahun_sekarang . "-" . $bulan_sekarang;

//CARI TOTAL PEMBAYARAN CASH UNTUK HARI INI
$q_cari_cash = mysqli_query($koneksi, "SELECT SUM(total_harga) AS harga_cash FROM (SELECT total_harga FROM tb_transaksi INNER JOIN tb_cart ON tb_cart.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi IN (SELECT id_transaksi FROM tb_transaksi WHERE tgl_transaksi_final like '$tgl_sekarang%' and metode_pembayaran='Cash') GROUP by tb_transaksi.id_transaksi) as harga_cash");
$cari_cash = mysqli_fetch_array($q_cari_cash);

//CARI TOTAL PEMBAYARAN TRANSFER UNTUK HARI INI
$q_cari_transfer = mysqli_query($koneksi, "SELECT SUM(total_harga) AS harga_transfer FROM (SELECT total_harga FROM tb_transaksi INNER JOIN tb_cart ON tb_cart.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi IN (SELECT id_transaksi FROM tb_transaksi WHERE tgl_transaksi_final like '$tgl_sekarang%' and metode_pembayaran='Bank Transfer') GROUP by tb_transaksi.id_transaksi) as harga_transfer");
$cari_transfer = mysqli_fetch_array($q_cari_transfer);

//CARI TOTAL PEMBAYARAN Gopay UNTUK HARI INI
$q_cari_gopay = mysqli_query($koneksi, "SELECT SUM(total_harga) AS harga_gopay FROM (SELECT total_harga FROM tb_transaksi INNER JOIN tb_cart ON tb_cart.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi IN (SELECT id_transaksi FROM tb_transaksi WHERE tgl_transaksi_final like '$tgl_sekarang%' and metode_pembayaran='GoPay') GROUP by tb_transaksi.id_transaksi) as harga_gopay");
$cari_gopay = mysqli_fetch_array($q_cari_gopay);

//CARI TOTAL PEMBAYARAN GoFood UNTUK HARI INI
$q_cari_gofood = mysqli_query($koneksi, "SELECT SUM(total_harga) AS harga_gofood FROM (SELECT total_harga FROM tb_transaksi INNER JOIN tb_cart ON tb_cart.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi IN (SELECT id_transaksi FROM tb_transaksi WHERE tgl_transaksi_final like '$tgl_sekarang%' and metode_pembayaran='GoFood') GROUP by tb_transaksi.id_transaksi) as harga_gofood");
$cari_gofood = mysqli_fetch_array($q_cari_gofood);

?>
<div class="p-4" id="main-content">
    <div class="card">
        <div class="card-title pt-4 text-center">
            <h4>LAPORAN PENJUALAN</h4>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-8">
                    <canvas id="myChart" width="200" height="100"></canvas>
                </div>
                <div class="col-md-4">
                    <canvas id="myChart2" width="200" height="100"></canvas>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-12">
                    <b>Data Penjualan Tanggal :</b> <?php echo $sekarang ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-title p-2 text-center bg-dark text-light">
                            <b>Cash</b>
                        </div>
                        <div class="card-body card-body text-center text-primary font-weight-bold">
                            Rp. <?php echo number_format(($cari_cash['harga_cash']), 0, ",", "."); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-title p-2 text-center bg-dark text-light">
                            <b>Bank Transfer</b>
                        </div>
                        <div class="card-body card-body text-center text-primary font-weight-bold">
                            Rp. <?php echo number_format(($cari_transfer['harga_transfer']), 0, ",", "."); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-title p-2 text-center bg-dark text-light">
                            <b>GoPay</b>
                        </div>
                        <div class="card-body card-body text-center text-primary font-weight-bold">
                            Rp. <?php echo number_format(($cari_gopay['harga_gopay']), 0, ",", "."); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-title p-2 text-center bg-dark text-light">
                            <b>GrabFood</b>
                        </div>
                        <div class="card-body text-center text-primary font-weight-bold">
                            Rp. <?php echo number_format(($cari_gofood['harga_gofood']), 0, ",", "."); ?>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-title text-center p-3">
                            <h5><b class="text-success">Export Data</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Export Data</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="jenisnya" onchange="changejenis()">
                                        <option value="harian">Harian</option>
                                        <option value="bulanan">Bulanan</option>
                                        <option value="tahunan">Tahunan</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="card" id="exportharian">
                                <form method="POST" action="modul/mod_home/export-harian.php">
                                    <div class="card-body">
                                        <div class="form-group row mt-2">
                                            <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold text-primary">Pilih Tanggal Awal</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" required>
                                            </div>
                                            <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold text-primary">Pilih Tanggal Akhir</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" required>
                                            </div>
                                            <div class="col-sm-12 text-center mt-4">
                                                <button type="submit" class="btn btn-block btn-success">Export</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card" id="exportbulanan" style="display: none;">
                                <form method="POST" action="modul/mod_home/export-bulanan.php">
                                    <div class="card-body">
                                        <div class="form-group row mt-2">
                                            <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold text-primary">Pilih Bulan</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" id="bulanexport" name="bulanexport">
                                                    <option> --- Pilih Bulan --- </option>
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                            <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold text-primary">Pilih Tahun</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="tahunexport" id="tahunexport">
                                                    <option> --- Pilih Tahun --- </option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 text-center mt-4">
                                                <button type="submit" class="btn btn-block btn-success">Export</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card" id="exporttahunan" style="display: none;">
                                <form method="POST" action="modul/mod_home/export-tahunan.php">
                                    <div class="card-body">
                                        <div class="form-group row mt-2">
                                            <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold text-primary">Pilih Tahun</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="tahunanexport" id="tahunanexport">
                                                    <option> --- Pilih Tahun --- </option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 text-center">
                                                <button type="submit" class="btn btn-block btn-success">Export</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function changejenis() {
        var jenisnya = document.getElementById("jenisnya");
        if (jenisnya.value == "bulanan") {
            document.getElementById("exportbulanan").style.display = 'block';
            document.getElementById("exportharian").style.display = 'none';
            document.getElementById("exporttahunan").style.display = 'none';

        } else if (jenisnya.value == "tahunan") {
            document.getElementById("exportbulanan").style.display = 'none';
            document.getElementById("exportharian").style.display = 'none';
            document.getElementById("exporttahunan").style.display = 'block';
        } else {
            document.getElementById("exportbulanan").style.display = 'none';
            document.getElementById("exportharian").style.display = 'block';
            document.getElementById("exporttahunan").style.display = 'none';
        }
    }
</script>
<?php
//SIAP SIAP DAPATKAN DATA TANGGAL UNTUK DILAKUKAN LOOP
$d = cal_days_in_month(CAL_GREGORIAN, $bulan_sekarang, $tahun_sekarang);
$tgl_cart = array();
$bulan_cart = array();
for ($x = 1; $x <= $d; $x++) {
    if ($x < 10) {
        $x_final = "0" . $x;
    } else {
        $x_final = $x;
    }
    $tgl_cart[] = $x_final;
    $loopharian = $bulan_tahun_sekarang . "-" . $x_final;
    $q_transaksiharian = mysqli_query($koneksi, "SELECT SUM(total_harga) as transaksi from tb_transaksi WHERE tgl_transaksi_final like '%$loopharian%'");
    while ($transaksiharian = mysqli_fetch_array($q_transaksiharian)) {
        $bulan_cart[] = $transaksiharian['transaksi'];
    }
}
$label = json_encode($tgl_cart);
$datatrans = json_encode($bulan_cart);
?>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo $label; ?>,
            datasets: [{
                label: 'Grafik Penjualan',
                data: <?php echo $datatrans; ?>,

                borderWidth: 1,
                borderColor: ["#03A9F5"],
                fill: false,
            }],
            minBarLength: 0, // This is the important line!

        },

        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        min: -3,
                    }
                }]
            }
        }
    });
</script>
<?php
//SIAP SIAP DAPATKAN DATA ITEM UNTUK DILAKUKAN LOOP
$total_item = array();
$nama_item = array();

$q_transaksiitemterjual = mysqli_query($koneksi, "SELECT *, tb_menu.id_menu as id_menunya FROM tb_cart JOIN tb_menu ON (tb_cart.id_menu=tb_menu.id_menu) WHERE tb_cart.tgl_transaksi like '%$bulan_tahun_sekarang%' GROUP BY tb_menu.id_menu");
while ($transaksiitemterjual = mysqli_fetch_array($q_transaksiitemterjual)) {
    //LAKUKAN PERBARIS, CARI TOTAL KUANTITI DARI QUERY DIATAS
    $q_cariqty = mysqli_query($koneksi, "SELECT SUM(qty) as total_qty FROM tb_cart WHERE tgl_transaksi LIKE '%$bulan_tahun_sekarang%' AND id_menu='$transaksiitemterjual[id_menunya]'");
    $cariqty = mysqli_fetch_array($q_cariqty);
    $total_item[] = $cariqty['total_qty'];
    $nama_item[] = $transaksiitemterjual['nama_menu'];
}

$label2 = json_encode($nama_item);
$datatrans2 = json_encode($total_item);
// echo $nama_item;
?>
<script>
    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo $label2; ?>,
            datasets: [{
                label: 'Item Terjual',
                data: <?php echo $datatrans2; ?>,

                borderWidth: 1,
                borderColor: ["#03A9F5"],
                fill: false,
            }],
            minBarLength: 0, // This is the important line!

        },

        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        min: -3,
                    }
                }]
            }
        }
    });
</script>