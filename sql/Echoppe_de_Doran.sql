
DROP DATABASE IF EXISTS `Echoppe_de_doran`;

-- Créer la base de données
CREATE DATABASE `Echoppe_de_doran`;

USE `Echoppe_de_doran`;

-- Créer la structure de la table `item`
DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prix` int NOT NULL,
  `stock` int NOT NULL,
  `categorie` varchar(4) NOT NULL,
  `stats_pv` int NOT NULL,
  `stats_ad` int NOT NULL,
  `stats_ap` int NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Insérer les données dans la table `item`
INSERT INTO `item` (`nom`, `prix`, `stock`, `categorie`, `stats_pv`, `stats_ad`, `stats_ap`) VALUES
('Titanic Hydra', 3300, 10, 'Tank', 550, 50, 0),
('Nashor \'Tooth', 3000, 10, 'Ap', 0, 0, 90),
('Horizon Focus', 2700, 10, 'Ap', 0, 0, 90),
('Jak \'Sho', 3200, 10, 'Tank', 300, 0, 0),
('Morellonomicon', 2200, 10, 'Ap', 0, 0, 90),
('Navori Quiblades', 3300, 10, 'Ad', 0, 60, 0),
('Rabadon', 3600, 10, 'Ap', 0, 0, 140),
('Spirit Visage', 2900, 10, 'Tank', 450, 0, 0),
('Stormrazor', 3100, 10, 'Ad', 0, 60, 0),
('Youmuu', 2700, 10, 'Ad', 0, 60, 0),
('Warmog', 3100, 10, 'Tank', 750, 0, 0),
('Thornmail', 2700, 10, 'Tank', 350, 0, 0),
('Void Staff', 3000, 10, 'Ap', 0, 0, 80),
('Infinity Edge', 3300, 10, 'Ad', 0, 65, 0),
('Statikk Shiv', 2700, 10, 'Ad', 0, 50, 0);
