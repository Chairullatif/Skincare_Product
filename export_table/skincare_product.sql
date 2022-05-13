-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Bulan Mei 2022 pada 11.29
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skincare_product`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `producer`
--

CREATE TABLE `producer` (
  `id_producer` int(3) NOT NULL,
  `company` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `producer`
--

INSERT INTO `producer` (`id_producer`, `company`, `country`, `is_delete`) VALUES
(1, 'Rohto Laboratories', 'Jepang', b'0'),
(2, 'PT. Vitapharm', 'Indonesia', b'0'),
(3, 'PT. Triniti Tunggal', 'Indonesia', b'0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(3) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `id_skin_type` int(3) NOT NULL,
  `id_skincare_type` int(3) NOT NULL,
  `id_producer` int(3) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `price`, `id_skin_type`, `id_skincare_type`, `id_producer`, `is_delete`) VALUES
(1, 'Skin Aqua SPF 50+ PA+++', 55000, 1, 1, 1, b'0'),
(2, 'Face Tonic Bengkuang', 20000, 2, 3, 2, b'0'),
(3, 'Face Tonic Lemon', 24000, 1, 3, 1, b'0'),
(4, 'Face Tonic Timun', 30000, 10, 5, 2, b'0');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `skincaredetail`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `skincaredetail` (
`id_product` int(3)
,`name_product` varchar(100)
,`price` int(10)
,`skincare_type` varchar(100)
,`skin_type` varchar(100)
,`company` varchar(100)
,`country` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skincare_type`
--

CREATE TABLE `skincare_type` (
  `id_skincare_type` int(3) NOT NULL,
  `skincare_type` varchar(100) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skincare_type`
--

INSERT INTO `skincare_type` (`id_skincare_type`, `skincare_type`, `is_delete`) VALUES
(1, 'Sunscreen', b'0'),
(2, 'Moisturizer', b'0'),
(3, 'Facial Wash', b'0'),
(4, 'Facial', b'1'),
(5, 'Serum', b'0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skin_type`
--

CREATE TABLE `skin_type` (
  `id_skin_type` int(3) NOT NULL,
  `skin_type` varchar(100) NOT NULL,
  `is_sensitive` bit(1) NOT NULL DEFAULT b'0',
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skin_type`
--

INSERT INTO `skin_type` (`id_skin_type`, `skin_type`, `is_sensitive`, `is_delete`) VALUES
(1, 'Normal', b'0', b'0'),
(2, 'Normal', b'1', b'0'),
(4, 'Dry', b'1', b'0'),
(10, 'Combinational', b'0', b'0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'khoirullatif334@gmail.com', 'khoirullatif334@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'khoirullatif333@gmail.com', 'khoirullatif333@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'chairullatif@students.undip.ac.id', 'chairullatif@students.undip.ac.id', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Struktur untuk view `skincaredetail`
--
DROP TABLE IF EXISTS `skincaredetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skincaredetail`  AS  select `d`.`id_product` AS `id_product`,`d`.`name_product` AS `name_product`,`d`.`price` AS `price`,`b`.`skincare_type` AS `skincare_type`,`a`.`skin_type` AS `skin_type`,`c`.`company` AS `company`,`c`.`country` AS `country` from (((`product` `d` join `skin_type` `a` on((`d`.`id_skin_type` = `a`.`id_skin_type`))) join `skincare_type` `b` on((`d`.`id_skincare_type` = `b`.`id_skincare_type`))) join `producer` `c` on((`d`.`id_producer` = `c`.`id_producer`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id_producer`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `FK_skin_type` (`id_skin_type`),
  ADD KEY `FK_skincare_type` (`id_skincare_type`),
  ADD KEY `FK_producer` (`id_producer`);

--
-- Indeks untuk tabel `skincare_type`
--
ALTER TABLE `skincare_type`
  ADD PRIMARY KEY (`id_skincare_type`);

--
-- Indeks untuk tabel `skin_type`
--
ALTER TABLE `skin_type`
  ADD PRIMARY KEY (`id_skin_type`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_producer` FOREIGN KEY (`id_producer`) REFERENCES `producer` (`id_producer`),
  ADD CONSTRAINT `FK_skin_type` FOREIGN KEY (`id_skin_type`) REFERENCES `skin_type` (`id_skin_type`),
  ADD CONSTRAINT `FK_skincare_type` FOREIGN KEY (`id_skincare_type`) REFERENCES `skincare_type` (`id_skincare_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
