-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 20. Sep 2018 um 08:50
-- Server Version: 5.5.60-0+deb8u1
-- PHP-Version: 5.6.36-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `anmeldung_schule`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `berufekennungen`
--

CREATE TABLE IF NOT EXISTS `berufekennungen` (
  `AB_KURZBEZ` varchar(35) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `AB_BEZEICHNG` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `AB_NR` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Klasse` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Raum` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Erster_Schultag` varchar(100) COLLATE utf8_unicode_ci DEFAULT '12.09.2005',
  `AB_GEFUEHRT` int(11) NOT NULL DEFAULT '0',
  `Kammer` char(3) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `betriebedaten`
--

CREATE TABLE IF NOT EXISTS `betriebedaten` (
  `B_SCHLUESSEL` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `B_NAME1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B_NAME2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B_NAME4` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B_PLZ` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B_ORT` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B_STRASSE` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B_TELEFON1` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B_TELEFON2` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B_TELEFON3` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B_E_MAIL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B_GEMEINDEKZ` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `B_BBIG` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `herkunftsschulen`
--

CREATE TABLE IF NOT EXISTS `herkunftsschulen` (
  `HKS_NUMMER` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `HKS_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `HKS_STRASSE` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `HKS_PLZ` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `HKS_ORT` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `schuelerdaten`
--

CREATE TABLE IF NOT EXISTS `schuelerdaten` (
  `SID` int(11) NOT NULL DEFAULT '0',
  `ANREDE` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FAMILIENNAME` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `VORNAMEN` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `RUFNAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `GESCHLECHT` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `GEBURTSDATUM` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `GEBURTSJAHR` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `GEBURTSORT` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `GEBURTSLAND` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STAAT` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `BEKENNTNIS` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `FAMILIENSTAND` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `E_MAIL1` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ANSCHR1_STR` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ANSCHR1_PLZ` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ANSCHR1_ORT` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ANSCHR1_TEL` varchar(18) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ANSCHR1_FUER1` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANSCHR1_FUER2` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ERZB1_ART` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ERZB1_ANREDE` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ERZB1_FAMNAME` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ERZB1_RUFNAME` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ERZB1_TELEFON` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `E_MAIL2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ERZB2_ART` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ERZB2_ANREDE` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ERZB2_FAMNAME` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ERZB2_RUFNAME` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ERZB2_TELEFON` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANSCHR2_STR` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANSCHR2_PLZ` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANSCHR2_ORT` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANSCHR2_TEL` varchar(18) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ANSCHR2_FUER1` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ANSCHR2_FUER2` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `GASTSCHUELER` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UMSCHUELER` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `KOSTENTRAEGER` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TRAEGERSITZ` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `FOERDERUNGSNR` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SCHULPFLICHT` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TAGESHEIM` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AUSB_BEGINN` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `AUSB_ENDE` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `AUSB_DAUER` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AUSB_ART` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `AUSB_BERUF` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `AUSB_BETRIEB` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `B_NAME1` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `B_NAME4` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B_STRASSE` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `B_PLZ` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `B_ORT` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `B_TELEFON1` varchar(18) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `B_TELEFON2` varchar(18) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `B_TELEFON3` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B_E_MAIL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B_BBIG` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KAMMER` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EINTRITTSDATUM` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KLASSE` varchar(9) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `EINTR_JGST` int(11) NOT NULL DEFAULT '0',
  `VON_SCHULART` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `VON_SCHULNR` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `SCHUL_VORBILD` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `VORBILD_SCHUL` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sv_slbschule1` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sv_slbschule1eintritt` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sv_slbschule1austritt` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sv_slbschule2` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sv_slbschule2eintritt` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sv_slbschule2austritt` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sv_slbschule3` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sv_slbschule3eintritt` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sv_slbschule3austritt` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sv_slbschule4` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sv_slbschule4eintritt` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sv_slbschule4austritt` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ZUZUG_ART` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ZUZUG_DATUM` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KOMMENTAR` text COLLATE utf8_unicode_ci NOT NULL,
  `ANMELDEDATUM` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANMELDEZEIT` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `DEUTSCH` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `schuelerdaten`
--
ALTER TABLE `schuelerdaten`
 ADD PRIMARY KEY (`FAMILIENNAME`,`RUFNAME`,`GEBURTSDATUM`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
