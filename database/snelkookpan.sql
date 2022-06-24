-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 jun 2022 om 17:15
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snelkookpan`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `huizen`
--

CREATE TABLE `huizen` (
  `id` int(11) NOT NULL,
  `locatie` varchar(256) NOT NULL,
  `aantal_personen` int(11) NOT NULL,
  `prijs_per_dag` double NOT NULL,
  `afbeelding` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `huizen`
--

INSERT INTO `huizen` (`id`, `locatie`, `aantal_personen`, `prijs_per_dag`, `afbeelding`, `status`) VALUES
(1, 'Breda', 4, 70, 'img/huis1.jpg', 1),
(2, 'Zevenbergen', 7, 120, 'img/huis2.jpg', 0),
(3, 'Zevenbergen', 5, 80, 'img/huis3.jpg', 0),
(4, 'Rotterdam', 3, 65, 'img/huis4.jpg', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personeel`
--

CREATE TABLE `personeel` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservaties`
--

CREATE TABLE `reservaties` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `start_datum_reservatie` date NOT NULL,
  `eind_datum_reservatie` date NOT NULL,
  `id_gereserveerde_huis` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reservaties`
--

INSERT INTO `reservaties` (`id`, `email`, `phone_number`, `start_datum_reservatie`, `eind_datum_reservatie`, `id_gereserveerde_huis`, `status`) VALUES
(1, 'N.A.Slager@hotmail.com', 637603253, '2022-06-24', '2022-06-25', 1, 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `huizen`
--
ALTER TABLE `huizen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `personeel`
--
ALTER TABLE `personeel`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reservaties`
--
ALTER TABLE `reservaties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `huizen`
--
ALTER TABLE `huizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `personeel`
--
ALTER TABLE `personeel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `reservaties`
--
ALTER TABLE `reservaties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
