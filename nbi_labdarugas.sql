-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Ápr 12. 15:04
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `nbi_labdarugas`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `klub`
--

CREATE TABLE `klub` (
  `id` int(11) NOT NULL,
  `csapatnev` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `klub`
--

INSERT INTO `klub` (`id`, `csapatnev`) VALUES
(0, 'csapatnev'),
(1, 'Vasas FC'),
(2, 'Ferencvárosi TC'),
(3, 'Puskás Akadémia FC'),
(4, 'Debreceni VSC'),
(5, 'Budapest Honvéd FC'),
(6, 'Szombathelyi Haladás'),
(7, 'Paksi FC'),
(8, 'Mezőkövesd Zsóry FC'),
(9, 'Diósgyőri VTK'),
(10, 'Újpest FC'),
(11, 'Balmazújváros FC'),
(12, 'Videoton FC');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `labdarugo`
--

CREATE TABLE `labdarugo` (
  `id` int(11) NOT NULL,
  `mezszam` int(11) DEFAULT NULL,
  `klubid` int(11) DEFAULT NULL,
  `posztid` int(11) DEFAULT NULL,
  `utonev` varchar(50) DEFAULT NULL,
  `vezeteknev` varchar(50) DEFAULT NULL,
  `szulido` date DEFAULT NULL,
  `magyar` tinyint(1) DEFAULT NULL,
  `kulfoldi` tinyint(1) DEFAULT NULL,
  `ertek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `poszt`
--

CREATE TABLE `poszt` (
  `id` int(11) NOT NULL,
  `nev` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `poszt`
--

INSERT INTO `poszt` (`id`, `nev`) VALUES
(0, 'nev'),
(1, 'bal oldali védő'),
(2, 'jobb oldali középpályás'),
(3, 'bal szélső'),
(4, 'védekező középpályás'),
(5, 'bal oldali középpályás'),
(6, 'belső középpályás'),
(7, 'jobb szélső'),
(8, 'jobb oldali védő'),
(9, 'kapus'),
(10, 'középcsatár'),
(11, 'középső védő'),
(12, 'támadó középpályás'),
(13, 'hátravont csatár'),
(14, 'jobboldali védő');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `klub`
--
ALTER TABLE `klub`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `labdarugo`
--
ALTER TABLE `labdarugo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_labdarugo_klub` (`klubid`),
  ADD KEY `fk_labdarugo_poszt` (`posztid`);

--
-- A tábla indexei `poszt`
--
ALTER TABLE `poszt`
  ADD PRIMARY KEY (`id`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `labdarugo`
--
ALTER TABLE `labdarugo`
  ADD CONSTRAINT `fk_labdarugo_klub` FOREIGN KEY (`klubid`) REFERENCES `klub` (`id`),
  ADD CONSTRAINT `fk_labdarugo_poszt` FOREIGN KEY (`posztid`) REFERENCES `poszt` (`id`),
  ADD CONSTRAINT `labdarugo_ibfk_1` FOREIGN KEY (`klubid`) REFERENCES `klub` (`id`),
  ADD CONSTRAINT `labdarugo_ibfk_2` FOREIGN KEY (`posztid`) REFERENCES `poszt` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
