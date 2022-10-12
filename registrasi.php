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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Halaman Registrasi</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        label {
            display:block;
        }
    </style>
</head>
<body class="p-3 m-0 border-0 bd-example">
<center class="mb-5"><h1>Halaman Registrasi</h1></center>
    <form action="" method="post">
    <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" name="password2" id="password2">
        </div>
            <button type="submit" class="btn btn-primary" name="register">Registrasi</button>
    </form>
    <a class="btn btn-light" href="login.php" role="button">Login</a>
</body>
</html>