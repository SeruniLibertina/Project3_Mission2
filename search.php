<?php
include 'koneksi.php';

// Ambil keyword pencarian (jika ada)
$keyword = $_GET['keyword'] ?? '';

// Cari data mahasiswa berdasarkan NIM atau Nama
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim LIKE '%$keyword%' OR nama LIKE '%$keyword%'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Hasil Pencarian: "<?= $keyword ?>"</h2>
    <a href="index.php">← Kembali ke Daftar</a>
    <br><br>

    <!-- Tabel Hasil Pencarian -->
    <table cellpadding="8">
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Aksi</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nim']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['umur']}</td>
                    <td>
                        <a href='detail.php?id={$row['id']}'>Detail</a> |
                        <a href='edit.php?id={$row['id']}'>Edit</a> |
                        <a href='hapus.php?id={$row['id']}'>Hapus</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data ditemukan.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
