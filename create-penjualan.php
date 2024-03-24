<?php

require "koneksi.php";

session_start();

// id_barang dan jumlah diambil dari new-penjualan.php
$id_barang = $_POST["id_barang"];
$jumlah = $_POST["jumlah"];

// ambil harga jual dan stok barang
$sql = "SELECT harga_jual, stok FROM barang WHERE id = '$id_barang'";
$query = mysqli_query($koneksi, $sql);
$barang = mysqli_fetch_array($query);

if ($jumlah > $barang["stok"]) {
    echo "Stok barang tidak mencukupi";
    exit;
}

$total_harga = $jumlah * $barang["harga_jual"];

// id_staff diambil dari sesi login
$id_staff = $_SESSION["id"];
$id_pelanggan = $_POST["id_pelanggan"];

$sql = "INSERT INTO penjualan (id_barang, jumlah, total_harga, id_staff, id_pelanggan) VALUES ('$id_barang', '$jumlah', '$total_harga', '$id_staff', '$id_pelanggan')";
mysqli_query($koneksi, $sql);

// kurangi stok barang yang terjual
$sql = "UPDATE barang SET stok = stok - $jumlah WHERE id = '$id_barang'";
mysqli_query($koneksi, $sql);

// cek adakah error ketika menjalankan SQL
if (mysqli_error($koneksi)) {
    // jika ada error tampilkan
    echo mysqli_error($koneksi);
} else {
    // jika tidak ada error, kembali ke penjualan.php
    header("location: penjualan.php");
}