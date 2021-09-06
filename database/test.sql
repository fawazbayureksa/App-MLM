-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 08:20 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `nama_user` varchar(50) NOT NULL,
  `upline` varchar(50) NOT NULL,
  `downline` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`nama_user`, `upline`, `downline`) VALUES
('Ainul', '', 'Fikri'),
('Fikri', 'Ainul', ''),
('Ainul', '', 'Farah'),
('Farah', 'Ainul', ''),
('Fikri', '', 'Andi'),
('Andi', 'Fikri', ''),
('Fikri', '', 'Bayu'),
('Bayu', 'Fikri', ''),
('Farah', '', 'Sandi'),
('Sandi', 'Farah', ''),
('Farah', '', 'Nur '),
('Nur ', 'Farah', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `no_telp`) VALUES
('A001', 'Ainul', 'Makassar', '082328362232'),
('A002', 'Fikri', 'Makassar', '08239547293'),
('A003', 'Farah', 'Makassar', '08212738951'),
('A004', 'Andi', 'Makassar', '082233445566'),
('A005', 'Bayu', 'Makassar', '082397472284'),
('A006', 'Sandi', 'Bandung', '087273638473'),
('A007', 'Nur ', 'Bandung', '08228229373');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD KEY `id_user` (`nama_user`),
  ADD KEY `id_user_2` (`nama_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
