-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 09 Février 2016 à 13:40
-- Version du serveur :  5.5.46-0+deb8u1
-- Version de PHP :  5.6.14-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `accorderieTest`
--

-- --------------------------------------------------------
--
-- Structure de la table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
`id` int(11) NOT NULL,
  `libelle` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `mail` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `code_postal` int(5) unsigned zerofill NOT NULL,
  `ville` varchar(100) NOT NULL,
  `telephone` int(10) unsigned zerofill NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `identite` varchar(255) NOT NULL,
  `presentation` varchar(140) NOT NULL,
  `question_secrete` varchar(500) NOT NULL,
  `reponse_secrete` varchar(100) NOT NULL,
  `credit_temps` int(11) NOT NULL DEFAULT '0',
  `role` varchar(20) NOT NULL,
  `offre_de_bienvenue` varchar(3) NOT NULL DEFAULT 'non',
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


--
-- Structure de la table `annonces`
--

CREATE TABLE IF NOT EXISTS `annonces` (
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
  `id_accepteur` int(100) DEFAULT NULL,
  `annonceValide` varchar(3) NOT NULL DEFAULT 'non',
  `statut` varchar(25) NOT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `libelle` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE IF NOT EXISTS `competences` (
`id` bigint(20) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `id_categorie` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `competences_users`
--

CREATE TABLE IF NOT EXISTS `competences_users` (
  `users.id` bigint(20) NOT NULL,
  `competences.id` bigint(20) NOT NULL,
  `description_competence` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
 ADD PRIMARY KEY (`id`), ADD KEY `type_id` (`type_id`), ADD KEY `type_id_2` (`type_id`), ADD KEY `type_id_3` (`type_id`), ADD KEY `id_accepteur` (`id_accepteur`), ADD KEY `type_id_4` (`type_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `competences_users`
--
ALTER TABLE `competences_users`
 ADD PRIMARY KEY (`users.id`,`competences.id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
ADD CONSTRAINT `fk_type_id` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 09 Février 2016 à 13:40
-- Version du serveur :  5.5.46-0+deb8u1
-- Version de PHP :  5.6.14-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `accorderieTest`
--

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`id`, `titre`, `description`, `type_id`, `date_post`, `date_limite`, `temps_requis`, `demande`, `libelle_categorie`, `signalee`, `user_id`, `id_accepteur`, `annonceValide`, `statut`, `archive`) VALUES
(28, 'Cours de maths', 'J''ai du temps à donner !', 1, '2016-01-27', '2016-02-09', 1, 1, '', 0, 29, 11, 'oui', '', 1),
(29, 'Aide pour demenager', 'Je suis présent pour aider', 5, '2016-01-27', '2016-02-23', 3, 1, '', 0, 29, 41, 'oui', '', 0),
(40, 'nouveau', 'test date normale', 14, '2016-01-28', '2016-01-31', 0, 0, '', 0, 11, 34, 'oui', '', 0),
(41, 'Stage de Danse', 'Bonjour,\r\n\r\nDans le cadre de la journée des danses du monde, je donne des cours de danse gratuits du 1er Février au 3 Février 2016 de 16h00 à 18h00 tous les jours.', 15, '2016-01-28', '2016-02-03', 5, 0, '', 0, 31, 76, 'oui', '', 0),
(42, 'propose cours de langue étrangère', 'je peux vous offrir 2 heures de cours de langue anglaise.', 1, '2016-01-28', '2016-02-03', 1, 0, '', 0, 32, 0, 'oui', '', 0),
(60, 'Déménagement au Capitole', 'Je viens vous voir paniqué car suite à un problème avec mes anciens déménageurs, je suis actuellement dans une situation désespérée c''est pour cela que j''en appelle à votre aide si vous le voulez bien. Le déménagement s''effectueras le 01 Février 2016 à 14h00 !!! Merci encore de votre soutien.', 12, '2016-02-15', '2016-02-15', 5, 0, '', 0, 33, 11, 'oui', '', 0),
(66, 'test fghfghfghfghfgh', 'testfghfghfghfghfgh', 13, '2016-02-04', '2016-02-11', 1, 0, '', 0, 34, 11, 'oui', '', 1),
(68, 'test de validation pour se désister ', 'test de validation pour se désister ', 1, '2016-02-04', '2016-02-18', 3, 0, '', 0, 34, 11, 'oui', '', 1),
(69, 'Test Date urgente', 'Test Date urgente Test Date urgente', 3, '2016-02-04', '2016-02-06', 1, 0, '', 0, 21, 41, 'oui', '', 1),
(71, 'Test date normale', 'Test date normale Test date normale', 17, '2016-02-04', '2016-02-11', 3, 0, '', 0, 21, 34, 'oui', '', 0),
(73, 'test de validation pour se désister  2', 'test de validation pour se désister  2', 17, '2016-02-04', '2016-02-18', 2, 0, '', 0, 34, 0, 'oui', '', 0),
(78, 'J''ai besoin d''aide !', 'Help ! J''ai besoin d''aide pour déménager mes meubles !', 12, '2016-02-04', '2016-02-06', 3, 0, '', 0, 41, 11, 'oui', '', 1),
(79, 'TEST CLOTURER', 'TEST CLOTURER\r\nTEST CLOTURER', 15, '2016-02-04', '2016-02-05', 1, 0, '', 0, 41, 21, 'oui', '', 1),
(84, 'testestestes', 'testestestsetsetsetsets', 12, '2016-02-04', '2016-02-11', 2, 0, '', 0, 21, 0, 'oui', '', 0),
(85, 'zegryaerhserthetrh', 'zerhzrtjhner', 14, '2016-02-04', '2016-02-24', 1, 0, '', 0, 41, 34, 'oui', '', 1),
(86, 'Test mail', 'Test mailTest mailTest mailTest mailTest mail', 13, '2016-02-04', '2016-02-24', 1, 0, '', 0, 41, 11, 'oui', '', 0),
(87, 'test mail 2', 'test mail 2', 5, '2016-02-04', '2016-02-19', 3, 0, '', 0, 41, 0, 'oui', '', 0),
(88, 'CORALIE', 'CORALIE', 5, '2016-02-04', '2016-02-20', 0, 0, '', 0, 45, 21, 'oui', '', 0),
(89, 'cuisine antillaise', 'Du boudin, du lambi, des accras et du rhum arrangé le tout fait maison !', 5, '2016-02-04', '2016-02-13', 3, 0, '', 0, 47, 30, 'oui', '', 1),
(90, 'Babysitting', 'Cherche babysitter (Femme de préference) qui pourrait surveiller mes 4 enfants le temps d''une soirée le 26 Février.', 15, '2016-02-08', '2016-02-26', 4, 0, '', 0, 64, 21, 'oui', '', 1),
(91, 'Ma premiere demande', 'Je test les demandes', 5, '2016-02-08', '2016-02-25', 4, 0, '', 0, 11, NULL, 'non', '', 0),
(92, 'Deuxieme demande', 'Voici ma deuxieme demande', 17, '2016-02-08', '2016-02-29', 2, 0, '', 0, 11, NULL, 'non', '', 0),
(93, 'Cours de maths', 'test', 17, '2016-02-08', '2016-02-26', 1, 0, '', 0, 11, NULL, 'non', '', 0),
(94, 'Récupérer mes enfants à l''école', 'J''ai besoin de quelqun qui pourra récupérer mes enfants à leur etablissement scolaire', 5, '2016-02-08', '2016-02-10', 2, 0, '', 0, 64, 33, 'oui', '', 1),
(98, '..................................................', '........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................', 17, '2016-02-09', '0000-00-00', 2147483647, 0, '', 0, 76, 11, 'oui', '', 1),
(99, 'antoine fait chié', 'antoine fzit vraiment chié', 5, '2016-02-09', '2016-02-10', 3, 0, '', 0, 11, 0, 'oui', '', 1),
(100, 'JE TE BAISE', 'JE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAISEJE TE BAIS', 5, '2016-02-09', '2016-02-10', -2147483648, 0, '', 0, 76, 79, 'non', '', 1);

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`) VALUES
(1, 'Administration/Emploi/Etude');

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`id`, `libelle`, `id_categorie`) VALUES
(1, 'Accompagnement comptabilité', 1),
(2, '', 0),
(3, '', 0),
(4, '', 0),
(5, '', 0);

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`id`, `libelle`) VALUES
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
(17, 'Jardinage');

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nom`, `prenom`, `date_naissance`, `mail`, `adresse`, `code_postal`, `ville`, `telephone`, `avatar`, `identite`, `presentation`, `question_secrete`, `reponse_secrete`, `credit_temps`, `role`, `offre_de_bienvenue`, `created`) VALUES
(11, 'administrateur', '445aa7cb5cda4cfa59939033c9ba801d4acfa910', 'administrateur', 'administrateur', '2015-03-24', 'info@example.com', 'administrateur', 31255, 'administrateur', 0102030405, 'avatar_test.png', '', 'administrateuradministrateuradministrateuradministrateuradministrateuradministrateur', '0', '235fb3e7ec2e83c9c1da5932e4675cab319789b3', 2147483646, 'admin', 'oui', '0000-00-00 00:00:00'),
(21, 'TeSt', 'c7321120f513ee9daf37de4b4c94e468296d28e7', 'NomTest', 'PrenomTest', '1989-01-23', 'infi@example.com', '12 rue des palmiers', 12345, 'Test', 0102030405, 'E:\\wamp\\www\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'Je ne suis qu''une personne test... Je suis un test !', '1', '7ad4b449f881322bd78400fe90002d66ee441601', 4, 'admin', 'oui', '0000-00-00 00:00:00'),
(22, 'ABUSEabuseABUSEabuseABUSEabuseABUSEabuseABUSEabuse', 'e626a15d9985880ad77513d288898bd5fd864a43', 'ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-AB', 'ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-AB', '2016-12-31', 'ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE@abuse.AB', 'ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-AB', 00000, 'ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUS', 0100000000, 'E:\\wamp\\www\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABABUSE-abuse-ABUSE-abuse-ABUSE-abuse-ABUS', '0', '69465ab6b820856fbc4a37451fb7bfcc282b6f7e', 3, 'utilisateur', 'oui', '0000-00-00 00:00:00'),
(29, 'demandeur', '67a4a5bfca505e6c64c91243231d43bb313209a4', 'demandeur', 'demandeur', '1975-01-28', 'demandeur@demandeur.demandeur', 'demandeur', 99999, 'demandeur', 0102030405, 'E:\\wamp\\www\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'demandeurdemandeurdemandeurdemandeurdemandeurdemandeurdemandeurdemandeurdemandeurdemandeurdemandeurdemandeurdemandeurdemandeurdemandeurdeman', '1', '67a4a5bfca505e6c64c91243231d43bb313209a4', 4, 'utilisateur', 'oui', '2016-01-26 15:27:02'),
(30, 'offreur', '94d463fe6172f13a60d8bbe80115e8887e7a0708', 'offreur', 'offreur', '2016-01-26', 'offreur@offreur.offreur', 'offreur', 99999, 'offreur', 0102030405, '12345560_f1024.jpg', '', 'offreuroffreuroffreuroffreuroffreuroffreuroffreuroffreuroffreuroffreuroffreuroffreuroffreuroffreuroffreuroffreuroffreuroffreuroffreuroffreur', '1', '94d463fe6172f13a60d8bbe80115e8887e7a0708', 6, 'utilisateur', 'oui', '2016-01-26 15:27:30'),
(31, 'Hanina', '2c272718aac7f809195a209e33dfb3eedd21bce1', 'Mima', 'Hanina', '1990-03-19', 'haninamima@gmail.com', 'Rue de lacroix', 31400, 'Toulouse', 0667486979, 'C:\\wamp\\www\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'Je suis une très bonne prof d''arabe et je suis tout aussi sociable, j''aime me faire de nouveaux amis.', '1', '60bdf805e983387a0ce2c0d36f918cddc0de36f3', 1, '', 'oui', '2016-01-28 13:18:02'),
(32, 'Hanouna', '2c272718aac7f809195a209e33dfb3eedd21bce1', 'Mima', 'Hanina', '1889-01-19', 'f.hassanh4@gmail.com', '3 Rue de lacroix', 31400, 'Toulouse', 0667486978, 'C:\\wamp\\www\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'Je suis sociable, j''aime me faire des nouveaux amis, et je peux vous aider dans de nombreux domaines.', '1', '60bdf805e983387a0ce2c0d36f918cddc0de36f3', 3, '', 'oui', '2016-01-28 13:31:17'),
(33, 'marvinj', 'd5d7cd7017548cd227168572060f64e1510837c4', 'Janvier', 'Marvin', '1996-04-07', 'janvier.marvin@outlook.com', '20 rue de chez moi', 31500, 'Toulouse', 0652235685, 'C:\\wamp\\www\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'VERS L''INFINIE ET L''AU-DELAAAAAAAAAAAAAAAAAAAAAAA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! AHAHHAAHHAHAHA', '1', '5d632232d03a7bfd2c102f5119026ae1a2511afd', 0, 'admin', 'oui', '2016-01-28 14:44:56'),
(34, 'andy', '7a833bd210b6ef37917fab09869a04fcbe51d385', 'Andy', 'marie-jeanne', '1995-09-16', 'mariejeanneandy@gmail.com', '8 rue Bertrand CLAUZEL', 31500, 'TOULOUSE', 0696270907, 'C:\\wamp\\www\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'gzgzgkjsdfnczief fnzznfjkgzgzgkjsdfnczief fnzznfjkgzgzgkjsdfnczief fnzznfjkgzgzgkjsdfnczief fnzznfjkgzgzgkjsdfnczief fnzznfjkgzgzgkjsdfnczie', '0', 'd6f8edc5913d667f6d3bb845ce176906ad1a077e', -5, '', 'oui', '2016-01-28 14:48:48'),
(37, 'nyna', '66571596a3c50acf20ebaf736c857ed48512adfa', 'Said', 'Nyna', '2016-03-19', 'fa04ami@hotmail.com', '8 grande rue peace', 31400, 'Toulouse', 0645475880, 'C:\\wamp\\www\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjeeeeeeeeeeeeeeeeeeeeee suisssssssssssssssssssss unnnnnnnnnnnn', '0', '7461db4580baae3aa86aa0e9ad8e53696ffbbb2d', 0, '', 'non', '2016-01-31 19:04:26'),
(39, 'userr', '6412e4f02bde5fd7fbc532957ad3ad2b73236b0e', 'User', 'userr', '1998-03-01', 'f.hassanh4@hotmail.com', '8 rue louis', 31400, 'Toulouse', 0564757586, 'C:\\wamp\\www\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'serserserserserserserserserserserserserserserserserser', '1', 'b0fbd7dec80a8c634f702933fc2f4cc7493509b5', 3, '', 'oui', '2016-02-01 11:57:55'),
(40, 'linaida', 'e5e5099d3e5608e4dd56b4e2f2a76d054daa6ab0', 'linaida', 'linda', '2016-02-01', 'test@test.com', 'test', 12345, 'test', 0623154875, 'D:\\Lab\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', '0', '7ad4b449f881322bd78400fe90002d66ee441601', 0, '', 'non', '2016-02-01 20:46:23'),
(41, 'Coralie', '534c89189af0d438b01f9fb8160c02b651a1791f', 'Reynier', 'Coralie', '1994-09-01', 'reynier.coralie94@gmail.com', '29 rue des oliviers', 31000, 'Toulouse', 0102030405, '/var/www/html/beta/app/webroot/img/uploads/avatar.png', '', 'Juste une personne... Une simple personne...', '0', '5b2b86db260d26caedc2566044beb60c8374b357', -1, '', 'oui', '2016-02-04 14:05:34'),
(44, 'DevLinda', '900ba5ea56cd1588ca72f3e8db7e92e907608a7a', 'navarro', 'linda', '1997-02-04', 'dev.linda66@gmail.com', '15 rue des maisons', 65550, 'Perpignan', 0303030303, 'D:\\Lab\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'Quelques mots pour se présenter', '0', '1fc3439fcde26c36d387380f497706a85400c36f', 3, '', 'oui', '2016-02-04 14:29:05'),
(45, 'antoine', '82c761d0ee9d5df09e722f99717820cc439c0619', 'VARLAMOFF', 'antoine', '2016-02-04', '81antoine@gmail.com', '12 rue des palmiers', 00000, 'AZERTY', 0102030405, '/var/www/html/beta/app/webroot/img/uploads/avatar.png', '', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '1', '4ae39048595797be3dae690c9a70c64442cede86', 3, '', 'oui', '2016-02-04 15:52:09'),
(47, 'HervéDeMontpellier', 'd7e0c1a83e379545e36ccba9c4a3f052a1727121', 'leblanc', 'hervé', '1962-10-07', 'leblanc@irit.fr', '11 rue Jean Poncelet', 31500, 'Toulouse', 0608474793, '/var/www/html/beta/app/webroot/img/uploads/avatar.png', '', 'Je me présente, je m''appelle HenriJe voudrais bien réussir ma vie....', '1', '91cf3fb643a333504163343d410a828c1db16ce8', -10, '', 'oui', '2016-02-04 16:20:54'),
(49, 'herveleblanc', 'd7e0c1a83e379545e36ccba9c4a3f052a1727121', 'leblanc', 'herve', '1952-12-07', 'leblanc@irit.fr', 'autres', 66000, 'toulouse', 0601020304, '1454599385Logo-afm_telethon-H125.jpg', '', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', '0', '7ad4b449f881322bd78400fe90002d66ee441601', 0, '', 'oui', '2016-02-04 16:23:05'),
(57, 'TestAfterDemo', '21ae28cd3c089e044e7acfabf124e0cd28ce4795', '123456', '654321', '1999-02-08', 'test@test.fr', '29 rue des oliviers', 31000, 'Toulouse', 0102030405, '/var/www/html/beta/app/webroot/img/uploads/avatar.png', '', 'azertyuiopmlkjhgfdsqwxcvbn,;:!*ù$^=)àç_è-(''"é&²', '1', '5b2b86db260d26caedc2566044beb60c8374b357', 0, '', 'oui', '2016-02-08 10:25:36'),
(60, 'jeanAlfonse', '900ba5ea56cd1588ca72f3e8db7e92e907608a7a', 'jean', 'clause', '1997-02-08', 'jean-claude@gmail.com', 'testrue', 66500, 'testVille', 0606060666, 'D:\\Lab\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'Compte fake pour tester l inscription', '2', '1fc3439fcde26c36d387380f497706a85400c36f', 3, '', 'oui', '2016-02-08 10:28:48'),
(63, 'linda', '900ba5ea56cd1588ca72f3e8db7e92e907608a7a', 'test', 'test', '2016-02-08', 'test1@test.com', '5 Traverse de Vinça', 66320, 'Agen', 0603264875, 'D:\\Lab\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'TestTestTestTestTestTestTestTestTest', '0', '1fc3439fcde26c36d387380f497706a85400c36f', 3, '', 'oui', '2016-02-08 10:33:51'),
(64, 'marvinjanvier', '781c7e4987d080e8f3b7b0a48d390e426452a292', 'Janvier', 'Marvin', '1996-04-07', 'janvier.marvin@outlook.fr', '8 rue Bertrand Clauzel', 31500, 'Toulouse', 0696041572, 'C:\\wamp\\www\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'JanvierMarvin19 ans bientôt 20 !8 rue Bertrand ClauzelOriginaire de l''Ile aux Fleurs : La Martinique !!!', '1', 'abbf9567b6a79aad5e0e9b3256025021fb650c50', -3, '', 'oui', '2016-02-08 10:39:25'),
(73, 'TestInscription', '40cd9f49c77ab13ad440b1b384b427f6c4fcc0b0', 'qzgrer', 'Coralie', '1998-02-08', '13@13.fr', '29 rue des oliviers', 31000, 'adzdzfzfaza', 0564879521, '/var/www/html/beta/app/webroot/img/uploads/avatar.png', '', 'zrgkzeriosl rvgj eiog eiljg zeiogh zuoegho', '0', '5b2b86db260d26caedc2566044beb60c8374b357', 0, '', 'oui', '2016-02-08 11:21:00'),
(74, '', '', '', '', '0000-00-00', '', '', 00000, '', 0000000000, '', '', '', '', '', 0, '', 'non', '2016-02-08 13:16:04'),
(75, '', '', '', '', '0000-00-00', '', '', 00000, '', 0000000000, '', '', '', '', '', 0, '', 'non', '2016-02-08 13:16:47'),
(76, 'TestHervé', '46a04a0021e2642bfb4b97a7e2d736b3dd2f51c5', 'TestHervé', 'TestHervé', '1993-06-17', 'info@exmple.org', '12 rue des palmiers', 99999, 'TestHervé', 0102030405, '/var/www/html/beta/app/webroot/img/uploads/avatar.png', '', 'TestHervéTestHervéTestHervéTestHervéTestHervéTestHervéTestHervéTestHervéTestHervéTestHervéTestHervéTestHervéTestHervéTestHervéTestHervéTestH', '1', '46a04a0021e2642bfb4b97a7e2d736b3dd2f51c5', 4, '', 'oui', '2016-02-09 10:39:18'),
(77, 'fafa21', '72a28fba8a47ac9f21d88cb87c6a67802c13b517', 'Hama', 'Fafi', '1963-12-19', 'f.hasnh4@gmail.com', '8 rue louis leclers', 31400, 'toulouse', 0645475880, 'C:\\wamp\\www\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'vivelifevivelifevivelifevivelifevivelifevivelifevivelifevivelifevivelifevivelifevivelife', '0', '0fb7eb908e58d5b72a5420730c4675946b9350e6', 3, '', 'oui', '2016-02-09 11:13:54'),
(78, 'andy2', '7a833bd210b6ef37917fab09869a04fcbe51d385', 'andy2', 'Andy', '1995-02-19', 'mariejeanneandy2@gmail.com', 'Bassin Bleu Quartiers Desfarges', 97211, 'RIVIERE-PILOTE', 0696270907, 'C:\\wamp\\www\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'brefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbrefbref', '0', '17365ba827e1638f2fbc16e12cc8e855b754a504', 0, '', 'non', '2016-02-09 11:19:20'),
(79, 'andyandy2', '7a833bd210b6ef37917fab09869a04fcbe51d385', 'BITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITE', 'BITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITE', '1995-02-19', 'BITE@gmail.com', 'BITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITE', 97211, 'BITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITE', 0696270907, 'C:\\wamp\\www\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'BITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEv', '0', '17365ba827e1638f2fbc16e12cc8e855b754a504', -2147483645, '', 'oui', '2016-02-09 11:19:51'),
(80, 'Hanisia', '900ba5ea56cd1588ca72f3e8db7e92e907608a7a', 'Richie', 'nina', '1997-02-09', 'test_66500@yopmail.com', '15 rue des maisons', 31400, 'Toulouse', 0303030303, 'D:\\Lab\\AccorderieCakePhp\\app\\webroot\\img\\uploads\\avatar.png', '', 'TestTestTestTestTestTestTestTest', '0', '1fc3439fcde26c36d387380f497706a85400c36f', 0, '', 'oui', '2016-02-09 11:41:20'),
(81, '', '', '', '', '0000-00-00', '', '', 00000, '', 0000000000, '', '', '', '', '', 3, '', 'non', '2016-02-09 11:48:33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
