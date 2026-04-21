<?php
include "config.php";

// TAMBAH DATA
if (isset($_POST['tambah'])) {
    $nama   = $_POST['nama'];
    $harga  = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total  = $harga * $jumlah;

    mysqli_query($conn, "INSERT INTO transaksi (nama_barang,harga,jumlah,total) 
    VALUES ('$nama','$harga','$jumlah','$total')");
}

// HAPUS
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM transaksi WHERE id='$id'");
}

// AMBIL DATA
$data = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #e3f2fd);
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>

<body class="container mt-5">

<h3 class="text-white mb-4">Data Transaksi</h3>

<!-- FORM TAMBAH -->
<div class="card p-4 mb-4 shadow">
    <form method="POST">
        <div class="row">
            <div class="col">
                <input type="text" name="nama" class="form-control" placeholder="Nama Barang" required>
            </div>
            <div class="col">
                <input type="number" name="harga" class="form-control" placeholder="Harga" required>
            </div>
            <div class="col">
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
            </div>
            <div class="col">
                <button name="tambah" class="btn btn-primary w-100">Tambah</button>
            </div>
        </div>
    </form>
</div>

<!-- TABEL -->
<div class="card p-4 shadow">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['harga'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td><?= $row['total'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="?hapus=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>