<?php
    //FUNCTION UNTUK DELETE / CANCEL MENUNYA
    $id_transaksi = $_GET['id'];
    $q_deletetransaksi = mysqli_query($koneksi, "DELETE FROM tb_transaksi WHERE id_transaksi='$id_transaksi'");
    $q_deletecart = mysqli_query($koneksi, "DELETE FROM tb_cart WHERE id_transaksi='$id_transaksi'");
    $q_deletediskon = mysqli_query($koneksi, "DELETE FROM tb_diskon WHERE id_transaksi='$id_transaksi'");
    echo "
    <script>
    alert('Transaksi Berhasil Dibatalkan!');
    window.location='media.php?module=record-transaksi';
    </script>
        ";
