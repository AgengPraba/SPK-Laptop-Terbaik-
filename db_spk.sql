-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2024 at 03:14 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `cpu` int NOT NULL,
  `gpu` int NOT NULL,
  `ram` int NOT NULL,
  `ssd` int NOT NULL,
  `harga` int NOT NULL,
  `ketajaman_warna` int NOT NULL,
  `berat` int NOT NULL,
  `ukuran_layar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`id`, `nama`, `cpu`, `gpu`, `ram`, `ssd`, `harga`, `ketajaman_warna`, `berat`, `ukuran_layar`) VALUES
(1, 'ASUS TUF A15', 4, 4, 4, 5, 3, 3, 2, 4),
(2, 'MSI Thin A15', 4, 5, 3, 5, 3, 3, 3, 4),
(3, 'ASUS Vivobook Go 14', 2, 1, 4, 4, 4, 3, 4, 3),
(4, 'Advan Workplus', 3, 2, 4, 4, 4, 2, 4, 3),
(5, 'Lenovo LOQ 15AX9I', 4, 4, 3, 5, 3, 5, 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
