<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    background: url('https://i.pinimg.com/originals/b9/8f/b1/b98fb1cb16fc0dfe8a15f0a3d018552e.gif') center center fixed;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

header {
    color: white;
    padding: 20px;
}

.container {
    width: 80%;
    margin: auto;
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
    backdrop-filter: blur(2px); /* Add a blur effect to the background */
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-top: 40px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    padding: 15px;
    text-align: center;
}

th {
    background-color: #333;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.action-buttons {
    text-align: right;
    margin-bottom: 20px;
}

button, .action-buttons a {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    text-decoration: none; /* Add this to remove underline from the anchor tag */
}

button:hover, .action-buttons a:hover {
    background-color: #45a049;
}

    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php

    require "koneksi.php";
    $sql = "SELECT * FROM barang";
    $query = mysqli_query($koneksi, $sql);
    ?>

<div class="container">
    <h1>Data Barang</h1>
    
        <form action="new-barang.php" method="GET" class="action-buttons">
        <?php
    // Periksa apakah pengguna memiliki level yang sesuai
    if ($_SESSION["level"] == "Logistik") {
        ?>    
        <button type="submit">Tambah Barang</button>
        <?php } ?>
        <?php if ($_SESSION["level"] != "Keuangan") : ?>
        <button><a target="_blank" href="cetak-barang.php">Cetak</a></button>
        <?php endif; ?>
    </form>
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Dibuat tgl.</th>
            <th>Diubah tgl.</th>
            <?php
            // Periksa apakah pengguna memiliki level yang sesuai untuk menampilkan kolom aksi
            if ($_SESSION["level"] == "Logistik") {
                echo "<th colspan='2'>Aksi</th>";
            }
            ?>
        </tr>
        <?php $i = 1; ?>
        <?php while ($barang = mysqli_fetch_array($query)) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $barang["nama"] ?></td>
                <td><?= $barang["kategori"] ?></td>
                <td><?= $barang["stok"] ?></td>
                <td><?= $barang["harga_jual"] ?></td>
                <td><?= $barang["created_at"] ?></td>
                <td><?= $barang["updated_at"] ?></td>
                <?php
                // Periksa apakah pengguna memiliki level yang sesuai untuk menampilkan aksi
                if ($_SESSION["level"] == "Logistik") {
                    echo "<td>
                            <form action='read-barang.php' method='GET'>
                                <input type='hidden' name='id' value='{$barang["id"]}'>
                                <button type='submit'>Lihat</button>
                            </form>
                          </td>";
                    echo "<td>
                            <form action='delete-barang.php' method='POST' onsubmit='return konfirmasi(this)'>
                                <input type='hidden' name='id' value='{$barang["id"]}'>
                                <button type='submit'>Hapus</button>
                            </form>
                          </td>";
                }
                ?>
            </tr>
            <?php $i++; ?>
        <?php endwhile ?>
    </table>
</div>
    <script>
        function konfirmasi(form) {
            formData = new FormData(form);
            id = formData.get("id");
            return confirm(`Hapus barang '${id}'?`);
        }
    </script>
</body>

</html>
