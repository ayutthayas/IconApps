<?php
session_start();
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
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
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $foto = $_FILES['foto']['name'];

    // Upload file foto
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        echo "File " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " telah diupload.";
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload file.";
    }

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO tb_inputuser (nama, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, no_telp_pribadi, asal_instansi, dosen_guru, no_telp_dosen_guru, alamat_instansi, divisi_magang, username, password, foto) 
              VALUES ('$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$no_telp_pribadi', '$asal_instansi', '$dosen_guru', '$no_telp_dosen_guru', '$alamat_instansi', '$divisi_magang', '$username', '$password', '$foto')";

    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi
    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sistem Informasi Karyawan - Home</title>
  <link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="index.html"><img src="img/" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
              <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li> 
              <li class="nav-item"><a class="nav-link" href="#login" rel="page-scroll">Login</a></li> 
              <li class="nav-item"><a class="nav-link" href="#kontak" rel="page-scroll">Kontak</a></li>
            </ul>
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->

  <main class="side-main">
    <!--================ Hero sm Banner start =================-->      
    <section class="hero-banner mb-30px">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="hero-banner__img">
              <img class="img-fluid" src="img/logokaryawan.png" alt="">
            </div>
          </div>
          <div class="col-lg-5 pt-5">
            <div class="hero-banner__content">
              <h1>Tentang Website Ini</h1>
              <p>Website ini berfungsi sebagai absensi PKL dan sebagai sistem informasi PKL.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Hero sm Banner end =================-->

    <!--================ Input Data section start =================-->      
    <section class="section-margin">
      <div class="container">
        <div class="section-intro pb-85px text-center">
          <h2 class="section-intro__title">Input Data Karyawan</h2>
          <p class="section-intro__subtitle"></p>
        </div>

        <form method="POST" enctype="multipart/form-data">
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
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="agama">Agama</label>
            <input type="text" class="form-control" id="agama" name="agama" required>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
          </div>
          <div class="form-group">
            <label for="no_telp_pribadi">No Telp Pribadi</label>
            <input type="text" class="form-control" id="no_telp_pribadi" name="no_telp_pribadi" required>
          </div>
          <div class="form-group">
            <label for="asal_instansi">Asal Instansi</label>
            <input type="text" class="form-control" id="asal_instansi" name="asal_instansi" required>
          </div>
          <div class="form-group">
            <label for="dosen_guru">Dosen/Guru</label>
            <input type="text" class="form-control" id="dosen_guru" name="dosen_guru" required>
          </div>
          <div class="form-group">
            <label for="no_telp_dosen_guru">No Telp Dosen/Guru</label>
            <input type="text" class="form-control" id="no_telp_dosen_guru" name="no_telp_dosen_guru" required>
          </div>
          <div class="form-group">
            <label for="alamat_instansi">Alamat Instansi</label>
            <textarea class="form-control" id="alamat_instansi" name="alamat_instansi" required></textarea>
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
            <input type="file" class="form-control-file" id="foto" name="foto" required>
          </div>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
      </div>
    </section>
    <!--================ Input Data section end =================-->      

    <!--================ about section start =================-->      

  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap">
    <div class="container">
      <div class="row">
        <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget"></div>
        <div class="col-xl-4 col-md-8 mb-4 mb-xl-0 single-footer-widget"></div>
      </div>
      <div class="footer-bottom row align-items-center text-center text-lg-left">
        <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Bayu Tutor</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
        <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
          <a href="https://www.facebook.com/zibran.vitadiyatama.7/" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <a href="https://github.com/ZibranovSky" target="_blank"><i class="fab fa-github"></i></a>
          <a href="https://www.linkedin.com/in/muhammad-zibran-fitadiyatama-6550801a9/" target="_blank" ><i class="fab fa-linkedin" target="_blank"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!-- ================ End footer Area ================= -->

  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
