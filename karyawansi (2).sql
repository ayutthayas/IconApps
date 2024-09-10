-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2024 at 04:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyawansi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id`, `id_karyawan`, `nama`, `waktu`) VALUES
(18, '9', 'Abdul Muhlisin Sudirman', 'Sunday, 20-09-2020 01:31:05 pm'),
(19, '35250478', 'hajar', 'Tuesday, 20-08-2024 02:36:55 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar`
--

CREATE TABLE `tb_daftar` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_daftar`
--

INSERT INTO `tb_daftar` (`id`, `username`, `password`) VALUES
(6, 'hajar11', '1718'),
(7, 'tutik11', '12344321'),
(8, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inputuser`
--

CREATE TABLE `tb_inputuser` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp_pribadi` varchar(20) NOT NULL,
  `asal_instansi` varchar(100) NOT NULL,
  `dosen_guru` varchar(100) NOT NULL,
  `no_telp_dosen_guru` varchar(20) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `divisi_magang` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_inputuser`
--

INSERT INTO `tb_inputuser` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `no_telp_pribadi`, `asal_instansi`, `dosen_guru`, `no_telp_dosen_guru`, `alamat_instansi`, `divisi_magang`, `username`, `password`, `foto`) VALUES
(1, 'hajar37', 'Gresik, 28 september 2003', '2003-02-28', 'Perempuan', 'Islam', 'Jl. kacapecah', '0834448921', 'Politeknik Negeri Jember', 'Sinin', '08xxx', 'jwjjwjjw', 'HAR', 'hjr.magang34', '$2y$10$TwoCVfnbqkQIeqUcdNM5P.aIzQT7xGQpuug1Jq4u5f1X0ODNnaW02', 'WhatsApp Image 2024-06-10 at 00.32.40_72de09e8.jpg'),
(3, 'tutik', 'probowangi, ', '2024-08-07', 'Laki-laki', 'islam', 'jl. wkwkw', '0891212', 'polije', 'hafidz', '08xxx', 'jl. mastrip', 'activasi corpo', 'magang.tutik2', '$2y$10$95BUx0jZ5VMAc2a6ynfAX.beZy1mflGXsrQMSRJm0egGSLUcN.qmu', 'a2b5a21f-5b16-4946-8621-833e3f02b181.jpg'),
(4, 'serian', 'Banyuwangi', '2024-08-09', 'Perempuan', 'islam', 'jjj', '098667', 'jsnsjjnd', 'uhdhjakk', '096579', 'njkall', 'engineer', 'serianmagang23', '$2y$10$IrcgY9UTcbrwUhbyfMEQfuOjQMCbD8PONYDAWgz8/Bybz67GRMJ52', '4f7defd8def4aa14ed04b671a4c45a44.jpg'),
(5, 'galang', 'bondowoso', '2024-08-15', 'Laki-laki', 'islam', 'jl. apa', '089899', 'bjwqjk', 'yuni', '00990', 'ywjk', 'teknik', 'pkl.galang24', '$2y$10$j2wgb6daC09p7lwC1bIfSuIiXhNla6IReVVJ1SVPiLZxZbGZlqPuG', '3_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id`, `jabatan`) VALUES
(3, 'CEO'),
(4, 'CTO'),
(5, 'CFO'),
(6, 'WP Pemasaran'),
(7, 'CMO'),
(8, 'COO'),
(9, 'Office Boy');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tmp_tgl_lahir` varchar(255) NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_tel` varchar(18) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `username`, `password`, `nama`, `tmp_tgl_lahir`, `jenkel`, `agama`, `alamat`, `no_tel`, `jabatan`, `foto`) VALUES
(9, 'Abdul', 'd41d8cd98f00b204e9800998ecf8427e', 'Abdul Muhlisin Sudirman', 'Klaten / 19-09-1994', 'Laki-laki', 'Islam', 'China', '0895635721923', 'CEO', '21092020072509employee1.png'),
(192, 'sarah', '9e9d7a08e048e9d604b79460b54969c3', 'Sarah Mutia', 'Cianjur / 10-12-1992', 'Perempuan', 'Islam', '', '08128384848', 'CEO', '10092020025112employee3.png'),
(35250478, 'hajar11', 'fc6709bfdf0572f183c1a84ce5276e96', 'hajar', 'Jombang, 17 Mei 1989', 'Perempuan', 'Islam', '', '089765321890', 'CEO', '20082024093251Computer login-rafiki.png'),
(999999999, 'bagas', 'ee776a18253721efe8a62e4abd29dc47', 'bagas a', 'Jakarta / 10-01-1990', 'Laki-laki', 'Islam', 'Jakarta', '0895628383333', 'Office Boy', '10092020024120employee3.png'),
(1920392912, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Budi Sanjaya', 'Bekasi / 10-12-1980', 'Laki-laki', 'Kristen', '', '0895254859994', 'CEO', '10092020023942employee1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keterangan`
--

CREATE TABLE `tb_keterangan` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `alasan` text NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_keterangan`
--

INSERT INTO `tb_keterangan` (`id`, `id_karyawan`, `nama`, `keterangan`, `alasan`, `waktu`, `bukti`) VALUES
(51, '9', 'Abdul Muhlisin', 'Sakit', 'Saya Sakit Pak', 'Thursday, 10-09-2020 07:53:23 am', '10092020025339suratket1.png'),
(52, '999999999', 'bagas a', 'Izin', 'Mohon maaf bapak / ibu, untuk hari ini saya tidak bisa hadir, dikarenakan saya izin.', 'Thursday, 10-09-2020 07:55:20 am', '10092020025619suratket2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_inputuser`
--
ALTER TABLE `tb_inputuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_inputuser`
--
ALTER TABLE `tb_inputuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
