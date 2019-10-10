-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Okt 2019 pada 05.11
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_golongan`
--

CREATE TABLE `m_golongan` (
  `id_gol` int(11) NOT NULL,
  `golongan` varchar(200) NOT NULL,
  `pangkat` varchar(200) NOT NULL,
  `grup` varchar(200) NOT NULL,
  `wil1` decimal(50,0) NOT NULL,
  `wil2` decimal(50,0) NOT NULL,
  `wil3` decimal(50,0) NOT NULL,
  `harian_luar` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_golongan`
--

INSERT INTO `m_golongan` (`id_gol`, `golongan`, `pangkat`, `grup`, `wil1`, `wil2`, `wil3`, `harian_luar`) VALUES
(1, 'I/a', 'Juru Muda', 'I', '0', '0', '0', '0'),
(2, 'I/b', 'Juru Muda Tingkat 1', 'I', '0', '0', '0', '0'),
(3, 'I/c', 'Juru', 'I', '0', '0', '0', '0'),
(4, 'I/d', 'Juru Tingkat 1', 'II', '0', '0', '0', '0'),
(5, 'II/a', 'Pengatur Muda', 'II', '0', '0', '0', '0'),
(6, 'II/b', 'Pengatur Muda Tingkat 1', 'II', '0', '0', '0', '0'),
(7, 'II/c', 'Pengatur', 'II', '0', '0', '0', '0'),
(8, 'II/d', 'Pengatur Tingkat 1', 'II', '0', '0', '0', '0'),
(9, 'III/a', 'Penata Muda', 'III', '0', '0', '0', '0'),
(10, 'III/b', 'Penata Muda Tingkat 1', 'III', '0', '0', '0', '0'),
(11, 'III/c', 'Penata', 'III', '0', '0', '0', '0'),
(12, 'III/d', 'Penata Tingkat 1', 'III', '0', '0', '0', '0'),
(13, 'IV/a', 'Pembina', 'IV', '0', '0', '0', '0'),
(14, 'IV/b', 'Pembina Tingkat 1', 'IV', '0', '0', '0', '0'),
(15, 'IV/c', 'Pembina Utama Muda', 'IV', '0', '0', '0', '0'),
(16, 'IV/d', 'Pembina Utama Madya', 'IV', '0', '0', '0', '0'),
(17, 'IV/e', 'Pembina Utama', 'IV', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jabatan`
--

CREATE TABLE `m_jabatan` (
  `id_jab` int(11) NOT NULL,
  `nama_jabatan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_jabatan`
--

INSERT INTO `m_jabatan` (`id_jab`, `nama_jabatan`) VALUES
(1, 'Kepala Dinas'),
(2, 'Sekretaris'),
(3, 'Kasubag Program dan Aset'),
(4, 'Kasubag Umum'),
(5, 'Kepala Bidang Bina Marga'),
(6, 'Kepala Bidang Cipta Karya'),
(7, 'Kepala Bidang PSDA'),
(8, 'Kepala Bidang Tataruang'),
(9, 'KUPT Peralatan Dan Mesin'),
(10, 'KUPT Wilayah I'),
(11, 'KUPT Wilayah II'),
(12, 'KUPT Wilayah III'),
(13, 'KUPT Wilayah IV'),
(14, 'Sopir Kadis PUPR'),
(15, 'Staf keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pegawai`
--

CREATE TABLE `m_pegawai` (
  `id_peg` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `nip` varchar(500) NOT NULL,
  `jabatan` text NOT NULL,
  `golongan` varchar(300) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pegawai`
--

INSERT INTO `m_pegawai` (`id_peg`, `nama`, `nip`, `jabatan`, `golongan`, `tahun`) VALUES
(1, 'HENNY FERNIZA, ST. MT', '1981102 2200604 2 007', 'Kepala Dinas', 'Pembina IV/a', 2019),
(5, 'MUHAMMAD HORNAS, SH', '', 'Sopir Kadis PUPR', 'PTT', 2019),
(6, 'REFYANDRA, S. Kom', '', 'Staf keuangan', 'THL', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_trasportsasi`
--

CREATE TABLE `m_trasportsasi` (
  `id_tran` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL COMMENT 'nama/merek',
  `nomor` varchar(100) NOT NULL COMMENT 'plat nomor',
  `jenis` varchar(100) NOT NULL COMMENT 'darat, laut',
  `roda` int(11) NOT NULL COMMENT '2,4',
  `cc` int(11) NOT NULL COMMENT 'cc kendaraan',
  `wil1` decimal(50,0) NOT NULL COMMENT 'rp',
  `wil2` decimal(50,0) NOT NULL COMMENT 'rp',
  `wil3` decimal(50,0) NOT NULL COMMENT 'rp',
  `perjalanan` set('','Darat','Udara','Laut') NOT NULL COMMENT 'Darat,Udara,Laut'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_trasportsasi`
--

INSERT INTO `m_trasportsasi` (`id_tran`, `nama`, `nomor`, `jenis`, `roda`, `cc`, `wil1`, `wil2`, `wil3`, `perjalanan`) VALUES
(1, 'Rush', 'BA  8036 S', 'darat', 4, 1500, '150000', '180000', '185000', ''),
(5, 'Rush 2', 'BA  xxxx S', 'darat', 4, 1500, '150000', '180000', '185000', 'Darat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tujuan`
--

CREATE TABLE `m_tujuan` (
  `id_tujuan` int(11) NOT NULL,
  `tujuan` varchar(500) NOT NULL,
  `jarak` int(11) NOT NULL,
  `wilayah` varchar(200) NOT NULL,
  `perjalanan` set('Dalam','Luar','') NOT NULL COMMENT 'Dalam, Luar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_tujuan`
--

INSERT INTO `m_tujuan` (`id_tujuan`, `tujuan`, `jarak`, `wilayah`, `perjalanan`) VALUES
(1, 'Air Bangis', 25, '3', 'Dalam'),
(2, 'Ujung Gading', 20, '3', 'Dalam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spt_data`
--

CREATE TABLE `spt_data` (
  `id_spt` int(11) NOT NULL,
  `no_spt` varchar(500) NOT NULL,
  `no_sppd` varchar(500) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `pangkat` varchar(200) NOT NULL,
  `golongan` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `maksud` text NOT NULL,
  `transportasi` varchar(200) NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `sumber_dana` text NOT NULL,
  `ttd_tempat` varchar(200) NOT NULL,
  `ttd_tgl` date NOT NULL,
  `ttd_jabatan` varchar(200) NOT NULL,
  `ttd_nama` varchar(200) NOT NULL,
  `ttd_gol` varchar(200) NOT NULL,
  `ttd_nip` varchar(200) NOT NULL,
  `beban` varchar(500) NOT NULL,
  `anggaran` varchar(500) NOT NULL,
  `c_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `up_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spt_data`
--

INSERT INTO `spt_data` (`id_spt`, `no_spt`, `no_sppd`, `nama`, `nip`, `pangkat`, `golongan`, `jabatan`, `maksud`, `transportasi`, `tujuan`, `tgl_berangkat`, `tgl_kembali`, `sumber_dana`, `ttd_tempat`, `ttd_tgl`, `ttd_jabatan`, `ttd_nama`, `ttd_gol`, `ttd_nip`, `beban`, `anggaran`, `c_date`, `up_date`) VALUES
(1, '090/001/SPT/DPUPR/2019', '900/001/SPPD/DPUPR/2019', 'HENNY FERNIZA, ST, MT', '19811022 200604 2007', '', 'Pembina IV/a', 'Kepala Dinas', 'Menghadiri Rapat Monitoring Dan Evaluasi Percepatan Infrastruktur Propinsi Sumatera Barat', 'BA 30 S', 'Padang', '2019-10-01', '2019-10-05', '2019', 'Simpang Empat', '2019-10-01', 'Kepala Dinas', 'HENNY FERNIZA, ST, MT', 'Pembina IV/a', '19811022 200604 2007', '', '', '2019-10-01 19:32:49', '2019-10-01 22:00:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spt_pengikut`
--

CREATE TABLE `spt_pengikut` (
  `no_spt` int(11) NOT NULL,
  `spt_id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `pangkat` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spt_pengikut`
--

INSERT INTO `spt_pengikut` (`no_spt`, `spt_id`, `nama`, `nip`, `pangkat`, `jabatan`) VALUES
(1, 1, 'MUHAMMAD DIS, SE', '19650401 200604 1 003', 'Penata III/c', 'Ka. UPT Peralatan & Pengujian'),
(2, 1, 'MUHAMMAD DIS, SE', '19650401 200604 1 003', 'Penata III/c', 'Ka. UPT Peralatan & Pengujian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_golongan`
--
ALTER TABLE `m_golongan`
  ADD PRIMARY KEY (`id_gol`);

--
-- Indexes for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  ADD PRIMARY KEY (`id_jab`);

--
-- Indexes for table `m_pegawai`
--
ALTER TABLE `m_pegawai`
  ADD PRIMARY KEY (`id_peg`);

--
-- Indexes for table `m_trasportsasi`
--
ALTER TABLE `m_trasportsasi`
  ADD PRIMARY KEY (`id_tran`);

--
-- Indexes for table `m_tujuan`
--
ALTER TABLE `m_tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- Indexes for table `spt_data`
--
ALTER TABLE `spt_data`
  ADD PRIMARY KEY (`id_spt`),
  ADD UNIQUE KEY `no_spt` (`no_spt`);

--
-- Indexes for table `spt_pengikut`
--
ALTER TABLE `spt_pengikut`
  ADD PRIMARY KEY (`no_spt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_golongan`
--
ALTER TABLE `m_golongan`
  MODIFY `id_gol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  MODIFY `id_jab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `m_pegawai`
--
ALTER TABLE `m_pegawai`
  MODIFY `id_peg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_trasportsasi`
--
ALTER TABLE `m_trasportsasi`
  MODIFY `id_tran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_tujuan`
--
ALTER TABLE `m_tujuan`
  MODIFY `id_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
