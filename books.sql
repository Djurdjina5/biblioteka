-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Aug 30, 2022 at 08:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka2`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `author` varchar(150) NOT NULL,
  `person` varchar(50) DEFAULT NULL,
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `person`, `deadline`) VALUES
(1320, 'Umro sam u petak', 'Nenad Gugl', NULL, NULL),
(3495, 'Vatra i nista', 'Branko Miljkovic', NULL, NULL),
(4753, 'Dervis i smrt', 'Mesa Selimovic', 'pera', '2022-09-10'),
(5384, 'Idiot', 'Fjodor Dostojevski', NULL, NULL),
(6554, 'Na Drini cuprija', 'Ivo Andric', 'maja', '2022-09-16'),
(7895, 'Zlocin i kazna', 'Fjodor Dostojevski', NULL, NULL),
(9643, 'Prokleta avlija', 'Ivo Andric', NULL, NULL),
(13584, 'Tvrdjava', 'Mesa Selimovic', NULL, NULL),
(94386, 'Prokleta avlija', 'Ivo Andric', 'pera', '2022-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `first_name`, `last_name`, `type`) VALUES
('ana', 'ana123', 'Ana', 'Andjelkovic', 'bibliotekar'),
('maja', 'maja123', 'Marija', 'Maric', 'citalac'),
('paja', 'paja123', 'Pavle', 'Pajic', 'bibliotekar'),
('pera', 'pera123', 'Petar', 'Peric', 'citalac');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person` (`person`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_person` FOREIGN KEY (`person`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
