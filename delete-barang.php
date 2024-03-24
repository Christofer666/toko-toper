<?php

require "koneksi.php";

session_start();

if ($_SESSION["level"] != "Admin" && $_SESSION["level"] != "Logistik") {
    echo "<div style='color: ivory; font-weight: bold; text-align: center; position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center; background: url(\"https://i.pinimg.com/originals/b9/8f/b1/b98fb1cb16fc0dfe8a15f0a3d018552e.gif\") center center fixed; background-size: cover;'><span style='font-size: 30px; font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif;'>Anda tidak dapat menghapus barang</span></div>";
        exit;
}

$id = $_POST["id"];

$sql = "DELETE FROM barang WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: barang.php");
}