-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2023 pada 07.00
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acara`
--

CREATE TABLE `acara` (
  `id_acara` int(11) NOT NULL,
  `id_trx` int(11) NOT NULL,
  `nama_acara` varchar(255) NOT NULL,
  `tempat_acara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `acara`
--

INSERT INTO `acara` (`id_acara`, `id_trx`, `nama_acara`, `tempat_acara`) VALUES
(36, 73, 'uang kas', ''),
(37, 74, 'infak', ''),
(44, 82, 'saldo_awal', ''),
(45, 83, 'saldo_awal', ''),
(46, 84, 'acara', ''),
(47, 85, 'tamasya', 'asdlakldjalsjdlasasd'),
(48, 86, 'jalan jalan', 'asdihjiopgfefe'),
(49, 87, 'uang kas', ''),
(50, 88, 'uang kas', ''),
(51, 89, 'dll', ''),
(52, 90, 'uang kas', ''),
(53, 91, 'uang kas', ''),
(54, 92, 'infak', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saldo_akhir`
--

INSERT INTO `saldo_akhir` (`id_saldo_akhir`, `id_trx`, `jml_trx`, `jml_saldo_akhir`, `tgl`) VALUES
(34, 73, '100000', '100000', '2023-06-12'),
(35, 74, '900000', '1000000', '2023-06-12'),
(39, 82, '1000000', '1000000', '2023-07-17'),
(40, 83, '1000000', '1000000', '2023-07-17'),
(41, 84, '900000', '1900000', '2023-07-17'),
(42, 85, '100000', '1800000', '2023-07-19'),
(43, 86, '300000', '1500000', '2023-07-31'),
(44, 87, '500000', '2000000', '2023-07-21'),
(45, 92, '5000', '2005000', '2023-07-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_awal`
--

CREATE TABLE `saldo_awal` (
  `id_saldo_awal` int(11) NOT NULL,
  `id_saldo_akhir` int(11) NOT NULL,
  `jml_saldo_awal` varchar(255) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saldo_awal`
--

INSERT INTO `saldo_awal` (`id_saldo_awal`, `id_saldo_akhir`, `jml_saldo_awal`, `tgl`) VALUES
(18, 35, '1000000', '2023-07-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx`
--

CREATE TABLE `trx` (
  `id_trx` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jml_trx` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status_trx` varchar(255) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trx`
--

INSERT INTO `trx` (`id_trx`, `id_user`, `jml_trx`, `keterangan`, `status_trx`, `tgl`) VALUES
(73, 3, '100000', 'saldo_masuk', 'terima', '2023-06-12'),
(74, 5, '900000', 'saldo_masuk', 'terima', '2023-06-12'),
(82, 3, '1000000', 'saldo_awal', 'terima', '2023-07-17'),
(83, 3, '1000000', 'saldo_awal', 'terima', '2023-07-17'),
(84, 3, '900000', 'saldo_masuk', 'terima', '2023-07-17'),
(85, 3, '100000', 'saldo_keluar', 'terima', '2023-07-19'),
(86, 3, '300000', 'saldo_keluar', 'terima', '2023-07-31'),
(87, 5, '500000', 'saldo_masuk', 'terima', '2023-07-21'),
(88, 5, '50000', 'saldo_masuk', 'kirim', '2023-07-21'),
(89, 5, '200000', 'saldo_masuk', 'kirim', '2023-07-21'),
(90, 5, '100000', 'saldo_masuk', 'kirim', '2023-07-21'),
(91, 5, '300000', 'saldo_masuk', 'kirim', '2023-07-21'),
(92, 5, '5000', 'saldo_masuk', 'terima', '2023-07-21');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indeks untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`),
  ADD KEY `fk_acara` (`id_trx`);

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
-- AUTO_INCREMENT untuk tabel `acara`
--
ALTER TABLE `acara`
  MODIFY `id_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `saldo_akhir`
--
ALTER TABLE `saldo_akhir`
  MODIFY `id_saldo_akhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `saldo_awal`
--
ALTER TABLE `saldo_awal`
  MODIFY `id_saldo_awal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `trx`
--
ALTER TABLE `trx`
  MODIFY `id_trx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD CONSTRAINT `fk_acara` FOREIGN KEY (`id_trx`) REFERENCES `trx` (`id_trx`) ON DELETE CASCADE ON UPDATE CASCADE;

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
