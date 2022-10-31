<?php
session_start();
require 'functions.php';
$conn = koneksi();
if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            $_SESSION["login"] = true;
            header("Location: berhasil_login.php");
            exit;
        }
    }
    $error = true;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Halaman Login</title>
</head>
<body>
<div class="container">
    <form action="" method="post" class="login-email">
    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Halaman Login</p>
    <div class="input-group">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" autocomplete="off">
        </div>
        <div class="input-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login">Login</button>
        </div>
    </form>
    <p class="login-register-text">Belum punya akun? <a href="registrasi.php">Register</a></p>
</div>
</body>
</html>