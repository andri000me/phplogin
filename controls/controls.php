<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phplogin");

function register($data)
{
    global $conn;
    // simpan data kedalam variable dan bersihkan data
    $name = htmlspecialchars($data["name"]);
    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $email = trim($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek / validasi username sudah terdaftar atau belum

    // query ke database pilih field username dari tabel users dimana usernamenya adalah data username
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    // jika ada data yang dikembalikan
    if (mysqli_fetch_assoc($result)) {
        // tampilkan peringatan
        echo "<script>alert('Username Sudah Terdaftar!')</script>";
        return false;
    }

    // cek konfirmasi password
    // jika password tidak sama dengan konfirmasi password
    if ($password !== $password2) {
        // tampilkan peringatan
        echo "<script>alert('konfirmasi password tidak sesuai!')</script>";
        return false;
    }
    // jika password sesuai lakukan
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // kemudian insert data ke database
    mysqli_query($conn, "INSERT INTO users VALUES(
        '',
        '$name',
        '$username',
        '$email',
        '$password')");
    // kembalikan nilai row yang berubah di database dari koneksi
    return mysqli_affected_rows($conn);
}

function login($data)
{
    global $conn;
    // simpan data kedalam variable
    $username = $data["username"];
    $password = $data["password"];

    // Cek username
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    // jika username ada dalam database
    if (mysqli_num_rows($result) === 1) {
        // ambil datanya
        $row = mysqli_fetch_assoc($result);
        // kemudian cek password
        if (password_verify($password, $row["password"])) {
            return mysqli_affected_rows($conn);
        }
    }
}
