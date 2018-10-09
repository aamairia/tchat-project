-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 09 oct. 2018 à 14:31
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_tchat_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `insertedBy` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  `responseTo` int(11) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_insertedBy_message` (`insertedBy`),
  KEY `FK_roomId_message` (`roomId`),
  KEY `FK_responseTo_message` (`responseTo`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `content`, `insertedBy`, `roomId`, `responseTo`, `createdAt`) VALUES
(1, 'Bonjour Aymen ^^', 2, 1, NULL, '2018-10-09 00:00:00'),
(2, 'Bonjour samar', 1, 1, 1, '2018-10-09 00:00:00'),
(3, 'sqdqsd', 1, 1, NULL, '2018-10-09 12:34:36'),
(4, 'test 45', 1, 1, NULL, '2018-10-09 12:34:43'),
(5, 'kjhkjdhfs', 1, 1, NULL, '2018-10-09 12:36:44'),
(6, 'test room ', 2, 2, NULL, '2018-10-09 01:27:52'),
(7, 'test room ', 2, 2, NULL, '2018-10-09 01:30:02'),
(8, 'bonjour aymen', 2, 2, NULL, '2018-10-09 02:07:44'),
(9, 'bonjour samar', 1, 2, NULL, '2018-10-09 02:08:02');

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(30) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `label`, `createdAt`, `updatedAt`) VALUES
(1, 'IT', '2018-10-09 00:00:00', '2018-10-09 00:00:00'),
(2, 'Astronomy', '2018-10-09 00:00:00', '2018-10-09 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isLogged` tinyint(1) NOT NULL,
  `currentRoom` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `isLogged`, `currentRoom`, `createdAt`, `updatedAt`) VALUES
(1, 'aymen', '31f11e387577c8d06c9d1b1ade4c4c32', 1, 2, '2018-10-09 00:00:00', '2018-10-09 00:00:00'),
(2, 'samar', 'cbc3f248a7e3acc6b6aac74efc6dc9d1', 1, 2, '2018-10-09 00:00:00', '2018-10-09 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
