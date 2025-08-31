<?php
include 'koneksi.php';

// Mengambil data mahasiswa berdasarkan ID
$id = $_GET['id']; 
$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id");
$mhs = mysqli_fetch_assoc($data);

// Kalo data tidak ditemukan
if (!$mhs) {
    echo "Data tidak ditemukan!";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="detail-card">
        <h2>Detail Mahasiswa</h2>
        <p><b>ID:</b> <?= $mhs['id'] ?></p>
        <p><b>NIM:</b> <?= $mhs['nim'] ?></p>
        <p><b>Nama:</b> <?= $mhs['nama'] ?></p>
        <p><b>Umur:</b> <?= $mhs['umur'] ?></p>
        <a href="index.php" class="kembali">← Kembali ke Daftar</a>
    </div>
</body>
</html>
