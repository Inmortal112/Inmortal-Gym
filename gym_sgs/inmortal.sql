SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `inmortal`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `inmortal`;

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `age` int(3) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `personal_trainers` (
  `trainer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `specialty` varchar(60) NOT NULL,
  `age` int(3) NOT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `activities` (
  `activity_code` varchar(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `schedule` varchar(60) NOT NULL,
  `image` varchar(80) NOT NULL,
  PRIMARY KEY (`activity_code`),
  KEY `trainer_id` (`trainer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `reservations` (
  `member_id` int(11) NOT NULL,
  `activity_code` varchar(10) NOT NULL,
  `reservation_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`member_id`,`activity_code`),
  KEY `activity_code` (`activity_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `members` (`member_id`, `name`, `age`, `phone`) VALUES
(1, 'Omar Montes', 28, '600123456'),
(2, 'Ibai', 35, '611234567'),
(3, 'Sofia Surfers', 41, '622345678');

INSERT INTO `personal_trainers` (`trainer_id`, `name`, `specialty`, `age`) VALUES
(1, 'Kappha', 'Boxing coach', 39),
(2, 'Speed', 'Functional training coach', 31),
(3, 'Pedro Sanchez', 'Spinning coach', 27);

INSERT INTO `activities` (`activity_code`, `name`, `trainer_id`, `schedule`, `image`) VALUES
('ACT01', 'Immortal Boxing', 1, 'Monday and Wednesday 18:00', 'sammino-baby-8035364_1920.jpg'),
('ACT02', 'Functional Power', 2, 'Tuesday and Thursday 19:00', 'pexels-northern-28300372.jpg'),
('ACT03', 'Spinning Extreme', 3, 'Friday 20:00', 'people-doing-indoor-cycling.jpg');

UPDATE `activities` SET `image` = 'sammino-baby-8035364_1920.jpg' WHERE `image` = 'boxing.jpg';
UPDATE `activities` SET `image` = 'pexels-northern-28300372.jpg' WHERE `image` = 'functional.jpg';
UPDATE `activities` SET `image` = 'people-doing-indoor-cycling.jpg' WHERE `image` = 'spinning.jpg';

INSERT INTO `reservations` (`member_id`, `activity_code`, `reservation_date`, `price`) VALUES
(1, 'ACT01', '2026-04-01', 25.00),
(2, 'ACT02', '2026-04-02', 30.00),
(3, 'ACT03', '2026-04-03', 27.50);

ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `personal_trainers` (`trainer_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON UPDATE CASCADE ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`activity_code`) REFERENCES `activities` (`activity_code`) ON UPDATE CASCADE ON DELETE CASCADE;

COMMIT;
