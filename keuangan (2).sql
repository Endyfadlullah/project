-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 11:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `pass`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `catatan`, `id_karyawan`) VALUES
(1, 'Besok, Hari minggu akan ada kunjungan dari pihak dinas untuk mengecek kinerja karyawan.', 1),
(2, 'Hari Kamis jam 8 akan ada rapat, diharapkan kepada semua karyawan agar dapat berhadir.', 1),
(3, 'Tingkatkan lagi pendapatan, dan minimalkan pengeluaran', 2),
(4, 'tgl 6 domain dan hosting banyak yang akan expired, dan harus diperpanjang lagi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `no_telp`) VALUES
(1, 'DAWE', '082687382392'),
(2, 'AOYAMA', '085725712121'),
(3, 'UMAR', '086745382912'),
(4, 'IKR', '082223456191'),
(5, 'DAWE', '082687382392'),
(6, 'SIGMA', '086241672781'),
(7, 'IKR ', '082223456191'),
(8, 'AOYAMA', '085725712121'),
(9, 'AOYAMA', '085725712121'),
(10, 'AOYAMA', '085725712121'),
(11, 'AOYAMA', '085725712121'),
(12, 'SIGMA', '086241672781'),
(13, 'SIGMA', '089932564009'),
(14, 'SIGMA', '086241672781'),
(15, 'IKR ', '082223456191'),
(16, 'IKR', '082223456191'),
(17, 'IKR', '082223456191'),
(18, 'AOYAMA ', '085725712121'),
(19, 'AOYAMA', '085725712121'),
(20, 'AOYAMA', '085725712121'),
(21, 'AOYAMA', '085725712121'),
(22, 'P.SLAMET ', '089778990007'),
(23, 'DAWE', '082687382392'),
(24, 'AOYAMA', '085725712121'),
(25, 'AOYAMA', '085725712121'),
(26, 'TRID', '081334774455'),
(27, 'IKR', '082223456191'),
(28, 'IKR', ' 082223456191'),
(29, 'AOYAMA', '085725712121'),
(30, 'AOYAMA', '082669990021'),
(31, 'AOYAMA', '085725712121'),
(32, 'AOYAMA', '085725712121'),
(33, 'DAWE', '082687382392'),
(34, 'CHI', '081557900631'),
(35, 'IKR ', '082223456191'),
(36, 'IKR', '082223456191'),
(37, 'IKR', '082223456191'),
(38, 'IKR', '082223456191'),
(39, 'IKR', '082223456191'),
(40, 'IKR', '082223456191'),
(41, 'IKR', '082223456191'),
(42, 'IKR', '082223456191'),
(43, 'IKR ', '082223456191'),
(44, 'PLT', '082880997675'),
(45, 'AOYAMA', '085725712121'),
(46, 'AOYAMA', '085725712121'),
(47, 'IKR', '082223456191'),
(48, 'AOYAMA', '085725712121'),
(49, 'AOYAMA', '085725712121'),
(50, 'AOYAMA', '085725712121'),
(51, 'AOYAMA', '085725712121'),
(52, 'AOYAMA', '085725712121'),
(53, 'AOYAMA', '085725712121'),
(54, 'IKR', '082223456191'),
(55, 'CHI', '081557900631'),
(56, 'TRID', '081334774455'),
(57, 'TRID', '081334774455'),
(58, 'SIGMA', '086241672781'),
(59, 'IKR', '082223456191'),
(60, 'IKR', '082223456191'),
(61, 'IKR', '082223456191'),
(62, 'IKR', '082223456191'),
(63, 'IKR', '082223456191'),
(64, 'IKR', '082223456191'),
(65, 'AOYAMA', '085725712121'),
(66, 'AOYAMA', '085725712121'),
(67, 'HJS', '0815332001878'),
(68, 'IKR ', '082223456191'),
(69, 'IKR', '082223456191'),
(70, 'IKR', '082223456191'),
(71, 'IKR', '082223456191'),
(72, 'IKR', '082223456191'),
(73, 'IKR', '082223456191'),
(74, 'IKR', '082223456191'),
(75, 'IKR', '082223456191'),
(76, 'IKR', '082223456191'),
(77, 'IKR', '082223456191'),
(78, 'IKR', '082223456191'),
(79, 'DAWE', '082687382392'),
(80, 'AOYAMA', '085725712121'),
(81, 'SIGMA', '086241672781'),
(82, 'DAWE', '082687382392'),
(83, 'AOYAMA', '085725712121'),
(84, 'IKR', '082223456191'),
(85, 'SCMI', '089980771451'),
(86, 'IKR', '082223456191'),
(87, 'IKR', '082223456191'),
(88, 'TRID', '081334774455'),
(89, 'AOYAMA', '085725712121'),
(90, 'SCMI', '089980771451'),
(91, 'IKR', '082223456191'),
(92, 'SCMI', '089980771451'),
(93, 'SCMI', '089980771451'),
(94, 'DAWE', '082687382392'),
(95, 'IKR', '082223456191'),
(96, 'TRID', '081334774455'),
(97, 'MIGUNANI', '0822105506431'),
(98, 'TRID', '081334774455'),
(99, 'SIGMA', '086241672781'),
(100, 'DAWE', '082687382392'),
(101, 'AOYAMA', '085725712121'),
(102, 'AOYAMA', '085725712121'),
(103, 'SIGMA', '086241672781'),
(104, 'IKR', '082223456191'),
(105, 'AOYAMA', '085725712121'),
(106, 'ALFA M.L', '089101778923');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `posisi` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `umur` int(11) NOT NULL,
  `kontak` varchar(40) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `posisi`, `alamat`, `umur`, `kontak`, `id_admin`) VALUES
(1, 'Endang Arifin', 'Sekertaris', 'Karawang', 30, '082332442552', 1),
(2, 'Ahmad Fahiz Abshor', 'Bendahara', 'Banyuwangi', 23, '081223443553', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_sumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id_material`, `nama_material`, `ukuran`, `harga`, `id_sumber`) VALUES
(1, 'Sarung Tangan Comet', '-', 3025000, 1),
(2, 'Washer OD 30 ID 17 T ', '2.9', 800000, 1),
(3, 'Sarung Tangan', '-', 265000, 1),
(4, 'Pipa Medium Spindo', '1.5 inchi', 36600000, 1),
(5, 'Sarung tangan', '-', 2630000, 1),
(6, 'Weco Fiq 206', '2 inchi', 9920000, 1),
(7, 'Sarung Tangan', '-', 2550000, 1),
(8, 'Pipa', '-', 1385000, 1),
(9, 'Material Line Assy', '-', 49576000, 1),
(10, 'Project Part Line Assy', '-', 9245000, 1),
(11, 'Material Line Logistic', '-', 49969000, 1),
(12, 'Sarung Tangan', '-', 2420000, 1),
(13, 'Sarung Tangan', '-', 2330000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `materialproduction`
--

CREATE TABLE `materialproduction` (
  `id_materialproduction` int(11) NOT NULL,
  `nama_materialproduction` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_sumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materialproduction`
--

INSERT INTO `materialproduction` (`id_materialproduction`, `nama_materialproduction`, `ukuran`, `harga`, `id_sumber`) VALUES
(1, 'lever Shoe', '-', 2468000, 2),
(2, 'Pintu Rumah', '-', 1500000, 2),
(3, 'As mercy', '-', 1950000, 2),
(4, 'Bracket Rolling', '-', 975000, 2),
(5, 'PW Pusher M6', '-', 975000, 2),
(6, 'Repair Pusher', '-', 575000, 2),
(7, 'Repair Stopper', '-', 420000, 2),
(8, 'Center Shaft Stabilizer TV40 mercy Dia', '48,1x540', 330000, 2),
(9, 'Shaft Stabilizer Floor TV40 Mercy Dia ', '48,1x840', 530000, 2),
(10, 'Shaft Stabilizer Subframe TV40 Mercy Dia', '48,1x840', 265000, 2),
(11, 'Baut Pengunci Dies M', '16x2', 1505000, 2),
(12, 'SW Pusher M8', '-', 885000, 2),
(13, 'Nylon Side Cover', '-', 5400000, 2),
(14, 'Roller Conveyor Unloading', '-', 1269000, 2),
(15, 'Bracket Nylon', '-', 1800000, 2),
(16, 'Trolley ', '-', 24922000, 2),
(17, 'Bracket Nylon', '-', 1800000, 2),
(18, 'Baut PVC', '-', 672000, 2),
(19, 'Bracket Stainless', '-', 1238000, 2),
(20, 'Bracket Roller', '-', 1300000, 2),
(21, 'Roll Conveyor Unloading', '-', 1169000, 2),
(22, 'As Drat & Nut PP', '-', 1950000, 2),
(23, 'Nylon Side Cover', '-', 5400000, 2),
(24, 'Bracket Alumunium', '-', 2630000, 2),
(25, 'Gear Barrel', '-', 2508000, 2),
(26, 'Lever Shoe AT 855', '-', 1808000, 2),
(27, 'Bolt M', '10x35', 660000, 2),
(28, 'PW Pusher M6', '-', 975000, 2),
(29, 'Shaft Pivot Assental Dia', '58.5x1000', 4875000, 2),
(30, 'Link Ejector', '-', 7500000, 2),
(31, 'Bracket Nylon', '-', 1800000, 2),
(32, 'Nylon Side Cover', '-', 5400000, 2),
(33, 'Nylon Upper', '-', 900000, 2),
(34, 'Plat Bending', '-', 3206000, 2),
(35, 'Aluminium Part', '-', 5656000, 2),
(36, 'Addopter Leak Test', '-', 16173000, 2),
(37, 'Pivot Pin', '-', 9750000, 2),
(38, 'Bracket Nylon', '-', 1200000, 2),
(39, 'Sprocket Speed Meter', '-', 640000, 2),
(40, 'Dies Bending', '-', 13280000, 2),
(41, 'Nylon Side Cover', '-', 5560000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `materialservice`
--

CREATE TABLE `materialservice` (
  `id_materialservice` int(11) NOT NULL,
  `nama_materialservice` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_sumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materialservice`
--

INSERT INTO `materialservice` (`id_materialservice`, `nama_materialservice`, `jumlah`, `harga`, `id_sumber`) VALUES
(1, 'Flange', '-', 1100000, 3),
(2, 'Roll Silicon', '-', 6000000, 3),
(3, 'Spacer PCI Rim ', '7 pcs', 3700000, 3),
(4, 'Repair As Bearing', '-', 750000, 3),
(5, 'Modif Aluminium', '16 pcs', 200000, 3),
(6, 'Roll Pipa', '-', 500000, 3),
(7, 'Jasa Proses Pipa', '-', 9360000, 3),
(8, 'Jasa Hotdip', '-', 1750000, 3),
(9, 'Jasa Gambar', '-', 4500000, 3),
(10, 'Jasa Grinding Roll Silicon', '-', 500000, 3),
(11, 'Modif As Stator Motor listrik', '-', 500000, 3),
(12, 'Modif As Stator Motor Listrik & Nut', '-', 700000, 3),
(13, 'Ring Dia 328 / 182', '-', 100000, 3),
(14, 'Nut Stopper Blader Kiri LTB', '-', 800000, 3),
(15, 'Cutting Wire Bead Former', '-', 1500000, 3),
(16, 'Cutting Stopper Wire Bead Former', '-', 1500000, 3),
(17, 'Ball Nose', '-', 4000000, 3),
(18, 'Liner Brake', '-', 150000, 3),
(19, 'Roll Silicon', '-', 500000, 3),
(20, 'Roll Silicon', '-', 500000, 3),
(21, 'Repair Trolley', '-', 2900000, 3),
(22, 'Pengganti Roda Trolley', '-', 1204000, 3),
(23, 'Repair Roll Silicon', '-', 500000, 3),
(24, 'Sambung As Patah', '-', 650000, 3),
(25, 'Pin Ejector As Crome', '10 pcs', 200000, 3),
(26, 'Frame Ejector ', '10 pcs', 800000, 3),
(27, 'Sector Plate Ejector ', '-', 3900000, 3),
(28, 'Jasa Hotdeep', '-', 1859000, 3),
(29, 'Bekisting', '-', 14000000, 3),
(30, 'Press Roller', '-', 189960, 3),
(31, 'Shaft Press Roller', '-', 142470, 3),
(32, 'Shaft Idle Roller', '-', 189960, 3),
(33, 'Idle Roller', '-', 299187, 3),
(34, 'Shaft Idle Roller', '-', 189960, 3),
(35, 'Idle Roller', '-', 299187, 3),
(36, 'Wrapped Bead', '-', 346677, 3),
(37, 'Wrapper Bead', '-', 489677, 3),
(38, 'Wrapped Guide Bead', '-', 475900, 3),
(39, 'Alas Bead', '-', 403655, 3),
(40, 'Alas Bead', '-', 489147, 3),
(41, 'Jasa Bor & Tap', '-', 2600000, 3),
(42, 'Project IKR Gugem Dies', '-', 3200000, 3),
(43, 'Project Guide Roll', '-', 2900000, 3),
(44, 'Wheel Cutter & Guide Roll', '-', 2500000, 3),
(45, 'Project Perbaikan pinion setting mold Group', '-', 7200000, 3),
(46, 'Head Drum Group', '-', 3900000, 3),
(47, 'Repair Trolley', '-', 6982000, 3),
(48, 'Service Hand Pallet', '-', 9614000, 3),
(49, 'Pulley Main Motor Group', '-', 3900000, 3),
(50, 'Jasa Wire Cut', '-', 4950000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tgl_pemasukan` date NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `id_sumber` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `tgl_pemasukan`, `nama_material`, `sub_total`, `id_sumber`, `id_customer`) VALUES
(1, '2022-01-11', 'Sarung Tangan Comet', 3025000, 1, 1),
(2, '2022-01-23', 'Lever Shoe', 2468000, 2, 2),
(3, '2022-01-28', 'Pintu Rumah', 1500000, 2, 3),
(4, '2022-02-02', 'Flange', 1100000, 3, 4),
(5, '2022-03-02', 'Sarung Tangan Comet', 2200000, 1, 5),
(6, '2022-02-06', 'As mercy', 1950000, 1, 6),
(7, '2022-02-06', 'Roll Silicon', 6000000, 3, 7),
(8, '2022-02-09', 'Bracket Rolling', 975000, 2, 8),
(9, '2022-02-09', 'PW Pusher M6', 975000, 2, 9),
(10, '2022-02-09', 'Repair Pusher', 575000, 2, 10),
(11, '2022-02-09', 'Repair Stopper', 420000, 2, 11),
(12, '2023-11-13', 'Center Shaft Stabilizer TV40 Mercy Dia', 330000, 2, 12),
(13, '2023-11-13', 'Shaft Stabilizer Floor TV40 Mercy Dia', 530000, 2, 13),
(14, '2023-11-13', 'Shaft Stabilizer Subfrmae TV40 Mercy Dia', 265000, 2, 14),
(15, '2022-02-18', 'Spacer PCI Rim ', 3700000, 3, 15),
(16, '2022-02-18', 'Repair As Bearing', 750000, 3, 16),
(17, '2022-02-18', 'Modif Aluminium ', 200000, 3, 17),
(18, '2022-02-22', 'Washer OD 30 ID ', 800000, 1, 18),
(19, '2022-02-22', 'Baut pengunci Dies ', 1505000, 2, 19),
(20, '2022-02-22', 'SW Pusher M8', 885000, 2, 20),
(21, '2022-02-22', 'Nylon Side Cover', 5400000, 2, 21),
(22, '2022-02-28', 'Roll Pipa', 500000, 3, 22),
(23, '2022-03-01', 'Sarung Tangan', 2650000, 1, 23),
(24, '2022-03-04', 'Roller Conveyor Unloading', 1269000, 2, 24),
(25, '2022-03-04', 'Bracket Nylon ', 1800000, 2, 25),
(26, '2022-03-10', 'Trolley', 24922000, 2, 26),
(27, '2022-03-11', 'Pipa 1,5 Inchi Medium Spindo', 36660000, 1, 27),
(28, '2022-03-11', 'Jasa Proses Pipa', 9360000, 3, 28),
(29, '2022-03-15', 'Bracket Nylon', 1800000, 2, 29),
(30, '2022-03-15', 'Baut PVC', 672000, 2, 30),
(31, '2022-03-15', 'Jasa Hotdip', 1750000, 3, 31),
(32, '2022-03-15', 'Bracket Stainless', 1238000, 2, 32),
(33, '2022-04-07', 'Sarung Tangan', 2630000, 1, 33),
(34, '2022-04-26', 'Jasa Gambar', 4500000, 3, 34),
(35, '2022-05-03', 'Jasa Grinding Roll Silicon', 500000, 3, 35),
(36, '2022-05-03', 'Modif As Stator Motor Listrik', 500000, 3, 36),
(37, '2022-05-03', 'Modif As Stator Motor Listrik & Nut', 700000, 3, 37),
(38, '2022-05-03', 'Ring Dia. 328 / 182 ', 100000, 3, 38),
(39, '2022-05-03', 'Nut Stopper Blader Kiri LTB', 800000, 3, 39),
(40, '2022-05-03', 'Cutting Wire Bead Former', 1500000, 3, 40),
(41, '2022-05-03', 'Cutting Stopper  Wire Bead Former', 1500000, 3, 41),
(42, '2022-05-03', 'Ball Nose', 4000000, 3, 42),
(43, '2022-05-03', 'Liner Brake', 150000, 3, 43),
(44, '2022-05-06', 'Bracket Roller', 1300000, 2, 44),
(45, '2022-11-15', 'Roll Conveyor Unloading', 1169000, 2, 45),
(46, '2022-11-15', 'As Drat & Nut PP', 1950000, 2, 46),
(47, '2022-05-17', 'Roll Silikon', 500000, 3, 47),
(48, '2022-05-25', 'Nylon Side Cover', 5400000, 2, 48),
(49, '2022-05-25', 'Bracket Aluminium', 2630000, 2, 49),
(50, '2022-05-25', 'Gear Barrel', 2508000, 2, 50),
(51, '2022-05-25', 'Lever Shoe AT 855', 1808000, 2, 51),
(52, '2022-05-25', 'Bolt M10 x 35 (10R-26)', 660000, 2, 52),
(53, '2022-05-25', 'PW Pusher M6', 975000, 2, 53),
(54, '2022-05-26', 'Roll Silikon', 500000, 3, 54),
(55, '2022-05-27', 'Weco 2 Inchi Fiq 206', 9920000, 1, 55),
(56, '2022-05-30', 'Repair Trolley', 2900000, 3, 56),
(57, '2022-05-30', 'Penggantian Roda Trolley', 1204000, 3, 57),
(58, '2022-05-31', 'Shaft Pivot Assental dia 58.5x1000', 4875000, 2, 58),
(59, '2022-06-07', 'Repair Roll Silikon', 500000, 3, 59),
(60, '2022-06-07', 'Sambung As Patah', 650000, 3, 60),
(61, '2022-06-07', 'Link Ejector', 7500000, 2, 61),
(62, '2022-06-07', 'Pin Ejector As Crome @10 Pcs', 200000, 3, 62),
(63, '2022-06-07', 'Frame Ejector @ 10 Pcs', 800000, 3, 63),
(64, '2022-06-07', 'Sector Plate Ejector', 3900000, 3, 64),
(65, '2022-06-15', 'Jasa Hotdeep ', 1859000, 3, 65),
(66, '2022-06-15', 'Bracket Nylon', 1800000, 2, 66),
(67, '2022-06-24', 'Bekisting', 14000000, 3, 67),
(68, '2022-07-01', 'Press Roller', 189960, 3, 68),
(69, '2022-07-01', 'Shaft Press Roller', 142470, 3, 69),
(70, '2022-07-01', 'Shaft Idle Roller', 189960, 3, 70),
(71, '2022-07-01', 'Idle Roller', 299187, 3, 71),
(72, '2022-07-01', 'Shaft Idle Roller #2', 189960, 3, 72),
(73, '2022-07-07', 'idle Roller #1', 299187, 3, 73),
(74, '2022-07-07', 'Wrapped Bead #1', 346677, 3, 74),
(75, '2022-07-07', 'Wrapped Bead #2', 489677, 3, 75),
(76, '2022-07-07', 'Wrapped Guide Bead', 475900, 3, 76),
(77, '2022-07-07', 'Alas Bead #1', 403665, 3, 77),
(78, '2022-07-07', 'Alas Bead #2', 489147, 3, 78),
(79, '2022-07-28', 'Sarung Tangan', 2550000, 1, 79),
(80, '2022-07-29', 'Nylon Side Cover', 5400000, 2, 80),
(81, '2022-08-02', 'Jasa Bor & Tap', 2600000, 3, 81),
(82, '2022-08-03', 'Sarung Tangan', 2430000, 1, 82),
(83, '2022-08-04', 'Nylon Upper', 900000, 2, 83),
(84, '2022-08-04', 'Project IKR Gugem Dies', 3200000, 3, 84),
(85, '2022-08-08', 'PIPA', 1385000, 1, 85),
(86, '2022-08-10', 'Project Guide Roll', 2900000, 3, 86),
(87, '2022-08-10', 'Wheel Cutter & Guide Roll', 2500000, 3, 87),
(88, '2022-08-12', 'Plat Bending', 3206000, 2, 88),
(89, '2022-08-15', 'Aluminium Part', 5656000, 2, 89),
(90, '2022-08-19', 'Material Line Assy', 49576000, 1, 90),
(91, '2022-08-23', 'Project Perbaikan pinion setting mold Group', 7200000, 3, 91),
(92, '2022-08-25', 'Project Part Line Assy', 9245000, 1, 92),
(93, '2022-08-25', 'Material Line Logistic', 49969000, 1, 93),
(94, '2022-09-06', 'Sarung Tangan', 2420000, 1, 94),
(95, '2022-09-09', 'Head Drum Group', 3900000, 3, 95),
(96, '2022-09-14', 'Repair Trolley', 6982000, 3, 96),
(97, '2022-09-19', 'Adaptor Leak Test', 16173000, 2, 97),
(98, '2022-09-27', 'Service Hand Pallet', 9614000, 3, 98),
(99, '2022-10-05', 'Pivot Pin', 9750000, 2, 99),
(100, '2022-10-11', 'Sarung Tangan', 2330000, 1, 100),
(101, '2022-10-14', 'Bracket Nylon', 1200000, 2, 101),
(102, '2022-10-14', 'Sprocket Speed Meter', 640000, 2, 102),
(103, '2022-10-17', 'Dies Bending', 13280000, 2, 103),
(104, '2022-10-18', 'Pulley Main Motor Group', 3900000, 3, 104),
(105, '2022-10-28', 'Nylon Side Cover', 5560000, 2, 105),
(106, '2022-10-31', 'Jasa Wire Cut', 4950000, 3, 106);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `total` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `id_sumber` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_catatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `nama_material`, `harga`, `total`, `catatan`, `id_sumber`, `id_supplier`, `id_catatan`) VALUES
(1, '2022-02-02', 'Pipa Besi', 28000, 280000, 'Pagar', 1, 12121, 1),
(2, '2022-02-02', 'Baja', 43000, 301000, 'Besi', 1, 12122, 1),
(3, '2022-02-03', 'Carbon Steel', 41000, 197500, 'Silicon', 1, 12123, 1),
(4, '2022-02-07', 'Alloy Steel', 32000, 342000, 'Sarung Tangan', 1, 12124, 2),
(5, '2022-02-07', 'Part Liner', 26000, 243000, 'Meja Besi', 1, 12134, 2),
(6, '2022-02-10', 'As Drad', 76500, 1678000, 'Atap Seng', 1, 12133, 2),
(7, '2022-02-13', 'Besi Hollow', 63000, 1342000, 'Baut', 1, 12126, 3),
(8, '2022-02-13', 'Silica', 3000, 643000, 'Trolly', 1, 12131, 3),
(9, '2022-02-17', 'Besi High Speed', 52000, 980000, 'Pipa', 1, 12130, 4),
(10, '2022-02-12', 'Besi Siku', 34000, 923500, 'Pintu Rumah', 1, 12127, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sumber`
--

CREATE TABLE `sumber` (
  `id_sumber` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sumber`
--

INSERT INTO `sumber` (`id_sumber`, `nama`) VALUES
(1, 'Trading'),
(2, 'Produksi'),
(3, 'Service');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Kode_Supplier` int(10) NOT NULL,
  `Nama_Perusahaan` varchar(50) DEFAULT NULL,
  `Material` varchar(50) DEFAULT NULL,
  `Alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Kode_Supplier`, `Nama_Perusahaan`, `Material`, `Alamat`, `no_telp`) VALUES
(12121, 'Toko Besi Mega Baja Cikarang', 'Pipa Besi', 'Suraresmi, Cikarang Sel., Kab. Bekasi, Jawa Barat', '082614388190'),
(12122, 'Cv. Multi Baja Prima Usaha', 'Baja', 'Jl. Tegal Danas No.75, Sertajaya, Kec. Cikarang Ti', '088769005212'),
(12123, 'MEGA BAJA DELTA MAS', 'Carbon Steel', 'Jl. Tegal Danas No.30, RT.002/RW.003, Hegarmukti, ', '087237579021'),
(12124, 'MEGA BAJA DELTA MAS', 'Alloy Steel', 'Jl. Tegal Danas No.30, RT.002/RW.003, Hegarmukti, ', '087237579021'),
(12125, 'Toko Besi Tri Baja Pratama', 'Plat Besi', 'Jl. Raya Industri Kampung Sempur, Pasirgombong, Ke', '088752728901'),
(12126, 'Toko Besi Tri Baja Pratama', 'Besi Hollow', 'Jl. Raya Industri Kampung Sempur, Pasirgombong, Ke', '088752728901'),
(12127, 'Toko Besi Tri Baja Pratama', 'Besi Siku', 'Jl. Raya Industri Kampung Sempur, Pasirgombong, Ke', '088752728901'),
(12128, 'TOKO BESI SAMUDRA STEEL', 'Wide Flange', 'Jl. KH. Fudholi No.8, Karangasih, Kec. Cikarang Ut', '081134562132'),
(12129, 'TOKO BESI UTAMA STEEL CIKARANG', 'Wiremesh', 'Jl. Pilar Sukatani, Jl. Wr. Pojok No.Kp, Sukaraya,', '082222416289'),
(12130, 'PT Mandiri Jaya Tamasukses', 'Baja High Speed', 'Graha Asri, jl. cimandiri raya T6. No. 2 - 12, Jat', '(021)8009671'),
(12131, 'PT. SUMBER ANUGRAH TEKNIK', 'Silica', 'Sertajaya, Kec. Cikarang Tim., Kabupaten Bekasi, J', '(021)3400212'),
(12132, 'COMET CG 805 BK', 'Sarung Tangan', 'Jl. Cimanadiri 5 V6/20, Jatireja, Kec. Cikarang Ti', '085554371278'),
(12133, 'PT. Daiyo Multi Fastech', 'As Drat', 'Ruko Kusuka, Jl. Raya Cikarang Cibarusah, Blok I/F', '(021)4580096'),
(12134, 'Toko besi setia baja', 'Part Liner', 'Q38J+MW4, Kp, Jl. Buwek Raya, RT.1/RW.022, Sumberj', '082356172379');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `id_sumber` (`id_sumber`);

--
-- Indexes for table `materialproduction`
--
ALTER TABLE `materialproduction`
  ADD PRIMARY KEY (`id_materialproduction`),
  ADD KEY `id_sumber` (`id_sumber`);

--
-- Indexes for table `materialservice`
--
ALTER TABLE `materialservice`
  ADD PRIMARY KEY (`id_materialservice`),
  ADD KEY `id_sumber` (`id_sumber`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD UNIQUE KEY `id_customer` (`id_customer`),
  ADD KEY `id_sumber` (`id_sumber`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD UNIQUE KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_sumber` (`id_sumber`),
  ADD KEY `id_catatan` (`id_catatan`);

--
-- Indexes for table `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Kode_Supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12132;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id_sumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Kode_Supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12135;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatan`
--
ALTER TABLE `catatan`
  ADD CONSTRAINT `catatan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material` FOREIGN KEY (`id_sumber`) REFERENCES `sumber` (`id_sumber`);

--
-- Constraints for table `materialproduction`
--
ALTER TABLE `materialproduction`
  ADD CONSTRAINT `materialproduction_ibfk_1` FOREIGN KEY (`id_sumber`) REFERENCES `sumber` (`id_sumber`);

--
-- Constraints for table `materialservice`
--
ALTER TABLE `materialservice`
  ADD CONSTRAINT `materialservice_ibfk_1` FOREIGN KEY (`id_sumber`) REFERENCES `sumber` (`id_sumber`);

--
-- Constraints for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `pemasukan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `pemasukan_ibfk_2` FOREIGN KEY (`id_sumber`) REFERENCES `sumber` (`id_sumber`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`id_sumber`) REFERENCES `sumber` (`id_sumber`),
  ADD CONSTRAINT `pengeluaran_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`Kode_Supplier`),
  ADD CONSTRAINT `pengeluaran_ibfk_3` FOREIGN KEY (`id_catatan`) REFERENCES `catatan` (`id_catatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
