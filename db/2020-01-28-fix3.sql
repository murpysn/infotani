-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jan 2020 pada 16.16
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infotani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `ID_DESA` int(11) NOT NULL,
  `ID_KECAMATAN` int(11) DEFAULT NULL,
  `NAMA_DESA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`ID_DESA`, `ID_KECAMATAN`, `NAMA_DESA`) VALUES
(1, 1, 'Panti'),
(2, 1, 'Serut'),
(3, 1, 'Suci'),
(4, 2, 'Silo'),
(5, 2, 'Garahan'),
(6, 2, 'Sempolan'),
(7, 3, 'Sukowono'),
(8, 3, 'Sukorejo'),
(9, 3, 'Sukosari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `ID_KECAMATAN` int(11) NOT NULL,
  `NAMA_KECAMATAN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`ID_KECAMATAN`, `NAMA_KECAMATAN`) VALUES
(1, 'Panti'),
(2, 'Silo'),
(3, 'Sukowono');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komoditas`
--

CREATE TABLE `komoditas` (
  `ID_KOMODITAS` int(11) NOT NULL,
  `NAMA_KOMODITAS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komoditas`
--

INSERT INTO `komoditas` (`ID_KOMODITAS`, `NAMA_KOMODITAS`) VALUES
(1, 'Padi/Beras'),
(2, 'Jagung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `ID_LEVEL` int(11) NOT NULL,
  `NAMA_LEVEL` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`ID_LEVEL`, `NAMA_LEVEL`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Pengusaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `panen`
--

CREATE TABLE `panen` (
  `ID_PANEN` int(11) NOT NULL,
  `KTP` varchar(16) NOT NULL,
  `KOMODITAS` int(11) NOT NULL,
  `TGL_PANEN` date NOT NULL,
  `HASIL` int(11) NOT NULL,
  `HARGA` int(6) NOT NULL,
  `STATUS_PANEN` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `panen`
--

INSERT INTO `panen` (`ID_PANEN`, `KTP`, `KOMODITAS`, `TGL_PANEN`, `HASIL`, `HARGA`, `STATUS_PANEN`) VALUES
(1, '3508101511840007', 1, '2020-01-20', 3000, 6000, 'Panen'),
(2, '3508101511840007', 2, '2019-10-11', 4000, 4000, 'Panen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_PESAN` int(11) NOT NULL,
  `ID_PERUSAHAAN` int(11) NOT NULL,
  `KTP` varchar(16) NOT NULL,
  `TANGGAL` date NOT NULL,
  `JUMLAH_PESAN` int(11) NOT NULL,
  `TOTAL_BIAYA` bigint(20) NOT NULL,
  `ID_PESAN_STATUS` int(11) NOT NULL,
  `ID_PANEN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `ID_PERUSAHAAN` int(11) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `SIUP` varchar(18) NOT NULL,
  `LOGO` varchar(18) NOT NULL,
  `NAMA_PERUSAHAAN` varchar(30) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `ALAMAT_PERUSAHAAN` varchar(100) NOT NULL,
  `NO_TELP_PERUSAHAAN` varchar(16) NOT NULL,
  `NAMA_MANAGER` varchar(20) NOT NULL,
  `ID_LEVEL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`ID_PERUSAHAAN`, `USERNAME`, `PASSWORD`, `SIUP`, `LOGO`, `NAMA_PERUSAHAAN`, `EMAIL`, `ALAMAT_PERUSAHAAN`, `NO_TELP_PERUSAHAAN`, `NAMA_MANAGER`, `ID_LEVEL`) VALUES
(1, 'leegong', '202cb962ac59075b964b07152d234b70', '28012020124227.jpg', '', '', '', '', '', '', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `ID_PESAN_STATUS` int(11) NOT NULL,
  `STATUS_PESAN` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`ID_PESAN_STATUS`, `STATUS_PESAN`) VALUES
(1, 'Belum Konfirmasi'),
(2, 'Sudah Konfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petani`
--

CREATE TABLE `petani` (
  `KTP` varchar(16) NOT NULL,
  `ID_DESA` int(11) DEFAULT NULL,
  `ID_KOMODITAS` int(11) DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_STATUS` int(11) NOT NULL,
  `NAMA_PETANI` varchar(30) DEFAULT NULL,
  `ALAMAT_PETANI` varchar(100) DEFAULT NULL,
  `LUAS_SAWAH` float DEFAULT NULL,
  `ALAMAT_SAWAH` varchar(100) DEFAULT NULL,
  `TANAM` date DEFAULT NULL,
  `PANEN` date DEFAULT NULL,
  `NO_HP` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petani`
--

INSERT INTO `petani` (`KTP`, `ID_DESA`, `ID_KOMODITAS`, `ID_USER`, `ID_STATUS`, `NAMA_PETANI`, `ALAMAT_PETANI`, `LUAS_SAWAH`, `ALAMAT_SAWAH`, `TANAM`, `PANEN`, `NO_HP`) VALUES
('3508101511840007', 2, 1, 2, 2, 'Yasir Nadem', 'Jl. A. Yani 5, Krajan, RT01/RW19', 1, 'Jl. A. Yani 5, Krajan,', '2020-01-24', '2020-04-27', '089655199159');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `ID_STATUS` int(11) NOT NULL,
  `STATUS` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`ID_STATUS`, `STATUS`) VALUES
(1, 'Panen'),
(2, 'Belum Panen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `ID_LEVEL` int(11) DEFAULT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `FOTO_USER` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `ID_LEVEL`, `USERNAME`, `PASSWORD`, `FOTO_USER`) VALUES
(1, 1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin.png'),
(2, 2, 'yasir', '202cb962ac59075b964b07152d234b70', '28012020114036.jpg'),
(4, 2, 'supiyar', '202cb962ac59075b964b07152d234b70', '28012020161453.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`ID_DESA`),
  ADD UNIQUE KEY `ID_KECAMATAN` (`ID_DESA`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_KECAMATAN`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`ID_KECAMATAN`),
  ADD UNIQUE KEY `ID_DESA` (`ID_KECAMATAN`);

--
-- Indexes for table `komoditas`
--
ALTER TABLE `komoditas`
  ADD PRIMARY KEY (`ID_KOMODITAS`),
  ADD UNIQUE KEY `ID_KOMODITAS` (`ID_KOMODITAS`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`ID_LEVEL`),
  ADD UNIQUE KEY `INDEX_1` (`ID_LEVEL`);

--
-- Indexes for table `panen`
--
ALTER TABLE `panen`
  ADD PRIMARY KEY (`ID_PANEN`),
  ADD KEY `KTP` (`KTP`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID_PESAN`),
  ADD KEY `ID_PERUSAHAAN` (`ID_PERUSAHAAN`),
  ADD KEY `KTP` (`KTP`),
  ADD KEY `ID_PESAN_STATUS` (`ID_PESAN_STATUS`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`ID_PERUSAHAAN`),
  ADD KEY `ID_LEVEL` (`ID_LEVEL`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`ID_PESAN_STATUS`);

--
-- Indexes for table `petani`
--
ALTER TABLE `petani`
  ADD PRIMARY KEY (`KTP`),
  ADD UNIQUE KEY `KTP` (`KTP`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_DESA`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_KOMODITAS`),
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `ID_STATUS` (`ID_STATUS`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_STATUS`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `ID_USER` (`ID_USER`),
  ADD KEY `FK_RELATIONSHIP_8` (`ID_LEVEL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `ID_DESA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `ID_KECAMATAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komoditas`
--
ALTER TABLE `komoditas`
  MODIFY `ID_KOMODITAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `ID_LEVEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `panen`
--
ALTER TABLE `panen`
  MODIFY `ID_PANEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `ID_PESAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `ID_PERUSAHAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `ID_PESAN_STATUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `ID_STATUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`ID_KECAMATAN`) REFERENCES `kecamatan` (`ID_KECAMATAN`);

--
-- Ketidakleluasaan untuk tabel `panen`
--
ALTER TABLE `panen`
  ADD CONSTRAINT `panen_ibfk_1` FOREIGN KEY (`KTP`) REFERENCES `petani` (`KTP`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`ID_PERUSAHAAN`) REFERENCES `perusahaan` (`ID_PERUSAHAAN`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`KTP`) REFERENCES `petani` (`KTP`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`ID_PESAN_STATUS`) REFERENCES `pesan` (`ID_PESAN_STATUS`);

--
-- Ketidakleluasaan untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`ID_LEVEL`) REFERENCES `level` (`ID_LEVEL`);

--
-- Ketidakleluasaan untuk tabel `petani`
--
ALTER TABLE `petani`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_KOMODITAS`) REFERENCES `komoditas` (`ID_KOMODITAS`),
  ADD CONSTRAINT `petani_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `petani_ibfk_2` FOREIGN KEY (`ID_STATUS`) REFERENCES `status` (`ID_STATUS`),
  ADD CONSTRAINT `petani_ibfk_3` FOREIGN KEY (`ID_DESA`) REFERENCES `desa` (`ID_DESA`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_LEVEL`) REFERENCES `level` (`ID_LEVEL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
