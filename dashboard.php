<?php
session_start();

// Proteksi halaman
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #e3f2fd);
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
        }

        /* Card */
        .card {
            border-radius: 20px;
            border: none;
        }

        /* Sidebar */
        .sidebar {
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 15px;
            height: 100%;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            border-radius: 10px;
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.3);
        }

        .text-white-soft {
            color: #f1f1f1;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg px-4">
    <span class="navbar-brand text-white fw-bold">MyApp</span>

    <div class="ms-auto text-white">
        Halo, <b><?php echo $_SESSION['username']; ?></b>
        <a href="logout.php" class="btn btn-light btn-sm ms-3">Logout</a>
    </div>
</nav>

<div class="container-fluid mt-4">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2">
            <div class="sidebar text-white">
                <h5 class="mb-3">Menu</h5>
                <a href="#">🏠 Dashboard</a>
                <a href="#">📊 Data</a>
                <a href="#">👤 Profile</a>
                <a href="#">⚙️ Settings</a>
            </div>
        </div>

        <!-- Content -->
        <div class="col-md-10">

            <h3 class="text-white mb-4">Dashboard</h3>

            <!-- Cards -->
            <div class="row">

                <div class="col-md-4 mb-4">
                    <div class="card shadow p-3">
                        <h6>Total User</h6>
                        <h2>120</h2>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card shadow p-3">
                        <h6>Data Masuk</h6>
                        <h2>75</h2>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card shadow p-3">
                        <h6>Laporan</h6>
                        <h2>30</h2>
                    </div>
                </div>

            </div>

            <!-- Table -->
            <div class="card shadow p-4">
                <h5 class="mb-3">Data Terbaru</h5>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Andi</td>
                            <td>Aktif</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Budi</td>
                            <td>Nonaktif</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>

</body>
</html>