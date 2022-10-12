<?php
require 'functions.php';
$NIM = $_GET['NIM'];
$mhs = query("SELECT * FROM mahasiswa WHERE NIM = $NIM")[0];

if (isset($_POST["edit"])) {
    if (edit($_POST) > 0){
    echo "<script>
    alert('Data Berhasil Diubah!');
    document.location.href = 'index.php';
    </script>";
    }else{
    echo "<script>
    alert('Data Gagal Diubah!');
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
    <title>Edit Data Mahasiswa</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="p-3 m-0 border-0 bd-example">
<div class="row">
<center class="mb-5" ><h1>Edit Data Mahasiswa</h1></center>
<form action="" method="post">
    <input type="hidden" name="NIM" value="<?php echo $mhs['NIM'];?>">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="col">
        <input type="text" class="form-control" placeholder="NIM" aria-label="NIM" name="NIM" id="NIM" value="<?php echo $mhs['NIM'];?>"><br>
        </div>
    <div class="col">
        <input type="text" class="form-control" placeholder="NAMA" aria-label="NAMA" name="NAMA" id="NAMA" value="<?php echo $mhs['NAMA'];?>"><br>
        </div>
    <div class="col">
        <input type="text" class="form-control" placeholder="EMAIL" aria-label="EMAIL" name="EMAIL" id="EMAIL" value="<?php echo $mhs['EMAIL'];?>"><br>
        </div>
    <div class="col">
    <input type="text" class="form-control" placeholder="JURUSAN" aria-label="JURUSAN" name="JURUSAN" id="JURUSAN" value="<?php echo $mhs['JURUSAN'];?>"><br>
        </div>
    <div class="col">
        <input type="text" class="form-control" placeholder="FAKULTAS" aria-label="FAKULTAS" name="FAKULTAS" id="FAKULTAS" value="<?php echo $mhs['FAKULTAS'];?>"><br>
        </div>
    <div class="input-group mb-3">
    <label class="input-group-text" for="GAMBAR">GAMBAR : </label>
        <input type="file" class="form-control" name="GAMBAR" id="GAMBAR"><br>
        </div>

    <div class="col">
        <button class="btn btn-success" type="submit" name="edit">Edit</button>
	    <a class="btn btn-danger" href="index.php" role="button">Kembali</a>
        </div>
    </form>
</div>
</body>
</html>