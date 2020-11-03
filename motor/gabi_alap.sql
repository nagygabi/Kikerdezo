-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Máj 10. 19:45
-- Kiszolgáló verziója: 10.1.30-MariaDB
-- PHP verzió: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `gabi_alap`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `angol`
--

CREATE TABLE `angol` (
  `ID` int(11) NOT NULL,
  `lecke` int(11) NOT NULL,
  `angol` varchar(70) COLLATE utf8_hungarian_ci NOT NULL,
  `magyar` varchar(70) COLLATE utf8_hungarian_ci NOT NULL,
  `szofaj` enum('főnév_noun','ige_verb','melléknév_adjectives','határozószó_adverb','kifejezés','egyéb') COLLATE utf8_hungarian_ci NOT NULL,
  `jo_valasz_szam` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `angol`
--

INSERT INTO `angol` (`Id`, `lecke`, `angol`, `magyar`, `szofaj`, `jo_valasz_szam`) VALUES
(1, 1, 'cash', 'készpénz', 'főnév_noun', 0),
(2, 1, 'sale', 'eladás', 'főnév_noun', 0),
(3, 1, 'deposit', 'letét', 'főnév_noun', 0),
(4, 0, 'prosecute', 'vádat emel', 'ige_verb', 0),
(5, 1, 'briefly', 'röviden', 'határozószó_adverb', 0),
(6, 1, 'two', 'kettő', 'egyéb', 0),
(7, 1, 'run', 'fut', 'ige_verb', 0),
(8, 2, 'go', 'megy', 'ige_verb', 0),
(9, 2, 'three', 'három', 'egyéb', 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `angol`
--
ALTER TABLE `angol`
  ADD KEY `ID` (`Id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `angol`
--
ALTER TABLE `angol`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
