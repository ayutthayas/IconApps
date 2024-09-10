<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Edit Data User">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="Edit Data User">

    <!-- Title Page -->
    <title>Edit Data User</title>

    <!-- Fontfaces CSS -->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS -->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS -->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    } else {
        $username = $_SESSION['username'];  
    }

    // Koneksi ke database
    include 'koneksi.php';

    // Mendapatkan ID dari URL
    $id = $_GET['id'];

    // Mengambil data user berdasarkan ID
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($result);

    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];

        // Update data user
        $query = "UPDATE users SET nama = '$nama', email = '$email', username = '$username' WHERE id = '$id'";
        mysqli_query($koneksi, $query);

        // Redirect ke halaman View Data User
        header("location: viewdatauser.php");
    }
    ?>
    <div class="page-wrapper">
        <!-- HEADER MOBILE -->
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
                                <li><a href="inputdatauser.php">Input Data</a></li>
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
        <!-- END HEADER MOBILE -->

        <!-- MENU SIDEBAR -->
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
                                <li><a href="inputdatauser.php">Input Data</a></li>
                                <li><a href="viewdatauser.php">View Data</a></li>
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
        <!-- END MENU SIDEBAR -->

        <!-- PAGE CONTAINER -->
        <div class="page-container">
            <!-- HEADER DESKTOP -->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <h1>IconSen</h1>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP -->

            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Edit Data User</h2>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $data['email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" value="<?php echo $data['username']; ?>" required>
                                    </div>
                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->

            <!-- FOOTER -->
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2024</p>
                    </div>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!-- END PAGE CONTAINER -->
    </div>

    <!-- Jquery JS -->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS -->
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

    <!-- Main JS -->
    <script src="js/main.js"></script>

</body>

</html>
