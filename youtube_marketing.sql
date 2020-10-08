-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 08 oct. 2020 à 00:09
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `youtube_marketing`
--

-- --------------------------------------------------------

--
-- Structure de la table `youtube_user`
--

DROP TABLE IF EXISTS `youtube_user`;
CREATE TABLE IF NOT EXISTS `youtube_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `cle` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `actif` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `id_chaine` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `video_banned` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `youtube_user`
--

INSERT INTO `youtube_user` (`id`, `login_name`, `email`, `pass`, `cle`, `actif`, `id_chaine`, `video_banned`) VALUES
(18, '0', 'aaaaa@gmail.com', 'ddqsdqsdqsd', '1f4b1a2f0cb30b14aa78593b41ff889e', '1', 'YQHsXMglC9A', '0'),
(19, NULL, 'salahhatim556@gmail.com', '123', NULL, '1', 'BQ46ftZ7j5I', '0'),
(20, NULL, 'toto@gmail.com', '123', NULL, '1', 'vFD2gu007dc', NULL),
(21, NULL, 'alal_kadous@gmail.com', '123', NULL, '0', '77EGm9L1CxY', '0'),
(24, '0', 'salwa2009@gmail.com', 'salwa2009', '6aa1532dd136eb5f4d817c8f9be8366a', '0', '1m6en0SQNFs', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
