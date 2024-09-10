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

// Mendapatkan ID dari parameter URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    die("ID tidak valid.");
}

// Query untuk mendapatkan data berdasarkan ID
$query = "SELECT * FROM tb_inputuser WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
} else {
    die("Data tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Pengguna</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: 500;
            text-align: center;
            font-size: 1.5rem;
        }

        .table th {
            width: 30%;
            background-color: #f1f1f1;
            font-weight: 500;
        }

        .table img {
            border-radius: 8px;
        }

        .btn {
            font-weight: 500;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .fa-arrow-left {
            margin-right: 5px;
        }
    </style>
</head>
 
<body class="animsition">
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location: detail.php.php");
    } else {
        $username = $_SESSION['username'];
    }
    ?>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a href="index.html">
                            <h2>Dashboard</h2>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a class="js-arrow" href="admin2.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-table"></i>Data User</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li><a href="#">Input Data</a></li>
                                <li><a href="viewdatauser.php">View Data</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="data_absen.php">
                                <i class="fas fa-calendar-alt"></i>Data Absen</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Detail Data Pengguna
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td><?php echo htmlspecialchars($data['id']); ?></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td><?php echo htmlspecialchars($data['nama']); ?></td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td><?php echo htmlspecialchars($data['tempat_lahir']); ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td><?php echo htmlspecialchars($data['tanggal_lahir']); ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td><?php echo htmlspecialchars($data['jenis_kelamin']); ?></td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td><?php echo htmlspecialchars($data['agama']); ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?php echo htmlspecialchars($data['alamat']); ?></td>
                        </tr>
                        <tr>
                            <th>No Telp Pribadi</th>
                            <td><?php echo htmlspecialchars($data['no_telp_pribadi']); ?></td>
                        </tr>
                        <tr>
                            <th>Asal Instansi</th>
                            <td><?php echo htmlspecialchars($data['asal_instansi']); ?></td>
                        </tr>
                        <tr>
                            <th>Dosen/Guru</th>
                            <td><?php echo htmlspecialchars($data['dosen_guru']); ?></td>
                        </tr>
                        <tr>
                            <th>No Telp Dosen/Guru</th>
                            <td><?php echo htmlspecialchars($data['no_telp_dosen_guru']); ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Instansi</th>
                            <td><?php echo htmlspecialchars($data['alamat_instansi']); ?></td>
                        </tr>
                        <tr>
                            <th>Divisi Magang</th>
                            <td><?php echo htmlspecialchars($data['divisi_magang']); ?></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td><?php echo htmlspecialchars($data['username']); ?></td>
                        </tr>
                        <tr>
                            <th>Password (Hashed)</th>
                            <td><?php echo htmlspecialchars($data['password']); ?></td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td><img src="uploads/<?php echo htmlspecialchars($data['foto']); ?>" alt="Foto" class="img-fluid" width="200"></td>
                        </tr>
                    </table>
                </div>
                <a href="admin2.php" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
// Tutup koneksi
mysqli_close($koneksi);
?>
