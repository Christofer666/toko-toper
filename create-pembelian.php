<?php

require "koneksi.php";

session_start();

$id_barang = $_POST["id_barang"];
$jumlah = $_POST["jumlah"];

$sql = "SELECT harga_beli FROM barang WHERE id = '$id_barang'";
$query = mysqli_query($koneksi, $sql);
$barang = mysqli_fetch_array($query);

$total_harga = $jumlah * $barang["harga_beli"];

$id_staff = $_SESSION["id"];

$sql = "INSERT INTO pembelian (id_barang, jumlah, total_harga, id_staff) VALUES ('$id_barang', '$jumlah', '$total_harga', '$id_staff')";
mysqli_query($koneksi, $sql);

$sql = "UPDATE barang SET stok = stok + $jumlah WHERE id = '$id_barang'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: pembelian.php");
}