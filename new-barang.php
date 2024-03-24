<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Barang</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
    width: 50%;
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
    margin-top: 20px;
}

td {
    padding: 15px;
    text-align: left;
}

select,
input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
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

button:hover {
    background-color: #45a049;
}

    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    if ($_SESSION["level"] != "Admin" && $_SESSION["level"] != "Logistik") {
        echo "<div style='color: ivory; font-weight: bold; text-align: center; position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center; background: url(\"https://i.pinimg.com/originals/b9/8f/b1/b98fb1cb16fc0dfe8a15f0a3d018552e.gif\") center center fixed; background-size: cover;'><span style='font-size: 30px; font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif;'>Anda tidak dapat mengakses halaman ini</span></div>";
        exit;
    }
    ?>

    <div class="container">
        <form action="create-barang.php" method="POST">
            <h1>Tambah Barang</h1>
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori">
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" min="0" name="stok"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="number" min="0" name="harga_jual"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">SIMPAN</button>
                        <button type="reset">RESET</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
