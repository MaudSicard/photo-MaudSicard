-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `update` datetime DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `category` (`id`, `name`, `update`, `create`) VALUES
(1,	'Chat',	'2021-02-14 19:36:46',	'2021-02-14 19:36:46'),
(2,	'Chien',	'2021-01-17 19:51:54',	'2021-01-17 19:51:54'),
(3,	'Fleur',	'2021-01-17 19:52:00',	'2021-01-17 19:52:00'),
(4,	'Mer',	'2021-01-18 18:07:04',	'2021-01-18 18:07:04'),
(5,	'Montagne',	'2021-01-17 19:52:12',	'2021-01-17 19:52:12'),
(6,	'Oiseau',	'2021-01-17 19:52:19',	'2021-01-17 19:52:19');

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE `pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` tinytext NOT NULL,
  `picture` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `update` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pictures` (`id`, `title`, `picture`, `category`, `update`, `create`) VALUES
(1,	'chat (1)',	'css/photos/chat (1).jpg',	'Chat',	'2021-02-14 19:11:33',	'2021-02-14 19:11:33'),
(2,	'chat (2)',	'css/photos/chat (2).jpg',	'Chat',	'2021-01-17 20:04:05',	'2021-01-17 20:04:05'),
(3,	'chat (3)',	'css/photos/chat (3).jpg',	'Chat',	'2021-01-17 20:04:05',	'2021-01-17 20:04:05'),
(4,	'chat (4)',	'css/photos/chat (4).jpg',	'Chat',	'2021-01-17 20:04:05',	'2021-01-17 20:04:05'),
(5,	'chat (5)',	'css/photos/chat (5).jpg',	'Chat',	'2021-01-17 20:04:05',	'2021-01-17 20:04:05'),
(6,	'chat (6)',	'css/photos/chat (6).jpg',	'Chat',	'2021-01-17 20:04:05',	'2021-01-17 20:04:05'),
(7,	'chat (7)',	'css/photos/chat (9).jpg',	'Chat',	'2021-01-17 20:04:05',	'2021-01-17 20:04:05'),
(8,	'chat (8)',	'css/photos/chat (8).jpg',	'Chat',	'2021-01-17 20:04:05',	'2021-01-17 20:04:05'),
(9,	'chat (9)',	'css/photos/chat (9).jpg',	'Chat',	'2021-01-17 20:04:05',	'2021-01-17 20:04:05'),
(10,	'chat (10)',	'css/photos/chat (10).jpg',	'Chat',	'2021-01-17 20:04:05',	'2021-01-17 20:04:05'),
(11,	'chien (1)',	'css/photos/chien (1).jpg',	'Chien',	'2021-01-17 20:04:27',	'2021-01-17 20:04:27'),
(12,	'chien (2)',	'css/photos/chien (2).jpg',	'Chien',	'2021-01-17 20:04:27',	'2021-01-17 20:04:27'),
(13,	'chien (3)',	'css/photos/chien (3).jpg',	'Chien',	'2021-01-19 16:15:38',	'2021-01-19 16:15:38'),
(14,	'chien (4)',	'css/photos/chien (4).jpg',	'Chien',	'2021-02-14 19:37:06',	'2021-02-14 19:37:06'),
(15,	'chien (5)',	'css/photos/chien (5).jpg',	'Chien',	'2021-01-17 20:04:27',	'2021-01-17 20:04:27'),
(16,	'chien (6)',	'css/photos/chien (6).jpg',	'Chien',	'2021-01-17 20:04:27',	'2021-01-17 20:04:27'),
(17,	'chien (7)',	'css/photos/chien (7).jpg',	'Chien',	'2021-01-17 20:04:27',	'2021-01-17 20:04:27'),
(18,	'chien (8)',	'css/photos/chien (8).jpg',	'Chien',	'2021-01-17 20:04:27',	'2021-01-17 20:04:27'),
(19,	'chien (9)',	'css/photos/chien (9).jpg',	'Chien',	'2021-01-17 20:04:27',	'2021-01-17 20:04:27'),
(20,	'chien (10)',	'css/photos/chien (10).jpg',	'Chien',	'2021-01-17 20:04:27',	'2021-01-17 20:04:27'),
(21,	'fleur (1)',	'css/photos/fleur (1).jpg',	'Fleur',	'2021-01-17 20:04:46',	'2021-01-17 20:04:46'),
(22,	'fleur (2)',	'css/photos/fleur (2).jpg',	'Fleur',	'2021-01-17 20:04:46',	'2021-01-17 20:04:46'),
(23,	'fleur (3)',	'css/photos/fleur (3).jpg',	'Fleur',	'2021-01-17 20:04:46',	'2021-01-17 20:04:46'),
(24,	'fleur (4)',	'css/photos/fleur (4).jpg',	'Fleur',	'2021-01-17 20:04:46',	'2021-01-17 20:04:46'),
(25,	'fleur (5)',	'css/photos/fleur (5).jpg',	'Fleur',	'2021-01-17 20:04:46',	'2021-01-17 20:04:46'),
(26,	'fleur (6)',	'css/photos/fleur (6).jpg',	'Fleur',	'2021-01-17 20:04:46',	'2021-01-17 20:04:46'),
(27,	'fleur (7)',	'css/photos/fleur (7).jpg',	'Fleur',	'2021-01-17 20:04:46',	'2021-01-17 20:04:46'),
(28,	'fleur (8)',	'css/photos/fleur (8).jpg',	'Fleur',	'2021-01-17 20:04:46',	'2021-01-17 20:04:46'),
(29,	'fleur (9)',	'css/photos/fleur (9).jpg',	'Fleur',	'2021-01-17 20:04:46',	'2021-01-17 20:04:46'),
(30,	'fleur (10)',	'css/photos/fleur (10).jpg',	'Fleur',	'2021-01-17 20:04:46',	'2021-01-17 20:04:46'),
(31,	'mer (1)',	'css/photos/mer (1).jpg',	'Mer',	'2021-01-17 20:05:09',	'2021-01-17 20:05:09'),
(32,	'mer (2)',	'css/photos/mer (2).jpg',	'Mer',	'2021-01-17 20:05:09',	'2021-01-17 20:05:09'),
(33,	'mer (3)',	'css/photos/mer (3).jpg',	'Mer',	'2021-01-17 20:05:09',	'2021-01-17 20:05:09'),
(34,	'mer (4)',	'css/photos/mer (4).jpg',	'Mer',	'2021-01-17 20:05:09',	'2021-01-17 20:05:09'),
(35,	'mer (5)',	'css/photos/mer (5).jpg',	'Mer',	'2021-01-17 20:05:09',	'2021-01-17 20:05:09'),
(36,	'mer (6)',	'css/photos/mer (6).jpg',	'Mer',	'2021-01-17 20:05:09',	'2021-01-17 20:05:09'),
(37,	'mer (7)',	'css/photos/mer (7).jpg',	'Mer',	'2021-01-17 20:05:09',	'2021-01-17 20:05:09'),
(38,	'mer (8)',	'css/photos/mer (8).jpg',	'Mer',	'2021-01-17 20:05:09',	'2021-01-17 20:05:09'),
(39,	'mer (9)',	'css/photos/mer (9).jpg',	'Mer',	'2021-01-17 20:05:09',	'2021-01-17 20:05:09'),
(40,	'mer (10)',	'css/photos/mer (10).jpg',	'Mer',	'2021-01-17 20:05:09',	'2021-01-17 20:05:09'),
(41,	'montagne (1)',	'css/photos/montagne (1).jpg',	'Montagne',	'2021-01-17 20:05:31',	'2021-01-17 20:05:31'),
(42,	'montagne (2)',	'css/photos/montagne (2).jpg',	'Montagne',	'2021-01-17 20:05:31',	'2021-01-17 20:05:31'),
(43,	'montagne (3)',	'css/photos/montagne (3).jpg',	'Montagne',	'2021-01-17 20:05:31',	'2021-01-17 20:05:31'),
(44,	'montagne (4)',	'css/photos/montagne (4).jpg',	'Montagne',	'2021-01-17 20:05:31',	'2021-01-17 20:05:31'),
(45,	'montagne (5)',	'css/photos/montagne (5).jpg',	'Montagne',	'2021-01-17 20:05:31',	'2021-01-17 20:05:31'),
(46,	'montagne (6)',	'css/photos/montagne (6).jpg',	'Montagne',	'2021-01-17 20:05:31',	'2021-01-17 20:05:31'),
(47,	'montagne (7)',	'css/photos/montagne (7).jpg',	'Montagne',	'2021-01-17 20:05:31',	'2021-01-17 20:05:31'),
(48,	'montagne (8)',	'css/photos/montagne (8).jpg',	'Montagne',	'2021-01-17 20:05:31',	'2021-01-17 20:05:31'),
(49,	'montagne (9)',	'css/photos/montagne (9).jpg',	'Montagne',	'2021-01-17 20:05:31',	'2021-01-17 20:05:31'),
(50,	'montagne (10)',	'css/photos/montagne (10).jpg',	'Montagne',	'2021-01-17 20:05:31',	'2021-01-17 20:05:31'),
(51,	'oiseau (1)',	'css/photos/oiseau (1).jpg',	'Oiseau',	'2021-01-17 20:05:54',	'2021-01-17 20:05:54'),
(52,	'oiseau (2)',	'css/photos/oiseau (2).jpg',	'Oiseau',	'2021-01-17 20:05:54',	'2021-01-17 20:05:54'),
(53,	'oiseau (3)',	'css/photos/oiseau (3).jpg',	'Oiseau',	'2021-01-17 20:05:54',	'2021-01-17 20:05:54'),
(54,	'oiseau (4)',	'css/photos/oiseau (4).jpg',	'Oiseau',	'2021-01-17 20:05:54',	'2021-01-17 20:05:54'),
(55,	'oiseau (5)',	'css/photos/oiseau (5).jpg',	'Oiseau',	'2021-01-17 20:05:54',	'2021-01-17 20:05:54'),
(56,	'oiseau (6)',	'css/photos/oiseau (6).jpg',	'Oiseau',	'2021-01-17 20:05:54',	'2021-01-17 20:05:54'),
(57,	'oiseau (7)',	'css/photos/oiseau (7).jpg',	'Oiseau',	'2021-01-17 20:05:54',	'2021-01-17 20:05:54'),
(58,	'oiseau (8)',	'css/photos/oiseau (8).jpg',	'Oiseau',	'2021-01-17 20:05:54',	'2021-01-17 20:05:54'),
(59,	'oiseau (9)',	'css/photos/oiseau (9).jpg',	'Oiseau',	'2021-01-17 20:05:54',	'2021-01-17 20:05:54'),
(60,	'oiseau (10)',	'css/photos/oiseau (10).jpg',	'Oiseau',	'2021-02-06 10:29:12',	'2021-02-06 10:29:12');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` tinytext NOT NULL,
  `firstname` tinytext NOT NULL,
  `lastname` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `update` datetime DEFAULT NULL,
  `statut` tinytext NOT NULL,
  `role` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `mail`, `firstname`, `lastname`, `password`, `create`, `update`, `statut`, `role`) VALUES
(2,	'photo@mail.com',	'Photo',	'Photo',	'Photo',	'2021-02-14 19:24:47',	NULL,	'catalog-manager',	''),
(5,	'maud.sicard@gmail.com',	'Maud',	'Sicard',	'$2y$10$8R/WcutP3GiE1A3LA27OwuUGEdWYbNx.w4RDcn2LLLrfEA.0PCqoq',	'2021-01-18 14:58:05',	NULL,	'admin',	'actif');

-- 2021-02-18 18:16:08
