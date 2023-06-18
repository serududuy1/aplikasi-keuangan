-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2023 pada 05.10
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkeuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_akhir`
--

CREATE TABLE `saldo_akhir` (
  `id_saldo_akhir` int(11) NOT NULL,
  `id_trx` int(11) NOT NULL,
  `jml_trx` varchar(255) NOT NULL,
  `jml_saldo_akhir` varchar(255) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `saldo_akhir`
--

INSERT INTO `saldo_akhir` (`id_saldo_akhir`, `id_trx`, `jml_trx`, `jml_saldo_akhir`, `tgl`) VALUES
(1, 1, '500000', '500000', '2023-05-16'),
(2, 2, '600000', '1100000', '2023-05-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_awal`
--

CREATE TABLE `saldo_awal` (
  `id_saldo_awal` int(11) NOT NULL,
  `id_saldo_akhir` int(11) NOT NULL,
  `jml_saldo_awal` varchar(255) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `saldo_awal`
--

INSERT INTO `saldo_awal` (`id_saldo_awal`, `id_saldo_akhir`, `jml_saldo_awal`, `tgl`) VALUES
(1, 2, '1100000', '2023-06-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx`
--

CREATE TABLE `trx` (
  `id_trx` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jml_trx` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trx`
--

INSERT INTO `trx` (`id_trx`, `id_user`, `jml_trx`, `keterangan`, `tgl`) VALUES
(1, 3, '500000', 'saldo_masuk', '2023-05-16'),
(2, 3, '600000', 'saldo_masuk', '2023-05-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
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

INSERT INTO `users` (`id_user`, `recid`, `nama`, `rt`, `rw`, `alamat`, `tgl_lahir`, `pekerjaan`, `no_telp`, `status`, `usertype`, `username`, `password`, `level`) VALUES
(3, '1', 'Alexander Fayadl', 1, 1, 'Jl. Masjid 9 RT.RW 001/01  sudimara timur kec. Ciledug', '01-01-1990', 'Mahasiswa', '089668435864', 'aktif', 'ketua', 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(5, '1', 'Ari erawan', 3, 1, 'Gg. Plancu Rt003/01   sudimara timur kec. Ciledug', '16-04-2023', 'Wiraswasta', '085882527296', 'aktif', 'anggota', 'ari', '202cb962ac59075b964b07152d234b70', 'anggota'),
(6, '1', 'Anggi Agista', 3, 1, 'Gg. Plancu Rt003/01   sudimara timur kec. Ciledug', '23', 'Mahasiswa', '085872327299', 'aktif', 'anggota', 'Anggi', '202cb962ac59075b964b07152d234b70', 'anggota'),
(7, '1', 'Andi Kristanto', 3, 3, 'Jl.  H. Mencong Rt003/03 sudimara timur kec. Ciledug', '31', 'wiraswasta', '089854209766', 'aktif', 'wakil', 'Andi', '202cb962ac59075b964b07152d234b70', 'anggota');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `saldo_akhir`
--
ALTER TABLE `saldo_akhir`
  ADD PRIMARY KEY (`id_saldo_akhir`),
  ADD KEY `id_trx` (`id_trx`);

--
-- Indeks untuk tabel `saldo_awal`
--
ALTER TABLE `saldo_awal`
  ADD PRIMARY KEY (`id_saldo_awal`),
  ADD KEY `id_saldo_akhir` (`id_saldo_akhir`);

--
-- Indeks untuk tabel `trx`
--
ALTER TABLE `trx`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `saldo_akhir`
--
ALTER TABLE `saldo_akhir`
  MODIFY `id_saldo_akhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `saldo_awal`
--
ALTER TABLE `saldo_awal`
  MODIFY `id_saldo_awal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `trx`
--
ALTER TABLE `trx`
  MODIFY `id_trx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `saldo_akhir`
--
ALTER TABLE `saldo_akhir`
  ADD CONSTRAINT `saldo_akhir_ibfk_1` FOREIGN KEY (`id_trx`) REFERENCES `trx` (`id_trx`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `saldo_awal`
--
ALTER TABLE `saldo_awal`
  ADD CONSTRAINT `saldo_awal_ibfk_1` FOREIGN KEY (`id_saldo_akhir`) REFERENCES `saldo_akhir` (`id_saldo_akhir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trx`
--
ALTER TABLE `trx`
  ADD CONSTRAINT `trx_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
