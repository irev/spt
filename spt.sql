-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Okt 2019 pada 01.55
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
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `tab` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `sub_title` varchar(200) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `cDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mw_kab`
--

CREATE TABLE `mw_kab` (
  `idkab` int(11) NOT NULL,
  `kabupaten` varchar(200) NOT NULL,
  `provid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mw_kab`
--

INSERT INTO `mw_kab` (`idkab`, `kabupaten`, `provid`) VALUES
(1, 'Pasaman Barat', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mw_kec`
--

CREATE TABLE `mw_kec` (
  `idkec` int(11) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kabid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mw_kec`
--

INSERT INTO `mw_kec` (`idkec`, `kecamatan`, `kabid`) VALUES
(1, 'Ranah Pasisia', 1),
(2, 'Luhak Nan Duo', 1),
(3, 'Talamau', 1),
(4, 'Kinali', 1),
(5, 'Gunung Tuleh', 1),
(6, 'Sungai Aur', 1),
(7, 'Sungai Beremas', 1),
(8, 'Ranah Batahan', 1),
(9, 'Lembah Melintang', 1),
(10, 'Koto Balingka', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mw_prov`
--

CREATE TABLE `mw_prov` (
  `idprov` int(11) NOT NULL,
  `provinsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mw_prov`
--

INSERT INTO `mw_prov` (`idprov`, `provinsi`) VALUES
(1, 'Sumatera Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_anggaran`
--

CREATE TABLE `m_anggaran` (
  `id_anggaran` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tgl_ang` date NOT NULL,
  `ket` varchar(500) NOT NULL,
  `kuasa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_anggaran`
--

INSERT INTO `m_anggaran` (`id_anggaran`, `tahun`, `kode`, `tgl_ang`, `ket`, `kuasa`) VALUES
(1, 2019, 'DPPA', '2019-10-01', 'Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Pasaman Barat', 'Pengguna Anggaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_belanja`
--

CREATE TABLE `m_belanja` (
  `id_belanja` int(11) NOT NULL,
  `kode_rekening` varchar(100) NOT NULL,
  `nama_belanja` varchar(500) NOT NULL,
  `pagu` decimal(50,0) NOT NULL,
  `ta` year(4) NOT NULL,
  `kodeDPA` set('DPA','DPPA') NOT NULL DEFAULT 'DPA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_belanja`
--

INSERT INTO `m_belanja` (`id_belanja`, `kode_rekening`, `nama_belanja`, `pagu`, `ta`, `kodeDPA`) VALUES
(1, '5 . 2 . 2 . 15 . 01', 'Kegiatan Rapat - Rapat Koordinasi dan Konsultasi ', '0', 2019, 'DPA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_eselon`
--

CREATE TABLE `m_eselon` (
  `id_eselon` int(11) NOT NULL,
  `tingkat` varchar(100) NOT NULL,
  `eselon` varchar(200) NOT NULL,
  `struktural` set('yes','no') NOT NULL,
  `rp_oh` decimal(50,0) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_eselon`
--

INSERT INTO `m_eselon` (`id_eselon`, `tingkat`, `eselon`, `struktural`, `rp_oh`, `tahun`) VALUES
(0, 'belum diset', '', 'no', '0', 2019),
(1, '', 'IV', 'yes', '250000', 2019),
(2, '', 'III', 'yes', '275000', 2019),
(3, '', 'II', 'yes', '350000', 2019),
(4, '', 'GOL I,II dan III', 'no', '225000', 2019),
(7, '', 'PTT', 'no', '200000', 2019),
(8, '', 'THL', 'no', '200000', 2019);

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
('0', '0', '', '', '0', '0', '0', NULL, 2019),
('1', 'I', 'Juru Muda', 'I/a', '130000', '155000', '180000', NULL, 2019),
('10', 'III', 'Penata Muda Tingkat 1', 'III/b', '140000', '165000', '190000', NULL, 2019),
('11', 'III', 'Penata', 'III/c', '140000', '165000', '190000', NULL, 2019),
('12', 'III', 'Penata Tingkat 1', 'III/d', '140000', '165000', '190000', NULL, 2019),
('13', 'IV', 'Pembina', 'IV/a', '150000', '175000', '200000', NULL, 2019),
('14', 'IV', 'Pembina Tingkat 1', 'IV/b', '150000', '175000', '200000', NULL, 2019),
('15', 'IV', 'Pembina Utama Muda', 'IV/c', '150000', '175000', '200000', NULL, 2019),
('16', 'IV', 'Pembina Utama Madya', 'IV/d', '150000', '175000', '200000', NULL, 2019),
('17', 'IV', 'Pembina Utama', 'IV/e', '150000', '175000', '200000', NULL, 2019),
('18', 'PTT', 'PTT', 'PTT', '120000', '145000', '170000', NULL, 0000),
('19', 'THL', 'THL', 'THL', '120000', '145000', '170000', NULL, 0000),
('2', 'I', 'Juru Muda Tingkat 1', 'I/b', '130000', '155000', '180000', NULL, 2019),
('3', 'I', 'Juru', 'I/c', '130000', '155000', '180000', NULL, 2019),
('4', 'I', 'Juru Tingkat 1', 'I/d', '130000', '155000', '180000', NULL, 2019),
('5', 'II', 'Pengatur Muda', 'II/a', '130000', '155000', '180000', NULL, 2019),
('6', 'II', 'Pengatur Muda Tingkat 1', 'II/b', '130000', '155000', '180000', NULL, 2019),
('7', 'II', 'Pengatur', 'II/c', '130000', '155000', '180000', NULL, 2019),
('8', 'II', 'Pengatur Tingkat 1', 'II/d', '130000', '155000', '180000', NULL, 2019),
('9', 'III', 'Penata Muda', 'III/a', '140000', '165000', '190000', NULL, 2019);

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
-- Struktur dari tabel `m_kegiatan`
--

CREATE TABLE `m_kegiatan` (
  `id_kegiatan` int(11) NOT NULL COMMENT 'id_kegiatan',
  `rekening` varchar(200) NOT NULL COMMENT 'rekening',
  `kegiatan` varchar(500) NOT NULL COMMENT 'kegiatan',
  `pptk` int(11) NOT NULL COMMENT 'pptk',
  `bendahara` int(11) NOT NULL COMMENT 'tahun',
  `kpa` int(11) NOT NULL,
  `pagu` decimal(10,0) NOT NULL,
  `dinas` set('Dalam','Luar') NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_kegiatan`
--

INSERT INTO `m_kegiatan` (`id_kegiatan`, `rekening`, `kegiatan`, `pptk`, `bendahara`, `kpa`, `pagu`, `dinas`, `tahun`) VALUES
(1, '01.03.5.2.2.15.01', 'Rapat - Rapat Koordinasi dan Konsultasi', 10, 9, 8, '1000', 'Dalam', 2019);

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
  `golongan_id` int(11) NOT NULL DEFAULT '0',
  `eselon_id` int(11) NOT NULL DEFAULT '0',
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pegawai`
--

INSERT INTO `m_pegawai` (`id_peg`, `nama`, `nip`, `jabatan`, `golongan`, `golongan_id`, `eselon_id`, `tahun`) VALUES
(1, 'HENNY FERNIZA, ST. MT', '19811022 200604 2 007', 'Kepala Dinas', 'Pembina IV/a', 13, 3, 2019),
(5, 'MUHAMMAD HORNAS, SH', '', 'Sopir Kadis PUPR', 'PTT ', 18, 7, 2019),
(6, 'REFYANDRA, S. Kom', '', 'Staf keuangan', 'THL', 19, 8, 2019),
(7, 'MUHAMMAD DIS, SE', '19650401 200604 1 003', 'Ka. UPT Peralatan & Pengujian', 'Pengatur II/c', 7, 0, 2019),
(8, 'WILDAN, SH. M.Si', '19690314 199003 1 002', 'Sekretaris', 'Pembina IV/a', 13, 3, 2019),
(9, 'ALIN MARIANA, Amd', '19780419 201101 2 001', 'Bendahara', '', 7, 4, 2019),
(10, 'NASRIL, ST, MT', '19760120 200312 1 007', 'Kasubag Umum', '', 0, 0, 2019),
(11, 'FEBRI YETTI, SE', '19810208 200901 2 003', 'Kasubag Program dan Aset', 'Penata III/c', 7, 0, 2019),
(12, 'DARMAWAN, ST', '19730901 200501 1 005', 'Kepala Bidang Tataruang', 'Penata Tingkat 1 III/d', 12, 0, 2019),
(13, 'ELDON MARON, ST', '19730727 200604 1 006', 'Kepala Bidang PSDA', 'Penata Tingkat 1 III/d', 12, 0, 2019),
(14, 'FEBRIANTO, ST', '19800224 200501 1 002', 'Kepala Bidang Cipta Karya', 'Penata Tingkat 1 III/d', 12, 0, 2019),
(15, 'BAMBANG SUMARSONO, ST', '197706232006041009', 'Kepala Bidang Bina Marga', 'Penata Tingkat 1 III/d', 12, 3, 2019);

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
  `bahan_bakar` varchar(30) NOT NULL,
  `wil1` decimal(50,0) NOT NULL COMMENT 'rp',
  `wil2` decimal(50,0) NOT NULL COMMENT 'rp',
  `wil3` decimal(50,0) NOT NULL COMMENT 'rp',
  `liter1` int(11) NOT NULL,
  `liter2` int(11) NOT NULL,
  `liter3` int(11) NOT NULL,
  `bbm_luar` decimal(50,0) NOT NULL,
  `perjalanan` set('Darat','Udara','Laut') NOT NULL COMMENT 'Darat,Udara,Laut',
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_trasportsasi`
--

INSERT INTO `m_trasportsasi` (`id_tran`, `nama`, `nomor`, `jenis`, `roda`, `cc`, `bahan_bakar`, `wil1`, `wil2`, `wil3`, `liter1`, `liter2`, `liter3`, `bbm_luar`, `perjalanan`, `tahun`) VALUES
(1, 'Rush', 'BA  8036 S', 'darat', 4, 0, 'Bensin', '150000', '180000', '185000', 20, 20, 20, '30', 'Laut', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tujuan`
--

CREATE TABLE `m_tujuan` (
  `id_tujuan` int(11) NOT NULL,
  `tujuan` varchar(500) NOT NULL,
  `kec` varchar(200) NOT NULL,
  `kab` varchar(200) NOT NULL,
  `prov` varchar(200) NOT NULL,
  `kecid` int(11) NOT NULL,
  `kabid` int(11) NOT NULL,
  `provid` int(11) NOT NULL,
  `jarak` int(11) NOT NULL,
  `wilayah` varchar(200) NOT NULL,
  `bbm` int(11) NOT NULL,
  `perjalanan` set('Dalam','Luar','') NOT NULL COMMENT 'Dalam, Luar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_tujuan`
--

INSERT INTO `m_tujuan` (`id_tujuan`, `tujuan`, `kec`, `kab`, `prov`, `kecid`, `kabid`, `provid`, `jarak`, `wilayah`, `bbm`, `perjalanan`) VALUES
(1, 'Air Bangis', 'Kec. Sungai Beremas', 'Pasaman Barat', 'Sumatera Barat', 0, 1, 1, 25, '3', 0, 'Dalam'),
(2, 'Ujung Gading', 'kec. Lembah Melintang', 'Pasaman Barat', 'Sumatera Barat', 0, 1, 1, 20, '3', 0, 'Dalam'),
(3, 'Kinali', 'kec. Kinali', 'Pasaman Barat', 'Sumatera Barat', 0, 1, 1, 20, '2', 0, 'Dalam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spt_data`
--

CREATE TABLE `spt_data` (
  `id_spt` varchar(20) NOT NULL,
  `no_spt` varchar(500) NOT NULL,
  `no_sppd` varchar(500) NOT NULL,
  `anggaran` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `wilayah` int(11) NOT NULL,
  `tujuan_id` int(11) NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `pangkat` varchar(200) NOT NULL,
  `golongan` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `maksud` text NOT NULL,
  `transportasi` varchar(200) NOT NULL,
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
  `c_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `up_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ttd_sppd_tempat` varchar(200) NOT NULL,
  `ttd_sppd_tgl` date NOT NULL,
  `ttd_sppd_nama` varchar(500) NOT NULL,
  `ttd_sppd_nip` varchar(200) NOT NULL,
  `ttd_sppd_gol` varchar(200) NOT NULL,
  `ttd_sppd_jabatan` varchar(200) NOT NULL,
  `perjalanan` set('dalam','luar','luarnegeri','') NOT NULL,
  `tahun` year(4) NOT NULL,
  `dasar_spt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spt_data`
--

INSERT INTO `spt_data` (`id_spt`, `no_spt`, `no_sppd`, `anggaran`, `kegiatan_id`, `transport_id`, `wilayah`, `tujuan_id`, `tujuan`, `nama`, `nip`, `pangkat`, `golongan`, `jabatan`, `maksud`, `transportasi`, `tgl_berangkat`, `tgl_kembali`, `sumber_dana`, `ttd_tempat`, `ttd_tgl`, `ttd_jabatan`, `ttd_nama`, `ttd_gol`, `ttd_nip`, `beban`, `c_date`, `up_date`, `ttd_sppd_tempat`, `ttd_sppd_tgl`, `ttd_sppd_nama`, `ttd_sppd_nip`, `ttd_sppd_gol`, `ttd_sppd_jabatan`, `perjalanan`, `tahun`, `dasar_spt`) VALUES
('5daf1597c9ad8', '123/1231/SPT1231/DPUPR/2019', '123/2312/SPPD/DPUPR/2019', 1, 1, 1, 3, 2, 'Ujung Gading', 'HENNY FERNIZA, ST. MT', '19811022 200604 2 007', 'Pembina IV/a', 'Pembina IV/a', 'Kepala Dinas', 'Dengan Masud jalan dinas', 'BA  8036 S', '2019-10-01', '2019-10-16', '2019', 'Simpang Empat', '2019-10-22', 'Sekretaris', 'WILDAN, SH. M.Si', 'Pembina IV/a', '19690314 199003 1 002', 'DPA  Pengguna Anggaran Dinas Pekerjaan Umum & Penataan Ruang Kab. Pasaman Barat 2019', '2019-10-22 21:43:35', '2019-10-23 05:53:45', 'Simpang Empat', '2019-10-22', 'WILDAN, SH. M.Si', '19690314 199003 1 002', 'Pembina IV/a', 'Sekretaris', 'dalam', 2019, '12/bupati/pasbar/2019'),
('5daf5bc75a65a', '111/3232/SPT/DPUPR/2019', '123/232/SPPD/DPUPR/2019', 1, 1, 1, 3, 1, 'Air Bangis', 'HENNY FERNIZA, ST. MT', '19811022 200604 2 007', 'Pembina IV/a', 'Pembina IV/a', 'Kepala Dinas', 'uyiyu', 'Rush', '2019-10-23', '2019-10-24', '2019', 'Simpang Empat', '2019-10-23', 'Kepala Dinas', 'HENNY FERNIZA, ST. MT', 'Pembina IV/a', '19811022 200604 2 007', 'DPPA  Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Pasaman Barat 2019', '2019-10-23 02:43:03', '2019-10-23 06:05:04', 'Simpang Empat', '2019-10-23', 'WILDAN, SH. M.Si', '19690314 199003 1 002', 'Pembina IV/a', 'Sekretaris', 'luar', 2019, 'yui');

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
(55, '5daf1597c9ad8', 1, 'yes', 'dalam', 2019),
(63, '5daf5bc75a65a', 1, 'yes', 'dalam', 2019),
(64, '5daf1597c9ad8', 8, 'yes', 'dalam', 2019),
(65, '5daf1597c9ad8', 9, 'yes', 'dalam', 2019),
(66, '5daf1597c9ad8', 5, 'yes', 'dalam', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `upwd` varchar(100) NOT NULL,
  `urole` varchar(100) NOT NULL,
  `intusertype` int(11) NOT NULL,
  `struseremail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbluser`
--

INSERT INTO `tbluser` (`id`, `uname`, `upwd`, `urole`, `intusertype`, `struseremail`) VALUES
(0, 'admin', 'admin', 'admin', 1, NULL),
(1, 'casheir', 'casheir', 'admin', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_anggaran`
--
ALTER TABLE `m_anggaran`
  ADD PRIMARY KEY (`id_anggaran`);

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
-- Indexes for table `m_kegiatan`
--
ALTER TABLE `m_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `kpa` (`kpa`),
  ADD KEY `bendahara` (`bendahara`),
  ADD KEY `pptk` (`pptk`);

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
  ADD UNIQUE KEY `no_spt` (`no_spt`),
  ADD KEY `wilayah` (`wilayah`),
  ADD KEY `f_spt_kegiatan` (`kegiatan_id`),
  ADD KEY `f_spt_tujuan` (`tujuan_id`),
  ADD KEY `f_spt_anggaran` (`anggaran`),
  ADD KEY `f_spt_transport` (`transport_id`);

--
-- Indexes for table `spt_pengikut`
--
ALTER TABLE `spt_pengikut`
  ADD PRIMARY KEY (`id_peng`),
  ADD KEY `f_pengikut_spt` (`spt_id`),
  ADD KEY `f_pengikut_pegawai` (`pegawai_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_jab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `m_kegiatan`
--
ALTER TABLE `m_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id_kegiatan', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_pegawai`
--
ALTER TABLE `m_pegawai`
  MODIFY `id_peg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `m_trasportsasi`
--
ALTER TABLE `m_trasportsasi`
  MODIFY `id_tran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_tujuan`
--
ALTER TABLE `m_tujuan`
  MODIFY `id_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spt_pengikut`
--
ALTER TABLE `spt_pengikut`
  MODIFY `id_peng` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `spt_data`
--
ALTER TABLE `spt_data`
  ADD CONSTRAINT `f_spt_anggaran` FOREIGN KEY (`anggaran`) REFERENCES `m_anggaran` (`id_anggaran`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `f_spt_kegiatan` FOREIGN KEY (`kegiatan_id`) REFERENCES `m_kegiatan` (`id_kegiatan`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `f_spt_transport` FOREIGN KEY (`transport_id`) REFERENCES `m_trasportsasi` (`id_tran`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `f_spt_tujuan` FOREIGN KEY (`tujuan_id`) REFERENCES `m_tujuan` (`id_tujuan`) ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `spt_pengikut`
--
ALTER TABLE `spt_pengikut`
  ADD CONSTRAINT `f_pengikut_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `m_pegawai` (`id_peg`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `f_pengikut_spt` FOREIGN KEY (`spt_id`) REFERENCES `spt_data` (`id_spt`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
