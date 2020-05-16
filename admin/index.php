<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location:../');
}


require('../template/header.php');
?>


<div class="container ">
    <div class="row justify-content-center">
        <div class="col-10 text-center">
            <h1 class="display-3 font-weight-bold mt-5">Selamat Datang Admin</h1>
            <hr>
            <p>Ini adalah contoh aplikasi login sederhana menggunakan PHP</p>
            <a href="../logout/logout.php" class="btn btn-primary mt-5">Logout</a>
        </div>
    </div>
</div>


<?php
require('../template/footer.php');
?>