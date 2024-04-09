-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 08 mars 2024 à 17:04
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `affecter`
--

CREATE TABLE `affecter` (
  `id` int NOT NULL,
  `id_machine` int DEFAULT NULL,
  `id_utilisateur` int DEFAULT NULL,
  `date_d_affectation` date DEFAULT NULL,
  `document_de_decharge` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `equipements`
--

CREATE TABLE `equipements` (
  `id` int NOT NULL,
  `id_machine` int DEFAULT NULL,
  `etat` varchar(255) DEFAULT NULL,
  `emplacement` varchar(255) DEFAULT NULL,
  `date_de_derniere_maintenance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `machines`
--

CREATE TABLE `machines` (
  `id` int NOT NULL,
  `code_interne` varchar(50) DEFAULT NULL,
  `numero_de_serie` varchar(255) DEFAULT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `marque` varchar(50) DEFAULT NULL,
  `ram` varchar(10) DEFAULT NULL,
  `disque_dur` varchar(10) DEFAULT NULL,
  `date_d_achat` date DEFAULT NULL,
  `cout` decimal(10,2) DEFAULT NULL,
  `etat` varchar(255) DEFAULT NULL,
  `date_de_modification` date DEFAULT NULL,
  `date_acquisition` varchar(20) DEFAULT NULL,
  `processeur` varchar(30) DEFAULT NULL,
  `taille_ecran` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `modifications`
--

CREATE TABLE `modifications` (
  `id` int NOT NULL,
  `id_machine` int DEFAULT NULL,
  `type_de_modification` varchar(255) DEFAULT NULL,
  `date_de_modification` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `reparations`
--

CREATE TABLE `reparations` (
  `id` int NOT NULL,
  `id_machine` int DEFAULT NULL,
  `nature_du_probleme` varchar(255) DEFAULT NULL,
  `date_de_signalement` date DEFAULT NULL,
  `etat_de_la_reparation` varchar(255) DEFAULT NULL,
  `id_technicien` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `techniciens`
--

CREATE TABLE `techniciens` (
  `id` int NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(80) DEFAULT NULL,
  `sexe` varchar(15) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `poste` varchar(100) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_clt` int NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `sexe` varchar(12) DEFAULT NULL,
  `departement` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `poste` varchar(50) DEFAULT NULL,
  `Statut` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `mot_passe` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_clt`, `nom`, `prenom`, `sexe`, `departement`, `contact`, `poste`, `Statut`, `mot_passe`) VALUES
(4, 'FOKOU', 'JACQUES DUCLAIR', 'Masculin', 'Service information', '(+237)670612489', 'D&amp;eacute;veloppement web', 'Administrateur', '$2y$10$9Ih1B0KDr2c5zRRLbKmY3.IXpM8LTdJx7XpSNw.ubZzjI6839m4mW'),
(6, '  Tueyum', 'Leticia', 'Feminin', 'responsable laboratoire', '657091242', 'informaticienne', NULL, '$2y$10$PRzWZtJXEa1KUc2gaFwLxeIJ5Wxqqx5lIbd0mqXSp8O0yeS5Ff70C'),
(7, 'Tueyum', 'Merveille ', 'Feminin', 'responsable laboratoire', '657091242', 'informaticienne', NULL, '$2y$10$sV4JleI.JLgn3IGTOd6HYO2LYwop5hLzUP8PmBvvtMdEZ047MY8MS');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affecter`
--
ALTER TABLE `affecter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_machine` (`id_machine`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `equipements`
--
ALTER TABLE `equipements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_machine` (`id_machine`);

--
-- Index pour la table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modifications`
--
ALTER TABLE `modifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_machine` (`id_machine`);

--
-- Index pour la table `reparations`
--
ALTER TABLE `reparations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_machine` (`id_machine`),
  ADD KEY `id_technicien` (`id_technicien`);

--
-- Index pour la table `techniciens`
--
ALTER TABLE `techniciens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_clt`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affecter`
--
ALTER TABLE `affecter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `equipements`
--
ALTER TABLE `equipements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `modifications`
--
ALTER TABLE `modifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reparations`
--
ALTER TABLE `reparations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `techniciens`
--
ALTER TABLE `techniciens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_clt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affecter`
--
ALTER TABLE `affecter`
  ADD CONSTRAINT `affecter_ibfk_1` FOREIGN KEY (`id_machine`) REFERENCES `machines` (`id`),
  ADD CONSTRAINT `affecter_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_clt`);

--
-- Contraintes pour la table `equipements`
--
ALTER TABLE `equipements`
  ADD CONSTRAINT `equipements_ibfk_1` FOREIGN KEY (`id_machine`) REFERENCES `machines` (`id`);

--
-- Contraintes pour la table `modifications`
--
ALTER TABLE `modifications`
  ADD CONSTRAINT `modifications_ibfk_1` FOREIGN KEY (`id_machine`) REFERENCES `machines` (`id`);

--
-- Contraintes pour la table `reparations`
--
ALTER TABLE `reparations`
  ADD CONSTRAINT `reparations_ibfk_1` FOREIGN KEY (`id_machine`) REFERENCES `machines` (`id`),
  ADD CONSTRAINT `reparations_ibfk_2` FOREIGN KEY (`id_technicien`) REFERENCES `techniciens` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
