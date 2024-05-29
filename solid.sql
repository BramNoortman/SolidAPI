-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 10:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solid`
--

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `id` int(11) NOT NULL,
  `totale_omzet_id` int(11) NOT NULL,
  `sales_omzet_id` int(11) NOT NULL,
  `resource_omzet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_omzet`
--

CREATE TABLE `resource_omzet` (
  `id` int(11) NOT NULL,
  `unit_Id` int(11) NOT NULL,
  `omzet` float NOT NULL,
  `user_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource_omzet`
--

INSERT INTO `resource_omzet` (`id`, `unit_Id`, `omzet`, `user_Id`) VALUES
(1, 1, 21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales_omzet`
--

CREATE TABLE `sales_omzet` (
  `id` int(11) NOT NULL,
  `unit_Id` int(11) NOT NULL,
  `omzet` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_omzet`
--

INSERT INTO `sales_omzet` (`id`, `unit_Id`, `omzet`) VALUES
(1, 1, 10.55);

-- --------------------------------------------------------

--
-- Table structure for table `totale_omzet`
--

CREATE TABLE `totale_omzet` (
  `id` int(11) NOT NULL,
  `unit_Id` int(11) NOT NULL,
  `omzet` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `totale_omzet`
--

INSERT INTO `totale_omzet` (`id`, `unit_Id`, `omzet`) VALUES
(1, 1, 15.5);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `locatie` varchar(255) NOT NULL,
  `manager` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `naam`, `locatie`, `manager`) VALUES
(1, 'Finance', 'Brugstraat 2 6191 KC Beek Nederland', 'Joost Schouren');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `voornaam`, `achternaam`) VALUES
(1, '507191@vistacollege.nl', 'Bram', 'Noortman'),
(2, '509647@vistacollege.nl', 'Joris', 'de Vries');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Totale_Omzet_id` (`totale_omzet_id`,`sales_omzet_id`,`resource_omzet_id`,`user_id`,`unit_id`),
  ADD KEY `User_id` (`user_id`),
  ADD KEY `Unit_id` (`unit_id`),
  ADD KEY `sales_omzet_id` (`sales_omzet_id`),
  ADD KEY `resource_omzet_id` (`resource_omzet_id`);

--
-- Indexes for table `resource_omzet`
--
ALTER TABLE `resource_omzet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Unit_Id` (`unit_Id`,`user_Id`),
  ADD KEY `User_Id` (`user_Id`);

--
-- Indexes for table `sales_omzet`
--
ALTER TABLE `sales_omzet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Unit_Id` (`unit_Id`);

--
-- Indexes for table `totale_omzet`
--
ALTER TABLE `totale_omzet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Unit_Id` (`unit_Id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource_omzet`
--
ALTER TABLE `resource_omzet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_omzet`
--
ALTER TABLE `sales_omzet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `totale_omzet`
--
ALTER TABLE `totale_omzet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `main`
--
ALTER TABLE `main`
  ADD CONSTRAINT `main_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `main_ibfk_2` FOREIGN KEY (`Unit_id`) REFERENCES `unit` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `main_ibfk_3` FOREIGN KEY (`Resource_Omzet_id`) REFERENCES `resource_omzet` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `main_ibfk_4` FOREIGN KEY (`Sales_Omzet_id`) REFERENCES `sales_omzet` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `main_ibfk_5` FOREIGN KEY (`Totale_Omzet_id`) REFERENCES `totale_omzet` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `main_ibfk_6` FOREIGN KEY (`sales_omzet_id`) REFERENCES `sales_omzet` (`Id`),
  ADD CONSTRAINT `main_ibfk_7` FOREIGN KEY (`resource_omzet_id`) REFERENCES `resource_omzet` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `resource_omzet`
--
ALTER TABLE `resource_omzet`
  ADD CONSTRAINT `resource_omzet_ibfk_1` FOREIGN KEY (`Unit_Id`) REFERENCES `unit` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `resource_omzet_ibfk_2` FOREIGN KEY (`User_Id`) REFERENCES `user` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales_omzet`
--
ALTER TABLE `sales_omzet`
  ADD CONSTRAINT `sales_omzet_ibfk_1` FOREIGN KEY (`Unit_Id`) REFERENCES `unit` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `totale_omzet`
--
ALTER TABLE `totale_omzet`
  ADD CONSTRAINT `totale_omzet_ibfk_1` FOREIGN KEY (`Unit_Id`) REFERENCES `unit` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
