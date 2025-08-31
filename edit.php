<?php
include 'koneksi.php';

// Ambil ID mahasiswa dari URL
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id");
$mhs = mysqli_fetch_assoc($data);

// Jika data tidak ditemukan
if (!$mhs) {
    echo "Data tidak ditemukan!";
    exit;
}

// Proses update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim  = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];

    // Validasi: NIM harus angka
    if (!ctype_digit($nim)) {
        echo "<script>
                alert('NIM harus berupa angka!');
                window.location.href='edit.php?id=$id';
              </script>";
        exit;
    }

    // Cek apakah NIM sudah dipakai mahasiswa lain
    $cek = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim' AND id!=$id");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
                alert('NIM sudah dipakai mahasiswa lain!');
                window.location.href='edit.php?id=$id';
              </script>";
        exit;
    }

    // Jika validasi lolos maka update data
    mysqli_query($conn, "UPDATE mahasiswa 
                         SET nim='$nim', nama='$nama', umur=$umur 
                         WHERE id=$id");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-card">
        <h2>Edit Data Mahasiswa</h2>
        <form method="POST">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" 
                   value="<?= $mhs['nim'] ?>" 
                   required pattern="[0-9]{9}" 
                   title="NIM harus berupa 9 digit angka">

            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" 
                   value="<?= $mhs['nama'] ?>" required>

            <label for="umur">Umur</label>
            <input type="number" name="umur" id="umur" 
                   value="<?= $mhs['umur'] ?>" required min="15" max="60">

            <button type="submit">💾 Update</button>
        </form>
        <br>
        <a href="index.php" class="kembali">← Batal & Kembali</a>
    </div>
</body>
</html>
