-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 10:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `firstName` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dateTime` datetime(6) NOT NULL,
  `action` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `user_id`, `firstName`, `lastName`, `email`, `ip`, `dateTime`, `action`) VALUES
(1, 50, 'aasdas', 'aasdsa', 'asd@gmail.comxxc', '127.0.0.1', '2021-04-28 13:58:50.000000', 'User registered!'),
(2, 52, 'as', 'azx', 'asd@gmail.comzvvb', '127.0.0.1', '2021-04-28 14:01:35.000000', 'User registered!'),
(3, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-04-28 14:06:16.000000', 'User login!'),
(4, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-04-28 14:07:05.000000', 'User login!'),
(5, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-04-28 14:07:07.000000', 'User logout!'),
(6, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-05-04 08:06:38.000000', 'User login!'),
(7, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-05-04 13:40:54.000000', 'User logout!'),
(8, 3, 'NoName', 'guy', 'noemail@gmail.com', '127.0.0.1', '2021-05-04 13:42:31.000000', 'User login!'),
(9, 3, 'NoName', 'guy', 'noemail@gmail.com', '127.0.0.1', '2021-05-04 15:39:37.000000', 'User logout!'),
(10, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-05-04 15:39:41.000000', 'User login!'),
(11, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-05-04 15:42:44.000000', 'User logout!'),
(12, 3, 'NoName', 'guy', 'noemail@gmail.com', '127.0.0.1', '2021-05-04 15:42:50.000000', 'User login!'),
(13, 3, 'NoName', 'guy', 'noemail@gmail.com', '127.0.0.1', '2021-05-04 15:52:45.000000', 'User logout!'),
(14, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-05-04 15:52:49.000000', 'User login!'),
(15, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-05-04 16:32:22.000000', 'Profile info update'),
(16, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-05-04 16:32:32.000000', 'Profile info update'),
(17, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-05-04 16:32:36.000000', 'Profile picture updated'),
(18, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-05-04 16:32:43.000000', 'Profile picture updated'),
(19, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-05-04 16:38:03.000000', 'User login!'),
(20, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-05-04 16:38:35.000000', 'User logout!'),
(21, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 16:38:46.000000', 'User login!'),
(22, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 16:39:18.000000', 'User logout!'),
(23, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 16:39:25.000000', 'User login!'),
(24, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 16:42:26.000000', 'User logout!'),
(25, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 16:42:44.000000', 'User login!'),
(26, 7, 'Aleksa', 'Predragovic', 'aleksa@gmail.com', '127.0.0.1', '2021-05-04 17:29:28.000000', 'User logout!'),
(27, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 17:29:40.000000', 'User login!'),
(28, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 19:28:49.000000', 'Profile picture inserted and  updated'),
(29, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 19:29:08.000000', 'Updated user'),
(30, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 19:29:29.000000', 'Updated user'),
(31, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 19:29:29.000000', 'Profile picture inserted and  updated'),
(32, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 19:30:03.000000', 'Updated user'),
(33, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 19:30:03.000000', 'Profile picture inserted and  updated'),
(34, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 19:30:11.000000', 'Deleted user'),
(35, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 19:32:00.000000', 'Post picture update'),
(36, 7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', '127.0.0.1', '2021-05-04 19:42:42.000000', 'User logout!'),
(37, 3, 'NoName', 'guy', 'noemail@gmail.com', '127.0.0.1', '2021-05-04 19:43:05.000000', 'User login!');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(100) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(100) NOT NULL,
  `parent_id` int(100) DEFAULT NULL,
  `post_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `description`, `createdAt`, `user_id`, `parent_id`, `post_id`) VALUES
(11, 'Great post !! :D', '2020-03-26 11:39:40', 3, NULL, 1),
(15, 'looks good :D', '2020-03-26 14:31:52', 3, NULL, 2),
(16, 'looks good :D', '2020-04-02 16:06:10', 8, NULL, 3),
(17, 'great :D', '2020-05-25 15:20:34', 10, NULL, 1),
(18, 'not bad :)', '2020-05-25 16:29:50', 10, 16, 3),
(19, 'welcome', '2020-05-25 18:06:03', 10, NULL, 1),
(20, ':D', '2021-04-12 15:32:28', 7, NULL, 8),
(21, 'yes', '2021-04-12 15:33:24', 7, 17, 1),
(22, 'lep pogled', '2021-04-25 12:30:47', 7, NULL, 9),
(39, 'nice', '2021-04-25 13:52:01', 7, NULL, 2),
(54, 'thanks', '2021-04-27 16:21:10', 10, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `errors`
--

CREATE TABLE `errors` (
  `id` int(100) NOT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dateTime` datetime(6) NOT NULL,
  `message` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `errors`
--

INSERT INTO `errors` (`id`, `ip`, `dateTime`, `message`) VALUES
(1, '127.0.0.1', '2021-04-28 14:16:28.000000', 'Failed login attempt'),
(2, '127.0.0.1', '2021-05-04 13:41:05.000000', 'Failed login attempt'),
(3, '127.0.0.1', '2021-05-04 13:41:12.000000', 'Failed login attempt'),
(4, '127.0.0.1', '2021-05-04 13:41:45.000000', 'Failed login attempt'),
(5, '127.0.0.1', '2021-05-04 13:41:52.000000', 'Failed login attempt'),
(6, '127.0.0.1', '2021-05-04 13:42:24.000000', 'Failed login attempt'),
(7, '127.0.0.1', '2021-05-04 16:37:49.000000', 'Failed login attempt'),
(8, '127.0.0.1', '2021-05-04 19:29:08.000000', 'DATABASE ERROR - COULD NOT UPDATE PROFILE IMAGE - SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column \'src\' at row 1 (SQL: insert into `images` (`src`, `alt`) values (/images/users/user-53/1620156548_screencapture-localhost-8000-admin-updatePost-2021-05-04-18_44_37.png, user image))'),
(9, '127.0.0.1', '2021-05-04 19:42:51.000000', 'Failed login attempt'),
(10, '127.0.0.1', '2021-05-04 19:42:58.000000', 'Failed login attempt');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(100) NOT NULL,
  `src` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `src`, `alt`) VALUES
(1, '/images/users/user-3/person_1.jpg', 'user image'),
(2, '/images/users/user-3/1585054557_img_2.jpg', 'user image'),
(4, '/images/users/user-3/1585060431_person_3.jpg', 'user image'),
(5, '/images/users/user-3/1585060460_person_3.jpg', 'user image'),
(6, '/images/users/user-4/1585061524_img_4.jpg', 'user image'),
(7, '/images/posts/user-3/post1.jpg', 'post image'),
(8, '/images/posts/user-3/post2.jpg', 'post image'),
(9, '/images/posts/user-4/post1.jpg', 'post image'),
(10, '/images/posts/user-4/post2.jpg', 'post image'),
(12, '/images/users/defaultProfileImage.png', 'default user profile image'),
(13, '/images/users/user-7/1585244710_person_4.jpg', 'user image'),
(14, '/images/users/user-7/1585249423_hero_1.jpg', 'user profile image'),
(15, '/images/users/user-3/1585249753_man2.jpg', 'user image'),
(16, '/images/users/user-3/1585249952_man3.jpg', 'user image'),
(17, '/images/users/user-3/1585249960_man3.jpg', 'user profile image'),
(18, '/images/users/user-4/1585263621_profileImage.jpg', 'user image'),
(19, '/images/users/user-8/1585843666_man-young-happy-smiling-91227.jpg', 'user image'),
(20, '/images/users/user-8/1585844878_man1.jpg', 'user profile image'),
(21, '/images/users/user-9/1585844959_man-wearing-hoodie-forming-chakra-wallpaper-1694348.jpg', 'user profile image'),
(22, '/images/posts/user-9/1585847421_img_v_1.jpg', 'post image'),
(23, '/images/users/user-17/1618423079_terry-crews-person-of-year-2017-time-magazine-facebook-1.jpg', 'user image'),
(24, '/images/users/user-22/1618423479_person_2.jpg', 'user image'),
(25, '/images/users/user-23/1618423664_img_v_2.jpg', 'user image'),
(26, '/images/users/user-25/1618423985_img_4.jpg', 'user image'),
(27, '/images/users/user-34/1618492109_img_3.jpg', 'user image'),
(28, '/images/users/user-33/1618492203_img_v_2.jpg', 'user image'),
(29, '/images/users/user-33/1618492429_person_2.jpg', 'user image'),
(30, '/images/users/user-33/1618492586_person_3.jpg', 'user image'),
(31, '/images/users/user-33/1618492863_person_5.jpg', 'user image'),
(32, '/images/posts/user-35/1618495439_img_2.jpg', 'post image'),
(33, '/images/posts/user-35/1618500114_img_3.jpg', 'post image'),
(34, '/images/posts/user-35/1618500144_img_3.jpg', 'post image'),
(35, '/images/posts/user-7/1618518579_img_v_2.jpg', 'post image'),
(36, '/images/posts/user-7/1620145838_pexels-pixabay-327533.jpg', 'post image'),
(37, '/images/posts/user-7/1620145927_pexels-pixabay-327533.jpg', 'post image'),
(38, '/images/users/user-53/1620156529_pexels-marta-branco-1194713.jpg', 'user image'),
(39, '/images/users/user-53/1620156569_screencapture-localhost-8000-2021-05-04-18_42_30.png', 'user image'),
(40, '/images/users/user-53/1620156603_pexels-pixabay-327533.jpg', 'user image'),
(41, '/images/posts/user-5/1620156674_screencapture-localhost-8000-profile-7-2021-05-04-18_39_40.png', 'post image'),
(42, '/images/posts/user-5/1620156720_pexels-vishnu-r-nair-1105666.jpg', 'post image');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(100) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL,
  `user_id` int(100) NOT NULL,
  `image_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `createdAt`, `updatedAt`, `user_id`, `image_id`) VALUES
(1, 'My first post', 'This is my first post enjoy', '2020-03-24 19:46:34', NULL, 3, 7),
(2, 'My secound post', 'This is my secound post enjoy', '2020-03-24 19:46:59', NULL, 3, 8),
(3, 'heey', 'im new here :D', '2020-04-02 15:57:51', NULL, 8, NULL),
(8, 'My dog', 'my happy dog', '2020-04-02 17:10:21', NULL, 9, 22),
(9, 'asdadasd', 'haalo', '2021-04-15 11:58:16', '2021-04-15 13:22:24', 35, 34),
(14, 'Photoshooting', 'great experience', '2021-05-04 14:32:07', NULL, 7, 37);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `firstName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `nickname`, `password`, `role_id`) VALUES
(3, 'NoName', 'guy', 'noemail@gmail.com', 'nonik', '5116f16d3399fcb6571f571d79f35f41', 2),
(5, 'Basic User', 'Basic', 'basicUser@gmail.com', NULL, 'e290d1e586805eef74e2ec58ac2e83a4', 2),
(7, 'Aleksa', 'Predragovic', 'aleksa.addmin@gmail.com', 'aki', '10c4981bb793e1698a83aea43030a388', 1),
(8, 'John', 'Ronie', 'John123@gmail.com', NULL, 'cc03e747a6afbbcbf8be7668acfebee5', 2),
(9, 'Sam', 'Vise', 'Samvise@gmail.com', NULL, 'cc03e747a6afbbcbf8be7668acfebee5', 2),
(10, 'Nick', 'Vuj', 'Nickv@gmail.com', NULL, '6ad14ba9986e3615423dfca256d04e3f', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_images`
--

CREATE TABLE `users_images` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `image_id` int(100) NOT NULL,
  `profileImage` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_images`
--

INSERT INTO `users_images` (`id`, `user_id`, `image_id`, `profileImage`) VALUES
(1, 3, 1, 0),
(4, 3, 2, 0),
(5, 3, 4, 0),
(6, 3, 5, 0),
(8, 5, 12, 1),
(10, 7, 12, 0),
(11, 7, 13, 0),
(12, 7, 14, 1),
(13, 3, 15, 1),
(14, 3, 16, 0),
(15, 3, 17, 0),
(16, 8, 12, 0),
(17, 9, 12, 0),
(18, 10, 12, 1),
(19, 11, 12, 1),
(20, 12, 12, 1),
(21, 13, 12, 1),
(22, 8, 19, 0),
(23, 8, 20, 1),
(24, 9, 21, 1),
(27, 17, 23, 0),
(28, 22, 24, 0),
(29, 23, 25, 0),
(30, 25, 26, 0),
(31, 27, 12, 1),
(32, 28, 12, 1),
(33, 29, 12, 1),
(34, 30, 12, 1),
(35, 31, 12, 1),
(36, 35, 12, 1),
(37, 34, 27, 0),
(38, 33, 28, 0),
(39, 33, 29, 0),
(40, 33, 30, 0),
(42, 33, 31, 1),
(43, 35, 33, 0),
(44, 35, 34, 0),
(45, 36, 12, 1),
(46, 37, 12, 1),
(47, 38, 12, 1),
(48, 39, 12, 1),
(49, 40, 12, 1),
(50, 41, 12, 1),
(51, 42, 12, 1),
(52, 43, 12, 1),
(53, 44, 12, 1),
(54, 45, 12, 1),
(55, 46, 12, 1),
(56, 47, 12, 1),
(57, 48, 12, 1),
(58, 50, 12, 1),
(59, 51, 12, 1),
(60, 52, 12, 1),
(61, 53, 38, 0),
(62, 53, 39, 0),
(63, 53, 40, 1),
(64, 5, 42, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `id_parent_comment` (`parent_id`),
  ADD KEY `comment_id` (`post_id`);

--
-- Indexes for table `errors`
--
ALTER TABLE `errors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `idImage` (`image_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`role_id`);

--
-- Indexes for table `users_images`
--
ALTER TABLE `users_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`user_id`),
  ADD KEY `idImage` (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `errors`
--
ALTER TABLE `errors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users_images`
--
ALTER TABLE `users_images`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
