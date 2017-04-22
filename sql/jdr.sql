-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 22 Avril 2017 à 01:28
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
  `mana` int(11) NOT NULL,
  `image_petite` text NOT NULL,
  `image_grande` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnage`
--

INSERT INTO `personnage` (`id`, `nom`, `titre`, `statPhysique`, `statMental`, `statSocial`, `statMagie`, `divers`, `backstory`, `imgURL`, `competences`, `sorts`, `equipement`, `hp`, `armor`, `mana`, `image_petite`, `image_grande`) VALUES
(4, 'Tillmmy', 'le con', 15, 15, 15, 15, '', '', '', '', '', '', 4, 0, 5, 'https://cdn.discordapp.com/attachments/302895812340613121/305088735123341313/Token-Urghatas.png', 'https://cdn.discordapp.com/attachments/302895812340613121/305088752467050500/Urgathas.png'),
(2, 'Nekaator', 'Courroux du demon', 15, 10, 8, 15, '', '', '', '', '', '', 2, 0, 5, 'https://cdn.discordapp.com/attachments/302895812340613121/305088716571934720/Token-Nekaator.png', 'https://cdn.discordapp.com/attachments/302895812340613121/305088716077137920/Nekaator.png'),
(3, 'Drilliak', 'L\'exile', 13, 9, 8, 15, '', '', '', '', '', '', 1, 0, 1, 'https://cdn.discordapp.com/attachments/302895812340613121/305088008829272064/Token-drilliak.png', 'https://cdn.discordapp.com/attachments/302895812340613121/305088002634416138/Drilliak.png'),
(5, 'Mambodo', 'la liseuse', 15, 15, 15, 15, '', '', '', '', '', '', 7, 0, 3, 'https://cdn.discordapp.com/attachments/302895812340613121/305088207945596930/Token-mambodo.png', 'https://cdn.discordapp.com/attachments/302895812340613121/305088204661587979/mambodo_face.png'),
(6, 'Helinya', 'on n\'a pas de rime en A', 15, 15, 15, 15, '', '', '', '', '', '', 7, 0, 9, 'https://cdn.discordapp.com/attachments/302895812340613121/305088650360782848/Token-Helinya.png', 'https://cdn.discordapp.com/attachments/302895812340613121/305088646611075072/Helinya-tete.png'),
(7, 'Rolesafe', 'oublie en toutes circonstances', 15, 15, 15, 15, '', '', '', '', '', '', 4, 0, 3, 'https://cdn.discordapp.com/attachments/302895812340613121/305087980593217537/Token-Grayson.png', 'https://cdn.discordapp.com/attachments/302895812340613121/305087970363441153/Grayson_Raine.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `id_personnage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `role`, `id_personnage`) VALUES
(12, 'Drilliak', '39fc017fa42eb9c47927498a02c98ce8c7e2bd2b2cd3b7e4f34d5ee4b38a9b23fc20c8be9c2483d98911c1e53be8cebb59d8b7a5778d956802cd01ac75694acb', 'player', 3),
(13, 'Nekaator', '851960d730848f4fb288b0826deee97a585b74a9a2992cd5c39b740f8ce0d08eeb90361cbdec249d19b4f4543b23fe642c9622fa5265c0943e59a70ed330422c', 'player', 2),
(14, 'Tillmmy', '819820dfab1317cda4d4dfdb71ed482f8c352799ff9a4d8408176e9ad8c6e9207c1eb2bf6cb95303f78409f7d356bdc2bd56a3f56982eb668ebbed95a6f12cf8', 'player', 4),
(15, 'Mambodo', '2f396388459fc0301718735fe92f33ceba97a1a4d7b874d6081843cff8a5fef01714556dd6086af5d713e970f696f1e5e5b79bf958122b3ff8d48d0cc8192f62', 'player', 5),
(16, 'Helinya', '8eca597bb7c11d0773758fd00f7524de472da0f27049dba6175d9f3893e993d88b6f037affe801bdb6206d255f4a81fe5ce31b3753f0d66ae52177b5591d0868', 'player', 6),
(17, 'Rolesafe', '1f93818f59208be948c9eebafcfb9167a23ec9fa86f5b0aa80b43e8f4896a467c5fcc9bbe1b6c2eaef0b314bbbe3456df7d91094386281b7102397c295977295', 'player', 7),
(18, 'Thethigre', '9688cb6ac2864ac09a269aa91d2a5c0e756771312c229c4187d2bc997a28a366b66e40f8c98deac91552860bdeff238fa39ac3e5fcdcd09f72eb7aaccc13dae0', 'gameMaster', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
