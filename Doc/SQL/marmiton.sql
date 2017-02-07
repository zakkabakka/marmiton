-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mar 07 Février 2017 à 15:33
-- Version du serveur :  5.5.54-0+deb8u1
-- Version de PHP :  7.0.15-1~dotdeb+8.1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `marmiton`
--
-- CREATE DATABASE IF NOT EXISTS `marmiton` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci;
-- USE `marmiton`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--
-- Création :  Mar 07 Février 2017 à 14:17
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(250) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id_categorie`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_has_recettes`
--
-- Création :  Mar 07 Février 2017 à 14:20
--

DROP TABLE IF EXISTS `categorie_has_recettes`;
CREATE TABLE IF NOT EXISTS `categorie_has_recettes` (
  `id_categorie` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL,
  UNIQUE KEY `id_categorie_2` (`id_categorie`,`id_recette`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_recette` (`id_recette`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--
-- Création :  Mar 07 Février 2017 à 13:54
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id_ingredient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id_ingredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--
-- Création :  Mar 07 Février 2017 à 13:55
--

DROP TABLE IF EXISTS `mesures`;
CREATE TABLE IF NOT EXISTS `mesures` (
  `mesure_id` int(11) NOT NULL AUTO_INCREMENT,
  `mesure` varchar(250) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`mesure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Vider la table avant d'insérer `mesures`
--

TRUNCATE TABLE `mesures`;
--
-- Contenu de la table `mesures`
--

INSERT INTO `mesures` (`mesure_id`, `mesure`) VALUES
(1, 'grammes'),
(2, 'litres'),
(3, 'millilitres'),
(4, 'cuillères à soupe'),
(5, 'cuillères à café'),
(6, 'kilogramme'),
(7, 'pincée');

-- --------------------------------------------------------

--
-- Structure de la table `notations`
--
-- Création :  Mar 07 Février 2017 à 14:32
--

DROP TABLE IF EXISTS `notations`;
CREATE TABLE IF NOT EXISTS `notations` (
  `notations_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL,
  `notations` int(1) UNSIGNED DEFAULT '0',
  `commentaire` text COLLATE utf8_general_mysql500_ci,
  PRIMARY KEY (`notations_id`),
  KEY `id_user` (`id_user`),
  KEY `id_recette` (`id_recette`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--
-- Création :  Mar 07 Février 2017 à 14:14
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `id_recette` int(11) NOT NULL AUTO_INCREMENT,
  `nom_recette` varchar(250) COLLATE utf8_general_mysql500_ci NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_recette`) USING BTREE,
  UNIQUE KEY `id_recette` (`id_recette`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recette_has_ingredients`
--
-- Création :  Mar 07 Février 2017 à 14:22
--

DROP TABLE IF EXISTS `recette_has_ingredients`;
CREATE TABLE IF NOT EXISTS `recette_has_ingredients` (
  `recette_id` int(11) NOT NULL,
  `ingredients_id` int(11) NOT NULL,
  `mesure_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`recette_id`,`ingredients_id`),
  KEY `recette_id` (`recette_id`),
  KEY `ingredients_id` (`ingredients_id`),
  KEY `mesure_id` (`mesure_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Vider la table avant d'insérer `recette_has_ingredients`
--

TRUNCATE TABLE `recette_has_ingredients`;
-- --------------------------------------------------------

--
-- Structure de la table `users`
--
-- Création :  Mar 07 Février 2017 à 13:54
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) COLLATE utf8_general_mysql500_ci NOT NULL,
  `pseudo` varchar(250) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Vider la table avant d'insérer `users`
--

TRUNCATE TABLE `users`;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categorie_has_recettes`
--
ALTER TABLE `categorie_has_recettes`
  ADD CONSTRAINT `categorie_has_recettes_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categorie_has_recettes_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notations`
--
ALTER TABLE `notations`
  ADD CONSTRAINT `notations_ibfk_2` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notations_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `FK_recette_user_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `recette_has_ingredients`
--
ALTER TABLE `recette_has_ingredients`
  ADD CONSTRAINT `recette_has_ingredients_ibfk_3` FOREIGN KEY (`mesure_id`) REFERENCES `mesures` (`mesure_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recette_has_ingredients_ibfk_1` FOREIGN KEY (`recette_id`) REFERENCES `recette` (`id_recette`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recette_has_ingredients_ibfk_2` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id_ingredient`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
