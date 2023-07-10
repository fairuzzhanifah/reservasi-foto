-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2023 pada 04.06
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cws`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(30) NOT NULL,
  `password_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_confirm` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `numOfPeople` int(11) NOT NULL,
  `tanggal_booking` text NOT NULL,
  `jam_booking` varchar(30) NOT NULL,
  `background` enum('BLUE','BROWN','WHITE') NOT NULL,
  `paket` enum('WEEKDAYS','WEEKEND','PROMO') NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_confirm`, `name`, `email`, `phone`, `instagram`, `numOfPeople`, `tanggal_booking`, `jam_booking`, `background`, `paket`, `status`, `user_id`) VALUES
(5, 'fairuz', 'fairuzhanifah@gmail.com', '082339147307', 'fairuzzhanifah', 2, '2023-06-24', '11:00 PM', 'BLUE', 'WEEKDAYS', 'COMPLETED', 3),
(6, 'fairuz', 'fairuzhanifah@gmail.com', '082339147307', 'fairuzzhanifah', 2, '2023-06-25', '11:30 PM', 'BLUE', 'WEEKDAYS', 'COMPLETED', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `tipe_file` varchar(255) NOT NULL,
  `ukuran_file` int(11) NOT NULL,
  `tanggal_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id_payment`, `nama_file`, `tipe_file`, `ukuran_file`, `tanggal_upload`, `status`) VALUES
(1, '20016, 21059, 21069_Kelompok B.png', 'image/png', 983909, '2023-06-15 08:07:09', ''),
(2, '5917-removebg-preview.png', 'image/png', 73693, '2023-06-15 09:29:55', ''),
(3, 'Screenshot 2023-05-31 215902.png', 'image/png', 877742, '2023-06-15 09:31:49', ''),
(4, 'ACTIVITY 3.jpg', 'image/jpeg', 176903, '2023-06-15 09:39:04', ''),
(5, 'pertemuan19 (1).png', 'image/png', 102747, '2023-06-24 07:45:58', ''),
(6, 'Pertemuan19 (2).png', 'image/png', 495346, '2023-06-24 11:28:21', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `email`, `number`, `password`) VALUES
(3, 'fairuz', 'fairuzhnf@gmail.com', '081907977994', 'fei12'),
(5, 'Gilang', 'gilang@gmail.com', '081937111222', 'gilang123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `kd_review` int(11) NOT NULL,
  `user_name` mediumtext NOT NULL,
  `user_rating` int(11) NOT NULL,
  `user_review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`kd_review`, `user_name`, `user_rating`, `user_review`) VALUES
(3, 'fairuz', 5, 'bintang 5 bangeeet buat studio fotonya, baguuusss dan estetik parah <3'),
(5, 'Gilang', 5, 'bagus,keren'),
(6, 'zayyan', 4, 'perlu ditingkatkan lagi'),
(7, 'Miftah', 5, 'overall smua oke');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_confirm`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`kd_review`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_confirm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `kd_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
