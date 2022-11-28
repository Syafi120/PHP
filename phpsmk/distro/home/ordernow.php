<center class="mt-4">
    <?php 

    if (isset($_GET['total'])) {
        $total = $_GET['total'];
        $idorder = idorder();
        $idpelanggan = $_SESSION['idpelanggan'];
        $tgl=date('Y-m-d');

        $sql = "SELECT * FROM tblorder WHERE idorder = $idorder";

        $count = $db->rowCOUNT($sql);

        if ($count == 0) {
            InsertOrder($idorder,$idpelanggan,$tgl,$total);
            InsertOrderDetail($idorder);
        }else {
            InsertOrderDetail($idorder);
        }

        kosongkanSession();
        header("location:?f=home&m=ordernow");
    }else {
        info();
    }

function idorder(){
    global $db;
    $sql = "SELECT idorder FROM tblorder ORDER BY idorder DESC";
    $jumlah = $db->rowCOUNT($sql);
    if ($jumlah == 0) {
        $id = 1;
    }else {
        $item = $db->getITEM($sql);
        $id = $item['idorder']+1;
    }

    return $id;


}

function InsertOrder($idorder, $idpelanggan, $tgl, $total){
    global $db;

    $sql = "INSERT INTO tblorder VALUES ($idorder, $idpelanggan, $tgl, $total,0,0,0)";

    // echo $sql;

    $db->runSQL($sql);

}

function InsertOrderDetail($idorder=1){

    global $db;

    foreach ($_SESSION as $key => $value) {
        if ($key<>'pelanggan' && $key<>'idpelanggan' && $key<>'user' && $key<>'level' && $key<>'iduser') {
            $id = substr($key,1);

            $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";

            $row = $db->getALL($sql);

            foreach ($row as $r) {
                $idmenu = $r['idmenu'];
                $harga = $r['harga'];
                $sql = "INSERT INTO tblorderdetail VALUES ('',$idorder,$idmenu,$value,$harga)";
                $db->runSQL($sql);
            }

        }
    }

}

function kosongkanSession(){

    foreach ($_SESSION as $key => $value) {
        if ($key<>'pelanggan' && $key<>'idpelanggan' && $key<>'user' && $key<>'level' && $key<>'iduser') {
            $id = substr($key,1);

            unset($SESSION[''.$id]);

            }

        }
    }

    function info(){

        echo '<h4>Terima Kasih Sudah Membeli produk kami</h4>';

    }

?>
</center>

<center><a href="?f=home&m=produk" class="btn btn-success">Kembali berbelanja</a></center>