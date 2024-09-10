<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="Dashboard">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.2/main.min.css" rel="stylesheet" />

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <!-- Custom CSS -->
    <style>
        .table {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background-color: #162255; /* Updated blue color */
            color: #ffffff;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #162255; /* Updated blue color */
            border-color: #162255; /* Updated blue color */
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0d1a3e; /* Darker shade of the blue color */
            border-color: #0d1a3e; /* Darker shade of the blue color */
        }

        .link-box {
            margin-top: 20px;
            text-align: center;
        }

        .link-box a {
            display: inline-block;
            padding: 10px 20px;
            color: #ffffff;
            background-color: #333;
            border-radius: 5px;
            text-decoration: none;
        }

        .link-box a:hover {
            background-color: #555;
        }

        .clock {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        .action-box {
            margin-top: 20px;
            text-align: center;
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
                            <h1>IconSen</h1>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Table for Total Members and Attendance Info -->
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jumlah Hadir</th>
                                                <th>Jumlah Telat</th>
                                                <th>Jumlah Tidak Masuk</th>
                                                <th>Total Anggota</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Replace the below values with actual data fetching logic
                                            $jumlah_hadir = 50; // Example value
                                            $jumlah_telat = 5; // Example value
                                            $jumlah_tidak_masuk = 2; // Example value
                                            $total_anggota = 57; // Example value

                                            echo "<tr>";
                                            echo "<td>1</td>"; // Example row number
                                            echo "<td>" . $jumlah_hadir . "</td>";
                                            echo "<td>" . $jumlah_telat . "</td>";
                                            echo "<td>" . $jumlah_tidak_masuk . "</td>";
                                            echo "<td>" . $total_anggota . "</td>";
                                            echo "</tr>";
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Real-Time Clock -->
                                <div class="clock" id="clock"></div>
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
    
    <!-- FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.2/main.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <script>
        // Real-time clock function
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
        }
        setInterval(updateClock, 1000);
        updateClock(); // initial call

        // Initialize calendar
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    // Example events
                    { title: 'Meeting', date: '2024-08-01' },
                    { title: 'Conference', date: '2024-08-07' }
                ]
            });
            calendar.render();
        });
    </script>
</body>

</html>
