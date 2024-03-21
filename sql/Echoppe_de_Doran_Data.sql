-- Supprimer la base de données si elle existe déjà
DROP DATABASE IF EXISTS `Echoppe_De_Doran`;

-- Créer la base de données
CREATE DATABASE `Echoppe_De_Doran`;

-- Utiliser la base de données nouvellement créée
USE `Echoppe_De_Doran`;

-- Créer la structure de la table `item`
CREATE TABLE IF NOT EXISTS `item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prix` int NOT NULL,
  `stock` int NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `stats_pv` int NOT NULL,
  `stats_ad` int NOT NULL,
  `stats_ap` int NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);
