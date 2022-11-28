<h3>Sign up User</h3>


<div class="mb-3 text">

    <form action="" method="post">
        <div class="form-group w-50 ">
            <label for="">Username</label>
            <input class="form-control" type="text" name="pelanggan" require placeholder="nama">
        </div><br>

        <div class="form-group w-50">
            <label for="">Alamat</label>
            <input class="form-control" type="text" name="alamat" require placeholder="alamat">
        </div><br>

        <div class="form-group w-50">
            <label for="">telp</label>
            <input class="form-control" type="text" name="telp" require placeholder="telp">
        </div><br>

        <div class="form-group w-50">
            <label for="">email</label>
            <input class="form-control" type="email" name="email" require placeholder="email">
        </div><br>

        <div class="form-group w-50">
            <label for="">password</label>
            <input class="form-control" type="password" name="password" require placeholder="password">
        </div><br>

        <div class="form-group w-50">
            <label for="">Konfirmasi password</label>
            <input class="form-control" type="password" name="konfirmasi" require placeholder="password">
        </div><br>

        <div>
            <input type="submit" name="save" id="save" class="btn btn-primary">
        </div>
    </form>

</div>

<?php
    if (isset($_POST['save'])) {
        $pelanggan = $_POST['pelanggan'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];
        $level = $_POST['level'];

        if ($password===$konfirmasi) {
            $sql = "INSERT INTO tblpelanggan VALUES ('','$pelanggan','$alamat','$telp','$email','$password',1)";
            $db->runSQL($sql);
            header("location:?f=home&m=info");
        }else {
            echo "<p>Password Anda Tidak Cocok</p>";
        }
        // 
        // 
    }
?>