-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2020 at 10:19 AM
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
(1, 'SELEKSI MAHASISWA BARU STMIK INDONESIA', 'STMIK Indonesia Padang melakukan seleksi mahasiswa baru tahun ajaran 2020/2021 jalur beasiswa Hafizh Qurâ€™an. STMIK Indonesia memberikan beasiswa kepada mahasiswa di antaranya beasiswa Hafizh Qurâ€™an, Bidikmisi, PPA, Bank Nagari,serta prestasi akademik dan non akademik. Sa', '2020-07-09', '923220ab478374d13a9fd3ef28acf88d.jpg'),
(2, 'WEBINAR NASIONAL STMIK INDONESIA PADANG', 'STMIK Indonesia Padang hadir memberikan sharing ilmu dalam kegiatan seminar nasional secara online pada hari/tanggal Sabtu/ 27 Juni 2020, pukul 09.00 - selesai dengan tema â€œProspek dan peluang kerja lulusan IT di Era New Normal Covid-19.â€  WEBINAR ini bertuj', '2020-06-23', '04dde6e541c347544ff300d8fee89528.jpg'),
(3, 'ACARA WEBINAR NASIONAL STMIK INDONESIA PADANG', 'Sabtu, 27 Juni 2020. STMIK Indonesia Padang mengadakan acara webinar nasional yang bertemakan \"Prospek dan Peluang Kerja Lulusan IT di Era New Normal Covid19\". . . Acara ini berlangsung dari pukul 09.00 wib, yang ditayangkan langsung lewat media Zoom dan Youtube.', '2020-06-29', '4d74e0a956be4b26a87b4c4d3bc5e6ed.jpg');

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
(15, 10, '3', '75', '1', '3', '3', '2020-09-06 15:30:47');

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
(94, 7, 3.7, '2020-09-07 13:20:04'),
(95, 8, 3.25, '2020-09-07 13:20:04'),
(96, 9, 3.3, '2020-09-07 13:20:04'),
(97, 10, 2.7, '2020-09-07 13:20:04');

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
(10, '004', 'syahrul', 'Laki-Laki', 'jln. raja di laut', '0987723232', 'XI', 'sistem informasi');

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
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
