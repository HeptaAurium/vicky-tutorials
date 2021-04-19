-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `pwd` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `fname`, `lname`, `pwd`, `email`, `created_at`) VALUES
(2,	'Michael',	'Kiarie',	'76d80224611fc919a5d54f0ff9fba446',	'ngugithe4th@gmail.com',	'2021-04-10 10:02:24'),
(3,	'John',	'Doe',	'2829fc16ad8ca5a79da932f910afad1c',	'johndoe@gmail.com',	'2021-04-10 10:02:47'),
(4,	'Jane',	'Doe',	'2829fc16ad8ca5a79da932f910afad1c',	'janedoe@gmail.com',	'2021-04-10 10:03:00'),
(5,	'Victoria',	'Mwangi',	'e17733c140f2e9fe3c561f3219649c91',	'vicky@gmail.com',	'2021-04-10 10:03:22');

-- 2021-04-19 14:26:13
