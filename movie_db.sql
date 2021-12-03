-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 03 Des 2021 pada 16.16
-- Versi server: 5.7.31
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `nama_genre` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`, `deleted_at`) VALUES
(1, 'Sci-Fi', NULL),
(2, 'Adventure', NULL),
(3, 'Martial Arts', NULL),
(4, 'Action', NULL),
(5, 'Horror', NULL),
(8, 'Test', '2021-11-16 09:40:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

DROP TABLE IF EXISTS `modul`;
CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(11) NOT NULL AUTO_INCREMENT,
  `nm_modul` varchar(255) DEFAULT NULL,
  `judul_modul` varchar(255) NOT NULL,
  `icon_modul` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `nm_modul`, `judul_modul`, `icon_modul`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'genre_list', 'Movie Genre', 'list', NULL, '2021-11-17 08:01:49', '2021-11-17 08:02:10'),
(2, 'movie_list', 'Movie Data', 'film', NULL, '2021-11-23 08:36:43', '2021-11-23 08:36:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul_role`
--

DROP TABLE IF EXISTS `modul_role`;
CREATE TABLE IF NOT EXISTS `modul_role` (
  `id_modul` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_create` tinyint(4) NOT NULL,
  `is_read` tinyint(4) NOT NULL,
  `is_update` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_save` tinyint(4) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_modul`,`id_role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `modul_role`
--

INSERT INTO `modul_role` (`id_modul`, `id_role`, `is_create`, `is_read`, `is_update`, `is_delete`, `is_save`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, NULL, '2021-11-17 08:25:20', '2021-11-17 08:25:20'),
(1, 2, 1, 1, 1, 0, 1, NULL, '2021-11-17 08:25:20', '2021-11-17 08:25:20'),
(2, 1, 1, 1, 1, 1, 1, NULL, '2021-11-23 08:38:56', '2021-11-23 08:38:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE IF NOT EXISTS `movie` (
  `id_movie` int(11) NOT NULL AUTO_INCREMENT,
  `judul_movie` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `deskripsi` text NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_movie`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `movie`
--

INSERT INTO `movie` (`id_movie`, `judul_movie`, `tahun`, `deskripsi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(12, 'Bapakmu Adalah Istri Ibuqmu', 2020, 'Yeah', NULL, '2021-12-03 12:52:23', '2021-12-03 12:52:23'),
(11, 'Ajab Kang Pamer', 2020, 'Sefruit stori dari real life yeah', NULL, '2021-12-03 10:32:56', '2021-12-03 10:32:56'),
(10, 'Istriku Bukan Istrimu yeah', 2021, 'dasasd', NULL, '2021-12-03 10:11:46', '2021-12-03 10:11:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `movie_genre`
--

DROP TABLE IF EXISTS `movie_genre`;
CREATE TABLE IF NOT EXISTS `movie_genre` (
  `id_movie` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_movie`,`id_genre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `movie_genre`
--

INSERT INTO `movie_genre` (`id_movie`, `id_genre`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, 1, NULL, '2021-12-03 10:11:46', '2021-12-03 10:11:46'),
(10, 2, NULL, '2021-12-03 10:11:46', '2021-12-03 10:11:46'),
(10, 4, NULL, '2021-12-03 10:11:46', '2021-12-03 10:11:46'),
(11, 2, NULL, '2021-12-03 10:32:56', '2021-12-03 10:32:56'),
(11, 4, NULL, '2021-12-03 10:32:56', '2021-12-03 10:32:56'),
(11, 5, NULL, '2021-12-03 10:32:56', '2021-12-03 10:32:56'),
(12, 1, NULL, '2021-12-03 12:52:23', '2021-12-03 12:52:23'),
(12, 2, NULL, '2021-12-03 12:52:23', '2021-12-03 12:52:23'),
(12, 4, NULL, '2021-12-03 12:52:23', '2021-12-03 12:52:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nm_role` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nm_user` varchar(255) DEFAULT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `user_username`, `user_password`, `id_role`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, NULL, '2021-11-16 17:06:42', '2021-11-16 17:06:42'),
(2, 'Operator', 'operator', '827ccb0eea8a706c4c34a16891f84e7b', 2, NULL, '2021-11-23 08:01:10', '2021-11-23 08:01:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
