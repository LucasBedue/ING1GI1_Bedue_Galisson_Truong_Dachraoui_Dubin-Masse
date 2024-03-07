-- Script SQL pour créer la structure de la base de données

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
  PRIMARY KEY (`id`)
);

-- Créer la structure de la table `user`
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Age` int NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mot_de_passe` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);
