-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 06 mai 2022 à 10:20
-- Version du serveur : 10.3.31-MariaDB-0+deb10u1
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `chassis`
--

CREATE TABLE `chassis` (
  `id` int(11) NOT NULL,
  `largeur` double NOT NULL,
  `longueur` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chassis`
--

INSERT INTO `chassis` (`id`, `largeur`, `longueur`) VALUES
(1, 5, 10),
(2, 5, 10),
(3, 5, 10),
(4, 5, 10),
(5, 5, 10),
(6, 5, 10),
(7, 5, 10),
(8, 5, 10),
(9, 5, 10),
(10, 5, 10),
(11, 5, 10),
(12, 10, 20),
(13, 10, 20);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `vehicule_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE `couleur` (
  `id` int(11) NOT NULL,
  `nom_couleur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `couleur`
--

INSERT INTO `couleur` (`id`, `nom_couleur`) VALUES
(1, 'rouge'),
(2, 'rouge'),
(3, 'bleu'),
(4, 'bleu'),
(5, 'bleu'),
(6, 'bleu'),
(7, 'bleu'),
(8, 'bleu'),
(9, 'rouge'),
(10, 'rouge'),
(11, 'rouge'),
(12, 'bleu'),
(13, 'vert'),
(14, 'jaune'),
(15, 'violet');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220324105008', '2022-03-24 14:37:39', 51),
('DoctrineMigrations\\Version20220324140024', '2022-03-24 15:00:34', 11),
('DoctrineMigrations\\Version20220324142353', '2022-03-24 15:24:00', 28),
('DoctrineMigrations\\Version20220324161357', '2022-03-24 17:17:33', 13),
('DoctrineMigrations\\Version20220324163029', '2022-03-24 17:30:36', 55),
('DoctrineMigrations\\Version20220324163929', '2022-03-24 17:39:33', 48),
('DoctrineMigrations\\Version20220405074814', '2022-04-05 09:48:36', 454),
('DoctrineMigrations\\Version20220405083734', '2022-04-05 10:37:44', 235),
('DoctrineMigrations\\Version20220405154455', '2022-04-05 17:45:04', 104);

-- --------------------------------------------------------

--
-- Structure de la table `moteur`
--

CREATE TABLE `moteur` (
  `id` int(11) NOT NULL,
  `energie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puissance` int(11) NOT NULL,
  `no_serie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `moteur`
--

INSERT INTO `moteur` (`id`, `energie`, `puissance`, `no_serie`) VALUES
(1, '10', 5, ''),
(2, '10', 10, ''),
(3, 'abc', 10, ''),
(4, 'abc', 10, ''),
(5, 'abc', 10, ''),
(6, 'abc', 10, '');

-- --------------------------------------------------------

--
-- Structure de la table `roue`
--

CREATE TABLE `roue` (
  `id` int(11) NOT NULL,
  `diametre` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roue`
--

INSERT INTO `roue` (`id`, `diametre`) VALUES
(1, 12),
(2, 13),
(3, 13),
(4, 13),
(5, 13),
(6, 13),
(7, 17),
(8, 15),
(9, 10),
(10, 26),
(11, 30),
(12, 31),
(13, 32),
(14, 34),
(15, 35),
(16, 36),
(17, 10);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id` int(11) NOT NULL,
  `chassis_id` int(11) DEFAULT NULL,
  `modele` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couleur_id` int(11) DEFAULT NULL,
  `moteur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id`, `chassis_id`, `modele`, `couleur_id`, `moteur_id`) VALUES
(1, 12, '123', NULL, NULL),
(2, 13, '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_roue`
--

CREATE TABLE `vehicule_roue` (
  `vehicule_id` int(11) NOT NULL,
  `roue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chassis`
--
ALTER TABLE `chassis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C74404554A4A3511` (`vehicule_id`);

--
-- Index pour la table `couleur`
--
ALTER TABLE `couleur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `moteur`
--
ALTER TABLE `moteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roue`
--
ALTER TABLE `roue`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_292FFF1D63EE729` (`chassis_id`),
  ADD KEY `IDX_292FFF1DC31BA576` (`couleur_id`),
  ADD KEY `IDX_292FFF1D6BF4B111` (`moteur_id`);

--
-- Index pour la table `vehicule_roue`
--
ALTER TABLE `vehicule_roue`
  ADD PRIMARY KEY (`vehicule_id`,`roue_id`),
  ADD KEY `IDX_A06E989D4A4A3511` (`vehicule_id`),
  ADD KEY `IDX_A06E989DBBF3D75F` (`roue_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chassis`
--
ALTER TABLE `chassis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `moteur`
--
ALTER TABLE `moteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `roue`
--
ALTER TABLE `roue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_C74404554A4A3511` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`id`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `FK_292FFF1D63EE729` FOREIGN KEY (`chassis_id`) REFERENCES `chassis` (`id`),
  ADD CONSTRAINT `FK_292FFF1D6BF4B111` FOREIGN KEY (`moteur_id`) REFERENCES `moteur` (`id`),
  ADD CONSTRAINT `FK_292FFF1DC31BA576` FOREIGN KEY (`couleur_id`) REFERENCES `couleur` (`id`);

--
-- Contraintes pour la table `vehicule_roue`
--
ALTER TABLE `vehicule_roue`
  ADD CONSTRAINT `FK_A06E989D4A4A3511` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A06E989DBBF3D75F` FOREIGN KEY (`roue_id`) REFERENCES `roue` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
