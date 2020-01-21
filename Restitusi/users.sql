-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 06:33 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `level_user` enum('admin') NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nip`, `password`, `nama_admin`, `level_user`, `gambar`) VALUES
(1, 'asd', 'asd', 'asd', 'admin', 'enal.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id_agenda` int(11) NOT NULL,
  `no_restitusi` int(11) NOT NULL,
  `tujuan` text NOT NULL,
  `agenda` text NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_pulang` date NOT NULL,
  `lama_sppd` varchar(20) NOT NULL,
  `biaya_transportasi` int(11) NOT NULL,
  `biaya_penginapan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agenda`
--

INSERT INTO `tb_agenda` (`id_agenda`, `no_restitusi`, `tujuan`, `agenda`, `tgl_berangkat`, `tgl_pulang`, `lama_sppd`, `biaya_transportasi`, `biaya_penginapan`, `jumlah`, `keterangan`) VALUES
(16, 89999, 'makassar - mamuju', 'perbaikan meteran listrik', '2019-10-28', '2019-10-31', '9 hari', 100000, 200000, 300000, NULL),
(17, 123, 'asd - asd', 'asd', '2019-10-28', '2019-10-31', '2 hari', 1, 2, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `komentar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `komentar`) VALUES
(1, 'asdassssssssssssssssssssss'),
(5, 'proses'),
(7, 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_restitusi`
--

CREATE TABLE `tb_restitusi` (
  `tgl_post` date NOT NULL,
  `id_restitusi` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_restitusi` int(11) NOT NULL,
  `foto_formulir_sppd` text NOT NULL,
  `foto_tiket_pesawat` text NOT NULL,
  `foto_kwitansi_tiket` text NOT NULL,
  `foto_boarding_pass` text NOT NULL,
  `foto_kwitansi_penginapan` text NOT NULL,
  `foto_sppd_manual` text NOT NULL,
  `status` enum('Proses','Di Terima','Di Tolak') NOT NULL,
  `komentar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_restitusi`
--

INSERT INTO `tb_restitusi` (`tgl_post`, `id_restitusi`, `id_user`, `no_restitusi`, `foto_formulir_sppd`, `foto_tiket_pesawat`, `foto_kwitansi_tiket`, `foto_boarding_pass`, `foto_kwitansi_penginapan`, `foto_sppd_manual`, `status`, `komentar`) VALUES
('2019-10-28', 2, 29, 89999, 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/uploads/Foto Formulir SPPD 089999.jpg', 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/uploads/Foto Tiker Pesawat PP 089999.jpg', 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/uploads/Foto Kwitansi Tiket 089999.jpg', 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/uploads/Foto Boarding Pass 089999.jpg', 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/uploads/Foto Kwitansi Penginapan 089999.jpg', 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/uploads/Foto SPPD Manual 089999.jpg', 'Di Terima', 'asdasdasdasd'),
('2019-10-28', 3, 29, 123, 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/uploads/Foto Formulir SPPD 123.jpg', 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/uploads/Foto Tiker Pesawat PP 123.jpg', 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/uploads/Foto Kwitansi Tiket 123.jpg', 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/uploads/Foto Boarding Pass 123.jpg', 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/uploads/Foto Kwitansi Penginapan 123.jpg', 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/uploads/Foto SPPD Manual 123.jpg', 'Di Tolak', 'Foto Blur Kanda');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('Laki - Laki','Perempuan') NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `nip`, `name`, `tgl_lahir`, `alamat`, `jk`, `email`, `password`, `photo`) VALUES
(29, '123ddd', 'Ahayy', '1996-11-07', 'ddd', 'Laki - Laki', 'ddd@ddd', 'ddd', 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/profile_image/29.jpeg'),
(32, '60200115068', 'Marzuki . R', '0000-00-00', 'Jl. Marsuki Dg. Nompo ', 'Laki - Laki', 'enalmarzuki07@gmail.com', 'enal1233', 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/profile_image/32.jpeg'),
(37, '1234qwerty', 'qwertyy', '1996-11-07', 'Jl. Marsuki Dg. Nompo No.4', 'Laki - Laki', 'qwerty@qwerty', 'qwerty', 'http://172.20.10.3//Android/KoneksiPHPRestitusiPLN/profile_image/kosong.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `no_restitusi` (`no_restitusi`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_restitusi`
--
ALTER TABLE `tb_restitusi`
  ADD PRIMARY KEY (`id_restitusi`,`no_restitusi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `tb_restitusi_ibfk_2` (`no_restitusi`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_restitusi`
--
ALTER TABLE `tb_restitusi`
  MODIFY `id_restitusi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD CONSTRAINT `tb_agenda_ibfk_1` FOREIGN KEY (`no_restitusi`) REFERENCES `tb_restitusi` (`no_restitusi`);

--
-- Constraints for table `tb_restitusi`
--
ALTER TABLE `tb_restitusi`
  ADD CONSTRAINT `tb_restitusi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
