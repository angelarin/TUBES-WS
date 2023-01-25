-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 08:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubespws`
--

-- --------------------------------------------------------

--
-- Table structure for table `sinopsis`
--

CREATE TABLE `sinopsis` (
  `id` int(11) NOT NULL,
  `Gambar` text DEFAULT NULL,
  `Judul` text DEFAULT NULL,
  `Deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sinopsis`
--

INSERT INTO `sinopsis` (`id`, `Gambar`, `Judul`, `Deskripsi`) VALUES
(1, 'https://i.ibb.co/fX4WfKp/novel1.jpg\r\n', 'HARRY POTTER', 'Harry Potter is a series of seven fantasy novels written by British author J. K. Rowling. The novels chronicle the lives of a young wizard, Harry Potter, and his friends Hermione Granger and Ron Weasley, all of whom are students at Hogwarts School of Witchcraft and Wizardry. The main story arc concerns Harry\'s struggle against Lord Voldemort, a dark wizard who intends to become immortal, overthrow the wizard governing body known as the Ministry of Magic and subjugate all wizards and Muggles (non-magical people).'),
(2, 'https://i.ibb.co/ftCSs2p/novel2.jpg\r\n', 'PERCY JACKSON', 'Percy Jackson & the Olympians is a series of five fantasy novels written by American author Rick Riordan. The novels are set in a world with the Greek gods in the 21st century, and follows the protagonist Percy Jackson, a young demigod who must prevent the Titans, led by Kronos (Cronus), from destroying the world.'),
(3, 'https://i.ibb.co/px969GV/novel3.jpg', '500 DAYS OF SUMMER', '500 Days of Summer is a 2009 American romantic comedy-drama film directed by Marc Webb from a screenplay written by Scott Neustadter and Michael H. Weber, and produced by Mark Waters. The film stars Joseph Gordon-Levitt and Zooey Deschanel, and employs a nonlinear narrative structure, with the story based upon its male protagonist and his memories of a failed relationship.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sinopsis`
--
ALTER TABLE `sinopsis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sinopsis`
--
ALTER TABLE `sinopsis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
