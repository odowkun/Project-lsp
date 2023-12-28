-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 08:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
create database `db_lsp`;
use `db_lsp`;
--

-- --------------------------------------------------------

--
-- Table structure for table `masterdata`
--

CREATE TABLE `masterdata` (
  `nim` char(10) NOT NULL,
  `namaAsesi` varchar(60) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `smester` enum('1','2','3','4','5','6','7','8') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masterdata`
--

INSERT INTO `masterdata` (`nim`, `namaAsesi`, `jurusan`, `prodi`, `smester`) VALUES
('2115354030', 'Komang Meriani', 'Pariwisata', 'Management Pariwisata', '6'),
('2115354066', ' Kadek Dwika Ananda', 'Teknik Mesin', 'Mesin Berat', '8'),
('2115354070', 'Kadek Yudha Ananda Putra', 'Teknik Elektro', 'TRPL', '7');

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `nipAdmin` char(18) NOT NULL,
  `namaAdmin` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`nipAdmin`, `namaAdmin`) VALUES
('197801112002121003', 'I Gusti Putu Mastawan Eka Putra, S.T.,M.T.');

-- --------------------------------------------------------

--
-- Table structure for table `tbasesi`
--

CREATE TABLE `tbasesi` (
  `nim` char(10) NOT NULL,
  `namaAsesi` varchar(60) NOT NULL,
  `smester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `nomor` varchar(15) DEFAULT NULL,
  `tempatLahir` varchar(20) DEFAULT NULL,
  `tanggalLahir` date DEFAULT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `kebangsaan` varchar(20) DEFAULT NULL,
  `alamatRumah` varchar(100) DEFAULT NULL,
  `kodePos` char(5) DEFAULT NULL,
  `noTelp` varchar(15) DEFAULT NULL,
  `kualifikasiPendidikan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbasesi`
--

INSERT INTO `tbasesi` (`nim`, `namaAsesi`, `smester`, `jurusan`, `prodi`, `email`, `nomor`, `tempatLahir`, `tanggalLahir`, `jenisKelamin`, `kebangsaan`, `alamatRumah`, `kodePos`, `noTelp`, `kualifikasiPendidikan`) VALUES
('2115354066', ' Kadek Dwika Ananda', '8', 'Teknik Mesin', 'Mesin Berat', 'asd@gmail.com', '5103051201231', 'Negara', '2023-07-09', 'Laki-laki', 'Indonesia', 'Perumahan Jimbaran No 29, Kuta Selatan, Badung, Bali', '80361', '08123232323', 'SMA Sederajat'),
('2115354070', 'Kadek Yudha Ananda Putra', '7', 'Teknik Elektro', 'TRPL', 'anan@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbjadwal`
--

CREATE TABLE `tbjadwal` (
  `idjadwal` int(11) NOT NULL,
  `kodeSkema` varchar(20) NOT NULL,
  `periodeMulai` date NOT NULL,
  `periodeSelesai` date NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `limit` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbjadwal`
--

INSERT INTO `tbjadwal` (`idjadwal`, `kodeSkema`, `periodeMulai`, `periodeSelesai`, `tempat`, `limit`) VALUES
(1, '2', '2023-07-04', '2023-07-05', 'PNB', 100),
(2, '2', '2023-07-04', '2023-07-05', 'PNB', 100),
(3, '4', '2023-07-17', '2023-07-18', 'Gedung K', 100),
(4, '1', '2023-07-19', '2023-07-26', 'Politeknik Negeri Bali', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbjurusan`
--

CREATE TABLE `tbjurusan` (
  `idJurusan` tinyint(4) NOT NULL,
  `namaJurusan` varchar(50) NOT NULL,
  `nipAdmin` char(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbjurusan`
--

INSERT INTO `tbjurusan` (`idJurusan`, `namaJurusan`, `nipAdmin`) VALUES
(1, 'Teknik Elektro', '197801112002121003'),
(2, 'Teknik Mesin', '197801112002121003'),
(3, 'Teknik Sipil', '197801112002121003'),
(4, 'Pariwisata', '197801112002121003'),
(5, 'Akutansi', '197801112002121003'),
(6, 'Administrasi Bisnis', '197801112002121003');

-- --------------------------------------------------------

--
-- Table structure for table `tblogin`
--

CREATE TABLE `tblogin` (
  `username` varchar(18) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblogin`
--

INSERT INTO `tblogin` (`username`, `password`, `level`) VALUES
('197801112002121000', '12345', '1'),
('197801112002121003', '12345', '0'),
('197801112002121010', 'KRF9', '1'),
('2115354066', 'XQLB', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbpegawai`
--

CREATE TABLE `tbpegawai` (
  `nipPegawai` char(18) NOT NULL,
  `namaPegawai` varchar(60) NOT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `noHP` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `tempatLahir` varchar(255) NOT NULL,
  `tanggalLahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbpegawai`
--

INSERT INTO `tbpegawai` (`nipPegawai`, `namaPegawai`, `jenisKelamin`, `noHP`, `password`, `tempatLahir`, `tanggalLahir`) VALUES
('197801112002121000', 'Pegawai 00', 'Laki-laki', '08775676330', '12345', 'Singaraja', '2016-04-16'),
('197801112002121010', 'Pegawai 10', 'Laki-laki', '0812317237', 'KRF9', 'Denpasar', '2016-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbprodi`
--

CREATE TABLE `tbprodi` (
  `idProdi` tinyint(4) NOT NULL,
  `tingkatProdi` char(2) NOT NULL,
  `namaProdi` varchar(50) NOT NULL,
  `idJurusan` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbprodi`
--

INSERT INTO `tbprodi` (`idProdi`, `tingkatProdi`, `namaProdi`, `idJurusan`) VALUES
(121, 'D3', 'Manajemen Informatika', 1),
(122, 'D4', 'Teknologi Rekayasa Perangkat Lunak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbskema`
--

CREATE TABLE `tbskema` (
  `kodeSkema` varchar(20) NOT NULL,
  `namaSkema` varchar(100) NOT NULL,
  `idJurusan` tinyint(4) NOT NULL,
  `biaya` int(11) NOT NULL,
  `kapasitasPeserta` smallint(6) NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `nipAdmin` char(18) DEFAULT NULL,
  `verifikasiSkema` enum('Terima','Tolak') DEFAULT NULL,
  `nipPegawai` char(18) NOT NULL,
  `templateFile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbskema`
--

INSERT INTO `tbskema` (`kodeSkema`, `namaSkema`, `idJurusan`, `biaya`, `kapasitasPeserta`, `keterangan`, `nipAdmin`, `verifikasiSkema`, `nipPegawai`, `templateFile`) VALUES
('1', 'Junior Web Programmer', 1, 2000000, 200, NULL, '197801112002121003', 'Terima', '197801112002121000', 'a'),
('2', 'Hospitality', 4, 2000000, 100, 'mencoba', NULL, NULL, '197801112002121000', 'a'),
('3', 'Junior Graphic Designer', 1, 300000, 100, NULL, '197801112002121003', 'Terima', '197801112002121000', ''),
('4', 'Menghitung Cepat', 5, 100000, 100, 'ngetest keterangan', '197801112002121003', 'Terima', '197801112002121000', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbujian`
--

CREATE TABLE `tbujian` (
  `idUjian` int(11) NOT NULL,
  `idjadwal` int(11) NOT NULL,
  `nim` char(10) NOT NULL,
  `tujuanAsesmen` bit(4) NOT NULL,
  `fileKelengkapan` varchar(100) DEFAULT NULL,
  `verifikasiKelengkapan` enum('Terima','Tolak') DEFAULT NULL,
  `fileBayar` varchar(100) DEFAULT NULL,
  `verifikasiBayar` enum('Terima','Tolak') DEFAULT NULL,
  `nipPegawai` char(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbujian`
--

INSERT INTO `tbujian` (`idUjian`, `idjadwal`, `nim`, `tujuanAsesmen`, `fileKelengkapan`, `verifikasiKelengkapan`, `fileBayar`, `verifikasiBayar`, `nipPegawai`) VALUES
(1, 4, '2115354066', b'0000', NULL, NULL, NULL, NULL, NULL),
(2, 1, '2115354066', b'0000', NULL, NULL, NULL, NULL, NULL),
(4, 3, '2115354070', b'0000', NULL, 'Terima', NULL, 'Tolak', NULL),
(5, 1, '2115354070', b'0000', NULL, NULL, NULL, 'Terima', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbunit`
--

CREATE TABLE `tbunit` (
  `kodeUnit` varchar(25) NOT NULL,
  `judulUnit` varchar(255) NOT NULL,
  `jenisStandar` varchar(50) NOT NULL,
  `kodeSkema` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbunit`
--

INSERT INTO `tbunit` (`kodeUnit`, `judulUnit`, `jenisStandar`, `kodeSkema`) VALUES
('J.88218.001', 'Pengenalan', 'SKKNI', '1'),
('J.88218.001.01', 'Dasar-dasar penggunaan software', 'SKKNI', '3'),
('J.88218.001.02', 'Pengenalan Kepada Desain', 'SKKNI', '3'),
('J.88218.001.03', 'Cara Penggunaan Tools', 'SKKNI', '3'),
('J.88218.002', 'Pemrograman Dasar', 'SKKNI', '1'),
('J.88218.002.01', 'Pengenalan', 'SKKNI', '4'),
('J.88218.002.02', 'Teknik Cepat Dalam Menghitung', 'SKKNI', '4'),
('J.88218.003', 'Pemrograman Lanjut', 'SKKNI', '1'),
('J.88218.003.01', 'Mengenali Pentingnya Hospitality', 'SKKNI', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masterdata`
--
ALTER TABLE `masterdata`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`nipAdmin`);

--
-- Indexes for table `tbasesi`
--
ALTER TABLE `tbasesi`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `nama` (`namaAsesi`);

--
-- Indexes for table `tbjadwal`
--
ALTER TABLE `tbjadwal`
  ADD PRIMARY KEY (`idjadwal`),
  ADD KEY `FK_kodeJadwal` (`kodeSkema`);

--
-- Indexes for table `tbjurusan`
--
ALTER TABLE `tbjurusan`
  ADD PRIMARY KEY (`idJurusan`),
  ADD KEY `FK_nipAdmin` (`nipAdmin`);

--
-- Indexes for table `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbpegawai`
--
ALTER TABLE `tbpegawai`
  ADD PRIMARY KEY (`nipPegawai`);

--
-- Indexes for table `tbprodi`
--
ALTER TABLE `tbprodi`
  ADD PRIMARY KEY (`idProdi`),
  ADD KEY `FK_idJurusan` (`idJurusan`);

--
-- Indexes for table `tbskema`
--
ALTER TABLE `tbskema`
  ADD PRIMARY KEY (`kodeSkema`),
  ADD KEY `FK_jurusan` (`idJurusan`),
  ADD KEY `FK_verifikasiSkema` (`nipAdmin`),
  ADD KEY `FK_pembuatSkema` (`nipPegawai`);

--
-- Indexes for table `tbujian`
--
ALTER TABLE `tbujian`
  ADD PRIMARY KEY (`idUjian`),
  ADD KEY `FK_jadwal` (`idjadwal`),
  ADD KEY `FK_asesi` (`nim`),
  ADD KEY `FK_pegawai` (`nipPegawai`);

--
-- Indexes for table `tbunit`
--
ALTER TABLE `tbunit`
  ADD PRIMARY KEY (`kodeUnit`),
  ADD KEY `FK_kodeUnit` (`kodeSkema`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbjadwal`
--
ALTER TABLE `tbjadwal`
  MODIFY `idjadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbjurusan`
--
ALTER TABLE `tbjurusan`
  MODIFY `idJurusan` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbprodi`
--
ALTER TABLE `tbprodi`
  MODIFY `idProdi` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `tbujian`
--
ALTER TABLE `tbujian`
  MODIFY `idUjian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbjadwal`
--
ALTER TABLE `tbjadwal`
  ADD CONSTRAINT `FK_kodeJadwal` FOREIGN KEY (`kodeSkema`) REFERENCES `tbskema` (`kodeSkema`);

--
-- Constraints for table `tbjurusan`
--
ALTER TABLE `tbjurusan`
  ADD CONSTRAINT `FK_nipAdmin` FOREIGN KEY (`nipAdmin`) REFERENCES `tbadmin` (`nipAdmin`);

--
-- Constraints for table `tbprodi`
--
ALTER TABLE `tbprodi`
  ADD CONSTRAINT `FK_idJurusan` FOREIGN KEY (`idJurusan`) REFERENCES `tbjurusan` (`idJurusan`);

--
-- Constraints for table `tbskema`
--
ALTER TABLE `tbskema`
  ADD CONSTRAINT `FK_jurusan` FOREIGN KEY (`idJurusan`) REFERENCES `tbjurusan` (`idJurusan`),
  ADD CONSTRAINT `FK_pembuatSkema` FOREIGN KEY (`nipPegawai`) REFERENCES `tbpegawai` (`nipPegawai`),
  ADD CONSTRAINT `FK_verifikasiSkema` FOREIGN KEY (`nipAdmin`) REFERENCES `tbadmin` (`nipAdmin`);

--
-- Constraints for table `tbujian`
--
ALTER TABLE `tbujian`
  ADD CONSTRAINT `FK_asesi` FOREIGN KEY (`nim`) REFERENCES `tbasesi` (`nim`),
  ADD CONSTRAINT `tbujian_ibfk_3` FOREIGN KEY (`nipPegawai`) REFERENCES `tbpegawai` (`nipPegawai`),
  ADD CONSTRAINT `tbujian_ibfk_4` FOREIGN KEY (`idjadwal`) REFERENCES `tbjadwal` (`idjadwal`);

--
-- Constraints for table `tbunit`
--
ALTER TABLE `tbunit`
  ADD CONSTRAINT `FK_kodeUnit` FOREIGN KEY (`kodeSkema`) REFERENCES `tbskema` (`kodeSkema`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
