<?php
function koneksi(){
    $conn = mysqli_connect("localhost", "root", "") or die ("Koneksi ke DB gagal!");
    mysqli_select_db($conn, "classdata") or die("Database salah!");

    return $conn;
}
function query($sql){
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");

    $rows = [];
    while ( $row = mysqli_fetch_assoc ($result)) {
        $rows[] = $row;
    };
    return $rows;
}
function tambah($data) {
    $conn = koneksi();

    $NIM = htmlspecialchars($data['NIM']);
    $NAMA = htmlspecialchars($data['NAMA']);
    $EMAIL = htmlspecialchars($data['EMAIL']);
    $JURUSAN = htmlspecialchars($data['JURUSAN']);
    $FAKULTAS = htmlspecialchars($data['FAKULTAS']);
    $GAMBAR = htmlspecialchars($data['GAMBAR']);

    $querytambah = "INSERT INTO mahasiswa VALUES ('$NIM', '$NAMA', '$EMAIL', '$JURUSAN', '$FAKULTAS', '$GAMBAR')";
    mysqli_query($conn, $querytambah);
    return mysqli_affected_rows($conn);
}
function delete($NIM){
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE NIM = $NIM");
    return mysqli_affected_rows($conn);
}
function edit($data) {
    $conn = koneksi();

    $NIM = $data['NIM'];
    $NAMA = htmlspecialchars($data['NAMA']);
    $EMAIL = htmlspecialchars($data['EMAIL']);
    $JURUSAN = htmlspecialchars($data['JURUSAN']);
    $FAKULTAS = htmlspecialchars($data['FAKULTAS']);
    $GAMBAR = htmlspecialchars($data['GAMBAR']);

    $queryedit = "UPDATE mahasiswa SET NIM = '$NIM', NAMA = '$NAMA', EMAIL = '$EMAIL', JURUSAN = '$JURUSAN', FAKULTAS = '$FAKULTAS', GAMBAR = '$GAMBAR' WHERE NIM = '$NIM' ";
    mysqli_query($conn, $queryedit);
    return mysqli_affected_rows($conn);
}
function cari($keyword) {
    $querycari = "SELECT * FROM mahasiswa WHERE NAMA LIKE '%$keyword%' OR NIM LIKE '%$keyword%' OR EMAIL LIKE '%$keyword%' ";
    return query($querycari);
}
function registrasi($data) {
    $conn = koneksi();
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai')
            </script>";
            return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
    return mysqli_affected_rows($conn);
}
?>