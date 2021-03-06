-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2018 at 12:08 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `usertype` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`, `usertype`) VALUES
('admin', '', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_isbn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `book_title` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `book_author` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `book_image` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `book_descr` text COLLATE latin1_general_ci,
  `book_price` decimal(6,2) NOT NULL,
  `publisherid` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`book_isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_isbn`, `book_title`, `book_author`, `book_image`, `book_descr`, `book_price`, `publisherid`) VALUES
(' 978-1-5227-9214-7', 'The Joy of PHP: A Beginner\'s Guide to Programming Interactive Web Applications with PHP and MySQL', 'Alan Forbes', 'the_joy_of_php.jpg', 'Simple Text-Based Response:\r\n\r\nThis identifies the HTTP version that is used by the server it gives a coded results of the attempt to satisfy the request.', '978.86', 1),
('978-0-3214-4249-9', 'PHP for the World Wide Web, Third Edition', 'Larry Ullman', 'php_for_the_world_wide_web.jpg', 'With PHP for the World Wide Web, Third Edition: Visual QuickStart Guide, readers can start from the beginning to get a tour of the programming language, or look up specific tasks to learn just what they need to know. This task-based visual reference guide uses step-by-step instructions and plenty of screenshots to teach beginning and intermediate users this popular open-source scripting language. Leading technology author Larry Ullman guides readers through the new features in PHP 6, focusing primarily on improved support for handling any language in a Web site. Other addressed changes include removal of outdated and insecure features, plus new functions and more efficient ways to tackle common needs. Both beginning users, who want a thorough introduction to the technology, and more intermediate users, who are looking for a convenient reference, will find what they need here--in straightforward language and thorough readily accessible examples.', '762.80', 0),
('978-0-5960-0630-3', 'Head First PHP & MySQL: A Brain-Friendly Guide 1st Edition', 'Lynn Beighley, Michael Morrison', 'head_first_php_and_MySQL.jpg', 'If you\'re ready to create web pages more complex than those you can build with HTML and CSS, Head First PHP & MySQL is the ultimate learning guide to building dynamic, database-driven websites using PHP and MySQL. Packed with real-world examples, this book teaches you all the essentials of server-side programming, from the fundamentals of PHP and MySQL coding to advanced topics such as form validation, session IDs, cookies, database queries and joins, file I/O operations, content management, and more.', '926.69', 2),
('978-0-59610-101-5', 'PHP Cookbook, 2nd Edition', 'Adam Trachtenberg, David Sklar', 'PHP Cookbook.jpg', 'When it comes to creating dynamic web sites, the open source PHP language is red-hot property: used on more than 20 million web sites today, PHP is now more popular than Microsoft\'s ASP.NET technology. With our Cookbook\'s unique format, you can learn how to build dynamic web applications that work on any web browser. This revised new edition makes it easy to find specific solutions for programming challenges.\r\n\r\nPHP Cookbook has a wealth of solutions for problems that you\'ll face regularly. With topics that range from beginner questions to advanced web programming techniques, this guide contains practical examples -- or \"recipes\" -- for anyone who uses this scripting language to generate dynamic web content. Updated for PHP 5, this book provides solutions that explain how to use the new language features in detail, including the vastly improved object-oriented capabilities and the new PDO data access extension. New sections on classes and objects are included, along with new material on processing XML, building web services with PHP, and working with SOAP/REST architectures. With each recipe, the authors include a discussion that explains the logic and concepts underlying the solution.', '710.26', 2),
('978-1-4919-3309-1', 'PHP Web Services: APIs for the Modern Web 2nd Edition', 'Lorna Jane Mitchell ', 'php_web_services.jpg', 'Whether you’re sharing data between two internal systems or building an API so that users can access their data, this practical guide has everything you need to build APIs with PHP. Author Lorna Jane Mitchell provides lots of hands-on code samples, real-world examples, and advice based on her extensive experience to guide you through the process—from the underlying theory to methods for making your service robust.\r\n\r\nYou’ll learn how to use this language to work with JSON, XML, and other web service technologies. This updated second edition includes new tools and features that reflect PHP updates and changes on the Web.', '1338.90', 2);

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

DROP TABLE IF EXISTS `choices`;
CREATE TABLE IF NOT EXISTS `choices` (
  `id` int(10) NOT NULL,
  `question` int(10) NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question`, `correct`, `text`) VALUES
(1, 1, 1, 'PHP: Hypertext Preprocessor'),
(2, 1, 0, 'PHP: Personal Hyper Page'),
(3, 1, 0, 'PHP: Personal Hypertext Preprocessor'),
(4, 1, 0, 'PHP: People Hypertext Preprocessor');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customerid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `city` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `zip_code` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `country` varchar(60) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customerid` int(10) UNSIGNED NOT NULL,
  `amount` decimal(6,2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ship_name` char(60) COLLATE latin1_general_ci NOT NULL,
  `ship_address` char(80) COLLATE latin1_general_ci NOT NULL,
  `ship_city` char(30) COLLATE latin1_general_ci NOT NULL,
  `ship_zip_code` char(10) COLLATE latin1_general_ci NOT NULL,
  `ship_country` char(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `book_isbn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `item_price` decimal(6,2) NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`orderid`, `book_isbn`, `item_price`, `quantity`) VALUES
(1, '978-1-5227-9214-7', '978.86', 1),
(1, '978-0-5960-0630-3', '926.69', 1),
(2, '978-0-59610-101-5', '710.26', 1),
(5, '978-1-4919-3309-1', '1338.90', 1);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
CREATE TABLE IF NOT EXISTS `publisher` (
  `publisherid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`publisherid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisherid`, `publisher_name`) VALUES
(1, 'CreateSpace Independent Publishing Platform'),
(2, 'O\'Reilly Media');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question` int(10) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`question`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question`, `text`) VALUES
(1, 'What does PHP stands for?'),
(2, 'What is Responsive');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `usertype`) VALUES
('Michael', 'mikolit2283@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
