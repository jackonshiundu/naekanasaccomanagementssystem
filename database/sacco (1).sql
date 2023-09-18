-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 12:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sacco`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned`
--

CREATE TABLE `assigned` (
  `Driver ID` int(11) NOT NULL,
  `Vehicle ID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Route` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `Serial Num` int(11) NOT NULL,
  `Day taken` date NOT NULL,
  `Time taken` time NOT NULL,
  `Amount` varchar(30) NOT NULL,
  `vehicle reg` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `idnumber` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `vehicle_reg` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`idnumber`, `username`, `contact`, `vehicle_reg`) VALUES
('31436265', 'john doe', '0765432776', 'KDE12'),
('37835698', 'kamau john', '0754764543', 'KDE12'),
('3795811', 'john doe', '0754678954', 'KBA 112A'),
('47548976', 'Bernard Kamau', '0754764543', 'KCD 276D'),
('65437968', 'Lavin Akongo', '0753463654', 'KDA 234D'),
('78904567', 'Jerry Echesa', '0753463654', 'KDB 456');

-- --------------------------------------------------------

--
-- Table structure for table `driversrecord`
--

CREATE TABLE `driversrecord` (
  `Serial_Num` int(30) NOT NULL,
  `Amount` varchar(30) NOT NULL,
  `Vehicles_Reg` varchar(255) NOT NULL,
  `squad` int(100) NOT NULL,
  `drivername` varchar(100) NOT NULL,
  `day_taken` date NOT NULL,
  `time_taken` time NOT NULL,
  `vehicle_owner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driversrecord`
--

INSERT INTO `driversrecord` (`Serial_Num`, `Amount`, `Vehicles_Reg`, `squad`, `drivername`, `day_taken`, `time_taken`, `vehicle_owner`) VALUES
(15, '20000', 'KCD 276D', 1, 'Bernard Kamau', '2023-07-19', '08:43:00', 'graham kanjiro'),
(16, '20000', 'KDB 456', 1, 'Jerry Echesa', '2023-07-20', '08:47:00', 'graham kanjiro'),
(17, '20000', 'KDB 456', 1, 'Jerry Echesa', '2023-07-20', '08:47:00', 'graham kanjiro'),
(18, '20000', 'KDA 234D', 2, 'Lavin Akongo', '2022-07-20', '09:48:00', 'mamuluki'),
(19, '20000', 'KCD 276D', 1, 'Bernard Kamau', '2020-07-17', '11:43:00', 'graham kanjiro'),
(20, '3500', 'KBA 112A', 2, 'john doe', '2020-07-11', '12:52:00', 'Valince Juma');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `vehicle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `idnumber`, `username`, `email`, `vehicle`) VALUES
(14, 34659867, 'graham kanjiro', 'john@gmail.com', 'KDE12'),
(16, 34285775, 'Valince Juma', 'valince@gmali.com', 'KBA 112A'),
(17, 27564438, 'jackon shiundu', 'jackon@gmail.com', 'KCD 564C'),
(18, 37485739, 'mamuluki', 'mamuluki@gmail.com', 'KDA 234D'),
(19, 27114587, 'graham kanjiro', 'graham@gmail.com', 'KDE12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `idnumber`, `password`, `role`) VALUES
(4, 'Peter Leia', 31234123, 'peter', 'driver'),
(5, 'John Lutta', 2147483647, 'john', 'owner'),
(6, 'Valince Juma', 324243345, 'valince', 'owner'),
(7, 'Lavin Akongo', 41234123, 'lavin', 'driver'),
(10, 'Peter Motonga', 37485994, 'peter', 'admin'),
(11, 'kamau john', 34567784, 'kamau', 'driver'),
(12, 'jackon shiundu', 3795811, 'jackon', 'owner'),
(13, 'mamuluki', 386123876, 'mamuluki', 'owner'),
(14, 'Njenga Kamau', 47548976, 'kamau', 'owner'),
(15, 'Bernard Kamau', 31436265, 'kamau', 'driver'),
(16, 'Jerry Echesa', 78904567, 'jerry', 'driver'),
(17, 'graham kanjiro', 34285775, 'graham', 'owner'),
(18, 'john doe', 37658743, 'john', 'driver');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `numberplate` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `driver` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`numberplate`, `brand`, `driver`, `owner`) VALUES
('KBA 112A', 'TX', 'john doe', 'Valince Juma'),
('KCD 276D', 'Toyota', 'Bernard Kamau', 'graham kanjiro'),
('KCD 564C', 'MARCEDEZ', 'Peter Leia', 'jackon shiundu'),
('KDA 234D', 'SUZUKI', 'Lavin Akongo', 'mamuluki'),
('KDB 456', 'Toyota', 'Jerry Echesa', 'graham kanjiro'),
('KDE12', 'toyota', 'kamau john', 'John Lutta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned`
--
ALTER TABLE `assigned`
  ADD PRIMARY KEY (`Driver ID`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`Serial Num`),
  ADD KEY `vehicle reg` (`vehicle reg`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`idnumber`),
  ADD KEY `vehicle_reg` (`vehicle_reg`);

--
-- Indexes for table `driversrecord`
--
ALTER TABLE `driversrecord`
  ADD PRIMARY KEY (`Serial_Num`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle` (`vehicle`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`numberplate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driversrecord`
--
ALTER TABLE `driversrecord`
  MODIFY `Serial_Num` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned`
--
ALTER TABLE `assigned`
  ADD CONSTRAINT `assigned_ibfk_1` FOREIGN KEY (`Driver ID`) REFERENCES `owners` (`id`);

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`vehicle_reg`) REFERENCES `vehicles` (`numberplate`) ON DELETE CASCADE;

--
-- Constraints for table `owners`
--
ALTER TABLE `owners`
  ADD CONSTRAINT `owners_ibfk_1` FOREIGN KEY (`vehicle`) REFERENCES `vehicles` (`numberplate`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
