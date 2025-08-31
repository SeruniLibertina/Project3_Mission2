<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Mahasiswa</h2>

    <!-- Form Pencarian -->
    <form method="GET" action="search.php">
        <input type="text" name="keyword" placeholder="Cari NIM atau Nama">
        <button type="submit">Cari</button>
    </form>

    <a href="tambah.php">+ Tambah Data</a>
    <br><br>

    <!-- Tabel Data Mahasiswa -->
    <table cellpadding="8">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>{$i}</td>
                <td>{$row['nim']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['umur']}</td>
                <td>
                    <a href='detail.php?id={$row['id']}' class='detail'>🔍 Detail</a>
                    <a href='edit.php?id={$row['id']}' class='edit'>✏️ Edit</a>
                    <a href='hapus.php?id={$row['id']}' class='hapus'>❌ Hapus</a>
                </td>
            </tr>";
            $i++;
        }
        ?>
    </table>
</body>
</html>
