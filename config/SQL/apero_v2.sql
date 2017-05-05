-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 05 Mai 2017 à 09:20
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `apero`
--

-- --------------------------------------------------------

--
-- Structure de la table `adhesion`
--

CREATE TABLE IF NOT EXISTS `adhesion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `prix` decimal(13,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `adhesion`
--

INSERT INTO `adhesion` (`id`, `libelle`, `prix`) VALUES
(1, 'Adhérent', '10.00'),
(2, 'Non adhérent', '5.00');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etablissement_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_etablissement_classe` (`etablissement_id`),
  KEY `fk_section_classe` (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE IF NOT EXISTS `enfant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `famille_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_famille_enfant` (`famille_id`),
  KEY `fk_section_enfant` (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE IF NOT EXISTS `etablissement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etat` varchar(255) NOT NULL,
  `decote` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire_occasion`
--

CREATE TABLE IF NOT EXISTS `exemplaire_occasion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `livre_id` int(11) NOT NULL,
  `famille_acheteuse_id` int(11) NOT NULL,
  `famille_vendeuse_id` int(11) NOT NULL,
  `etat_id` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `date_depot` date DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_etat_exemplaire_occasion` (`etat_id`),
  KEY `fk_famille_acheteuse_exemplaire_occasion` (`famille_acheteuse_id`),
  KEY `fk_famille_vendeuse_exemplaire_occasion` (`famille_vendeuse_id`),
  KEY `fk_livre_exemplaire_occasion` (`livre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE IF NOT EXISTS `famille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adhesion_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adhesion_id` (`adhesion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_livre` varchar(255) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `annee_usage` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `livre_section`
--

CREATE TABLE IF NOT EXISTS `livre_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `livre_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_livre_livre_section` (`livre_id`),
  KEY `fk_section_livre_section` (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `fk_etablissement_classe` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissement` (`id`),
  ADD CONSTRAINT `fk_section_classe` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `fk_famille_enfant` FOREIGN KEY (`famille_id`) REFERENCES `famille` (`id`),
  ADD CONSTRAINT `fk_section_enfant` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);

--
-- Contraintes pour la table `exemplaire_occasion`
--
ALTER TABLE `exemplaire_occasion`
  ADD CONSTRAINT `fk_etat_exemplaire_occasion` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `fk_famille_acheteuse_exemplaire_occasion` FOREIGN KEY (`famille_acheteuse_id`) REFERENCES `famille` (`id`),
  ADD CONSTRAINT `fk_famille_vendeuse_exemplaire_occasion` FOREIGN KEY (`famille_vendeuse_id`) REFERENCES `famille` (`id`),
  ADD CONSTRAINT `fk_livre_exemplaire_occasion` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`);

--
-- Contraintes pour la table `famille`
--
ALTER TABLE `famille`
  ADD CONSTRAINT `fk_adhesion_famille` FOREIGN KEY (`adhesion_id`) REFERENCES `adhesion` (`id`);

--
-- Contraintes pour la table `livre_section`
--
ALTER TABLE `livre_section`
  ADD CONSTRAINT `fk_livre_livre_section` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`),
  ADD CONSTRAINT `fk_section_livre_section` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
