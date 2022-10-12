<?php
require 'functions.php';

if (isset($_GET["cari"])) {
    $keyword = $_GET['keyword'];
    $mahasiswa = query("SELECT * FROM mahasiswa WHERE NAMA LIKE '%$keyword%' OR NIM LIKE '%$keyword%' OR EMAIL LIKE '%$keyword%'");
    }else{
        $mahasiswa = query("SELECT * FROM mahasiswa");
}

?>
<?php if(empty($mahasiswa)) :?>
    <tr>
        <td colspan="7">
            <h1 align="center">Data Tidak DItemukan!</h1>
        </td>
    </tr>
<?php else : ?>
    <?php $i = 1; ?>
    <?php foreach($mahasiswa as $mhs) : ?>
        <tr>
            <td><?= $i ?></td>
            <td style=" text-align: center;">
            <a href="edit.php?id=<?=$mhs['NIM'];?>"><button type="button"
            class="btn btn-info">Edit</button></a>
            <a href="delete.php?id=<?=$mhs['NIM'];?> onclick="return
            confirm('Anda yakin ingin menghapus data ini?')"><button 
            type="button" class="btn btn-danger">Hapus</button></a></td>
            <td><img src="../img/<?= $mhs['GAMBAR']; ?>" width="50" </td>
            <td><?= $mhs['NIM']; ?></td>
            <td><?= $mhs['NAMA']; ?></td>
            <td><?= $mhs['EMAIL']; ?></td>
            <td><?= $mhs['JURUSAN']; ?></td>
            <td><?= $mhs['FAKULTAS']; ?></td>
        </tr>
    <?php $i++; ?>
    <?php  endforeach ?>
<?php endif ?>