<?php
    session_start();
    require_once "../dbcontroller.php";
    $db = new DB;

    if (!isset($_SESSION['user'])) {
        header("location:login.php");
    }
    if (isset($_GET['log'])) {
        session_destroy();
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<lhead>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page | Aplikasi Distro Merch Yuri.nime</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</lhead>


<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-3 mt-4">
                <h2><a href="index.php" class="text-reset text-decoration-none">Admin Distro</a></h2>
            </div>

            <div class="col-md-9">
                <div class="float-end ms-5 mt-4 "> <a href="?log=logout" class="btn btn-outline-dark">Logout</a>
                </div>
                <div class="float-end mt-4"><a href="?f=user&m=updateuser&id=<?php echo $_SESSION['iduser']?>"
                        class="btn btn-outline-primary">Update Account</a>
                </div>
                <div class="float-end me-5 mt-4 btn btn-outline-success">User : <?php echo $_SESSION['level']?></div>
            </div>

            <div class="row mt-5">
                <div class="col-md-3">
                    <ul class="nav flex-column">

                        <?php
                        
                            $level = $_SESSION['level'];
                            switch ($level) {
                                case 'admin':
                                    echo '
                                    
                                    <li class="nav-item"><a class="nav-link" href="?f=kategori&m=select">kategori</a></li>
                                    <li class="nav-item"><a class="nav-link" href="?f=menu&m=select">menu</a></li>
                                    <li class="nav-item"><a class="nav-link" href="?f=pelanggan&m=select">pelanggan</a></li>
                                    <li class="nav-item"><a class="nav-link" href="?f=order&m=select">order</a></li>
                                    <li class="nav-item"><a class="nav-link" href="?f=orderdetail &m=select">order detail</a></li>
                                    <li class="nav-item"><a class="nav-link" href="?f=user&m=select">user</a></li>
                                    
                                    ';
                                    break;
                                
                                case 'support';
                                    echo '
                                    <li class="nav-item"><a class="nav-link" href="?f=kategori&m=select">kategori</a></li>
                                    <li class="nav-item"><a class="nav-link" href="?f=pelanggan&m=select">pelanggan</a></li>
                                    <li class="nav-item"><a class="nav-link" href="?f=menu&m=select">menu</a></li>
                                    <li class="nav-item"><a class="nav-link" href="?f=user&m=select">user</a></li>
                                    ';
                                    break;
                                
                                case 'kasir';
                                    echo '
                                    <li class="nav-item"><a class="nav-link" href="?f=order&m=select">order</a></li>
                                    <li class="nav-item"><a class="nav-link" href="?f=orderdetail &m=select">order detail</a></li>
                                    ';
                                    break;
                                default:
                                    echo 'Anda Belum Terdaftar Di Perusahaan';
                                    break;
                            }
                        ?>
                    </ul>
                </div>

                <div class="col-md-9">
                    <?php
                if (isset($_GET['f']) && isset($_GET['m'])) {
                    $f=$_GET['f'];
                    $m=$_GET['m'];

                    $file = '../'.$f.'/'.$m.'.php';

                    require_once $file;
                }
            ?>
                </div>
            </div>

            <center>
                <div class="row">
                    <div class="col">
                        <p class="text-center">2022 - Copyright@yuri.nime_</p>
                    </div>
                </div>
            </center>

        </div>
</body>

</html>