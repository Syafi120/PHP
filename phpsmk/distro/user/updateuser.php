<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbluser WHERE iduser=$id";
        $row = $db->getITEM($sql);
    }
?>

<h3>Update Account</h3>

<br><br>
<div class="mb-3">

    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Change Username</label><br><br>
            <input class="form-control" type="text" name="user" require value="<?php echo $row['user']?>">
        </div><br><br>

        <div class=" form-group w-50">
            <p>Change Your Email Here</p><br>
            <label for="">email</label>
            <input class="form-control" type="email" name="email" require value="<?php echo $row['email']?>">
        </div><br><br>

        <div class="form-group w-50">
            <p>input Your New Password Here</p><br>
            <label for="">password</label>
            <input class="form-control" type="password" name="password" value="<?php echo $row['password']?>">
        </div><br>

        <div class="form-group w-50">
            <label for="">Confirm your password</label>
            <input class="form-control" type="password" name="konfirmasi" require value="<?php echo $row['user']?>">
        </div><br>

        <div class=" form-group w-50">
            <label for="">Level</label>
            <select name="level" id="">
                <br>
                <option value="admin" <?php if ($row['level']=="admin") echo "selected"?>>admin</option>
                <option value="support" <?php if ($row['level']=="support") echo "selected"?>>support</option>
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
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];
        $level = $_POST['level'];

        if ($password===$konfirmasi) {
            $sql = "UPDATE tbluser SET user='$user',email='$email',password='$password',level='$level' WHERE iduser=$id";
            $db->runSQL($sql);
            header("location:?f=user&m=select");
        }else {
            echo "<p>Password Anda Tidak Cocok</p>";
        }
        // 
        // 
    }
?>