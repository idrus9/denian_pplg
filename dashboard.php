<div class="content">

<h3 class="mb-4">📊 Dashboard</h3>

<div class="row">

    <!-- TOTAL PEMBELI -->
    <div class="col-md-4 mb-3">
        <div class="card shadow p-4 text-center">
            <h6>Total Pembeli</h6>
            <h2 class="text-primary">
                <?= $d1['total'] ?? 0 ?>
            </h2>
        </div>
    </div>

    <!-- TOTAL PENJUALAN -->
    <div class="col-md-4 mb-3">
        <div class="card shadow p-4 text-center">
            <h6>Total Penjualan</h6>
            <h2 class="text-success">
                Rp <?= number_format($d2['total'] ?? 0,0,',','.') ?>
            </h2>
        </div>
    </div>

    <!-- TOTAL STOK -->
    <div class="col-md-4 mb-3">
        <div class="card shadow p-4 text-center">
            <h6>Total Stok Barang</h6>
            <h2 class="text-warning">
                <?= $d3['total'] ?? 0 ?>
            </h2>
        </div>
    </div>

</div>

<!-- PRODUK LIST (OPTIONAL) -->
<div class="card shadow p-3 mt-4">
    <h5>📦 Daftar Produk</h5>
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
            <td><?= $p['nama'] ?></td>
            <td>Rp <?= number_format($p['harga'],0,',','.') ?></td>
            <td><?= $p['stok'] ?></td>
        </tr>
        <?php } ?>

    </table>
</div>

</div>