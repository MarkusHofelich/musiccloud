-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Jun 2016 um 14:54
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `musicloud`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `block`
--

CREATE TABLE `block` (
  `mybool` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einladungscode`
--

CREATE TABLE `einladungscode` (
  `codes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `einladungscode`
--

INSERT INTO `einladungscode` (`codes`) VALUES
('A5BH9%aidiug9nj4w-dddz78sduohfnj-kerwgftu'),
('A5BH9%aidiug9nj4w-trfz78sduohfnj-kerwgftu'),
('Dezzy'),
('Markusistcool'),
('test');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `files`
--

INSERT INTO `files` (`id`, `file_name`, `uploaded`) VALUES
(1, '', '2016-06-15 12:47:43');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vorname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'nein' COMMENT 'Wenn Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `passwort`, `vorname`, `nickname`, `created_at`, `updated_at`, `ip`, `block`, `admin`) VALUES
(1, 'Z0mGr0HD@gmail.com', '$2y$10$9XM6dmVavbSh1Y.rkqOZlOOvczQlDbCQMj.znRMNfAiCglCaORwAe', 'Fabian | Admin', 'Z0mGr0HD', '2016-05-07 13:20:38', NULL, 'Admin', 0, 'ja'),
(2, 'spammarkus-social@yahoo.com', '$2y$10$zu3rKyPIBfXbS/mq.T2RNuLK449NuF2gT2qSjuxcMVtnU/3r6Goty', 'Markus | Admin', 'Markus', '2016-06-13 19:55:11', '2016-06-14 13:59:00', '95.114.67.20', 0, 'ja'),
(73, 'test1@test1.de', '$2y$10$gu.sclr1sPiW.6E2C0TA2OeVWOYcscZk4npG/LCrqvjHeKMcxc63C', 'test', 'test', '2016-06-17 11:42:40', NULL, '', 1, 'nein');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `einladungscode`
--
ALTER TABLE `einladungscode`
  ADD PRIMARY KEY (`codes`);

--
-- Indizes für die Tabelle `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
