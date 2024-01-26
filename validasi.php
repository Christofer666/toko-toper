<?php

require "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE username = '$username'";
$query = mysqli_query($koneksi, $sql);
$jumlah_user = mysqli_num_rows($query);

if ($jumlah_user == 1) {
    $user = mysqli_fetch_array($query);
    $password_benar = password_verify($password, $user["password"]);

    if ($password_benar) {
        session_start();

        $_SESSION["id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["level"] = $user["level"];

        header("location: home.php");
    } else {
        echo "Username atau password tidak valid";
    }
} else {
    echo "Username tidak ditemukan";
}