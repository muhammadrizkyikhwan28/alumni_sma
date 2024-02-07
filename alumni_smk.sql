-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2023 pada 19.14
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_smk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(11) NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `telp_adm` varchar(15) NOT NULL,
  `user_adm` varchar(50) NOT NULL,
  `pass_adm` varchar(100) NOT NULL,
  `foto_adm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_adm`, `nama_adm`, `telp_adm`, `user_adm`, `pass_adm`, `foto_adm`) VALUES
(1, 'Administrator', '08962878534', 'admin', 'admin', 'foto1u.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_thn` varchar(11) NOT NULL,
  `univer` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `alumni_kelas` varchar(200) NOT NULL,
  `prestasi` varchar(200) NOT NULL,
  `jurusan` varchar(200) NOT NULL,
  `alkerja` varchar(200) NOT NULL,
  `ig` varchar(200) NOT NULL,
  `fb` varchar(200) NOT NULL,
  `sosmed` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`nis`, `nama`, `id_thn`, `univer`, `tgl_lahir`, `no_wa`, `pekerjaan`, `alamat`, `foto`, `alumni_kelas`, `prestasi`, `jurusan`, `alkerja`, `ig`, `fb`, `sosmed`) VALUES
('01', 'qwerty', '3', 'asd', '2023-11-29', '132', 'ads', 'asd', '8.jpg', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd'),
('02', 'qw', '3', 'qw', '2023-12-06', '12', 'qw', 'qw', '6315931aae469-6549a41bee794a6261658402.jpg', 'wq', 'qw', 'qwq', 'wq', 'qw', 'qw', 'qw'),
('123213', 'qweqwe', '3', 'qweqwe', '2023-11-15', '0821312314131', 'qweqe', 'asdasdsad', 'bm.jpg', 'asdasda', 'asdasda', 'asdasd', 'asdsada', 'asdasd', 'asdasd', 'asdasda'),
('5234', 'kelvin', '3', 'fsfs', '0000-00-00', '086755433345', 'Pelajar', 'bjb', '', 'dfsdfs', 'adsasda', 'asdas', 'sdfsfs', 'dasd', 'asda', 'asdas'),
('5627389', 'kelvin', '3', 'fsfs', '2023-11-22', '08566655445', 'Pelajar', 'bjb', '', 'asdasd', 'adsasda', 'asdas', 'rsddd', 'fsdfs', 'fsdfs', 'asdas'),
('6574', 'coba salah', '3', 'asdas', '0000-00-00', '085434253142', 'sdfsdf', 'bjb', '', 'asdad', '', 'fsdf', 'rsddd', 'fsdfs', 'ada', 'asdas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `tgl_event` date NOT NULL,
  `tempat_event` varchar(50) NOT NULL,
  `waktu_event` varchar(20) NOT NULL,
  `batas_daftar` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `tgl_event`, `tempat_event`, `waktu_event`, `batas_daftar`, `keterangan`, `status`, `id_adm`) VALUES
(1, 'Reuni Akbar', '2019-05-20', 'Sekolah', '08:00', '2019-06-20', 'Reuni Akbar', 'Open', 1),
(3, 'Test Event', '2019-06-20', 'SMK BM2', '09:00', '2019-06-20', 'Test Event', 'Open', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `id_thn` int(11) NOT NULL,
  `nama_thn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`id_thn`, `nama_thn`) VALUES
(3, '2009/2010'),
(4, '2011/2012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_event`
--

CREATE TABLE `temp_event` (
  `id_temp` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `temp_event`
--

INSERT INTO `temp_event` (`id_temp`, `id_event`, `nis`) VALUES
(1, 1, '12345'),
(2, 1, '1111');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_thn`);

--
-- Indeks untuk tabel `temp_event`
--
ALTER TABLE `temp_event`
  ADD PRIMARY KEY (`id_temp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_thn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `temp_event`
--
ALTER TABLE `temp_event`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
