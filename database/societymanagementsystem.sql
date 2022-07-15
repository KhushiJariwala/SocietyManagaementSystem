-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 09:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `societymanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `fname`, `lname`, `email`, `pass`, `date_added`) VALUES
(1, 'admin', 'user', 'admin@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2022-05-10 21:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `name` text NOT NULL,
  `house_number` text NOT NULL,
  `complaints` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `email`, `name`, `house_number`, `complaints`, `date_added`) VALUES
(1, 0, 'test@gmail.com', 'test', 'c77', 'Water Supplie ', '2022-05-11 20:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `image`) VALUES
(1, 'Cultural', '627bed95c06ea_13.jpg'),
(3, 'Sports', '627bf592d65e3_14.jpg'),
(4, 'Festivals', '627bf5a6371ee_15.jpg'),
(5, 'Society Anniversary', '627bf5ba782cb_16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paymenthistory`
--

CREATE TABLE `paymenthistory` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `note` text NOT NULL,
  `date_payment` date NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymenthistory`
--

INSERT INTO `paymenthistory` (`id`, `user_id`, `payment`, `note`, `date_payment`, `date_added`) VALUES
(1, 1, 100, 'Maintanance Payment', '2022-05-14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `cnumber` text NOT NULL,
  `fi` text NOT NULL,
  `vi` text NOT NULL,
  `pro` text NOT NULL,
  `oi` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `user_id`, `fullname`, `cnumber`, `fi`, `vi`, `pro`, `oi`, `date_added`) VALUES
(1, 0, '00:00:00', '00:00:00', 'fi', 'vi', 'p', 'oi', '2022-05-11 20:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serviceprovider`
--

INSERT INTO `serviceprovider` (`id`, `name`, `image`) VALUES
(1, 'Milkman', '627bf767266e0_1.jpg'),
(2, 'Sweeper', '627bf77471c92_2.jpg'),
(3, 'Cable Operator', '627bf7813fa92_3.jpg'),
(4, 'Newspaper Provider', '627bf78f7e758_4.jpg'),
(5, 'Maid/Servants', '627bf79ac1227_5.jpg'),
(6, 'Lift Agency', '627bf7a76541b_6.jpg'),
(7, 'Gardener', '627bf7b80764d_7.jpg'),
(8, 'Car Washer', '627bf7c49fe65_8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `societypassbook`
--

CREATE TABLE `societypassbook` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `note` text NOT NULL,
  `payment` int(11) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `societypassbook`
--

INSERT INTO `societypassbook` (`id`, `title`, `note`, `payment`, `date_added`) VALUES
(1, 'Light Bill', 'Light Bill Payment Month May 2022', 100, '2022-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `socmeeting`
--

CREATE TABLE `socmeeting` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `purpuse` text NOT NULL,
  `meeting_date` text NOT NULL,
  `meeting_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socmeeting`
--

INSERT INTO `socmeeting` (`id`, `title`, `purpuse`, `meeting_date`, `meeting_time`) VALUES
(1, 'General Meeting', 'General Meeting Socity Management', '2022-05-17', '12:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `role` text NOT NULL,
  `uname` text NOT NULL,
  `pass` text NOT NULL,
  `gender` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `phone`, `role`, `uname`, `pass`, `gender`, `date_added`) VALUES
(1, 'ff', 'f', 'ffff@gmail.com', '1234567890', 'f', 'f', '25d55ad283aa400af464c76d713c07ad', 'male', '2022-05-05 17:46:08'),
(3, 'Khushi', 'Jariwala', 'khushijariwala1901@gmail.com', '9737439661', 'Member', 'KhushiJariwala', '696f052512d00b5c3f40ad7d6fb27c9a', 'female', '2022-05-06 09:56:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymenthistory`
--
ALTER TABLE `paymenthistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `societypassbook`
--
ALTER TABLE `societypassbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socmeeting`
--
ALTER TABLE `socmeeting`
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
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paymenthistory`
--
ALTER TABLE `paymenthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `societypassbook`
--
ALTER TABLE `societypassbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socmeeting`
--
ALTER TABLE `socmeeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
