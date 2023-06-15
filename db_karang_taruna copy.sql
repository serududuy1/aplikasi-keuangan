-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2023 pada 04.08
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karang_taruna`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acara`
--

CREATE TABLE `acara` (
  `id` int(11) NOT NULL,
  `recid` varchar(10) NOT NULL,
  `tgl` varchar(40) NOT NULL,
  `nm_acara` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `saldo_akhir` int(100) NOT NULL,
  `saldo_keluar` int(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_keuangan`
--

CREATE TABLE `data_keuangan` (
  `id` int(11) NOT NULL,
  `saldo_masuk` int(100) NOT NULL,
  `saldo_awal` int(100) NOT NULL,
  `saldo_akhir` int(100) NOT NULL,
  `saldo_keluar` int(100) NOT NULL,
  `total_saldo` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_keuangan`
--


CREATE TABLE `saldo_awal` (
  `id_saldo_awal` int(11) NOT NULL AUTO_INCREMENT,
  `jml_saldo` varchar(255) NOT NULL,
  `id_saldo_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- INSERT INTO `saldo_awal` (`id_saldo_awal`, `jml_saldo`, `id_saldo_akhir`) VALUES
-- (1, 100000, 1);


CREATE TABLE `saldo_akhir` (
  `id_saldo_akhir` int(11) NOT NULL AUTO_INCREMENT,
  `id_trx` int(11) NOT NULL,
  `jml_saldo` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `jml_saldo_akhir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `transaksi`
--
CREATE TABLE `transaksi` (
  `id_trx` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_trx` date NOT NULL,
  `jml_trx` varchar(255) NOT NULL,
  `jenis_trx` varchar(255) NOT NULL,
  `id_acara` int(11) NOT NULL,
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- INSERT INTO `data_keuangan` (`id`, `saldo_masuk`, `saldo_awal`, `saldo_akhir`, `saldo_keluar`, `total_saldo`) VALUES
-- (1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------
-- Table structure for table `acara`
--
CREATE TABLE `acara` (
  `id_acara` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_acara` varchar(255) NOT NULL,
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `rt` int(4) NOT NULL,
  `rw` int(4) NOT NULL,
  `alamat` text NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `saldo_akhir` int(100) NOT NULL,
  `status` enum('kirim','terima') NOT NULL,
  `typeuang` enum('uang kas','infak','acara','dll') NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `recid` enum('0','1') NOT NULL,
  `nama` varchar(30) NOT NULL,
  `rt` int(4) NOT NULL,
  `rw` int(4) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `pekerjaan` varchar(40) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `usertype` enum('ketua','wakil','anggota') NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('admin','anggota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `recid`, `nama`, `rt`, `rw`, `alamat`, `tgl_lahir`, `pekerjaan`, `no_telp`, `status`, `usertype`, `username`, `password`, `level`) VALUES
(3, '1', 'Alexander Fayadl', 1, 1, 'Jl. Masjid 9 RT.RW 001/01  sudimara timur kec. Ciledug', '01-01-1990', 'Mahasiswa', '089668435864', 'aktif', 'ketua', 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(5, '1', 'Ari erawan', 3, 1, 'Gg. Plancu Rt003/01   sudimara timur kec. Ciledug', '16-04-2023', 'Wiraswasta', '085882527296', 'aktif', 'anggota', 'ari', '202cb962ac59075b964b07152d234b70', 'anggota'),
(6, '1', 'Anggi Agista', 3, 1, 'Gg. Plancu Rt003/01   sudimara timur kec. Ciledug', '23', 'Mahasiswa', '085872327299', 'aktif', 'anggota', 'Anggi', '202cb962ac59075b964b07152d234b70', 'anggota'),
(7, '1', 'Andi Kristanto', 3, 3, 'Jl.  H. Mencong Rt003/03 sudimara timur kec. Ciledug', '31', 'wiraswasta', '089854209766', 'aktif', 'wakil', 'Andi', '202cb962ac59075b964b07152d234b70', 'anggota');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_keuangan`
--
ALTER TABLE `data_keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `acara`
--
ALTER TABLE `acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `data_keuangan`
--
ALTER TABLE `data_keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
