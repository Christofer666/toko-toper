<!DOCTYPE html>
<html>

<head>
    <title>New Barang</title>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    if ($_SESSION["level"] != "admin" && $_SESSION["level"] != "logistik") {
        echo "Anda tidak dapat mengakses halaman ini";
        exit;
    }
    ?>

    <div>
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
                            <option value="makanan">makanan</option>
                            <option value="minuman">minuman</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" min="0" name="stok"></td>
                </tr>
                <tr>
                    <td>Harga Beli</td>
                    <td><input type="number" min="0" name="harga_beli"></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
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