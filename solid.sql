-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 01:45 PM
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
  `Id` int(11) NOT NULL,
  `Totale_Omzet_id` int(11) NOT NULL,
  `Sales_Omzet_id` int(11) NOT NULL,
  `Resource_Omzet_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_omzet`
--

CREATE TABLE `resource_omzet` (
  `Id` int(11) NOT NULL,
  `Unit_Id` int(11) NOT NULL,
  `Omzet` decimal(10,0) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_omzet`
--

CREATE TABLE `sales_omzet` (
  `Id` int(11) NOT NULL,
  `Unit_Id` int(11) NOT NULL,
  `Omzet` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `totale_omzet`
--

CREATE TABLE `totale_omzet` (
  `Id` int(11) NOT NULL,
  `Unit_Id` int(11) NOT NULL,
  `Omzet` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `Id` int(11) NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `Locatie` varchar(255) NOT NULL,
  `Manager` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Voornaam` varchar(255) NOT NULL,
  `Achternaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Totale_Omzet_id` (`Totale_Omzet_id`,`Sales_Omzet_id`,`Resource_Omzet_id`,`User_id`,`Unit_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Unit_id` (`Unit_id`),
  ADD KEY `Resource_Omzet_id` (`Resource_Omzet_id`),
  ADD KEY `Sales_Omzet_id` (`Sales_Omzet_id`);

--
-- Indexes for table `resource_omzet`
--
ALTER TABLE `resource_omzet`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Unit_Id` (`Unit_Id`,`User_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `sales_omzet`
--
ALTER TABLE `sales_omzet`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Unit_Id` (`Unit_Id`);

--
-- Indexes for table `totale_omzet`
--
ALTER TABLE `totale_omzet`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Unit_Id` (`Unit_Id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource_omzet`
--
ALTER TABLE `resource_omzet`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_omzet`
--
ALTER TABLE `sales_omzet`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `totale_omzet`
--
ALTER TABLE `totale_omzet`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `main_ibfk_5` FOREIGN KEY (`Totale_Omzet_id`) REFERENCES `totale_omzet` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
