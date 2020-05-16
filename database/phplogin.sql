-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2020 pada 16.36
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phplogin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`) VALUES
(1, 'Dofir Fauzi', 'admin', 'dofirfauzi.1302@gmail.com', '$2y$10$atYTnj7mcNvvNjQlPIxdZuLXkHrt0NBI0/Cm7ikv.hVr7v1fBU9HG'),
(2, 'Anna', 'anna', 'anna@gmail.com', '$2y$10$0UjJ7o/0Y.lx/WNQK8OUmuEKbIeCqwxpxzsZliKYb4nOgbcAhPtNG'),
(4, 'admin', 'admin2', 'admin@admin', '$2y$10$AyaMe0JhrFIwPbnHNSn8W.b0YFeoWAc9..w42Zz17JZH/YZmPYPQC'),
(5, 'admin3', 'admin3', 'admin3@admin3.com', '$2y$10$/63JAmcJkJQz46iL9mwCleGFELcwK1x66dVN7sRKHO5DMN12Qnpbu'),
(6, 'admin4', 'admin4', 'admin4@admin4.com', '$2y$10$KVvOuDbBXmxLRnu5.Eqewe8wAzWLMRjLYsqqedCCOMlOXsR8sO9Tu'),
(7, 'admin5', 'admin5', 'admin5@admin5.com', '$2y$10$iAlpCzK4RJ/8jbWaBGdq7e7UsZdC1sBrH32tqJwpZewr5vJbfSkma');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
