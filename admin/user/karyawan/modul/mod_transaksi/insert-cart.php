<?php
ob_start();
session_start();
error_reporting(0);

include "../../../../config/koneksi.php";

//SIAP SIAP GET DATANYA
$id = $_GET['id'];
$id_transaksi = $_GET['id_trans'];
$q_getdata = mysqli_query($koneksi, "SELECT * FROM tb_menu WHERE id_menu='$id'");
$getdata = mysqli_fetch_array($q_getdata);


if (isset($_GET['submit'])) {
    $id_menu = $_GET['id_menu'];
    $id_transaksi_temp = $_GET['id_transaksi_temp'];
    $harga_satuan = $_GET['harga_satuan'];
    $qty = $_GET['quantity'];
    $harga_akhir = $qty * $harga_satuan;

    //JIKA QUANTITY TIDAK SESUAI
    if ($qty < 1) {
        echo
        "
    <script>
    alert('Quantity Harus Lebih Besar Dari 1');
    window.history.back();
    </script>
    ";
    } else {

        //JIKA TRANSAKSI BARU
        if ($id_transaksi_temp == "") {
            //CARI ID TRANSAKSI
            $q_cektransaksi = mysqli_query($koneksi, "SELECT MAX(id_transaksi) as id_terakhir FROM tb_transaksi");
            $cektransaksi = mysqli_fetch_array($q_cektransaksi);
            $id_transaksi_final = $cektransaksi['id_terakhir'] + 1;
            $nama_bill = "";


            $q_insertdata = mysqli_query($koneksi, "INSERT INTO tb_cart VALUES ('', '$id_menu', '$qty', '$nama_bill', NOW(),'$id_transaksi_final')");
        }
        //JIKA MELANJUTKAN TRANSAKSI YANG KEMARIN
        else {
            $nama_bill = "";
            $q_insertdata = mysqli_query($koneksi, "INSERT INTO tb_cart VALUES ('', '$id_menu', '$qty', '$nama_bill', NOW(),'$id_transaksi_temp')");
        }


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
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        //MUNCULKAN INFORMASI NAMA MENU
                        echo $getdata['nama_menu'];
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        //MUNCULKAN INFORMASI NAMA MENU
                        echo number_format($getdata['harga_offline'], 0, ",", ".");
                        ?>
                    </div>
                </div>
            </div>
            <form>
                <div class="card-body">
                    <form method="GET">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3" hidden>
                                    <label for="input" class="mb-2">ID TRANSAKSI</label>
                                    <input type="text" class="form-control" name="id_transaksi_temp" id="id_transaksi_temp" value="<?php echo $id_transaksi; ?>">
                                </div>
                                <div class="form-group mb-3" hidden>
                                    <label for="input" class="mb-2">ID Menu</label>
                                    <input type="text" class="form-control" name="id_menu" id="id_menu" value="<?php echo $getdata['id_menu']; ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="input" class="mb-2">Quantity</label>
                                    <div class="input-group">
                                        <input type="button" class="btn btn-primary" onclick="decrementValue()" value="-" />
                                        <input type="text" class="form-control" name="quantity" value="1" id="number" required />
                                        <input type="button" class="btn btn-primary" onclick="incrementValue()" value="+" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-1">
                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-success btn-sm btn-block" value="Order">
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

    <script type="text/javascript">
        function incrementValue() {
            var value = parseInt(document.getElementById('number').value);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('number').value = value;
        }

        function decrementValue() {
            var value = parseInt(document.getElementById('number').value);
            value = isNaN(value) ? 0 : value;
            value--;
            document.getElementById('number').value = value;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
</body>

</html>