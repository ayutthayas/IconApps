<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'karyawansi'; // ganti dengan nama database Anda
$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Ambil data dari form dengan validasi
$nama = isset($_POST['nama']) ? mysqli_real_escape_string($koneksi, $_POST['nama']) : '';
$tempat_lahir = isset($_POST['tempat_lahir']) ? mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']) : '';
$tanggal_lahir = isset($_POST['tanggal_lahir']) ? mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']) : '';
$jenis_kelamin = isset($_POST['jenis_kelamin']) ? mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']) : '';
$agama = isset($_POST['agama']) ? mysqli_real_escape_string($koneksi, $_POST['agama']) : '';
$alamat = isset($_POST['alamat']) ? mysqli_real_escape_string($koneksi, $_POST['alamat']) : '';
$no_telp_pribadi = isset($_POST['no_telp_pribadi']) ? mysqli_real_escape_string($koneksi, $_POST['no_telp_pribadi']) : '';
$asal_instansi = isset($_POST['asal_instansi']) ? mysqli_real_escape_string($koneksi, $_POST['asal_instansi']) : '';
$dosen_guru = isset($_POST['dosen_guru']) ? mysqli_real_escape_string($koneksi, $_POST['dosen_guru']) : '';
$no_telp_dosen_guru = isset($_POST['no_telp_dosen_guru']) ? mysqli_real_escape_string($koneksi, $_POST['no_telp_dosen_guru']) : '';
$alamat_instansi = isset($_POST['alamat_instansi']) ? mysqli_real_escape_string($koneksi, $_POST['alamat_instansi']) : '';
$divisi_magang = isset($_POST['divisi_magang']) ? mysqli_real_escape_string($koneksi, $_POST['divisi_magang']) : '';
$username = isset($_POST['username']) ? mysqli_real_escape_string($koneksi, $_POST['username']) : '';
$password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : ''; // Hash password
$foto = isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : '';

// Validasi file upload
if ($foto != '') {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file adalah gambar
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            echo "File " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " telah diupload.";
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload file.";
        }
    } else {
        echo "File bukan gambar.";
    }
}

// Query untuk menyimpan data ke database
$query = "INSERT INTO tb_inputuser (nama, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, no_telp_pribadi, asal_instansi, dosen_guru, no_telp_dosen_guru, alamat_instansi, divisi_magang, username, password, foto) 
          VALUES ('$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$no_telp_pribadi', '$asal_instansi', '$dosen_guru', '$no_telp_dosen_guru', '$alamat_instansi', '$divisi_magang', '$username', '$password', '$foto')";

if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil disimpan.";
    header("Location: view_data.php"); // Redirect ke halaman view_data.php
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>
