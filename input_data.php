<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Form Input Data">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="Form Input Data">

    <!-- Title Page -->
    <title>Form Input Data</title>

    <!-- Fontfaces CSS -->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS -->
    <link href="css/theme.css" rel="stylesheet" media="all">

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

<body class="animsition">
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
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

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <h2>Admin</h2>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-table"></i>Data User</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li><a href="input_data.php">Input Data</a></li>
                                <li><a href="view_data.php">View Data</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="data_absen.php">
                                <i class="fas fa-calendar-alt"></i>Data Absen</a>
                        </li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <h1>Form Input Data</h1>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="form-container">
                                    <h2 class="form-title">Form Input Data</h2>
                                    <form action="proses_input.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <input type="text" class="form-control" id="agama" name="agama" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="no_telp_pribadi">No Telp Pribadi</label>
                                            <input type="tel" class="form-control" id="no_telp_pribadi" name="no_telp_pribadi" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="asal_instansi">Asal Instansi</label>
                                            <input type="text" class="form-control" id="asal_instansi" name="asal_instansi" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="dosen_guru">Dosen/Guru Penanggung Jawab</label>
                                            <input type="text" class="form-control" id="dosen_guru" name="dosen_guru" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="no_telp_dosen_guru">No Telp Dosen/Guru Penanggung Jawab</label>
                                            <input type="tel" class="form-control" id="no_telp_dosen_guru" name="no_telp_dosen_guru" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat_instansi">Alamat Instansi</label>
                                            <textarea class="form-control" id="alamat_instansi" name="alamat_instansi" rows="3" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="divisi_magang">Divisi Magang</label>
                                            <input type="text" class="form-control" id="divisi_magang" name="divisi_magang" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                        <a href="admin2.php" class="btn btn-secondary btn-block">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

            <!-- FOOTER-->
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2024</p>
                    </div>
                </div>
            </div>
            <!-- END FOOTER-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS -->
    <script src="vendor/slick/slick.min.js"></script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
