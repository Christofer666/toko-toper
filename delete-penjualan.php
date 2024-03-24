<?php

require "koneksi.php";

session_start();

if ($_SESSION["level"] != "Admin") {
    echo "<div style='color: ivory; font-weight: bold; text-align: center; position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center; background: url(\"https://ipfs.pixura.io/ipfs/QmQf88yiTo5fQe9hfonfAaxzqsMVpN3AkUeyc4TD467vVw/SunnyDelights20220828.gif\") center center fixed; background-size: cover;'><span style='font-size: 30px; font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif;'>Anda tidak dapat menghapus data ini</span></div>";        
    exit;
}

$id = $_POST["id"];

$sql = "DELETE FROM penjualan WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: penjualan.php");
}