-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Mai 2020 um 00:48
-- Server-Version: 10.1.32-MariaDB
-- PHP-Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr13_mireille_bebon_bigevents`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `ID` int(10) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `start_time` datetime NOT NULL,
  `capacity` int(10) NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `images` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`ID`, `title`, `description`, `start_time`, `capacity`, `email`, `phone_number`, `url`, `type`, `venue`, `created_at`, `updated_at`, `deleted_at`, `images`) VALUES
(1, 'Into the night', 'Deleniti aut sunt iusto et necessitatibus. Ut minima molestiae est et porro. Quis sint sint vero unde voluptates aperiam aspernatur. Possimus voluptas cum iusto libero hic sed voluptatibus.', '2020-08-23 04:39:03', 150, 'cabaret@event.com', '+43 1 795 57 0', 'www.belvedere.at', 'festival & event', 'Rennweg 6\r\n1030 Wien', '2020-02-11 15:39:15', '2029-03-11 15:39:15', NULL, 'comedian.jpg'),
(2, 'Leopoldauer Alm\r\n', 'Deleniti aut sunt iusto et necessitatibus. Ut minima molestiae est et porro. Quis sint sint vero unde voluptates aperiam aspernatur. Possimus voluptas cum iusto libero hic sed voluptatibus.', '2009-00-00 11:00:00', 50, 'restaurant@event.com', '+43 1 2598380', 'www.leopoldaueralm.at', 'restaurant', 'Wagramer Straße 205 U1 Station Aderklaaer Strasse, Wien 1210 Österreich', '2020-02-11 15:39:15', '2029-03-11 15:39:15', NULL, 'res.jpg'),
(3, 'Meliá Vienna\r\n', 'Deleniti aut sunt iusto et necessitatibus. Ut minima molestiae est et porro. Quis sint sint vero unde voluptates aperiam aspernatur. Possimus voluptas cum iusto libero hic sed voluptatibus.', '2020-08-23 04:39:03', 150, 'hotel@event.com', '+43 1-385-0142 ', 'www.melia.com', 'hotel', 'Donau City Strasse 7, Wien 1220 Österreich', '2020-02-11 15:39:15', '2029-03-11 15:39:15', NULL, 'melia-vienna.jpg'),
(4, 'HundertwasserVillage', 'Deleniti aut sunt iusto et necessitatibus. Ut minima molestiae est et porro. Quis sint sint vero unde voluptates aperiam aspernatur. Possimus voluptas cum iusto libero hic sed voluptatibus.', '2020-08-23 04:39:03', 90, 'shopping@event.com', '\r\n+43 1 7104116', 'www.hundertwasser-village.com', 'shopping', 'Kegelgasse 37-39, Wien 1030 Österreich', '2020-02-11 15:39:15', '2029-03-11 15:39:15', NULL, 'hundertwasser-village.jpg'),
(5, 'The fringe', 'Deleniti aut sunt iusto et necessitatibus. Ut minima molestiae est et porro. Quis sint sint vero unde voluptates aperiam aspernatur. Possimus voluptas cum iusto libero hic sed voluptatibus.', '2020-08-23 04:39:03', 27, 'service@event.com', '\r\n+43 1 7104116', 'https://www.thefringe.at/', 'shopping', 'Lerchenfelderstraße 25, 1070 Wien, 7. Bezirk', '2020-02-11 15:39:15', '2029-03-11 15:39:15', NULL, 'coiffure.jpg'),
(6, 'Sie werden CHOCOLATIER für einen Tag', 'Deleniti aut sunt iusto et necessitatibus. Ut minima molestiae est et porro. Quis sint sint vero unde voluptates aperiam aspernatur. Possimus voluptas cum iusto libero hic sed voluptatibus.', '2020-08-23 04:39:03', 20, 'restaurant@event.com', '\r\n+43 660 8576848 ', 'www.chocolate-museum.wien', 'restaurant', 'Riesenradplatz 6, 1020 Wien, Austria', '2020-02-11 15:39:15', '2029-03-11 15:39:15', NULL, 'choco.jpg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
