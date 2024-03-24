
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Penjualan</title>
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
                padding: 20px;
            }

            .container {
                width: 80%;
                margin: auto;
                margin-top: 20px;
                background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
                backdrop-filter: blur(2px); /* Add a blur effect to the background */
                border-radius: 10px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                padding: 20px;
            }

            form {
                margin-bottom: 20px;
                display: flex;
                justify-content: flex-end;
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

            table {
                width: 100%;
                margin-top: 20px;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 15px;
                text-align: center;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #333;
                color: white;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            td:last-child,
            th:last-child {
                text-align: center;
            }

            button.table-button {
                padding: 8px 15px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            button.table-button:hover {
                background-color: #45a049;
            }
            /* Desain untuk bagian ringkasan penjualan */
.summary-section,
.most-purchased-section {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-top: 20px;
}

.summary-info,
.most-purchased-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.summary-label,
.most-purchased-label {
    font-weight: bold;
    color: #333333;
}

.summary-value,
.most-purchased-value {
    color: #4CAF50;
}

/* Gaya umum */
.section-title {
    font-size: 24px;
    margin-bottom: 15px;
    color: #333333;
}

.no-data-message {
    font-style: italic;
    color: #777777;
    margin-top: 10px;
}


        </style>
    </head>

    <body>
        <?php include "menu.php"; ?>

        <?php
        require "koneksi.php";
        $sql = "SELECT penjualan.id, barang.nama as nama_barang, pelanggan.nama as nama_pelanggan, penjualan.jumlah, penjualan.total_harga, user.username, penjualan.created_at FROM barang JOIN penjualan on barang.id = penjualan.id_barang JOIN user ON user.id = penjualan.id_staff JOIN pelanggan ON pelanggan.id = penjualan.id_pelanggan ORDER BY penjualan.created_at DESC";
        $query = mysqli_query($koneksi, $sql);
        // Inisialisasi filter tanggal
$date_filter = isset($_GET['date_filter']) ? $_GET['date_filter'] : '';

// Kueri SQL untuk mengambil data penjualan berdasarkan tanggal yang dipilih
if (!empty($date_filter)) {
    $sql = "SELECT penjualan.id, barang.nama as nama_barang, pelanggan.nama as nama_pelanggan, penjualan.jumlah, penjualan.total_harga, user.username, penjualan.created_at FROM barang JOIN penjualan on barang.id = penjualan.id_barang JOIN user ON user.id = penjualan.id_staff JOIN pelanggan ON pelanggan.id = penjualan.id_pelanggan WHERE DATE(penjualan.created_at) = '$date_filter' ORDER BY penjualan.created_at DESC";
} else {
    // Jika tidak ada tanggal yang dipilih, ambil semua data penjualan
    $sql = "SELECT penjualan.id, barang.nama as nama_barang, pelanggan.nama as nama_pelanggan, penjualan.jumlah, penjualan.total_harga, user.username, penjualan.created_at FROM barang JOIN penjualan on barang.id = penjualan.id_barang JOIN user ON user.id = penjualan.id_staff JOIN pelanggan ON pelanggan.id = penjualan.id_pelanggan ORDER BY penjualan.created_at DESC";
}

$query = mysqli_query($koneksi, $sql);

        // Inisialisasi total jumlah dan total harga
        $totalJumlah = 0;
        $totalHarga = 0;
        ?>

        <div class="container">
            <h1>Data Penjualan</h1>
            <form action="new-penjualan.php" method="GET">
            <?php if ($_SESSION["level"] != "Admin" && $_SESSION["level"] != "Logistik") : ?>
                <button type="submit" style="margin-right: 5px;">Tambah Penjualan</button>
                <?php endif; ?>
                <?php if ($_SESSION["level"] != "Logistik") : ?>
                <button class="print-button" onclick="window.open('cetak-penjualan.php', '_blank')">Cetak</button>
                <?php endif; ?>

            </form>
            <?php if ($_SESSION["level"] != "Admin" && $_SESSION["level"] != "Logistik") : ?>
            <form action="" method="GET">
            <div style="display: flex; align-items: center; margin-bottom: 20px;">
    <input type="date" id="date_filter" name="date_filter" style="padding: 8px; width: 200px; border-radius: 5px; border: 1px solid #ccc;  margin-right: 10px;">
    <button type="submit" style="padding: 8px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">Filter</button>
</div>
<?php endif; ?>

</form>

            <table border="1">
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Nama Pelanggan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <?php if ($_SESSION["level"] != "Admin" && $_SESSION["level"] != "Logistik") : ?>
                    <th>Diinput oleh</th>
                    <?php endif; ?>
                    <th>Waktu</th>
                    <?php if ($_SESSION["level"] != "Admin" && $_SESSION["level"] != "Logistik") : ?>
                    <th colspan="2">Aksi</th>
                    <?php endif; ?>
                </tr>
                <?php $i = 1; ?>
                <?php while ($penjualan = mysqli_fetch_array($query)) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $penjualan["nama_barang"] ?></td>
                        <td><?= $penjualan["nama_pelanggan"] ?></td>
                        <td><?= $penjualan["jumlah"] ?></td>
                        <td><?= $penjualan["total_harga"] ?></td>
                        <?php if ($_SESSION["level"] != "Admin" && $_SESSION["level"] != "Logistik") : ?>

                        <td><?= $penjualan["username"] ?></td>
                        <?php endif; ?>

                        <td><?= $penjualan["created_at"] ?></td>
                        <?php if ($_SESSION["level"] != "Admin" && $_SESSION["level"] != "Logistik") : ?>
                        <td>
                            <form action="read-penjualan.php" method="GET">
                                <input type="hidden" name="id" value='<?= $penjualan["id"] ?>'>
                                <button class="table-button" type="submit">Lihat</button>
                            </form>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php 
                    // Tambahkan nilai jumlah dan total harga ke variabel total
                    $totalJumlah += $penjualan["jumlah"];
                    $totalHarga += $penjualan["total_harga"];
                    $i++; 
                    ?>
                <?php endwhile ?>
            </table>
            <?php if ($_SESSION["level"] != "Admin" && $_SESSION["level"] != "Logistik") : ?>
            <div class="summary-section">
    <p class="summary-title">Ringkasan Penjualan</p>
    <div class="summary-info">
        <p class="summary-label">Total Jumlah:</p>
        <p class="summary-value"><?= number_format($totalJumlah) ?></p>
    </div>
    <hr>
    <div class="summary-info">
        <p class="summary-label">Total Harga:</p>
        <p class="summary-value">Rp <?= number_format($totalHarga, 2) ?></p>
    </div>  
</div>
<?php endif; ?>

<?php if ($_SESSION["level"] != "Admin" && $_SESSION["level"] != "Logistik") : ?>

<div class="most-purchased-section">
<?php endif; ?>

<?php
// Query SQL untuk mengambil barang paling banyak dibeli dari seluruh data penjualan
$sql_most_purchased = "SELECT id_barang, SUM(jumlah) as total_terjual FROM penjualan GROUP BY id_barang ORDER BY total_terjual DESC LIMIT 1";
$query_most_purchased = mysqli_query($koneksi, $sql_most_purchased);

// Check if the query was successful
if ($query_most_purchased) {
    $most_purchased = mysqli_fetch_assoc($query_most_purchased);
    
    $most_purchased_barang_id = $most_purchased['id_barang'];
    $sql_barang = "SELECT nama FROM barang WHERE id = '$most_purchased_barang_id'";
    $query_barang = mysqli_query($koneksi, $sql_barang);

    // Check if the query for the barang was successful
    if ($query_barang) {
        $most_purchased_barang = mysqli_fetch_assoc($query_barang);
    } else {
        $most_purchased_barang = null;
    }
} else {
    $most_purchased_barang = null;
    $most_purchased = null;
}
?>

<?php if ($_SESSION["level"] != "Admin" && $_SESSION["level"] != "Logistik") : ?>

    <p class="most-purchased-title">Barang Paling Banyak Dibeli</p>
<?php if ($most_purchased_barang && isset($most_purchased_barang['nama'])) : ?>
    <div class="most-purchased-info">
        <p class="most-purchased-label">Nama Barang:</p>
        <p class="most-purchased-value"><?= $most_purchased_barang['nama'] ?></p>
    </div>
    <hr>
    <div class="most-purchased-info">
        <p class="most-purchased-label">Jumlah Terjual:</p>
        <p class="most-purchased-value"><?= $most_purchased['total_terjual'] ?> unit</p>
    </div>
<?php else : ?>
    <p class="no-data-message">Tidak ada data penjualan atau barang yang paling banyak dibeli.</p>
<?php endif; ?>


</div>
<?php endif; ?>

        </div>
        <script>
            function konfirmasi(form) {
                formData = new FormData(form);
                id = formData.get("id");
                return confirm(`Hapus penjualan '${id}'?`);
            }
        </script>
    </body>

    </html>