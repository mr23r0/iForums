-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 06:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iforums`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_description` varchar(300) NOT NULL,
  `create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `create`) VALUES
(1, 'Remote Code Execution', 'In computer security, arbitrary code execution is an attacker\'s ability to execute arbitrary commands or code on a target machine or in a target process. An arbitrary code execution vulnerability is a security flaw in software or hardware allowing arbitrary code execution.', '2021-03-27 12:43:48'),
(2, 'Denial-of-service Attack', 'In computing, a denial-of-service attack is a cyber-attack in which the perpetrator seeks to make a machine or network resource unavailable to its intended users by temporarily or indefinitely disrupting services of a host connected to the Internet.', '2021-03-27 12:46:43'),
(3, 'Cross Site Scripting', 'Cross-Site Scripting (XSS) attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user.', '2021-03-27 15:19:03'),
(4, 'Broken authentication', 'Broken authentication is an umbrella term for several vulnerabilities that attackers exploit to impersonate legitimate users online.', '2021-03-27 15:21:29'),
(5, 'Cross-Site Request Forgery', 'Cross-site request forgery, also known as one-click attack or session riding and abbreviated as CSRF or XSRF, is a type of malicious exploit of a website where unauthorized commands are submitted from a user that the web application trusts.', '2021-03-27 15:22:05'),
(6, 'Server-side request forgery', 'In computer security, server-side request forgery is a type of exploit where an attacker abuses the functionality of a server causing it to access or manipulate information in the realm of that server that would otherwise not be directly accessible to the attacker.', '2021-03-27 15:31:35'),
(7, 'The Backdoor', 'The backdoor attack is a type of malware that is used to get unauthorized access to a website by the cybercriminals. The cybercriminals spread the malware in the system through unsecured points of entry, such as outdated plug-ins or input fields.', '2021-03-27 15:41:22'),
(9, 'Account takeover', 'Account Takeover is a form of identity theft where a fraudster illegally uses bots to get access to a victim\'s bank, e-commerce site, or other types of accounts. A successful account takeover attack leads to fraudulent transactions and unauthorized shopping from the victim\'s compromised account', '2021-04-14 12:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sno` int(11) NOT NULL,
  `name` text NOT NULL,
  `query` text NOT NULL,
  `gender` text NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(10) NOT NULL,
  `thread_user_id` int(10) NOT NULL,
  `thread_description` varchar(500) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `thread_cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `thread_user_id`, `thread_description`, `created`, `thread_cat_id`) VALUES
(1, 9, 'not able', '2021-03-31 16:34:41', 4),
(28, 10, 'a man from nowhere', '2021-04-14 12:40:48', 4),
(31, 10, 'broken Auth is very Dangerous Vuln', '2021-04-14 12:44:43', 4),
(32, 10, 'fnfn', '2021-04-14 13:11:35', 4),
(33, 10, 'test', '2021-04-20 08:26:45', 1),
(34, 10, 'test', '2021-04-20 08:26:59', 2),
(35, 10, 'test', '2021-04-20 08:27:09', 3),
(36, 10, 'test', '2021-04-20 08:27:23', 5),
(37, 10, 'test', '2021-04-20 08:27:36', 6),
(38, 10, 'test', '2021-04-20 08:27:52', 7),
(39, 10, 'test', '2021-04-20 08:28:03', 9),
(40, 10, 'test', '2021-04-20 08:35:22', 9),
(41, 10, 'alert(1)', '2021-04-20 08:35:44', 9),
(42, 10, 'i am here ', '2021-04-20 08:48:02', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `username`, `email`, `password`, `dt`) VALUES
(9, 'saransh saraf', 'rishu@gmail.com', '$2y$10$yFUz0qGE4XVSMCmdx/BSAOz3Ry2/E7W7/jNt9MpLXp9hVVfYWof2m', '2021-03-31 09:29:51'),
(10, 'Dileep kushwaha', 'dileep@man.com', '$2y$10$X03v0NmCrUTOxFldqZkB6u3pnB0ClaavRTP2.oHkqd9wZ6IMCZggS', '2021-04-13 01:55:23'),
(11, 'bravo', 'narayanraj0001@gmail.com', '$2y$10$WJF1R/5dUIFyS3V6lnO1mu97BGIJb/QIvzmb/iB84Qpx9ZJKILHHa', '2021-04-20 04:38:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_description` (`thread_description`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_description_2` (`thread_description`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_description_3` (`thread_description`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_description_4` (`thread_description`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_description_5` (`thread_description`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_description_6` (`thread_description`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_description_7` (`thread_description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);
ALTER TABLE `users` ADD FULLTEXT KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
