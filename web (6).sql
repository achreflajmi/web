-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 06 mai 2023 à 12:17
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `role` int(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `role`, `id_user`) VALUES
(19, 1, 70);

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `archive`
--

INSERT INTO `archive` (`id`, `nom`, `description`, `email`) VALUES
(4567947, 'hhh', 'dfhghjk', 'ranounouch.kh@gmail.com'),
(4567930, 'hhh', 'dfhghjk', 'ranounouch.kh@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `archived` varchar(20) NOT NULL DEFAULT 'not_archived'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id`, `nom`, `description`, `email`, `archived`) VALUES
(4567961, 'hhh', 'dfcedfv', 'rannniakhedri@gmail.com', 'not_archived'),
(4567962, 'hhh', 'dfcedfv', 'rannniakhedri@gmail.com', 'not_archived'),
(4567963, 'vbnx', 'fghjk', 'rannniakhedri@gmail.com', 'not_archived'),
(4567964, 'achref', 'vbn', 'rannniakhedri@gmail.com', 'not_archived'),
(4567965, 'amir', 'cvbn,:;', 'rannniakhedri@gmail.com', 'not_archived'),
(4567966, 'amir', 'cvbn,:;', 'rannniakhedri@gmail.com', 'not_archived'),
(4567967, 'vbn,', 'xdgcfhjkl,', 'rannniakhedri@gmail.com', 'not_archived');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `id_reclamation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pswd` varchar(50) NOT NULL,
  `dateN` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `token` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `uname`, `email`, `pswd`, `dateN`, `image`, `token`) VALUES
(70, 'karim', 'rannniakhedri@gmail.com', '$2y$10$gcr2dXBz21ZLE63aI9zM2Oc4rFFkNnw.whJDgOPGxeb', '2001-07-16', 'Sans titre (34).jpg', NULL);
--
-- Structure de la table `formulaire`
--

CREATE TABLE `formulaire` (
  `id` int(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `nomEvent` varchar(100) NOT NULL,
  `date_d` datetime NOT NULL,
  `date_f` datetime NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `programmation` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `affiche` varchar(255) NOT NULL,
  `numTel` int(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formulaire`
--

INSERT INTO `formulaire` (`id`, `host`, `nomEvent`, `date_d`, `date_f`, `lieu`, `categorie`, `programmation`, `description`, `affiche`, `numTel`, `email`, `prix`) VALUES
(15, '15', 'Techno', '0000-00-00 00:00:00', '2023-06-01 00:40:00', '2023-06-02T00:40', 'Cercle', 'Théatre', 'Afterlife', 'A Brand, Events Planner And Electronic Music Label', 0, '54268300', 0),
(16, 'Réalisé par Chad Stahelski', 'John Wick: Chapitre 4', '2023-05-26 16:00:00', '2023-05-26 19:00:00', 'Pathé Tunis City, Tunisia', 'Cinéma', 'Jhon Wick', 'Keanu Reeves and John Wick: Chapter 4 cast discuss the significance of wardrobe on character and\r\n                  analyze the multiple monikers given to the infamous assassin.', 'jhon wick.jpg', 54268300, 'achref.lajmi@esprit.tn', 13.5),
(17, 'Touring Travel - Tunis', 'Djerba Tour', '2023-06-18 01:02:00', '2023-06-28 01:02:00', 'Djerba, Tunisia', 'Camping', 'Houmet souk \r\nMidoun', 'Découvrez Djerba, ses plages, villages traditionnels et spécialités culinaires lors d\'une visite\r\n                  organisée pour une expérience complète.', 'Djerba.jpg', 54268300, 'achref.lajmi@esprit.tn', 499),
(66, 'achref', 'Glitterdaze+Pop', '2023-05-03 14:45:00', '2023-05-11 14:45:00', 'Club Gingembre', 'Théatre', 'hgiugi', 'gygygjb', 'Oudhna.jpg', 54268320, 'achref.lajmi@esprit.tn', 20),
(67, 'achref', 'Glitterdaze+Pop', '2023-05-03 14:45:00', '2023-05-11 14:45:00', 'Club Gingembre', 'Théatre', 'hgiugi', 'gygygjb', 'Oudhna.jpg', 54268320, 'achref.lajmi@esprit.tn', 20),
(68, 'achref', 'Glitterdaze+Pop', '2023-05-03 14:45:00', '2023-05-11 14:45:00', 'Club Gingembre', 'Théatre', 'hgiugi', 'gygygjb', 'Oudhna.jpg', 54268320, 'achref.lajmi@esprit.tn', 20),
(69, 'achref', 'Glitterdaze+Pop', '2023-05-03 14:45:00', '2023-05-11 14:45:00', 'Club Gingembre', 'Théatre', 'hgiugi', 'gygygjb', 'Oudhna.jpg', 54268320, 'achref.lajmi@esprit.tn', 20);

-- --------------------------------------------------------

--
-- Structure de la table `price`
--

CREATE TABLE `price` (
  `id` int(255) NOT NULL,
  `nvPrix` float NOT NULL,
  `formulaire_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `price`
--

INSERT INTO `price` (`id`, `nvPrix`, `formulaire_id`) VALUES
(13, 108, 15),
(14, 16.2, 16),
(15, 598.8, 17),
(61, 24, 66),
(62, 24, 67),
(63, 24, 68),
(64, 24, 69);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-username` (`id_user`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reclamation` (`id_reclamation`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
--
-- Index pour la table `formulaire`
--
ALTER TABLE `formulaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idformulaire` (`formulaire_id`);
--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4567968;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT pour la table `formulaire`
--
ALTER TABLE `formulaire`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk-username` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`id_reclamation`) REFERENCES `reclamation` (`id`) ON DELETE CASCADE;
COMMIT;
--
-- Contraintes pour la table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `fk_idformulaire` FOREIGN KEY (`formulaire_id`) REFERENCES `formulaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
