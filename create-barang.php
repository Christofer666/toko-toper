<?php

require "koneksi.php";

$nama = $_POST["nama"];
$kategori = $_POST["kategori"];
$stok = $_POST["stok"];
$harga_jual = $_POST["harga_jual"];

$sql = "INSERT INTO barang (nama, kategori, stok, harga_jual ) VALUES ('$nama', '$kategori', '$stok', '$harga_jual')";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: barang.php");
}