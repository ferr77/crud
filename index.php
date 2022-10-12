<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Halaman Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5 ">
    <a class="btn btn-danger" href="logout.php" role="button">Logout</a>
    <center class="mb-5" ><h1> Daftar Mahasiswa</h1></center>
    <a class="btn btn-success" href="tambah.php" role="button">Tambah Data Mahasiswa</a><br><br>
    <form action="" method="post">
        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search..." autocomplete="off">
        <input class="btn btn-light" type="submit" name="cari" id="cari" value="Search">
    </form>
    <table class="table table-bordered mt-4" id="myTable">
        <thead>
        <tr>
            <th scope="col" width="1%">NO.</th>
            <th scope="col">OPSI</th>
            <th scope="col">GAMBAR</th>
            <th scope="col">NIM</th>
            <th scope="col">NAMA</th>
            <th scope="col">EMAIL</th>
            <th scope="col">JURUSAN</th>
            <th scope="col">FAKULTAS</th>
        </tr>
        </thead>
        <tr>
        <?php $i =1; ?>
        <?php foreach( $mahasiswa as $mhs) :?>
        </tr>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a class="btn btn-primary" href="edit.php?NIM=<?=$mhs['NIM'];?>" role="button">Edit</a> |
                <a class="btn btn-danger" href="delete.php?NIM=<?=$mhs['NIM'];?>" role="button" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>
            </td>
            <td><img src="../img/<?= $mhs['GAMBAR']; ?>" width="30" </td>
            <td><?= $mhs['NIM']; ?></td>
            <td><?= $mhs['NAMA']; ?></td>
            <td><?= $mhs['EMAIL']; ?></td>
            <td><?= $mhs['JURUSAN']; ?></td>
            <td><?= $mhs['FAKULTAS']; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </div>
</body>
</html>