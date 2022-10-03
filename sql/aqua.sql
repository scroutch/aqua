-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 oct. 2022 à 21:33
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aqua`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_address` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_admin` varchar(75) NOT NULL,
  `psw_admin` varchar(125) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `allergene`
--

DROP TABLE IF EXISTS `allergene`;
CREATE TABLE IF NOT EXISTS `allergene` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_allergene` varchar(255) NOT NULL,
  `produit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_allergene_id` (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `name_cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_cat`, `name_cat`) VALUES
(1, 'entrées'),
(2, 'plats'),
(3, 'desserts'),
(4, 'boissons');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_commande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `status_devisClient_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_commande_user` (`user_id`),
  KEY `fk_commande_status_devis` (`status_devisClient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

DROP TABLE IF EXISTS `commande_produit`;
CREATE TABLE IF NOT EXISTS `commande_produit` (
  `commande_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  KEY `fk_produit_commande` (`produit_id`),
  KEY `fk_commande_produit` (`commande_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_contact` varchar(75) NOT NULL,
  `first_name_contact` varchar(75) NOT NULL,
  `mail_contact` varchar(255) NOT NULL,
  `subject_contact` varchar(150) NOT NULL,
  `message_contact` varchar(255) NOT NULL,
  `date_contact` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name_contact`, `first_name_contact`, `mail_contact`, `subject_contact`, `message_contact`, `date_contact`) VALUES
(1, 'toto', 'toto', 'toto@toto.com', 'question', 'Blablablablabla', '2022-10-03 22:47:53');

-- --------------------------------------------------------

--
-- Structure de la table `devisclient`
--

DROP TABLE IF EXISTS `devisclient`;
CREATE TABLE IF NOT EXISTS `devisclient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nb_people` int(11) NOT NULL,
  `comment_devis` varchar(255) NOT NULL,
  `date_event` date NOT NULL,
  `date_devis` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userDevis_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_facture` varchar(255) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_facture_user` (`user_id`),
  KEY `fk_facture_commande` (`commande_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formule`
--

DROP TABLE IF EXISTS `formule`;
CREATE TABLE IF NOT EXISTS `formule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_formule` varchar(255) NOT NULL,
  `price_formule` decimal(10,0) NOT NULL,
  `produits_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fl_produit_id` (`produits_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prestation_produits`
--

DROP TABLE IF EXISTS `prestation_produits`;
CREATE TABLE IF NOT EXISTS `prestation_produits` (
  `produits_id` int(11) NOT NULL,
  `type_prestation_id` int(11) NOT NULL,
  KEY `fk_produits_prestation` (`produits_id`),
  KEY `fk_prestation_produits` (`type_prestation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(255) NOT NULL,
  `price_product` float NOT NULL,
  `img_product` varchar(255) NOT NULL,
  `describe_product` varchar(255) NOT NULL,
  `sousCategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sousCat_id` (`sousCategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `name_product`, `price_product`, `img_product`, `describe_product`, `sousCategory_id`) VALUES
(1, 'Harengs marinés pomme à l’huile', 8.9, '/assets/img/entreeF/hareng.jpg', 'Harengs marinés accompagnés de pommes à l\'huile d\'olive et au thym.', 1),
(2, 'Caviar', 49.9, '/assets/img/entreeF/caviar.jpg', '30 grammes de caviar de France et ses brioches toastées à la crème fermière de Normandie.', 1),
(3, 'Huîtres à l’émulsion de vodka, citron vert et piment', 19.9, '/assets/img/entreeF/Huitres.jpg', '6 belles huitres accompagnées d\'une émulsion de vodka au citron et au piment.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits_formule`
--

DROP TABLE IF EXISTS `produits_formule`;
CREATE TABLE IF NOT EXISTS `produits_formule` (
  `produits_id` int(11) NOT NULL,
  `formule_id` int(11) NOT NULL,
  KEY `fk_produit_formule` (`produits_id`),
  KEY `fk_formule_produit` (`formule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit_allergene`
--

DROP TABLE IF EXISTS `produit_allergene`;
CREATE TABLE IF NOT EXISTS `produit_allergene` (
  `produit_id` int(11) NOT NULL,
  `allergene_id` int(11) NOT NULL,
  KEY `fk_produit_allergene` (`produit_id`),
  KEY `fk_allergene_produit` (`allergene_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit_saison`
--

DROP TABLE IF EXISTS `produit_saison`;
CREATE TABLE IF NOT EXISTS `produit_saison` (
  `produits_id` int(11) NOT NULL,
  `saisons_id` int(11) NOT NULL,
  KEY `fk_produit_saison` (`produits_id`),
  KEY `fk_saison_produit` (`saisons_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `saisons`
--

DROP TABLE IF EXISTS `saisons`;
CREATE TABLE IF NOT EXISTS `saisons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_season` varchar(70) NOT NULL,
  `produit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_id` (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `souscategory`
--

DROP TABLE IF EXISTS `souscategory`;
CREATE TABLE IF NOT EXISTS `souscategory` (
  `id_sousCat` int(11) NOT NULL AUTO_INCREMENT,
  `name_sousCat` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id_sousCat`),
  KEY `fk_category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `souscategory`
--

INSERT INTO `souscategory` (`id_sousCat`, `name_sousCat`, `category_id`) VALUES
(1, 'entrées froide', 1),
(2, 'entrées chaude', 1),
(3, 'Nos poissons', 2),
(4, 'Nos fruits de mer', 2),
(5, 'Glaces', 3),
(6, 'Les classiques', 3),
(7, 'Apéritif', 4),
(8, 'Soft', 4),
(9, 'Bières', 4),
(10, 'Boissons chaudes', 4),
(11, 'Les vins', 4),
(12, 'cocktail avec alcool', 4),
(13, 'cocktail sans alcool', 4);

-- --------------------------------------------------------

--
-- Structure de la table `status_commande`
--

DROP TABLE IF EXISTS `status_commande`;
CREATE TABLE IF NOT EXISTS `status_commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etat` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_commande_id` (`commande_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `status_devisclient`
--

DROP TABLE IF EXISTS `status_devisclient`;
CREATE TABLE IF NOT EXISTS `status_devisclient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etat` int(11) NOT NULL,
  `devis_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_devis_id` (`devis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `status_facture`
--

DROP TABLE IF EXISTS `status_facture`;
CREATE TABLE IF NOT EXISTS `status_facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etat` int(11) NOT NULL,
  `facture_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_facture_id` (`facture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_event`
--

DROP TABLE IF EXISTS `type_event`;
CREATE TABLE IF NOT EXISTS `type_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_event` varchar(255) NOT NULL,
  `devis_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_devis` (`devis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_prestation`
--

DROP TABLE IF EXISTS `type_prestation`;
CREATE TABLE IF NOT EXISTS `type_prestation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_prestation` varchar(255) NOT NULL,
  `devis_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fl_prestaDevis_id` (`devis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(75) NOT NULL,
  `firstName_user` varchar(75) NOT NULL,
  `mail_user` varchar(255) NOT NULL,
  `psw_user` varchar(255) NOT NULL,
  `subscribeDate_user` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name_user`, `firstName_user`, `mail_user`, `psw_user`, `subscribeDate_user`) VALUES
(1, 'Maurice', 'Dupont', 'test@test.com', '$2y$10$rJW/UqtJdf7lrLj/st20tu5M/1DKiKylLJoqWYkJwzIWSy9Rkoh4i', '2022-10-03 22:34:35');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `allergene`
--
ALTER TABLE `allergene`
  ADD CONSTRAINT `fk_allergene_id` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_status_devis` FOREIGN KEY (`status_devisClient_id`) REFERENCES `status_devisclient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_commande_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `fk_commande_produit` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produit_commande` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `devisclient`
--
ALTER TABLE `devisclient`
  ADD CONSTRAINT `fk_userDevis_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `fk_facture_commande` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_facture_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `formule`
--
ALTER TABLE `formule`
  ADD CONSTRAINT `fl_produit_id` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prestation_produits`
--
ALTER TABLE `prestation_produits`
  ADD CONSTRAINT `fk_prestation_produits` FOREIGN KEY (`type_prestation_id`) REFERENCES `type_prestation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produits_prestation` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_sousCat_id` FOREIGN KEY (`sousCategory_id`) REFERENCES `souscategory` (`id_sousCat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits_formule`
--
ALTER TABLE `produits_formule`
  ADD CONSTRAINT `fk_formule_produit` FOREIGN KEY (`formule_id`) REFERENCES `formule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produit_formule` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit_allergene`
--
ALTER TABLE `produit_allergene`
  ADD CONSTRAINT `fk_allergene_produit` FOREIGN KEY (`allergene_id`) REFERENCES `allergene` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produit_allergene` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit_saison`
--
ALTER TABLE `produit_saison`
  ADD CONSTRAINT `fk_produit_saison` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_saison_produit` FOREIGN KEY (`saisons_id`) REFERENCES `saisons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `saisons`
--
ALTER TABLE `saisons`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `souscategory`
--
ALTER TABLE `souscategory`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `status_commande`
--
ALTER TABLE `status_commande`
  ADD CONSTRAINT `fk_commande_id` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `status_devisclient`
--
ALTER TABLE `status_devisclient`
  ADD CONSTRAINT `fk_devis_id` FOREIGN KEY (`devis_id`) REFERENCES `devisclient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `status_facture`
--
ALTER TABLE `status_facture`
  ADD CONSTRAINT `fk_facture_id` FOREIGN KEY (`facture_id`) REFERENCES `facture` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `type_event`
--
ALTER TABLE `type_event`
  ADD CONSTRAINT `fk_id_devis` FOREIGN KEY (`devis_id`) REFERENCES `devisclient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `type_prestation`
--
ALTER TABLE `type_prestation`
  ADD CONSTRAINT `fl_prestaDevis_id` FOREIGN KEY (`devis_id`) REFERENCES `devisclient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
