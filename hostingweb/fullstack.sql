-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2023 at 06:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fullstack`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `Kategori` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `rangkuman` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `Kategori`, `judul`, `tanggal`, `rangkuman`) VALUES
(5, 'Olahraga', 'Pemenang Piala dunia 2022', '1 Januari 2022', 'Argentina berhasil memenangkan piala dunia setelah mengalahkan Prancis');

-- --------------------------------------------------------

--
-- Table structure for table `daftarproduk`
--

CREATE TABLE `daftarproduk` (
  `id` int(11) NOT NULL,
  `gambar` mediumblob NOT NULL,
  `namaproduk` varchar(50) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftarproduk`
--

INSERT INTO `daftarproduk` (`id`, `gambar`, `namaproduk`, `harga`, `deskripsi`, `kategori`) VALUES
(3, 0x68747470733a2f2f617773696d616765732e646574696b2e6e65742e69642f636f6d6d756e6974792f6d656469612f76697375616c2f323032322f30312f32342f72657365702d73696f6d61792d6179616d5f34332e6a7065673f773d31323030, 'Dimsum Ayam', '25.000', 'Makanan Khas Hongkong yang berisi ayam dan dibalut kulit pangsit lalu dikukus', 'makanan'),
(4, 0x68747470733a2f2f696d616765732e756e73706c6173682e636f6d2f70686f746f2d313534363036393930312d6261393539396137653633633f69786c69623d72622d342e302e3326697869643d4d6e77784d6a4133664442384d48786c6548427362334a6c4c575a6c5a5752384d58783866475675664442386648783826773d3130303026713d3830, 'Salad', '25.000', 'Makanan rendah kalori tinggi protein dan serat untuk kamu yang mau diet', 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomer` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `nomer`, `alamat`) VALUES
(3, 'Ivan', 'ifam4@yahoo.com', '081326926776', 'Plamongan Indah');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `namaproduk` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `catatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `namaproduk`, `jumlah`, `harga`, `alamat`, `catatan`) VALUES
(11, 'Dimsum', 2, 50000, 'Plamongan Indah', 'pedas'),
(12, 'Salad', 2, 50000, 'Pucang Gading', 'Tinggi Protein');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(12, 'coba', 'password', '$2y$10$pRnHesCBb.YTlRc0.5OSmuIFgVUWemDhxIc3w4yeY8iYAanA2wtAG'),
(13, 'Ivan', 'ifam4@yahoo.com', '$2y$10$br.rWLhuH0hbP9GDSkmEju1UtJaF7oldmI7e7OYmTH6KDsHVLlU3S'),
(14, 'orang', 'orang@gmail.com', '$2y$10$kp9X7IpbZeX5C01XKOUe5OTg9FS6P.vZhCrn.3nJhn8QpZu20lOba');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(1) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `video` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `judul`, `video`) VALUES
(17, 'Kerajinan Batik', 'https://www.youtube.com/embed/KNEg8bMn2Zg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftarproduk`
--
ALTER TABLE `daftarproduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daftarproduk`
--
ALTER TABLE `daftarproduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
