-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 12:15 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web4cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `images` varchar(512) NOT NULL,
  `active` set('0','1','2','3') NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `tags` varchar(128) NOT NULL,
  `op1` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `description`, `images`, `active`, `user_id`, `tags`, `op1`, `created_at`) VALUES
(1, 1, 'সিলেটের করিমউল্লাহ মার্কেটে যুক্তরাজ্য প্রবাসীর দোকান দখলের অভিযোগ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique ut, impedit distinctio praesentium quia repudiandae totam, ullam, mollitia aspernatur molestiae doloribus voluptate ex vel modi consequuntur nobis. Aperiam deserunt reiciendis quod, incidunt labore libero illo, quisquam odit itaque molestias necessitatibus qui sint expedita sed voluptatum quidem et natus vel ipsam.', '640450bd89bf1.png', '2', 2, 'csf', '', '2023-03-05 14:20:13'),
(2, 2, '1 সিলেটের করিমউল্লাহ মার্কেটে যুক্তরাজ্য প্রবাসীর দোকান দখলের অভিযোগ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique ut, impedit distinctio praesentium quia repudiandae totam, ullam, mollitia aspernatur molestiae doloribus voluptate ex vel modi consequuntur nobis. Aperiam deserunt reiciendis quod, incidunt labore libero illo, quisquam odit itaque molestias necessitatibus qui sint expedita sed voluptatum quidem et natus vel ipsam.', '640461965e38d.png', '1', 2, 'ccss', '', '2023-03-05 15:32:06'),
(3, 3, '2সিলেটের করিমউল্লাহ মার্কেটে যুক্তরাজ্য প্রবাসীর দোকান দখলের অভিযোগ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique ut, impedit distinctio praesentium quia repudiandae totam, ullam, mollitia aspernatur molestiae doloribus voluptate ex vel modi consequuntur nobis. Aperiam deserunt reiciendis quod, incidunt labore libero illo, quisquam odit itaque molestias necessitatibus qui sint expedita sed voluptatum quidem et natus vel ipsam.', '640465367ae4e.png', '1', 2, 'ddd', '', '2023-03-05 15:47:34'),
(4, 4, 'সিলেটের করিমউল্লাহ মার্কেটে যুক্তরাজ্য প্রবাসীর দোকান দখলের অভিযোগ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique ut, impedit distinctio praesentium quia repudiandae totam, ullam, mollitia aspernatur molestiae doloribus voluptate ex vel modi consequuntur nobis. Aperiam deserunt reiciendis quod, incidunt labore libero illo, quisquam odit itaque molestias necessitatibus qui sint expedita sed voluptatum quidem et natus vel ipsam.', '640465469fd50.png', '1', 2, 'dvddvdv', '', '2023-03-05 15:47:50'),
(5, 5, '4 সিলেটের করিমউল্লাহ মার্কেটে যুক্তরাজ্য প্রবাসীর দোকান দখলের অভিযোগ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique ut, impedit distinctio praesentium quia repudiandae totam, ullam, mollitia aspernatur molestiae doloribus voluptate ex vel modi consequuntur nobis. Aperiam deserunt reiciendis quod, incidunt labore libero illo, quisquam odit itaque molestias necessitatibus qui sint expedita sed voluptatum quidem et natus vel ipsam.', '64046558cf86d.png', '1', 2, 'dvdv', '', '2023-03-05 15:48:08'),
(6, 6, '5 সিলেটের করিমউল্লাহ মার্কেটে যুক্তরাজ্য প্রবাসীর দোকান দখলের অভিযোগ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique ut, impedit distinctio praesentium quia repudiandae totam, ullam, mollitia aspernatur molestiae doloribus voluptate ex vel modi consequuntur nobis. Aperiam deserunt reiciendis quod, incidunt labore libero illo, quisquam odit itaque molestias necessitatibus qui sint expedita sed voluptatum quidem et natus vel ipsam.', '64046571957c2.png', '1', 2, 'dvd', '', '2023-03-05 15:48:33'),
(7, 6, 'e-Sports', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique ut, impedit distinctio praesentium quia repudiandae totam, ullam, mollitia aspernatur molestiae doloribus voluptate ex vel modi consequuntur nobis. Aperiam deserunt reiciendis quod, incidunt labore libero illo, quisquam odit itaque molestias necessitatibus qui sint expedita sed voluptatum quidem et natus vel ipsam.', '64046581c931d.png', '1', 2, 'dvddvdv', '', '2023-03-05 15:48:49'),
(8, 8, 'E-Sports', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique ut, impedit distinctio praesentium quia repudiandae totam, ullam, mollitia aspernatur molestiae doloribus voluptate ex vel modi consequuntur nobis. Aperiam deserunt reiciendis quod, incidunt labore libero illo, quisquam odit itaque molestias necessitatibus qui sint expedita sed voluptatum quidem et natus vel ipsam.', '640465aa2f788.png', '1', 2, 'dvdvdv', '', '2023-03-05 15:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `title_1` varchar(255) NOT NULL,
  `image_1` varchar(255) NOT NULL,
  `title_2` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `title_3` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `title_1`, `image_1`, `title_2`, `image_2`, `title_3`, `image_3`, `create_at`) VALUES
(5, 'carousel 1', '6401d1287be48.png', 'carousel 2', '6401d1287f6ac.png', 'carousel 3', '6401d1287fdb4.png', '2023-03-03 10:51:20'),
(6, 'carousel 1', '6401d14562be2.png', 'carousel 2', '6401d1456332b.png', 'carousel 3', '6401d14563d90.png', '2023-03-03 10:51:49'),
(7, 'carousel 1', '6401d196a21a8.png', 'carousel 2', '6401d196a2a59.png', 'carousel 3', '6401d196a3133.png', '2023-03-03 10:53:10'),
(8, 'carousel 1', '6401d1c165d45.png', 'carousel 2', '6401d1c1664c8.png', 'carousel 3', '6401d1c166bf0.png', '2023-03-03 10:53:53'),
(9, 'carousel 1', '64046a1ba146f.png', 'carousel 2', '64046a1ba1b0b.png', 'carousel 3', '64046a1ba25e2.png', '2023-03-05 10:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `icon`, `created_at`) VALUES
(1, 'E-Sports', 'sportsf', '<i class=\"fa-solid fa-baseball\"></i>', '2022-12-29 13:29:13'),
(2, 'Fashion', 'fashion', '<i class=\"fa-solid fa-shirt\"></i>', '2022-12-29 13:29:26'),
(3, 'Web Design', 'web design', '<i class=\"fa-solid fa-code\"></i>', '2022-12-29 13:29:51'),
(4, 'Programming', 'programming', '<i class=\"fa-solid fa-laptop-code\"></i>', '2022-12-29 13:30:04'),
(5, 'Food', 'food', '<i class=\"fa-solid fa-bowl-food\"></i>', '2022-12-29 13:30:29'),
(6, 'Politics', 'politics', '<i class=\"fa-solid fa-flag\"></i>', '2022-12-29 14:30:12'),
(7, 'Technology', 'technology', '<i class=\"fas fa-microchip\"></i>', '2022-12-29 14:30:29'),
(8, 'Freelancing', 'freelancing', '<i class=\"fas fa-sack-dollar\"></i>', '2022-12-29 14:30:41'),
(9, 'Photography', 'photography', '<i class=\"fas fa-camera-retro\"></i>', '2023-01-23 17:44:45'),
(14, 'Technology', 'Technology', '<i class=\"fas fa-microchip\"></i>', '2023-01-27 16:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(512) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `article_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `active` set('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_s`
--

CREATE TABLE `post_s` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_s`
--

INSERT INTO `post_s` (`id`, `name`) VALUES
(1, 'Unpublished'),
(2, 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(512) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` set('1','2','3') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Md. Bellal Hossain', 'adminin@mail.com', 'bellal1254', '123', '2', '2023-03-04 19:15:38'),
(2, 'Md. Bellal Hossain', 'admin@mail.com', 'bellal1254', '$2y$10$x1ePPML.ZbkY4DTsYQ0G1u2vJKGhqbovjaLBlern0lLYN88nR28aK', '2', '2023-03-05 07:15:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_s`
--
ALTER TABLE `post_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_s`
--
ALTER TABLE `post_s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
