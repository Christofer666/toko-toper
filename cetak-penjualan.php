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
        }

        header {
            color: white;
            padding: 20px;
        }

        .container {
            width: 80%;
            margin: auto;
            margin-top: 20px;
            background-color: #fff;
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
        .action-buttons {
        text-align: right; 
        margin-bottom: 20px;
        }

        @media print {
        #date_filter {
            display: none;
        }
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

<?php
require "koneksi.php";

// Cek apakah ada parameter date_filter yang diberikan
$date_filter = isset($_GET['date_filter']) ? $_GET['date_filter'] : '';

// Kueri SQL untuk mengambil data penjualan dengan atau tanpa filter tanggal
if (!empty($date_filter)) {
    // Jika date_filter ada, gunakan filter tanggal
    $sql = "SELECT penjualan.id, barang.nama as nama_barang, penjualan.jumlah, penjualan.total_harga, user.username, penjualan.created_at 
            FROM barang 
            JOIN penjualan ON barang.id = penjualan.id_barang 
            JOIN user ON user.id = penjualan.id_staff 
            WHERE DATE(penjualan.created_at) = '$date_filter' 
            ORDER BY penjualan.created_at DESC";
} else {
    // Jika tidak ada date_filter, ambil semua data penjualan
    $sql = "SELECT penjualan.id, barang.nama as nama_barang, penjualan.jumlah, penjualan.total_harga, user.username, penjualan.created_at 
            FROM barang 
            JOIN penjualan ON barang.id = penjualan.id_barang 
            JOIN user ON user.id = penjualan.id_staff 
            ORDER BY penjualan.created_at DESC";
}

$query = mysqli_query($koneksi, $sql);
// Inisialisasi total jumlah dan total harga
$totalJumlah = 0;
$totalHarga = 0;
?>

<div class="container">
    <h1>Data Penjualan</h1>
    <!-- Tampilkan form date_filter hanya jika tidak dalam mode cetak -->
    <?php if (!isset($_GET['print'])) : ?>
    <form action="" method="GET">
        <div style="display: flex; align-items: center; margin-bottom: 20px;">
            <input type="date" id="date_filter" name="date_filter" style="padding: 8px; width: 200px; border-radius: 5px; border: 1px solid #ccc; margin-right: 10px;">
            <button type="submit" style="padding: 8px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">Filter</button>
        </div>
    </form>
    <?php endif; ?>
    <!-- Tampilkan tabel data penjualan -->
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Diinput oleh</th>
            <th>Waktu</th>
        </tr>
        <?php $i = 1; ?>
        <?php while ($penjualan = mysqli_fetch_array($query)) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $penjualan["nama_barang"] ?></td>
                <td><?= $penjualan["jumlah"] ?></td>
                <td><?= $penjualan["total_harga"] ?></td>
                <td><?= $penjualan["username"] ?></td>
                <td><?= $penjualan["created_at"] ?></td>
            </tr>
            <?php 
                    // Tambahkan nilai jumlah dan total harga ke variabel total
                    $totalJumlah += $penjualan["jumlah"];
                    $totalHarga += $penjualan["total_harga"];
                    $i++; 
                    ?>
        <?php endwhile ?>
    </table>
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
</div>
<script>
    function konfirmasi(form) {
        formData = new FormData(form);
        id = formData.get("id");
        return confirm(`Hapus penjualan '${id}'?`);
    }
</script>
<script type="text/javascript">
    window.print()
</script>


</body>

</html>
