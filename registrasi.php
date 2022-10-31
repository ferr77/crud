<?php
require 'functions.php';
$conn = koneksi();
if(isset($_POST["register"])) {
        if(registrasi($_POST) > 0 ) {
            echo "<script>
                alert('user baru berhasil ditambahkan')
            </script>";
        }else{
            echo mysqli_error($conn);
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
            <label for="password2" class="form-label">Password</label>
            <input type="password" class="form-control" name="password2" id="password2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="register">Register</button>
        </div>
    </form>
    <p class="login-register-text">Sudah punya akun? <a href="login.php">Login</a></p>
</div>
</body>
</html>