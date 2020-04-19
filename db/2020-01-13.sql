-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 05:56 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `ID_DESA` int(11) NOT NULL,
  `NAMA_DESA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`ID_DESA`, `NAMA_DESA`) VALUES
(1, 'Antirogo'),
(2, 'Gebang'),
(3, 'Mayang'),
(4, 'Jembersari');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `ID_KECAMATAN` int(11) NOT NULL,
  `ID_DESA` int(11) DEFAULT NULL,
  `NAMA_KECAMATAN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`ID_KECAMATAN`, `ID_DESA`, `NAMA_KECAMATAN`) VALUES
(1, 1, 'Sumber Sari'),
(2, 2, 'Patrang'),
(3, 3, 'Mayang'),
(4, 4, 'Sumberbaru');

-- --------------------------------------------------------

--
-- Table structure for table `komoditas`
--

CREATE TABLE `komoditas` (
  `ID_KOMODITAS` int(11) NOT NULL,
  `NAMA_KOMODITAS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komoditas`
--

INSERT INTO `komoditas` (`ID_KOMODITAS`, `NAMA_KOMODITAS`) VALUES
(1, 'Padi'),
(2, 'Jagung');

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_jagung`
-- (See below for the actual view)
--
CREATE TABLE `laporan_jagung` (
`KTP` varchar(16)
,`NAMA_PETANI` varchar(30)
,`TGL_PANEN` date
,`NAMA_DESA` varchar(20)
,`NAMA_KECAMATAN` varchar(20)
,`HASIL` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_padi`
-- (See below for the actual view)
--
CREATE TABLE `laporan_padi` (
`KTP` varchar(16)
,`NAMA_PETANI` varchar(30)
,`TGL_PANEN` date
,`NAMA_DESA` varchar(20)
,`NAMA_KECAMATAN` varchar(20)
,`HASIL` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_panen`
-- (See below for the actual view)
--
CREATE TABLE `laporan_panen` (
`KTP` varchar(16)
,`NAMA_PETANI` varchar(30)
,`TGL_PANEN` date
,`NAMA_DESA` varchar(20)
,`NAMA_KECAMATAN` varchar(20)
,`HASIL` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_panen_user`
-- (See below for the actual view)
--
CREATE TABLE `laporan_panen_user` (
`ID_USER` int(11)
,`KTP` varchar(16)
,`NAMA_PETANI` varchar(30)
,`TGL_PANEN` date
,`NAMA_DESA` varchar(20)
,`NAMA_KOMODITAS` varchar(20)
,`NAMA_KECAMATAN` varchar(20)
,`HASIL` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `ID_LEVEL` int(11) NOT NULL,
  `NAMA_LEVEL` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`ID_LEVEL`, `NAMA_LEVEL`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Pengusaha');

-- --------------------------------------------------------

--
-- Table structure for table `panen`
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
-- Dumping data for table `panen`
--

INSERT INTO `panen` (`ID_PANEN`, `KTP`, `KOMODITAS`, `TGL_PANEN`, `HASIL`, `HARGA`, `STATUS_PANEN`) VALUES
(1, '1111', 1, '2020-01-13', 40, 10000, 'Panen'),
(2, '123', 1, '2020-01-13', 90, 11000, 'Panen'),
(3, '1234', 1, '2020-01-13', 70, 10000, 'Panen'),
(4, '12345', 2, '2020-01-13', 90, 10000, 'Panen');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
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

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`ID_PESAN`, `ID_PERUSAHAAN`, `KTP`, `TANGGAL`, `JUMLAH_PESAN`, `TOTAL_BIAYA`, `ID_PESAN_STATUS`, `ID_PANEN`) VALUES
(1, 1, '12345', '2020-01-13', 20, 200000, 1, 4),
(2, 1, '1111', '2020-01-13', 20, 200000, 2, 1),
(3, 1, '1111', '2020-01-13', 20, 200000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `ID_PERUSAHAAN` int(11) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `SIUP` varchar(18) NOT NULL,
  `LOGO` varchar(18) NOT NULL,
  `NAMA_PERUSAHAAN` varchar(30) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `ALAMAT_PERUSAHAAN` varchar(40) NOT NULL,
  `NO_TELP_PERUSAHAAN` varchar(16) NOT NULL,
  `NAMA_MANAGER` varchar(20) NOT NULL,
  `ID_LEVEL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`ID_PERUSAHAAN`, `USERNAME`, `PASSWORD`, `SIUP`, `LOGO`, `NAMA_PERUSAHAAN`, `EMAIL`, `ALAMAT_PERUSAHAAN`, `NO_TELP_PERUSAHAAN`, `NAMA_MANAGER`, `ID_LEVEL`) VALUES
(1, 'rafif', 'b92b52df66da4409b241dfbc244cd054', '13012020165907.jpg', '13012020165943.jpg', 'rafif jaya', 'rafif@gmail.com', 'Jember', '8374323', 'Filiatno', 3),
(2, 'zuhdi', 'bd36fc480a85dc798f3d3e80359a4ec6', '13012020171458.jpg', '13012020171930.jpg', 'zuhdi jaya', 'zuhdi@gmail.com', 'Probolinggo', '2313', 'zuhdi', 3),
(3, 'filiatno', '56b2c8092a8aed16fd525934cc02ce6c', '13012020171517.jpg', '13012020172243.jpg', 'filiatno jaya', 'filiatno@gmail.com', 'Jember', '2313', 'Filiatno', 3),
(4, 'iftitah', '0c406e1407deb46ba58bda9abcfe4a62', '13012020171543.jpg', '13012020172626.jpg', 'iftitah jaya', 'iftitah@gmail.com', 'Madiunn', '8374323', 'Iftitah', 3),
(5, 'aprillia', '50eea41f1355161b39fd3579ad94f627', '13012020171609.jpg', '13012020173357.jpg', 'aprillia', 'aprillia@gmail.com', 'aprillia jaya', '8374323', 'Filiatno', 3),
(6, 'murpi', 'bc14593bb8aab09f270a7a5c65a5b817', '13012020173532.jpg', '13012020173605.jpg', 'murpi jaya', 'murpi@gmail.com', 'Ponorogo', '8374323', 'Filiatno', 3),
(8, 'santoso', 'e15f849d84745e80106b74097a501059', '13012020174012.jpg', '13012020174043.jpg', 'santoso jaya', 'santoso@gmail.com', 'Malang', '2313', 'Filiatno', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `ID_PESAN_STATUS` int(11) NOT NULL,
  `STATUS_PESAN` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`ID_PESAN_STATUS`, `STATUS_PESAN`) VALUES
(1, 'Belum Konfirmasi'),
(2, 'Sudah Konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `petani`
--

CREATE TABLE `petani` (
  `KTP` varchar(16) NOT NULL,
  `ID_KECAMATAN` int(11) DEFAULT NULL,
  `ID_KOMODITAS` int(11) DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_STATUS` int(11) NOT NULL,
  `NAMA_PETANI` varchar(30) DEFAULT NULL,
  `ALAMAT_PETANI` varchar(30) DEFAULT NULL,
  `LUAS_SAWAH` float DEFAULT NULL,
  `ALAMAT_SAWAH` varchar(30) DEFAULT NULL,
  `TANAM` date DEFAULT NULL,
  `PANEN` date DEFAULT NULL,
  `NO_HP` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petani`
--

INSERT INTO `petani` (`KTP`, `ID_KECAMATAN`, `ID_KOMODITAS`, `ID_USER`, `ID_STATUS`, `NAMA_PETANI`, `ALAMAT_PETANI`, `LUAS_SAWAH`, `ALAMAT_SAWAH`, `TANAM`, `PANEN`, `NO_HP`) VALUES
('1111', 1, 1, 1, 2, 'camall', 'jember', 90, 'Jember', '2020-01-13', '2020-01-14', '934234'),
('123', 1, 2, 3, 2, 'Afif', 'jember', 90, 'Jember', '2020-01-13', '2020-01-15', '934234'),
('1234', 3, 2, 4, 2, 'Rangga', 'Madiun', 90, 'Jember', '2020-01-13', '2020-01-15', '934234'),
('12345', 4, 2, 5, 1, 'Mukti', 'jember', 90, 'Jember', '2020-01-13', '2020-01-13', '934234');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `ID_STATUS` int(11) NOT NULL,
  `STATUS` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ID_STATUS`, `STATUS`) VALUES
(1, 'Panen'),
(2, 'Belum Panen');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `ID_LEVEL` int(11) DEFAULT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `FOTO_USER` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `ID_LEVEL`, `USERNAME`, `PASSWORD`, `FOTO_USER`) VALUES
(1, 2, 'camalla', 'f3a4b7cdc5db36539ab24f9764017dda', '13012020165215.jpg'),
(2, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '07012020115717.jpg'),
(3, 2, 'afiffaris', '4767598a3f9e17579bf43efd3724f441', '13012020171314.jpg'),
(4, 2, 'rangga', '863c2a4b6bff5e22294081e376fc1f51', '13012020171346.jpg'),
(5, 2, 'mukti', '9870707091e577de88930ce558347125', '13012020171404.jpg');

-- --------------------------------------------------------

--
-- Structure for view `laporan_jagung`
--
DROP TABLE IF EXISTS `laporan_jagung`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_jagung`  AS  select `petani`.`KTP` AS `KTP`,`petani`.`NAMA_PETANI` AS `NAMA_PETANI`,`panen`.`TGL_PANEN` AS `TGL_PANEN`,`desa`.`NAMA_DESA` AS `NAMA_DESA`,`kecamatan`.`NAMA_KECAMATAN` AS `NAMA_KECAMATAN`,sum(`panen`.`HASIL`) AS `HASIL` from (((`panen` join `kecamatan`) join `desa`) join `petani`) where ((`desa`.`ID_DESA` = `kecamatan`.`ID_DESA`) and (`kecamatan`.`ID_KECAMATAN` = `petani`.`ID_KECAMATAN`) and (`petani`.`KTP` = `panen`.`KTP`) and (`panen`.`KOMODITAS` = 2)) ;

-- --------------------------------------------------------

--
-- Structure for view `laporan_padi`
--
DROP TABLE IF EXISTS `laporan_padi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_padi`  AS  select `petani`.`KTP` AS `KTP`,`petani`.`NAMA_PETANI` AS `NAMA_PETANI`,`panen`.`TGL_PANEN` AS `TGL_PANEN`,`desa`.`NAMA_DESA` AS `NAMA_DESA`,`kecamatan`.`NAMA_KECAMATAN` AS `NAMA_KECAMATAN`,sum(`panen`.`HASIL`) AS `HASIL` from (((`panen` join `kecamatan`) join `desa`) join `petani`) where ((`desa`.`ID_DESA` = `kecamatan`.`ID_DESA`) and (`kecamatan`.`ID_KECAMATAN` = `petani`.`ID_KECAMATAN`) and (`petani`.`KTP` = `panen`.`KTP`) and (`panen`.`KOMODITAS` = 1)) ;

-- --------------------------------------------------------

--
-- Structure for view `laporan_panen`
--
DROP TABLE IF EXISTS `laporan_panen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_panen`  AS  select `petani`.`KTP` AS `KTP`,`petani`.`NAMA_PETANI` AS `NAMA_PETANI`,`panen`.`TGL_PANEN` AS `TGL_PANEN`,`desa`.`NAMA_DESA` AS `NAMA_DESA`,`kecamatan`.`NAMA_KECAMATAN` AS `NAMA_KECAMATAN`,sum(`panen`.`HASIL`) AS `HASIL` from (((`petani` join `panen`) join `desa`) join `kecamatan`) where ((`desa`.`ID_DESA` = `kecamatan`.`ID_DESA`) and (`kecamatan`.`ID_KECAMATAN` = `petani`.`ID_KECAMATAN`) and (`petani`.`KTP` = `panen`.`KTP`)) group by `petani`.`KTP` ;

-- --------------------------------------------------------

--
-- Structure for view `laporan_panen_user`
--
DROP TABLE IF EXISTS `laporan_panen_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_panen_user`  AS  select `petani`.`ID_USER` AS `ID_USER`,`petani`.`KTP` AS `KTP`,`petani`.`NAMA_PETANI` AS `NAMA_PETANI`,`panen`.`TGL_PANEN` AS `TGL_PANEN`,`desa`.`NAMA_DESA` AS `NAMA_DESA`,`komoditas`.`NAMA_KOMODITAS` AS `NAMA_KOMODITAS`,`kecamatan`.`NAMA_KECAMATAN` AS `NAMA_KECAMATAN`,`panen`.`HASIL` AS `HASIL` from ((((`petani` join `komoditas`) join `panen`) join `desa`) join `kecamatan`) where ((`komoditas`.`ID_KOMODITAS` = `petani`.`ID_KOMODITAS`) and (`kecamatan`.`ID_KECAMATAN` = `petani`.`ID_KECAMATAN`) and (`desa`.`ID_DESA` = `kecamatan`.`ID_DESA`) and (`petani`.`KTP` = `panen`.`KTP`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`ID_DESA`),
  ADD UNIQUE KEY `ID_DESA` (`ID_DESA`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`ID_KECAMATAN`),
  ADD UNIQUE KEY `ID_KECAMATAN` (`ID_KECAMATAN`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_DESA`);

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
  ADD KEY `FK_RELATIONSHIP_2` (`ID_KECAMATAN`),
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
  MODIFY `ID_DESA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `ID_KECAMATAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `ID_PANEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `ID_PESAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `ID_PERUSAHAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_DESA`) REFERENCES `desa` (`ID_DESA`);

--
-- Constraints for table `panen`
--
ALTER TABLE `panen`
  ADD CONSTRAINT `panen_ibfk_1` FOREIGN KEY (`KTP`) REFERENCES `petani` (`KTP`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`ID_PERUSAHAAN`) REFERENCES `perusahaan` (`ID_PERUSAHAAN`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`KTP`) REFERENCES `petani` (`KTP`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`ID_PESAN_STATUS`) REFERENCES `pesan` (`ID_PESAN_STATUS`);

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`ID_LEVEL`) REFERENCES `level` (`ID_LEVEL`);

--
-- Constraints for table `petani`
--
ALTER TABLE `petani`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_KECAMATAN`) REFERENCES `kecamatan` (`ID_KECAMATAN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_KOMODITAS`) REFERENCES `komoditas` (`ID_KOMODITAS`),
  ADD CONSTRAINT `petani_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `petani_ibfk_2` FOREIGN KEY (`ID_STATUS`) REFERENCES `status` (`ID_STATUS`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_LEVEL`) REFERENCES `level` (`ID_LEVEL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
