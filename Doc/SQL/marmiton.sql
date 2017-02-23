-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Jeu 23 Février 2017 à 19:17
-- Version du serveur :  5.7.16
-- Version de PHP :  5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `marmiton`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `categorie` varchar(250) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `categorie`) VALUES
(2, 'Entree'),
(3, 'Plat'),
(4, 'Déssert'),
(5, 'Boisson'),
(6, 'Sucrée'),
(7, 'Salé'),
(8, 'Oriental'),
(9, 'Glace');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_has_recettes`
--

CREATE TABLE `categorie_has_recettes` (
  `id_categorie` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `commentaire` varchar(500) COLLATE utf8_general_mysql500_ci NOT NULL,
  `id_recette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etaperecette`
--

CREATE TABLE `etaperecette` (
  `id_etape` int(11) NOT NULL,
  `etape` int(11) NOT NULL,
  `contenu` varchar(500) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etape_has_recette`
--

CREATE TABLE `etape_has_recette` (
  `id_etape` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `id_ingredient` int(11) NOT NULL,
  `nom` varchar(250) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Contenu de la table `ingredients`
--

INSERT INTO `ingredients` (`id_ingredient`, `nom`) VALUES
(1, 'sucre'),
(2, 'citron'),
(3, 'farine'),
(4, 'couscous'),
(5, 'sel'),
(6, 'batata'),
(7, 'zit coco'),
(8, 'zit zitoun'),
(9, 'eau'),
(10, 'pome');

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--

CREATE TABLE `mesures` (
  `mesure_id` int(11) NOT NULL,
  `mesure` varchar(250) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

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

CREATE TABLE `notations` (
  `notations_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL,
  `notations` int(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `id_recette` int(11) NOT NULL,
  `nom_recette` varchar(250) COLLATE utf8_general_mysql500_ci NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recette_has_ingredients`
--

CREATE TABLE `recette_has_ingredients` (
  `recette_id` int(11) NOT NULL,
  `ingredients_id` int(11) NOT NULL,
  `mesure_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_general_mysql500_ci NOT NULL,
  `pseudo` varchar(250) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`) USING BTREE;

--
-- Index pour la table `categorie_has_recettes`
--
ALTER TABLE `categorie_has_recettes`
  ADD UNIQUE KEY `id_categorie_2` (`id_categorie`,`id_recette`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_recette` (`id_recette`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_recette` (`id_recette`);

--
-- Index pour la table `etaperecette`
--
ALTER TABLE `etaperecette`
  ADD PRIMARY KEY (`id_etape`);

--
-- Index pour la table `etape_has_recette`
--
ALTER TABLE `etape_has_recette`
  ADD KEY `id_recette` (`id_recette`),
  ADD KEY `id_etape` (`id_etape`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id_ingredient`);

--
-- Index pour la table `mesures`
--
ALTER TABLE `mesures`
  ADD PRIMARY KEY (`mesure_id`);

--
-- Index pour la table `notations`
--
ALTER TABLE `notations`
  ADD PRIMARY KEY (`notations_id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_recette` (`id_recette`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id_recette`) USING BTREE,
  ADD UNIQUE KEY `id_recette` (`id_recette`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `recette_has_ingredients`
--
ALTER TABLE `recette_has_ingredients`
  ADD PRIMARY KEY (`recette_id`,`ingredients_id`),
  ADD KEY `recette_id` (`recette_id`),
  ADD KEY `ingredients_id` (`ingredients_id`),
  ADD KEY `mesure_id` (`mesure_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `etaperecette`
--
ALTER TABLE `etaperecette`
  MODIFY `id_etape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id_ingredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `mesures`
--
ALTER TABLE `mesures`
  MODIFY `mesure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `notations`
--
ALTER TABLE `notations`
  MODIFY `notations_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `id_recette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categorie_has_recettes`
--
ALTER TABLE `categorie_has_recettes`
  ADD CONSTRAINT `categorie_has_recettes_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categorie_has_recettes_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`);

--
-- Contraintes pour la table `etape_has_recette`
--
ALTER TABLE `etape_has_recette`
  ADD CONSTRAINT `etape_has_recette_ibfk_1` FOREIGN KEY (`id_etape`) REFERENCES `etaperecette` (`id_etape`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etape_has_recette_ibfk_2` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notations`
--
ALTER TABLE `notations`
  ADD CONSTRAINT `notations_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notations_ibfk_2` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `FK_recette_user_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `recette_has_ingredients`
--
ALTER TABLE `recette_has_ingredients`
  ADD CONSTRAINT `recette_has_ingredients_ibfk_1` FOREIGN KEY (`recette_id`) REFERENCES `recette` (`id_recette`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recette_has_ingredients_ibfk_2` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id_ingredient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recette_has_ingredients_ibfk_3` FOREIGN KEY (`mesure_id`) REFERENCES `mesures` (`mesure_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
