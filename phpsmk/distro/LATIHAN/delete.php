<?php
    require_once "../function.php";

    //$id = 2;
    $sql = "DELETE FROM tblkkategori WHERE idkategori = $id";
    $result = mysqli_query($koneksi, $sql);
    header("location:http://localhost/phpsmk/distro/kategori/select.php");
?>