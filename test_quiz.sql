-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2020 at 01:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `choice_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `group_id` int(11) NOT NULL,
  `group_name` varchar(120) NOT NULL,
  `time_answered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `choice_id`, `group_id`, `group_name`, `time_answered`) VALUES
(230, 12, '16', '1234', 1, '', '2020-09-24 13:10:04'),
(371, 36, '1', '3421', 2, '', '2020-09-29 08:46:56'),
(372, 36, '2', '4213', 2, '', '2020-09-29 08:47:00'),
(373, 36, '3', '3241', 2, '', '2020-09-29 08:47:03'),
(374, 36, '4', '4312', 2, '', '2020-09-29 08:47:07'),
(375, 36, '5', '3241', 2, '', '2020-09-29 08:47:11'),
(376, 36, '6', '3241', 2, '', '2020-09-29 08:47:15'),
(377, 36, '7', '4213', 2, '', '2020-09-29 08:47:18'),
(378, 36, '8', '4312', 2, '', '2020-09-29 08:47:21'),
(379, 36, '9', '4213', 2, '', '2020-09-29 08:47:26'),
(380, 36, '10', '4312', 2, '', '2020-09-29 08:47:29'),
(421, 38, '1', '3241', 2, '', '2020-10-02 01:32:37'),
(422, 38, '2', '3412', 2, '', '2020-10-02 01:32:43'),
(423, 38, '3', '3142', 2, '', '2020-10-02 01:32:49'),
(424, 38, '4', '3412', 2, '', '2020-10-02 01:32:56'),
(425, 38, '5', '4132', 2, '', '2020-10-02 01:33:02'),
(426, 38, '6', '4312', 2, '', '2020-10-02 01:33:08'),
(427, 38, '7', '3142', 2, '', '2020-10-02 01:33:15'),
(428, 38, '8', '4312', 2, '', '2020-10-02 01:33:23'),
(429, 38, '9', '3412', 2, '', '2020-10-02 01:33:30'),
(430, 38, '10', '4312', 2, '', '2020-10-02 01:33:40'),
(431, 37, '1', '1342', 1, '', '2020-10-02 01:38:01'),
(432, 37, '2', '1324', 1, '', '2020-10-02 01:38:08'),
(433, 37, '3', '1342', 1, '', '2020-10-02 01:38:17'),
(434, 37, '4', '4132', 1, '', '2020-10-02 01:38:34'),
(435, 37, '5', '3124', 1, '', '2020-10-02 01:38:49'),
(436, 37, '6', '3124', 1, '', '2020-10-02 01:38:58'),
(437, 37, '7', '3241', 1, '', '2020-10-02 01:39:06'),
(438, 37, '8', '3142', 1, '', '2020-10-02 01:39:13'),
(439, 37, '9', '4132', 1, '', '2020-10-02 01:39:18'),
(440, 37, '10', '4312', 1, '', '2020-10-02 01:39:23'),
(441, 32, '1', '1423', 2, '', '2020-10-02 01:40:28'),
(442, 32, '2', '3142', 2, '', '2020-10-02 01:40:35'),
(443, 32, '3', '3214', 2, '', '2020-10-02 01:40:44'),
(444, 32, '4', '2143', 2, '', '2020-10-02 01:40:50'),
(445, 32, '5', '3142', 2, '', '2020-10-02 01:40:59'),
(446, 32, '6', '1342', 2, '', '2020-10-02 01:41:06'),
(447, 32, '7', '3214', 2, '', '2020-10-02 01:41:14'),
(448, 32, '8', '1432', 2, '', '2020-10-02 01:41:22'),
(449, 32, '9', '4132', 2, '', '2020-10-02 01:41:31'),
(450, 32, '10', '4132', 2, '', '2020-10-02 01:41:36'),
(504, 23, '1', '3214', 1, 'Team A', '2020-10-22 15:58:43'),
(505, 23, '2', '4123', 1, 'Team A', '2020-10-22 15:58:51'),
(506, 23, '3', '3142', 1, 'Team A', '2020-10-22 15:58:58'),
(507, 23, '4', '2431', 1, 'Team A', '2020-10-22 15:59:05'),
(508, 23, '5', '1432', 1, 'Team A', '2020-10-22 15:59:10'),
(509, 23, '6', '2314', 1, 'Team A', '2020-10-22 15:59:24'),
(510, 23, '7', '3124', 1, 'Team A', '2020-10-22 15:59:29'),
(511, 23, '8', '3124', 1, 'Team A', '2020-10-22 15:59:33'),
(512, 23, '9', '3142', 1, 'Team A', '2020-10-22 15:59:39'),
(513, 23, '10', '3124', 1, 'Team A', '2020-10-22 15:59:45'),
(654, 52, '1', '3241', 1, 'Team A', '2020-10-23 16:10:40'),
(655, 52, '2', '3241', 1, 'Team A', '2020-10-23 16:10:46'),
(656, 52, '3', '3241', 1, 'Team A', '2020-10-23 16:10:52'),
(657, 52, '4', '3241', 1, 'Team A', '2020-10-23 16:10:56'),
(658, 52, '5', '3241', 1, 'Team A', '2020-10-23 16:11:00'),
(659, 52, '6', '3241', 1, 'Team A', '2020-10-23 16:11:04'),
(660, 52, '7', '3241', 1, 'Team A', '2020-10-23 16:11:11'),
(661, 52, '8', '3142', 1, 'Team A', '2020-10-23 16:11:20'),
(662, 52, '9', '3241', 1, 'Team A', '2020-10-23 16:11:24'),
(663, 52, '10', '3241', 1, 'Team A', '2020-10-23 16:11:31'),
(664, 51, '1', '3241', 1, 'Team A', '2020-10-28 14:44:58'),
(665, 51, '2', '3142', 1, 'Team A', '2020-10-28 14:45:03'),
(666, 51, '3', '2314', 1, 'Team A', '2020-10-28 14:45:09'),
(667, 51, '4', '4312', 1, 'Team A', '2020-10-28 14:45:18'),
(668, 51, '5', '4213', 1, 'Team A', '2020-10-28 14:45:30'),
(669, 51, '6', '4213', 1, 'Team A', '2020-10-28 14:45:36'),
(670, 51, '7', '3412', 1, 'Team A', '2020-10-28 14:45:44'),
(671, 51, '8', '4213', 1, 'Team A', '2020-10-28 14:45:58'),
(672, 51, '9', '4213', 1, 'Team A', '2020-10-28 14:46:05'),
(673, 51, '10', '4312', 1, 'Team A', '2020-10-28 14:46:11'),
(674, 60, '1', '3421', 3, 'Team D', '2020-10-28 16:46:01'),
(675, 60, '2', '3421', 3, 'Team D', '2020-10-28 16:46:07'),
(676, 60, '3', '3421', 3, 'Team D', '2020-10-28 16:46:18'),
(677, 60, '4', '3421', 3, 'Team D', '2020-10-28 16:46:23'),
(678, 60, '5', '3421', 3, 'Team D', '2020-10-28 16:46:30'),
(679, 60, '6', '3421', 3, 'Team D', '2020-10-28 16:46:39'),
(680, 60, '7', '3421', 3, 'Team D', '2020-10-28 16:46:46'),
(681, 60, '8', '3412', 3, 'Team D', '2020-10-28 16:46:54'),
(682, 60, '9', '3421', 3, 'Team D', '2020-10-28 16:46:58'),
(683, 60, '10', '3412', 3, 'Team D', '2020-10-28 16:47:06'),
(695, 24, '1', '3142', 1, 'Team A', '2020-10-30 03:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `customers_auth`
--

CREATE TABLE `customers_auth` (
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers_auth`
--

INSERT INTO `customers_auth` (`uid`, `name`, `email`, `phone`, `password`, `address`, `city`, `created`) VALUES
(169, 'Swadesh Behera', 'swadesh@gmail.com', '1234567890', '$2a$10$251b3c3d020155f7553c1ugKfEH04BD6nbCbo78AIDVOqS3GVYQ46', '4092 Furth Circle', 'Singapore', '2014-08-31 10:21:20'),
(170, 'Ipsita Sahoo', 'ipsita@gmail.com', '1111111111', '$2a$10$d84ffcf46967db4e1718buENHT7GVpcC7FfbSqCLUJDkKPg4RcgV2', '2, rue du Commerce', 'NYC', '2014-08-31 10:30:58'),
(171, 'Trisha Tamanna Priyadarsini', 'trisha@gmail.com', '2222222222', '$2a$10$c9b32f5baa3315554bffcuWfjiXNhO1Rn4hVxMXyJHJaesNHL9U/O', 'C/ Moralzarzal, 86', 'Burlingame', '2014-08-31 10:32:03'),
(172, 'Sai Rimsha', 'rimsha@gmail.com', '3333333333', '$2a$10$477f7567571278c17ebdees5xCunwKISQaG8zkKhvfE5dYem5sTey', '897 Long Airport Avenue', 'Madrid', '2014-08-31 12:34:21'),
(173, 'Satwik Mohanty', 'satwik@gmail.com', '4444444444', '$2a$10$2b957be577db7727fed13O2QmHMd9LoEUjioYe.zkXP5lqBumI6Dy', 'Lyonerstr. 34', 'San Francisco\n', '2014-08-31 12:36:02'),
(174, 'Tapaswini Sahoo', 'linky@gmail.com', '5555555555', '$2a$10$b2f3694f56fdb5b5c9ebeulMJTSx2Iv6ayQR0GUAcDsn0Jdn4c1we', 'ul. Filtrowa 68', 'Warszawa', '2014-08-31 12:44:54'),
(175, 'Manas Ranjan Subudhi', 'manas@gmail.com', '6666666666', '$2a$10$03ab40438bbddb67d4f13Odrzs6Rwr92xKEYDbOO7IXO8YvBaOmlq', '5677 Strong St.', 'Stavern\n', '2014-08-31 12:45:08'),
(178, 'AngularCode Administrator', 'admin@angularcode.com', '0000000000', '$2a$10$72442f3d7ad44bcf1432cuAAZAURj9dtXhEMBQXMn9C8SpnZjmK1S', 'C/1052, Bangalore', '', '2014-08-31 13:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `element_description`
--

CREATE TABLE `element_description` (
  `element_id` int(11) NOT NULL,
  `element_name` varchar(120) NOT NULL,
  `element_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `element_description`
--

INSERT INTO `element_description` (`element_id`, `element_name`, `element_desc`) VALUES
(1, 'Earth', 'You are Earth! Earth individuals are shrewd, solid and profoundly cryptic. Notwithstanding, your inside is abrupt, yet touchy and perhaps delicate. Your foe is Fire. Exercise: Don\'t be reluctant to communicate your emotions. As much as you would wish it, individuals are wouldn\'t fret perusers. Profile B '),
(2, 'Water', 'You are Water! Brimming with energy and confidence, world harmony and clearness basically stream out of you. Be that as it may, your heart can be broken effectively, and you\'re simply excessively sentimental on occasion. Your adversary is Air. Exercise: Remember harmony will recuperate the world, each individual in turn. '),
(3, 'Air', 'You are Air! Air individuals are gutsy, shrewd and flexibility. You are additionally marvelous, and some of the time have your mind in another place, in a manner of speaking. Individuals consider you to be a cheerful individual. Your adversary is Earth. Exercise: Watch your back. Profile C '),
(4, 'Fire', 'You are Fire! You are the most free of the components and are athletic. You won\'t let anything keep you down. Notwithstanding, you can here and there offend people, and the entirety of that energy can go to your head. Your adversary is Water. Exercise: Relax every so often, and make certain to consider others. Profile D');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `is_active`, `created`) VALUES
(1, 'Team A', 1, '2020-09-23 22:42:54'),
(2, 'Team B', 1, '2020-09-23 22:42:54'),
(3, 'Team D', 1, '2020-10-19 01:57:00'),
(4, 'Team C', 1, '2020-10-19 04:54:45'),
(5, 'Team E', 1, '2020-10-19 12:48:27'),
(6, 'Team F', 0, '2020-10-27 13:56:11'),
(7, 'Team G', 1, '2020-10-29 20:36:12'),
(8, 'Team H', 1, '2020-10-29 20:38:40'),
(9, 'Team I', 0, '2020-10-30 01:13:44'),
(10, 'test', 1, '2020-10-30 01:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `groups_average`
--

CREATE TABLE `groups_average` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `group_earth` int(11) NOT NULL,
  `group_air` int(11) NOT NULL,
  `group_water` int(11) NOT NULL,
  `group_fire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups_average`
--

INSERT INTO `groups_average` (`id`, `group_id`, `group_earth`, `group_air`, `group_water`, `group_fire`) VALUES
(1, 2, 25, 25, 25, 25);

-- --------------------------------------------------------

--
-- Table structure for table `is_active`
--

CREATE TABLE `is_active` (
  `is_active_id` int(11) NOT NULL,
  `is_active_label` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `is_active`
--

INSERT INTO `is_active` (`is_active_id`, `is_active_label`) VALUES
(1, 'Active'),
(2, 'De-activated');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question` varchar(200) CHARACTER SET latin1 NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'multiple',
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `type`, `is_active`) VALUES
(1, 'Decisive\",\"Orderly\",\"Considerate\",\"Spontaneous', 'multiple', 1),
(2, 'Results\",\"Systems\",\"Support\",\"Inspiration', 'multiple', 1),
(3, 'Destination\",\"Schedule\",\"Journey\",\"Dream', 'multiple', 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`) VALUES
(1, 'John Raymund Niconi', 'jraymund.niconi@gmail.com', '$2y$10$ygb2IhbAGhR8wZvmmW82T.KvleOBBoE1F6QcMfsQKg0/US6S91r2G');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `group_id` varchar(11) DEFAULT NULL,
  `had_taken` int(11) NOT NULL DEFAULT 0,
  `date_joined` datetime NOT NULL DEFAULT current_timestamp(),
  `u_is_active` int(11) DEFAULT NULL,
  `acl_id` varchar(11) DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `group_id`, `had_taken`, `date_joined`, `u_is_active`, `acl_id`) VALUES
(23, 'jraymund.niconi@gmail.com', 'John', 'Depp', '1', 1, '2020-09-13 01:12:33', 1, '1'),
(24, 'jane@gmailme.com', 'Jane', 'Doe', '1', 0, '2020-09-13 01:12:33', 1, '2'),
(25, 'susan@gmailme.com', 'Susan', 'Chu', '2', 0, '2020-09-13 01:12:33', 1, '2'),
(26, 'mjordan@gmailme.com', 'Michael', 'Jordan', '2', 0, '2020-09-25 11:11:03', 1, '2'),
(27, 'roger.rabbit@gmailme.com', 'Roger', 'Rabbit', '1', 0, '2020-09-25 11:11:03', 1, '2'),
(28, 'jay@mail.com', 'jay', 'yo', '2', 0, '2020-09-25 15:07:19', 1, '2'),
(29, 'ltomlin@acme.com', 'Leanne', 'Tomlin', '1', 0, '2020-09-25 15:19:19', 1, '2'),
(30, 'tessa@mail.com', 'Tessa', 'Niconi', '1', 0, '2020-09-25 16:43:26', 1, '2'),
(31, 'ltomlin2@acme.com', 'Leanne2', 'Tomlin2', '2', 0, '2020-09-26 11:04:47', 1, '2'),
(32, 'trte@sdwedd.com', 'Teddy', 'Bear', '2', 1, '2020-09-26 11:49:07', 1, '2'),
(33, 'jkook@gmailme.com', 'Jhung', 'Kook', '2', 0, '2020-09-27 10:38:54', 1, '2'),
(34, 'mail@email.com', 'Rey', 'Valera', '2', 0, '2020-09-27 11:19:25', 1, '2'),
(35, 'rvalera@mailme.com', 'Rey', 'Valera', '2', 0, '2020-09-27 11:24:07', 1, '2'),
(41, 'ja@email.com', 'Joe', 'Anne', '1', 0, '2020-10-09 18:02:03', 1, '2'),
(40, 'mymeail@email.com', 'My', 'Email', '1', 0, '2020-10-07 21:29:24', 1, '2'),
(37, 'vsoto@email.com', 'Vico', 'Soto', '1', 1, '2020-09-29 00:40:08', 1, '2'),
(39, 'test@email.com', 'test', 'test', '2', 0, '2020-09-29 18:49:45', 1, '2'),
(36, 'bugs@bunny.com', 'Bugss', 'Bunnys', '2', 0, '2020-09-28 16:50:17', 1, '2'),
(38, 'diego@email.com', 'Diego', 'Scott', '2', 1, '2020-09-29 00:42:56', 1, '2'),
(42, 'Jim@mail.com', 'Jim', 'Brickman', '1', 0, '2020-10-13 03:46:52', 1, '2'),
(43, 'anna@email.com', 'Anna', 'Garci', NULL, 0, '2020-10-17 01:09:06', 1, NULL),
(44, 'Jay@email.com', 'Jay', 'Z', '1', 0, '2020-10-17 12:05:57', 1, '2'),
(60, 'user@email.com', 'User 7', 'Tester', '3', 0, '2020-10-27 01:39:41', 1, '1'),
(46, 'jraymund222.niconi@gmail.com', 'John', 'Niconi', '', 0, '2020-10-18 05:56:05', 1, ''),
(47, 'emailme@email.com', 'email', 'email', '1', 0, '2020-10-18 05:59:10', 1, '2'),
(48, 'user23@email.com', 'User23', 'UIser23SN', '2', 0, '2020-10-18 11:50:09', 1, ''),
(49, 'user3@email.cos', 'User3', 'User3SN', '2', 0, '2020-10-18 11:53:01', 1, '1'),
(51, 'User4s@email.com', 'User4s', 'User4', '1', 1, '2020-10-19 16:41:05', 1, '1'),
(52, 'user5@email.com', 'User5FN', 'User5SN', '1', 1, '2020-10-19 19:09:52', 0, '2'),
(61, 'user8@email.com', 'User8', 'Tester', '3', 0, '2020-10-27 02:12:32', 0, '2'),
(62, 'user9@email.com', 'User 9', 'Tester', '4', 0, '2020-10-27 05:00:36', 0, '1'),
(63, 'user12@email.com', 'User12', 'Tester', '8', 0, '2020-10-29 20:40:45', 1, '2'),
(64, '', 'terst', 'test', '10', 0, '2020-10-30 01:21:40', 1, '2'),
(65, 'ltomlin22222@acme.com', 'Leanne2222', 'Tomlin222', '4', 0, '2020-10-30 02:03:50', 1, '2'),
(66, '', 'Saffgsds', 'fdsefg', '4', 0, '2020-10-30 02:06:32', 1, '2'),
(67, '', 'John', 'Niconi', '3', 0, '2020-10-30 02:14:51', 1, '2'),
(68, '', 'df', 'dfdf', '3', 0, '2020-10-30 02:16:01', 1, '2'),
(69, '', 'dfdsfdsfg', 'gbhgh', '4', 0, '2020-10-30 02:17:24', 0, '2'),
(70, '', 'Leanneww', 'Tomlin2222', '1', 0, '2020-10-30 02:22:47', 1, '2'),
(71, 'email@email.com', 'Leanne22344', 'Tomlin3445', '2', 0, '2020-10-30 02:28:20', 1, '2'),
(72, 'ltomlin@acme.coms', 'Leanne45', 'Tomlin45', '4', 1, '2020-10-30 11:41:59', 0, '2');

-- --------------------------------------------------------

--
-- Table structure for table `user_acl`
--

CREATE TABLE `user_acl` (
  `acl_id` int(11) NOT NULL,
  `acl_name` varchar(120) NOT NULL,
  `is_active` int(11) DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_acl`
--

INSERT INTO `user_acl` (`acl_id`, `acl_name`, `is_active`, `created`) VALUES
(1, 'Administrator', 1, '2020-10-18 11:35:43'),
(2, 'Subscriber', 1, '2020-10-18 11:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_acl` int(11) NOT NULL DEFAULT 2,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `user_name`, `user_email`, `first_name`, `last_name`, `user_phone`, `user_password`, `user_address`, `user_acl`, `created`) VALUES
(1, 'Mohan', 'mohan@gmail.com', '', '', '1234567890', '$2a$10$06bc80287803a04453653uzK14oX.p9YNy6VrJb7DTjczdo6S73nC', 'zzz, xxxx', 2, '2017-04-24 18:43:36'),
(23, 'joroni', 'jraymund.niconi@gmail.com', 'John Raymund', 'Niconi', '09954731232', '$2a$10$139ba8c62e3a80047f931u4Ns0.f2ihXLFBdJzOLaHKMp4oO4/VD2', '9378 Calantas Street, San Antonio Village', 1, '2020-09-22 19:55:23'),
(24, 'janedoe', 'jane.doe@gmailme.com', 'Jane', 'Doe', '11112222', '', 'test', 2, '2020-09-23 07:58:51'),
(25, 'susanroces', 'susan.roces@gmailme.com', 'Susan', 'Roces', '22222222', '$2a$10$63b6fecbc72c2fd4cee2duBlZpiW.EdlPsPkF0fqIbEQ/ZYU1ZbEi', 'N/A', 2, '2020-09-23 08:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_scores`
--

CREATE TABLE `user_scores` (
  `id` int(100) NOT NULL,
  `user_id` varchar(120) NOT NULL,
  `user_earth` int(11) NOT NULL,
  `user_air` int(11) NOT NULL,
  `user_water` int(11) NOT NULL,
  `user_fire` int(11) NOT NULL,
  `group_id` varchar(120) NOT NULL,
  `group_name` varchar(120) DEFAULT NULL,
  `user_element` varchar(120) DEFAULT NULL,
  `seconds` varchar(120) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_scores`
--

INSERT INTO `user_scores` (`id`, `user_id`, `user_earth`, `user_air`, `user_water`, `user_fire`, `group_id`, `group_name`, `user_element`, `seconds`, `created`) VALUES
(20, '38', 34, 26, 21, 19, '2', 'Team B', 'Earth', NULL, '2020-10-02 01:33:41'),
(21, '37', 27, 19, 29, 25, '1', 'Team A', 'water', NULL, '2020-10-02 01:39:24'),
(22, '32', 25, 20, 29, 26, '2', 'Team B', 'water', NULL, '2020-10-02 01:41:38'),
(25, '52', 33, 21, 19, 27, '1', 'Team A', 'earth', NULL, '2020-10-22 12:43:39'),
(26, '23', 27, 24, 29, 20, '1', 'Team A', 'water', NULL, '2020-10-22 15:18:19'),
(27, '51', 35, 24, 16, 25, '1', 'Team A', 'earth', NULL, '2020-10-28 14:46:12'),
(28, '60', 30, 40, 18, 12, '3', 'Team D', 'air', NULL, '2020-10-28 16:47:07'),
(30, '24', 30, 27, 19, 24, '1', 'Team A', 'earth', NULL, '2020-10-29 02:53:09');

--
-- Triggers `user_scores`
--
DELIMITER $$
CREATE TRIGGER `return_as_tester` AFTER INSERT ON `user_scores` FOR EACH ROW update users set had_taken = 0 where not exists (select user_id from user_scores where users.id = user_scores.user_id)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `return_as_user_tester` AFTER DELETE ON `user_scores` FOR EACH ROW UPDATE users SET had_taken = 0 where not exists (select user_id from user_scores where users.id = user_scores.user_id)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_auth`
--
ALTER TABLE `customers_auth`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `element_description`
--
ALTER TABLE `element_description`
  ADD PRIMARY KEY (`element_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `groups_average`
--
ALTER TABLE `groups_average`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `is_active`
--
ALTER TABLE `is_active`
  ADD PRIMARY KEY (`is_active_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_acl`
--
ALTER TABLE `user_acl`
  ADD PRIMARY KEY (`acl_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_scores`
--
ALTER TABLE `user_scores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=696;

--
-- AUTO_INCREMENT for table `customers_auth`
--
ALTER TABLE `customers_auth`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `element_description`
--
ALTER TABLE `element_description`
  MODIFY `element_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `groups_average`
--
ALTER TABLE `groups_average`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `is_active`
--
ALTER TABLE `is_active`
  MODIFY `is_active_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `user_acl`
--
ALTER TABLE `user_acl`
  MODIFY `acl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_scores`
--
ALTER TABLE `user_scores`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
