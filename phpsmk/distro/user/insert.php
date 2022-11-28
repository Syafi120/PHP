<h3>Tambah Akun</h3>


<div class="mb-3">

    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama User</label>
            <input class="form-control" type="text" name="user" require placeholder="isi user">
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

        <div class="form-group w-50">
            <label for="">Level</label>
            <select name="level" id="">
                <br>
                <option value="admin">admin</option>
                <option value="support">support</option>
                <option value="pengguna">pengguna</option>
            </select>
        </div><br>

        <div>
            <input type="submit" name="save" id="save" class="btn btn-primary">
        </div>
    </form>

</div>

<?php
    if (isset($_POST['save'])) {
        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = hash('sha256',$_POST['password']);
        $konfirmasi = hash('sha256',$_POST['konfirmasi']);
        $level = $_POST['level'];

        if ($password===$konfirmasi) {
            $sql = "INSERT INTO tbluser VALUES ('','$user','$email','$password','$level',1)";
            $db->runSQL($sql);
            header("location:?f=user&m=select");
        }else {
            echo "<p>Password Anda Tidak Cocok</p>";
        }
        // 
        // 
    }
?>