<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'karyawansi'; // Ganti dengan nama database Anda
$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Ambil ID dari URL
$id = $_GET['id'];

// Query untuk menghapus data
$query = "DELETE FROM tb_inputuser WHERE id = $id";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data berhasil dihapus'); window.location.href = 'view_data.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data'); window.location.href = 'view_data.php';</script>";
}

// Tutup koneksi
mysqli_close($koneksi);
?>
