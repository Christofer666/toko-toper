<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
            padding: 20px;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 40px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            backdrop-filter: blur(2px); /* Add a blur effect to the background */
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

        button:hover {
            background-color: #45a049;
        }
        .action-buttons {
        text-align: right; 
        margin-bottom: 20px;
        }

.action-buttons a {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    text-decoration: none; /* Add this to remove underline from the anchor tag */
}

.action-buttons a:hover {
    background-color: #45a049;
}
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    
    <?php
    require "koneksi.php";
    if ($_SESSION["level"] != "Admin") {
        echo "Anda tidak dapat mengakses halaman ini";
        exit;
    }
    $sql = "SELECT * FROM pelanggan";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div class="container">
        <h1>Data Pelanggan</h1>
        <form action="new-pelanggan.php" method="GET" class="action-buttons">
            <button type="submit">Tambah Pelanggan</button>
            <button><a target="_blank" href="cetak-pelanggan.php">Cetak</a></button>
        </form>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Dibuat tgl.</th>
                <th colspan="2">Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php while ($pelanggan = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $pelanggan["nama"] ?></td>
                    <td><?= $pelanggan["alamat"] ?></td>
                    <td><?= $pelanggan["nomor_telepon"] ?></td>
                    <td><?= $pelanggan["created_at"] ?></td>
                    <td>
                        <form action="read-pelanggan.php" method="GET">
                            <input type="hidden" name="id" value='<?= $pelanggan["id"] ?>'>
                            <button type="submit">Lihat</button>
                        </form>
                    </td>
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
