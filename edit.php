<?php
include "koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM transaksi WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama   = $_POST['nama'];
    $harga  = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total  = $harga * $jumlah;

    mysqli_query($conn, "UPDATE transaksi SET 
        nama_barang='$nama',
        harga='$harga',
        jumlah='$jumlah',
        total='$total'
        WHERE id='$id'
    ");

    header("Location: transaksi.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<div class="card p-4 shadow">
    <h4>Edit Transaksi</h4>

    <form method="POST">
        <input type="text" name="nama" value="<?= $row['nama_barang'] ?>" class="form-control mb-2">
        <input type="number" name="harga" value="<?= $row['harga'] ?>" class="form-control mb-2">
        <input type="number" name="jumlah" value="<?= $row['jumlah'] ?>" class="form-control mb-2">

        <button name="update" class="btn btn-primary">Update</button>
        <a href="transaksi.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>