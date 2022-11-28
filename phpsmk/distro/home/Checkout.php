<h3>Your Order</h3>
<br>
<hr>
<?php

    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        unset($_SESSION['_'.$id]);
        header("location:?f=home&m=Checkout");
    }

    if (isset($_GET['tambah'])) {
        $id = $_GET['tambah'];
        $_SESSION['_'.$id]++;
    }

    if (isset($_GET['kurang'])) {
        $id = $_GET['kurang'];
        $_SESSION['_'.$id]--;

        if ($_SESSION['_'.$id]==0) {
            unset($_SESSION['_'.$id]);
        }
    }

    if (!isset($_SESSION['pelanggan'])) {
        header("location:?f=home&m=login");
    }else {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            isi($id);
            header("location:?f=home&m=Checkout");
        }else {
            keranjang();
        }
    }

function isi($id)
{
    
    if (isset($_SESSION['_'.$id])) {
        $_SESSION['_'.$id]++;
    }else {
        $_SESSION['_'.$id]=1;
    }
}

function keranjang()
{
    global $db;
    
    $total = 0;

    global $total;

    echo '
    <table class="table table-striped w-70">

        <tr>
            <th>Order Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th></th>
        </tr>

<br>

';

foreach ($_SESSION as $key => $value) {

    if ($key<>'pelanggan' && $key<>'idpelanggan'  && $key<>'user'  && $key<>'level'  && $key<>'iduser') {

        $id = substr($key,1);
        $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";
        $row = $db->getALL($sql);

            foreach ($row as $r) {
                echo '<tr>';
                echo '<td>'.$r['menu'].'</td>';
                echo '<td>'.$r['harga'].'</td>';
                echo '<td><a href="?f=home&m=Checkout&tambah='.$r['idmenu'].'" class="btn btn-outline-success">+</a>&nbsp &nbsp &nbsp'.$value.'&nbsp &nbsp &nbsp<a href="?f=home&m=Checkout&kurang='.$r['idmenu'].'" class="btn btn-outline-dark">-</a></td>';
                echo '<td>'.$r['harga'] * $value.'</td>';
                echo '<td>'.'<a href="?f=home&m=Checkout&hapus='.$r['idmenu'].'" class="btn btn-secondary">Cancel Order</a>'.'</td>';
                echo '</tr>';
                $total = $total + ($value * $r['harga']);
            }

    }

}
    echo '<tr class="fs-4">
        <td><p>Total Shoping: </p></td>
        <td>IDR '.$total.'</td>
    </tr>';

echo '</table>';
}
?>
<?php if (!empty($total)) { ?>
<a class="btn btn-info" href="?f=home&m=ordernow&total=<?php echo $total?>" role="button">Order Now</a>
<?php
}
?>