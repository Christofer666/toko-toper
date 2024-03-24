<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Pembelian</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-align: center;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    background: url('https://ipfs.pixura.io/ipfs/QmQf88yiTo5fQe9hfonfAaxzqsMVpN3AkUeyc4TD467vVw/SunnyDelights20220828.gif') center center fixed;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

header {
    color: white;
    padding: 10px;
}

.container {
    width: 50%;
    margin: auto;
    margin-top: 20px;
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
    backdrop-filter: blur(2px); /* Add a blur effect to the background */
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

form {
    text-align: left;
}

h1 {
    color: #333;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

select,
input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="reset"] {
    background-color: #f44336;
    margin-left: 10px;
}

button:hover {
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
        <form action="create-pembelian.php" method="POST">
            <h1>Tambah Pembelian</h1>
            <label for="id_barang">Barang</label>
            <select name="id_barang" id="id_barang">
                <?php while ($barang = mysqli_fetch_array($query)) : ?>
                    <option value='<?= $barang["id"] ?>'>
                        <?= $barang["nama"] ?>, harga: <?= $barang["harga_beli"] ?>, stok: <?= $barang["stok"] ?>
                    </option>
                <?php endwhile ?>
            </select>

            <label for="jumlah">Jumlah</label>
            <input type="number" min="0" name="jumlah" id="jumlah">

            <div>
                <button type="submit">SIMPAN</button>
                <button type="reset">RESET</button>
            </div>
        </form>
    </div>
</body>

</html>
