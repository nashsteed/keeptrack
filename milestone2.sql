-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 03:33 AM
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
-- Database: `4750project`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrowID` int(11) NOT NULL,
  `userID1` int(11) NOT NULL,
  `dbID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrowID`, `userID1`, `dbID`, `itemID`) VALUES
(1, 2, 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `databaseinfo`
--

CREATE TABLE `databaseinfo` (
  `dbID` int(11) NOT NULL,
  `dbName` varchar(30) DEFAULT NULL,
  `locList` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `databaseinfo`
--

INSERT INTO `databaseinfo` (`dbID`, `dbName`, `locList`) VALUES
(120, 'testdb', 'locationslisttest'),
(121, 'MyGarage', 'shelf, drawer'),
(122, 'Bennett Family Possessions', 'closet, drawer'),
(123, 'belongingsDB', 'living room, closet'),
(124, 'eddie1234', 'living room, bedroom1, bedroom2'),
(125, 'CVILLE House', 'shelf, cabinet'),
(126, 'KeepingTrack!', 'cabinet, kitchen'),
(127, 'myStuff', 'living room, closet'),
(128, 'user1234sDB', 'bedroom1, bedroom2'),
(129, 'allofmybelongings', 'bedroom1, bedroom2, garage, shed');

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `friendID` int(11) NOT NULL,
  `userID1` int(11) NOT NULL,
  `userID2` int(11) NOT NULL,
  `dbID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`friendID`, `userID1`, `userID2`, `dbID`) VALUES
(1, 1, 3, 122),
(2, 2, 5, 121),
(3, 6, 7, 126),
(4, 4, 7, 123),
(5, 2, 6, 125),
(6, 1, 9, 128),
(7, 1, 10, 129),
(8, 1, 6, 120),
(9, 4, 8, 127),
(10, 1, 10, 120),
(11, 1, 3, 122),
(12, 2, 5, 121),
(13, 6, 7, 126),
(14, 4, 7, 123),
(15, 2, 6, 125),
(16, 1, 9, 128),
(17, 1, 10, 129),
(18, 1, 6, 120),
(19, 4, 8, 127),
(20, 1, 10, 120);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `image` varchar(400) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `dbID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL CHECK (`quantity` >= 1),
  `adjList` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `itemName`, `location`, `image`, `description`, `dbID`, `quantity`, `adjList`) VALUES
(1, 'hammer', 'garage', 'https://www.acwholesalers.com/products-image/600/rap12525_107217_1000.jpg', 'a nice hammer with black handle', 120, 1, 'saw, table'),
(2, 'clothes', 'bedroom', 'https://t3.ftcdn.net/jpg/02/10/85/26/360_F_210852662_KWN4O1tjxIQt8axc2r82afdSwRSLVy7g.jpg', 'jacketx and shirts', 121, 4, 'desk, table'),
(3, 'Tape Measure', 'shed', 'https://www.acwholesalers.com/products-image/600/rap12525_107217_1000.jpg', 'nice tape measure', 122, 1, 'saw, hammer'),
(4, 'shirts', 'master bedroom', 'https://t3.ftcdn.net/jpg/02/10/85/26/360_F_210852662_KWN4O1tjxIQt8axc2r82afdSwRSLVy7g.jpg', 'jacket and shirt', 123, 2, 'jacket1, red shirt'),
(5, 'basketball', 'shed', 'https://thumbs.dreamstime.com/b/basketball-isolated-28666494.jpg', 'cool bball', 124, 1, 'shorts, hangers'),
(6, 'stand mixer', 'kitchen', 'https://hips.hearstapps.com/hmg-prod/images/gh-121721-best-stand-mixers-1639690990.png?crop=1.00xw:0.773xh;0,0.175xh&resize=1200:*', 'nice turquoise mixer', 125, 1, 'knives, bowl'),
(7, 'hammer', 'garage', 'https://www.acwholesalers.com/products-image/600/rap12525_107217_1000.jpg', 'a nice hammer with black handle', 120, 1, 'saw, table'),
(8, 'clothes', 'bedroom', 'https://t3.ftcdn.net/jpg/02/10/85/26/360_F_210852662_KWN4O1tjxIQt8axc2r82afdSwRSLVy7g.jpg', 'jacketx and shirts', 121, 4, 'desk, table'),
(9, 'Tape Measure', 'shed', 'https://www.acwholesalers.com/products-image/600/rap12525_107217_1000.jpg', 'nice tape measure', 122, 1, 'saw, hammer'),
(10, 'shirts', 'master bedroom', 'https://t3.ftcdn.net/jpg/02/10/85/26/360_F_210852662_KWN4O1tjxIQt8axc2r82afdSwRSLVy7g.jpg', 'jacket and shirt', 123, 2, 'jacket1, red shirt'),
(11, 'basketball', 'shed', 'https://thumbs.dreamstime.com/b/basketball-isolated-28666494.jpg', 'cool bball', 124, 1, 'shorts, hangers'),
(12, 'stand mixer', 'kitchen', 'https://hips.hearstapps.com/hmg-prod/images/gh-121721-best-stand-mixers-1639690990.png?crop=1.00xw:0.773xh;0,0.175xh&resize=1200:*', 'nice turquoise mixer', 125, 1, 'knives, bowl');

-- --------------------------------------------------------

--
-- Table structure for table `keysdb`
--

CREATE TABLE `keysdb` (
  `userID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `loanID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loanID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `names`
--

CREATE TABLE `names` (
  `email` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `userName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `names`
--

INSERT INTO `names` (`email`, `firstName`, `lastName`, `userName`) VALUES
('1234@gmail.com', 'Edward', 'Smith', 'edward12'),
('1234@test.com', 'Michael', 'Johnson', 'mike145'),
('database@gmail.com', 'Cav', 'Man', 'cavman'),
('ed@gmail.com', 'Eddie', 'Ward', 'eddie'),
('harden@virginia.edu', 'James', 'Harden', 'jharden13'),
('hello@virginia.edu', 'Tom', 'Brady', 'sbRings'),
('hoos2023@gmail.com', 'Kyle', 'Guy', '3freethrows'),
('pond@virginia.edu', 'Jay', 'Watson', 'pondband'),
('user1234@virginia.edu', 'Kevin', 'Parker', 'user1234'),
('uva@gmail.com', 'Tony', 'Bennett', 'tonyforthewin');

-- --------------------------------------------------------

--
-- Table structure for table `stateinfo`
--

CREATE TABLE `stateinfo` (
  `zipCode` int(11) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stateinfo`
--

INSERT INTO `stateinfo` (`zipCode`, `state`) VALUES
(22903, 'Virginia'),
(22904, 'Virginia'),
(23225, 'Virginia'),
(23226, 'Virginia'),
(92585, 'California');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `tempName` varchar(100) DEFAULT NULL,
  `tempdbID` int(11) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uID` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `dbID` int(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zipCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uID`, `email`, `password`, `street`, `dbID`, `city`, `zipCode`) VALUES
(1, 'test@test.com', 'password', 'guthrie avenue', 120, 'Richmond', 23226),
(3, '1234@test.com', 'mypw', 'Hancock Dr', 121, 'Charlottesville', 22903),
(5, 'hoos2023@gmail.com', 'hoos2023*', 'McCormick', 123, 'Charlottesville', 22903),
(6, 'ed@gmail.com', 'pw1234', 'Alderman', 124, 'Charlottesville', 22903),
(7, 'database@gmail.com', 'db567', 'Engineers Way', 125, 'Charlottesville', 22904),
(8, 'harden@virginia.edu', 'harden567', 'Broad Street', 126, 'Richmond', 23226),
(9, 'hello@virginia.edu', 'brady12', 'Grove Ave', 127, 'Richmond', 23226),
(10, 'user1234@virginia.edu', 'pw12345678', 'Jefferson Park Avenue', 128, 'Charlottesville', 22904),
(11, 'pond@virginia.edu', 'pondband', 'Murrietta Road', 129, 'Los Angeles', 92585),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowID`);

--
-- Indexes for table `databaseinfo`
--
ALTER TABLE `databaseinfo`
  ADD PRIMARY KEY (`dbID`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`friendID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `keysdb`
--
ALTER TABLE `keysdb`
  ADD PRIMARY KEY (`loanID`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loanID`);

--
-- Indexes for table `names`
--
ALTER TABLE `names`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `stateinfo`
--
ALTER TABLE `stateinfo`
  ADD PRIMARY KEY (`zipCode`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`tempdbID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `databaseinfo`
--
ALTER TABLE `databaseinfo`
  MODIFY `dbID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `friendID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `loanID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/* Stored Procedure - Note that for this I just pasted this in here after the SQL DUMP */
DELIMITER //
CREATE PROCEDURE `getFriendsByID`(IN `userID` int) BEGIN select * from friend where userID1 = userID OR userID2 = userID; 
END
DELIMITER ;

GRANT INSERT TO public;
GRANT UPDATE TO public;
GRANT SELECT TO public;
GRANT DELETE FROM TO public;
REVOKE DROP TABLE FROM public;
REVOKE ALTER FROM public;
REVOKE GRANT FROM public;