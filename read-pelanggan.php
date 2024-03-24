<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Pelanggan</title>
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
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 40px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            backdrop-filter: blur(1px); /* Add a blur effect to the background */
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            color: #333;
        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    require "koneksi.php";

    $id = $_GET["id"];

    $sql = "SELECT * FROM pelanggan WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);
    $pelanggan = mysqli_fetch_array($query);
    ?>

    <div class="container">
        <h1>Lihat Pelanggan</h1>
        <table>
            <tr>
                <td>Nama</td>
                <td><input readonly type="text" value="<?= $pelanggan["nama"] ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input readonly type="text" value="<?= $pelanggan["alamat"] ?>"></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td><input readonly type="number" value="<?= $pelanggan["nomor_telepon"] ?>"></td>
            </tr>
        </table>
    </div>
</body>

</html>
