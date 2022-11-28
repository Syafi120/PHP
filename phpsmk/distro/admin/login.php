<?php
        session_start();
        require_once "../dbcontroller.php";
        $db = new DB;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Login | My Distro Merch</title>
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-4 mx-auto mt-4">

                <div class="form-group">

                    <form action="" method="post">
                        <div class="text-center">
                            <h1>My Distro</h1>
                            <p>login dulu bosku sebelum masuk admin page</p>
                        </div>
                        <div class="from-group">
                            <label for="">ID Account / Email</label>
                            <input class="form-control" type="IDuser" name="IDuser" require><br>
                        </div>
                        <div class="from-group">
                            <label for="">Password</label>
                            <input class="form-control" type="password" name="password" require><br>
                            <a href="#">
                                <p>lupa kata sandi?</p>
                            </a>
                            <a href="#">lupa id anda?</a><br><br>
                        </div>

                        <div>
                            <input type="submit" name="login" value="Login" class="btn btn-primary">
                        </div>
                    </form>

                </div>


            </div>

        </div>

    </div>

    </div>

</body>

</html>

<?php
    if (isset($_POST['login'])) {
        $user = $_POST['IDuser'];
        $password = hash('sha256',$_POST['password']);

        $sql = "SELECT * FROM tbluser WHERE user='$user' AND password='$password'";
        $count = $db->rowCOUNT($sql);

        if ($count ==0) {
            echo "<center><p>Email atau Password salah</p></center>";
        }else {
            $sql = "SELECT * FROM tbluser WHERE user='$user' AND password='$password'";
            $row = $db->getITEM($sql);

            $_SESSION['user']=$row['email'];
            $_SESSION['level']=$row['level'];
            $_SESSION['iduser']=$row['iduser']; 

            header("location:index.php");
        }

    }
?>