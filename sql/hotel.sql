SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE admin (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(55) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
    `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci AUTO_INCREMENT=2;

INSERT INTO (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, "Tom", "tomgo@gmail.com", "123Fight@", "27.12.2025 19:15:43", "27.12.2025")

CREATE TABLE adminlog (
    `id` INT(11) NOT NULL,
    `adminid` INT(11) NOT NULL,
    `ip` varbinary(16) NOT NULL,
    `logintime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE complainHistory (
    `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `complainid` INT (11) DEFAULT NULL,
    `complainStatus` VARCHAR(255) DEFAULT NULL,
    `complainRemark` mediumtext DEFAULT NULL,
    `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=3;

INSERT INTO complainHistory (`id`, `complainid`, `complainStatus`, `complainRemark`, `postingDate`) VALUES 
(1, 1, 'In Process', 'Electrician assigned.', '2025-12-27 19:34:39'),
(2, 1, 'Closed', 'Switch changed', '2025-12-27 19:34:59');

CREATE TABLE complains (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `ComplainNumber` bigint(12) DEFAULT NULL,
    `userId` int(11) DEFAULT NULL,
    `complaintType` varchar(255) DEFAULT NULL,
    `complaintDetails` mediumtext DEFAULT NULL,
    `complaintDoc` varchar(255) DEFAULT NULL,
    `complaintStatus` varchar(255) DEFAULT NULL,
    `registrationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=2;

INSERT INTO `complains` (`id`, `ComplainNumber`, `userId`, `complaintType`, `complaintDetails`, `complaintDoc`, `complaintStatus`, `registrationDate`) VALUES
(1, 389685413, 5, 'Electrical', 'Switch not working.', NULL, 'Closed', '2025-01-14 11:10:24');

CREATE TABLE `courses` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `course_code` varchar(255) DEFAULT NULL,
  `course_short_name` varchar(255) DEFAULT NULL,
  `course_full_name` varchar(255) DEFAULT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci AUTO_INCREMENT=8;

INSERT INTO `courses` (`id`, `course_code`, `course_sn`, `course_fn`, `posting_date`) VALUES
(1, 'B10992', 'B.Tech', 'Bachelor  of Technology', '2025-01-01 19:31:42'),
(2, 'BCOM1453', 'B.Com', 'Bachelor Of commerce ', '2025-01-01 19:31:42'),
(3, 'BSC12', 'BSC', 'Bachelor  of Science', '2025-01-01 19:31:42'),
(4, 'BC36356', 'BCA', 'Bachelor Of Computer Application', '2025-01-01 19:31:42'),
(5, 'MCA565', 'MCA', 'Master of Computer Application', '2025-01-01 19:31:42'),
(6, 'MBA75', 'MBA', 'Master of Business Administration', '2025-01-01 19:31:42'),
(7, 'BE765', 'BE', 'Bachelor of Engineering', '2025-01-01 19:31:42');

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `AccessibilityWarden` varchar(255) DEFAULT NULL,
  `AccessibilityMember` varchar(255) DEFAULT NULL,
  `RedressalProblem` varchar(255) DEFAULT NULL,
  `Room` varchar(255) DEFAULT NULL,
  `Mess` varchar(255) DEFAULT NULL,
  `HostelSurroundings` varchar(255) DEFAULT NULL,
  `OverallRating` varchar(255) DEFAULT NULL,
  `FeedbackMessage` varchar(255) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `postinDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=2;

INSERT INTO `feedback` (`id`, `AccessibilityWarden`, `AccessibilityMember`, `RedressalProblem`, `Room`, `Mess`, `HostelSurroundings`, `OverallRating`, `FeedbackMessage`, `userId`, `postinDate`) VALUES
(1, 'Very Good', 'Very Good', 'Excellent', 'Very Good', 'Excellent', 'Average', 'Good', 'NA', 5, '2025-01-14 11:12:43');

CREATE TABLE `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `roomno` int(11) DEFAULT NULL,
  `seater` int(11) DEFAULT NULL,
  `feespm` int(11) DEFAULT NULL,
  `foodstatus` int(11) DEFAULT NULL,
  `stayfrom` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `course` varchar(500) DEFAULT NULL,
  `regno` int(11) DEFAULT NULL,
  `firstName` varchar(500) DEFAULT NULL,
  `middleName` varchar(500) DEFAULT NULL,
  `lastName` varchar(500) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `emailid` varchar(500) DEFAULT NULL,
  `egycontactno` bigint(11) DEFAULT NULL,
  `guardianName` varchar(500) DEFAULT NULL,
  `guardianRelation` varchar(500) DEFAULT NULL,
  `guardianContactno` bigint(11) DEFAULT NULL,
  `corresAddress` varchar(500) DEFAULT NULL,
  `corresCIty` varchar(500) DEFAULT NULL,
  `corresState` varchar(500) DEFAULT NULL,
  `corresPincode` int(11) DEFAULT NULL,
  `pmntAddress` varchar(500) DEFAULT NULL,
  `pmntCity` varchar(500) DEFAULT NULL,
  `pmnatetState` varchar(500) DEFAULT NULL,
  `pmntPincode` int(11) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci AUTO_INCREMENT=7;

INSERT INTO `registration` (`id`, `roomno`, `seater`, `feespm`, `foodstatus`, `stayfrom`, `duration`, `course`, `regno`, `firstName`, `middleName`, `lastName`, `gender`, `contactno`, `emailid`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `corresCIty`, `corresState`, `corresPincode`, `pmntAddress`, `pmntCity`, `pmnatetState`, `pmntPincode`, `postingDate`, `updationDate`) VALUES
(2, 100, 5, 8000, 1, '2025-12-27', 6, 'Bachelor  of Technology', 10806121, 'Anuj', '', 'kumar', 'male', 1234567890, 'ak@gmail.com', 1236547890, 'ABC', 'XYZ', 98756320000, 'ABC 12345 XYZ Street', 'New Delhi', 'Delhi (NCT)', 110001, 'ABC 12345 XYZ Street', 'New Delhi', 'Delhi (NCT)', 110001, '2025-01-03 14:58:26', NULL),
(3, 200, 2, 6000, 1, '2025-12-26', 12, 'Bachelor  of Science', 108061233, 'John', '', 'Doe', 'male', 1425362514, 'hohn@gmail.com', 456312058, 'Alex Doe', 'father', 1234567890, '123 Xyz apartment ', 'New Delhi', 'Delhi (NCT)', 110001, '123 Xyz apartment ', 'New Delhi', 'Delhi (NCT)', 110001, '2025-01-03 14:58:26', NULL),
(4, 200, 2, 6000, 0, '2025-12-25', 9, 'Bachelor Of commerce ', 10806121, 'Anuj', '', 'kumar', 'male', 1234567890, 'test@gmail.com', 546456546, 'ytrrtyrt', 'yrtyrty', 46456456, 'ttyrytryr', 'yrty', 'Andhra Pradesh', 123123, 'ttyrytryr', 'yrty', 'Andhra Pradesh', 123123, '2025-01-03 14:58:26', NULL),
(5, 100, 5, 8000, 1, '2025-12-27', 3, 'Bachelor  of Technology', 14563213, 'John', '', 'Matthew ', 'male', 8956237845, 'john@gmail.com', 7845123698, 'Mrs. Jacob Mattew', 'Uncle', 5623894178, 'H-899, Gauri Apartment', 'Kanpur', 'Uttar Pradesh', 551007, 'H-899, Gauri Apartment', 'Kanpur', 'Uttar Pradesh', 551007, '2025-01-03 14:58:26', NULL),
(6, 132, 5, 2000, 1, '2025-12-27', 12, 'Bachelor  of Technology', 14563213, 'Amit', 'kumar', 'Singh', 'male', 9632587412, 'amit123@gmail.com', 8563145621, 'Ram Kumar Singh', 'Father', 4563245631, 'Hno 181/1 Mayur Vihar ', 'New Delhi', 'Delhi (NCT)', 110092, 'Hno 181/1 Mayur Vihar ', 'New Delhi', 'Delhi (NCT)', 110092, '2025-01-03 14:58:26', NULL);

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `seater` int(11) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  KEY `room_no` (`room_no`) ,
  `fees` int(11) DEFAULT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci AUTO_INCREMENT=7;

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `fees`, `posting_date`) VALUES
(1, 5, 100, 8000, '2025-12-27 19:45:43'),
(2, 2, 201, 6000, '2025-12-27 19:45:43'),
(3, 2, 200, 6000, '2025-12-27 19:45:43'),
(4, 3, 112, 4000, '2025-12-27 19:45:43'),
(5, 5, 132, 2000, '2025-12-27 19:45:43'),
(6, 3, 145, 3000, '2025-12-27 19:45:43');

CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `State` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci AUTO_INCREMENT=38;

INSERT INTO `states` (`id`, `State`) VALUES
(1, 'Moscow'),
(2, 'Ivanovo'),
(3, 'Sevastopol'),
(4, 'Novosibirsk'),
(5, 'Yekaterinburg'),
(6, 'Kazan'),
(7, 'Nizhny Novgorod'),
(8, 'Saint Petersburg'),
(9, 'Samara'),
(10, 'Omsk'),
(11, 'Rostov-on-Don'),
(12, 'Ufa'),
(13, 'Krasnoyarsk'),
(14, 'Voronezh'),
(15, 'Perm'),
(16, 'Volgograd'),
(17, 'Krasnodar'),
(18, 'Saratov'),
(19, 'Tyumen'),
(20, 'Tolyatti'),
(21, 'Izhevsk'),
(22, 'Barnaul'),
(23, 'Ulyanovsk'),
(24, 'Irkutsk'),
(25, 'Khabarovsk'),
(26, 'Yaroslavl'),
(27, 'Vladivostok'),
(28, 'Makhachkala'),
(29, 'Tomsk'),
(30, 'Orenburg'),
(31, 'Kemerovo'),
(32, 'Novokuznetsk'),
(33, 'Ryazan'),
(34, 'Astrakhan'),
(35, 'Penza'),
(36, 'Lipetsk'),
(37, 'Kirov');

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci AUTO_INCREMENT=2;

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(1, 5, 'john@gmail.com', 0x3132372e302e302e31, '', '', '2025-012-27 20:07:37');

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `regNo` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `contactNo` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  KEY (email),
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(45) DEFAULT NULL,
  `passUdateDate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci AUTO_INCREMENT=7;

INSERT INTO `userregistration` (`id`, `regNo`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(3, '10806121', 'Anuj', '', 'kumar', 'male', 1234567890, 'test@gmail.com', 'Test@123', '2025-12-27 20:08:29', NULL, NULL),
(5, 'BE123', 'John', '', 'Matthew ', 'male', 8956237845, 'john@gmail.com', '123', '2025-12-27 20:09:31', NULL, NULL),
(6, '14563213', 'Amit', 'kumar', 'Singh', 'male', 9632587412, 'amit123@gmail.com', 'Test@123', '2025-12-27 20:10:53', '17-04-2024 05:12:02', NULL);