-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 03 Mai 2016 à 10:17
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `accorderietestcase`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` bigint(20) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `type_id` int(11) NOT NULL,
  `date_post` date NOT NULL,
  `date_limite` date NOT NULL,
  `temps_requis` int(100) NOT NULL,
  `demande` tinyint(1) NOT NULL,
  `libelle_categorie` varchar(200) NOT NULL,
  `signalee` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` bigint(20) NOT NULL,
  `id_accepteur` int(100) DEFAULT '0',
  `annonceValide` varchar(3) NOT NULL DEFAULT 'non',
  `statut` varchar(25) NOT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`id`, `titre`, `description`, `type_id`, `date_post`, `date_limite`, `temps_requis`, `demande`, `libelle_categorie`, `signalee`, `user_id`, `id_accepteur`, `annonceValide`, `statut`, `archive`) VALUES
(132, 'Garde d\'enfant', 'Je peux garder vos enfants pour vous laisser la soirée de libre !', 15, '2016-03-14', '2016-03-31', 4, 1, '', 0, 2, 3, 'oui', '', 1),
(133, 'Aide au ménage', 'Je peux faire votre ménage', 16, '2016-03-14', '2016-04-09', 2, 1, '', 0, 2, 3, 'oui', '', 1),
(134, 'Aide pour les cours', 'Je peux vous aider pour vos cours de chimie et physique jusqu\'au niveau terminale', 1, '2016-03-14', '2016-03-31', 2, 1, '', 1, 2, 274, 'oui', '', 0),
(135, 'Déménagement', 'Je déménage et j\'ai besoin d\'aide s\'il vous plaît !', 12, '2016-03-14', '2016-03-26', 5, 0, '', 0, 2, 3, 'oui', '', 1),
(136, 'Garde d\'enfant', 'Qui pour garder mon gamin svp ?', 15, '2016-03-14', '2016-03-19', 1, 0, '', 0, 3, 7, 'oui', '', 1),
(137, 'Donne cours de yoga', 'Je donne des cours de yoga', 14, '2016-03-14', '2016-03-30', 1, 1, '', 0, 2, 3, 'oui', '', 1),
(138, 'Zumba', 'Donne cours Zumba !', 13, '2016-03-14', '2016-03-31', 2, 1, '', 0, 2, 3, 'oui', '', 1),
(139, 'Aide pour les cours', 'Aide pour vos cours de primaire', 1, '2016-03-14', '2016-03-30', 2, 1, '', 0, 2, 0, 'oui', '', 0),
(140, 'Offre mon aide', 'je vous offre mon aide', 1, '2016-03-14', '2016-03-31', 3, 1, '', 0, 2, 0, 'oui', '', 0),
(141, 'Offre', 'J\'offre à nouveau mon aide !', 3, '2016-03-14', '2016-03-30', 3, 1, '', 0, 2, 5, 'oui', '', 0),
(142, 'Offre again !', 'J\'offre mon aide en ménage cette fois', 16, '2016-03-14', '2016-03-23', 1, 1, '', 0, 2, 0, 'oui', '', 0),
(143, 'Garde d\'enfant', 'Je peux garder votre enfant un après midi', 15, '2016-03-16', '2016-03-31', 3, 1, '', 0, 3, 5, 'oui', '', 1),
(144, 'Aide pour les cours', 'Aidez moi s\'il vous plaît !', 1, '2016-03-16', '2016-03-31', 1, 0, '', 0, 3, 0, 'oui', '', 0),
(145, 'Déménagement', 'Bonjour !\r\nJe déménage ce week end et j\'aurais besoin d\'aide ! \r\nMerci !', 12, '2016-03-16', '2016-03-19', 4, 0, '', 0, 2, 4, 'oui', '', 1),
(146, 'J\'ai besoin d\'aide !', 'Je suis nulle en maths et j\'aurais besoin d\'aide s\'il vous plaît ! Je suis niveau Terminale S.\r\nMerci !', 1, '2016-03-16', '2016-03-27', 2, 0, '', 0, 5, 2, 'oui', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `libelle` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`) VALUES
(1, '0');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id` bigint(20) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `id_categorie` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`id`, `libelle`, `id_categorie`) VALUES
(1, 'Accompagnement comptabilité', 1),
(2, '', 0),
(3, '', 0),
(4, '', 0),
(5, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `competences_users`
--

CREATE TABLE `competences_users` (
  `users.id` bigint(20) NOT NULL,
  `competences.id` bigint(20) NOT NULL,
  `description_competence` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(11) NOT NULL,
  `annonce_id` bigint(20) NOT NULL,
  `offreur_id` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evaluations`
--

INSERT INTO `evaluations` (`id`, `annonce_id`, `offreur_id`, `note`) VALUES
(9, 106, 136, 7),
(10, 110, 137, 9),
(11, 111, 137, 8),
(12, 119, 136, 8),
(13, 115, 138, 9),
(14, 131, 136, 10),
(15, 132, 3, 8),
(16, 133, 3, 10),
(17, 135, 3, 6),
(18, 137, 3, 10),
(19, 136, 7, 10),
(20, 138, 3, 7),
(21, 143, 5, 7),
(22, 145, 4, 9);

-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

CREATE TABLE `parametres` (
  `id` int(5) NOT NULL,
  `limiteTemp` int(5) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `parametres`
--

INSERT INTO `parametres` (`id`, `limiteTemp`) VALUES
(1, 50);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `libelle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`id`, `libelle`) VALUES
(-1, ''),
(1, 'Soutien Scolaire'),
(2, 'Mécanique'),
(3, 'Plomberie'),
(4, 'Dog Sitter'),
(5, 'Autres'),
(12, 'Déménagement'),
(13, 'Cours de Danse'),
(14, 'Cours de Yoga'),
(15, 'Babysitting'),
(16, 'Ménage'),
(17, 'Jardinage'),
(29, 'Cours de musique');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `mail` varchar(100) NOT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `code_postal` int(5) UNSIGNED ZEROFILL NOT NULL,
  `ville` varchar(100) NOT NULL,
  `telephone` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `identite` varchar(255) NOT NULL,
  `presentation` varchar(140) DEFAULT NULL,
  `question_secrete` varchar(500) NOT NULL,
  `reponse_secrete` varchar(100) NOT NULL,
  `credit_temps` int(11) NOT NULL DEFAULT '0',
  `role` varchar(20) NOT NULL,
  `offre_de_bienvenue` varchar(3) NOT NULL DEFAULT 'non',
  `created` datetime NOT NULL,
  `evaluation_id` int(11) NOT NULL,
  `bloquer` tinyint(1) NOT NULL,
  `favoriteType` int(3) DEFAULT '0',
  `lastPost` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nom`, `prenom`, `date_naissance`, `mail`, `adresse`, `code_postal`, `ville`, `telephone`, `avatar`, `identite`, `presentation`, `question_secrete`, `reponse_secrete`, `credit_temps`, `role`, `offre_de_bienvenue`, `created`, `evaluation_id`, `bloquer`, `favoriteType`, `lastPost`) VALUES
(1, 'admin', '3340a8e06fa2c0adff99d2c411886b89971a5fba', 'admin', 'admin', '1866-01-01', 'info@exmple.org', 'admin', 00000, 'admin', 0100000000, 'avatar_default.png', '', 'Compte administrateur', '0', 'f887019040975579ec12578d5eb586981fc910ef', 3, 'admin', 'oui', '2016-03-11 15:28:18', 0, 0, 2, 1),
(2, 'Coralie', '534c89189af0d438b01f9fb8160c02b651a1791f', 'Reynier', 'Coralie', '1994-09-01', 'reynier.coralie94@gmail.com', '25 rue des lois', 31500, 'Toulouse', 0102030405, 'avatar_default.png', '', 'Une des développeurs de ce site', '0', 'f5bd35c901cb734e003093d9b89e3d3c6ade35e6', 3, 'admin', 'oui', '2016-03-11 08:50:32', 0, 0, 1, 1),
(3, 'Georges', 'feaa463ec6a8c0a1d7f654cee408d81ee267ddab', 'Martin', 'Georges', '1986-03-11', 'georges.martin@yopmail.com', '31 avenue de la liberté', 35000, 'Toulouse', 0607080901, 'avatar_default.png', '', 'Un visiteur, venu d\'ailleurs. Ohhhhhhhhh', '3', 'e61d028edefc476d35388ea6543c1c62ad33af8f', 0, '', 'oui', '2016-03-11 08:55:38', 0, 0, 4, 1),
(4, 'zizou', '21ae28cd3c089e044e7acfabf124e0cd28ce4795', 'zazou', 'zizou', '2016-03-11', 'zizou@yopmai.com', '', 75000, 'Paris', NULL, 'avatar_user_4.png', '', '', '0', '1fc3439fcde26c36d387380f497706a85400c36f', 6, 'admin', 'oui', '2016-03-11 09:19:42', 0, 0, 4, 1),
(5, 'Marilyn', '3997c38633bb58b83402a7f4ce6f85143039c16c', 'Monroe', 'Marilyn', '1973-03-11', 'marilyn.monroe@azeazeazemail.com', '29 rue des oliviers', 31000, 'Toulouse', 0102050607, 'avatar_default.png', '', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '1', '5b2b86db260d26caedc2566044beb60c8374b357', -2, '', 'oui', '2016-03-11 10:59:04', 0, 0, 10, 1),
(6, 'admin1', '73d48d6f3ddcc216f3b7ec1781efc873adf02c73', 'hassan', 'fatouma', '2016-03-19', 'f.hassanh4@gmail.com', '', 31400, 'Toulouse', NULL, 'avatar_default.png', '', '', '1', '60bdf805e983387a0ce2c0d36f918cddc0de36f3', 3, 'admin', 'oui', '2016-03-14 08:21:04', 0, 0, 12, 1),
(7, 'azerty', '5b2b86db260d26caedc2566044beb60c8374b357', 'azerty', 'azerty', '2016-03-14', 'azerty@azerty.azerty', 'azerty', 00000, 'azerty', 0500000000, 'avatar_default.png', '', 'azertyazertyazertyazertyazertyazertyazertyazertyazertyazertyazertyazertyazertyazertyazertyazertyazertyazertyazertyazertyazertyazertyazertyaz', '1', '5b2b86db260d26caedc2566044beb60c8374b357', 3, 'admin', 'oui', '2016-03-14 08:48:42', 0, 0, 8, 1),
(79, 'Dany', '4f9f209466d44d6bd3777df0cbb0fbb69963cd63', 'Daniel', 'Balavoine', '1952-02-05', 'daniel.balavoine@yopmail.com', '', 69002, 'Lyon', NULL, 'avatar_default.png', '', '', '0', '1fc3439fcde26c36d387380f497706a85400c36f', 3, '', 'oui', '2016-03-14 11:09:05', 0, 0, 1, 1),
(86, 'TestInscription', '40cd9f49c77ab13ad440b1b384b427f6c4fcc0b0', 'TestInscription', 'TestInscription', '2000-03-14', 'TestInscription@yopmail.com', 'azer231', 12345, 'Toulouse', 0102030405, 'avatar_default.png', '', 'sgiohazourvhiopvnauioerhvauisdv auioebvyio zehfqk', '1', '5b2b86db260d26caedc2566044beb60c8374b357', 0, '', 'oui', '2016-03-14 11:29:56', 0, 0, 1, 1),
(91, 'pascale', 'f7237c9508dc34103b7f736c9986f57bb2d454b3', 'Raspaud', 'Pascale', '1975-08-14', 'p.raspaud@yopmail.com', '', 31000, 'Toulouse', NULL, 'avatar_default.png', '', '', '0', '1fc3439fcde26c36d387380f497706a85400c36f', 0, '', 'oui', '2016-03-14 11:39:15', 0, 0, NULL, 1),
(95, 'linaida', 'e5e5099d3e5608e4dd56b4e2f2a76d054daa6ab0', 'Navarro', 'Linda', '1989-09-10', 'navarro.linda66@gmail.com', '', 31078, 'Toulouse', NULL, 'avatar_user_95.png', '', '', '0', '1fc3439fcde26c36d387380f497706a85400c36f', 0, '', 'oui', '2016-03-14 11:44:09', 0, 0, 6, 1),
(129, 'batman', '061500d062ee0c4cfe684edc57319ca663f3db84', 'wayne', 'bruce', '2016-03-08', 'batman@yopmail.com', '5 Traverse de Vinça', 66320, 'Agen', 0603264875, 'avatar_user_129.jpg', '', '', '1', '6ce1f4dddcc1088050792206d6b8a895cb43bda8', 3, '', 'oui', '2016-03-16 16:54:04', 0, 0, 1, 1),
(274, 'michel', '2a2b53702175e0e8fd32bd1f0c318595d4ebaf15', 'blanc', 'michel', '1955-04-04', 'mimi@mailmail.com', '12 rue des palmiers', 31000, 'toulouse', 0647251436, 'avatar_user_1459764061.png', '', 'bonjour, je m\'appel michel et je suis content.\r\nj\'aime beaucoup la plomberie', '1', '2a2b53702175e0e8fd32bd1f0c318595d4ebaf15', 3, '', 'oui', '2016-04-04 12:01:01', 0, 0, 3, 1),
(276, 'testCo', '4423b2fa3bfb2b882cf14985c50e3c11bf35a9b8', 'testCo', 'testCo', '1986-04-05', 'testCo@yopmail.com', '', 31000, 'Toulouse', NULL, 'avatar_default.png', '', '', '0', '1fc3439fcde26c36d387380f497706a85400c36f', 3, '', 'oui', '2016-04-05 12:23:40', 0, 1, NULL, 1),
(281, 'admin', '3340a8e06fa2c0adff99d2c411886b89971a5fba', 'admin', 'admin', '1866-01-01', 'info@exmple.org', 'admin', 00000, 'admin', 0100000000, 'avatar_default.png', '', 'Compte administrateur', '0', 'f887019040975579ec12578d5eb586981fc910ef', 3, 'admin', 'oui', '2016-03-11 15:28:18', 0, 0, 2, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `id_accepteur` (`id_accepteur`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `competences_users`
--
ALTER TABLE `competences_users`
  ADD PRIMARY KEY (`users.id`,`competences.id`);

--
-- Index pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `annonce_id` (`annonce_id`),
  ADD KEY `user_id` (`annonce_id`),
  ADD KEY `offreur_id` (`offreur_id`),
  ADD KEY `annonce_id_2` (`annonce_id`);

--
-- Index pour la table `parametres`
--
ALTER TABLE `parametres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluation_id` (`evaluation_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `parametres`
--
ALTER TABLE `parametres`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
