-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 08:19 AM
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
-- Database: `legaldeposit`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `p_name` varchar(100) DEFAULT NULL,
  `p_of_pub` varchar(100) DEFAULT NULL,
  `y_of_pub` year(4) DEFAULT NULL,
  `isbn_ssn` varchar(30) DEFAULT NULL,
  `access_no` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `p_name`, `p_of_pub`, `y_of_pub`, `isbn_ssn`, `access_no`) VALUES
(6957071, 'i feel it coming', 'Dangy', 'jh', 'hsh', '1993', 'the', '234twvb'),
(40167394, 'yeuwishsk', 'hajalajslsl', 'ggggg', 'Abuja', '2002', '1234566', '222333'),
(56306423, 'a walk to remember', 'pius james', 'Look book', 'Abuja', '1998', 'bhnknknk', '526gftwwh'),
(59033741, 'to hell with you', 'Ahsewo kobo kobo ', 'tyheh hello', 'Akure', '2001', '5366tehh', '5t3thwhwb'),
(77248566, 'the header', 'jakakak', 'nkslla', 'Kano', '1996', '123eyuwikk', '26382910j'),
(79052047, 'the player', 'James', 'Wahala', 'Abuja', '1996', '2134thn', '2345'),
(528639114, 'yong and restless', 'Jamiu', 'Jam Jam ', 'Abuja', '2001', 'faghssjklalalal', 'gsshjakllaalal'),
(536132226, 'you and i', 'james brown ', 'yooo', 'Kano', '2003', '45rtyyh', '2345wtt'),
(912314213, 'yeuwishsk', 'hajalajslsl', 'ggggg', 'Abuja', '2002', '1234566', '222333');

-- --------------------------------------------------------

--
-- Table structure for table `legald`
--

CREATE TABLE `legald` (
  `id` int(11) NOT NULL,
  `l_dep_no` varchar(30) DEFAULT NULL,
  `copies_deposit` int(11) DEFAULT NULL,
  `s_o_dep` varchar(60) NOT NULL,
  `d_o_dep` date DEFAULT NULL,
  `contact_address` varchar(200) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `legald`
--

INSERT INTO `legald` (`id`, `l_dep_no`, `copies_deposit`, `s_o_dep`, `d_o_dep`, `contact_address`, `remark`, `book_id`) VALUES
(3, 'nkndskndskndsk', 25, '', NULL, 'tyhetwyuaaaj', ' jbkjbkjbkjbkjbkjb  ', 79052047),
(8, '5626g2hb', 10, '', NULL, 'jjjjjjjjjjjjjjjjjjj', ' i dont give a fuck', 56306423),
(9, '65wyhb', 3, '', NULL, 'uuuuuu', ' hello baybay', 536132226),
(10, '2436ywthehe', 3, '', NULL, 'rwteyeuwnqmqkqm', ' tetehhbssjjnlknklndncdcdnjkndklnklndz', 59033741),
(11, '243rfwywb', 10, 'Gombe', '2002-10-10', 'the', '   bndbnmdnmsmss  ', 6957071),
(12, '2345719yyuj', 3, 'Imo', '0000-00-00', 'abuja', ' vsgsgshsjskakkskssk', 528639114),
(14, '23433222', 3, 'Delta', '2020-02-02', 'kkakkakakak', ' one two three', 77248566);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(50) NOT NULL,
  `p_word` varchar(50) DEFAULT NULL,
  `f_name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `d_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `p_word`, `f_name`, `surname`, `type`, `d_created`) VALUES
('ab123', '1234', 'Isaiah', 'Ndakotsu', 'admin', NULL),
('baybay', '1234', 'Nigga', 'Bee', 'admin', '2024-04-12'),
('jesushanu', '2233', 'Shanu', 'James', 'admin', '2024-04-27'),
('User', '1111', 'nigga', 'nigga raw', 'staff', '2024-01-17'),
('user1111', '2222', 'hzkjbsks', 'kjbakbsks', 'staff', '2024-01-17'),
('usertester', '111', 'tuinteyu', 'wayyyo', 'admin', '2024-01-18'),
('we3345', '144', 'Yooo', 'jjajjaja', 'staff', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `legald`
--
ALTER TABLE `legald`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `legald`
--
ALTER TABLE `legald`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
