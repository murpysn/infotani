-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 12:33 AM
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
(1, 'Sumber Jaya'),
(2, 'Sumber Sejahtera Muk');

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
(1, 1, 'Sumber Makmur');

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
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `panen`
--

CREATE TABLE `panen` (
  `ID_PANEN` int(11) NOT NULL,
  `KTP` varchar(16) NOT NULL,
  `KOMODITAS` int(11) NOT NULL,
  `TGL_PANEN` date NOT NULL,
  `HASIL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_PESAN` int(11) NOT NULL,
  `TANGGAL` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `ID_PERUSAHAAN` int(11) NOT NULL,
  `USER` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `SIUP` varchar(20) NOT NULL,
  `NAMA_PERUSAHAAN` varchar(30) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `ALAMAT_PERUSAHAAN` varchar(40) NOT NULL,
  `NO_TELP_PERUSAHAAN` varchar(16) NOT NULL,
  `NAMA_MANAGER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('', 1, 2, 4, 2, 'Banggus', 'Jember', 20, 'Jember', '2019-12-20', '2020-01-24', '76554456789');

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
  `PASSWORD` varchar(30) DEFAULT NULL,
  `FOTO_USER` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `ID_LEVEL`, `USERNAME`, `PASSWORD`, `FOTO_USER`) VALUES
(2, 2, 'murpy', '1234', 'home.jpg.jpg.jpg.jpg'),
(3, 1, 'admin', 'admin', '16122019040238.jpg'),
(4, 2, 'faris', 'faris', '16122019040238.jpg'),
(5, 2, 'afif', 'afif', '16122019041348.jpg'),
(6, 2, 'akmal', 'akmal', '16122019041705.jpg'),
(7, 2, 'rasa', 'rasa', '16122019041800.jpg');

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
  ADD PRIMARY KEY (`ID_PESAN`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`ID_PERUSAHAAN`);

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
  MODIFY `ID_DESA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `ID_KECAMATAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `komoditas`
--
ALTER TABLE `komoditas`
  MODIFY `ID_KOMODITAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `ID_LEVEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `panen`
--
ALTER TABLE `panen`
  MODIFY `ID_PANEN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `ID_PESAN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `ID_PERUSAHAAN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `ID_STATUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
