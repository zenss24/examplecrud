-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 04:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peralatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktualisasi`
--

CREATE TABLE `aktualisasi` (
  `id_kalibrasi` int(11) NOT NULL,
  `id_alat` int(10) NOT NULL,
  `realisasi` date NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `status_alat` enum('Pass','Not Ok','','') NOT NULL,
  `checker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktualisasi`
--

INSERT INTO `aktualisasi` (`id_kalibrasi`, `id_alat`, `realisasi`, `tgl_berlaku`, `status_alat`, `checker`) VALUES
(1090, 1015, '2023-12-01', '2024-01-01', 'Pass', 'Yulian'),
(1091, 1011, '2023-12-20', '2024-02-14', 'Pass', 'Adi'),
(1092, 10022, '2024-01-26', '2024-02-23', 'Pass', 'Robi'),
(1096, 10028, '2023-12-08', '2024-02-08', 'Pass', 'Danar');

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(10) NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id_alat`, `nama_alat`, `deskripsi`, `jumlah`) VALUES
(1011, 'Multitester', 'Alat untuk mengukur kelistrikan', 1),
(1015, 'Lux Meter', 'Alat ukur intensitas cahaya', 2),
(1016, 'Meteran', 'alat untuk mengukur panjang benda', 2),
(1035, 'Fuller Gauge', 'alat untuk mengukur jarak space 2 benda', 2),
(1036, 'Penggaris', 'alat ukur panjang cm dan inchi', 5),
(10022, 'Shoremeter', 'alat untuk mengukur kekenyalan roll mesin cetak', 2),
(10028, 'Water Level Gauge', 'alat untuk mengukur kerataan suatu permukaan', 2),
(10029, 'Thread Gauge', 'alat untuk mengukur standar pitch ulir', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(6) NOT NULL,
  `nik` int(8) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `role` enum('staff','karyawan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `nik`, `nama`, `role`, `email`, `password`) VALUES
(1, 67060, 'Maya Febi', 'staff', 'mayafebi@metaform.co.id', 'meta12345'),
(3, 42501, 'Danar Bagus', 'karyawan', 'danarbs@metaform.co.id', 'meta12345'),
(30, 67001, 'Leo Muhammad Sofyan', 'staff', 'leomuhsofyan@metaform.co.id', 'meta12345');

-- --------------------------------------------------------

--
-- Table structure for table `plot_jadwal`
--

CREATE TABLE `plot_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_alat` int(10) NOT NULL,
  `expired_kalibrasi` date NOT NULL,
  `jadwal_baru` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plot_jadwal`
--

INSERT INTO `plot_jadwal` (`id_jadwal`, `id_alat`, `expired_kalibrasi`, `jadwal_baru`) VALUES
(120, 1011, '2023-12-22', '2024-02-16'),
(121, 10028, '2023-12-21', '2024-01-01'),
(122, 10029, '2024-01-02', '2024-01-08'),
(125, 10022, '2023-12-20', '2024-01-04'),
(128, 1035, '2023-12-25', '2024-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktualisasi`
--
ALTER TABLE `aktualisasi`
  ADD PRIMARY KEY (`id_kalibrasi`),
  ADD KEY `id_alat` (`id_alat`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `plot_jadwal`
--
ALTER TABLE `plot_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `plot_jadwal_ibfk_1` (`id_alat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktualisasi`
--
ALTER TABLE `aktualisasi`
  MODIFY `id_kalibrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1097;

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10111112;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78988;

--
-- AUTO_INCREMENT for table `plot_jadwal`
--
ALTER TABLE `plot_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktualisasi`
--
ALTER TABLE `aktualisasi`
  ADD CONSTRAINT `aktualisasi_ibfk_1` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plot_jadwal`
--
ALTER TABLE `plot_jadwal`
  ADD CONSTRAINT `plot_jadwal_ibfk_1` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
