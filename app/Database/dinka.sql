-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 06:55 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinka`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(15) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `jk` char(1) NOT NULL,
  `ttl` varchar(75) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `subject` varchar(75) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `jk`, `ttl`, `alamat`, `subject`, `phone`, `email`) VALUES
(20220002, 'Jerome Polin', 'L', '2022-06-11', 'Jakarta Selatan', 'Matematika', '085677889944', 'jerome@gmail.com'),
(20220003, 'Muhammad Nauval', 'L', '2022-06-25', 'Griya Bukit Jaya', 'Bahasa Inggris', '08788889900', 'nauvall@gmail.com'),
(20220004, 'Marhaban Kurnia', 'L', '2022-07-16', 'Cibinong', 'Fisika', '081938768895', 'marhaban@gmail.com'),
(20220005, 'Maudy Ayunda', 'P', '2022-06-29', 'Jakarta Selatan', 'Bahasa Indonesia', '081938768895', 'maudy33@gmail.com'),
(20220006, 'Rayaza Andrea', 'P', '2022-06-18', 'Depok, Jatijajar', 'Biologi', '08788889900', 'rayaza@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `jumlah`, `total`) VALUES
(10, 'XI IPA U1', '35', '35'),
(11, 'XI IPA U2', '35', '35'),
(12, 'XI IPA U3', '35', '35'),
(13, 'XI IPA U4', '35', '35'),
(14, 'XI IPA U5', '35', '35');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(15) NOT NULL,
  `mapel` varchar(25) NOT NULL,
  `kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `mapel`, `kelas`) VALUES
(5, 'Matematika', 'XI IPA U2'),
(7, 'Bahasa Indonesia', 'XI IPA U1'),
(8, 'Bahasa Inggris', 'XI IPA U3'),
(9, 'Biologi', 'XI IPA U4'),
(10, 'Fisika', 'XI IPA U5');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nis` varchar(16) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `jk` char(1) NOT NULL,
  `ttl` varchar(75) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(75) NOT NULL,
  `kelas_id` int(15) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `jk`, `ttl`, `alamat`, `phone`, `email`, `kelas_id`) VALUES
(11, '20220001', 'Xeniorita Herwindo', 'P', '2022-06-10', 'Griya Bukit Jaya', '08788889900', 'xeniorita33@gmail.com', 10),
(12, '20220002', 'Galang Azzahra', 'L', '2022-06-25', 'Depok, Jatijajar', '081938768895', 'galang@gmail.com', 12),
(13, '20220003', 'Bayu Adjie', 'L', '2022-06-03', 'Depok, Jatijajar', '081938768895', 'bayu.adjie@gmail.com', 14),
(14, '20220004', 'Mentari Adinata', 'P', '2022-06-23', 'Griya Bukit Jaya Blok C No.1', '08179998800', 'mentari.ays@gmail.com', 13),
(15, '20220005', 'Naufal Mumtaz', 'L', '2022-06-11', 'Perum. Permata Sari', '085677889944', 'naufal@gmail.com', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `name`) VALUES
('bayu1', 'bayu1', 'Bayu Adjie'),
('maudy1', 'maudy1', 'Maudy Ayunda'),
('mumtaz1', 'mumtaz1', 'Naufal Mumtaz'),
('xeno1', 'xeno1', 'Xeniorita H');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20220007;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
