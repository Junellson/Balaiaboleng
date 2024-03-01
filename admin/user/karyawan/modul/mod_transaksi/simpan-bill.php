<?php
ob_start();
session_start();
error_reporting(0);

include "../../../../config/koneksi.php";

date_default_timezone_set('Asia/Jakarta');
$tgl_sekarang = date("Y-m-d");

//SIAP SIAP GET DATANYA
$id_transaksi = $_GET['id'];
$total = $_GET['total'];

if (isset($_GET['submit'])) {
    $nama_bill = $_GET['nama_bill'];
    $total_final = $_GET['total_final'];
    $id_transaksi_final = $_GET['id_transaksi_final'];
    $q_insertdata = mysqli_query($koneksi, "INSERT INTO tb_transaksi VALUES ('$id_transaksi_final', 'WAITING PAYMENT', '', '$total_final', '', '','$tgl_sekarang')");
    $q_updatebill = mysqli_query($koneksi, "UPDATE tb_cart SET nama_bill='$nama_bill' WHERE id_transaksi='$id_transaksi_final'");

    echo
    "
        <script>
        window.close();
        window.onunload = refreshParent;
        function refreshParent() {
        window.opener.location.reload();
    }
        </script>
        ";
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
</head>

<body>
    <div class="p-4" id="main-content">
        <div class="card">
            <div class="card-title font-weight-bold text-center text-light bg-dark p-2">
                <h4>SIMPAN BILL</h4>
            </div>
            <form>
                <div class="card-body">
                    <form method="GET">
                        <div class="row">
                            <div class="col-12" hidden>
                                <div class="form-group mb-3">
                                    <label for="input" class="mb-2">ID TRANSAKSI</label>
                                    <input type="text" class="form-control" name="id_transaksi_final" id="id_transaksi_final" value="<?php echo $id_transaksi;?>">
                                </div>
                            </div>
                            <div class="col-12" hidden>
                                <div class="form-group mb-3">
                                    <label for="input" class="mb-2">TOTAL TRANSAKSI</label>
                                    <input type="text" class="form-control" name="total_final" id="total_final" value="<?php echo $total;?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="input" class="mb-2">Nama Bill</label>
                                    <textarea class="form-control" rows="3" name="nama_bill" id="nama_bill" placeholder="Masukan Nama Bill" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-1">
                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-success btn-sm btn-block" value="Simpan Bill">
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
</body>

</html>