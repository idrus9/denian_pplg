<?php
session_start();

// Data produk sederhana (Simulasi dari Database)
$products = [
    ["id" => 1, "nama" => "Laptop Pro", "harga" => 15000000, "foto" => "https://image.made-in-china.com/2f0j00qoykHmVhMLcb/Professional-Laptop-Computer-14-15-6-Pocket-Laptop-Portable-Office-Retail-Notebooks-Thin-All-in-One-PC-High-Speed-Stock-Notebook-Keyboard-Laptops.webp"],
    ["id" => 2, "nama" => "Smartphone ROG", "harga" => 20000000, "foto" => "data:image/jpeg;base64,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"],
    ["id" => 3, "nama" => "Headphone Wireless", "harga" => 1200000, "foto" => "https://via.placeholder.com/150"],
    ["id" => 4, "nama" => "Mouse Gaming", "harga" => 500000, "foto" => "https://via.placeholder.com/150"],
    ["id" => 5, "nama" => "komputer Gaming", "harga" => 900000, "foto" => "https://via.placeholder.com/150"],
];

// Logika Menambah ke Keranjang
if (isset($_GET['beli'])) {
    $id_produk = $_GET['beli'];
    $_SESSION['cart'][] = $id_produk;
    header("Location: index.php"); // Refresh halaman
}

// Logika Reset Keranjang
if (isset($_GET['reset'])) {
    session_destroy();
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Online Sederhana</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1 style="text-align:center;">Selamat Datang Di Denian Store</h1>

<div class="container">
    <div class="products">
        <?php foreach ($products as $p): ?>
        <div class="card">
            <img src="<?= $p['foto'] ?>" alt="<?= $p['nama'] ?>">
            <h3><?= $p['nama'] ?></h3>
            <p>Rp <?= number_format($p['harga'], 0, ',', '.') ?></p>
            <a href="?beli=<?= $p['id'] ?>" class="btn">Tambah ke Keranjang</a>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="cart">
        <h2>Keranjang Belanja</h2>
        <?php if (!empty($_SESSION['cart'])): ?>
            <ul>
                <?php 
                $total = 0;
                foreach ($_SESSION['cart'] as $id_p): 
                    // Cari data produk berdasarkan ID di array
                    $key = array_search($id_p, array_column($products, 'id'));
                    $item = $products[$key];
                    $total += $item['harga'];
                ?>
                    <li><?= $item['nama'] ?> - Rp <?= number_format($item['harga'], 0, ',', '.') ?></li>
                <?php endforeach; ?>
            </ul>
            <hr>
            <strong>Total: Rp <?= number_format($total, 0, ',', '.') ?></strong>
            <br><br>
            <a href="?reset=1" style="color:red;">Kosongkan Keranjang</a>
        <?php else: ?>
            <p>Keranjang masih kosong.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>