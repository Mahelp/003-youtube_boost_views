-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 13 oct. 2020 à 02:33
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
-- Structure de la table `youtube_campaign_views`
--

CREATE TABLE `youtube_campaign_views` (
  `id` int(11) NOT NULL,
  `id_chaine` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `statut_campaign` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `date_create_campaign` datetime DEFAULT NULL,
  `id_chaine_target` int(11) DEFAULT NULL,
  `date_views_chaine` datetime DEFAULT NULL,
  `count_view_chaine` int(11) DEFAULT NULL,
  `count_views_coins` int(11) DEFAULT NULL,
  `coins_value_user` int(11) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `youtube_campaign_views`
--

INSERT INTO `youtube_campaign_views` (`id`, `id_chaine`, `id_user`, `statut_campaign`, `date_create_campaign`, `id_chaine_target`, `date_views_chaine`, `count_view_chaine`, `count_views_coins`, `coins_value_user`, `is_admin`) VALUES
(25, 'Q00niDCcy4E', 24, 'IN_PROGRESS', '2020-10-13 02:07:07', 0, '2020-10-13 02:07:07', 2, 5, 500, 0);

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
(18, 'aaaa', 'aaaaa@gmail.com', 'ddqsdqsdqsd', '1f4b1a2f0cb30b14aa78593b41ff889e', '1', 'YQHsXMglC9A', '0', 0),
(19, 'hATIM00', 'salahhatim556@gmail.com', '123456789', NULL, '1', '0NWNto6EIYs', '0', 4500),
(20, 'toto', 'toto@gmail.com', '123456789', NULL, '1', '6LSmCO5j2_E', '0', 6600),
(21, NULL, 'alal_kadous@gmail.com', '123', NULL, '0', '77EGm9L1CxY', '0', 0),
(24, 'SalWa', 'salwa2009@gmail.com', 'salwa2009', '6aa1532dd136eb5f4d817c8f9be8366a', '0', 'BQ46ftZ7j5I', '0', 5300),
(25, 'MiMou', 'Mimou@gmail.com', '123456789', '1d9cff333f11c33814f92cd1b83379af', '0', 'BQ46ftZ7j5I', '0', 500);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `youtube_campaign_views`
--
ALTER TABLE `youtube_campaign_views`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `youtube_user`
--
ALTER TABLE `youtube_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `youtube_campaign_views`
--
ALTER TABLE `youtube_campaign_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `youtube_user`
--
ALTER TABLE `youtube_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
