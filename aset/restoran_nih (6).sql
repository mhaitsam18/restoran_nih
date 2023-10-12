-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 04:49 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran_nih`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `saldo` int(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `nama`, `email`, `no_telp`, `password`, `saldo`, `foto`) VALUES
('indahmayangs', 'Indah Mayang Sari Sitompul', 'indahmayangsarisitompul@gmail.com', '085819088180', '6482a68eabb1b128f3572068ad5daa0f', 360000, 'upload_member/good-smile-company_good-smile-company-nendoroid-sakura-haruno-action-figure_full04.jpg'),
('mhaitsam18', 'Muhammad Haitsam', 'haitsam03@gmail.com', '082117503125', 'c79d80a5ebb0e4a7d720cee4672e6f2a', 249510, 'upload_member/3x4.jpg'),
('nunu', 'Nurul Fadhilah', 'nurulfadhilah488@gmail.com', '085213413630', '3319dff7ab8bc708d53aa97ee7a0359c', 300000, 'upload_member/nendoroid_nendoroid-co-de-yamatonokami-yasusada-action-figure_full04.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` varchar(255) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `rating` int(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `nama_menu`, `harga`, `rating`, `foto`) VALUES
('A001', 'Ayam Bakar', 18000, 9, 'upload_menu/ayambakar.jpg'),
('A002', 'Nasi Goreng', 21000, 8, 'upload_menu/nasi_goreng.jpg'),
('A003', 'Ikan Asin', 12000, 6, 'upload_menu/ikan asin.jpg'),
('A004', 'Es Teh Manis', 3500, 8, 'upload_menu/minum-es-teh-manis-sembarangan-undang-penyakit-kolera-m7yDDngXvr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`username`, `password`, `nama`, `email`, `no_telp`, `alamat`, `job`, `foto`) VALUES
('mhaitsam18', 'c79d80a5ebb0e4a7d720cee4672e6f2a', 'Muhammad Haitsam', 'haitsam03@gmail.com', '082117503125', 'Karawang', 'Direktur', 'upload_pegawai/3x4.jpg'),
('nurulfadhilah0', '2f8c3ab806a42e79c774cb09b41a53c8', 'Nurul Fadhilah', 'nurulfadhilah488@gmail.com', '082117503125', 'BKT', 'kasir', 'upload_pegawai/Ntrj5M6M.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kode_bayar` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `total_harga` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_member`
--

CREATE TABLE `pembayaran_member` (
  `kd_bayar` int(255) NOT NULL,
  `kd_pemesanan` int(255) NOT NULL,
  `total_harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_tamu`
--

CREATE TABLE `pembayaran_tamu` (
  `kd_bayar` int(255) NOT NULL,
  `kd_pemesanan` int(255) NOT NULL,
  `total_harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_member`
--

CREATE TABLE `pemesanan_member` (
  `kd_pemesanan` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `menu_id` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `sub_harga` int(255) NOT NULL,
  `no_meja` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_tamu`
--

CREATE TABLE `pemesanan_tamu` (
  `kd_pemesanan` int(255) NOT NULL,
  `guest_id` int(255) NOT NULL,
  `menu_id` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `sub_harga` int(255) NOT NULL,
  `no_meja` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_tamu`
--

INSERT INTO `pemesanan_tamu` (`kd_pemesanan`, `guest_id`, `menu_id`, `jumlah`, `sub_harga`, `no_meja`) VALUES
(6, 24, 'A003', 1, 12000, 1),
(7, 24, 'A004', 1, 3500, 1),
(8, 25, 'A002', 2, 42000, 1),
(11, 29, 'A003', 1, 12000, 1),
(12, 29, 'A002', 2, 42000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `guest_id` int(255) NOT NULL,
  `guest_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`guest_id`, `guest_name`) VALUES
(1, 'Isam'),
(2, 'Isam'),
(3, 'Isam'),
(4, 'Isam'),
(5, 'Isam'),
(6, 'dani'),
(7, 'Isam'),
(8, 'Isam'),
(9, 'Isam'),
(10, 'Isam'),
(11, 'Isam'),
(12, 'Isam'),
(13, ''),
(14, 'Isam'),
(15, 'Isam'),
(16, ''),
(17, ''),
(18, 'Isam'),
(19, 'Isam'),
(20, 'Isam'),
(21, 'Isam'),
(22, 'Isam'),
(23, ''),
(24, 'Isam'),
(25, 'Indah'),
(26, 'Isam'),
(27, 'Nurul'),
(28, 'Isam'),
(29, 'Nunu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kode_bayar`);

--
-- Indexes for table `pembayaran_member`
--
ALTER TABLE `pembayaran_member`
  ADD PRIMARY KEY (`kd_bayar`),
  ADD KEY `kd_pemesanan` (`kd_pemesanan`);

--
-- Indexes for table `pembayaran_tamu`
--
ALTER TABLE `pembayaran_tamu`
  ADD PRIMARY KEY (`kd_bayar`),
  ADD KEY `kd_pemesanan` (`kd_pemesanan`);

--
-- Indexes for table `pemesanan_member`
--
ALTER TABLE `pemesanan_member`
  ADD PRIMARY KEY (`kd_pemesanan`),
  ADD KEY `username` (`username`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `pemesanan_tamu`
--
ALTER TABLE `pemesanan_tamu`
  ADD PRIMARY KEY (`kd_pemesanan`),
  ADD KEY `guest_id` (`guest_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`guest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `kode_bayar` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_member`
--
ALTER TABLE `pembayaran_member`
  MODIFY `kd_bayar` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_tamu`
--
ALTER TABLE `pembayaran_tamu`
  MODIFY `kd_bayar` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan_member`
--
ALTER TABLE `pemesanan_member`
  MODIFY `kd_pemesanan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `pemesanan_tamu`
--
ALTER TABLE `pemesanan_tamu`
  MODIFY `kd_pemesanan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `guest_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran_member`
--
ALTER TABLE `pembayaran_member`
  ADD CONSTRAINT `pembayaran_member_ibfk_1` FOREIGN KEY (`kd_pemesanan`) REFERENCES `pemesanan_member` (`kd_pemesanan`);

--
-- Constraints for table `pembayaran_tamu`
--
ALTER TABLE `pembayaran_tamu`
  ADD CONSTRAINT `pembayaran_tamu_ibfk_1` FOREIGN KEY (`kd_pemesanan`) REFERENCES `pemesanan_tamu` (`kd_pemesanan`);

--
-- Constraints for table `pemesanan_member`
--
ALTER TABLE `pemesanan_member`
  ADD CONSTRAINT `pemesanan_member_ibfk_1` FOREIGN KEY (`username`) REFERENCES `member` (`username`),
  ADD CONSTRAINT `pemesanan_member_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `pemesanan_tamu`
--
ALTER TABLE `pemesanan_tamu`
  ADD CONSTRAINT `pemesanan_tamu_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `tamu` (`guest_id`),
  ADD CONSTRAINT `pemesanan_tamu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
