-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 12 Avril 2017 à 09:28
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `apero`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `etablissement_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE `enfant` (
  `id` int(11) NOT NULL,
  `famille_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etablisement`
--

CREATE TABLE `etablisement` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id` int(11) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `decote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire_occasion`
--

CREATE TABLE `exemplaire_occasion` (
  `id` int(11) NOT NULL,
  `livre_id` int(11) NOT NULL,
  `famille_acheteuse_id` int(11) NOT NULL,
  `famille_vendeuse_id` int(11) NOT NULL,
  `etat_id` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `famille_adherente`
--

CREATE TABLE `famille_adherente` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `isbn` int(11) NOT NULL,
  `nom_livre` varchar(255) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `annee_usage` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livre_section`
--

CREATE TABLE `livre_section` (
  `id` int(11) NOT NULL,
  `livre_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `nom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etablisement`
--
ALTER TABLE `etablisement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `exemplaire_occasion`
--
ALTER TABLE `exemplaire_occasion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `famille_adherente`
--
ALTER TABLE `famille_adherente`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`isbn`);

--
-- Index pour la table `livre_section`
--
ALTER TABLE `livre_section`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `enfant`
--
ALTER TABLE `enfant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `etablisement`
--
ALTER TABLE `etablisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `exemplaire_occasion`
--
ALTER TABLE `exemplaire_occasion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `famille_adherente`
--
ALTER TABLE `famille_adherente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `isbn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `livre_section`
--
ALTER TABLE `livre_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `fk_etablissement_classe` FOREIGN KEY (`id`) REFERENCES `etablisement` (`id`),
  ADD CONSTRAINT `fk_section_classe` FOREIGN KEY (`id`) REFERENCES `section` (`id`);

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `fk_famille_enfant` FOREIGN KEY (`id`) REFERENCES `famille_adherente` (`id`),
  ADD CONSTRAINT `fk_section_enfant` FOREIGN KEY (`id`) REFERENCES `section` (`id`);

--
-- Contraintes pour la table `exemplaire_occasion`
--
ALTER TABLE `exemplaire_occasion`
  ADD CONSTRAINT `fk_etat_exemplaire_occasion` FOREIGN KEY (`id`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `fk_famille_acheteuse_exemplaire_occasion` FOREIGN KEY (`id`) REFERENCES `famille_adherente` (`id`),
  ADD CONSTRAINT `fk_famille_vendeuse_exemplaire_occasion` FOREIGN KEY (`id`) REFERENCES `famille_adherente` (`id`),
  ADD CONSTRAINT `fk_livre_exemplaire_occasion` FOREIGN KEY (`id`) REFERENCES `livre` (`isbn`);

--
-- Contraintes pour la table `livre_section`
--
ALTER TABLE `livre_section`
  ADD CONSTRAINT `fk_livre_livre_section` FOREIGN KEY (`id`) REFERENCES `livre` (`isbn`),
  ADD CONSTRAINT `fk_section_livre_section` FOREIGN KEY (`id`) REFERENCES `section` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
