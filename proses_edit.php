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

// Ambil data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$no_telp_pribadi = $_POST['no_telp_pribadi'];
$asal_instansi = $_POST['asal_instansi'];
$dosen_guru = $_POST['dosen_guru'];
$no_telp_dosen_guru = $_POST['no_telp_dosen_guru'];
$alamat_instansi = $_POST['alamat_instansi'];
$divisi_magang = $_POST['divisi_magang'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password jika perlu diperbarui
$foto = $_FILES['foto']['name'];

// Jika ada file foto yang diupload, update foto
if ($foto) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        echo "File " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " telah diupload.";
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload file.";
    }

    // Update dengan foto
    $query = "UPDATE tb_inputuser SET 
        nama='$nama',
        tempat_lahir='$tempat_lahir',
        tanggal_lahir='$tanggal_lahir',
        jenis_kelamin='$jenis_kelamin',
        agama='$agama',
        alamat='$alamat',
        no_telp_pribadi='$no_telp_pribadi',
        asal_instansi='$asal_instansi',
        dosen_guru='$dosen_guru',
        no_telp_dosen_guru='$no_telp_dosen_guru',
        alamat_instansi='$alamat_instansi',
        divisi_magang='$divisi_magang',
        username='$username',
        password='$password',
        foto='$foto'
        WHERE id='$id'";
} else {
    // Update tanpa foto
    $query = "UPDATE tb_inputuser SET 
        nama='$nama',
        tempat_lahir='$tempat_lahir',
        tanggal_lahir='$tanggal_lahir',
        jenis_kelamin='$jenis_kelamin',
        agama='$agama',
        alamat='$alamat',
        no_telp_pribadi='$no_telp_pribadi',
        asal_instansi='$asal_instansi',
        dosen_guru='$dosen_guru',
        no_telp_dosen_guru='$no_telp_dosen_guru',
        alamat_instansi='$alamat_instansi',
        divisi_magang='$divisi_magang',
        username='$username',
        password='$password'
        WHERE id='$id'";
}

if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil diperbarui.";
    header("Location: view_data.php"); // Redirect ke halaman view_data.php
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
