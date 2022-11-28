<?php
    require_once "../function.php";

    $sql = "SELECT * FROM tblkkategori WHERE idkategori = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    

    // $kategori = 'outfit wibu';
    // $id = 8;
    

    // echo $sql;
?>
<form action="" method="post">
    kategori :
    <input type="text" name="kategori" value="<?php echo $row['kategori']?>">
    <br>
    <input type="Submit" name="Save" value="Save">
</form>

<?php
    if (isset($_POST['Save'])) {
        $kategori = $_POST['kategori'];
        $sql = "UPDATE tblkkategori SET kategori='$kategori' WHERE idkategori= $id";
        $result = mysqli_query($koneksi, $sql);
        
        header("location:http://localhost/phpsmk/distro/kategori/select.php");
    }
?>