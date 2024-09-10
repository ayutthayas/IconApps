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

// Hapus foto dari server jika diperlukan
// Ambil nama file foto untuk dihapus
$query = "SELECT foto FROM tb_inputuser WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

if ($row && $row['foto']) {
    $filePath = 'uploads/' . $row['foto'];
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

// Query untuk menghapus data
$query = "DELETE FROM tb_inputuser WHERE id = $id";

if (mysqli_query($koneksi, $query)) {
    header("Location: view_data.php?message=Data berhasil dihapus");
    exit();
} else {
    header("Location: view_data.php?message=Gagal menghapus data");
    exit();
}

// Tutup koneksi
mysqli_close($koneksi);
?>
