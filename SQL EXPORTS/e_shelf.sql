-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 04:32 AM
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
-- Database: `e_shelf`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `book_des` longtext DEFAULT NULL,
  `book_price` int(11) DEFAULT NULL,
  `book_author` varchar(255) DEFAULT NULL,
  `book_category` varchar(255) DEFAULT NULL,
  `book_pdf` varchar(255) DEFAULT NULL,
  `book_img1` varchar(255) DEFAULT NULL,
  `book_img2` varchar(255) DEFAULT NULL,
  `after_discount_price` int(11) DEFAULT NULL,
  `pdf_price` int(11) DEFAULT 0,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_des`, `book_price`, `book_author`, `book_category`, `book_pdf`, `book_img1`, `book_img2`, `after_discount_price`, `pdf_price`, `status`) VALUES
(5, 'adasd', 'asdasdasd123123', 12, '12', 'Arsalan', 'yes', 'Gemini_Generated_Image_y87ndcy87ndcy87n.jpeg', 'Gemini_Generated_Image_ffpzniffpzniffpz.jpeg', 12, 12, 'In Stock'),
(6, '1212aaa', '121212', 121212, '121212', 'Arsalan', 'no', 'facebook (2).png', 'facebook.png', 121212, 0, 'OutOfStock'),
(7, 'asdasd', 'asdasdasd', 123, 'asda', 'Arsalan', 'yes', 'Decor Vista ..png', 'user_icon.png', 123, 123, 'In Stock');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`) VALUES
(10, 'Arsalan12', 'icons8-facebook-128.png'),
(12, 'asdasd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_title` varchar(255) DEFAULT NULL,
  `event_description` longtext DEFAULT NULL,
  `event_start` varchar(255) DEFAULT NULL,
  `event_end` varchar(255) DEFAULT NULL,
  `event_req1` longtext DEFAULT NULL,
  `event_req2` longtext DEFAULT NULL,
  `event_req3` longtext DEFAULT NULL,
  `event_req4` longtext DEFAULT NULL,
  `event_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `event_description`, `event_start`, `event_end`, `event_req1`, `event_req2`, `event_req3`, `event_req4`, `event_img`) VALUES
(1, 'Arsalan', 'asd', '2024-11-08T08:28', '2024-11-09T08:28', 'adasd', 'asd', 'asd', 'asd', 'Screenshot 2024-10-27 004356.png');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `Valid` varchar(255) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT current_timestamp(),
  `last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_on`, `updated_on`, `last_login`) VALUES
(1, 'Admin', 'admin@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'admin', '2024-10-25 06:53:14', '2024-10-25 06:53:14', '2024-10-25 22:18:59'),
(4, 'Arsalan', 'arsalan@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'admin', '2024-11-01 07:50:34', '2024-11-01 07:50:34', '2024-11-01 02:50:34'),
(6, 'sad', 'asd@gm.c', '8240de73bd8e90c593c1ffa8e66700c1ec7e7321', 'admin', '2024-11-01 07:53:53', '2024-11-01 07:53:53', '2024-11-01 02:53:53'),
(8, 'Arsalan Warsi', 'mohammadarsalanwarsi@gmail.com', '5fa339bbbb1eeaced3b52e54f44576aaf0d77d96', 'user', '2024-11-02 08:06:33', '2024-11-02 08:06:33', '2024-11-04 02:59:09'),
(11, 'Arsalan', 'arsalan@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'user', '2024-11-03 05:27:28', '2024-11-03 05:27:28', '2024-11-03 00:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `website_link` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `name`, `logo`, `email`, `phone`, `address`, `info`, `website_link`, `facebook`, `instagram`, `whatsapp`) VALUES
(1, 'E-Shelf', '1.png', 'mohammadarsalanwarsi@gmail.com', '03150207265', 'Gulistan E Johar', 'asdasdasd', 'www.info.com', 'www.fb.com', 'www.insta.com', '03150207265');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
