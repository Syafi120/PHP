<h3>Insert kategori</h3>


<div class="mb-3">

    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama kategori</label>
            <input class="form-control" type="text" name="kategori" require placeholder="isi kategori">
        </div>

        <div>
            <input type="submit" name="save" id="save" class="btn btn-primary">
        </div>
    </form>

</div>

<?php
    if (isset($_POST['save'])) {
        $kategori = $_POST['kategori'];

        $sql = "INSERT INTO tblkkategori VALUES ('','$kategori')";
        $db->runSQL($sql);
        header("location:?f=kategori&m=select");
    }
?>