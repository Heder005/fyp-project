-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 03:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitnessclubmonitoringsystemfp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) NOT NULL,
  `u_name` varchar(50) DEFAULT NULL,
  `t_name` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `att_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `u_name`, `t_name`, `status`, `att_date`) VALUES
(1, 'Ahmad raza', '', 'Present', '08-07-22 01:44:50'),
(2, 'Ahmad raza', '', 'Present', '08-07-22 01:45:17'),
(3, 'Ahmad raza', '', 'Present', '08-07-22 01:46:39'),
(4, 'Ahmad raza', '', 'Present', '08-07-22 01:47:23'),
(5, 'Ahmad raza', '', 'Present', '16-07-22 10:48:53'),
(6, 'Ahmad raza', '', 'Present', '16-07-22 10:49:38'),
(7, 'Ahmad raza', '', 'Present', '16-07-22 10:49:42'),
(8, 'Ahmad raza', 'admin@gmail.com', 'Present', '16-07-22 02:43:14'),
(9, 'Shoaib', 'admin@gmail.com', 'Present', '16-07-22 02:43:17'),
(10, 'Khawar', 'admin@gmail.com', 'Present', '16-07-22 02:43:21'),
(11, 'Ahmad raza', '', 'Present', '16-07-22 02:45:30'),
(12, 'Member', '', 'Present', '16-07-22 02:45:32'),
(13, 'Ahmad raza', '', 'Present', '16-07-22 03:11:42'),
(14, 'Member', '', 'Present', '16-07-22 03:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `dietplan`
--

CREATE TABLE `dietplan` (
  `id` int(20) NOT NULL,
  `trainee_name` varchar(50) DEFAULT NULL,
  `food_details` varchar(250) DEFAULT NULL,
  `diet_time` varchar(50) DEFAULT NULL,
  `daily_calories` varchar(50) DEFAULT NULL,
  `total_days` varchar(50) DEFAULT NULL,
  `diet_image` varchar(50) DEFAULT NULL,
  `trainer_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dietplan`
--

INSERT INTO `dietplan` (`id`, `trainee_name`, `food_details`, `diet_time`, `daily_calories`, `total_days`, `diet_image`, `trainer_name`) VALUES
(1, '14', 'Includes lean meats, poultry, fish, beans, eggs, and nuts', '1', '12', '12', '1.jpg', 'as'),
(2, '14', 'Includes lean meats, poultry, fish, beans, eggs, and nuts', '3', '1300', '7', '2.jpg', 'asd'),
(3, 'Ahmad raza', 'Includes lean meats, poultry, fish, beans, eggs, and nuts', 'Evening', '1300', '12', '3.jpg', 'asd'),
(4, 'Member', 'Includes lean meats, poultry, fish, beans, eggs, and nuts', 'Morning & Evening', '1300', '7', '3.jpg', 'Noman');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int(100) NOT NULL,
  `student_id` int(100) NOT NULL,
  `trainer_id` int(100) NOT NULL,
  `session_id` int(100) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id`, `student_id`, `trainer_id`, `session_id`, `status`) VALUES
(44, 14, 5, 1, 'Accepted'),
(45, 14, 9, 1, 'Accepted'),
(46, 14, 8, 2, 'Accepted'),
(50, 33, 5, 1, NULL),
(51, 33, 8, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `e_id` int(20) NOT NULL,
  `equipment_name` varchar(50) DEFAULT NULL,
  `equipment_image` varchar(50) DEFAULT NULL,
  `total_weight` varchar(50) DEFAULT NULL,
  `equipment_price` varchar(50) DEFAULT NULL,
  `equipment_details` varchar(250) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`e_id`, `equipment_name`, `equipment_image`, `total_weight`, `equipment_price`, `equipment_details`, `Status`, `user_name`) VALUES
(1, 'Dumble', 'benchpress.jpg', '40', '900', 'sdaf', 'Reserve', 'mm@gmail.com'),
(2, 'Bench Press', 'benchpress.jpg', '100', '60000', 'bench presss', 'Reserve', 'mm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(20) NOT NULL,
  `c_name` varchar(50) DEFAULT NULL,
  `c_email` varchar(50) DEFAULT NULL,
  `c_review` varchar(250) DEFAULT NULL,
  `c_rate` varchar(50) DEFAULT NULL,
  `c_trainer` varchar(50) DEFAULT NULL,
  `c_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `c_name`, `c_email`, `c_review`, `c_rate`, `c_trainer`, `c_user`) VALUES
(7, 't', 'm.shoaib456@gmail.com', 'asd', '1', 'Gohar', 'm.shoaib456@gmail.com'),
(8, 't', 'm.shoaib456@gmail.com', 'as', '2', 'Umer', 'm.shoaib456@gmail.com'),
(10, 't', 'm.shoaib456@gmail.com', 'sada', '3', 'Shoaib Bhutta', 'u@gmail.com'),
(11, 'a', 'm.shoaib456@gmail.com', 'fsd', '5', 'Gohar', 'u@gmail.com'),
(12, 'NOman', 'mm@gmail.com', 'fasfda', '5', 'Shoaib', 'mm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `paymethod`
--

CREATE TABLE `paymethod` (
  `id` int(10) NOT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `bamount` varchar(30) DEFAULT NULL,
  `paytype` varchar(50) DEFAULT NULL,
  `acctitle` varchar(50) DEFAULT NULL,
  `accountno` varchar(50) DEFAULT NULL,
  `expdate` varchar(50) DEFAULT NULL,
  `seccode` varchar(50) DEFAULT NULL,
  `useremail` varchar(50) DEFAULT NULL,
  `usercontact` varchar(50) DEFAULT NULL,
  `shipaddress` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymethod`
--

INSERT INTO `paymethod` (`id`, `order_id`, `bamount`, `paytype`, `acctitle`, `accountno`, `expdate`, `seccode`, `useremail`, `usercontact`, `shipaddress`, `status`) VALUES
(5, NULL, '99100', 'JazzCash', 'Shoaib', '03077221875', '456', 'u', 'u@gmail.com', '03', 'dfsa', 'Approve'),
(6, '45', '200', 'Bank', 'sdaf', '11', '11', 'ufdsa', 'u@gmail.com', '11', 'arsd', NULL),
(7, '51', '400', 'Bank', 'Shoaib', '46546', '13213', 'mm', 'mm@gmail.com', '03462360481', 'House No 1 Street No 8 Mohallah Ghazi Abbass near ', NULL),
(8, '50', '400', 'CreditCard', 'Shoaib', '23', '12', '123', '01/23', '03462360481', 'House No 1 Street No 8 Mohallah Ghazi Abbass near ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(100) NOT NULL,
  `session_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `session_name`) VALUES
(1, 'Morning'),
(2, 'Evening'),
(3, 'Morning & Evening');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_email` text NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `student_email`, `student_password`, `type`) VALUES
(14, 'Ahmad raza', 'm@gmail.com', 'm', 'Member'),
(26, 'Shoaib', 't@gmail.com', 't', 'Trainer'),
(28, 'Ghulfam', 'g@gmail.com', 'g', 'Trainer'),
(29, 'Khawar', 'k@gmail.com', 'k', 'Trainer'),
(30, 'noman', 'n@gmail.com', 'n', 'Trainer'),
(31, 'bilal', 'b@gmail.com', 'b', 'Trainer'),
(32, 'user', 'u@gmail.com', 'u', 'Trainer'),
(33, 'Member', 'mm@gmail.com', 'mm', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `trainer_id` int(100) NOT NULL,
  `session_id` int(100) NOT NULL,
  `total_seats` varchar(255) NOT NULL,
  `trainer_image` text NOT NULL,
  `trainer_name` varchar(255) NOT NULL,
  `trainer_details` text NOT NULL,
  `package_name` varchar(50) DEFAULT NULL,
  `training_fee` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`trainer_id`, `session_id`, `total_seats`, `trainer_image`, `trainer_name`, `trainer_details`, `package_name`, `training_fee`) VALUES
(4, 1, '16', 'Nimai-Delgado.14.jpg', 'Shoaib', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'asd', '500'),
(5, 3, '7', 'sahil-photo-with-logo-3-1400x1890.jpg', 'Shoaib', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'asd', '400'),
(6, 1, '5', '61zeHHzjK1L._UX250_.jpg', 'Khawar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'asd', '400'),
(7, 2, '6', 'Nimai-Delgado.14.jpg', 'Shoaib', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'asd', '400'),
(8, 3, '8', '13_2.jpg', 'noman', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'asd', '400'),
(9, 1, '23', '13_2.jpg', 'noman', 'abcd', 'sfdsaf', '200'),
(10, 1, '30', '61zeHHzjK1L._UX250_.jpg', 'Ghulfam', 'He is good in fitness training', 'sfdsaf', '500'),
(11, 3, '30', 'shaun-profile-biog.jpg', 'user', 'He is good in fitness training', 'Monthly Premium', '6000');

-- --------------------------------------------------------

--
-- Table structure for table `weight_lift`
--

CREATE TABLE `weight_lift` (
  `w_id` int(20) NOT NULL,
  `weight_title` varchar(50) DEFAULT NULL,
  `total_weight` varchar(50) DEFAULT NULL,
  `no_of_reps` varchar(50) DEFAULT NULL,
  `other_details` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weight_lift`
--

INSERT INTO `weight_lift` (`w_id`, `weight_title`, `total_weight`, `no_of_reps`, `other_details`, `date`, `user_name`) VALUES
(8, 'New', '15', '60', 'dfsa', '16-07-22 10:59:09', 't@gmail.com'),
(9, 'Bench Dumble', '5', '12', 'fdsa', '16-07-22 02:40:19', 'mm@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dietplan`
--
ALTER TABLE `dietplan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymethod`
--
ALTER TABLE `paymethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `weight_lift`
--
ALTER TABLE `weight_lift`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dietplan`
--
ALTER TABLE `dietplan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `e_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `paymethod`
--
ALTER TABLE `paymethod`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `trainer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `weight_lift`
--
ALTER TABLE `weight_lift`
  MODIFY `w_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
