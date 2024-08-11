-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 11 août 2024 à 09:24
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mra_pilotage`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

DROP TABLE IF EXISTS `action`;
CREATE TABLE IF NOT EXISTS `action` (
  `id_action` int NOT NULL AUTO_INCREMENT,
  `date_inscription` date DEFAULT NULL,
  `service_pole_emetteur_action` int DEFAULT NULL,
  `echelon_origin_action` int NOT NULL,
  `processus` int NOT NULL,
  `thematique_indicateur_associes` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `constat_analyse_des_causes` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `descriptif_action` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `objectifs` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `responsable_action` int NOT NULL,
  `pole_service` int NOT NULL,
  `origin_action` int NOT NULL,
  `declinaision_locale` int NOT NULL,
  `echeances` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_fin_action` date NOT NULL,
  `date_debut_previsionnelle` date NOT NULL,
  `etat_action` int DEFAULT NULL,
  `commentaire` text,
  `action_active` int DEFAULT NULL,
  PRIMARY KEY (`id_action`),
  KEY `fk_action_echelon_origin` (`echelon_origin_action`),
  KEY `fk_action_processus` (`processus`),
  KEY `fk_action_etat_action` (`etat_action`),
  KEY `fk_action_reponsable_user` (`responsable_action`),
  KEY `fk_service_action` (`service_pole_emetteur_action`),
  KEY `fk_service_action_concerne` (`pole_service`),
  KEY `fk_origin_action` (`origin_action`)
) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `action`
--

INSERT INTO `action` (`id_action`, `date_inscription`, `service_pole_emetteur_action`, `echelon_origin_action`, `processus`, `thematique_indicateur_associes`, `constat_analyse_des_causes`, `descriptif_action`, `objectifs`, `responsable_action`, `pole_service`, `origin_action`, `declinaision_locale`, `echeances`, `date_fin_action`, `date_debut_previsionnelle`, `etat_action`, `commentaire`, `action_active`) VALUES
(219, '2024-08-08', 10, 26, 27, 'monact11', 'monact', 'monact', 'monact', 1, 33, 7, 1, 'monact', '2024-08-08', '2024-08-30', 11, 'pokemon123', 0),
(226, '2024-08-09', 9, 25, 26, 'tatata', 'tatata', 'tatata', 'tatata', 3, 9, 11, 1, 'tatata', '2024-08-16', '2024-08-17', 11, 'tatata123654987', 0),
(227, '2024-08-09', 9, 25, 30, 'reussisenfin', 'reussisenfin', 'reussisenfinreussisenfin', 'reussisenfin', 3, 9, 5, 1, 'reussisenfin', '2024-08-01', '2024-08-30', 11, 'reussisenfin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `id_departement` int NOT NULL AUTO_INCREMENT,
  `libelle_departement` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `numero_departement` int NOT NULL,
  PRIMARY KEY (`id_departement`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id_departement`, `libelle_departement`, `numero_departement`) VALUES
(25, 'ELSM23', 75),
(26, 'EL75', 75),
(27, 'EL77', 77),
(28, 'EL78', 78);

-- --------------------------------------------------------

--
-- Structure de la table `efficacite`
--

DROP TABLE IF EXISTS `efficacite`;
CREATE TABLE IF NOT EXISTS `efficacite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etat_action`
--

DROP TABLE IF EXISTS `etat_action`;
CREATE TABLE IF NOT EXISTS `etat_action` (
  `id_etat` int NOT NULL AUTO_INCREMENT,
  `libelle_etat` varchar(150) NOT NULL,
  PRIMARY KEY (`id_etat`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etat_action`
--

INSERT INTO `etat_action` (`id_etat`, `libelle_etat`) VALUES
(11, 'Etat action 1133');

-- --------------------------------------------------------

--
-- Structure de la table `historique_log`
--

DROP TABLE IF EXISTS `historique_log`;
CREATE TABLE IF NOT EXISTS `historique_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `action` varchar(200) NOT NULL,
  `auteur` varchar(200) NOT NULL,
  `fait_par` varchar(200) NOT NULL,
  `supprime_par` varchar(200) NOT NULL,
  `date_suppression` varchar(200) NOT NULL,
  `date_ajout` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `origine_action`
--

DROP TABLE IF EXISTS `origine_action`;
CREATE TABLE IF NOT EXISTS `origine_action` (
  `id_origin_action` int NOT NULL AUTO_INCREMENT,
  `libelle_origin_action` varchar(250) NOT NULL,
  PRIMARY KEY (`id_origin_action`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `origine_action`
--

INSERT INTO `origine_action` (`id_origin_action`, `libelle_origin_action`) VALUES
(5, 'Audit / Atelier optimisation'),
(6, 'Validation des comptes'),
(7, 'Pilotage CPG'),
(8, 'Pilotage contrôle interne'),
(9, 'Revue de performance'),
(10, 'Reglementation'),
(11, 'Ecoute clients');

-- --------------------------------------------------------

--
-- Structure de la table `pole_service`
--

DROP TABLE IF EXISTS `pole_service`;
CREATE TABLE IF NOT EXISTS `pole_service` (
  `id_service` int NOT NULL AUTO_INCREMENT,
  `libelle_service` varchar(200) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pole_service`
--

INSERT INTO `pole_service` (`id_service`, `libelle_service`) VALUES
(9, 'Direction régionale'),
(10, 'Direction locale'),
(12, 'Département CDG'),
(14, 'MRA Dentaire'),
(15, 'MRA Pharmacie-biologie'),
(16, 'DRH'),
(17, 'MSSI'),
(18, 'Pôle AOS'),
(19, 'Pole CCX'),
(20, 'Pôle CEPRA'),
(21, 'Pôle GRC'),
(22, 'RPCA'),
(23, 'Service Communication'),
(24, 'Service Documentation'),
(25, 'Service EAS'),
(26, 'Service Informatique'),
(27, 'Service Appareillage SR3I'),
(28, 'UGRC'),
(29, 'ULAF'),
(30, 'Unité médicale RCT'),
(31, 'UOP'),
(32, 'UPS'),
(33, 'USA'),
(34, 'USGF');

-- --------------------------------------------------------

--
-- Structure de la table `processus`
--

DROP TABLE IF EXISTS `processus`;
CREATE TABLE IF NOT EXISTS `processus` (
  `id_processus` int NOT NULL AUTO_INCREMENT,
  `libelle_processus` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_processus`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `processus`
--

INSERT INTO `processus` (`id_processus`, `libelle_processus`) VALUES
(21, 'Accompagnement des offreurs de soins'),
(22, 'Accompagnement en santé'),
(25, 'Accompagnement physique'),
(26, 'Accueil téléphonique'),
(27, 'Achats'),
(28, 'Définition de la stratégie'),
(29, 'Etablissements (Publics et Privés)'),
(30, 'Formation'),
(31, 'Gérer l\'informatique locale'),
(32, 'Gestion administrative du personnel'),
(33, 'Gestion administrative du personnel'),
(34, 'Gestion des bénéficiaires'),
(35, 'Gestion des flux entrants'),
(36, 'Indemnités journalières'),
(37, 'Invalidité'),
(38, 'Lutte contre la fraude'),
(39, 'Marketing opérationnel et Digitalisation'),
(40, 'Pilotage de la performance'),
(41, 'Pré-contentieux et contentieux'),
(42, 'Prévention'),
(43, 'Reconnaissance AT/MP'),
(44, 'Recours contre tiers'),
(45, 'Relations internationales');

-- --------------------------------------------------------

--
-- Structure de la table `responsable_action`
--

DROP TABLE IF EXISTS `responsable_action`;
CREATE TABLE IF NOT EXISTS `responsable_action` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `source_action`
--

DROP TABLE IF EXISTS `source_action`;
CREATE TABLE IF NOT EXISTS `source_action` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `echelon` int NOT NULL,
  `service` int DEFAULT NULL,
  `identifiant` varchar(200) NOT NULL,
  `mot_de_passe` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_departement` (`echelon`),
  KEY `fk_user_service` (`service`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `role`, `echelon`, `service`, `identifiant`, `mot_de_passe`) VALUES
(1, 'KARROUM', 'Nassim', 'ROLE_LECTEUR', 26, 10, '', ''),
(3, 'Proprietaire', 'Proprietaire', 'ROLE_PROPRIETAIRES', 26, 9, '', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `fk_action_echelon_origin` FOREIGN KEY (`echelon_origin_action`) REFERENCES `departement` (`id_departement`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_action_etat_action` FOREIGN KEY (`etat_action`) REFERENCES `etat_action` (`id_etat`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_action_processus` FOREIGN KEY (`processus`) REFERENCES `processus` (`id_processus`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_action_reponsable_user` FOREIGN KEY (`responsable_action`) REFERENCES `utilisateurs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_origin_action` FOREIGN KEY (`origin_action`) REFERENCES `origine_action` (`id_origin_action`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_service_action` FOREIGN KEY (`service_pole_emetteur_action`) REFERENCES `pole_service` (`id_service`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_service_action_concerne` FOREIGN KEY (`pole_service`) REFERENCES `pole_service` (`id_service`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `fk_user_departement` FOREIGN KEY (`echelon`) REFERENCES `departement` (`id_departement`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user_service` FOREIGN KEY (`service`) REFERENCES `pole_service` (`id_service`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
