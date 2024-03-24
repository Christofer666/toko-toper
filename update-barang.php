<?php

require "koneksi.php";

$id = $_POST["id"];
$nama = $_POST["nama"];
$kategori = $_POST["kategori"];
$stok = $_POST["stok"];
$harga_jual = $_POST["harga_jual"];

$sql = "UPDATE barang SET nama = '$nama', kategori = '$kategori', stok = '$stok', harga_jual = '$harga_jual' WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: barang.php");
}