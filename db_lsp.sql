-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Bulan Mei 2023 pada 11.55
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lsp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masterdata`
--

CREATE TABLE `masterdata` (
  `nim` char(10) NOT NULL,
  `namaAsesi` varchar(60) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `smester` enum('1','2','3','4','5','6','7','8') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masterdata`
--

INSERT INTO `masterdata` (`nim`, `namaAsesi`, `jurusan`, `prodi`, `smester`) VALUES
('2115354030', 'Komang Meriani', 'Pariwisata', 'Management Pariwisata', '6'),
('2115354066', ' Kadek Dwika Ananda', 'Teknik Mesin', 'Mesin Berat', '8'),
('2115354070', 'Kadek Yudha Ananda Putra', 'Teknik Elektro', 'TRPL', '7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbadmin`
--

CREATE TABLE `tbadmin` (
  `nipAdmin` char(18) NOT NULL,
  `namaAdmin` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbadmin`
--

INSERT INTO `tbadmin` (`nipAdmin`, `namaAdmin`) VALUES
('197801112002121003', 'I Gusti Putu Mastawan Eka Putra, S.T.,M.T.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbasesi`
--

CREATE TABLE `tbasesi` (
  `nim` char(10) NOT NULL,
  `namaAsesi` varchar(60) NOT NULL,
  `smester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(25) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbasesi`
--

INSERT INTO `tbasesi` (`nim`, `namaAsesi`, `smester`, `email`, `password`, `jurusan`, `prodi`) VALUES
('2115354066', ' Kadek Dwika Ananda', '8', 'asd@gmail.com', 'XQLB', 'Teknik Mesin', 'Mesin Berat'),
('2115354070', 'Kadek Yudha Ananda Putra', '7', 'anan@gmail.com', 'MD86', 'Teknik Elektro', 'TRPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdatakelengkapan`
--

CREATE TABLE `tbdatakelengkapan` (
  `idUjian` tinyint(4) NOT NULL,
  `file` varchar(255) NOT NULL,
  `nipPegawai` char(18) NOT NULL,
  `verifikasiData` enum('Terima','Tolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjadwal`
--

CREATE TABLE `tbjadwal` (
  `idjadwal` tinyint(4) NOT NULL,
  `kodeSkema` varchar(20) NOT NULL,
  `periodeMulai` date NOT NULL,
  `periodeSelesai` date NOT NULL,
  `tempat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjurusan`
--

CREATE TABLE `tbjurusan` (
  `idJurusan` tinyint(4) NOT NULL,
  `namaJurusan` varchar(50) NOT NULL,
  `nipAdmin` char(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbjurusan`
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
-- Struktur dari tabel `tblogin`
--

CREATE TABLE `tblogin` (
  `username` varchar(18) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tblogin`
--

INSERT INTO `tblogin` (`username`, `password`, `level`) VALUES
('2115354066', 'XQLB', '2'),
('2115354070', 'MD86', '2'),
('admin', '12345', '0'),
('asesi', '12345', '2'),
('pegawai', '12345', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpegawai`
--

CREATE TABLE `tbpegawai` (
  `nipPegawai` char(18) NOT NULL,
  `namaPegawai` varchar(60) NOT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `noHP` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `tempatLahir` varchar(255) NOT NULL,
  `tanggalLahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpegawai`
--

INSERT INTO `tbpegawai` (`nipPegawai`, `namaPegawai`, `jenisKelamin`, `noHP`, `password`, `tempatLahir`, `tanggalLahir`) VALUES
('122223233', 'gatau', 'Laki-laki', '0877756555', 'S7TW', 'Singaraja', '2023-05-15'),
('197801112002121000', 'anan', 'Laki-laki', '087756763300', '12345', 'Singaraja', '2016-04-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbprodi`
--

CREATE TABLE `tbprodi` (
  `idProdi` tinyint(4) NOT NULL,
  `tingkatProdi` char(2) NOT NULL,
  `namaProdi` varchar(50) NOT NULL,
  `idJurusan` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbskema`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbskema`
--

INSERT INTO `tbskema` (`kodeSkema`, `namaSkema`, `idJurusan`, `biaya`, `kapasitasPeserta`, `keterangan`, `nipAdmin`, `verifikasiSkema`, `nipPegawai`, `templateFile`) VALUES
('1', 'gaje', 1, 2000000, 200, 'gatau', NULL, NULL, '197801112002121000', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbujian`
--

CREATE TABLE `tbujian` (
  `idUjian` tinyint(4) NOT NULL,
  `idjadwal` tinyint(4) NOT NULL,
  `nim` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbunit`
--

CREATE TABLE `tbunit` (
  `kodeUnit` varchar(25) NOT NULL,
  `judulUnit` varchar(255) NOT NULL,
  `jenisStandar` varchar(50) NOT NULL,
  `kodeSkema` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masterdata`
--
ALTER TABLE `masterdata`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`nipAdmin`);

--
-- Indeks untuk tabel `tbasesi`
--
ALTER TABLE `tbasesi`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `nama` (`namaAsesi`);

--
-- Indeks untuk tabel `tbdatakelengkapan`
--
ALTER TABLE `tbdatakelengkapan`
  ADD PRIMARY KEY (`idUjian`),
  ADD KEY `FK_verifikasiData` (`nipPegawai`);

--
-- Indeks untuk tabel `tbjadwal`
--
ALTER TABLE `tbjadwal`
  ADD PRIMARY KEY (`idjadwal`),
  ADD KEY `FK_kodeJadwal` (`kodeSkema`);

--
-- Indeks untuk tabel `tbjurusan`
--
ALTER TABLE `tbjurusan`
  ADD PRIMARY KEY (`idJurusan`),
  ADD KEY `FK_nipAdmin` (`nipAdmin`);

--
-- Indeks untuk tabel `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tbpegawai`
--
ALTER TABLE `tbpegawai`
  ADD PRIMARY KEY (`nipPegawai`);

--
-- Indeks untuk tabel `tbprodi`
--
ALTER TABLE `tbprodi`
  ADD PRIMARY KEY (`idProdi`),
  ADD KEY `FK_idJurusan` (`idJurusan`);

--
-- Indeks untuk tabel `tbskema`
--
ALTER TABLE `tbskema`
  ADD PRIMARY KEY (`kodeSkema`),
  ADD KEY `FK_jurusan` (`idJurusan`),
  ADD KEY `FK_verifikasiSkema` (`nipAdmin`),
  ADD KEY `FK_pembuatSkema` (`nipPegawai`);

--
-- Indeks untuk tabel `tbujian`
--
ALTER TABLE `tbujian`
  ADD PRIMARY KEY (`idUjian`),
  ADD KEY `FK_jadwal` (`idjadwal`),
  ADD KEY `FK_asesi` (`nim`);

--
-- Indeks untuk tabel `tbunit`
--
ALTER TABLE `tbunit`
  ADD PRIMARY KEY (`kodeUnit`),
  ADD KEY `FK_kodeUnit` (`kodeSkema`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbjurusan`
--
ALTER TABLE `tbjurusan`
  MODIFY `idJurusan` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbprodi`
--
ALTER TABLE `tbprodi`
  MODIFY `idProdi` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbdatakelengkapan`
--
ALTER TABLE `tbdatakelengkapan`
  ADD CONSTRAINT `FK_ujian` FOREIGN KEY (`idUjian`) REFERENCES `tbujian` (`idUjian`),
  ADD CONSTRAINT `FK_verifikasiData` FOREIGN KEY (`nipPegawai`) REFERENCES `tbpegawai` (`nipPegawai`);

--
-- Ketidakleluasaan untuk tabel `tbjadwal`
--
ALTER TABLE `tbjadwal`
  ADD CONSTRAINT `FK_kodeJadwal` FOREIGN KEY (`kodeSkema`) REFERENCES `tbskema` (`kodeSkema`);

--
-- Ketidakleluasaan untuk tabel `tbjurusan`
--
ALTER TABLE `tbjurusan`
  ADD CONSTRAINT `FK_nipAdmin` FOREIGN KEY (`nipAdmin`) REFERENCES `tbadmin` (`nipAdmin`);

--
-- Ketidakleluasaan untuk tabel `tbprodi`
--
ALTER TABLE `tbprodi`
  ADD CONSTRAINT `FK_idJurusan` FOREIGN KEY (`idJurusan`) REFERENCES `tbjurusan` (`idJurusan`);

--
-- Ketidakleluasaan untuk tabel `tbskema`
--
ALTER TABLE `tbskema`
  ADD CONSTRAINT `FK_jurusan` FOREIGN KEY (`idJurusan`) REFERENCES `tbjurusan` (`idJurusan`),
  ADD CONSTRAINT `FK_pembuatSkema` FOREIGN KEY (`nipPegawai`) REFERENCES `tbpegawai` (`nipPegawai`),
  ADD CONSTRAINT `FK_verifikasiSkema` FOREIGN KEY (`nipAdmin`) REFERENCES `tbadmin` (`nipAdmin`);

--
-- Ketidakleluasaan untuk tabel `tbujian`
--
ALTER TABLE `tbujian`
  ADD CONSTRAINT `FK_asesi` FOREIGN KEY (`nim`) REFERENCES `tbasesi` (`nim`),
  ADD CONSTRAINT `FK_jadwal` FOREIGN KEY (`idjadwal`) REFERENCES `tbjadwal` (`idjadwal`);

--
-- Ketidakleluasaan untuk tabel `tbunit`
--
ALTER TABLE `tbunit`
  ADD CONSTRAINT `FK_kodeUnit` FOREIGN KEY (`kodeSkema`) REFERENCES `tbskema` (`kodeSkema`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
