-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 10, 2021 la 10:24 PM
-- Versiune server: 10.4.17-MariaDB
-- Versiune PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `glume`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tabel_glume`
--

CREATE TABLE `tabel_glume` (
  `id` int(100) NOT NULL,
  `intrebare` text NOT NULL,
  `raspuns` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `tabel_glume`
--

INSERT INTO `tabel_glume` (`id`, `intrebare`, `raspuns`) VALUES
(1, 'De ce a trecut găina strada?', 'Pentru a ajunge pe partea cealaltă a drumului.'),
(2, 'Mama lui Ion are 4 copii: Maria, George și Matei. Cine este cel de-al patrulea copil?', 'Ion'),
(3, 'Ce îți aparține, dar îl folosesc mai mult alții?', 'Prenumele'),
(4, 'Ana are 5 mere. Câte mere are Ana?', '5 ( cinci )'),
(5, 'Nu-i pisică, nici motan. E dungat și roșcovan.', 'Tigrul'),
(6, 'Și un an de mă privești, tot pe tine te zărești.', 'Oglinda'),
(38, 'test', 'test'),
(39, 'test1', 'test1');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `tabel_glume`
--
ALTER TABLE `tabel_glume`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `intrebare` (`intrebare`) USING HASH;

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `tabel_glume`
--
ALTER TABLE `tabel_glume`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
