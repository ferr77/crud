<?php
require 'functions.php';
$NIM = $_GET['NIM'];
if (delete($NIM) > 0) {
    echo "<script>
    alert('Data Berhasil Dihapus!');
    document.location.href = 'index.php';
    </script>";
}else{
    echo "<script>
    alert('Data Gagal Dihapus!');
    document.location.href = 'index.php';
    </script>";
}
?>