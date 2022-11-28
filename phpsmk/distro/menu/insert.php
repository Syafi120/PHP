<?php
    $row=$db->getALL("SELECT * FROM tblkkategori ORDER BY kategori ASC");
?>
<h3>Insert menu</h3>


<div class="mb-3">

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group w-50">
            <label for="">kategori</label>
            <br>
            <select name="idkategori" id="">
                <?php foreach($row as $r):?>
                <option value="<?php echo $r['idkategori']?>"><?php echo $r['kategori']?></option>
                <?php endforeach?>
            </select>
            <br><br>
            <label for="">Nama menu</label>
            <input class="form-control" type="text" name="menu" require placeholder="isi menu">
        </div><br>

        <div class="form-group w-50">
            <label for="">harga</label>
            <input class="form-control" type="text" name="harga" number require placeholder="isi harga">
        </div>

        <br>
        <div class="form-group w-50">
            <label for="">gambar</label><br><br>
            < <input type="file" name="gambar">
        </div>

        <br>
        <div>
            <input type="submit" name="save" id="save" class="btn btn-primary">
        </div>
    </form>
</div>


<?php
    if (isset($_POST['save'])) {
        $idkategori = $_POST ['idkategori'];
        $menu = $_POST['menu'];
        $harga = $_POST['harga'];
        $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];

        if (empty($gambar)) {
            echo '<h3>GAMBAR INI KOSONG</h3>';
        }else {
            $sql = "INSERT INTO tblmenu VALUES ('',$idkategori,'$menu','$gambar',$harga)";
            move_uploaded_file($temp,'../gambar/'.$gambar);
            $db->runSQL($sql);
            header("location:?f=menu&m=select");
        }

        // 
        // 
    }
?>