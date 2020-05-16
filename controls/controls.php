<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phplogin");

function register($data)
{
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $email = trim($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek / validasi username sudah terdaftar atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result) == 1) {
        echo "<script>alert('Username Sudah Terdaftar!')</script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>alert('konfirmasi password tidak sesuai!')</script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // insert data ke database
    mysqli_query($conn, "INSERT INTO users VALUES(
        '',
        '$name',
        '$username',
        '$email',
        '$password')");
    return mysqli_affected_rows($conn);
}

function login($data)
{
    global $conn;
    $username = $data["username"];
    $password = $data["password"];
    $result = mysqli_query($conn, "SELECT * FROM users");
    $users = mysqli_fetch_assoc($result);
    if ($username === $users["username"]) {
        if (password_verify($password, $users["password"])) {
            return mysqli_affected_rows($conn);
        }
    }
}
