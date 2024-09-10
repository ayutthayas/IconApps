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

// Ambil data berdasarkan no
$id = $_GET['id']; // Asumsikan no dikirim sebagai parameter URL
$query = "SELECT * FROM tb_inputuser WHERE id='$id'";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Data tidak ditemukan!";
    exit();
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f7f8fa;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group label {
            font-weight: 600;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="form-title">Form Edit Data</h2>
                    <form action="proses_edit.php" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row ['nama']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="" disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" class="form-control" id="agama" name="agama" value="<?php echo $row['agama']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $row['alamat']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="no_telp_pribadi">No Telp Pribadi</label>
                            <input type="tel" class="form-control" id="no_telp_pribadi" name="no_telp_pribadi" value="<?php echo $row['no_telp_pribadi']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="asal_instansi">Asal Instansi</label>
                            <input type="text" class="form-control" id="asal_instansi" name="asal_instansi" value="<?php echo $row['asal_instansi']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="dosen_guru">Dosen/Guru Penanggung Jawab</label>
                            <input type="text" class="form-control" id="dosen_guru" name="dosen_guru" value="<?php echo $row['dosen_guru']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="no_telp_dosen_guru">No Telp Dosen/Guru Penanggung Jawab</label>
                            <input type="tel" class="form-control" id="no_telp_dosen_guru" name="no_telp_dosen_guru" value="<?php echo $row['no_telp_dosen_guru']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat_instansi">Alamat Instansi</label>
                            <textarea class="form-control" id="alamat_instansi" name="alamat_instansi" rows="3" required><?php echo $row['alamat_instansi']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="divisi_magang">Divisi Magang</label>
                            <input type="text" class="form-control" id="divisi_magang" name="divisi_magang" value="<?php echo $row['divisi_magang']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">
                            <img src="uploads/<?php echo $row['foto']; ?>" alt="Foto" class="img-thumbnail mt-2" style="max-width: 150px;">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        <a href="admin2.php" class="btn btn-secondary btn-block">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>