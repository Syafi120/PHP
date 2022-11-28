<h3>Order Detail</h3>
<br>
<hr>
<div class="mb-3">

    <form action="" method="post">
        <div class="form-group w-50 float-end">
            <label for="">Tanggal Awal Pembelian</label>
            <br><br>
            <input class="form-control" type="date" name="tawal">
        </div>
        <div class="form-group w-50 float-end">
            <label for="">Tanggal Akhir Pembelian</label>
            <br><br>
            <input class="form-control" type="date" name="takhir">
        </div>
        <br>
        <div>
            <input type="submit" name="save" value="Cari" class="btn btn-primary">
        </div>
    </form>

</div>
<center>
    <?php 
    
    $jumlahdata=$db->rowCOUNT("SELECT idorderdetail FROM vorderdetail");
    $banyak = 4;

    $halaman = ceil($jumlahdata/$banyak);

    if (isset($_GET['p'])) {
    $p=$_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
    }else {
    $mulai =0;
    }

    $sql = "SELECT * FROM vorderdetail ORDER BY idorderdetail DESC LIMIT $mulai,$banyak";

    if (isset($_POST['save'])) {
        $tawal = $_POST['tawal'];
        $takhir = $_POST['takhir'];

        $sql = "SELECT * FROM vorderdetail WHERE tglorder BETWEEN 'tawal' AND 'takhir'";
    }

    $row = $db->getALL($sql);

    $no = 1+$mulai;

    $total = 0;

    ?>


    <table class="table table-success w-70 mt-4 text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Alamat</th>
            </tr>
        </thead>

        <tbody>
            <?php if(!empty($row)) { ?>
            <?php foreach ($row as $r): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $r ['pelanggan'] ?></td>
                <td><?php echo $r ['tglorder'] ?></td>
                <td><?php echo $r ['menu'] ?></td>
                <td><?php echo $r ['harga'] ?></td>
                <td><?php echo $r ['jumlah'] ?></td>
                <td><?php echo $r ['jumlah'] * $r ['harga']?></td>
                <td><?php echo $r ['alamat'] ?></td>
                <?php
                    $total = $total + ($r ['jumlah'] * $r ['harga']);
                ?>
            </tr>
            <?php endforeach ?>
            <?php } ?>
            <tr>
                <td colspan="6">
                    <h3>Total Pembelian : </h3>
                </td>
                <td>
                    <h4>IDR
                        <?php echo $total?>
                    </h4>
                </td>
            </tr>
        </tbody>
    </table>

    <?php 

    for ($i=1; $i <=$halaman ; $i++) { 
        echo '<a href = "?f=orderdetail&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>
</center>