-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 08:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vers`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `id` int(11) NOT NULL,
  `childname` varchar(100) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `nationality` varchar(50) NOT NULL DEFAULT 'Ethiopian',
  `adopterName` varchar(100) NOT NULL,
  `courtName` varchar(100) NOT NULL,
  `kebele` varchar(100) NOT NULL,
  `woreda` varchar(100) NOT NULL,
  `zone` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `registrationAddress` varchar(255) NOT NULL,
  `idFromCourt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `birth`
--

CREATE TABLE `birth` (
  `id` int(4) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `DateOfBirth` date NOT NULL DEFAULT current_timestamp(),
  `Gender` enum('male','female') NOT NULL DEFAULT 'male',
  `nationality` varchar(25) NOT NULL DEFAULT 'Ethiopian',
  `FatherName` varchar(25) NOT NULL,
  `MotherName` varchar(25) NOT NULL,
  `kebele` varchar(25) NOT NULL,
  `Woreda` varchar(25) NOT NULL,
  `zone` varchar(25) NOT NULL,
  `region` varchar(25) NOT NULL,
  `registrationAddress` varchar(25) NOT NULL,
  `IDFromHealthINS` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `birth`
--

INSERT INTO `birth` (`id`, `fullname`, `DateOfBirth`, `Gender`, `nationality`, `FatherName`, `MotherName`, `kebele`, `Woreda`, `zone`, `region`, `registrationAddress`, `IDFromHealthINS`) VALUES
(34, 'habtamu ', '2024-05-29', 'male', 'Ethiopian', 'laliga', 'alemitu', 'bbbds', 'sdfd', 'asda', 'Sad', 'asdas', 'asdA');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` longtext NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `submitted_at`) VALUES
(1, 'biruk dejene', 'birukedjn@gmail.com', '0908574808', 'wow i am surprise of this website', '2024-06-05 14:18:12'),
(2, 'alazar', 'alex@gmail.com', '0911117657', 'the owner of this website is amazing continue', '2024-06-05 14:32:19'),
(3, 'barkot', 'Barkibim1995@gmail.com', '0968631282', 'The web site is very very good. since we do not have any website that can register vital events,', '2024-06-05 14:49:54'),
(4, 'tsegish', 'tsega@gmail.com', '0900432345', 'faslfaf afafaf afa', '2024-06-05 14:57:06'),
(5, 'lfdhgfd', 'birukedjn@gmail.com', '0984738482', 'fkdsjfsdfs fsdkjfhsdkfj sdlfkdsjf', '2024-06-05 14:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `death`
--

CREATE TABLE `death` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `dateOfDeath` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `nationality` varchar(50) NOT NULL DEFAULT 'Ethiopian',
  `deathReason` varchar(255) NOT NULL,
  `approvedHealthINS` varchar(100) NOT NULL,
  `kebele` varchar(100) NOT NULL,
  `woreda` varchar(100) NOT NULL,
  `zone` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `registrationAddress` varchar(255) NOT NULL,
  `idFromHealthINS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divorce`
--

CREATE TABLE `divorce` (
  `id` int(11) NOT NULL,
  `spousemalefullname` varchar(100) NOT NULL,
  `spousefemalefullname` varchar(100) NOT NULL,
  `dateofdivorce` date NOT NULL,
  `reasonofdivorce` varchar(255) NOT NULL,
  `courtname` varchar(100) NOT NULL,
  `divorceidfromcourt` varchar(50) NOT NULL,
  `kebele` varchar(100) NOT NULL,
  `woreda` varchar(100) NOT NULL,
  `zone` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `registrationaddress` varchar(255) NOT NULL,
  `nationality` varchar(50) NOT NULL DEFAULT 'Ethiopian'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marriage`
--

CREATE TABLE `marriage` (
  `id` int(11) NOT NULL,
  `groomfullname` varchar(100) NOT NULL,
  `bridefullname` varchar(100) NOT NULL,
  `dateofmarriage` date NOT NULL,
  `institution` enum('religious ins','court','traditional ins') NOT NULL,
  `groomswitnessname` varchar(100) NOT NULL,
  `brideswitnessname` varchar(100) NOT NULL,
  `kebele` varchar(100) NOT NULL,
  `woreda` varchar(100) NOT NULL,
  `zone` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `registrationaddress` varchar(255) NOT NULL,
  `idfromins` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marriage`
--

INSERT INTO `marriage` (`id`, `groomfullname`, `bridefullname`, `dateofmarriage`, `institution`, `groomswitnessname`, `brideswitnessname`, `kebele`, `woreda`, `zone`, `region`, `registrationaddress`, `idfromins`) VALUES
(4, 'biruk mulu', 'kokeb biruk', '2024-06-14', 'religious ins', 'adonay desta', 'mihret feleke', 'limat', 'arba minch', 'gamo', 'SE', 'hawassa', 'kal/0843/16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Prefer not to say') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','registrar','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `phonenumber`, `password`, `gender`, `created_at`, `role`) VALUES
(1, 'biruk', 'admin', 'admin@gmail.com', '0908574808', 'admin1234', 'Male', '2024-06-14 20:12:48', 'admin'),
(14, 'Tsedey', 'registrar', 'registrar@gmail.com', '0928698445', 'registrar1234', 'Female', '2024-06-14 20:12:48', 'registrar'),
(16, 'fikerte', 'user', 'user@gmail.com', '0713698445', 'user123', 'Female', '2024-06-14 20:13:47', 'user'),
(29, 'jb', 'hggv', 'tf@gmail.com', '6788767576', '$2y$10$GMtSNdXZQhxXPpx.tWpUb.MgYcZOlGruE3Ou1myOQCWrLwyOU39cy', 'Male', '2024-06-15 06:39:36', 'registrar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idFromCourt` (`idFromCourt`);

--
-- Indexes for table `birth`
--
ALTER TABLE `birth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IDFromHealthINS` (`IDFromHealthINS`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `death`
--
ALTER TABLE `death`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idFromHealthINS` (`idFromHealthINS`);

--
-- Indexes for table `divorce`
--
ALTER TABLE `divorce`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divorceidfromcourt` (`divorceidfromcourt`);

--
-- Indexes for table `marriage`
--
ALTER TABLE `marriage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `idfromins` (`idfromins`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `birth`
--
ALTER TABLE `birth`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `death`
--
ALTER TABLE `death`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `divorce`
--
ALTER TABLE `divorce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marriage`
--
ALTER TABLE `marriage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
