<?php 
include 'koneksi.php';

// Proses tambah data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim  = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];

    // Validasi: NIM harus angka
    if (!ctype_digit($nim)) {
        echo "<script>
                alert('NIM harus berupa angka!');
                window.location.href='tambah.php';
              </script>";
        exit;
    }

    // Cek apakah NIM sudah ada
    $cek = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
                alert('NIM sudah ada, gunakan NIM lain!');
                window.location.href='tambah.php';
              </script>";
        exit;
    } 

    // Jika validasi lolos maka simpan data baru
    mysqli_query($conn, "INSERT INTO mahasiswa (nim, nama, umur) VALUES ('$nim','$nama',$umur)");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-card">
        <h2>Tambah Data Mahasiswa</h2>
        <form method="POST">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" placeholder="Masukkan NIM (9 digit angka)" 
                   required pattern="[0-9]{9}" title="NIM harus berupa 9 digit angka">

            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" required>

            <label for="umur">Umur</label>
            <input type="number" name="umur" id="umur" placeholder="Masukkan Umur" required min="15" max="60">

            <button type="submit">💾 Simpan</button>
        </form>
        <br>
        <a href="index.php" class="detail">← Kembali</a>
    </div>
</body>
</html>
