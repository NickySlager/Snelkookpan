-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 jun 2022 om 20:44
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
  `beschrijving` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `huizen`
--

INSERT INTO `huizen` (`id`, `locatie`, `aantal_personen`, `prijs_per_dag`, `afbeelding`, `beschrijving`, `status`) VALUES
(1, 'Breda', 4, 70, 'huis1.jpg', 'heel mooi huis', 0),
(2, 'Zevenbergen', 7, 120, 'huis2.jpg', 'Nog mooier huis', 0),
(3, 'Zevenbergen', 5, 80, 'huis3.jpg', '', 0),
(4, 'Rotterdam', 3, 65, 'huis4.jpg', '', 0),
(5, 'Breda', 3, 90, 'huis5.jpg', 'heel duur', 0),
(6, 'Breda', 7, 70, 'huis6.jpg', 'hallo', 0),
(7, 'Rotterdam', 3, 90, 'huis6.jpg', 'goedkoop', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personeel`
--

CREATE TABLE `personeel` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `personeel`
--

INSERT INTO `personeel` (`id`, `username`, `password`) VALUES
(1, 'baas', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f');

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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `review` text NOT NULL,
  `huis_id` int(11) NOT NULL,
  `date_of_posting` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `review`, `huis_id`, `date_of_posting`) VALUES
(24, 'DSADA', 'sdasda', 2, '2022-06-26'),
(25, 'safds', 'fdsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 2, '2022-06-26');

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
-- Indexen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `huizen`
--
ALTER TABLE `huizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `personeel`
--
ALTER TABLE `personeel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `reservaties`
--
ALTER TABLE `reservaties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT voor een tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
