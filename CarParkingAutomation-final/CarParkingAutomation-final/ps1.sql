-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 07:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ps1`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `CarID` int(11) NOT NULL,
  `CarPlate` varchar(255) NOT NULL,
  `CarType` varchar(255) NOT NULL,
  `CarColour` varchar(255) NOT NULL,
  `Phone_Number` varchar(255) NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`CarID`, `CarPlate`, `CarType`, `CarColour`, `Phone_Number`, `time_in`) VALUES
(33, '1234566', 'benz', 'purple', '123456789', '2020-11-29 08:54:58'),
(34, '123456', 'new', 'indigo', '456', '2020-11-29 09:06:52'),
(35, '123456', 'vvp', 'blue', '123', '2020-11-29 09:26:20'),
(36, '123new', 'newtypw', 'newcolor', '123new', '2020-11-29 09:46:09'),
(37, '', '', '', '', '2020-11-29 10:23:48'),
(38, '123', '123', '123', '123', '2020-11-28 15:28:47'),
(39, '', '', '', '', '2020-11-29 17:01:30'),
(40, '', '', '', '', '2020-11-29 17:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `car_checkout`
--

CREATE TABLE `car_checkout` (
  `id` int(255) NOT NULL,
  `carPlate` varchar(255) NOT NULL,
  `time_out` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_checkout`
--

INSERT INTO `car_checkout` (`id`, `carPlate`, `time_out`) VALUES
(76, '', '2020-11-29 15:16:34'),
(77, '', '2020-11-29 15:16:58'),
(78, '', '2020-11-29 15:20:40'),
(79, 'KJH 354R', '2020-11-29 15:20:45'),
(80, '35645', '2020-11-29 15:21:03'),
(81, '35645', '2020-11-29 15:22:03'),
(82, 'kcc 123', '2020-11-29 15:22:08'),
(83, 'kcc 123', '2020-11-29 15:23:05'),
(84, 'kcc 123', '2020-11-29 15:23:27'),
(85, 'kcc 123', '2020-11-29 15:23:52'),
(86, 'kcc 123', '2020-11-29 15:24:43'),
(87, 'kcc 123', '2020-11-29 15:27:02'),
(88, 'kcc 123', '2020-11-29 15:27:44'),
(89, '35645', '2020-11-29 15:27:49'),
(90, 'bkfgr', '2020-11-29 15:27:55'),
(91, '123', '2020-11-29 15:28:56'),
(92, '123', '2020-11-29 15:30:32'),
(93, '123', '2020-11-29 15:31:04'),
(94, '123', '2020-11-29 15:31:58'),
(95, '123', '2020-11-29 15:32:25'),
(96, '123', '2020-11-29 15:32:33'),
(97, '123', '2020-11-29 15:33:34'),
(98, '123', '2020-11-29 15:33:39'),
(99, '123', '2020-11-29 15:34:03'),
(100, '123', '2020-11-29 15:35:02'),
(101, '123', '2020-11-29 15:35:06'),
(102, '123', '2020-11-29 15:37:38'),
(103, '123', '2020-11-29 15:38:31'),
(104, '123', '2020-11-29 17:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `Token_ID` varchar(255) NOT NULL,
  `Number_Plate` int(255) NOT NULL,
  `Parking_Spot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(255) NOT NULL,
  `UserToken` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `UserPassword` varchar(255) NOT NULL,
  `Type` enum('Admin','Master') NOT NULL DEFAULT 'Master'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserToken`, `UserName`, `UserPassword`, `Type`) VALUES
(1, '', 'hello', '$2y$10$MNwHrMtkEzQJTeOuvy692eAg4PGOFEq5m4ncIJkhwUV7m3ettyjpe', 'Master'),
(2, 'test123', 'test', '$2y$10$RerLCka9TOIlTRW2UhFNvefcW1JLBMla.vM6AAB9mKLnIzl9WFPey', 'Master'),
(3, 'Masteruser', 'Master User', '$2y$10$83bn1735T8DOeZsY0zoeEuziA0/uobJgqHbF9alEfNIkfi.ydbV/W', 'Admin'),
(4, 'Holla', 'Holla', '$2y$10$JBR3FDIUeDd8aFeU9Wiexu/Ty9QsqOVClCFd0zPxOhYqLFWlR4D.W', 'Master'),
(5, 'Yoki', 'Yoki', '$2y$10$9VAA7Z9mtxHpn5lEI3jJgOlWRxOeymBYGDbF7vHbklLEToiYCRSt.', 'Master'),
(6, 'kassam123', 'kassam', '$2y$10$1.0wxdAT.dOl1mzj3k4.NO8oR45K/P4ElE7pyMbFCnHVuaA7qnF9a', 'Master'),
(7, '120list', 'new user', '$2y$10$D/zN0YgQkqNA09z/PtKxH.V3YwLERhTZcgiuqtfrqZvNj2V1hI5ru', 'Master'),
(8, 'new', 'new', '$2y$10$SDJn4RVZYXsZe6pBAUG1DOfvpHPKfr.hqcxWAWtvxIKpFAzHFc/QO', 'Master');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `User_ID` int(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `User_Type` varchar(255) NOT NULL,
  `Session_ID` varchar(255) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`User_ID`, `UserName`, `User_Type`, `Session_ID`, `Timestamp`) VALUES
(6, 'kassam', 'Master', '070tk2up2ik6supn5rfaailvi8', '2020-11-29 16:47:33'),
(3, 'Master User', 'Admin', '0hdoqdp439m8rd616hhbbd8med', '2020-11-29 08:02:44'),
(3, 'Master User', 'Admin', '2je6kksvb99j6m0in0jjjfieno', '2020-11-17 09:33:17'),
(6, 'kassam', 'Master', '3qnj23bq1f281qfapa5ivlprmn', '2020-11-29 17:03:17'),
(3, 'Master User', 'Admin', '46evkehb6tr2kohgvaap8j5n64', '2020-11-17 09:24:13'),
(3, 'Master User', 'Admin', '4h28u8phgof2c2mmgmd27trjds', '2020-11-23 06:54:24'),
(3, 'Master User', 'Admin', '92fjo1kaa7f18c4k5h9hovru08', '2020-11-16 06:58:05'),
(3, 'Master User', 'Admin', 'acdmb44i5bk72eeagnvaie57vk', '2020-11-29 13:24:31'),
(3, 'Master User', 'Admin', 'bamfs4nf5rtaiqi26kqe7bcu5a', '2020-11-29 18:00:07'),
(6, 'kassam', 'Master', 'bngs5kbokjg2plt75rhmj2lcph', '2020-11-29 16:49:42'),
(3, 'Master User', 'Admin', 'catiad3784klq19ipt6pi5560s', '2020-11-29 17:48:32'),
(6, 'kassam', 'Master', 'dh63rkloh7ro5m7hsuetlka4qu', '2020-11-29 14:40:07'),
(3, 'Master User', 'Admin', 'du2914eg0apfmoe3dj6s80klle', '2020-11-29 12:09:58'),
(4, 'Holla', 'Master', 'en2apgmt311hc5mvtk7tfnrgmn', '2020-11-16 05:10:35'),
(6, 'kassam', 'Master', 'gbdcgphbf4aa6dnfpeg1uuua60', '2020-11-23 08:35:51'),
(6, 'kassam', 'Master', 'h1lcip1dk8nlj67iv957ee9peg', '2020-11-22 14:28:36'),
(3, 'Master User', 'Admin', 'hmnv0do7usi9flsj7hcjjv0fv4', '2020-11-29 11:49:03'),
(4, 'Holla', 'Master', 'kbav0otqd33o8le1o0m1juhfo5', '2020-11-16 12:53:56'),
(3, 'Master User', 'Admin', 'lbsjrv0sl1ipvvamjj93j2lnuc', '2020-11-29 16:09:25'),
(5, 'Yoki', 'Master', 'mkl168bs1tjt5pkkhlhad974a6', '2020-11-16 07:53:37'),
(4, 'Holla', 'Master', 'nr061bcu27v2fqjr657hthkhag', '2020-11-16 05:45:01'),
(3, 'Master User', 'Admin', 'p730rnbt403q1tpuibk5phs44i', '2020-11-16 05:43:48'),
(3, 'Master User', 'Admin', 'qhr6n4qh7k8dr9oku3v2tarh3g', '2020-11-29 11:50:33'),
(4, 'Holla', 'Master', 'sc0rdjqqabgjjt5oec3rf4jvk7', '2020-11-17 09:27:06'),
(6, 'kassam', 'Master', 'smm7rm0hk3jdcf5ekk6vrlocds', '2020-11-29 16:53:52'),
(6, 'kassam', 'Master', 'ukm9cdfg08s1olq2hc640ncm9o', '2020-11-29 17:51:02'),
(3, 'Master User', 'Admin', 'vlao1s3jn5fgvco5fh7vm59huj', '2020-11-29 16:37:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`CarID`);

--
-- Indexes for table `car_checkout`
--
ALTER TABLE `car_checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`Token_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`Session_ID`),
  ADD KEY `Foreign Key` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `CarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `car_checkout`
--
ALTER TABLE `car_checkout`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`User_ID`) REFERENCES `user` (`UserID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
