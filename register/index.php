<!-- header -->
<?php
require('../controls/controls.php');

if (isset($_POST["submit"])) {
    if (register($_POST) > 0) {
        echo "<script>
        alert('Selamat Registrasi Berhasil');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

require('../template/header.php');
?>


<!-- Body -->
<div class="container ">
    <div class="row justify-content-center mt-5">
        <div class="col col-md-6 col-lg-4">
            <h1 class="text-center">Register</h1>
            <hr class="mb-4">
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Nama :</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <?php if (isset($error)) { ?>
                        <small id="username" class="form-text text-danger">Username atau password salah</small><?php } ?>
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                    <?php if (isset($error)) { ?>
                        <small id="password" class="form-text text-danger">Username atau password salah</small><?php } ?>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="submit">Register</button>
                <small>Sudah punya akun ? <a href="../">Login disini</a></small>
            </form>
        </div>
    </div>
</div>


<!-- akhir body -->

<!-- footer -->
<?php
require('../template/footer.php');
?>