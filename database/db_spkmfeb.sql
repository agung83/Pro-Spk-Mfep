-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 04:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spkmfeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(55) NOT NULL,
  `admin_username` varchar(55) NOT NULL,
  `admin_password` varchar(55) NOT NULL,
  `admin_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(7, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ronaldo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `berita_id` int(11) NOT NULL,
  `berita_judul` varchar(100) NOT NULL,
  `berita_isi` text NOT NULL,
  `berita_tgl` date NOT NULL,
  `berita_gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`berita_id`, `berita_judul`, `berita_isi`, `berita_tgl`, `berita_gambar`) VALUES
(4, 'Wajah baru SMKN1 kinali', 'Karna berahir nya masa jabatan beberapa orang wakil kepala sekolah dan ketua jurusan karna itu telah dilakukan pemeilihan wakil dan ketua jurusan baru . setelah melewati proses pemilihan secara demokrasi ahirnya lahir bebrapa wajah baru untuk mengisi posisi wakil dan ketua jurusan yang baru.', '2020-01-16', 'WhatsApp-Image-2020-01-21-at-17.18.39-768x355.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria_nama` varchar(100) NOT NULL,
  `kriteria_bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`kriteria_id`, `kriteria_nama`, `kriteria_bobot`) VALUES
(1, 'Nilai Rata - Rata', 0.25),
(2, 'Kehadiran', 0.15),
(3, 'Penghasilan Orang Tua', 0.3),
(4, 'Tanggungan Orang Tua', 0.3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `nilai_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `nilai_rata` varchar(100) NOT NULL,
  `nilai_rata_asli` varchar(100) NOT NULL,
  `nilai_kehadiran` varchar(100) NOT NULL,
  `nilai_penghasilan_ortu` varchar(100) NOT NULL,
  `nilai_tanggungan` varchar(100) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`nilai_id`, `siswa_id`, `nilai_rata`, `nilai_rata_asli`, `nilai_kehadiran`, `nilai_penghasilan_ortu`, `nilai_tanggungan`, `tgl_input`) VALUES
(12, 7, '4', '83', '4', '3', '4', '2020-09-06 15:29:10'),
(13, 8, '4', '93', '3', '3', '3', '2020-09-06 15:29:44'),
(14, 9, '3', '80', '3', '3', '4', '2020-09-06 15:30:13'),
(15, 10, '3', '75', '1', '3', '3', '2020-09-06 15:30:47'),
(16, 12, '3', '80', '1', '1', '1', '2020-09-16 12:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rank`
--

CREATE TABLE `tbl_rank` (
  `rank_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `nilai_ev` float NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rank`
--

INSERT INTO `tbl_rank` (`rank_id`, `siswa_id`, `nilai_ev`, `tgl_input`) VALUES
(116, 7, 3.7, '2020-09-16 14:00:34'),
(117, 8, 3.25, '2020-09-16 14:00:34'),
(118, 9, 3.3, '2020-09-16 14:00:35'),
(119, 10, 2.7, '2020-09-16 14:00:35'),
(120, 12, 1.5, '2020-09-16 14:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `siswa_id` int(11) NOT NULL,
  `siswa_nis` varchar(100) NOT NULL,
  `siswa_nama` varchar(100) NOT NULL,
  `siswa_jk` varchar(100) NOT NULL,
  `siswa_alamat` text NOT NULL,
  `siswa_nohp` varchar(100) NOT NULL,
  `siswa_kelas` varchar(100) NOT NULL,
  `siswa_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`siswa_id`, `siswa_nis`, `siswa_nama`, `siswa_jk`, `siswa_alamat`, `siswa_nohp`, `siswa_kelas`, `siswa_jurusan`) VALUES
(7, '001', 'agung laksmana', 'Laki-Laki', 'jln. batusangka NO8', '0823424232', 'X', 'RPL'),
(8, '002', 'gema', 'Laki-Laki', 'jln. pasaman', '0897323433232', 'XII', 'rpl'),
(9, '003', 'putra', 'Laki-Laki', 'jln. pasaman barat', '0823424232', 'X', 'tkj'),
(10, '004', 'syahrul', 'Laki-Laki', 'jln. raja di laut', '0987723232', 'XI', 'sistem informasi'),
(12, '005', 'iis', 'Perempuan', 'jln. lkkass', '08232422', 'XII', 'rpl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`berita_id`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indexes for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
