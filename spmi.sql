-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Mar 2022 pada 09.17
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spmi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_induk`
--

CREATE TABLE `data_induk` (
  `induk_id` int(11) NOT NULL,
  `kode_induk` varchar(10) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `kebutuhan` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tahun_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_induk`
--

INSERT INTO `data_induk` (`induk_id`, `kode_induk`, `kategori_id`, `kebutuhan`, `nilai`, `tahun_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, 'MKA01', 1, 'Kebutuhan 1', 0, 4, 1, '2022-03-21 05:13:34', '2022-03-21 05:13:34'),
(2, 'MKA02', 2, 'Kebutuhan 2', 0, 4, 1, '2022-03-21 05:13:34', '2022-03-21 05:13:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator`
--

CREATE TABLE `indikator` (
  `indikator_id` int(11) NOT NULL,
  `nama_indikator` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `tipe_hasil` varchar(13) NOT NULL,
  `hasil` varchar(15) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `standar_id` int(11) NOT NULL,
  `induk_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `indikator`
--

INSERT INTO `indikator` (`indikator_id`, `nama_indikator`, `target`, `satuan`, `tipe_hasil`, `hasil`, `dokumen`, `keterangan`, `catatan`, `nilai`, `kriteria`, `standar_id`, `induk_id`, `created_at`, `updated_at`) VALUES
(2, 'Indikator 1', 'Target 1', 'Dokumen', 'Nilai', '', '', '', '', 0, '', 1, 1, '2022-03-21 05:14:29', '2022-03-21 05:14:29'),
(3, 'Indikator 2', 'Target 2', '', '', '', '', '', '', 0, '', 2, 2, '2022-03-21 05:14:29', '2022-03-21 05:14:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`) VALUES
(1, 'Penelitian'),
(2, 'Pengabdian Masyarakat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `standar`
--

CREATE TABLE `standar` (
  `standar_id` int(11) NOT NULL,
  `kode_standar` varchar(10) NOT NULL,
  `nama_standar` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tahun_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `standar`
--

INSERT INTO `standar` (`standar_id`, `kode_standar`, `nama_standar`, `status`, `nilai`, `tahun_id`, `kategori_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, 'S1', 'Standar 1', 'Belum Diisi', 0, 4, 1, 1, '2022-03-21 05:10:46', '2022-03-21 05:10:46'),
(2, 'S1', 'Standar 1', 'Belum Diisi', 0, 4, 2, 1, '2022-03-21 05:10:46', '2022-03-21 05:10:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supercode`
--

CREATE TABLE `supercode` (
  `id` int(11) NOT NULL,
  `supercode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supercode`
--

INSERT INTO `supercode` (`id`, `supercode`) VALUES
(1, '$2y$10$ufF4qOpdmH51RsZcmCrdouQrb8ByWjYAh2FmF4hWYpd3/2cq7Oo7m');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `tahun_id` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`tahun_id`, `tahun`) VALUES
(1, 2019),
(2, 2020),
(3, 2021),
(4, 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `user_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-03-21 05:10:21', '2022-03-21 05:10:21'),
(2, 1, 3, '2022-03-22 08:52:00', '2022-03-22 08:52:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `nama_unit` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `units`
--

INSERT INTO `units` (`unit_id`, `nama_unit`, `created_at`, `updated_at`) VALUES
(1, 'S1 - Informatika', '2022-03-16 08:46:39', '2022-03-16 08:46:39'),
(3, 'S1 - Matematika', '2022-03-22 08:50:46', '2022-03-22 08:50:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_transaksi`
--

CREATE TABLE `unit_transaksi` (
  `id_transunit` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit_transaksi`
--

INSERT INTO `unit_transaksi` (`id_transunit`, `id_unit`, `id_kategori`, `id_tahun`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, '2022-03-21 05:08:59', '2022-03-21 05:08:59'),
(2, 1, 2, 4, '2022-03-21 05:08:59', '2022-03-21 05:08:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nip` int(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `nama`, `username`, `email`, `nip`, `password`, `role`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Iwan Suryaningrat', 'wanss', 'iwansuryaningrat@students.undip.ac.id', 0, '$2y$10$CT.2xUoRBlE.UK3Fi1sdWOcsYICgFSQT9XYNxrxOn3JMxjQuXckIK', 'user', 'default.png', '2022-03-20 14:24:19', '2022-03-20 14:24:19'),
(2, 'Iwan Suryaningrat', 'sningrat_', 'iwan.suryaningrat28@gmail.com', 0, '$2y$10$rjG8FIDZU9Vo4fuh4TBM9OUvH6hhgKWV8aPc7cXqmhRVRHWifYpxG', 'admin', 'default.png', '2022-03-21 22:09:14', '2022-03-21 22:09:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_induk`
--
ALTER TABLE `data_induk`
  ADD PRIMARY KEY (`induk_id`),
  ADD KEY `unit_fk` (`unit_id`),
  ADD KEY `tahun_fk` (`tahun_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`indikator_id`),
  ADD KEY `datainduk_fk` (`induk_id`),
  ADD KEY `standar_fk` (`standar_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `standar`
--
ALTER TABLE `standar`
  ADD PRIMARY KEY (`standar_id`),
  ADD KEY `kategori_fk` (`kategori_id`),
  ADD KEY `tahun_id` (`tahun_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indeks untuk tabel `supercode`
--
ALTER TABLE `supercode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`tahun_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `users_fk` (`user_id`),
  ADD KEY `units_id` (`unit_id`);

--
-- Indeks untuk tabel `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indeks untuk tabel `unit_transaksi`
--
ALTER TABLE `unit_transaksi`
  ADD PRIMARY KEY (`id_transunit`),
  ADD KEY `id_unit` (`id_unit`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_tahun` (`id_tahun`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_induk`
--
ALTER TABLE `data_induk`
  MODIFY `induk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `indikator`
--
ALTER TABLE `indikator`
  MODIFY `indikator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `standar`
--
ALTER TABLE `standar`
  MODIFY `standar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `supercode`
--
ALTER TABLE `supercode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tahun`
--
ALTER TABLE `tahun`
  MODIFY `tahun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `unit_transaksi`
--
ALTER TABLE `unit_transaksi`
  MODIFY `id_transunit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_induk`
--
ALTER TABLE `data_induk`
  ADD CONSTRAINT `data_induk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`),
  ADD CONSTRAINT `tahun_fk` FOREIGN KEY (`tahun_id`) REFERENCES `tahun` (`tahun_id`),
  ADD CONSTRAINT `unit_fk` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`);

--
-- Ketidakleluasaan untuk tabel `indikator`
--
ALTER TABLE `indikator`
  ADD CONSTRAINT `datainduk_fk` FOREIGN KEY (`induk_id`) REFERENCES `data_induk` (`induk_id`),
  ADD CONSTRAINT `standar_fk` FOREIGN KEY (`standar_id`) REFERENCES `standar` (`standar_id`);

--
-- Ketidakleluasaan untuk tabel `standar`
--
ALTER TABLE `standar`
  ADD CONSTRAINT `kategori_fk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`),
  ADD CONSTRAINT `standar_ibfk_1` FOREIGN KEY (`tahun_id`) REFERENCES `tahun` (`tahun_id`),
  ADD CONSTRAINT `standar_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `units_id` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`),
  ADD CONSTRAINT `users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `unit_transaksi`
--
ALTER TABLE `unit_transaksi`
  ADD CONSTRAINT `unit_transaksi_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `units` (`unit_id`),
  ADD CONSTRAINT `unit_transaksi_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`kategori_id`),
  ADD CONSTRAINT `unit_transaksi_ibfk_3` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`tahun_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
