<?php

require "koneksi.php";

session_start();

if ($_POST["id"] == $_SESSION["id"]) {
    echo "Tidak bisa hapus user yang sedang aktif";
    exit;
}

$id = $_POST["id"];

$sql = "DELETE FROM user WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: user.php");
}