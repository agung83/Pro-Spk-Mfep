-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2020 pada 10.04
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(55) NOT NULL,
  `admin_username` varchar(55) NOT NULL,
  `admin_password` varchar(55) NOT NULL,
  `admin_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(7, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ronaldo.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria_nama` varchar(100) NOT NULL,
  `kriteria_bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`kriteria_id`, `kriteria_nama`, `kriteria_bobot`) VALUES
(1, 'Nilai Rata - Rata', 0.25),
(2, 'Kehadiran', 0.15),
(3, 'Penghasilan Orang Tua', 0.3),
(4, 'Tanggungan Orang Tua', 0.3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penilaian`
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
-- Dumping data untuk tabel `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`nilai_id`, `siswa_id`, `nilai_rata`, `nilai_rata_asli`, `nilai_kehadiran`, `nilai_penghasilan_ortu`, `nilai_tanggungan`, `tgl_input`) VALUES
(7, 3, '3', '73', '3', '2', '2', '2020-09-06 06:44:31'),
(8, 1, '3', '75', '4', '1', '1', '2020-09-06 06:49:37'),
(9, 4, '3', '80', '3', '2', '3', '2020-09-06 07:04:25'),
(10, 5, '4', '95', '1', '1', '3', '2020-09-06 07:04:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rank`
--

CREATE TABLE `tbl_rank` (
  `rank_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `nilai_ev` float NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rank`
--

INSERT INTO `tbl_rank` (`rank_id`, `siswa_id`, `nilai_ev`, `tgl_input`) VALUES
(49, 1, 1.95, '2020-09-06 08:01:01'),
(50, 3, 2.4, '2020-09-06 08:01:01'),
(51, 4, 2.7, '2020-09-06 08:01:01'),
(52, 5, 2.35, '2020-09-06 08:01:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
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
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`siswa_id`, `siswa_nis`, `siswa_nama`, `siswa_jk`, `siswa_alamat`, `siswa_nohp`, `siswa_kelas`, `siswa_jurusan`) VALUES
(1, '123', 'asd', 'laki laki', 'padang', '08123', 'X', 'TKJ'),
(3, 'Ut nostrum beatae ni', 'Laboriosam reprehen', 'Perempuan', 'Qui unde delectus c', '74', 'X', 'Est quos ut ex cum n'),
(4, '001', 'Putra Evans', 'Laki-Laki', 'padang', '123', 'XI', 'Perkantoran'),
(5, '002', 'lee gung', 'Laki-Laki', 'padang', '123', 'XII', 'Perhotelan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indeks untuk tabel `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indeks untuk tabel `tbl_rank`
--
ALTER TABLE `tbl_rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_rank`
--
ALTER TABLE `tbl_rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
