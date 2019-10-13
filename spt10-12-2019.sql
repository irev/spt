-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Okt 2019 pada 17.26
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
-- Struktur dari tabel `m_anggaran`
--

CREATE TABLE `m_anggaran` (
  `id_angaran` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `kode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_anggaran`
--

INSERT INTO `m_anggaran` (`id_angaran`, `tahun`, `kode`) VALUES
(1, 2019, 'DPA'),
(2, 2019, 'DPPA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_belanja`
--

CREATE TABLE `m_belanja` (
  `id_belanja` int(11) NOT NULL,
  `kode_rekening` varchar(100) NOT NULL,
  `nama_belanja` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_belanja`
--

INSERT INTO `m_belanja` (`id_belanja`, `kode_rekening`, `nama_belanja`) VALUES
(1, '5 . 2 . 2 . 15 . 01', 'Kegiatan Rapat - Rapat Koordinasi dan Konsultasi ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_eselon`
--

CREATE TABLE `m_eselon` (
  `id_eselon` int(11) NOT NULL,
  `tingkat` varchar(100) NOT NULL,
  `eselon` varchar(200) NOT NULL,
  `rp_oh` decimal(50,0) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_eselon`
--

INSERT INTO `m_eselon` (`id_eselon`, `tingkat`, `eselon`, `rp_oh`, `tahun`) VALUES
(0, 'belum diset', '', '0', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_golongan`
--

CREATE TABLE `m_golongan` (
  `id_gol` varchar(11) NOT NULL,
  `grup` varchar(200) DEFAULT NULL,
  `pangkat` varchar(200) NOT NULL,
  `golongan` varchar(200) NOT NULL,
  `wil1` decimal(50,0) DEFAULT NULL,
  `wil2` decimal(50,0) DEFAULT NULL,
  `wil3` decimal(50,0) DEFAULT NULL,
  `harian_luar` decimal(50,0) DEFAULT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_golongan`
--

INSERT INTO `m_golongan` (`id_gol`, `grup`, `pangkat`, `golongan`, `wil1`, `wil2`, `wil3`, `harian_luar`, `tahun`) VALUES
('0', 'I', 'THL', 'THL', NULL, NULL, NULL, NULL, 2019),
('1', 'I', 'Juru Muda', 'I/a', '0', '0', '0', '0', 2019),
('10', 'III', 'Penata Muda Tingkat 1', 'III/b', '0', '0', '0', '0', 2019),
('11', 'III', 'Penata', 'III/c', '0', '0', '0', '0', 2019),
('12', 'III', 'Penata Tingkat 1', 'III/d', '0', '0', '0', '0', 2019),
('13', 'IV', 'Pembina', 'IV/a', '0', '0', '0', '0', 2019),
('14', 'IV', 'Pembina Tingkat 1', 'IV/b', '0', '0', '0', '0', 2019),
('15', 'IV', 'Pembina Utama Muda', 'IV/c', '0', '0', '0', '0', 2019),
('16', 'IV', 'Pembina Utama Madya', 'IV/d', '0', '0', '0', '0', 2019),
('17', 'IV', 'Pembina Utama', 'IV/e', '0', '0', '0', '0', 2019),
('2', 'I', 'Juru Muda Tingkat 1', 'I/b', '0', '0', '0', '0', 2019),
('3', 'I', 'Juru', 'I/c', '0', '0', '0', '0', 2019),
('4', 'I', 'Juru Tingkat 1', 'I/d', '0', '0', '0', '0', 2019),
('5', 'II', 'Pengatur Muda', 'II/a', '0', '0', '0', '0', 2019),
('6', 'II', 'Pengatur Muda Tingkat 1', 'II/b', '0', '0', '0', '0', 2019),
('7', 'II', 'Pengatur', 'II/c', '0', '0', '0', '0', 2019),
('8', 'II', 'Pengatur Tingkat 1', 'II/d', '0', '0', '0', '0', 2019),
('9', 'III', 'Penata Muda', 'III/a', '0', '0', '0', '0', 2019),
('GL01', NULL, '', '', NULL, NULL, NULL, NULL, 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jabatan`
--

CREATE TABLE `m_jabatan` (
  `id_jab` int(11) NOT NULL,
  `nama_jabatan` varchar(500) NOT NULL,
  `dalam_oh` decimal(50,0) NOT NULL,
  `luar_oh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_jabatan`
--

INSERT INTO `m_jabatan` (`id_jab`, `nama_jabatan`, `dalam_oh`, `luar_oh`) VALUES
(1, 'Kepala Dinas', '0', 0),
(2, 'Sekretaris', '0', 0),
(3, 'Kasubag Program dan Aset', '0', 0),
(4, 'Kasubag Umum', '0', 0),
(5, 'Kepala Bidang Bina Marga', '0', 0),
(6, 'Kepala Bidang Cipta Karya', '0', 0),
(7, 'Kepala Bidang PSDA', '0', 0),
(8, 'Kepala Bidang Tataruang', '0', 0),
(9, 'KUPT Peralatan Dan Mesin', '0', 0),
(10, 'KUPT Wilayah I', '0', 0),
(11, 'KUPT Wilayah II', '0', 0),
(12, 'KUPT Wilayah III', '0', 0),
(13, 'KUPT Wilayah IV', '0', 0),
(14, 'Sopir Kadis PUPR', '0', 0),
(15, 'Staf keuangan', '123123', 0),
(16, 'Ka. UPT Peralatan & Pengujian', '0', 0),
(17, 'belum diset', '0', 0);

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
  `golongan_id` varchar(11) NOT NULL,
  `eselon_id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pegawai`
--

INSERT INTO `m_pegawai` (`id_peg`, `nama`, `nip`, `jabatan`, `golongan`, `golongan_id`, `eselon_id`, `tahun`) VALUES
(1, 'HENNY FERNIZA, ST. MT', '1981102 2200604 2 007', 'Kepala Dinas', 'Pembina IV/a', '0', 0, 2019),
(5, 'MUHAMMAD HORNAS, SH', '', 'Sopir Kadis PUPR', 'PTT', '0', 0, 2019),
(6, 'REFYANDRA, S. Kom', '', 'Staf keuangan', 'THL', '0', 0, 2019),
(7, 'MUHAMMAD DIS, SE', '19650401 200604 1 003', 'Ka. UPT Peralatan & Pengujian', 'Pengatur II/c', '0', 0, 2019);

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
(1, 'Rush', 'BA  8036 S', 'darat', 4, 1500, '150000', '180000', '185000', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tujuan`
--

CREATE TABLE `m_tujuan` (
  `id_tujuan` int(11) NOT NULL,
  `tujuan` varchar(500) NOT NULL,
  `jarak` int(11) NOT NULL,
  `wilayah` varchar(200) NOT NULL,
  `bbm` int(11) NOT NULL,
  `perjalanan` set('Dalam','Luar','') NOT NULL COMMENT 'Dalam, Luar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_tujuan`
--

INSERT INTO `m_tujuan` (`id_tujuan`, `tujuan`, `jarak`, `wilayah`, `bbm`, `perjalanan`) VALUES
(1, 'Air Bangis', 25, '3', 0, 'Dalam'),
(2, 'Ujung Gading', 20, '3', 0, 'Dalam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spt_data`
--

CREATE TABLE `spt_data` (
  `id_spt` varchar(20) NOT NULL,
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
  `anggaran` varchar(500) DEFAULT NULL,
  `c_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `up_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ttd_sppd_tempat` varchar(200) NOT NULL,
  `ttd_sppd_tgl` date NOT NULL,
  `ttd_sppd_nama` varchar(500) NOT NULL,
  `ttd_sppd_nip` varchar(200) NOT NULL,
  `ttd_sppd_gol` varchar(200) NOT NULL,
  `ttd_sppd_jabatan` varchar(200) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spt_data`
--

INSERT INTO `spt_data` (`id_spt`, `no_spt`, `no_sppd`, `nama`, `nip`, `pangkat`, `golongan`, `jabatan`, `maksud`, `transportasi`, `tujuan`, `tgl_berangkat`, `tgl_kembali`, `sumber_dana`, `ttd_tempat`, `ttd_tgl`, `ttd_jabatan`, `ttd_nama`, `ttd_gol`, `ttd_nip`, `beban`, `anggaran`, `c_date`, `up_date`, `ttd_sppd_tempat`, `ttd_sppd_tgl`, `ttd_sppd_nama`, `ttd_sppd_nip`, `ttd_sppd_gol`, `ttd_sppd_jabatan`, `tahun`) VALUES
('5d991a25e9d6f', '090/12/SPT/DPUPR/2019', '900/12/SPPD/DPUPR/2019', 'MUHAMMAD DIS, SE', '19650401 200604 1 003', 'Pengatur II/c', 'Pengatur II/c', 'Ka. UPT Peralatan & Pengujian', 'Maksud dan tujuan spt', 'BA  8036 S', 'Ujung Gading', '2019-10-16', '2019-10-21', '2019', 'Simpang Empat', '0000-00-00', 'Ka. UPT Peralatan & Pengujian', 'MUHAMMAD DIS, SE', 'Pengatur II/c', '19650401 200604 1 003', 'DPA Dinas Pekerjaan Umum & Penataan Ruang Kab. Pasaman Barat Tahun Anggaran 2019', '', '2019-10-06 05:33:09', '2019-10-12 21:21:21', 'Simpang Empat', '0000-00-00', 'MUHAMMAD DIS, SE', '19650401 200604 1 003', 'Pengatur II/c', 'Ka. UPT Peralatan & Pengujian', 0000),
('5d991a9252cbc', '090', '900', 'HENNY FERNIZA, ST. MT', '1981102 2200604 2 007', 'Pembina IV/a', 'Pembina IV/a', 'Kepala Dinas', 'kj', 'BA  8036 S', 'Air Bangis', '2019-10-01', '2019-10-06', '2019', 'Simpang Empat', '2019-10-06', 'Kepala Dinas', 'HENNY FERNIZA, ST. MT', 'Pembina IV/a', '1981102 2200604 2 007', 'DPA Dinas Pekerjaan Umum & Penataan Ruang Kab. Pasaman Barat Tahun Anggaran 2019', '', '2019-10-06 05:34:58', '2019-10-06 05:34:58', 'Simpang Empat', '2019-10-07', 'HENNY FERNIZA, ST. MT', '1981102 2200604 2 007', 'Pembina IV/a', 'Kepala Dinas', 0000),
('5d9dd99774eed', 'yu', 'yutyuio', 'HENNY FERNIZA, ST. MT', '1981102 2200604 2 007', 'Pembina IV/a', 'Pembina IV/a', 'Kepala Dinas', 'wret', 'BA  8036 S', 'Air Bangis', '2019-10-09', '2019-10-16', '2019', 'Simpang Empat', '2019-10-09', 'Kepala Dinas', 'HENNY FERNIZA, ST. MT', 'Pembina IV/a', '1981102 2200604 2 007', 'DPA Dinas Pekerjaan Umum & Penataan Ruang Kab. Pasaman Barat Tahun Anggaran 2019', '', '2019-10-09 19:59:03', '2019-10-09 19:59:03', 'Simpang Empat', '2019-10-24', 'MUHAMMAD DIS, SE', '19650401 200604 1 003', 'Pengatur II/c', 'Ka. UPT Peralatan & Pengujian', 0000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spt_pengikut`
--

CREATE TABLE `spt_pengikut` (
  `id_peng` int(100) NOT NULL,
  `spt_id` varchar(20) NOT NULL,
  `pegawai_id` int(59) NOT NULL,
  `bayar` set('','yes','no') NOT NULL,
  `perjalanan` set('dalam','luar') NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spt_pengikut`
--

INSERT INTO `spt_pengikut` (`id_peng`, `spt_id`, `pegawai_id`, `bayar`, `perjalanan`, `tahun`) VALUES
(1, '5d991a25e9d6f', 7, '', 'dalam', 2019);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_belanja`
--
ALTER TABLE `m_belanja`
  ADD PRIMARY KEY (`id_belanja`);

--
-- Indexes for table `m_eselon`
--
ALTER TABLE `m_eselon`
  ADD PRIMARY KEY (`id_eselon`);

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
  ADD PRIMARY KEY (`id_peg`),
  ADD KEY `eselon_id` (`eselon_id`),
  ADD KEY `golongan_id` (`golongan_id`);

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
  ADD PRIMARY KEY (`id_peng`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_belanja`
--
ALTER TABLE `m_belanja`
  MODIFY `id_belanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  MODIFY `id_jab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `m_pegawai`
--
ALTER TABLE `m_pegawai`
  MODIFY `id_peg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_trasportsasi`
--
ALTER TABLE `m_trasportsasi`
  MODIFY `id_tran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_tujuan`
--
ALTER TABLE `m_tujuan`
  MODIFY `id_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spt_pengikut`
--
ALTER TABLE `spt_pengikut`
  MODIFY `id_peng` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
