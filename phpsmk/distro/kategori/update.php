<?php
    if (isset($_GET['id'])) {
        
        $id = $_GET['id'];
        $sql = "SELECT * FROM tblkkategori WHERE idkategori=$id";
        $row=$db->getITEM($sql);
    }
?>
<h3>Update kategori</h3>


<div class="mb-3">

    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama kategori</label>
            <input class="form-control" type="text" name="kategori" require value="<?php echo $row['kategori']?>">
        </div>

        <div>
            <input type="submit" name="save" id="save" class="btn btn-primary">
        </div>
    </form>

</div>

<?php
    if (isset($_POST['save'])) {
        $kategori = $_POST['kategori'];

        $sql = "UPDATE tblkkategori SET kategori='$kategori' WHERE idkategori=$id";
        $db->runSQL($sql);
        header("location:?f=kategori&m=select");
    }
?>