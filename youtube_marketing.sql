-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 09 oct. 2020 à 13:32
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

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

CREATE TABLE `youtube_user` (
  `id` int(11) NOT NULL,
  `login_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `cle` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `actif` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `id_chaine` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `video_banned` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `coins_value` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `youtube_user`
--

INSERT INTO `youtube_user` (`id`, `login_name`, `email`, `pass`, `cle`, `actif`, `id_chaine`, `video_banned`, `coins_value`) VALUES
(18, '0', 'aaaaa@gmail.com', 'ddqsdqsdqsd', '1f4b1a2f0cb30b14aa78593b41ff889e', '1', 'YQHsXMglC9A', '0', 0),
(19, NULL, 'salahhatim556@gmail.com', '123', NULL, '1', 'BQ46ftZ7j5I', '0', 0),
(20, NULL, 'toto@gmail.com', '123', NULL, '1', 'vFD2gu007dc', '0', 0),
(21, NULL, 'alal_kadous@gmail.com', '123', NULL, '0', '77EGm9L1CxY', '0', 0),
(24, '0', 'salwa2009@gmail.com', 'salwa2009', '6aa1532dd136eb5f4d817c8f9be8366a', '0', '1m6en0SQNFs', '0', 600);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `youtube_user`
--
ALTER TABLE `youtube_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `youtube_user`
--
ALTER TABLE `youtube_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
