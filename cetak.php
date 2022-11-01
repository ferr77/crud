<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

$mpdf = new \Mpdf\Mpdf();


$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>NO.</th>
            <th>GAMBAR</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>EMAIL</th>
            <th>JURUSAN</th>
            <th>FAKULTAS</th>
        </tr>';
    $i= 1;
    foreach($mahasiswa as $mhs) {
        $html .= '<tr>
        <td>'. $i++ .'</td>
        <td><img src="../img/'. $mhs['GAMBAR'] .'" width="30"></td>
        <td>'. $mhs['NIM'] .'</td>
        <td>'. $mhs['NAMA'] .'</td>
        <td>'. $mhs['EMAIL'] .'</td>
        <td>'. $mhs['JURUSAN'] .'</td>
        <td>'. $mhs['FAKULTAS'] .'</td>
    </tr>';
    }

$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();

?>