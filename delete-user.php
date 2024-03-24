<?php

require "koneksi.php";

session_start();

if ($_POST["id"] == $_SESSION["id"]) {
    echo "<div style='color: ivory; font-weight: bold; text-align: center; position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center; background: url(\"https://i.pinimg.com/originals/b3/26/51/b326517cd8ca44b939a1bee41a7f103c.gif\") center center fixed; background-size: cover;'><span style='font-size: 30px; font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif;'>Tidak bisa hapus user yang sedang aktif</span></div>";        exit;
}

$id = $_POST["id"];

$sql = "DELETE FROM user WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: user.php");
}