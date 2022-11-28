<form action="" method="post">
    kategori
    <input type="text" name="kategori">
    <br>
    <input type="submit" name="Save" id="Save">
</form>

<?php
    require_once "../function.php";
    
    if (isset($_POST['Save'])) {
        $kategori = $_POST['kategori'];

        $sql = "INSERT INTO tblkkategori VALUES ('','$kategori')";
        $result = mysqli_query($koneksi, $sql);
        header("location:http://localhost/phpsmk/distro/kategori/select.php");
    }
?>