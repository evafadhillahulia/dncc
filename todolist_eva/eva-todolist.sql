-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 01, 2023 at 03:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eva-todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tugas_eva`
--

CREATE TABLE `tugas_eva` (
  `id_tugas` int(250) NOT NULL,
  `nama_tugas` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tugas_eva`
--

INSERT INTO `tugas_eva` (`id_tugas`, `nama_tugas`, `keterangan`, `deadline`) VALUES
(4, 'Fisika 1', 'Mengerjakan soal', '2023-07-07 19:28:00'),
(5, 'Algoritma Pemrograman', 'Presentasi Insertion Sort', '2023-07-06 19:33:00'),
(6, 'Web Lanjut', 'Membuat website E-Commerce', '2023-07-15 20:17:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tugas_eva`
--
ALTER TABLE `tugas_eva`
  ADD PRIMARY KEY (`id_tugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tugas_eva`
--
ALTER TABLE `tugas_eva`
  MODIFY `id_tugas` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
