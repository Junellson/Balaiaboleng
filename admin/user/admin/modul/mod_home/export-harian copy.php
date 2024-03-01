<?php
include "../../../../config/koneksi.php";
?>
<!DOCTYPE html>
<html>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid black;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Export Data Harian.xlsx");

    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];
    ?>

    <table style="border:0;">
        <tr>
            <td colspan="6" style="text-align:center;">
                <b style="font-weight:bold;">Export Laporan Harian</b>
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:center;">
                <?php echo date('d/m/Y', strtotime($tgl_awal)); ?> s.d <?php echo date('d/m/Y', strtotime($tgl_akhir)); ?>
            </td>
        </tr>
    </table>
    <br>


    <?php
    //MULAI LOOPING DATANYA SESUAI DENGAN DATA YANG SUDAH DI GET
    $q_loop = mysqli_query($koneksi, "SELECT *, tb_cart.id_transaksi as id_transaksi_cari FROM tb_cart JOIN tb_transaksi ON (tb_cart.id_transaksi=tb_transaksi.id_transaksi) JOIN tb_menu ON (tb_menu.id_menu=tb_cart.id_menu) WHERE tb_cart.tgl_transaksi between '$tgl_awal' and '$tgl_akhir'  GROUP BY tb_cart.id_transaksi ORDER BY tgl_transaksi ASC");
    while ($loop = mysqli_fetch_array($q_loop)) {

    ?>

        <table border="1">
            <tr>
                <td colspan="6"><?php echo $loop['nama_bill']; ?> - <?php echo $loop['tgl_transaksi']; ?></td>
            </tr>
            <tr>
                <td><b>No.</b></td>
                <td><b>Nama Menu</b></td>
                <td><b>Qty</b></td>
                <td><b>Harga</b></td>
                <td><b>Metode Pembayaran</b></td>
                <td><b>Jenis</b></td>
            </tr>
            <?php
            //LOOP LAGI MENU BERDASARKAN ID TRANSAKSI
            $no = 1;
            $caritotalakhir = "";
            $q_loopmenu = mysqli_query($koneksi, "SELECT * FROM tb_cart LEFT JOIN tb_menu ON (tb_cart.id_menu=tb_menu.id_menu) LEFT JOIN tb_transaksi ON (tb_transaksi.id_transaksi=tb_cart.id_transaksi) WHERE tb_cart.id_transaksi='$loop[id_transaksi_cari]'");
            while ($loopmenu = mysqli_fetch_array($q_loopmenu)) {
                $trans = $loopmenu['id_transaksi'];
            ?>
                <tr>
                    <td style="text-align:center;"><?php echo $no; ?></td>
                    <td><?php echo $loopmenu['nama_menu']; ?></td>
                    <td style="text-align:center;"><?php echo $loopmenu['qty']; ?></td>
                    <td><?php echo number_format($loopmenu['harga'], 0, ",", "."); ?></td>
                    <td><?php echo $loopmenu['metode_pembayaran']; ?></td>
                    <td><?php echo $loopmenu['jenis_pembayaran']; ?></td>
                </tr>
                <?php
                //CARI TOTAL PER MASING MASING TRANSAKSI
                $q_caritotal = mysqli_query($koneksi, "SELECT SUM(harga) AS total_akhir FROM tb_cart WHERE id_transaksi='$loopmenu[id_transaksi]'");
                $caritotal = mysqli_fetch_array($q_caritotal);
                $caritotalakhir = $caritotal['total_akhir'];
                ?>

            <?php
                $no++;
            }
            ?>
            <tr>
                <td colspan="3" style="text-align:center; background:#d1d9e6;">Total</td>
                <td><b><?php echo number_format($caritotalakhir, 0, ",", "."); ?></b></td>
                <td colspan="2" style="background:#d1d9e6;"></td>
            </tr>
            <br>
        </table>
    <?php
    }
    ?>
</body>

</html>