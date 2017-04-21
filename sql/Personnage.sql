-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 21 Avril 2017 à 15:57
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jdr`
--

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE `personnage` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `statPhysique` int(11) NOT NULL,
  `statMental` int(11) NOT NULL,
  `statSocial` int(11) NOT NULL,
  `statMagie` int(11) NOT NULL,
  `divers` text NOT NULL,
  `backstory` text NOT NULL,
  `imgURL` text NOT NULL,
  `competences` text NOT NULL,
  `sorts` text NOT NULL,
  `equipement` text NOT NULL,
  `hp` int(11) NOT NULL,
  `armor` int(11) NOT NULL,
  `mana` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnage`
--

INSERT INTO `personnage` (`id`, `nom`, `titre`, `statPhysique`, `statMental`, `statSocial`, `statMagie`, `divers`, `backstory`, `imgURL`, `competences`, `sorts`, `equipement`, `hp`, `armor`, `mana`) VALUES
(1, 'gleugo', 'grosse merde', 0, 1, 1, 51, 'coucou', 'salut', 'rien', 'rien', 'rien', 'rien', 50, 8, 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
