
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
  `categorie` varchar(4) not NULL,
  `stats_pv` int NOT NULL,
  `stats_ad` int NOT NULL,
  `stats_ap` int NOT NULL,
  `image` varchar(50) not NULL,
  PRIMARY KEY (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Insérer les données dans la table `item`
INSERT INTO `item` (`nom`, `prix`, `stock`, `categorie`, `stats_pv`, `stats_ad`, `stats_ap`,`image`) VALUES
('Titanic Hydra', 3300, 10, 'Tank', 550, 50, 0,'Titanic_Hydra_item_HD.png'),
('Nashors ''Tooth', 3000, 10, 'Ap', 0, 0, 90,'Nashors_Tooth_item_HD.png'),
('Horizon Focus', 2700, 10, 'Ap', 0, 0, 90,'Horizon_Focus_item_HD.png'),
('Jak ''Sho', 3200, 10, 'Tank', 300, 0, 0,'Jak2C_The_Protean_item_HD.png'),
('Morellonomicon', 2200, 10, 'Ap', 0, 0, 90,'Morellonomicon_item_HD.png'),
('Navori Quiblades', 3300, 10, 'Ad', 0, 60, 0,'Navori_Quickblades_item_HD.png'),
('Rabadon', 3600, 10, 'Ap', 0, 0, 140,'Rabadons_Deathcap_item_HD.png'),
('Spirit Visage', 2900, 10, 'Tank', 450, 0, 0,'Spirit_Visage_item_HD.png'),
('Stormrazor', 3100, 10, 'Ad', 0, 60, 0,'Stormrazor_item_HD.png'),
('Youmuu', 2700, 10, 'Ad', 0, 60, 0,'Youmuus_Ghostblade_item_HD.png'),
('Warmog', 3100, 10, 'Tank', 750, 0, 0,'Warmogs_Armor_item_HD.png'),
('Thornmail', 2700, 10, 'Tank', 350, 0, 0,'Thornmail_item_HD.png'),
('Void Staff', 3000, 10, 'Ap', 0, 0, 80,'Void_Staff_item_HD.png'),
('Infinity Edge', 3300, 10, 'Ad', 0, 65, 0,'Infinity_Edge_item_HD.png'),
('Statikk Shiv', 2700, 10, 'Ad', 0, 50, 0,'Statikk_Shiv_item_HD.png');
