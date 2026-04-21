<?php
session_start();
include "config.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

// TAMBAH
if (isset($_POST['tambah'])) {
    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];
    $foto  = $_POST['foto'];

    mysqli_query($conn, "INSERT INTO produk (nama,harga,stok,foto)
    VALUES ('$nama','$harga','$stok','$foto')");
}

// HAPUS
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM produk WHERE id='$id'");
}

// EDIT
if (isset($_POST['edit'])) {
    $id    = $_POST['id'];
    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];
    $foto  = $_POST['foto'];

    mysqli_query($conn, "UPDATE produk SET
        nama='$nama',
        harga='$harga',
        stok='$stok',
        foto='$foto'
        WHERE id='$id'
    ");
}

$data = mysqli_query($conn, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
<title>Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f4f7fe;
}

/* SIDEBAR SAMA PERSIS */
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

<h3 class="mb-4">📦 Data Produk</h3>

<!-- FORM -->
<div class="card shadow p-3 mb-4">
<form method="POST">
<div class="row">
    <div class="col-md-3">
        <input type="text" name="nama" class="form-control" placeholder="Nama Produk" required>
    </div>
    <div class="col-md-2">
        <input type="number" name="harga" class="form-control" placeholder="Harga" required>
    </div>
    <div class="col-md-2">
        <input type="number" name="stok" class="form-control" placeholder="Stok" required>
    </div>
    <div class="col-md-3">
        <input type="text" name="foto" class="form-control" placeholder="URL Foto">
    </div>
    <div class="col-md-2">
        <button name="tambah" class="btn btn-primary w-100">Tambah</button>
    </div>
</div>
</form>
</div>

<!-- TABEL -->
<div class="card shadow p-3">
<table class="table">
<tr>
    <th>No</th>
    <th>Foto</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php 
$no = 1;
while($p = mysqli_fetch_assoc($data)) { 
?>
<tr>
    <td><?php echo $no++; ?></td>
    <td><img src="<?php echo $p['foto']; ?>" width="60"></td>
    <td><?php echo $p['nama']; ?></td>
    <td>Rp <?php echo number_format($p['harga'],0,',','.'); ?></td>
    <td><?php echo $p['stok']; ?></td>
    <td>
        <a href="?hapus=<?php echo $p['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
        <button class="btn btn-warning btn-sm"
        onclick="editData('<?php echo $p['id']; ?>','<?php echo $p['nama']; ?>','<?php echo $p['harga']; ?>','<?php echo $p['stok']; ?>','<?php echo $p['foto']; ?>')">
        Edit
        </button>
    </td>
</tr>
<?php } ?>

</table>
</div>

</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="editModal">
<div class="modal-dialog">
<div class="modal-content">

<form method="POST">
<div class="modal-header">
    <h5>Edit Produk</h5>
</div>

<div class="modal-body">
    <input type="hidden" name="id" id="id">
    <input type="text" name="nama" id="nama" class="form-control mb-2">
    <input type="number" name="harga" id="harga" class="form-control mb-2">
    <input type="number" name="stok" id="stok" class="form-control mb-2">
    <input type="text" name="foto" id="foto" class="form-control">
</div>

<div class="modal-footer">
    <button name="edit" class="btn btn-success">Update</button>
</div>

</form>

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function editData(id,nama,harga,stok,foto){
    document.getElementById('id').value = id;
    document.getElementById('nama').value = nama;
    document.getElementById('harga').value = harga;
    document.getElementById('stok').value = stok;
    document.getElementById('foto').value = foto;

    var myModal = new bootstrap.Modal(document.getElementById('editModal'));
    myModal.show();
}
</script>

</body>
</html>