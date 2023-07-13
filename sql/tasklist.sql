-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 10:15 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasklist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `due_date` varchar(12) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`id`, `title`, `status`, `description`, `created_at`, `due_date`, `updated_at`, `user_id`) VALUES
(18, 'test100', 'removed', '1023456789', '2023-06-27 18:36:27', '', '2023-06-27 18:36:27', 1),
(19, 'test1', 'removed', 'aaaaaaa', '2023-07-06 17:57:31', '9-6-2023', '2023-07-06 17:57:31', 1),
(20, 'test2', 'complete', 'aaaaaaa', '2023-07-06 17:57:46', '8-6-2023', '2023-07-06 17:57:46', 1),
(24, 'test3', 'complete', 'aaaaaaa', '2023-07-06 18:08:54', '7-5-2023', '2023-07-06 18:08:54', 1),
(25, 'test5', 'complete', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur nisi, nesciunt rerum numquam alias corporis aperiam repudiandae tempora ullam neque repellat porro doloribus eos quisquam similique id optio deserunt hic!', '2023-07-06 18:08:59', '15-6-2023', '2023-07-13 00:40:49', 1),
(26, 'test4', 'removed', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur nisi, nesciunt rerum numquam alias corporis aperiam repudiandae tempora ullam neque repellat porro doloribus eos quisquam similique id optio deserunt hic!', '2023-07-06 18:09:04', '7-7-2023', '2023-07-06 18:09:04', 1),
(27, 'test5', 'complete', 'aaaaaaa', '2023-07-06 18:44:31', '7-6-2023', '2023-07-06 18:44:31', 1),
(28, 'test 7', 'complete', 'asdasd', '2023-07-10 14:26:25', '7-6-2023', '2023-07-10 14:37:54', 1),
(29, 'test57', 'incomplete', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-07-13 00:47:46', '7-13-2023', '2023-07-13 00:47:46', 1),
(30, 'test05', 'incomplete', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-07-13 00:49:56', '7-15-2023', '2023-07-13 00:49:56', 1),
(31, 'test1', 'removed', 'asdadasdascxzccccccccccccc', '2023-07-13 01:15:23', '7-13-2023', '2023-07-13 01:15:23', 2),
(32, 'testtest', 'removed', 'asdzxczxzxczxsada', '2023-07-13 01:18:06', '7-13-2023', '2023-07-13 01:18:06', 2),
(33, 'test', 'removed', 'asxzczzxcz', '2023-07-13 01:22:17', '7-15-2023', '2023-07-13 01:22:17', 2),
(34, 'test', 'removed', 'asdasdasd', '2023-07-13 01:41:51', '7-13-2023', '2023-07-13 01:41:51', 2),
(35, 'test2', 'removed', 'dddddddddddddd', '2023-07-13 01:44:53', '7-15-2023', '2023-07-13 01:44:53', 2),
(36, 'test', 'removed', 'asssssss', '2023-07-13 01:45:30', '7-13-2023', '2023-07-13 01:45:30', 2),
(37, 'test', 'incomplete', 'dasaxvzxcga', '2023-07-13 12:37:59', '7-13-2023', '2023-07-13 12:37:59', 2),
(38, 'test', 'complete', 'sdasxzc', '2023-07-13 13:16:42', '7-12-2023', '2023-07-13 13:16:42', 15),
(39, 'test5', 'removed', 'aaaaaaaaaaaaaa', '2023-07-13 13:16:57', '7-13-2023', '2023-07-13 13:16:57', 15),
(40, 'test', 'incomplete', 'asaa', '2023-07-13 13:17:28', '7-13-2023', '2023-07-13 13:17:28', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `created_at`, `updated_at`, `status`) VALUES
(1, 'user1', 'user1', '2023-06-21 17:07:37', '2023-06-21 17:07:37', 'enabled'),
(2, 'user2', 'test2', '2023-06-21 17:08:03', '2023-06-21 17:08:03', 'enabled'),
(3, 'user3', 'user3', '2023-06-21 17:17:25', '2023-06-21 17:17:25', 'enabled'),
(8, 'user4', 'user4', '2023-07-10 13:47:32', '2023-07-10 13:47:32', 'enabled'),
(9, 'user5', 'user5', '2023-07-10 14:40:07', '2023-07-10 14:40:07', 'enabled'),
(10, 'test9', 'test55', '2023-07-13 01:50:59', '2023-07-13 01:50:59', 'enabled'),
(11, 'testy', '1234', '2023-07-13 12:38:26', '2023-07-13 12:38:26', 'enabled'),
(12, 'test56', 'test56', '2023-07-13 12:41:36', '2023-07-13 12:41:36', 'enabled'),
(13, 'user55', '1234', '2023-07-13 12:54:09', '2023-07-13 12:54:09', 'enabled'),
(14, 'user8', '1234', '2023-07-13 12:56:02', '2023-07-13 12:56:02', 'enabled'),
(15, 'user56', '1234', '2023-07-13 13:14:55', '2023-07-13 13:14:55', 'enabled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
