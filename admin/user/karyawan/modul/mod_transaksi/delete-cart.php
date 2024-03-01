<?php
    //FUNCTION UNTUK DELETE / CANCEL MENUNYA
    $id_cart = $_GET['id'];
    $q_deletecart = mysqli_query($koneksi, "DELETE FROM tb_cart WHERE id_cart='$id_cart'");
    echo "
    <script>
    window.history.back();</script>
        ";
