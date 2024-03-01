<?php
    //FUNCTION UNTUK DELETE MENUNYA
    $id_menu = $_GET['id'];
    $q_deletemenu = mysqli_query($koneksi, "DELETE FROM tb_menu WHERE id_menu='$id_menu'");
    echo "
    <script>
        window.close();
        window.onunload = refreshParent;
        function refreshParent() {
        window.opener.location.reload();
    }
        </script>
        ";