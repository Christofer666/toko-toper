<?php

require "koneksi.php";

$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$nomor_telepon = $_POST["nomor_telepon"];

$sql = "INSERT INTO pelanggan (nama, alamat, nomor_telepon) VALUES ('$nama', '$alamat', '$nomor_telepon')";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: pelanggan.php");
}