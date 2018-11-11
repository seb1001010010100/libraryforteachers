-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2018 at 08:15 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraryforteachers`
--
CREATE DATABASE IF NOT EXISTS `libraryforteachers` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `libraryforteachers`;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `first_name`, `surname`, `created`, `modified`) VALUES
(1, 'Dame Agatha Mary Clarissa Christie', 'Agatha Christie', '2018-10-01', '2018-10-01'),
(2, 'William', 'William Shakespeare', '2018-10-01', '2018-10-01'),
(3, 'Dame Mary Barbara Hamilton Cartland', 'Barbara Cartland', '2018-10-01', '2018-10-01'),
(4, 'Danielle Fernandes Dominique Schuelein-Steel', 'Danielle Steel', '2018-10-01', '2018-10-01'),
(5, 'Harold Robbins', 'Harold Robbins', '2018-10-01', '2018-10-01'),
(6, 'Georges Joseph Christian Simenon', 'Georges Simenon', '2018-10-01', '2018-10-01'),
(7, 'Enid Mary Blyton', 'Enid Blyton', '2018-10-01', '2018-10-01'),
(8, 'Sidney Sheldon', 'Sidney Sheldon', '2018-10-01', '2018-10-01'),
(9, 'Joanne Rowling', 'J. K. Rowling', '2018-10-01', '2018-10-01'),
(10, 'William George "Gilbert" Patten', 'Gilbert Patten', '2018-10-01', '2018-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `authors_books`
--

CREATE TABLE IF NOT EXISTS `authors_books` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors_books`
--

INSERT INTO `authors_books` (`id`, `author_id`, `book_id`, `created`, `modified`) VALUES
(1, 1, 1, '2018-10-01', '2018-10-01'),
(2, 2, 2, '2018-10-01', '2018-10-01'),
(3, 3, 3, '2018-10-01', '2018-10-01'),
(4, 4, 4, '2018-10-01', '2018-10-01'),
(5, 5, 5, '2018-10-01', '2018-10-01'),
(6, 6, 6, '2018-10-01', '2018-10-01'),
(7, 7, 7, '2018-10-01', '2018-10-01'),
(8, 8, 8, '2018-10-01', '2018-10-01'),
(9, 9, 9, '2018-10-01', '2018-10-01'),
(10, 10, 10, '2018-10-01', '2018-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `date_of_publication` date NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `medium_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `Tag` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `date_of_publication`, `created`, `modified`, `image`, `status`, `medium_id`, `type_id`, `Tag`) VALUES
(1, 'And Then There Were None', '1939-11-10', '2018-10-01', '2018-10-01', 'and then there were none.jpg', 1, 1, 3, ''),
(2, 'Richard III', '1633-11-01', '2018-10-01', '2018-10-01', 'richard-iii.jpg', 1, 1, 3, ''),
(3, 'The magnificent marriage', '1940-06-01', '2018-10-01', '2018-10-01', 'magnificent mariage.jpg', 1, 1, 3, ''),
(4, 'The Duchess', '2017-06-27', '2018-10-01', '2018-10-01', 'duchess.jpg', 1, 1, 3, ''),
(5, 'The Carpetbaggers', '1961-01-01', '2018-10-01', '2018-10-01', 'carpetbaggers.jpg', 1, 1, 3, ''),
(6, 'The Strange Case of Peter the Lett', '1931-01-01', '2018-10-01', '2018-10-01', 'PietrLeLetton.jpg', 1, 1, 3, ''),
(7, 'The Secret Seven', '1949-01-01', '2018-10-01', '2018-10-01', 'TheSecretSeven.jpg', 1, 1, 3, ''),
(8, 'The Other Side of Midnight', '1973-01-01', '2018-10-01', '2018-10-01', 'otherside.jpg', 1, 1, 3, ''),
(9, 'Harry Potter and the Philosopher''s Stone', '1997-06-26', '2018-10-01', '2018-10-01', '220px-Harry_Potter_and_the_Philosopher''s_Stone_Book_Cover.jpg', 1, 1, 3, ''),
(10, 'Frank Merriwell at Yale', '1903-01-01', '2018-10-01', '2018-10-01', 'frank_merriwell.jpg', 1, 1, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `books_categories`
--

CREATE TABLE IF NOT EXISTS `books_categories` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_categories`
--

INSERT INTO `books_categories` (`id`, `book_id`, `category_id`, `created`, `modified`) VALUES
(1, 1, 1, '2018-10-01', '2018-10-01'),
(2, 2, 9, '2018-10-01', '2018-10-01'),
(3, 3, 4, '2018-10-01', '2018-10-01'),
(4, 4, 4, '2018-10-01', '2018-10-01'),
(5, 5, 4, '2018-10-01', '2018-10-01'),
(6, 6, 1, '2018-10-01', '2018-10-01'),
(7, 7, 11, '2018-10-01', '2018-10-01'),
(8, 8, 1, '2018-10-01', '2018-10-01'),
(9, 9, 10, '2018-10-01', '2018-10-01'),
(10, 10, 12, '2018-10-01', '2018-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `description`, `created`, `modified`) VALUES
(1, 'Crime', '2018-10-01', '2018-10-01'),
(2, 'Biography', '2018-10-01', '2018-10-01'),
(3, 'Sports', '2018-10-01', '2018-10-01'),
(4, 'Romance', '2018-10-01', '2018-10-01'),
(5, 'Sci-fy', '2018-10-01', '2018-10-01'),
(6, 'Horror', '2018-10-01', '2018-10-01'),
(7, 'War', '2018-10-01', '2018-10-01'),
(8, 'Westerns', '2018-10-01', '2018-10-01'),
(9, 'Historical', '2018-10-01', '2018-10-01'),
(10, 'Fantasy', '2018-10-01', '2018-10-01'),
(11, 'children', '2018-10-01', '2018-10-01'),
(12, 'comic', '2018-10-01', '2018-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(2, 'fr', 'books', 1, 'book_title', 'Dix petits nègres'),
(3, 'fr', 'books', 2, 'book_title', 'Richard III'),
(4, 'fr', 'books', 3, 'book_title', 'Le marriage magnifique'),
(5, 'fr', 'books', 4, 'book_title', 'La Duchesse'),
(6, 'fr', 'books', 5, 'book_title', 'Celui qui porte un sac en tapis'),
(7, 'fr', 'books', 6, 'book_title', 'Pietr-le-Letton'),
(8, 'fr', 'books', 7, 'book_title', 'Le Clan des sept'),
(9, 'fr', 'books', 8, 'book_title', 'De l''autre côté de minuit '),
(10, 'fr', 'books', 9, 'book_title', 'Harry Potter à l''école des sorciers'),
(11, 'fr', 'books', 10, 'book_title', 'Frank Merriwell a Yale');

-- --------------------------------------------------------

--
-- Table structure for table `library_rules`
--

CREATE TABLE IF NOT EXISTS `library_rules` (
  `id` int(11) NOT NULL,
  `overdue_daily_fine` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `library_rules`
--

INSERT INTO `library_rules` (`id`, `overdue_daily_fine`, `created`, `modified`) VALUES
(1, 1, '2018-10-01', '2018-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_issued` date NOT NULL,
  `date_due_for_return` date NOT NULL,
  `date_returned` date DEFAULT NULL,
  `amount_of_fine` int(11) NOT NULL DEFAULT '0',
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mediums`
--

CREATE TABLE IF NOT EXISTS `mediums` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mediums`
--

INSERT INTO `mediums` (`id`, `name`) VALUES
(1, 'book'),
(2, 'video game'),
(3, 'movie');

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20181008004548, 'Initial', '2018-10-08 04:45:48', '2018-10-08 04:45:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `other_details` varchar(255) DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `address`, `phone_number`, `email`, `other_details`, `created`, `modified`, `user_id`) VALUES
(1, 'Andre', 'Pilon', '123 7 avenue', 1111111111, 'andre@pilon.com', '', '2018-10-01', '2018-10-01', 1),
(29, 'manu', 'manu', 'manu', 12312111, 'sebas84_5@hotmail.com', '', '2018-10-08', '2018-10-08', 32);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(9) NOT NULL,
  `name` text NOT NULL,
  `medium_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `medium_id`) VALUES
(1, 'audiobook', 1),
(2, 'digital book', 1),
(3, 'physical book', 1),
(4, 'Xbox One', 2),
(5, 'PC', 2),
(6, 'Switch', 2),
(7, 'Playstation 4', 2),
(8, 'Blu Ray', 3),
(9, 'VHS', 3),
(10, 'DVD', 3),
(11, 'Digital', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'teacher',
  `confirmation_code` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `confirmation_code`, `active`) VALUES
(1, 'andre', 'andre@pilon.com', '$2y$10$6pYXPR5Ma94ABCZYJrj0z.BvXrvQ9YPX6tK3YD96uBL411nMnSWju', 'teacher', NULL, 1),
(2, 'admin', 'admin@admin.com', '$2y$10$6pYXPR5Ma94ABCZYJrj0z.BvXrvQ9YPX6tK3YD96uBL411nMnSWju', 'admin', NULL, 1),
(32, 'manu', 'sebas84_5@hotmail.com', '$2y$10$Qcfwd4gIiyL7nvw5ptoPXeFd4Y7hsjBc8D.zk42U5NBLNpsh2mUUi', 'teacher', '75776040-8887-46c9-a9be-d5a8317c01d9', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors_books`
--
ALTER TABLE `authors_books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `author_id` (`author_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medium_id` (`medium_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `books_categories`
--
ALTER TABLE `books_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`(100),`foreign_key`,`field`(100)),
  ADD KEY `I18N_FIELD` (`model`(100),`foreign_key`,`field`(100));

--
-- Indexes for table `library_rules`
--
ALTER TABLE `library_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`teacher_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `mediums`
--
ALTER TABLE `mediums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medium_id` (`medium_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `authors_books`
--
ALTER TABLE `authors_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `books_categories`
--
ALTER TABLE `books_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `library_rules`
--
ALTER TABLE `library_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mediums`
--
ALTER TABLE `mediums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `authors_books`
--
ALTER TABLE `authors_books`
  ADD CONSTRAINT `authors_books_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `authors_books_ibfk_4` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`medium_id`) REFERENCES `mediums` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `books_categories`
--
ALTER TABLE `books_categories`
  ADD CONSTRAINT `books_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `books_categories_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `types`
--
ALTER TABLE `types`
  ADD CONSTRAINT `types_ibfk_1` FOREIGN KEY (`medium_id`) REFERENCES `mediums` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
