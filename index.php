<!-- header -->
<?php
session_start();

if (isset($_SESSION["login"])) {
    header('Location:admin');
    exit;
}

require('controls\controls.php');
//cek apakah tombol submit sudah diklik
if (isset($_POST["submit"])) {
    // jalankan fungsi login
    if (login($_POST) > 0) {
        $_SESSION["login"] = true;
        header('Location:admin');
    } else {
        $error = true;
    }
}
require('template/header.php');
?>


<!-- Body -->
<div class="container ">
    <div class="row justify-content-center mt-5">
        <div class="col col-md-6 col-lg-4">
            <h1 class="text-center">Login</h1>
            <hr class="mb-4">
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <?php if (isset($error)) { ?>
                        <small id="username" class="form-text text-danger">Username atau password salah</small><?php } ?>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
                <small>Belum punya akun ? <a href="register">Daftar disini</a></small>
            </form>
        </div>
    </div>
</div>


<!-- akhir body -->

<!-- footer -->
<?php
require('template/footer.php');
?>