-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 28 mars 2022 à 09:06
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `biblio_logs`
--

CREATE TABLE `biblio_logs` (
  `ID_logs` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `user_ip_address` varchar(50) DEFAULT NULL,
  `user_action` varchar(50) DEFAULT NULL,
  `date_action` date DEFAULT NULL,
  `time_action` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `codeCl` varchar(10) NOT NULL,
  `libelleCl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classe`
--

--
-- Structure de la table `emprunter`
--

CREATE TABLE `emprunter` (
  `matricule` varchar(10) NOT NULL,
  `codeL` varchar(10) NOT NULL,
  `dateSortie` date DEFAULT NULL,
  `dateRetour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `matricule` varchar(10) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenoms` varchar(50) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `lieu` varchar(50) DEFAULT NULL,
  `sexe` varchar(1) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `CV` varchar(50) DEFAULT NULL,
  `codeCl` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `codeL` varchar(10) NOT NULL,
  `titreL` varchar(30) NOT NULL,
  `auteurL` varchar(50) NOT NULL,
  `genreL` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `userbiblio`
--

CREATE TABLE `userbiblio` (
  `userID` int(11) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenoms` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Index pour les tables déchargées
--

--
-- Index pour la table `biblio_logs`
--
ALTER TABLE `biblio_logs`
  ADD PRIMARY KEY (`ID_logs`),
  ADD KEY `FK_UserBiblio_BIBLIO_LOGS` (`user_ID`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`codeCl`),
  ADD UNIQUE KEY `UniqueLibelleCl` (`libelleCl`);

--
-- Index pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD PRIMARY KEY (`matricule`,`codeL`),
  ADD KEY `FK_LIVRE_EMPRUNTER` (`codeL`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`matricule`),
  ADD KEY `FK_ETUDIANT_CLASSE` (`codeCl`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`codeL`);

--
-- Index pour la table `userbiblio`
--
ALTER TABLE `userbiblio`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `UniqueEmail` (`e_mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `biblio_logs`
--
ALTER TABLE `biblio_logs`
  MODIFY `ID_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `userbiblio`
--
ALTER TABLE `userbiblio`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `biblio_logs`
--
ALTER TABLE `biblio_logs`
  ADD CONSTRAINT `FK_UserBiblio_BIBLIO_LOGS` FOREIGN KEY (`user_ID`) REFERENCES `userbiblio` (`userID`);

--
-- Contraintes pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD CONSTRAINT `FK_ETUDIANT_EMPRUNTER` FOREIGN KEY (`matricule`) REFERENCES `etudiant` (`matricule`),
  ADD CONSTRAINT `FK_LIVRE_EMPRUNTER` FOREIGN KEY (`codeL`) REFERENCES `livre` (`codeL`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_ETUDIANT_CLASSE` FOREIGN KEY (`codeCl`) REFERENCES `classe` (`codeCl`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
