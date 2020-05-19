<!-- header -->
<?php
require('../functions/functions.php');
// cek apakah tombol submit sudah di klik
if (isset($_POST["submit"])) {
    // buat array untuk menampung error
    $error = [];
    // jalankan form validation
    // jika input name kosong
    if (empty($_POST["name"])) {
        // masukan kedalam array erorr nama
        $error["name"] = "Nama tidak boleh kosong!";
    }
    // jika input username kosong
    if (empty($_POST["username"])) {
        // masukan kedalam array erorr username
        $error["username"] = "Username tidak boleh kosong!";
    }
    if (empty($_POST["email"])) {
        $error["email"] = "email tidak boleh kosong!";
    }
    if (empty($_POST["password"])) {
        $error["password"] = "Password tidak boleh kosong!";
    }
    if (empty($_POST["password2"])) {
        $error["password2"] = "Konfirmasi Password tidak boleh kosong!";
    }

    // jika array error kosong
    if (count($error) == 0) {
        // jalankan fungsi register
        if (register($_POST) > 0) {
            // jika registrasi berhasil tampilkan alert
            echo "<script>
            alert('Selamat Registrasi Berhasil');
            document.location.href='../';
            </script>";
        } else {
            // jika gagal tampilkan error dari koneksi
            echo mysqli_error($conn);
        }
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
                    <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($_POST["submit"])) echo $_POST["name"]; ?>">
                    <?php if (isset($error["name"])) { ?>
                        <small id="name" class="form-text text-danger"><?php echo $error["name"] ?></small><?php } ?>
                </div>
                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php if (isset($_POST["submit"])) echo $_POST["username"]; ?>">
                    <?php if (isset($error["username"])) { ?>
                        <small id="username" class="form-text text-danger"><?php echo $error["username"] ?></small><?php } ?>
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php if (isset($_POST["submit"])) echo $_POST["email"]; ?>">
                    <?php if (isset($error["email"])) { ?>
                        <small id="email" class="form-text text-danger"><?php echo $error["email"] ?></small><?php } ?>
                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <?php if (isset($error["password"])) { ?>
                        <small id="password" class="form-text text-danger"><?php echo $error["password"] ?></small><?php } ?>
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                    <?php if (isset($error["password2"])) { ?>
                        <small id="password" class="form-text text-danger"><?php echo $error["password2"] ?></small><?php } ?>
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