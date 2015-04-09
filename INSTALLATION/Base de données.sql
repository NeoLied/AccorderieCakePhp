-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 09 Avril 2015 à 10:30
-- Version du serveur: 5.5.41
-- Version de PHP: 5.4.39-0+deb7u2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `accorderie`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE IF NOT EXISTS `annonces` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `type` varchar(32) NOT NULL,
  `date_post` date NOT NULL,
  `temps_requis` int(100) NOT NULL,
  `demande` tinyint(1) NOT NULL,
  `libelle_categorie` varchar(200) NOT NULL,
  `signalee` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` bigint(20) NOT NULL,
  `id_accepteur` bigint(20) NOT NULL,
  `annonceValide` varchar(3) NOT NULL DEFAULT 'non',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`id`, `titre`, `description`, `type`, `date_post`, `temps_requis`, `demande`, `libelle_categorie`, `signalee`, `user_id`, `id_accepteur`, `annonceValide`) VALUES
(16, 'soutien scolaire', 'toutes matières primaire', '', '2015-04-07', 2, 1, '', 0, 15, 16, 'oui'),
(17, 'Poom Poom tchak faisons de la musique', 'Je suis membre honorifique de l''orchestre national de claquette turque du Capitole et je vous offre d''apprendre cet art ancestrale !', '', '2015-04-08', 5, 1, '', 0, 16, 15, 'oui'),
(19, 'Besoin réparation voiture', 'Bonjour,\r\nJe recherche une personne pour fermer ma portière svp.\r\nMerci ! ', 'Accompagnement comptabilité', '2015-04-08', 1, 0, '', 0, 18, 11, 'oui'),
(20, 'Test validation', 'Nous testons la validation', 'Accompagnement comptabilité', '2015-04-08', 2, 1, '', 0, 18, 0, 'oui'),
(23, 'annonce-demo', 'lorem ipsum', 'Accompagnement comptabilité', '2015-04-08', 1, 0, '', 0, 20, 11, 'oui'),
(24, 'test-validation', 'lorem ipsum', 'Accompagnement comptabilité', '2015-04-08', 2, 1, '', 0, 11, 0, 'oui'),
(25, 'Test-annonce-demo', 'Nous faisons un test', 'Accompagnement comptabilité', '2015-04-08', 3, 1, '', 0, 20, 11, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`) VALUES
(1, 'Administration/Emploi/Etude');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE IF NOT EXISTS `competences` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `id_categorie` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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

CREATE TABLE IF NOT EXISTS `competences_users` (
  `users.id` bigint(20) NOT NULL,
  `competences.id` bigint(20) NOT NULL,
  `description_competence` varchar(500) NOT NULL,
  PRIMARY KEY (`users.id`,`competences.id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `mail` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `code_postal` int(5) unsigned zerofill NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` int(10) unsigned zerofill NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `identite` varchar(255) NOT NULL,
  `presentation` varchar(1500) NOT NULL,
  `question_secrete` varchar(500) NOT NULL,
  `reponse_secrete` varchar(255) NOT NULL,
  `credit_temps` int(11) NOT NULL DEFAULT '0',
  `role` varchar(20) NOT NULL,
  `offre_de_bienvenue` varchar(3) NOT NULL DEFAULT 'non',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nom`, `prenom`, `date_naissance`, `mail`, `adresse`, `code_postal`, `ville`, `telephone`, `avatar`, `identite`, `presentation`, `question_secrete`, `reponse_secrete`, `credit_temps`, `role`, `offre_de_bienvenue`) VALUES
(11, 'administrateur', '445aa7cb5cda4cfa59939033c9ba801d4acfa910', 'administrateur', 'administrateur', '2015-03-24', 'titi@titi.fr', 'administrateur', 31255, 'administrateur', 0102030405, '1427208149BigBoss small.png', '', 'administrateuradministrateuradministrateuradministrateuradministrateuradministrateur', '0', '235fb3e7ec2e83c9c1da5932e4675cab319789b3', 5, 'admin', 'oui'),
(15, 'Auriane L', '45f9a2e49084297278228580e5434f721cbbb44a', 'Linarès', 'Auriane', '1984-01-14', 'auriane.linares@hotmail.fr', '61 rue du 10 avril', 31500, 'Paris', 0619162757, '14283871371504032_10152483308964128_702928015_n.jpg', '', 'Toulouse, Petits Débrouillards, Fifigrot, Ile Légale, Galline, Oeil dans le Bazart, Marmite !', '1', '96d2aa089abdbc3cb4058d39021958152fc1896e', 3, '', 'oui'),
(16, 'tariq', 'ecf7cc6b348bd51e28969c06d7571bed456053c5', 'Demmou', 'Tariq', '1990-02-16', 't.demmou@debrouillards.org', '27 rue pouzonville', 31000, 'Toulouse', 0699553514, '14284883491507686_10203526406304827_1276848174_n.jpg', '', '*biip* *baap* *beep* *boop* blablablablablablablablablablablablablabla', '0', '7d57da2148769c59540848cf5913208ab674bfee', 11, '', 'oui'),
(20, 'demonstration', '191b93a43b60da0a51da666bc4b8248eb5c20bac', 'demonstration', 'demonstration', '1996-04-08', 'demonstration@demo.fr', '8 rue de la demo', 98745, 'demonstration land', 0657894563, '1428511605handshake.png', '', 'demonstration demonstration demonstration demonstration', '0', '64c12bda52790a4c0228506e88fbb53e1dd61fd2', 5, '', 'oui');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
