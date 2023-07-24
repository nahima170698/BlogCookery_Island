CREATE DATABASE IF NOT EXISTS `cookery_island`;

USE `cookery_island`;

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `ID_Commentaire` int NOT NULL AUTO_INCREMENT,
  `ID_Utilisateur` int NOT NULL,
  `ID_Recette` int NOT NULL,
  `Commentaire` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID_Commentaire`),
  KEY `ID_Recette` (`ID_Recette`),
  KEY `ID_Utilisateur` (`ID_Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `ID_Ingredient` int NOT NULL AUTO_INCREMENT,
  `ID_Recette` int NOT NULL,
  `Ingredient_1` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Ingredient_2` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Ingredient_3` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Ingredient_4` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Ingredient_5` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Ingredient_6` varchar(1000) NOT NULL,
  `Ingredient_7` varchar(1000) NOT NULL,
  `Ingredient_8` varchar(1000) NOT NULL,
  `Ingredient_9` varchar(1000) NOT NULL,
  `Ingredient_10` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID_Ingredient`),
  KEY `ID_Recette` (`ID_Recette`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `ID_Recette` int NOT NULL AUTO_INCREMENT,
  `Nom_Recette` varchar(50) NOT NULL,
  `Categorie` varchar(40) NOT NULL,
  `Temps_Preparation` varchar(30) NOT NULL,
  `Difficulte` varchar(20) NOT NULL,
  `Texte_Un` varchar(1000) NOT NULL,
  `Texte_Deux` varchar(1000) NOT NULL,
  `Image_Un` varchar(1000) NOT NULL,
  `Image_Deux` varchar(1000) NOT NULL,
  `Categorie_Logo` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID_Recette`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `ID_Role` int NOT NULL AUTO_INCREMENT,
  `Nom_Role` int NOT NULL,
  PRIMARY KEY (`ID_Role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_utilisateur` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Peseudo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Mot_De_Passe` varchar(50) NOT NULL,
  `ID_Role` int NOT NULL,
  PRIMARY KEY (`ID_utilisateur`),
  KEY `ID_Role` (`ID_Role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`ID_Recette`) REFERENCES `recette` (`ID_Recette`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_utilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT;


ALTER TABLE `ingredient`
  ADD CONSTRAINT `ingredient_ibfk_1` FOREIGN KEY (`ID_Recette`) REFERENCES `recette` (`ID_Recette`) ON DELETE RESTRICT ON UPDATE RESTRICT;


ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`ID_Role`) REFERENCES `role` (`ID_Role`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;
