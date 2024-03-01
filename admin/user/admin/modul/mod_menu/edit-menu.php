<?php
ob_start();
session_start();
error_reporting(0);

include "../../../../config/koneksi.php";

//SIAP SIAP DAPATKAN DATA AWAL
$id_menu = $_GET['id'];
$q_getdata = mysqli_query($koneksi, "SELECT * FROM tb_menu WHERE id_menu='$id_menu'");
$getdata = mysqli_fetch_array($q_getdata);

if (isset($_GET['submit'])) {
    $id_menu_fix = $_GET['id_menu_fix'];
    $nama_menu = $_GET['nama_menu'];
    $kode_menu = $_GET['kode_menu'];
    $harga_offline = $_GET['harga_offline'];
    $harga_online = $_GET['harga_online'];

    $q_updatedata = mysqli_query($koneksi, "UPDATE tb_menu SET nama_menu='$nama_menu', kode_menu='$kode_menu', harga_offline='$harga_offline', harga_online='$harga_online' WHERE id_menu='$id_menu_fix'");
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
                <h4><?php echo $getdata['nama_menu']; ?></h4>
            </div>
                <div class="card-body">
                    <form method="GET">
                        <div class="row" hidden>
                            <div class="col-md-12 mb-3">
                                <label for="input" class="mb-2 text-primary font-weight-bold">ID Menu</label>
                                <input type="text" class="form-control" name="id_menu_fix" id="id_menu_fix" value="<?php echo $id_menu; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="input" class="mb-2">Nama Menu</label>
                                    <textarea class="form-control" rows="3" name="nama_menu" id="nama_menu" placeholder="Masukan Nama Menu" required><?php echo $getdata['nama_menu']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="input" class="mb-2 text-primary font-weight-bold">Kode Menu</label>
                                <input type="text" class="form-control" name="kode_menu" id="kode_menu" placeholder="Masukan Kode Menu" value="<?php echo $getdata['kode_menu']; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="input" class="mb-2">Harga Offline</label>
                                <input type="text" class="form-control" name="harga_offline" id="harga_offline" placeholder="Masukan Harga Offline" value="<?php echo $getdata['harga_offline']; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="input" class="mb-2">Harga Online</label>
                                <input type="text" class="form-control" name="harga_online" id="harga_online" placeholder="Masukan Harga Online" value="<?php echo $getdata['harga_online']; ?>" required>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <a href="../../media.php?module=hapus-menu&&id=<?php echo $id_menu?>" onclick="return confirm('Yakin Ingin Menghapus Menu Ini?')" class="btn btn-warning btn-sm btn-block">Hapus Menu</a>
                            </div>
                        </div>
                        <div class="row gy-1">
                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-success btn-sm btn-block" value="Edit Menu">
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger btn-sm btn-block" onclick="window.close()">Tutup</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
</body>

</html>