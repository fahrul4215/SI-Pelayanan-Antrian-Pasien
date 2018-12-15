-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2018 at 08:31 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelayanan_antrian_pasien`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_resep`
--

CREATE TABLE `detail_resep` (
  `id_detail_resep` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_resep`
--

INSERT INTO `detail_resep` (`id_detail_resep`, `id_obat`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 2),
(2, 2),
(2, 2),
(2, 2),
(2, 2),
(2, 2),
(2, 2),
(2, 2),
(2, 2),
(2, 2),
(2, 2),
(2, 2),
(2, 2),
(2, 2),
(2, 3),
(2, 2),
(2, 4),
(2, 2),
(2, 2),
(2, 2),
(3, 2),
(4, 3),
(5, 2),
(6, 4),
(7, 2),
(0, 2),
(8, 2),
(0, 2),
(0, 2),
(0, 2),
(9, 2),
(0, 4),
(0, 2),
(0, 2),
(0, 2),
(0, 2),
(0, 2),
(0, 2),
(10, 2),
(0, 4),
(0, 2),
(11, 1),
(0, 3),
(12, 4),
(13, 2),
(0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama`, `spesialis`) VALUES
(1, 'Tajuddin', 'Cinta');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kartu`
--

CREATE TABLE `jenis_kartu` (
  `id_jenis_kartu` int(11) NOT NULL,
  `nama_kartu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kartu`
--

INSERT INTO `jenis_kartu` (`id_jenis_kartu`, `nama_kartu`) VALUES
(1, 'Askes'),
(2, 'BPJS');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `exp_date`, `jumlah`, `nama_obat`, `jenis_obat`) VALUES
(1, '2018-10-17', 3, 'Aspirin', 'Pain Killer'),
(2, '2018-10-31', 4, 'Paracetamol', 'Pereda Panas'),
(3, '2020-02-02', 2, 'lol', 'LOL'),
(4, '2020-05-02', 4, 'lolpaosdopk', 'pol');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_jenis_kartu` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat`, `jenis_kelamin`, `pekerjaan`, `tgl_lahir`, `no_hp`, `id_jenis_kartu`, `username`, `password`) VALUES
(1, 'Paul', 'Jalan Jaksa Agung Suprapto gang 1B no 197', 'L', 'LOL', '2009-05-20', '', 2, '', ''),
(2, 'Rio Irvansyah', 'Jalan Elok Sekali dilihatnya', 'L', 'LOL', '1998-03-20', '6285645896741', 2, 'rio', 'd5ed38fdbf28bc4e58be142cf5a17cf5'),
(3, 'Pak Aji', '197', 'P', 'LOL', '2020-05-30', '6281232246320', 1, 'aji', '8d045450ae16dc81213a75b725ee2760'),
(4, 'Iqbal', 'Jalan Jaksa Agung Suprapto gang 1B no 197', 'L', 'LOL', '2003-02-02', '6282244604241', 1, 'iqbal', 'eedae20fc3c7a6e9c5b1102098771c70');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `level`, `username`, `password`) VALUES
(1, 'Fahrul', 0, 'fahrul', '9b5317575f071bdccef2175b72191004');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `nama`, `keterangan`) VALUES
(1, 'Umum', 'Buka jam 08.00 - 12.00'),
(2, 'Gigi', ''),
(3, 'KIA - KB', '');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id_registrasi` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `id_resep` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `status_antrian` enum('belum','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id_registrasi`, `id_pasien`, `id_poli`, `id_resep`, `tanggal`, `no_antrian`, `status_antrian`) VALUES
(1, 1, 1, 2, '2018-12-14', 1, 'belum'),
(7, 4, 1, 0, '2018-12-14', 2, 'belum'),
(8, 4, 2, 0, '2018-12-14', 1, 'belum'),
(9, 2, 1, 0, '2018-12-14', 3, 'belum'),
(10, 4, 3, 0, '2018-12-14', 1, 'belum'),
(11, 4, 1, 6, '2018-12-15', 1, 'selesai'),
(12, 2, 2, 7, '2018-12-15', 1, 'selesai'),
(13, 2, 1, 8, '2018-12-15', 2, 'selesai'),
(14, 4, 1, 9, '2018-12-15', 1, 'selesai'),
(15, 4, 2, 0, '2018-12-15', 1, 'belum'),
(16, 2, 1, 0, '2018-12-15', 2, 'belum'),
(17, 2, 3, 0, '2018-12-15', 1, 'belum'),
(18, 2, 2, 0, '2018-12-15', 2, 'belum'),
(19, 3, 1, 0, '2018-12-15', 3, 'belum'),
(20, 4, 1, 0, '2018-12-15', 4, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `id_detail_resep` int(11) NOT NULL,
  `status` enum('Belum','Sudah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `id_detail_resep`, `status`) VALUES
(2, 1, 'Belum'),
(3, 2, 'Belum'),
(4, 10, 'Belum'),
(5, 10, 'Belum'),
(6, 10, ''),
(7, 10, ''),
(8, 11, 'Sudah'),
(9, 12, 'Sudah'),
(10, 13, 'Belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD KEY `fk_obat` (`id_obat`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jenis_kartu`
--
ALTER TABLE `jenis_kartu`
  ADD PRIMARY KEY (`id_jenis_kartu`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `fk_jenis_kartu` (`id_jenis_kartu`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id_registrasi`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_resep` (`id_resep`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `fk_detail_resep` (`id_detail_resep`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jenis_kartu`
--
ALTER TABLE `jenis_kartu`
  MODIFY `id_jenis_kartu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD CONSTRAINT `detail_resep_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`id_jenis_kartu`) REFERENCES `jenis_kartu` (`id_jenis_kartu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD CONSTRAINT `registrasi_ibfk_2` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registrasi_ibfk_4` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
