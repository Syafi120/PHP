<?php
    if (isset($_GET['id'])) {
        
        $id = $_GET['id'];
        $sql = "SELECT * FROM tblorder WHERE idorder=$id";
        $row=$db->getITEM($sql);
    }
?>
<h3>Update Order</h3>
<br>
<hr>

<div class="mb-3">

    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Total Pembelian</label>
            <input class="form-control" type="number" name="total" require value="<?php echo $row['total']?>">
        </div>
        <br>
        <div class="form-group w-50">
            <label for="">Pembayaran</label>
            <input class="form-control" type="number" name="bayar" require ">
        </div>
        <br>
        <div>
            <input class=" btn btn-primary" type="submit" name="save">
        </div>
    </form>

</div>

<?php
    if (isset($_POST['save'])) {
        $bayar = $_POST['bayar'];
        $kembali= $bayar - $row['total'];

        $sql = "UPDATE tblorder SET bayar=$bayar, kembali= $kembali, status=1 WHERE idorder=$id";
        if ($kembali < 0) {
            echo "<p>Uang Anda Kurang</p>";
        }else {
            $db->runSQL($sql);
            header("location:?f=order&m=select");
        }
    }
?>