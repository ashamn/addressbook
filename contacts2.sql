-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2016 at 10:54 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contacts2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL COMMENT 'PK',
  `city` varchar(100) NOT NULL COMMENT 'city name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cities in the Philippines';

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(2, 'Manila'),
(4, 'Marikina City'),
(3, 'Pasay City'),
(1, 'Quezon City');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL COMMENT 'Primary key/Unique ID',
  `firstname` varchar(30) NOT NULL COMMENT 'Firstname',
  `lastname` varchar(30) NOT NULL COMMENT 'Lastname',
  `address` varchar(200) NOT NULL COMMENT 'Address',
  `city` int(11) NOT NULL COMMENT 'ID of city',
  `mobile` varchar(11) NOT NULL COMMENT 'Mobile phone number',
  `email` varchar(50) NOT NULL COMMENT 'Email address',
  `birthday` date NOT NULL COMMENT 'Date of birth',
  `salary` decimal(12,2) NOT NULL COMMENT 'Salary',
  `notes` text NOT NULL COMMENT 'Other information'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contacts';

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `address`, `city`, `mobile`, `email`, `birthday`, `salary`, `notes`) VALUES
(1, 'Yllan Darell', 'Aquino', '7 Oroquieta St.', 1, '09274783644', 'ydyahoo@gmail.com', '1988-01-17', '10000.00', 'Honorary godson of Tito Dong'),
(2, 'Dea Hannah', 'Calmada', 'B2 L3 Javier Homes, Santan St., Marikina Heights', 0, '09984783395', 'dcalmed@hotmail.com', '1967-09-03', '5000.00', 'Cutie in the neighborhood'),
(3, 'Josh Herald', 'Banares', '25 Christmas St., Holiday Village', 0, '', 'jhbanares@gmail.com', '1978-08-28', '0.00', ''),
(4, 'Yohan', 'Pagulayan', '19 Metrica St., Sta. Mesa', 0, '09183978124', '', '1998-12-24', '10000.00', ''),
(5, 'Albert', 'Tuscano', '2090 Oroquieta St., Tondo', 0, '09924005010', 'altuscan@gmail.com', '2004-12-01', '3000.00', ''),
(6, 'Lea', 'Banares', '7 Oroquieta', 0, '09226183644', 'leacalm@gmail.com', '1967-04-25', '4500.00', 'Married to Dong'),
(7, 'Darwin', 'Laurencio', '56 Pasong Tamo St.', 0, '09984783388', 'dclaurencio@yahoo.com', '1969-09-03', '8000.00', 'Works at UP'),
(8, 'Junjun', 'Lavender', '89 Pasong Tamo St.', 0, '', 'jlvender@gmail.com', '0000-00-00', '60000.00', ''),
(9, 'Susan', 'Macahiya', '9030 Santan St., Brgy. Tambong', 1, '09171234567', 'slmacahiya@yahoo.com', '1958-08-24', '0.00', ''),
(10, 'Albert', 'Daylisan', '1235 Calumpang St. Nino.', 0, '09222465018', 'adaylisan@gmail.com', '1985-05-05', '7000.00', 'No known address'),
(11, 'Efren', 'Sumalabe', '71 Marquinton St., Fortune', 2, '09224784511', '', '0000-00-00', '0.00', ''),
(12, 'Pedra', 'Timbuko', '', 0, '09234346138', '', '0000-00-00', '0.00', ''),
(13, 'Pedrita', 'Timbuko', '', 0, '09234346140', '', '0000-00-00', '0.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactsandfavedogs`
--

CREATE TABLE `contactsandfavedogs` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `dog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactsandfavedogs`
--

INSERT INTO `contactsandfavedogs` (`id`, `contact_id`, `dog_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 2, 1),
(3, 2, 4),
(9, 3, 2),
(8, 7, 2),
(5, 8, 1),
(6, 9, 3),
(7, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

CREATE TABLE `dogs` (
  `id` int(11) NOT NULL,
  `dog` varchar(100) NOT NULL COMMENT 'dog breed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`id`, `dog`) VALUES
(6, 'Askal'),
(3, 'Bulldog'),
(1, 'German Shepherd'),
(2, 'Golden Retriever'),
(5, 'Greyhound'),
(4, 'Terrier');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL COMMENT 'Username',
  `password` varchar(40) NOT NULL COMMENT 'Password',
  `admin` tinyint(1) NOT NULL COMMENT 'Administrator?'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `admin`) VALUES
('dongcalmada', '3acadc7b91b4db9b98ba815338c2409805af4dea', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_average_salary`
--
CREATE TABLE `v_average_salary` (
`average_salary` decimal(16,6)
);

-- --------------------------------------------------------

--
-- Structure for view `v_average_salary`
--
DROP TABLE IF EXISTS `v_average_salary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_average_salary`  AS  select avg(`contacts`.`salary`) AS `average_salary` from `contacts` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_city` (`city`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactsandfavedogs`
--
ALTER TABLE `contactsandfavedogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_id` (`contact_id`,`dog_id`);

--
-- Indexes for table `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_breed` (`dog`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
