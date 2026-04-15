<?php
session_start();

// Cek jika user sudah login, arahkan ke dashboard
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header("location: dashboard.php");
    exit;
}

$error = "";

// Proses data saat form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi sederhana (Ganti ini dengan pengecekan database nantinya)
    if ($username === "admin" && $password === "12345") {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: index.php");
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Ke Toko Online</title>
    <style>
        body { font-family: Arial; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 300px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .error { color: red; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login Admin</h2>
    <?php if($error) echo "<div class='error'>$error</div>"; ?>
    
    <form action="" method="post">
        <label>Username</label>
        <input type="text" name="username" required>
        
        <label>Password</label>
        <input type="password" name="password" required>
        
        <button type="submit">Masuk</button>
    </form>
</div>

</body>
</html>