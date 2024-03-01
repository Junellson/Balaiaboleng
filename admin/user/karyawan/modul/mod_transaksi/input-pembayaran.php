<?php
ob_start();
session_start();
error_reporting(0);

include "../../../../config/koneksi.php";

date_default_timezone_set('Asia/Jakarta');
$tgl_sekarang = date("Y-m-d");

//SIAP SIAP GET DATANYA
$id_transaksi = $_GET['id'];
$jenis = $_GET['jenis'];
$total = $_GET['total'];
$nominal_diskon = $_GET['diskon'];


if (isset($_GET['submit'])) {
    $id_transaksi_final = $_GET['id_transaksi_final'];
    $total_harga_final = $_GET['total_harga_final'];
    $jenis_pembayaran = $_GET['jenis_pembayaran'];
    $nominal_diskon_final = $_GET['nominal_diskon_final'];
    $uang_diterima = $_GET['uang_diterima'];
    $metode_pembayaran = $_GET['metode_pembayaran'];
    


    //CEK DULU TRANSAKSINYA, UANG NYA CUKUP GA? PASTIKAN KEMBALIAN TIDAK MINUS
    if (($uang_diterima - $total_harga_final) < 0) {
        echo
        "
        <script>
        alert('Uang Tidak Cukup!');
        window.history.back();
        </script>
        ";
    } else {


        //LAKUKAN CEK DULU APAKAH DATA INI GANTUNG? JIKA IYA MAKA LANJUTKAN DARI DATA SEBELUMNYA, JIKA TIDAK MASUKAN DATA BARU KE TABEL
        $q_cektransaksi = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_transaksi='$id_transaksi_final'");
        $numrows = mysqli_num_rows($q_cektransaksi);

        if ($numrows > 0) {
            $q_insertdata = mysqli_query($koneksi, "UPDATE tb_transaksi SET metode_pembayaran='$metode_pembayaran', jenis_pembayaran='$jenis_pembayaran', uang_diterima='$uang_diterima', total_harga='$total_harga_final', nominal_diskon='$nominal_diskon_final', tgl_transaksi_final='$tgl_sekarang' WHERE id_transaksi='$id_transaksi_final'");
        } else {
            $q_insertdata = mysqli_query($koneksi, "INSERT INTO tb_transaksi VALUES ('$id_transaksi_final', '$metode_pembayaran', '$jenis_pembayaran', '$total_harga_final','$uang_diterima', '$nominal_diskon_final', '$tgl_sekarang')");
            $q_updatecart = mysqli_query($koneksi, "UPDATE tb_cart set nama_bill='Payment Complete' WHERE id_transaksi='$id_transaksi_final'");
        }


        echo
        "
        <script>
        window.close();
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.document.location.href = '../../media.php?module=home';
    }
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Balai Aboleng</title>

    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <!-- CUSTOM STYLE UNTUK RADIOBOX -->
    <style>
        .donate-now {
            list-style-type: none;
            /* margin: 25px; */
        }

        .donate-now li {
            float: left;
            margin: 0 5px 5px 0;
            width: 200px;
            height: 40px;
            position: relative;
        }

        .donate-now label,
        .donate-now input {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .donate-now input[type="radio"] {
            opacity: 0.01;
            z-index: 100;
        }

        .donate-now input[type="radio"]:checked+label,
        .Checked+label {
            background: #d1d9e6;
        }

        .donate-now label {
            padding: 5px;
            border: 1px solid #CCC;
            cursor: pointer;
            z-index: 90;
        }

        .donate-now label:hover {
            background: #DDD;
        }
    </style>
</head>

<body>
    <div class="p-4" id="main-content">
        <div class="card">
            <div class="card-title font-weight-bold text-center text-light bg-dark p-2">
                <h4>PEMBAYARAN</h4>
            </div>
            <form>
                <div class="card-body">
                    <form method="GET">
                        <div class="row gy-1">
                            <div class="col-12" hidden>
                                <div class="form-group mb-3">
                                    <label for="input" class="mb-2">ID TRANSAKSI</label>
                                    <input type="text" class="form-control" name="id_transaksi_final" id="id_transaksi_final" value="<?php echo $id_transaksi; ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-3" hidden>
                                    <label for="input" class="mb-2">JENIS PEMBAYARAN</label>
                                    <input type="text" class="form-control" name="jenis_pembayaran" id="jenis_pembayaran" value="<?php echo $jenis; ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-3" hidden>
                                    <label for="input" class="mb-2">NOMINAL DISKON</label>
                                    <input type="text" class="form-control" name="nominal_diskon_final" id="nominal_diskon_final" value="<?php echo $nominal_diskon; ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="input" class="mb-2">Uang Total</label>
                                    <input type="text" class="form-control" name="total_harga_final" id="total_harga_final" value="<?php echo $total; ?>" hidden>
                                    <input type="text" class="form-control" value="<?php echo "Rp. " . number_format($total, 0, ",", "."); ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-5 col-form-label">Uang Diterima</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" id="uang_diterima" name="uang_diterima" placeholder="Masukan Nominal" onkeyup="isi_kembalian()" value="<?php echo $total;?>" required>
                                    <label class="text-muted" style="font-size:12px;margin-left:5px;" id="kembalian" name="kembalian">Kembalian : Rp. 0 </label>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center mt-2">
                            <div class="col-md-12">
                                Metode Pembayaran
                            </div>

                        </div>
                        <div class="row mt-2 mb-4">
                            <div class="col-md-12">
                                <ul class="donate-now">
                                    <li <?php if ($jenis=="online") {echo 'style="background-color: grey;"';}?>>
                                        <input type="radio" id="a25" name="metode_pembayaran" value="Cash" <?php if ($jenis=="online") {echo 'style="background-color: grey;" disabled';} else {echo "checked='checked'";}?> />
                                        <label for="a25">Cash</label>
                                    </li>
                                    <li <?php if ($jenis=="online") {echo 'style="background-color: grey;"';}?>>
                                        <input type="radio" id="a50" name="metode_pembayaran" value="Bank Transfer" <?php if ($jenis=="online") {echo 'style="background-color: grey;" disabled';}?>/>
                                        <label for="a50">Bank Transfer</label>
                                    </li>
                                    <li <?php if ($jenis=="offline") {echo 'style="background-color: grey;"';}?>>
                                        <input type="radio" id="a75" name="metode_pembayaran" value="GoPay" <?php if ($jenis=="offline") {echo 'style="background-color: grey;" disabled';} else {echo "checked='checked'";}?>/>
                                        <label for="a75">GoPay</label>
                                    </li>
                                    <li <?php if ($jenis=="offline") {echo 'style="background-color: grey;"';}?>>
                                        <input type="radio" id="a100" name="metode_pembayaran" value="GoFood" <?php if ($jenis=="offline") {echo 'style="background-color: grey;" disabled';}?>/>
                                        <label for="a100">GrabFood</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row gy-1">
                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-success btn-sm btn-block" value="Save Transaction">
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger btn-sm btn-block" onclick="window.close()">Tutup</button>
                            </div>
                        </div>
                    </form>



                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <script>
        function isi_kembalian() {
            var total_harga_final = document.getElementById('total_harga_final').value;
            var uang_diterima = document.getElementById('uang_diterima').value;
            total_harga_final = parseInt(total_harga_final);
            uang_diterima = parseInt(uang_diterima);
            document.getElementById('kembalian').innerHTML = "Kembalian : Rp. " + (uang_diterima - total_harga_final).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");;
        }
    </script>

</body>

</html>