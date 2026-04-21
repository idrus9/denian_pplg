<?php
session_start();
include "config.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

// TOTAL TRANSAKSI (PEMBELI)
$q1 = mysqli_query($conn, "SELECT COUNT(*) as total FROM transaksi");
$d1 = mysqli_fetch_assoc($q1);
$total_pembeli = isset($d1['total']) ? $d1['total'] : 0;

// TOTAL PENJUALAN
$q2 = mysqli_query($conn, "SELECT SUM(total) as total FROM transaksi");
$d2 = mysqli_fetch_assoc($q2);
$total_penjualan = isset($d2['total']) ? $d2['total'] : 0;

// TOTAL STOK
$q3 = mysqli_query($conn, "SELECT SUM(stok) as total FROM produk");
$d3 = mysqli_fetch_assoc($q3);
$total_stok = isset($d3['total']) ? $d3['total'] : 0;
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f4f7fe;
}

/* SIDEBAR */
.sidebar {
    position: fixed;
    width: 250px;
    height: 100%;
    background: linear-gradient(180deg, #4e73df, #224abe);
    color: white;
    padding-top: 20px;
}

.sidebar h4 {
    text-align: center;
    margin-bottom: 20px;
}

.sidebar a {
    display: block;
    color: white;
    padding: 12px 20px;
    text-decoration: none;
}

.sidebar a:hover {
    background: rgba(255,255,255,0.2);
}

/* CONTENT */
.content {
    margin-left: 260px;
    padding: 20px;
}

.card {
    border-radius: 20px;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>Denian Store</h4>
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="produk.php">📦 Produk</a>
    <a href="transaksi.php">🧾 Transaksi</a>
    <a href="logout.php">🚪 Logout</a>
</div>

<!-- CONTENT -->
<div class="content">

<h3 class="mb-4">📊 Dashboard</h3>

<div class="row">

    <!-- TOTAL PEMBELI -->
    <div class="col-md-4 mb-3">
        <div class="card shadow p-4 text-center">
            <h6>Total Pembeli</h6>
            <h2 class="text-primary">
                <?php echo $total_pembeli; ?>
            </h2>
        </div>
    </div>

    <!-- TOTAL PENJUALAN -->
    <div class="col-md-4 mb-3">
        <div class="card shadow p-4 text-center">
            <h6>Total Penjualan</h6>
            <h2 class="text-success">
                Rp <?php echo number_format($total_penjualan,0,',','.'); ?>
            </h2>
        </div>
    </div>

    <!-- TOTAL STOK -->
    <div class="col-md-4 mb-3">
        <div class="card shadow p-4 text-center">
            <h6>Total Stok Barang</h6>
            <h2 class="text-warning">
                <?php echo $total_stok; ?>
            </h2>
        </div>
    </div>

</div>

<!-- TABEL PRODUK -->
<div class="card shadow p-3 mt-4">
    <h5>📦 Data Produk</h5>

    <table class="table mt-3">
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>

        <?php
        $produk = mysqli_query($conn, "SELECT * FROM produk");
        while($p = mysqli_fetch_assoc($produk)) {
        ?>
        <tr>
            <td><?php echo $p['nama']; ?></td>
            <td>Rp <?php echo number_format($p['harga'],0,',','.'); ?></td>
            <td><?php echo $p['stok']; ?></td>
        </tr>
        <?php } ?>

    </table>
</div>

</div>

</body>
</html>