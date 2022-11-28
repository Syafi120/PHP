<?php
    session_start();
    require_once "dbcontroller.php";
    $db = new DB;

    $sql = "SELECT * FROM tblkkategori ORDER BY kategori";
    $row = $db->getALL($sql);

    if (isset($_GET['log'])) {
        session_destroy();
        header("location:index.php");
    }

    function Cart(){
        global $db;
        
        $Cart = 0;

        foreach ($_SESSION as $key => $value) {
            if ($key<>'pelanggan' && $key<>'idpelanggan'  && $key<>'user'  && $key<>'level'  && $key<>'iduser') {
                $id = substr($key,1);
                
                $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";
                $row=$db->getALL($sql);

                foreach ($row as $r) {
                    $Cart++;
                }
            }
        }
        return $Cart;
    } 


?>

<!DOCTYPE html>
<html lang="en">

<lhead>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distro Merch Yuri.nime | Aplikasi Distro Merch Yuri.nime</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</lhead>


<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-4">
                <h2><a href="index.php" class="text-reset text-decoration-none">Distro Merch</a></h2>
            </div>

            <div class="col-md-9">

                <?php
                    if (isset($_SESSION['pelanggan'])) {
                        echo '
                        
                        <div class="float-end ms-5 mt-4"><a href="?log=logout" class="text-reset text-decoration-none">Logout</a></div>
                        <div class="float-end ms-5 mt-4"><a href="?f=home&m=Checkout" class="text-reset text-decoration-none">Welcome '.$_SESSION['pelanggan'].' !!</a></div>
                        <div class="float-end ms-5 mt-4"> Pending : [<a href="?f=home&m=Checkout" class="text-reset text-decoration-none">'.Cart().'</a>] </a></div>
                        <div class="float-end ms-5 mt-4"><a href="?f=home&m=histori" class="text-reset text-decoration-none">Histori</a></div>

                        ';
                    }else {
                        echo '
                        <div class="float-end ms-5 mt-4"><a href="?f=home&m=login" class="text-reset text-decoration-none">login</a></div>
                        <div class="float-end ms-5 mt-4"><a href="?f=home&m=daftar" class="text-reset text-decoration-none">Sign up</a></div>
                        ';
                    }
                ?>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-3">
                <h3>kategori</h3>
                <hr>
                <?php if(!empty($row)) {?>
                <ul class="nav flex-column">
                    <?php foreach($row as $r):?>
                    <li class="nav-item"><a class="nav-link" href="?f=home&m=produk&id=<?php echo $r['idkategori']?>">
                            <?php echo $r['kategori']?></a></li>
                    <?php endforeach?>
                </ul>
                <?php }?>
            </div>

            <div class="col-md-9">
                <?php
                if (isset($_GET{'f'})&& isset($_GET['m'])) {
                    $f=$_GET['f'];
                    $m=$_GET['m'];

                    $file = $f.'/'.$m.'.php';

                    require_once $file;
                }else {
                    require_once "home/produk.php";
                }
            ?>
            </div>
        </div>

    </div>
</body>

</html>