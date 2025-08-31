<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Hapus data mahasiswa berdasarkan ID
if ($id) {
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");
}

// Kembali ke halaman utama
header("Location: index.php");
exit;
?>
