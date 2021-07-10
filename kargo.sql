-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Jan 2021 pada 13.21
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kargo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jalur`
--

CREATE TABLE `detail_jalur` (
  `id_jalur` char(4) NOT NULL,
  `id_kargo` char(4) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_jalur`
--

INSERT INTO `detail_jalur` (`id_jalur`, `id_kargo`, `harga`) VALUES
('XH6Z', '7H32', 110000),
('XH6Z', 'HE83', 60000),
('UYIM', '7H32', 110000),
('QX0B', 'HE83', 35000),
('Z06N', '7H32', 70000),
('Z06N', '2K82', 65000),
('4P2P', '2K82', 45000),
('4P2P', '7H32', 65000),
('4P2P', 'HE83', 35000),
('AWOX', '2K82', 45000),
('AWOX', '7H32', 65000),
('AWOX', 'HE83', 35000),
('BSCA', '2K82', 45000),
('BSCA', '7H32', 65000),
('save', 'HE83', 35000),
('save', '7H32', 45000),
('save', '2K82', 45000),
('C0YH', '2K82', 45000),
('C0YH', '7H32', 65000),
('C0YH', 'HE83', 35000),
('EJVH', '2K82', 45000),
('EJVH', '7H32', 65000),
('EJVH', 'HE83', 35000),
('FELE', '2K82', 45000),
('FELE', '7H32', 65000),
('FELE', 'HE83', 35000),
('Z06N', 'HE83', 45000),
('K5XR', '7H32', 100000),
('K5XR', '2K82', 75000),
('K5XR', 'HE83', 65000),
('J2YR', '7H32', 95000),
('J2YR', '2K82', 80000),
('J2YR', 'HE83', 75000),
('HZR4', '7H32', 130000),
('HZR4', 'HE83', 80000),
('HZR4', '2K82', 65000),
('GI5A', '2K82', 55000),
('GI5A', '7H32', 80000),
('GI5A', 'HE83', 45000),
('UYIM', '2K82', 80000),
('UYIM', 'HE83', 60000),
('SAVL', '2K82', 35000),
('XSQO', '2K82', 25000),
('XH6Z', '2K82', 75000),
('QX0B', '2K82', 65000),
('QX0B', '7H32', 110000),
('NM1E', '2K82', 35000),
('MUXZ', '2K82', 35000),
('MPW3', '2K82', 35000),
('LO2L', '2K82', 15000),
('UZ5C', '2K82', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `no_resi` char(7) NOT NULL,
  `id_pelanggan` char(4) NOT NULL,
  `diskon` enum('YA','TIDAK') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`no_resi`, `id_pelanggan`, `diskon`) VALUES
('EX02514', 'VHND', 'TIDAK'),
('EX63189', 'VHND', 'YA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_barang`
--

CREATE TABLE `info_barang` (
  `id_barang` char(4) NOT NULL,
  `nama_barang` varchar(35) NOT NULL,
  `id_jenis` char(4) NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `info_barang`
--

INSERT INTO `info_barang` (`id_barang`, `nama_barang`, `id_jenis`, `berat`, `keterangan`) VALUES
('F1XR', 'Laptop DELL 43SA', 'U266', 2, 'Barang berisi paket laptop'),
('YLEJ', 'Laptop DELL 43SA', 'U266', 2, 'Barang berisi paket laptop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_penerima`
--

CREATE TABLE `info_penerima` (
  `id_penerima` char(4) NOT NULL,
  `nama_penerima` varchar(45) NOT NULL,
  `no_telp` char(4) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `info_penerima`
--

INSERT INTO `info_penerima` (`id_penerima`, `nama_penerima`, `no_telp`, `alamat`, `kode_pos`) VALUES
('BMG2', 'Yunia Maulidia', '0826', 'Jl. Paku Bumi, Rungkut', '67253'),
('SGIJ', 'Yunia Maulidia', '0826', 'Jl. Paku Bumi, Rungkut', '67253');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_pengirim`
--

CREATE TABLE `info_pengirim` (
  `id_pengirim` char(4) NOT NULL,
  `nama_pengirim` varchar(45) NOT NULL,
  `no_telp` char(13) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `info_pengirim`
--

INSERT INTO `info_pengirim` (`id_pengirim`, `nama_pengirim`, `no_telp`, `alamat`, `kode_pos`) VALUES
('NVVY', 'Deli Susanto', '082777263726', 'Jl. Bunga Seroja, Arjosari', '67263'),
('PFGW', 'Deli Susanto', '082777263726', 'Jl. Bunga Seroja, Arjosari', '67263');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalur`
--

CREATE TABLE `jalur` (
  `id_jalur` char(4) NOT NULL,
  `id_kota_awal` char(4) NOT NULL,
  `id_kota_tujuan` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jalur`
--

INSERT INTO `jalur` (`id_jalur`, `id_kota_awal`, `id_kota_tujuan`) VALUES
('4P2P', '7Q9W', 'INPK'),
('AWOX', 'ABPT', '7Q9W'),
('BSCA', 'ABPT', '14MQ'),
('C0YH', '32S4', '14MQ'),
('EJVH', '14MQ', '32S4'),
('FELE', 'INPK', '14MQ'),
('GI5A', '7Q9W', '14MQ'),
('HZR4', 'INPK', '7Q9W'),
('J2YR', '14MQ', '7Q9W'),
('K5XR', '32S4', '7Q9W'),
('LO2L', 'INPK', '32S4'),
('MPW3', 'ABPT', '32S4'),
('MUXZ', 'INPK', 'ABPT'),
('NM1E', '32S4', 'ABPT'),
('QX0B', '7Q9W', '32S4'),
('SAVL', 'ABPT', 'INPK'),
('UYIM', '14MQ', 'INPK'),
('XH6Z', '7Q9W', 'ABPT'),
('XSQO', '32S4', 'INPK'),
('Z06N', '14MQ', 'ABPT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` char(4) NOT NULL,
  `jenis_barang` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `jenis_barang`) VALUES
('FWV0', 'Furniture'),
('GAD2', 'Tekstil'),
('J7IW', 'Baterai'),
('JK1O', 'Makanan'),
('U266', 'Elektronik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kargo`
--

CREATE TABLE `kargo` (
  `id_kargo` char(4) NOT NULL,
  `nama_kargo` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kargo`
--

INSERT INTO `kargo` (`id_kargo`, `nama_kargo`) VALUES
('2K82', 'KARGO DARAT'),
('7H32', 'KARGO UDARA'),
('HE83', 'KARGO LAUT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` char(4) NOT NULL,
  `nama_kota` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
('14MQ', 'MAKASSAR'),
('32S4', 'MALANG'),
('7Q9W', 'BALIKPAPAN'),
('ABPT', 'BLITAR'),
('INPK', 'SURABAYA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` char(4) NOT NULL,
  `nama_pegawai` varchar(45) NOT NULL,
  `no_telp` char(13) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `no_telp`, `jenis_kelamin`, `alamat`) VALUES
('2S32', 'Budi Prayogi', '085623627112', 'Laki - Laki', 'Blitar'),
('8HK3', 'admin', '-', 'Laki - Laki', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` char(4) NOT NULL,
  `nama_pelanggan` varchar(45) NOT NULL,
  `email` varchar(35) NOT NULL,
  `no_telp` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `no_telp`) VALUES
('KVIB', 'Alvin Riananda', 'alvin@gmail.com', '123'),
('VHND', 'Rizky Abdillah', 'rizkyaks@gmail.com', '089521256551');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_resi` char(7) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `tanggal_diterima` date DEFAULT NULL,
  `tanggal_penjemputan` date NOT NULL,
  `id_pengirim` char(4) NOT NULL,
  `id_penerima` char(4) NOT NULL,
  `id_barang` char(4) NOT NULL,
  `id_jalur` char(4) NOT NULL,
  `id_kargo` char(4) NOT NULL,
  `metode_pembayaran` enum('CASH','TRANSFER') NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_resi`, `tanggal_transaksi`, `tanggal_diterima`, `tanggal_penjemputan`, `id_pengirim`, `id_penerima`, `id_barang`, `id_jalur`, `id_kargo`, `metode_pembayaran`, `status`) VALUES
('EX02514', '2021-01-15', '0000-00-00', '2021-01-15', 'PFGW', 'BMG2', 'F1XR', 'XSQO', '7H32', 'CASH', 'ARRIVED'),
('EX63189', '2021-01-13', '0000-00-00', '2021-01-14', 'NVVY', 'SGIJ', 'YLEJ', 'XSQO', '7H32', 'CASH', 'NOT PAID');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` char(4) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','pegawai','pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
('2S32', 'budip', '$2y$10$qdnyFESZP3TdBE4Qnyb99OAPXmfWuV9ihMcWTxUUhg7kgouUh1W/y', 'pegawai'),
('8HK3', 'admin', '$2y$10$atdK9PA2MHHssvQnRAl8e.kUjbgOWlMjQqMpAiitCQq7WxhwKdpJK', 'admin'),
('KVIB', 'alvincuy', '$2y$10$XMPRgU92zHo78Rfp7Vm.pe9CQORD46SNgb32p1uWs7.nVoVBs5H8G', 'pelanggan'),
('VHND', 'rizkyabd', '$2y$10$F38c.lYsPX3475a5IvaVHO5iqoPg/WWLz.oormDX35Roh1LiZdWzK', 'pelanggan');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `VIEW_CEK_HARGA`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `VIEW_CEK_HARGA` (
`id_kota_awal` char(4)
,`id_kota_tujuan` char(4)
,`id_kargo` char(4)
,`kota_awal` varchar(35)
,`kota_tujuan` varchar(35)
,`harga` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `VIEW_DETAIL_JALUR`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `VIEW_DETAIL_JALUR` (
`id_jalur` char(4)
,`id_kargo` char(4)
,`nama_kargo` varchar(35)
,`harga` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `VIEW_DETAIL_TRANSAKSI`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `VIEW_DETAIL_TRANSAKSI` (
`no_resi` char(7)
,`id_pelanggan` char(4)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `VIEW_JALUR`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `VIEW_JALUR` (
`id_jalur` char(4)
,`kota_awal` varchar(35)
,`kota_tujuan` varchar(35)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `VIEW_PEGAWAI`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `VIEW_PEGAWAI` (
`id_pegawai` char(4)
,`nama_pegawai` varchar(45)
,`no_telp` char(13)
,`jenis_kelamin` enum('Laki - Laki','Perempuan')
,`alamat` text
,`username` varchar(35)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `VIEW_PELANGGAN`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `VIEW_PELANGGAN` (
`id_pelanggan` char(4)
,`nama_pelanggan` varchar(45)
,`email` varchar(35)
,`no_telp` char(13)
,`username` varchar(35)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `VIEW_TRANSAKSI_DASHBOARD`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `VIEW_TRANSAKSI_DASHBOARD` (
`id_pelanggan` char(4)
,`no_resi` char(7)
,`tanggal_transaksi` date
,`tanggal_penjemputan` date
,`kota_tujuan` varchar(35)
,`status` varchar(10)
,`total_diskon` bigint(22)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `VIEW_CEK_HARGA`
--
DROP TABLE IF EXISTS `VIEW_CEK_HARGA`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `VIEW_CEK_HARGA`  AS  select `jalur`.`id_kota_awal` AS `id_kota_awal`,`jalur`.`id_kota_tujuan` AS `id_kota_tujuan`,`detail_jalur`.`id_kargo` AS `id_kargo`,(select `kota`.`nama_kota` from `kota` where `kota`.`id_kota` = `jalur`.`id_kota_awal`) AS `kota_awal`,(select `kota`.`nama_kota` from `kota` where `kota`.`id_kota` = `jalur`.`id_kota_tujuan`) AS `kota_tujuan`,`detail_jalur`.`harga` AS `harga` from (`jalur` join `detail_jalur`) where `jalur`.`id_jalur` = `detail_jalur`.`id_jalur` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `VIEW_DETAIL_JALUR`
--
DROP TABLE IF EXISTS `VIEW_DETAIL_JALUR`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `VIEW_DETAIL_JALUR`  AS  select `detail_jalur`.`id_jalur` AS `id_jalur`,`detail_jalur`.`id_kargo` AS `id_kargo`,`nama_kargo` AS `nama_kargo`,`detail_jalur`.`harga` AS `harga` from (`detail_jalur` join `kargo`) where `detail_jalur`.`id_kargo` = `kargo`.`id_kargo` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `VIEW_DETAIL_TRANSAKSI`
--
DROP TABLE IF EXISTS `VIEW_DETAIL_TRANSAKSI`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `VIEW_DETAIL_TRANSAKSI`  AS  select `detail_transaksi`.`no_resi` AS `no_resi`,`detail_transaksi`.`id_pelanggan` AS `id_pelanggan`,(select `info_barang`.`berat` * `detail_jalur`.`harga` from ((`transaksi` join `detail_jalur`) join `info_barang`) where `transaksi`.`id_jalur` = `detail_jalur`.`id_jalur` and `transaksi`.`id_kargo` = `detail_jalur`.`id_kargo` and `transaksi`.`id_barang` = `info_barang`.`id_barang` and `transaksi`.`no_resi` = `detail_transaksi`.`no_resi`) AS `total` from `detail_transaksi` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `VIEW_JALUR`
--
DROP TABLE IF EXISTS `VIEW_JALUR`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `VIEW_JALUR`  AS  select `jalur`.`id_jalur` AS `id_jalur`,(select `kota`.`nama_kota` from `kota` where `kota`.`id_kota` = `jalur`.`id_kota_awal`) AS `kota_awal`,(select `kota`.`nama_kota` from `kota` where `kota`.`id_kota` = `jalur`.`id_kota_tujuan`) AS `kota_tujuan` from `jalur` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `VIEW_PEGAWAI`
--
DROP TABLE IF EXISTS `VIEW_PEGAWAI`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `VIEW_PEGAWAI`  AS  select `pegawai`.`id_pegawai` AS `id_pegawai`,`pegawai`.`nama_pegawai` AS `nama_pegawai`,`pegawai`.`no_telp` AS `no_telp`,`pegawai`.`jenis_kelamin` AS `jenis_kelamin`,`pegawai`.`alamat` AS `alamat`,`user`.`username` AS `username` from (`pegawai` join `user`) where `pegawai`.`id_pegawai` = `user`.`id_user` and `user`.`level` = 'pegawai' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `VIEW_PELANGGAN`
--
DROP TABLE IF EXISTS `VIEW_PELANGGAN`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `VIEW_PELANGGAN`  AS  select `pelanggan`.`id_pelanggan` AS `id_pelanggan`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`pelanggan`.`email` AS `email`,`pelanggan`.`no_telp` AS `no_telp`,`user`.`username` AS `username` from (`pelanggan` join `user`) where `pelanggan`.`id_pelanggan` = `user`.`id_user` and `user`.`level` = 'pelanggan' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `VIEW_TRANSAKSI_DASHBOARD`
--
DROP TABLE IF EXISTS `VIEW_TRANSAKSI_DASHBOARD`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `VIEW_TRANSAKSI_DASHBOARD`  AS  select `detail_transaksi`.`id_pelanggan` AS `id_pelanggan`,`transaksi`.`no_resi` AS `no_resi`,`transaksi`.`tanggal_transaksi` AS `tanggal_transaksi`,`transaksi`.`tanggal_penjemputan` AS `tanggal_penjemputan`,(select `kota`.`nama_kota` from `kota` where `kota`.`id_kota` = `jalur`.`id_kota_tujuan`) AS `kota_tujuan`,`transaksi`.`status` AS `status`,(select if(strcmp((select `detail_transaksi`.`diskon` from `detail_transaksi` where `detail_transaksi`.`no_resi` = `transaksi`.`no_resi`),'YA') = 0,`VIEW_DETAIL_TRANSAKSI`.`total` - 20000,`VIEW_DETAIL_TRANSAKSI`.`total`) from `VIEW_DETAIL_TRANSAKSI` where `VIEW_DETAIL_TRANSAKSI`.`no_resi` = `transaksi`.`no_resi`) AS `total_diskon` from (((`transaksi` join `jalur`) join `kota`) join `detail_transaksi`) where `transaksi`.`id_jalur` = `jalur`.`id_jalur` and `jalur`.`id_kota_tujuan` = `kota`.`id_kota` and `transaksi`.`no_resi` = `detail_transaksi`.`no_resi` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`no_resi`);

--
-- Indeks untuk tabel `info_barang`
--
ALTER TABLE `info_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `info_penerima`
--
ALTER TABLE `info_penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indeks untuk tabel `info_pengirim`
--
ALTER TABLE `info_pengirim`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- Indeks untuk tabel `jalur`
--
ALTER TABLE `jalur`
  ADD PRIMARY KEY (`id_jalur`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kargo`
--
ALTER TABLE `kargo`
  ADD PRIMARY KEY (`id_kargo`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_resi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
