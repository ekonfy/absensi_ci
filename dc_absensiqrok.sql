-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2024 pada 00.48
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dc_absensiqrok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_siswa`
--

CREATE TABLE `login_siswa` (
  `id` int(11) NOT NULL,
  `nis_siswa` varchar(110) NOT NULL,
  `email` varchar(110) NOT NULL,
  `password` varchar(110) NOT NULL,
  `is_active` int(11) NOT NULL,
  `kode_unik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `login_siswa`
--

INSERT INTO `login_siswa` (`id`, `nis_siswa`, `email`, `password`, `is_active`, `kode_unik`) VALUES
(218, '1122334455', 'demo@gmail.com', '$2y$10$0irnwpolmdFy9zKuDAYTKeYf18AKz3J40qcu1k6/WE/L1229VGO32', 1, '601');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_api`
--

CREATE TABLE `tabel_api` (
  `id_api` int(11) NOT NULL,
  `api_key` varchar(200) NOT NULL,
  `sender` varchar(150) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_api`
--

INSERT INTO `tabel_api` (`id_api`, `api_key`, `sender`, `url`) VALUES
(1, 'TAbeLklG1H5OdDM3f0lGnc0OzVrjIL', '62895344465335', 'https://wa.inisekolahku.my.id/send-message');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_detail_absen`
--

CREATE TABLE `tabel_detail_absen` (
  `id_detail` int(11) NOT NULL,
  `jam_absen` timestamp NOT NULL DEFAULT current_timestamp(),
  `jam_pulang` datetime DEFAULT NULL,
  `tanggal_absen` date DEFAULT NULL,
  `nis` varchar(12) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `kode_kelas` int(11) NOT NULL,
  `kode_jurusan` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tabel_detail_absen`
--

INSERT INTO `tabel_detail_absen` (`id_detail`, `jam_absen`, `jam_pulang`, `tanggal_absen`, `nis`, `keterangan`, `kode_kelas`, `kode_jurusan`, `masuk`, `keluar`) VALUES
(1, '2024-06-28 03:18:24', '2024-06-28 10:18:43', '2024-06-28', '8982334050', 'h', 4, 2, 1, 1),
(2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-06-30', '8982334050', 'i', 4, 2, 1, 1),
(3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-07-16', '0895344465', 'i', 2, 3, 1, 1),
(4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-07-17', '0895344465', 's', 2, 3, 1, 1),
(5, '2024-07-17 13:49:54', '2024-07-17 20:50:30', '2024-07-17', '1122334455', 'h', 2, 0, 1, 1),
(6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-07-18', '1122334455', 's', 2, 0, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_detail_absen_ok`
--

CREATE TABLE `tabel_detail_absen_ok` (
  `id_detail` int(11) NOT NULL,
  `jam_absen` time DEFAULT NULL,
  `tanggal_absen` date DEFAULT NULL,
  `nis` varchar(12) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `kode_kelas` int(11) NOT NULL,
  `kode_jurusan` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tabel_detail_absen_ok`
--

INSERT INTO `tabel_detail_absen_ok` (`id_detail`, `jam_absen`, `tanggal_absen`, `nis`, `keterangan`, `kode_kelas`, `kode_jurusan`, `masuk`, `keluar`) VALUES
(5, NULL, '2024-06-28', '8982334050', 'h', 4, 2, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_detail_absen_old`
--

CREATE TABLE `tabel_detail_absen_old` (
  `id_detail` int(11) NOT NULL,
  `jam_absen` time DEFAULT NULL,
  `tanggal_absen` date DEFAULT NULL,
  `nis` varchar(12) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `kode_kelas` int(11) NOT NULL,
  `kode_jurusan` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tabel_detail_absen_old`
--

INSERT INTO `tabel_detail_absen_old` (`id_detail`, `jam_absen`, `tanggal_absen`, `nis`, `keterangan`, `kode_kelas`, `kode_jurusan`, `masuk`, `keluar`) VALUES
(1, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(2, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(3, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(4, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(5, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(6, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(7, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(8, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(9, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(10, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(11, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(12, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(13, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(14, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(15, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(16, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(17, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(18, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(19, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(20, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(21, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(22, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(23, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(24, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(25, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(26, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(27, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(28, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(29, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(30, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(31, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(32, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(33, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(34, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(35, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(36, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(37, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(38, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(39, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(40, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(41, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(42, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(43, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(44, '00:00:00', '2021-10-04', '7976458004', 'i', 2, 2, 1, 1),
(45, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(46, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(47, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(48, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(49, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(50, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(51, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(52, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(53, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(54, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(55, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(56, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(57, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(58, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(59, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(60, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(61, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(62, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(63, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(64, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(65, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(66, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(67, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(68, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(69, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(70, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(71, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(72, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(73, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(74, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(75, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(76, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(77, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(78, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(79, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(80, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(81, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(82, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(83, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(84, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(85, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(86, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(87, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(88, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(89, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(90, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(91, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(92, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(93, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(94, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(95, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(96, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(97, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(98, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(99, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(100, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(101, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(102, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(103, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(104, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(105, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(106, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(107, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(108, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(109, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(110, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(111, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(112, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(113, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(114, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(115, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(116, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(117, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(118, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(119, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(120, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(121, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(122, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(123, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(124, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(125, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(126, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(127, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(128, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(129, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(130, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(131, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(132, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(133, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(134, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(135, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(136, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(137, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(138, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(139, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(140, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(141, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(142, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(143, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(144, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(145, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(146, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(147, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(148, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(149, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(150, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(151, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(152, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(153, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(154, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(155, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(156, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(157, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(158, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(159, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(160, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(161, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(162, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(163, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(164, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(165, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(166, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(167, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(168, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(169, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(170, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(171, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(172, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(173, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(174, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(175, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(176, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(177, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(178, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(179, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(180, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(181, '00:00:00', '2021-10-05', '9282126454', 'h', 2, 2, 1, 1),
(182, '13:34:50', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(183, '13:34:51', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(184, '13:34:51', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(185, '13:34:51', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(186, '13:34:51', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(187, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(188, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(189, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(190, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(191, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(192, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(193, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(194, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(195, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(196, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(197, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(198, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(199, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(200, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(201, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(202, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(203, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(204, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(205, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(206, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(207, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(208, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(209, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(210, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(211, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(212, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(213, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(214, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(215, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(216, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(217, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(218, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(219, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(220, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(221, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(222, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(223, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(224, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(225, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(226, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(227, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(228, '13:34:52', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(229, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(230, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(231, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(232, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(233, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(234, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(235, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(236, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(237, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(238, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(239, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(240, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(241, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(242, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(243, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(244, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(245, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(246, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(247, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(248, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(249, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(250, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(251, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(252, '13:34:53', '2021-10-05', '3136638035', 'h', 4, 3, 1, 0),
(253, '00:00:00', '2021-10-05', '6371159235', 'h', 2, 2, 1, 1),
(254, '00:00:00', '2021-10-05', '8578418391', 'h', 2, 2, 1, 1),
(255, '00:00:00', '2021-10-05', '8933993858', 'h', 2, 2, 1, 1),
(256, '00:00:00', '2021-10-05', '4563389833', 'h', 2, 2, 1, 1),
(257, '00:00:00', '2021-10-05', '9171170901', 'h', 2, 2, 1, 1),
(258, '00:00:00', '2021-10-05', '4543686319', 'h', 2, 2, 1, 1),
(259, '00:00:00', '2021-10-05', '3985538285', 'h', 2, 2, 1, 1),
(260, '00:00:00', '2021-10-05', '2395813052', 'h', 2, 2, 1, 1),
(261, '06:44:25', '2024-06-28', '4977568152', 's', 2, 3, 1, 1),
(262, '06:48:03', '2024-06-28', '4977568152', 's', 2, 3, 1, 1),
(263, '07:39:45', '2024-06-28', '4977568152', 's', 2, 3, 1, 1),
(264, '07:45:11', '2024-06-28', '4977568152', 's', 2, 3, 1, 1),
(265, '07:53:54', '2024-06-28', '4977568152', 's', 2, 3, 1, 1),
(266, '08:01:19', '2024-06-28', '8982334050', 's', 4, 2, 1, 1),
(267, '08:37:48', '2024-06-29', '8982334050', 's', 4, 2, 1, 1),
(268, '09:01:55', '2024-06-28', '4977568152', 's', 2, 3, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_izin`
--

CREATE TABLE `tabel_izin` (
  `id` int(11) NOT NULL,
  `nis_siswa` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `file_bukti` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal_izin` date NOT NULL,
  `status` enum('Diterima','Ditolak','Menunggu Konfirmasi') NOT NULL,
  `pemberi_izin` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tabel_izin`
--

INSERT INTO `tabel_izin` (`id`, `nis_siswa`, `type`, `file_bukti`, `keterangan`, `tanggal_izin`, `status`, `pemberi_izin`) VALUES
(1, '4977568152', 'Sakit', 'izin-4977568152-2024-06-28.jpg', '4977568152 49775681524977568152497756815249775681524977568152', '2024-06-28', 'Diterima', ''),
(2, '8982334050', 'Sakit', 'izin-8982334050-2024-06-28.jpg', 'asForm Permintaan Tidak MasukForm Permintaan Tidak MasukForm Permintaan Tidak MasukForm Permintaan T', '2024-06-28', 'Diterima', ''),
(3, '8982334050', 'Sakit', 'izin-8982334050-2024-06-28.jpg', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2024-06-29', 'Diterima', ''),
(4, '8982334050', 'Izin', 'izin-8982334050-2024-06-28.jpg', 'asasassasa', '2024-06-30', 'Diterima', ''),
(5, '0895344465', 'Izin', 'izin-0895344465-2024-07-16.jpg', 'aaaaaaaaaaaaaaaaaaaaa', '2024-07-16', 'Diterima', ''),
(6, '0895344465', 'Sakit', 'izin-0895344465-2024-07-16.jpg', 'aaaaaaaaaaaaaaaaaaaaaaa', '2024-07-17', 'Diterima', ''),
(7, '1122334455', 'Sakit', 'izin-1122334455-2024-07-17.jpg', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2024-07-18', 'Diterima', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jam_absen`
--

CREATE TABLE `tabel_jam_absen` (
  `id` int(11) NOT NULL,
  `type` enum('Masuk','Keluar','Terlambat') NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tabel_jam_absen`
--

INSERT INTO `tabel_jam_absen` (`id`, `type`, `mulai`, `selesai`) VALUES
(1, 'Masuk', '00:07:00', '10:11:00'),
(2, 'Keluar', '08:11:00', '23:50:00'),
(3, 'Terlambat', '12:20:00', '19:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jurusan`
--

CREATE TABLE `tabel_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tabel_jurusan`
--

INSERT INTO `tabel_jurusan` (`id_jurusan`, `jurusan`) VALUES
(0, 'agama'),
(2, 'IPA'),
(3, 'IPS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kelas`
--

CREATE TABLE `tabel_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tabel_kelas`
--

INSERT INTO `tabel_kelas` (`id_kelas`, `nama_kelas`, `kelas`) VALUES
(1, 'Sjsks', 'Dhxnd'),
(2, 'no name', 'X'),
(3, 'no name2', 'XI'),
(4, 'No name3', 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_libur`
--

CREATE TABLE `tabel_libur` (
  `id` int(11) NOT NULL,
  `type` enum('weekend','other') NOT NULL,
  `tanggal` varchar(110) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tabel_libur`
--

INSERT INTO `tabel_libur` (`id`, `type`, `tanggal`, `keterangan`, `status`) VALUES
(0, 'other', '2021-10-06', 'sdasdsadsadsa', 'Aktif'),
(1, 'weekend', '2021-09-30', 'sabtu', 'Aktif'),
(2, 'weekend', '2021-09-16', 'minggu', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_siswa`
--

CREATE TABLE `tabel_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` text DEFAULT NULL,
  `nis` varchar(12) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` text DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `kode_jurusan` varchar(15) DEFAULT NULL,
  `kode_kelas` varchar(15) DEFAULT NULL,
  `gambar` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tabel_siswa`
--

INSERT INTO `tabel_siswa` (`id_siswa`, `nama_siswa`, `nis`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_telepon`, `kode_jurusan`, `kode_kelas`, `gambar`) VALUES
(10001, 'AA', '911123', '2002-01-20', 'Laki - Laki', 'sidoarj122', '858548414519', '3', '3', 'default.jpg'),
(10002, 'II', '911124', '2003-01-21', 'Laki - Laki', 'sidoarj123', '858548414520', '3', '3', 'default.jpg'),
(10003, 'UU', '911125', '2004-02-22', 'Prempuan', 'sidoarj124', '858548414521', '3', '3', 'default.jpg'),
(10004, 'OO', '911126', '2004-02-22', 'Prempuan', 'sidoarj124', '858548414522', '3', '3', 'default.jpg'),
(10005, 'DD', '911127', '2004-02-22', 'Prempuan', 'sidoarj124', '858548414523', '3', '3', 'default.jpg'),
(10006, 'DII', '911128', '2004-02-22', 'Prempuan', 'sidoarj124', '858548414524', '3', '3', 'default.jpg'),
(10007, 'DUU', '911129', '2004-02-22', 'Prempuan', 'sidoarj124', '858548414525', '3', '3', 'default.jpg'),
(10008, 'Digital Center', '1122334455', '2024-07-17', 'L', 'aaaaaasasasasa', '62895344465335', 'default', '2', 'asas1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `kode_unik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id`, `name`, `email`, `password`, `image`, `role_id`, `is_active`, `date_create`, `kode_unik`) VALUES
(3, 'Helmi Tazkia', 'admin@gmail.com', '$2y$10$wDD5uGospbApgEEiY0H28uWC41JbTy9lJqbtjs61deXAcxbFzomLm', 'kepala_dinas.jpg', 1, 1, '2021-09-29', ''),
(4, 'Asep', 'petugas@gmail.com', '$2y$10$qKYucn4Wv0KscP8EGUn22u36BBab0.w1ctpe5ACaMzFqmbxN.xD16', 'default.jpg', 2, 1, '2021-10-01', ''),
(5, 'Fauzan', 'guru@gmail.com', '$2y$10$EZjR6E1cKeT8WxWEEHQusegSUgvR38tom5YN3OfJM/Y/GWtqMXxu.', 'default.jpg', 3, 1, '2021-10-02', 'nmKrj^eZPzVaM&F&up&J'),
(8, 'akunku', 'akun@gmail.com', '$2y$10$9EbOK2K2oPwic9CciUZvRu3dv30GYAgU90snzyuYNcte4vOfMfhjy', 'default.Jpg', 2, 0, '2023-05-27', '&%Rt$adf^i*YHwGkI^g*'),
(9, 'andilau', 'andilau@gmail.com', '$2y$10$khvCXQZomq8.0jRML4h/zOwfff24TYuwX728eVfLHK3rTe53351mm', 'default.Jpg', 2, 0, '2023-05-27', 'kDT^SIGVstBHdl%J^**f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user_role`
--

CREATE TABLE `tabel_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tabel_user_role`
--

INSERT INTO `tabel_user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Wali Kelas'),
(3, 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(9, 1, 5),
(10, 1, 4),
(11, 2, 2),
(12, 2, 3),
(13, 3, 3),
(14, 2, 4),
(15, 3, 4),
(16, 3, 5),
(17, 2, 5),
(20, 1, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_submenu`
--

CREATE TABLE `user_access_submenu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_access_submenu`
--

INSERT INTO `user_access_submenu` (`id`, `role_id`, `submenu_id`) VALUES
(1, 1, 30),
(2, 1, 36),
(3, 1, 1),
(4, 1, 3),
(5, 1, 39),
(6, 1, 41),
(7, 1, 6),
(8, 1, 37),
(9, 1, 43),
(10, 1, 44),
(11, 1, 4),
(12, 1, 46),
(13, 1, 47),
(14, 2, 3),
(15, 2, 39),
(16, 2, 41),
(17, 3, 3),
(18, 3, 39),
(19, 2, 43),
(20, 3, 6),
(21, 2, 6),
(22, 2, 44),
(23, 3, 44),
(24, 2, 47),
(25, 3, 47),
(26, 1, 49);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`) VALUES
(2, 'Kelola Menu', 'flaticon-381-controls-3'),
(3, 'Kelola Absensi', 'flaticon-381-calendar-5'),
(4, 'Siswa', 'flaticon-381-user-8'),
(5, 'Users', 'flaticon-381-user'),
(6, 'Api Config', 'flaticon-381-user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `url` text NOT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `is_active`) VALUES
(1, 3, 'Atur libur', 'absen/libur', 1),
(3, 3, 'Data Absensi', 'absen', 1),
(4, 5, 'Data User', 'user', 1),
(6, 4, 'Data seluruh siswa', 'siswa', 1),
(30, 2, 'Acces User', 'Menu/Access', 1),
(36, 2, 'Menu', 'menu/management', 1),
(37, 4, 'Kelas & Jurusan', 'siswa/kelas', 1),
(39, 3, 'Rekap Absen', 'absen/rekap', 1),
(41, 3, 'Jam absen', 'absen/jam', 1),
(43, 4, 'Siswa per kelas', 'siswa/daftar_kelas', 1),
(44, 4, 'Data Izin', 'izin', 1),
(45, 1, 'Data ', 'Admin', 1),
(46, 2, 'Sub menu', 'menu/submanagement', 1),
(47, 5, 'Data User Siswa', 'user/user_siswa', 1),
(49, 6, 'API Config', 'api/apimanagement', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login_siswa`
--
ALTER TABLE `login_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_detail_absen`
--
ALTER TABLE `tabel_detail_absen`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tabel_detail_absen_ok`
--
ALTER TABLE `tabel_detail_absen_ok`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tabel_detail_absen_old`
--
ALTER TABLE `tabel_detail_absen_old`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tabel_izin`
--
ALTER TABLE `tabel_izin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_jam_absen`
--
ALTER TABLE `tabel_jam_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_jurusan`
--
ALTER TABLE `tabel_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tabel_libur`
--
ALTER TABLE `tabel_libur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_user_role`
--
ALTER TABLE `tabel_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login_siswa`
--
ALTER TABLE `login_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT untuk tabel `tabel_detail_absen`
--
ALTER TABLE `tabel_detail_absen`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tabel_detail_absen_ok`
--
ALTER TABLE `tabel_detail_absen_ok`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tabel_detail_absen_old`
--
ALTER TABLE `tabel_detail_absen_old`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT untuk tabel `tabel_izin`
--
ALTER TABLE `tabel_izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10009;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
