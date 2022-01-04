-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 10:25 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srudents`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteStudent` (IN `ID` INT)  BEGIN
DELETE FROM `student` WHERE id=ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertBoss` (IN `USERNAME` VARCHAR(255), IN `PASSWRD` VARCHAR(255))  BEGIN
	INSERT INTO `boss`(`username`, `password`) 
    VALUES (USERNAME,PASSWRD);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertBuild` (IN `NAME` VARCHAR(255))  BEGIN
   INSERT INTO `build`(`name`) VALUES (NAME);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertManager` (IN `ID` INT, IN `NAME` VARCHAR(255), IN `address` VARCHAR(255), IN `phone` VARCHAR(255), IN `PASSWD` VARCHAR(255), IN `build_id` INT, IN `boss_id` INT)  BEGIN
	INSERT INTO `manager`(`id`, `name`, `address`, `phone`, `password`, `build_id`, `boss_id`) VALUES (ID,NAME,address,phone,PASSWD,build_id,boss_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertRoom` (IN `ID` INT)  BEGIN
   INSERT INTO `room`(`id`) VALUES (ID);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertStudent` (IN `ID` INT, IN `NAME` VARCHAR(255), IN `address` VARCHAR(255), IN `phone` VARCHAR(255), IN `faculty` VARCHAR(255), IN `Leve` VARCHAR(255), IN `build_id` INT, IN `room_id` INT)  BEGIN
	INSERT INTO `student`(`id`, `name`, `address`, `phone`, `faculty`, `level`, `build_id`, `room_id`) 
    VALUES (ID,NAME,address,phone,faculty,Leve,build_id,room_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertSupervisor` (IN `ID` INT, IN `NAME` VARCHAR(255), IN `address` VARCHAR(255), IN `phone` VARCHAR(255), IN `passwrd` VARCHAR(255), IN `build_id` INT)  BEGIN
	INSERT INTO `supervisor`(`id`, `name`, `address`, `phone`,`password`, `build_id`) VALUES (ID,NAME,address,phone,passwrd,build_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginboss` (IN `username` VARCHAR(255), IN `password` VARCHAR(255))  BEGIN
    SELECT * FROM `boss` WHERE `username` = username && `password` = password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginmanager` (IN `id` INT, IN `password` VARCHAR(255))  BEGIN
    SELECT * FROM `manager` WHERE `id` = id && `password` = password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginsupervisor` (IN `id` INT, IN `password` VARCHAR(255))  BEGIN
    SELECT * FROM `supervisor` WHERE `id` = id && `password` = password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `onebossbyID` (IN `id` INT)  BEGIN
    SELECT * FROM `boss` WHERE `id` = id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `onemanagerbyID` (IN `id` INT)  BEGIN
    SELECT * FROM `manager` WHERE `id` = id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `onestudentbyID` (IN `id` INT)  BEGIN
    SELECT * FROM `student` WHERE `id` = id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `onesupervisorbyID` (IN `id` INT)  BEGIN
    SELECT * FROM `supervisor` WHERE `id` = id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAllBuild` ()  BEGIN
    SELECT * FROM build;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAllRoom` ()  BEGIN
    SELECT * FROM room;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAllStudents` ()  BEGIN

SELECT  `student`.`id`,`student`.`name` AS `name`,`student`.`address` AS `address`, `student`.`phone` AS `phone`, `student`.`faculty` AS `faculty`, `student`.`level` AS `level`,`student`.`room_id` AS `room_id`,`manager`.`name` AS `manager_name`,`build`.`name` AS `build_name`

FROM ((`student` 
       
join `build` on(`student`.`build_id` = `build`.`id`))
      
join `manager` on(`student`.`build_id` = `manager`.`build_id`));

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectAllSupervisorbybuild` ()  BEGIN
    SELECT	supervisor.id as id ,supervisor.name,build.id AS build_id ,build.name AS build_name ,supervisor.address,supervisor.phone,supervisor.password
    FROM supervisor
    INNER JOIN build ON supervisor.build_id = build.id ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectBoss` ()  BEGIN
	SELECT * FROM `boss`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectGraduatingstudent` ()  BEGIN
	SELECT * FROM `graduatingstudent`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectGraduatingstudentById` (IN `ID` INT)  BEGIN
	SELECT * FROM `graduatingstudent` WHERE build_id = ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectmanagerbybuild` ()  BEGIN
    SELECT	manager.id as id ,manager.name,build.id AS build_id ,build.name AS build_name ,manager.address,manager.phone,manager.password
    ,boss.username as byadmin
    FROM manager
    INNER JOIN build ON manager.build_id = build.id
    INNER JOIN boss ON manager.boss_id = boss.id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectmanagerbybuildById` (IN `ID` INT)  BEGIN
    SELECT	manager.id as id ,manager.name,build.id AS build_id ,build.name AS build_name ,manager.address,manager.phone,manager.password
    ,boss.username as byadmin
    FROM manager
    INNER JOIN build ON manager.build_id = build.id
    INNER JOIN boss ON manager.boss_id = boss.id WHERE manager.id = ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectStudentById` (IN `ID` INT)  BEGIN

SELECT  `student`.`id`,`student`.`name` AS `name`,`student`.`address` AS `address`, `student`.`phone` AS `phone`, `student`.`faculty` AS `faculty`, `student`.`level` AS `level`,`student`.`room_id` AS `room_id`,`manager`.`name` AS `manager_name`,`build`.`name` AS `build_name` 

FROM ((`student` 
       
join `build` on(`student`.`build_id` = `build`.`id`))
      
join `manager` on(`student`.`build_id` = `manager`.`build_id`))  WHERE `student`.`build_id`=ID;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectSupervisorbybuildById` (IN `ID` INT)  BEGIN
    SELECT	supervisor.id as id ,supervisor.name,build.id AS build_id ,build.name AS build_name ,supervisor.address,supervisor.phone,supervisor.password
    FROM supervisor
    INNER JOIN build ON supervisor.build_id = build.id WHERE supervisor.build_id = ID;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateManager` (IN `ID` INT, IN `address` VARCHAR(255), IN `phone` VARCHAR(255), IN `PASSWD` VARCHAR(255))  BEGIN
    UPDATE `manager` SET `address`=address,`phone`=phone,`password`=PASSWD WHERE `id` = ID ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateSupervisor` (IN `ID` INT, IN `address` VARCHAR(255), IN `phone` VARCHAR(255), IN `PASSWD` VARCHAR(255))  BEGIN
    UPDATE `supervisor` SET `address`=address,`phone`=phone,`password`=PASSWD WHERE `id` = ID ;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `smgradutionstudent` () RETURNS INT(11) BEGIN

DECLARE sum INT DEFAULT 0;

SELECT COUNT(id) INTO sum FROM graduatingstudent;

return sum;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `smstudent` () RETURNS INT(11) BEGIN

DECLARE sum INT DEFAULT 0;

SELECT COUNT(id) INTO sum FROM student;

return sum;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `boss`
--

CREATE TABLE `boss` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boss`
--

INSERT INTO `boss` (`id`, `username`, `password`) VALUES
(1, 'moh', 'moh');

-- --------------------------------------------------------

--
-- Table structure for table `build`
--

CREATE TABLE `build` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `build`
--

INSERT INTO `build` (`id`, `name`) VALUES
(1, 'G'),
(2, 'sa'),
(3, 'sdds'),
(4, 'G');

-- --------------------------------------------------------

--
-- Table structure for table `graduatingstudent`
--

CREATE TABLE `graduatingstudent` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `build_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `ondate` date NOT NULL DEFAULT current_timestamp(),
  `outdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `graduatingstudent`
--

INSERT INTO `graduatingstudent` (`id`, `name`, `address`, `phone`, `faculty`, `level`, `build_id`, `room_id`, `ondate`, `outdate`) VALUES
(0, 'asksdlm,klsdm,k', 'njknjknk', '3223', 'jknsjk', '1', 2, 1, '2022-01-03', '2022-01-03'),
(12, 'jimkl', 'kopkp', 'kpokpokpokpo', 'kpokpokpok', '1', 4, 1, '2022-01-03', '2022-01-03'),
(23, 'koko', 'asa', '2232323', 'fci', '4', 3, 1, '2022-01-02', '2022-01-03'),
(233, 'dala', 'kldmskla', '37878867', 'kjnk', '1', 3, 1, '2022-01-03', '2022-01-03'),
(347, 'mkslk', 'jsdnkn', 'jnfjdns', 'fci', '2', 1, 1, '2022-01-03', '2022-01-03'),
(786, 'hjhj', 'hbjjh', 'bjhbjhbjh', 'hyyj', 'jbjh', 2, 1, '2020-01-02', '2022-01-02'),
(1221, 'smdsmj', 'jnmjknk', 'jnnkn', 'jknk', '21', 1, 1, '2022-01-03', '2022-01-03'),
(2378, 'klmklmkl', 'mklmklmklmklm', 'jknjknjkn', 'jnkjnjk', '1', 1, 1, '2022-01-03', '2022-01-03'),
(6766, 'klsdjkn jkn', 'jknjknk', 'jknjknjk', 'njknjkn', '3', 1, 1, '2022-01-03', '2022-01-03'),
(8737, 'jknjkn', 'djkn', 'jknjkn', 'jnjk', '7', 1, 1, '2022-01-03', '2022-01-03'),
(12123, 'sd', 'mklsmakl', '32', 'sd', '1', 1, 1, '2022-01-03', '2022-01-03'),
(121221, 'wed', 'ewd', '3232', '32', '32', 1, 1, '2022-01-02', '2022-01-02'),
(343434, 'jjknjknjkn', 'jnjknjkn', 'jknjknjknk', 'jnjknjkn', 'jnjkn', 2, 1, '2022-01-03', '2022-01-03'),
(777676, 'jjknjknjkn', 'jnjknjkn', 'jknjknjknk', 'jnjknjkn', 'jnjkn', 2, 1, '2022-01-03', '2022-01-03'),
(783478, 'jknkj', 'jnjkn', '27837', 'jnikn', '1', 1, 1, '2022-01-03', '2022-01-03'),
(1281278, 'saij', 'jn', '372', 'fcid', '3', 1, 1, '2022-01-03', '2022-01-03'),
(2003233, 'omda', 'kldmskla', '37878867', 'kjnk', '1', 1, 1, '2022-01-03', '2022-01-03'),
(2332323, 'jimkl', 'kopkp', 'kpokpokpokpo', 'kpokpokpok', '1', 4, 1, '2022-01-03', '2022-01-03'),
(2373278, 'kojoijioj', 'iojiojiojiojio`jiojiio', 'jhbjhbjhbjhb', 'hjbjhb', '1', 1, 1, '2022-01-03', '2022-01-03'),
(2373279, 'ksdlmsdkl', 'mklmkl32', 'dhsjank2', 'mkdslm', '1', 2, 1, '2022-01-03', '2022-01-03'),
(30002112, 'mohammed', 'dairout', '2389', 'fci', '4', 2, 1, '2018-01-02', '2022-01-02'),
(72378237, 'Gezo', 'kldmskla', '37878867', 'kjnk', '1', 2, 1, '2022-01-03', '2022-01-03'),
(300021212, 'abdallah', 'dairout', '2389', 'fci', '4', 2, 1, '2017-01-02', '2022-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `build_id` int(11) NOT NULL,
  `boss_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `name`, `address`, `phone`, `password`, `build_id`, `boss_id`) VALUES
(45, 'mklknmklm', 'asdsd', '2323ss', 'as', 4, 1),
(123, 'mklknmklm', 'jjkkjwe23', '2323ss', 'kasmnj', 1, 1),
(324, 'mklknmklm', 'Abdallle', '23772387823', 'kasmnj', 3, 1),
(344, 'mklknmklm', 'asassaswejnwek', '2323ss', 'kasmnj', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`) VALUES
(1),
(3),
(6),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `build_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `ondate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `address`, `phone`, `faculty`, `level`, `build_id`, `room_id`, `ondate`) VALUES
(12, 'medo', 'sdmklsdm', '2332mkdds', 'kjnk', '1', 4, 1, '2022-01-03'),
(21, 'jndsjknjk', 'jnksdkkn', '12', 'asdjknjhn', '2', 1, 3, '2022-01-03');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `save_date` BEFORE DELETE ON `student` FOR EACH ROW BEGIN
	INSERT INTO `GraduatingStudent`(`id`, `name`, `address`, `phone`, `faculty`, `level`, `build_id`, `room_id`,`ondate`) VALUES (old.id,old.name,old.address,old.phone,old.faculty,old.level,old.build_id,old.room_id,old.ondate);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `build_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `name`, `address`, `phone`, `password`, `build_id`) VALUES
(11, 'dmjksnj', '’Mohammed', '232', 'jnasdnkn', 1),
(23, 'fecd', 'sdfsd', 'sdfds', 'sfd', 1),
(1221, 'mksdm', 'kasmjk', 'jxsn', 'djsknsjkn', 1),
(7878, 'jknknjkj', 'njknjknkj', 'njnjknjkn', 'kjnjknjk', 1),
(8437, 'jsdn', 'njknjkn', 'jknjknjk', 'njknjknjk', 3),
(13223, 'iasmm', '121jjn kj', 'asddsa', '1322332jksdndsk', 1),
(23723, 'jsdnfnk', 'ujxsnjak', '3443', 'jhsdbjhsdjsnkn', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boss`
--
ALTER TABLE `boss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `build`
--
ALTER TABLE `build`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `graduatingstudent`
--
ALTER TABLE `graduatingstudent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `build_id` (`build_id`) USING BTREE,
  ADD KEY `room_id` (`room_id`) USING BTREE;

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `build_id` (`build_id`) USING BTREE,
  ADD KEY `boss_id` (`boss_id`) USING BTREE;

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `build_id` (`build_id`) USING BTREE,
  ADD KEY `room_id` (`room_id`) USING BTREE;

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `build_id` (`build_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boss`
--
ALTER TABLE `boss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `build`
--
ALTER TABLE `build`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2373280;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`build_id`) REFERENCES `build` (`id`),
  ADD CONSTRAINT `manager_ibfk_2` FOREIGN KEY (`boss_id`) REFERENCES `boss` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`build_id`) REFERENCES `build` (`id`);

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`build_id`) REFERENCES `build` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
