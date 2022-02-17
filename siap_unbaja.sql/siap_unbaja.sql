-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 06:34 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siap_unbaja`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `npm` char(10) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `gambar` varchar(40) DEFAULT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `npm`, `jurusan`, `gambar`, `email`) VALUES
(2, 'Muh Rizal Sidik', '1301171025', 'Teknik Informatika', 'Rizal.jpg', 'rizal@gmail.com'),
(31, 'Muhajirin', '1301171022', 'Manajemen Informasi', '5e80bd9fc29a5.jpg', 'Muhajirin@gmail.com'),
(32, 'Dandi Putra Sutisna', '1301171016', 'Teknik Informatika', '5ea7e0607dc0b.jpg', 'Dandi@gmail.com'),
(33, 'Firmansyah', '1301171001', 'Teknik Informatika', '5eb24cd3609f8.png', 'Firmansyah@gmail.com'),
(38, 'Mildawati', '3302171007', 'Pendidikan Bahasa Inggris', '5ea941d31fec4.jpg', 'milda@gmail.com'),
(39, 'Firmansyah', '1301171022', 'Teknik Sipil', NULL, 'Firmansyah@gmail.com'),
(40, 'Fitri Anggraeni', '1301171331', 'Teknik Informatika', '', 'Fitri@gmail.com'),
(41, 'Irfan Rifaldi', '1301171015', 'Teknik Informatika', '', 'Irfan@gmail.com'),
(42, 'Rizki Ramadhan', '1301171000', 'Teknik Sipil', '', 'Rizki@gmail.com'),
(47, 'Paijo muhid', '1301171011', 'Pendidikan Bahasa Inggris', '', 'Paijo@gmail.com'),
(49, 'Supratman Basuki', '1301171311', 'Kewirausahaan', '', 'Supratman@gmail.com'),
(54, 'Wahidin Halim', '1301171258', 'Pendidikan Bahasa Inggris', '', 'Wahidin@gmail.com'),
(55, 'Ranti', '1301171012', 'Administrasi Kesehatan', '', 'Ranti@gmail.com'),
(56, 'Neneng', '1301171456', 'Pendidikan PKN', '', 'Neneng@gmail.com'),
(58, 'Ike', '1301161030', 'Teknik Lingkungan', '', 'Ike@gmail.com'),
(66, 'Ibnu', '1304471444', 'Teknik Sipil', NULL, 'ibnu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `majors` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `majors`) VALUES
(1, 'Teknik Sipil'),
(2, 'Teknik Industri'),
(3, 'Teknik Lingkungan'),
(4, 'Sistem Informasi'),
(5, 'Teknik Informatika'),
(6, 'Manajemen Informatika'),
(7, 'Komputerisasi Akuntansi'),
(8, 'Pendidikan PKN'),
(9, 'Pendidikan Akuntansi'),
(10, 'Pendidikan Bahasa Inggris'),
(11, 'Kewirausahaan'),
(12, 'Manajemen Retail'),
(13, 'Administrasi Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `strata`
--

CREATE TABLE `strata` (
  `id` int(11) NOT NULL,
  `strata` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `strata`
--

INSERT INTO `strata` (`id`, `strata`) VALUES
(1, 'DIII'),
(2, 'S1'),
(3, 'S2');

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE `thesis` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publication_year` varchar(4) NOT NULL,
  `location` enum('rak1','rak2','rak3') NOT NULL,
  `input_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`id`, `title`, `author`, `publication_year`, `location`, `input_date`) VALUES
(1, 'Management Perpustakaaan', 'Muris', '2020', 'rak1', '2020-05-27'),
(2, 'Belajar singkat php7', 'Rizal', '2020', 'rak2', '2020-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(4, 'mildawati', '$2y$10$23k8Us7SdoBBT4ErBCuQnOnNXIzpSx6KMDY3gJSEaHDGu8PDZI002'),
(5, 'rizal', '$2y$10$Q.5Jw8UjrNB8L18nOxlJ3OrB/ST6oS9ufj49qA0s4nexBdPq8D37m');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nim` int(10) NOT NULL,
  `majors` varchar(30) NOT NULL,
  `strata` varchar(4) NOT NULL,
  `phone_number` decimal(15,0) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`id`, `name`, `nim`, `majors`, `strata`, `phone_number`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `title`, `file`) VALUES
(6, 'Dini', 1301171012, 'Sistem Informasi', 'DIII', '81382838288', 'dini@gmail.com', 'kartini_jpg.jpg', '$2y$10$Czrml8bJhL9CRH419h7Rd.ouSoQXKvMkvUB.imA6szqU97cRBbQlm', 2, 0, 1589123621, '', ''),
(7, 'Muh Rizal Sidik', 1301171025, 'Manajemen Retail', 'DIII', '81383888838', 'rizal@gmail.com', 'Pas_photo_RizalNew1.jpg', '$2y$10$D.fnGXUp3cDlzax1SQVo3.r3goRlBTomflKUYSZrTo1NQ/J1C3VMC', 1, 1, 1589125365, 'Sistem Informasi Administrasi Perpustakaan', 'BAB_I_BAB_II.pdf'),
(8, 'Mildawati', 330117101, 'Pendidikan Bahasa Inggris', 'S1', '82234567899', 'milda@gmail.com', '5ea941d31fec4.jpg', '$2y$10$CPkvBGdNcOmcJ3RYeQNn/OFrMDgCpH8JxVmSq101Sw4rSZJp/ECk6', 2, 0, 1589125378, '', ''),
(20, 'Aje Kendor', 1301171999, 'Manajemen Retail', 'S1', '85253545556', 'ajekendor011@gmail.com', 'default.jpg', '$2y$10$MVdiTFcp4IdcrwVg5tqd0ut0hRGNd2RWgodTFTBh7SIaxPYoxDA.6', 2, 0, 1590398802, '', ''),
(21, 'Dandi Putra Sutisna', 1301171016, 'Teknik Informatika', 'DIII', '81319907733', 'rizalsm7@gmail.com', 'Dandi.jpg', '$2y$10$5PhUt0KCgZHNCG/FPUradegw5YK88DYFrSq/vn7SJlCEO5mjCYL3.', 2, 1, 1591062916, '', ''),
(24, 'Rusliyadi', 1301171026, 'Komputerisasi Akuntansi', 'DIII', '82161219994', 'rizalsmuh@gmail.com', 'default.JPG', '$2y$10$o1FZ0X6r29D25Nk92uNeEuu1zEVyRKtK3fvpzFNX.GJ9ax9enO432', 2, 0, 1591065634, '', ''),
(29, 'Firjatullah', 1301171951, 'Kewirausahaan', 'S1', '81517171818', 'siapunbaja@gmail.com', 'default.JPG', '$2y$10$HllgaR9L0z9vg4Tt.cjMRes3VARZRASzQ4tSw95pGeuTxOO0hJ6EG', 2, 1, 1591711126, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(42, 1, 2),
(48, 1, 5),
(49, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'Report');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-home', 1),
(2, 2, 'Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Identitas Laporan', 'user/laporan', 'fas fa-fw fa-address-card', 1),
(4, 3, 'Pengelolaan Menu', 'menu', 'fas fa-fw fa-tasks', 1),
(5, 3, 'Pengelolaan Submenu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(9, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(10, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 0),
(11, 1, 'Data Anggota', 'admin/member', 'fas fa-fw fa-users', 1),
(13, 1, 'Transaction', 'admin/transaction', 'fas fa-fw fa-exchange-alt', 0),
(17, 3, 'coba', 'menu/coba', 'fab fa-fw fa-youtube', 0),
(25, NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL),
(31, 2, 'Pencarian', 'user/search', 'fas fa-fw fa-search', 1),
(32, 5, 'Cetak Laporan', 'report/index', 'fas fa-fw fa-print', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(6, 'ajekendor011@gmail.com', 'uMOoLcueYlI/mcozOzeip3dZIF+vz8RJmGQ89vPcKWk=', 1590400972);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strata`
--
ALTER TABLE `strata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `strata`
--
ALTER TABLE `strata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `thesis`
--
ALTER TABLE `thesis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
