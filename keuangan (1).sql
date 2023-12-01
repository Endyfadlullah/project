-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 01 Des 2023 pada 18.36
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `pass`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int NOT NULL,
  `nama_customer` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `no_telp`) VALUES
(1, 'DAWE', '082687382392'),
(2, 'AOYAMA', '085725712121'),
(3, 'UMAR', '086745382912'),
(4, 'IKR', '082223456191'),
(5, 'SIGMA', '086241672781'),
(6, 'P.SLAMET ', '089778990007'),
(7, 'TRID', '081334774455'),
(8, 'CHI', '081557900631'),
(9, 'PLT', '082880997675'),
(10, 'HJS', '0815332001878'),
(11, 'SCMI', '089980771451'),
(12, 'MIGUNANI', '0822105506431'),
(13, 'ALFA M.L', '089101778923'),
(14, 'ANML', '089273014499');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int NOT NULL,
  `nama` varchar(40) NOT NULL,
  `posisi` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `umur` int NOT NULL,
  `kontak` varchar(40) NOT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `posisi`, `alamat`, `umur`, `kontak`, `id_admin`) VALUES
(1, 'Endang Arifin', 'Sekertaris', 'Karawang', 30, '082332442552', 1),
(2, 'Ahmad Fahiz Abshor ', 'Bendahara', 'Banyuwangi', 23, '081223443553', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int NOT NULL,
  `tgl_pemasukan` date NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `sub_total` int NOT NULL,
  `id_sumber` int NOT NULL,
  `id_customer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `tgl_pemasukan`, `nama_material`, `sub_total`, `id_sumber`, `id_customer`) VALUES
(1, '2022-01-11', 'Sarung Tangan Comet', 3025000, 1, 1),
(2, '2022-02-10', 'Lever Shoe', 2468000, 2, 2),
(3, '2022-02-16', 'Pintu Rumah', 1500000, 2, 3),
(4, '2022-03-07', 'Flange', 1100000, 3, 4),
(5, '2022-04-21', 'Sarung Tangan Comet', 2200000, 1, 1),
(6, '2022-05-04', 'As mercy', 1950000, 1, 5),
(7, '2022-06-17', 'Roll Silicon', 6000000, 3, 4),
(8, '2022-07-19', 'Bracket Rolling', 975000, 2, 2),
(9, '2022-08-05', 'PW Pusher M6', 975000, 2, 2),
(10, '2022-08-15', 'Repair Pusher', 575000, 2, 2),
(11, '2022-09-06', 'Repair Stopper', 420000, 2, 2),
(12, '2022-10-17', 'Center Shaft Stabilizer TV40 Mercy Dia', 330000, 2, 5),
(13, '2022-11-21', 'Shaft Stabilizer Floor TV40 Mercy Dia', 530000, 2, 5),
(14, '2022-11-22', 'Shaft Stabilizer Subfrmae TV40 Mercy Dia', 265000, 2, 5),
(15, '2022-12-07', 'Spacer PCI Rim ', 3700000, 3, 4),
(16, '2023-01-02', 'Repair As Bearing', 750000, 3, 4),
(17, '2023-01-02', 'Modif Aluminium ', 200000, 3, 4),
(18, '2023-01-11', 'Washer OD 30 ID ', 800000, 1, 2),
(19, '2023-01-18', 'Baut pengunci Dies ', 1505000, 2, 2),
(20, '2023-02-08', 'SW Pusher M8', 885000, 2, 2),
(21, '2023-02-15', 'Nylon Side Cover', 5400000, 2, 2),
(22, '2023-02-17', 'Roll Pipa', 500000, 3, 6),
(23, '2022-03-01', 'Sarung Tangan', 2650000, 1, 1),
(24, '2023-03-06', 'Roller Conveyor Unloading', 1269000, 2, 2),
(25, '2023-03-06', 'Bracket Nylon ', 1800000, 2, 2),
(26, '2023-03-10', 'Trolley', 24922000, 2, 7),
(27, '2022-03-11', 'Pipa 1,5 Inchi Medium Spindo', 36660000, 1, 4),
(28, '2023-03-13', 'Jasa Proses Pipa', 9360000, 3, 4),
(29, '2023-03-15', 'Bracket Nylon', 1800000, 2, 2),
(30, '2023-03-15', 'Baut PVC', 672000, 2, 2),
(31, '2023-03-15', 'Jasa Hotdip', 1750000, 3, 2),
(32, '2023-03-15', 'Bracket Stainless', 1238000, 2, 2),
(33, '2023-04-05', 'Sarung Tangan', 2630000, 1, 1),
(34, '2023-04-26', 'Jasa Gambar', 4500000, 3, 8),
(35, '2023-05-03', 'Jasa Grinding Roll Silicon', 500000, 3, 4),
(36, '2023-05-03', 'Modif As Stator Motor Listrik', 500000, 3, 4),
(37, '2023-05-03', 'Modif As Stator Motor Listrik & Nut', 700000, 3, 4),
(38, '2023-05-03', 'Ring Dia. 328 / 182 ', 100000, 3, 4),
(39, '2023-05-03', 'Nut Stopper Blader Kiri LTB', 800000, 3, 4),
(40, '2023-05-03', 'Cutting Wire Bead Former', 1500000, 3, 4),
(41, '2023-05-10', 'Cutting Stopper  Wire Bead Former', 1500000, 3, 4),
(42, '2023-05-17', 'Ball Nose', 4000000, 3, 4),
(43, '2023-05-19', 'Liner Brake', 150000, 3, 4),
(44, '2023-05-22', 'Bracket Roller', 1300000, 2, 9),
(45, '2023-11-01', 'Roll Conveyor Unloading', 1169000, 2, 2),
(46, '2023-11-01', 'As Drat & Nut PP', 1950000, 2, 2),
(47, '2023-05-22', 'Roll Silikon', 500000, 3, 4),
(48, '2023-05-25', 'Nylon Side Cover', 5400000, 2, 2),
(49, '2023-05-25', 'Bracket Aluminium', 2630000, 2, 2),
(50, '2023-05-25', 'Gear Barrel', 2508000, 2, 2),
(51, '2023-05-25', 'Lever Shoe AT 855', 1808000, 2, 2),
(52, '2023-05-25', 'Bolt M10 x 35 (10R-26)', 660000, 2, 2),
(53, '2023-05-25', 'PW Pusher M6', 975000, 2, 2),
(54, '2023-05-26', 'Roll Silikon', 500000, 3, 4),
(55, '2023-05-29', 'Weco 2 Inchi Fiq 206', 9920000, 1, 8),
(56, '2023-05-30', 'Repair Trolley', 2900000, 3, 7),
(57, '2023-05-30', 'Penggantian Roda Trolley', 1204000, 3, 7),
(58, '2023-05-31', 'Shaft Pivot Assental dia 58.5x1000', 4875000, 2, 5),
(59, '2023-06-07', 'Repair Roll Silikon', 500000, 3, 4),
(60, '2023-06-07', 'Sambung As Patah', 650000, 3, 4),
(61, '2023-06-07', 'Link Ejector', 7500000, 2, 4),
(62, '2023-06-07', 'Pin Ejector As Crome @10 Pcs', 200000, 3, 4),
(63, '2023-06-07', 'Frame Ejector @ 10 Pcs', 800000, 3, 4),
(64, '2023-06-07', 'Sector Plate Ejector', 3900000, 3, 4),
(65, '2023-06-14', 'Jasa Hotdeep ', 1859000, 3, 2),
(66, '2023-06-15', 'Bracket Nylon', 1800000, 2, 2),
(67, '2023-06-23', 'Bekisting', 14000000, 3, 10),
(68, '2023-07-03', 'Press Roller', 189960, 3, 4),
(69, '2023-07-03', 'Shaft Press Roller', 142470, 3, 4),
(70, '2023-07-03', 'Shaft Idle Roller', 189960, 3, 4),
(71, '2023-07-03', 'Idle Roller', 299187, 3, 4),
(72, '2023-07-03', 'Shaft Idle Roller #2', 189960, 3, 4),
(73, '2023-07-07', 'idle Roller #1', 299187, 3, 4),
(74, '2023-07-07', 'Wrapped Bead #1', 346677, 3, 4),
(75, '2023-07-07', 'Wrapped Bead #2', 489677, 3, 4),
(76, '2023-07-07', 'Wrapped Guide Bead', 475900, 3, 4),
(77, '2023-07-07', 'Alas Bead #1', 403665, 3, 4),
(78, '2023-07-07', 'Alas Bead #2', 489147, 3, 4),
(79, '2023-07-19', 'Sarung Tangan', 2550000, 1, 1),
(80, '2023-07-25', 'Nylon Side Cover', 5400000, 2, 2),
(81, '2023-08-01', 'Jasa Bor & Tap', 2600000, 3, 5),
(82, '2023-08-03', 'Sarung Tangan', 2430000, 1, 1),
(83, '2023-08-07', 'Nylon Upper', 900000, 2, 2),
(84, '2023-08-08', 'Project IKR Gugem Dies', 3200000, 3, 4),
(85, '2023-08-08', 'PIPA', 1385000, 1, 11),
(86, '2023-08-10', 'Project Guide Roll', 2900000, 3, 4),
(87, '2023-08-10', 'Wheel Cutter & Guide Roll', 2500000, 3, 4),
(88, '2023-08-14', 'Plat Bending', 3206000, 2, 7),
(89, '2023-08-15', 'Aluminium Part', 5656000, 2, 2),
(90, '2023-08-21', 'Material Line Assy', 49576000, 1, 11),
(91, '2023-08-23', 'Project Perbaikan pinion setting mold Group', 7200000, 3, 4),
(92, '2023-08-25', 'Project Part Line Assy', 9245000, 1, 11),
(93, '2023-08-25', 'Material Line Logistic', 49969000, 1, 11),
(94, '2023-09-06', 'Sarung Tangan', 2420000, 1, 1),
(95, '2023-09-08', 'Head Drum Group', 3900000, 3, 4),
(96, '2023-09-12', 'Repair Trolley', 6982000, 3, 7),
(97, '2023-09-19', 'Adaptor Leak Test', 16173000, 2, 12),
(98, '2023-09-25', 'Service Hand Pallet', 9614000, 3, 7),
(99, '2023-10-05', 'Pivot Pin', 9750000, 2, 5),
(100, '2023-10-11', 'Sarung Tangan', 2330000, 1, 1),
(101, '2023-10-16', 'Bracket Nylon', 1200000, 2, 2),
(102, '2023-10-16', 'Sprocket Speed Meter', 640000, 2, 2),
(103, '2023-10-17', 'Dies Bending', 13280000, 2, 5),
(104, '2023-10-18', 'Pulley Main Motor Group', 3900000, 3, 4),
(105, '2023-10-24', 'Nylon Side Cover', 5560000, 2, 2),
(106, '2023-10-30', 'Jasa Wire Cut', 4950000, 3, 13),
(107, '2023-11-06', 'Sarung Tangan', 2510000, 1, 1),
(108, '2023-11-06', 'Wirecut', 5439000, 3, 14),
(109, '2023-11-09', 'Main Shaft Cylinder Repair', 35816000, 2, 5),
(110, '2023-11-14', 'Base plate Group', 2000000, 3, 4),
(111, '2023-11-15', 'Wirecut Marking', 372000, 3, 14),
(112, '2023-11-20', 'CH Feed Plate 2 ', 4045000, 3, 14),
(113, '2023-11-22', 'Repair Rotor', 2300000, 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `harga` int NOT NULL,
  `total` int NOT NULL,
  `id_sumber` int NOT NULL,
  `id_supplier` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `nama_material`, `harga`, `total`, `id_sumber`, `id_supplier`) VALUES
(1, '2022-01-03', 'Pipa Besi', 28000, 280000, 2, 1),
(2, '2022-02-09', 'Baja', 43000, 301000, 1, 2),
(3, '2022-03-15', 'Carbon Steel', 41000, 197500, 2, 3),
(4, '2022-04-04', 'Alloy Steel', 32000, 342000, 2, 4),
(5, '2022-05-26', 'Part Liner', 26000, 243000, 1, 11),
(6, '2022-06-28', 'As Drat', 76500, 1678000, 2, 10),
(7, '2022-07-22', 'Besi Hollow', 63000, 1342000, 1, 4),
(8, '2022-07-27', 'Silica', 3000, 643000, 1, 8),
(9, '2022-08-09', 'Besi High Speed', 52000, 980000, 1, 7),
(10, '2022-08-23', 'Besi Siku', 34000, 923500, 3, 4),
(11, '2022-09-13', 'Plat Besi', 30000, 270000, 1, 4),
(12, '2022-10-20', 'Wide Flange', 51000, 561000, 2, 5),
(13, '2022-11-25', 'Wiremesh', 12500, 312500, 1, 6),
(14, '2022-12-14', 'Sarung Tangan', 21000, 525000, 1, 9),
(15, '2023-01-09', 'Sarung Tangan Comet', 21000, 3990000, 1, 12),
(16, '2023-01-10', 'Lever Shoe', 90000, 4505000, 2, 13),
(17, '2023-01-24', 'Pintu Rumah', 1000000, 1000000, 2, 14),
(18, '2023-02-02', 'Flange', 10000, 1000000, 3, 15),
(19, '2023-02-02', 'As Mercy', 8400, 879000, 2, 15),
(20, '2023-02-07', 'Roll Silicon', 50000, 4500000, 3, 15),
(21, '2022-02-08', 'Bracket Rolling', 9500, 870500, 2, 13),
(22, '2022-02-09', 'PW Pusher M6', 9500, 870500, 2, 16),
(23, '2023-02-09', 'Repair Pusher', 51000, 431000, 2, 16),
(24, '2023-02-10', 'Repair Stopper', 25000, 275000, 2, 16),
(25, '2023-02-14', 'Center Shaft Stabilizer TV40 Mercy Dia. 48,1 x 540', 30000, 270000, 2, 15),
(26, '2023-02-14', 'Shaft Stabilizer Floor TV40 Mercy Dia. 48,1 x 840', 40000, 440000, 2, 15),
(27, '2023-02-14', 'Shaft Stabilizer Subfrmae TV40 Mercy Dia. 48,1 x 8', 45000, 195000, 2, 15),
(28, '2023-02-17', 'Spacer PCI Rim 7 Pcs', 70000, 3000000, 3, 15),
(29, '2023-02-20', 'Repair As Bearing', 6500, 699500, 3, 15),
(30, '2023-02-20', 'Modif Aluminium @ 16 Pcs', 20000, 180000, 3, 15),
(31, '2023-02-20', 'Washer OD 30 ID 17 t. 2,9', 40000, 720000, 1, 13),
(32, '2023-02-23', 'Baut pengunci Dies M16 x 2 - 86,3', 55500, 895500, 2, 15),
(33, '2023-02-23', 'SW Pusher M8', 35000, 750000, 2, 16),
(34, '2023-02-27', 'Nylon Side Cover', 54000, 4555000, 2, 17),
(35, '2023-02-27', 'Roll Pipa', 15000, 430000, 3, 15),
(36, '2023-03-03', 'Roller Conveyor Unloading', 65500, 1650000, 2, 15),
(37, '2023-03-07', 'Bracket Nylon ', 18000, 800000, 2, 16),
(38, '2023-03-08', 'Trolley', 2492200, 18970000, 2, 18),
(39, '2023-03-10', 'Pipa 1,5 Inchi Medium Spindo', 980000, 30890000, 1, 19),
(40, '2023-03-13', 'Jasa Proses Pipa', 36000, 7360000, 3, 15),
(41, '2023-03-16', 'Bracket Nylon ', 18000, 1680000, 2, 16),
(42, '2023-03-21', 'Baut PVC', 22000, 592000, 2, 15),
(43, '2023-03-24', 'Jasa Hotdip', 50000, 1650000, 3, 20),
(44, '2023-03-24', 'Bracket Stainless', 23000, 938000, 2, 16),
(45, '2023-04-18', 'Jasa Gambar', 500000, 2500000, 3, 16),
(46, '2023-05-01', 'Jasa Grinding Roll Silicon', 32000, 342000, 3, 15),
(47, '2023-05-01', 'Modif As Stator Motor Listrik', 50000, 350000, 3, 15),
(48, '2023-05-03', 'Modif As Stator Motor Listrik & Nut', 55000, 500000, 3, 15),
(49, '2023-05-09', 'Ring Dia. 328 / 182 ', 10000, 50000, 3, 15),
(50, '2023-05-10', 'Nut Stopper Blader Kiri LTB', 80000, 580000, 3, 15),
(51, '2023-05-10', 'Cutting Wire Bead Former', 50000, 1000000, 3, 16),
(52, '2023-05-11', 'Cutting Stopper  Wire Bead Former', 50000, 1000000, 3, 16),
(53, '2023-05-11', 'Ball Nose', 40000, 2000000, 3, 15),
(54, '2023-05-15', 'Liner Brake', 15000, 90000, 3, 15),
(55, '2023-06-13', 'Sector Plate Ejector', 90000, 2700000, 3, 15),
(56, '2023-05-15', 'Roll Conveyor Unloading', 70000, 700000, 2, 13),
(57, '2023-05-15', 'As Drat & Nut PP', 95000, 950000, 2, 13),
(58, '2023-05-15', 'Roll Silikon', 50000, 300000, 3, 15),
(59, '2023-05-15', 'Nylon Side Cover', 400000, 4000000, 2, 17),
(60, '2023-05-19', 'Bracket Aluminium', 30000, 1300000, 2, 16),
(61, '2023-05-19', 'Gear Barrel', 50800, 1800800, 2, 21),
(62, '2023-06-13', 'Jasa Hotdeep ', 60000, 3000000, 3, 20),
(63, '2023-05-22', 'Bolt M10 x 35 (10R-26)', 60000, 600000, 2, 13),
(64, '2023-05-22', 'PW Pusher M6', 75000, 750000, 2, 16),
(65, '2023-05-24', 'Roll Silikon', 50000, 300000, 3, 15),
(66, '2023-05-25', 'Weco 2 Inchi Fiq 206', 92000, 7920000, 1, 22),
(67, '2023-05-25', 'Repair Trolley', 90000, 900000, 3, 18),
(68, '2023-05-26', 'Penggantian Roda Trolley', 200000, 1000000, 3, 18),
(69, '2023-05-30', 'Shaft Pivot Assental dia 58.5x1000', 58000, 2580000, 2, 15),
(70, '2023-06-05', 'Repair Roll Silikon', 50000, 350000, 3, 15),
(71, '2023-06-05', 'Sambung As Patah', 50000, 500000, 3, 15),
(72, '2023-06-05', 'Link Ejector', 500000, 5000000, 2, 15),
(73, '2023-06-07', 'Pin Ejector As Crome @10 Pcs', 10000, 130000, 3, 15),
(74, '2023-06-13', 'Frame Ejector @ 10 Pcs', 40000, 400000, 3, 15),
(75, '2023-06-16', 'Sector Plate Ejector', 150000, 3500000, 3, 15),
(76, '2023-06-20', 'Jasa Hotdeep ', 360000, 1480000, 3, 20),
(77, '2023-06-23', 'Bracket Nylon', 400000, 1600000, 2, 16),
(78, '2023-06-27', 'Bekisting', 800000, 12500000, 3, 16),
(79, '2023-07-03', 'Press Roller', 30000, 100000, 3, 15),
(80, '2023-07-05', 'Shaft Press Roller', 43800, 106500, 3, 15),
(81, '2023-07-07', 'Shaft Idle Roller', 27900, 150960, 3, 15),
(82, '2023-07-11', 'Idle Roller', 32000, 149450, 3, 15),
(83, '2023-07-07', 'Shaft Idle Roller 2', 27900, 150960, 3, 15),
(84, '2023-07-11', 'idle Roller 1', 32000, 149450, 3, 15),
(85, '2023-07-24', 'Wrapped Bead 1', 56900, 304700, 3, 15),
(86, '2023-07-24', 'Wrapped Bead 2', 56900, 304700, 3, 15),
(87, '2023-07-26', 'Wrapped Guide Bead', 40900, 400900, 3, 15),
(88, '2023-07-28', 'Alas Bead 1', 54600, 330665, 3, 15),
(89, '2023-07-28', 'Alas Bead 2', 30500, 395600, 3, 15),
(90, '2023-07-31', 'Nylon Side Cover', 420000, 4200000, 3, 17),
(91, '2023-08-01', 'Jasa Bor & Tap', 100000, 2000000, 3, 16),
(92, '2023-08-03', 'Nylon Upper', 50000, 750000, 2, 17),
(93, '2023-08-04', 'Project IKR Gugem Dies', 250000, 2700000, 3, 15),
(94, '2023-08-08', 'PIPA', 40000, 1050000, 1, 19),
(95, '2023-08-10', 'Project Guide Roll', 230000, 2300000, 3, 15),
(96, '2023-08-14', 'Wheel Cutter & Guide Roll', 120500, 1800000, 3, 15),
(97, '2023-08-16', 'Plat Bending', 150000, 2608000, 2, 23),
(98, '2023-08-17', 'Aluminium Part', 250000, 4200500, 2, 23),
(99, '2023-08-21', 'Material Line Assy', 1500000, 45500000, 1, 19),
(100, '2023-08-23', 'Project Perbaikan pinion setting mold Group', 350000, 6850000, 3, 15),
(101, '2023-08-28', 'Project Part Line Assy', 450000, 8800000, 1, 19),
(102, '2023-08-30', 'Material Line Logistic', 450000, 45500000, 1, 19),
(103, '2023-09-04', 'Head Drum Group', 42000, 1000000, 2, 15),
(104, '2023-09-05', 'Repair Trolley', 82000, 5610000, 3, 18),
(105, '2023-09-13', 'Adaptor Leak Test', 173000, 15173000, 2, 13),
(106, '2023-09-21', 'Service Hand Pallet', 60000, 7960000, 3, 18),
(107, '2023-10-02', 'Pivot Pin', 70000, 7700000, 2, 15),
(108, '2023-10-04', 'Bracket Nylon', 30000, 270000, 2, 16),
(109, '2023-10-10', 'Sprocket Speed Meter', 40000, 580000, 2, 23),
(110, '2023-10-16', 'Dies Bending', 80000, 12160000, 2, 24),
(111, '2023-10-20', 'Pulley Main Motor Group', 90000, 2700000, 3, 15),
(112, '2023-10-25', 'Nylon Side Cover', 60000, 4800000, 2, 17),
(113, '2023-10-25', 'Jasa Wire Cut', 50000, 3450000, 3, 13),
(114, '2023-11-01', 'Wirecut', 40000, 4440000, 3, 13),
(115, '2023-11-06', 'Main Shaft Cylinder Repair', 800000, 32160000, 2, 25),
(116, '2023-11-15', 'Base plate Group', 100000, 1200000, 3, 16),
(117, '2023-11-15', 'Wirecut Marking', 30000, 300000, 3, 13),
(118, '2023-11-20', 'CH Feed Plate 2 ', 45000, 3450000, 3, 13),
(119, '2023-11-21', 'Repair Rotor', 30000, 2930000, 3, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber`
--

CREATE TABLE `sumber` (
  `id_sumber` int NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sumber`
--

INSERT INTO `sumber` (`id_sumber`, `nama`) VALUES
(1, 'Trading'),
(2, 'Produksi'),
(3, 'Service');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `Kode_Supplier` int NOT NULL,
  `Nama_Perusahaan` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Alamat` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`Kode_Supplier`, `Nama_Perusahaan`, `Alamat`, `no_telp`) VALUES
(1, 'Toko Besi Mega Baja Cikarang ', 'Suraresmi, Cikarang Sel., Kab. Bekasi, Jawa Barat', '082614388190'),
(2, 'Cv. Multi Baja Prima Usaha', 'Jl. Tegal Danas No.75, Sertajaya, Kec. Cikarang Ti', '088769005212'),
(3, 'MEGA BAJA DELTA MAS', 'Jl. Tegal Danas No.30, RT.002/RW.003, Hegarmukti, ', '087237579021'),
(4, 'Toko Besi Tri Baja Pratama', 'Jl. Raya Industri Kampung Sempur, Pasirgombong, Ke', '088752728901'),
(5, 'TOKO BESI SAMUDRA STEEL', 'Jl. KH. Fudholi No.8, Karangasih, Kec. Cikarang Ut', '081134562132'),
(6, 'TOKO BESI UTAMA STEEL CIKARANG', 'Jl. Pilar Sukatani, Jl. Wr. Pojok No.Kp, Sukaraya,', '082222416289'),
(7, 'PT Mandiri Jaya Tamasukses', 'Graha Asri, jl. cimandiri raya T6. No. 2 - 12, Jat', '(021)8009671'),
(8, 'PT. SUMBER ANUGRAH TEKNIK', 'Sertajaya, Kec. Cikarang Tim., Kabupaten Bekasi, J', '(021)3400212'),
(9, 'COMET CG 805 BK', 'Jl. Cimanadiri 5 V6/20, Jatireja, Kec. Cikarang Ti', '085554371278'),
(10, 'PT. Daiyo Multi Fastech', 'Ruko Kusuka, Jl. Raya Cikarang Cibarusah, Blok I/F', '(021)4580096'),
(11, 'Toko besi setia baja', 'Q38J+MW4, Kp, Jl. Buwek Raya, RT.1/RW.022, Sumberj', '082356172379'),
(12, 'Comet', 'Jl. Raya Cibarusah, Cikarang', '082238910922'),
(13, 'GJP', 'Jl. Muhammad Haji Tamrin, Cikarang Selatan', '081799820818'),
(14, 'Kharisma Inti Baja', 'Jl. KH Maimun Nawawi, Cibarusah-Mekarmuti', '085689392081'),
(15, 'JIT', 'Jl. KH. Noer Ali No 62, Bekasi', '083266878192'),
(16, 'Internal', 'Jalan Candi Baru, Semarang', '082235654982'),
(17, 'AAT', 'Jl. A. Yani No. 32, Semarang', '083265218239'),
(18, 'Laksana JaYa', 'Jl. KH Abdullah Bin Nuh, Bekasi', '089436672801'),
(19, 'HMS', 'Jl. Jababeka Raya Blok O, Cikarang Utara', '081345621578'),
(20, 'Lazuardi', 'Jl. Kruing 3 No. 7, Sukaresmi, Cikarang Selatan', '085555129881'),
(21, 'Gearindo', 'Jl. Arif rahman Hakim No.97-9 Cikarang', '082888901000'),
(22, 'Global Mandiri', 'Jl. Industri Utama Blok RR-10, Pasirsari, Cikarang', '082225688822'),
(23, 'Graha Logam', 'Jl. Kaligawe KM.3 No.46, Semarang', '081556288900'),
(24, 'OMAN', 'Jl. Majapahit No.466, Semarang', '081111678901'),
(25, 'Sugimoto Precision', 'Jl. Singosari II No.23, Semarang', '083880214355');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_sumber` (`id_sumber`),
  ADD KEY `id_customer` (`id_customer`) USING BTREE;

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_sumber` (`id_sumber`),
  ADD KEY `id_supplier` (`id_supplier`) USING BTREE;

--
-- Indeks untuk tabel `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Kode_Supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12145;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT untuk tabel `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id_sumber` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Kode_Supplier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12159;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `pemasukan_ibfk_2` FOREIGN KEY (`id_sumber`) REFERENCES `sumber` (`id_sumber`),
  ADD CONSTRAINT `pemasukan_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Ketidakleluasaan untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`id_sumber`) REFERENCES `sumber` (`id_sumber`),
  ADD CONSTRAINT `pengeluaran_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`Kode_Supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
