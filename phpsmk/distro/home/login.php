<div class="row">

    <div class="col-4 mx-auto mt-4">

        <div class="form-group">

            <form action="" method="post">
                <div class="text-center">
                    <h1>My Distro</h1>
                    <p>login dulu bosku sebelum belanja</p>
                </div>
                <div class="from-group">
                    <label for="">ID Account/Email</label>
                    <input class="form-control" type="email" name="email" require><br>
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

<?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1";
        $count = $db->rowCOUNT($sql);

        if ($count == 0) {
            echo "<center><p>Email atau Password salah</p></center>";
        }else {
            $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1";
            $row = $db->getITEM($sql);

            $_SESSION['pelanggan']=$row['email'];
            $_SESSION['idpelanggan']=$row['idpelanggan'];

            header("location:index.php");
        }

    }
?>