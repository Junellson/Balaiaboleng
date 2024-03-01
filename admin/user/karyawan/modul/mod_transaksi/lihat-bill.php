<?php
ob_start();
session_start();
error_reporting(0);

include "../../../../config/koneksi.php";

//SIAP SIAP GET DATANYA
$id_transaksi = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Balai Aboleng</title>

    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
</head>

<body>
    <div class="p-4" id="main-content">
        <div class="card">
            <div class="card-title font-weight-bold text-center text-light bg-dark p-2">
                <h4>TABLE BILL</h4>
            </div>

            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Bill</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //LAKUKAN PENCARIAN TABLE YANG MASIH GANTUNG
                        $q_cektable = mysqli_query($koneksi, "SELECT * FROM tb_transaksi JOIN tb_cart ON (tb_transaksi.id_transaksi=tb_cart.id_transaksi) WHERE metode_pembayaran='WAITING PAYMENT' GROUP BY tb_transaksi.id_transaksi");
                        while ($cektable = mysqli_fetch_array($q_cektable)) {

                            // POTONG JAM
                            $potongjam = substr($cektable['tgl_transaksi'], 11, 5);
                        ?>

                            <tr>
                                <td><?php echo $cektable['nama_bill']; ?></td>
                                <td><?php echo $potongjam; ?></td>
                                <td><a href="#" class="btn btn-secondary btn-sm" onClick="javascript: window.close();window.opener.location.href = '../../media.php?module=home&&id=<?php echo $cektable['id_transaksi']?>';">Lihat Bill</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#example', {
            info: false,
            ordering: false,
            paging: false
        });
    </script>
    <script>
        function lihat_bill() {
            window.close();
            window.onunload = refreshParent;

            function refreshParent() {
                window.opener.location.href = '../../media.php?module=home&&id=<?php echo $cektable['id_transaksi']?>';
            }
        }
    </script>
</body>

</html>