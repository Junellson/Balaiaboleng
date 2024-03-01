<?php
    //FUNCTION UNTUK DELETE / CANCEL DISKONNYA
    $id_transaksi = $_GET['id'];
    $q_deletediskon = mysqli_query($koneksi, "DELETE FROM tb_diskon WHERE id_transaksi='$id_transaksi'");
    echo "
    <script>
    window.history.back();</script>
        ";
