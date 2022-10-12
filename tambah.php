<?php
require 'functions.php';
if (isset($_POST["tambah"])) {
    $conn = koneksi();
    $NIM = $_POST['NIM'];
    $NAMA = $_POST['NAMA'];
    $EMAIL = $_POST['EMAIL'];
    $JURUSAN = $_POST['JURUSAN'];
    $FAKULTAS = $_POST['FAKULTAS'];
    $GAMBAR = $_POST['GAMBAR'];

    $query = "INSERT INTO mahasiswa VALUES ('$NIM', '$NAMA', '$EMAIL', '$JURUSAN', '$FAKULTAS', '$GAMBAR')";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0){
    echo "<script>
    alert('Data Berhasil Ditambahkan!');
    document.location.href = 'index.php';
    </script>";
    }else{
    echo "<script>
    alert('Data Gagal Ditambahkan!');
    document.location.href = 'index.php';
    </script>";}
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Tambah Data Mahasiswa</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="p-3 m-0 border-0 bd-example">
<div class="row">
<center class="mb-5" ><h1>Tambah Data Mahasiswa</h1></center>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="col">
        <input type="text" autocomplete="off" class="form-control" placeholder="NIM" aria-label="NIM" name="NIM" id="NIM"><br>
        </div>
    <div class="col">
        <input type="text" autocomplete="off" class="form-control" placeholder="NAMA" aria-label="NAMA" name="NAMA" id="NAMA"><br>
        </div>
    <div class="col">
        <input type="text" autocomplete="off" class="form-control" placeholder="EMAIL" aria-label="EMAIL" name="EMAIL" id="EMAIL"><br>
        </div>
    <div class="col">
    <input type="text" autocomplete="off" class="form-control" placeholder="JURUSAN" aria-label="JURUSAN" name="JURUSAN" id="JURUSAN"><br>
        </div>
    <div class="col">
        <input type="text" autocomplete="off" class="form-control" placeholder="FAKULTAS" aria-label="FAKULTAS" name="FAKULTAS" id="FAKULTAS"><br>
        </div>
    <div class="input-group mb-3">
        <label class="input-group-text" for="GAMBAR">GAMBAR : </label>
        <input type="file" class="form-control" name="GAMBAR" id="GAMBAR"><br>
        </div>

    <div class="col">
        <button class="btn btn-success" type="submit" name="tambah">Tambah</button>
		<a class="btn btn-danger" href="index.php" role="button">Kembali</a>
        </div>
    </form>
</div>
</body>
</html>