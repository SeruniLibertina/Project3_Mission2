<?php
// Konfigurasi koneksi database
$host = "localhost";
$user = "root"; // sesuaikan username
$pass = "";     // sesuaikan password
$db   = "db_akademik";

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
