<?php
session_start();
include "config.php";

// CEK LOGIN
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

// TOTAL DATA
$pembeli = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM transaksi"));
$penjualan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total) as total FROM transaksi"));
$stok = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(stok) as total FROM produk"));
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

/* CARD */
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
    <a href="#">👤 User</a>
    <a href="#">📊 Laporan</a>
    <a href="logout.php">🚪 Logout</a>
</div>

<!-- CONTENT -->
<div class="content">

<h3 class="mb-4">Dashboard</h3>

<div class="row">

<!-- TOTAL PEMBELI -->
<div class="col-md-4">
    <div class="card shadow p-3 text-center">
        <h5>Total Transaksi</h5>
        <h3><?php echo $pembeli['total']; ?></h3>
    </div>
</div>

<!-- TOTAL PENJUALAN -->
<div class="col-md-4">
    <div class="card shadow p-3 text-center">
        <h5>Total Penjualan</h5>
        <h3 class="text-success">
            Rp <?php echo number_format($penjualan['total'],0,',','.'); ?>
        </h3>
    </div>
</div>

<!-- TOTAL STOK -->
<div class="col-md-4">
    <div class="card shadow p-3 text-center">
        <h5>Total Stok</h5>
        <h3><?php echo $stok['total']; ?></h3>
    </div>
</div>

</div>

<!-- INFO TAMBAHAN -->
<div class="card shadow p-4 mt-4">
    <h5>Selamat Datang 👋</h5>
    <p>
        Sistem ini digunakan untuk mengelola penjualan HP, Laptop, dan aksesoris.
        Gunakan menu di sebelah kiri untuk mengakses fitur.
    </p>
</div>

</div>

</body>
</html>