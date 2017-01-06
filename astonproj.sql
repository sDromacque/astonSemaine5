-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 06 Janvier 2017 à 11:09
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `astonproj`
--

-- --------------------------------------------------------

--
-- Structure de la table `classeshavepersons`
--

CREATE TABLE `classeshavepersons` (
  `id` int(5) NOT NULL,
  `idPerson` int(5) NOT NULL,
  `idClass` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `classeshavepersons`
--

INSERT INTO `classeshavepersons` (`id`, `idPerson`, `idClass`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `classroom`
--

CREATE TABLE `classroom` (
  `id` int(5) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `classroom`
--

INSERT INTO `classroom` (`id`, `name`) VALUES
(1, 'DEV9'),
(2, 'DEV4');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(5) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `idPerson` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `idPerson`) VALUES
(1, 'très bon projet', 3),
(2, 'cours a revoir', 4),
(3, 'bon travail', 3);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(5) NOT NULL,
  `note` int(5) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reviewedAt` timestamp NULL DEFAULT NULL,
  `idComment` int(5) DEFAULT NULL,
  `idPerson` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`id`, `note`, `createdAt`, `reviewedAt`, `idComment`, `idPerson`) VALUES
(7, 17, '2017-01-06 10:04:46', NULL, 1, 1),
(8, 15, '2017-01-06 10:04:46', NULL, NULL, 2),
(9, 11, '2017-01-06 10:04:46', NULL, NULL, 7),
(10, 8, '2017-01-06 10:04:46', NULL, 2, 5),
(11, 19, '2017-01-06 10:04:46', NULL, 3, 6),
(12, 14, '2017-01-06 10:04:46', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `person`
--

CREATE TABLE `person` (
  `id` int(5) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `type` enum('student','teacher','admin') NOT NULL,
  `isDelegate` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `person`
--

INSERT INTO `person` (`id`, `firstname`, `lastname`, `type`, `isDelegate`) VALUES
(1, 'Charlotte', 'Kholms', 'student', b'1'),
(2, 'Daniel', 'Shewnteinger', 'student', b'1'),
(3, 'Marcel', 'Desailly', 'teacher', NULL),
(4, 'Rudy', 'Goodname', 'teacher', NULL),
(5, 'Sousa', 'Gandib', 'student', NULL),
(6, 'Eleona', 'Bolshovik', 'student', b'1'),
(7, 'Matthieu', 'Daemon', 'student', NULL),
(8, 'Eric', 'Falser', 'admin', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `classeshavepersons`
--
ALTER TABLE `classeshavepersons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPerson` (`idPerson`),
  ADD KEY `idClass` (`idClass`);

--
-- Index pour la table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPerson` (`idPerson`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idComment` (`idComment`),
  ADD KEY `fddf_fdfd` (`idPerson`);

--
-- Index pour la table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `classeshavepersons`
--
ALTER TABLE `classeshavepersons`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `classeshavepersons`
--
ALTER TABLE `classeshavepersons`
  ADD CONSTRAINT `fk_classroom_id` FOREIGN KEY (`idClass`) REFERENCES `classroom` (`id`),
  ADD CONSTRAINT `fk_person_id` FOREIGN KEY (`idPerson`) REFERENCES `person` (`id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_person_id_aut` FOREIGN KEY (`idPerson`) REFERENCES `person` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_comment_id` FOREIGN KEY (`idComment`) REFERENCES `comment` (`id`),
  ADD CONSTRAINT `fk_person_idfk_person_id` FOREIGN KEY (`idPerson`) REFERENCES `person` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
