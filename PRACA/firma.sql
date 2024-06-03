-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 02, 2024 at 05:48 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firma`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `budzet`
--

CREATE TABLE `budzet` (
  `id` int(11) NOT NULL,
  `typ` enum('miesięczny','roczny') NOT NULL,
  `kategoria` varchar(100) NOT NULL,
  `kwota` decimal(10,2) NOT NULL,
  `limit_budzetu` decimal(10,2) NOT NULL,
  `opis` text DEFAULT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL,
  `id_wydatki` int(11) DEFAULT NULL,
  `id_dochody` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cele`
--

CREATE TABLE `cele` (
  `id` int(11) NOT NULL,
  `kwota_celu` decimal(10,2) NOT NULL,
  `obecna_kwota` decimal(10,2) DEFAULT 0.00,
  `nazwa` varchar(255) NOT NULL,
  `data_rozpoczecia` date NOT NULL,
  `data_zakonczenia` date NOT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dochody`
--

CREATE TABLE `dochody` (
  `id` int(11) NOT NULL,
  `zrodlo` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `kwota` decimal(10,2) NOT NULL,
  `opis` varchar(100) DEFAULT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL,
  `budzet_id` int(11) DEFAULT NULL,
  `cel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `imie` varchar(100) NOT NULL,
  `nazwisko` varchar(100) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `kod_dodatkowy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wydatki`
--

CREATE TABLE `wydatki` (
  `id` int(11) NOT NULL,
  `kategoria` varchar(100) NOT NULL,
  `kwota` decimal(10,2) NOT NULL,
  `opis` text DEFAULT NULL,
  `data` date NOT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL,
  `budzet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `budzet`
--
ALTER TABLE `budzet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`),
  ADD KEY `id_wydatki` (`id_wydatki`),
  ADD KEY `id_dochody` (`id_dochody`);

--
-- Indeksy dla tabeli `cele`
--
ALTER TABLE `cele`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`);

--
-- Indeksy dla tabeli `dochody`
--
ALTER TABLE `dochody`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`),
  ADD KEY `budzet_id` (`budzet_id`),
  ADD KEY `cel_id` (`cel_id`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wydatki`
--
ALTER TABLE `wydatki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`),
  ADD KEY `budzet_id` (`budzet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budzet`
--
ALTER TABLE `budzet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cele`
--
ALTER TABLE `cele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dochody`
--
ALTER TABLE `dochody`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wydatki`
--
ALTER TABLE `wydatki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budzet`
--
ALTER TABLE `budzet`
  ADD CONSTRAINT `budzet_ibfk_1` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownik` (`id`),
  ADD CONSTRAINT `budzet_ibfk_2` FOREIGN KEY (`id_wydatki`) REFERENCES `wydatki` (`id`),
  ADD CONSTRAINT `budzet_ibfk_3` FOREIGN KEY (`id_dochody`) REFERENCES `dochody` (`id`);

--
-- Constraints for table `cele`
--
ALTER TABLE `cele`
  ADD CONSTRAINT `cele_ibfk_1` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownik` (`id`);

--
-- Constraints for table `dochody`
--
ALTER TABLE `dochody`
  ADD CONSTRAINT `dochody_ibfk_1` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownik` (`id`),
  ADD CONSTRAINT `dochody_ibfk_2` FOREIGN KEY (`budzet_id`) REFERENCES `budzet` (`id`),
  ADD CONSTRAINT `dochody_ibfk_3` FOREIGN KEY (`cel_id`) REFERENCES `cele` (`id`);

--
-- Constraints for table `wydatki`
--
ALTER TABLE `wydatki`
  ADD CONSTRAINT `wydatki_ibfk_1` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownik` (`id`),
  ADD CONSTRAINT `wydatki_ibfk_2` FOREIGN KEY (`budzet_id`) REFERENCES `budzet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
