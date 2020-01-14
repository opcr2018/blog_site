-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 jan. 2020 à 10:33
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_admin_user1_idx` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `commContent` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_comment_post1_idx` (`post_id`),
  KEY `fk_comment_user1_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(45) NOT NULL,
  `title` text NOT NULL,
  `postContent` longtext NOT NULL,
  `detail` varchar(255) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_post_user1_idx` (`user_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `img`, `title`, `postContent`, `detail`, `statut`, `created_date`, `update_time`, `user_id`) VALUES
(1, 'https://pic.clubic.com/v1/images/1421188/raw?', 'Article 1\r\n', 'Le groupe AT&T pourrait céder la part de la société Hulu qu\'il détient via sa filiale WarnerMedia, ce qui pourrait précipiter le rachat définitif par Disney du spécialiste de la VoD.\r\n<p>Alors que Disney va lancer sa plateforme de streaming dans les prochains mois et que la firme américaine est sur le point de finaliser le rachat de la Fox, la société pourrait voir ses chances d\'avaler Hulu grandir assez rapidement. C\'est lors d\'une conférence téléphonique donnée par des représentants de AT&T (qui possède une part minoritaire de Hulu) jeudi dernier que The Walt Disney Company a pu apprendre la bonne nouvelle.\r\nLa dette qui plombe AT&T pourrait aider Disney.\r\nIl y a quelques jours, comme le rapporte The Information, le groupe AT&T a annoncé qu\'il « envisageait de vendre sa participation de 10 % dans Hulu dans le cadre d\'une analyse d\'actifs plus large visant à  réduire sa dette ». Pour ne pas être trop perdu, faisons un bref rappel de la composition du capital du concurrent de Netflix. Comcast, la Fox et Disney détiennent chacun 30 % du capital de Hulu. Les 10 % restants appartiennent à  WarnerMedia, filiale de AT&T.\r\n', 'Hulu, concurrent de Netflix, pourrait définitivemet basculer dans le giron de Disney\r\n', '1', '2019-08-24 00:00:00', '2019-08-28 00:00:00', 1),
(2, 'https://pic.clubic.com/v1/images/1688024/raw?', 'Article 2\r\n', '\"La finalisation de l\'achat des actifs de Fox par Disney donnera déjà  le contrôle de Hulu à  Mickey, qui n\'en demandait pas tant lorsqu\'il a aussi appris que Comcast pourrait être poussé à  céder ses parts, refusant de rester dans une position minoritaire. Alors, s\'il s\'avère que AT&T veut bel et bien là¢cher Hulu, il faut maintenant se demander à  quel prix. En effet, depuis sa montée au capital en 2016 et après un investissement ultérieur, Warner a dépensé 800 millions de dollars dans Hulu.\r\nHulu dans le giron de Disney : un danger pour Netflix,\r\nSelon les médias américains, un récent document réglementaire indiquerait que Warner peut remettre sa participation à  Hulu à  tout moment jusqu\'au mois d\'aoà»t de l\'année prochain, sous certaines conditions. Reste à  savoir maintenant si la dette revendiquée par AT&T (après avoir racheté Time Warner pour 84,5 milliards de dollars) pourrait être suffisante pour satisfaire à  ces « certaines conditions ». A défaut, AT&T n\'aura pas l\'avantage dans les négociations.\"\r\n', 'Hulu dans le giron de Disney : un danger pour Netflix\r\n', '1', '2019-08-24 10:42:00', '2019-08-26 13:30:00', 2),
(3, 'https://pic.clubic.com/v1/images/1421188/raw?', 'Article 3\r\n', 'Le groupe AT&T pourrait céder la part de la société Hulu qu\'il détient via sa filiale WarnerMedia, ce qui pourrait précipiter le rachat définitif par Disney du spécialiste de la VoD.\r\n<p>Alors que Disney va lancer sa plateforme de streaming dans les prochains mois et que la firme américaine est sur le point de finaliser le rachat de la Fox, la société pourrait voir ses chances d\'avaler Hulu grandir assez rapidement. C\'est lors d\'une conférence téléphonique donnée par des représentants de AT&T (qui possède une part minoritaire de Hulu) jeudi dernier que The Walt Disney Company a pu apprendre la bonne nouvelle.\r\nLa dette qui plombe AT&T pourrait aider Disney.\r\nIl y a quelques jours, comme le rapporte The Information, le groupe AT&T a annoncé qu\'il « envisageait de vendre sa participation de 10 % dans Hulu dans le cadre d\'une analyse d\'actifs plus large visant à  réduire sa dette ». Pour ne pas être trop perdu, faisons un bref rappel de la composition du capital du concurrent de Netflix. Comcast, la Fox et Disney détiennent chacun 30 % du capital de Hulu. Les 10 % restants appartiennent à  WarnerMedia, filiale de AT&T.\r\n', 'Hulu, concurrent de Netflix, pourrait définitivemet basculer dans le giron de Disney\r\n', '1', '2019-08-24 00:00:00', '2019-08-28 00:00:00', 1),
(4, 'https://pic.clubic.com/v1/images/1688024/raw?', 'Article 4\r\n', '\"La finalisation de l\'achat des actifs de Fox par Disney donnera déjà  le contrôle de Hulu à  Mickey, qui n\'en demandait pas tant lorsqu\'il a aussi appris que Comcast pourrait être poussé à  céder ses parts, refusant de rester dans une position minoritaire. Alors, s\'il s\'avère que AT&T veut bel et bien là¢cher Hulu, il faut maintenant se demander à  quel prix. En effet, depuis sa montée au capital en 2016 et après un investissement ultérieur, Warner a dépensé 800 millions de dollars dans Hulu.\r\nHulu dans le giron de Disney : un danger pour Netflix,\r\nSelon les médias américains, un récent document réglementaire indiquerait que Warner peut remettre sa participation à  Hulu à  tout moment jusqu\'au mois d\'aoà»t de l\'année prochain, sous certaines conditions. Reste à  savoir maintenant si la dette revendiquée par AT&T (après avoir racheté Time Warner pour 84,5 milliards de dollars) pourrait être suffisante pour satisfaire à  ces « certaines conditions ». A défaut, AT&T n\'aura pas l\'avantage dans les négociations.\"\r\n', 'Hulu dans le giron de Disney : un danger pour Netflix', '1', '2019-08-24 10:42:00', '2019-08-26 13:30:00', 2),
(5, 'https://pic.clubic.com/v1/images/1421188/raw?', 'Article 5', 'Le groupe AT&T pourrait céder la part de la société Hulu qu\'il détient via sa filiale WarnerMedia, ce qui pourrait précipiter le rachat définitif par Disney du spécialiste de la VoD.\r\n<p>Alors que Disney va lancer sa plateforme de streaming dans les prochains mois et que la firme américaine est sur le point de finaliser le rachat de la Fox, la société pourrait voir ses chances d\'avaler Hulu grandir assez rapidement. C\'est lors d\'une conférence téléphonique donnée par des représentants de AT&T (qui possède une part minoritaire de Hulu) jeudi dernier que The Walt Disney Company a pu apprendre la bonne nouvelle.\r\nLa dette qui plombe AT&T pourrait aider Disney.\r\nIl y a quelques jours, comme le rapporte The Information, le groupe AT&T a annoncé qu\'il « envisageait de vendre sa participation de 10 % dans Hulu dans le cadre d\'une analyse d\'actifs plus large visant à  réduire sa dette ». Pour ne pas être trop perdu, faisons un bref rappel de la composition du capital du concurrent de Netflix. Comcast, la Fox et Disney détiennent chacun 30 % du capital de Hulu. Les 10 % restants appartiennent à  WarnerMedia, filiale de AT&T.\r\n', 'Hulu, concurrent de Netflix, pourrait définitivemet basculer dans le giron de Disney\r\n\r\n', '1', '2019-08-25 00:00:00', '2019-08-15 11:20:00', 1),
(6, 'https://pic.clubic.com/v1/images/1688024/raw?', 'Article 6', '\"La finalisation de l\'achat des actifs de Fox par Disney donnera déjà  le contrôle de Hulu à  Mickey, qui n\'en demandait pas tant lorsqu\'il a aussi appris que Comcast pourrait être poussé à  céder ses parts, refusant de rester dans une position minoritaire. Alors, s\'il s\'avère que AT&T veut bel et bien là¢cher Hulu, il faut maintenant se demander à  quel prix. En effet, depuis sa montée au capital en 2016 et après un investissement ultérieur, Warner a dépensé 800 millions de dollars dans Hulu.\r\nHulu dans le giron de Disney : un danger pour Netflix,\r\nSelon les médias américains, un récent document réglementaire indiquerait que Warner peut remettre sa participation à  Hulu à  tout moment jusqu\'au mois d\'aoà»t de l\'année prochain, sous certaines conditions. Reste à  savoir maintenant si la dette revendiquée par AT&T (après avoir racheté Time Warner pour 84,5 milliards de dollars) pourrait être suffisante pour satisfaire à  ces « certaines conditions ». A défaut, AT&T n\'aura pas l\'avantage dans les négociations.\"\r\n', 'Hulu dans le giron de Disney : un danger pour Netflix\r\n', '1', '2019-08-25 00:00:00', '2019-08-15 11:20:00', 2),
(7, 'https://pic.clubic.com/v1/images/1421188/raw?', 'Article 7', 'Le groupe AT&T pourrait céder la part de la société Hulu qu\'il détient via sa filiale WarnerMedia, ce qui pourrait précipiter le rachat définitif par Disney du spécialiste de la VoD.\r\n<p>Alors que Disney va lancer sa plateforme de streaming dans les prochains mois et que la firme américaine est sur le point de finaliser le rachat de la Fox, la société pourrait voir ses chances d\'avaler Hulu grandir assez rapidement. C\'est lors d\'une conférence téléphonique donnée par des représentants de AT&T (qui possède une part minoritaire de Hulu) jeudi dernier que The Walt Disney Company a pu apprendre la bonne nouvelle.\r\nLa dette qui plombe AT&T pourrait aider Disney.\r\nIl y a quelques jours, comme le rapporte The Information, le groupe AT&T a annoncé qu\'il « envisageait de vendre sa participation de 10 % dans Hulu dans le cadre d\'une analyse d\'actifs plus large visant à  réduire sa dette ». Pour ne pas être trop perdu, faisons un bref rappel de la composition du capital du concurrent de Netflix. Comcast, la Fox et Disney détiennent chacun 30 % du capital de Hulu. Les 10 % restants appartiennent à  WarnerMedia, filiale de AT&T.\r\n', 'Hulu, concurrent de Netflix, pourrait définitivemet basculer dans le giron de Disney\r\n\r\n', '1', '2019-08-25 00:00:00', '2019-08-15 11:20:00', 1),
(8, 'https://pic.clubic.com/v1/images/1688024/raw?', 'Article 8', '\"La finalisation de l\'achat des actifs de Fox par Disney donnera déjà  le contrôle de Hulu à  Mickey, qui n\'en demandait pas tant lorsqu\'il a aussi appris que Comcast pourrait être poussé à  céder ses parts, refusant de rester dans une position minoritaire. Alors, s\'il s\'avère que AT&T veut bel et bien là¢cher Hulu, il faut maintenant se demander à  quel prix. En effet, depuis sa montée au capital en 2016 et après un investissement ultérieur, Warner a dépensé 800 millions de dollars dans Hulu.\r\nHulu dans le giron de Disney : un danger pour Netflix,\r\nSelon les médias américains, un récent document réglementaire indiquerait que Warner peut remettre sa participation à  Hulu à  tout moment jusqu\'au mois d\'aoà»t de l\'année prochain, sous certaines conditions. Reste à  savoir maintenant si la dette revendiquée par AT&T (après avoir racheté Time Warner pour 84,5 milliards de dollars) pourrait être suffisante pour satisfaire à  ces « certaines conditions ». A défaut, AT&T n\'aura pas l\'avantage dans les négociations.\"\r\n', 'Hulu dans le giron de Disney : un danger pour Netflix\r\n', '1', '2019-08-25 00:00:00', '2019-08-15 11:20:00', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `email` varchar(96) NOT NULL,
  `password` varchar(128) NOT NULL,
  `active` enum('0','1') DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `github` varchar(50) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username_UNIQUE` (`username`) USING BTREE,
  KEY `password_UNIQUE` (`password`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `active`, `name`, `city`, `country`, `twitter`, `github`, `bio`, `avatar`, `create_time`, `update_time`) VALUES
(1, 'Lavande', 'sosso.boucher@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1', 'Frédérique Bougnoux', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-14 10:58:31', '2020-01-14 10:58:31'),
(2, 'Rose', 'haksaeng.2018@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1', 'RedFred', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-14 11:26:16', '2020-01-14 11:26:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
