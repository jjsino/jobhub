-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Dim 16 Février 2014 à 20:19
-- Version du serveur: 5.5.35
-- Version de PHP: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `jobhub`
--

-- --------------------------------------------------------

--
-- Structure de la table `Activite`
--

CREATE TABLE IF NOT EXISTS `Activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `Activite`
--

INSERT INTO `Activite` (`id`, `libelle`) VALUES
(1, 'test_acitvity_1'),
(2, 'test_acitvity_2'),
(3, 'test_acitvity_3'),
(4, 'test_acitvity_4'),
(5, 'test_acitvity_5'),
(6, 'test_acitvity_6'),
(7, 'test_acitvity_7'),
(8, 'test_acitvity_8');

-- --------------------------------------------------------

--
-- Structure de la table `Administrateur`
--

CREATE TABLE IF NOT EXISTS `Administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compteUser_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FF8F2A304B7954BD` (`compteUser_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Administrateur`
--

INSERT INTO `Administrateur` (`id`, `compteUser_id`) VALUES
(1, 4),
(3, 7),
(4, 8),
(2, 9);

-- --------------------------------------------------------

--
-- Structure de la table `Article`
--

CREATE TABLE IF NOT EXISTS `Article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rubrique_id` int(11) NOT NULL,
  `img_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maj` date NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CD8737FAC06A9F55` (`img_id`),
  UNIQUE KEY `UNIQ_CD8737FA29C1004E` (`video_id`),
  KEY `IDX_CD8737FA3BD38833` (`rubrique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Article`
--

INSERT INTO `Article` (`id`, `rubrique_id`, `img_id`, `video_id`, `titre`, `etat`, `maj`, `contenu`) VALUES
(1, 1, NULL, NULL, 'test', '1', '2014-02-02', 'test content ');

-- --------------------------------------------------------

--
-- Structure de la table `Candidat`
--

CREATE TABLE IF NOT EXISTS `Candidat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `site_perso` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `niveau_etudes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `compteUser_id` int(11) NOT NULL,
  `sex` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `path_photo_profil` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_93C3D6274B7954BD` (`compteUser_id`),
  UNIQUE KEY `UNIQ_93C3D627A73F0036` (`ville_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `Candidat`
--

INSERT INTO `Candidat` (`id`, `nom`, `prenom`, `adresse`, `telephone`, `site_perso`, `niveau_etudes`, `code_postal`, `compteUser_id`, `sex`, `birthday`, `ville_id`, `path_photo_profil`) VALUES
(2, 'lastname', 'firstname', 'Champs-Elysées', NULL, NULL, NULL, 21000, 6, 'F', '2009-01-01 00:00:00', 1, 'Profil_Candidat_2.jpeg'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 46, NULL, NULL, NULL, NULL),
(11, 'JI', 'Jin', 'Grande Rue', NULL, NULL, NULL, 25000, 47, 'F', '2009-07-29 00:00:00', 3, 'Profil_Candidat_11.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `Candidature`
--

CREATE TABLE IF NOT EXISTS `Candidature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `motivation` longtext COLLATE utf8_unicode_ci NOT NULL,
  `candidat_id` int(11) NOT NULL,
  `offre_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_65A75C6F8D0EB82` (`candidat_id`),
  KEY `IDX_65A75C6FCFE419E2` (`cv_id`),
  KEY `IDX_65A75C6F4CC8505A` (`offre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `Candidature`
--

INSERT INTO `Candidature` (`id`, `date`, `motivation`, `candidat_id`, `offre_id`, `cv_id`, `etat`) VALUES
(8, '2014-02-10 13:58:10', 'dbrg', 2, 2, 2, 1),
(9, '2014-02-11 13:39:18', 'testetsq\r\nvnovn oe h\r\n\r\nn qoigfh uirgâ\r\n\r\nnv qçoiupfn augb nopù nvouiqpaeri nbq\r\nnvopizerng uipargn', 2, 1, 2, 2),
(10, '2014-02-11 17:24:50', 'I really want this job', 2, 4, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Competence`
--

CREATE TABLE IF NOT EXISTS `Competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `CV`
--

CREATE TABLE IF NOT EXISTS `CV` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maj` datetime NOT NULL,
  `candidat_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1885FAF88D0EB82` (`candidat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `CV`
--

INSERT INTO `CV` (`id`, `titre`, `maj`, `candidat_id`, `path`, `enabled`) VALUES
(1, 'test1664', '2014-02-07 15:26:18', 2, 'CV_2-20140207152618.pdf', 0),
(2, 'test86', '2014-02-07 15:41:43', 2, 'CV_2-20140207154143.pdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Domaine`
--

CREATE TABLE IF NOT EXISTS `Domaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `Domaine`
--

INSERT INTO `Domaine` (`id`, `libelle`) VALUES
(1, 'test_domaine_1'),
(2, 'test_domaine_2'),
(3, 'test_domaine_3');

-- --------------------------------------------------------

--
-- Structure de la table `Entreprise`
--

CREATE TABLE IF NOT EXISTS `Entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `raison_sociale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `fax` int(11) DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `site_web` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `compteUser_id` int(11) NOT NULL,
  `path_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4244F9B04B7954BD` (`compteUser_id`),
  KEY `IDX_4244F9B0A73F0036` (`ville_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Entreprise`
--

INSERT INTO `Entreprise` (`id`, `ville_id`, `nom`, `raison_sociale`, `contact_email`, `adresse`, `telephone`, `fax`, `code_postal`, `site_web`, `compteUser_id`, `path_logo`) VALUES
(1, 1, 'super entreprise', 'sarl', 'job@recrute.fr', 'Grande Rue', NULL, NULL, NULL, NULL, 5, 'Logo_Entreprise_1.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `Experience`
--

CREATE TABLE IF NOT EXISTS `Experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `fonction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entreprise` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `candidat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4ACDC2D38D0EB82` (`candidat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Experience`
--

INSERT INTO `Experience` (`id`, `date_debut`, `date_fin`, `fonction`, `entreprise`, `description`, `candidat_id`) VALUES
(1, '2013-01-03', '2013-10-10', 'Manager', 'Super Entreprise', 'Nice', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Formation`
--

CREATE TABLE IF NOT EXISTS `Formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidat_id` int(11) NOT NULL,
  `annee_debut` date NOT NULL,
  `annee_fin` date NOT NULL,
  `libelle_diplome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etablissement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diplome_obtenu` tinyint(1) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `niveau_etudes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C2B1A31C8D0EB82` (`candidat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Formation`
--

INSERT INTO `Formation` (`id`, `candidat_id`, `annee_debut`, `annee_fin`, `libelle_diplome`, `etablissement`, `diplome_obtenu`, `description`, `niveau_etudes`) VALUES
(4, 2, '2011-01-01', '2013-01-01', 'Master Informatique', 'UB', 1, 'Super', 'Bac+5');

-- --------------------------------------------------------

--
-- Structure de la table `Image`
--

CREATE TABLE IF NOT EXISTS `Image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `legende` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Offre`
--

CREATE TABLE IF NOT EXISTS `Offre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise_id` int(11) NOT NULL,
  `activite_id` int(11) DEFAULT NULL,
  `intitule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maj` datetime NOT NULL,
  `fonction_poste` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `domaine_id` int(11) DEFAULT NULL,
  `type_contrat` int(11) DEFAULT NULL,
  `salaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6E47A96BA4AEAFEA` (`entreprise_id`),
  KEY `IDX_6E47A96B9B0F88B1` (`activite_id`),
  KEY `IDX_6E47A96BA73F0036` (`ville_id`),
  KEY `IDX_6E47A96B4272FC9F` (`domaine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `Offre`
--

INSERT INTO `Offre` (`id`, `entreprise_id`, `activite_id`, `intitule`, `maj`, `fonction_poste`, `description`, `enabled`, `ville_id`, `domaine_id`, `type_contrat`, `salaire`) VALUES
(1, 1, 1, 'super offer', '2014-01-01 00:00:00', 'manager', 'test offer 1\r\ndoen ivup v\r\nvnoiqi nvuipq v \r\niouipn fezg', 1, 1, 2, 1, 3),
(2, 1, 1, 'super offer 2', '2014-01-01 00:00:00', 'technicien', 'test offer 2', 1, 3, 2, 4, 2),
(3, 1, 3, 'super offer 3', '2014-01-01 00:00:00', 'ingeneer', 'test offer 3', 0, 3, 1, 2, 4),
(4, 1, 7, 'super offer 4', '2009-01-01 00:00:00', 'Sous traité', 'firo nivfg\r\nqotj'' igzpohgn bj\r\nvgjzoi gjg', 1, 4, 1, 5, 1),
(5, 1, 6, 'test offre', '2014-02-02 00:00:00', 'pdg', 'joiz''niuvp onuaiepr \r\nnvpia nvujhvpa erg\r\nvhapeç onujbvi\r\n', 1, 2, 2, 2, 4),
(6, 1, 2, 'Web Graphiste (H/F) avec expérience', '2014-02-11 20:33:20', 'Chef d''équipe', 'De formation Bac +​2 minimum en webdesign ou en multimédia, et une expérience de 5 ans minimum, vous êtes fortement attiré par le monde du e-commerce.​\r\n\r\nVous êtes organisé, méthodique, logique et autonome et vous maîtrisez les compétences suivantes :\r\n\r\n                            - Photoshop & Illustrator\r\n                            - HTML & CSS\r\n\r\n\r\nVos principales missions seront :\r\n\r\n                            - La création et réalisation de l''ensemble des éléments graphiques du site ventealapropriete.​com\r\n                            - La création et réalisation des éléments de marketing online\r\n                            - La sélection et la retouche de photos\r\n                            - La réalisation et intégration des newsletters\r\n                            - La création et réalisation des éléments de communication offline', 0, 3, 2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `offre_tag`
--

CREATE TABLE IF NOT EXISTS `offre_tag` (
  `offre_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`offre_id`,`tag_id`),
  KEY `IDX_E3AFAFAA4CC8505A` (`offre_id`),
  KEY `IDX_E3AFAFAABAD26311` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `offre_tag`
--

INSERT INTO `offre_tag` (`offre_id`, `tag_id`) VALUES
(1, 2),
(1, 5),
(1, 7),
(1, 9),
(2, 2),
(2, 5),
(2, 9),
(3, 3),
(3, 8),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `Pays`
--

CREATE TABLE IF NOT EXISTS `Pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `alpha2` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `alpha3` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `nom_en` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nom_fr` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=242 ;

--
-- Contenu de la table `Pays`
--

INSERT INTO `Pays` (`id`, `code`, `alpha2`, `alpha3`, `nom_en`, `nom_fr`) VALUES
(1, 4, 'AF', 'AFG', 'Afghanistan', 'Afghanistan'),
(2, 8, 'AL', 'ALB', 'Albania', 'Albanie'),
(3, 10, 'AQ', 'ATA', 'Antarctica', 'Antarctique'),
(4, 12, 'DZ', 'DZA', 'Algeria', 'Algérie'),
(5, 16, 'AS', 'ASM', 'American Samoa', 'Samoa Américaines'),
(6, 20, 'AD', 'AND', 'Andorra', 'Andorre'),
(7, 24, 'AO', 'AGO', 'Angola', 'Angola'),
(8, 28, 'AG', 'ATG', 'Antigua and Barbuda', 'Antigua-et-Barbuda'),
(9, 31, 'AZ', 'AZE', 'Azerbaijan', 'Azerbaïdjan'),
(10, 32, 'AR', 'ARG', 'Argentina', 'Argentine'),
(11, 36, 'AU', 'AUS', 'Australia', 'Australie'),
(12, 40, 'AT', 'AUT', 'Austria', 'Autriche'),
(13, 44, 'BS', 'BHS', 'Bahamas', 'Bahamas'),
(14, 48, 'BH', 'BHR', 'Bahrain', 'Bahreïn'),
(15, 50, 'BD', 'BGD', 'Bangladesh', 'Bangladesh'),
(16, 51, 'AM', 'ARM', 'Armenia', 'Arménie'),
(17, 52, 'BB', 'BRB', 'Barbados', 'Barbade'),
(18, 56, 'BE', 'BEL', 'Belgium', 'Belgique'),
(19, 60, 'BM', 'BMU', 'Bermuda', 'Bermudes'),
(20, 64, 'BT', 'BTN', 'Bhutan', 'Bhoutan'),
(21, 68, 'BO', 'BOL', 'Bolivia', 'Bolivie'),
(22, 70, 'BA', 'BIH', 'Bosnia and Herzegovina', 'Bosnie-Herzégovine'),
(23, 72, 'BW', 'BWA', 'Botswana', 'Botswana'),
(24, 74, 'BV', 'BVT', 'Bouvet Island', 'Île Bouvet'),
(25, 76, 'BR', 'BRA', 'Brazil', 'Brésil'),
(26, 84, 'BZ', 'BLZ', 'Belize', 'Belize'),
(27, 86, 'IO', 'IOT', 'British Indian Ocean Territory', 'Territoire Britannique de l''Océan Indien'),
(28, 90, 'SB', 'SLB', 'Solomon Islands', 'Îles Salomon'),
(29, 92, 'VG', 'VGB', 'British Virgin Islands', 'Îles Vierges Britanniques'),
(30, 96, 'BN', 'BRN', 'Brunei Darussalam', 'Brunéi Darussalam'),
(31, 100, 'BG', 'BGR', 'Bulgaria', 'Bulgarie'),
(32, 104, 'MM', 'MMR', 'Myanmar', 'Myanmar'),
(33, 108, 'BI', 'BDI', 'Burundi', 'Burundi'),
(34, 112, 'BY', 'BLR', 'Belarus', 'Bélarus'),
(35, 116, 'KH', 'KHM', 'Cambodia', 'Cambodge'),
(36, 120, 'CM', 'CMR', 'Cameroon', 'Cameroun'),
(37, 124, 'CA', 'CAN', 'Canada', 'Canada'),
(38, 132, 'CV', 'CPV', 'Cape Verde', 'Cap-vert'),
(39, 136, 'KY', 'CYM', 'Cayman Islands', 'Îles Caïmanes'),
(40, 140, 'CF', 'CAF', 'Central African', 'République Centrafricaine'),
(41, 144, 'LK', 'LKA', 'Sri Lanka', 'Sri Lanka'),
(42, 148, 'TD', 'TCD', 'Chad', 'Tchad'),
(43, 152, 'CL', 'CHL', 'Chile', 'Chili'),
(44, 156, 'CN', 'CHN', 'China', 'Chine'),
(45, 158, 'TW', 'TWN', 'Taiwan', 'Taïwan'),
(46, 162, 'CX', 'CXR', 'Christmas Island', 'Île Christmas'),
(47, 166, 'CC', 'CCK', 'Cocos (Keeling) Islands', 'Îles Cocos (Keeling)'),
(48, 170, 'CO', 'COL', 'Colombia', 'Colombie'),
(49, 174, 'KM', 'COM', 'Comoros', 'Comores'),
(50, 175, 'YT', 'MYT', 'Mayotte', 'Mayotte'),
(51, 178, 'CG', 'COG', 'Republic of the Congo', 'République du Congo'),
(52, 180, 'CD', 'COD', 'The Democratic Republic Of The Congo', 'République Démocratique du Congo'),
(53, 184, 'CK', 'COK', 'Cook Islands', 'Îles Cook'),
(54, 188, 'CR', 'CRI', 'Costa Rica', 'Costa Rica'),
(55, 191, 'HR', 'HRV', 'Croatia', 'Croatie'),
(56, 192, 'CU', 'CUB', 'Cuba', 'Cuba'),
(57, 196, 'CY', 'CYP', 'Cyprus', 'Chypre'),
(58, 203, 'CZ', 'CZE', 'Czech Republic', 'République Tchèque'),
(59, 204, 'BJ', 'BEN', 'Benin', 'Bénin'),
(60, 208, 'DK', 'DNK', 'Denmark', 'Danemark'),
(61, 212, 'DM', 'DMA', 'Dominica', 'Dominique'),
(62, 214, 'DO', 'DOM', 'Dominican Republic', 'République Dominicaine'),
(63, 218, 'EC', 'ECU', 'Ecuador', 'Équateur'),
(64, 222, 'SV', 'SLV', 'El Salvador', 'El Salvador'),
(65, 226, 'GQ', 'GNQ', 'Equatorial Guinea', 'Guinée Équatoriale'),
(66, 231, 'ET', 'ETH', 'Ethiopia', 'Éthiopie'),
(67, 232, 'ER', 'ERI', 'Eritrea', 'Érythrée'),
(68, 233, 'EE', 'EST', 'Estonia', 'Estonie'),
(69, 234, 'FO', 'FRO', 'Faroe Islands', 'Îles Féroé'),
(70, 238, 'FK', 'FLK', 'Falkland Islands', 'Îles (malvinas) Falkland'),
(71, 239, 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', 'Géorgie du Sud et les Îles Sandwich du Sud'),
(72, 242, 'FJ', 'FJI', 'Fiji', 'Fidji'),
(73, 246, 'FI', 'FIN', 'Finland', 'Finlande'),
(74, 248, 'AX', 'ALA', 'Åland Islands', 'Îles Åland'),
(75, 250, 'FR', 'FRA', 'France', 'France'),
(76, 254, 'GF', 'GUF', 'French Guiana', 'Guyane Française'),
(77, 258, 'PF', 'PYF', 'French Polynesia', 'Polynésie Française'),
(78, 260, 'TF', 'ATF', 'French Southern Territories', 'Terres Australes Françaises'),
(79, 262, 'DJ', 'DJI', 'Djibouti', 'Djibouti'),
(80, 266, 'GA', 'GAB', 'Gabon', 'Gabon'),
(81, 268, 'GE', 'GEO', 'Georgia', 'Géorgie'),
(82, 270, 'GM', 'GMB', 'Gambia', 'Gambie'),
(83, 275, 'PS', 'PSE', 'Occupied Palestinian Territory', 'Territoire Palestinien Occupé'),
(84, 276, 'DE', 'DEU', 'Germany', 'Allemagne'),
(85, 288, 'GH', 'GHA', 'Ghana', 'Ghana'),
(86, 292, 'GI', 'GIB', 'Gibraltar', 'Gibraltar'),
(87, 296, 'KI', 'KIR', 'Kiribati', 'Kiribati'),
(88, 300, 'GR', 'GRC', 'Greece', 'Grèce'),
(89, 304, 'GL', 'GRL', 'Greenland', 'Groenland'),
(90, 308, 'GD', 'GRD', 'Grenada', 'Grenade'),
(91, 312, 'GP', 'GLP', 'Guadeloupe', 'Guadeloupe'),
(92, 316, 'GU', 'GUM', 'Guam', 'Guam'),
(93, 320, 'GT', 'GTM', 'Guatemala', 'Guatemala'),
(94, 324, 'GN', 'GIN', 'Guinea', 'Guinée'),
(95, 328, 'GY', 'GUY', 'Guyana', 'Guyana'),
(96, 332, 'HT', 'HTI', 'Haiti', 'Haïti'),
(97, 334, 'HM', 'HMD', 'Heard Island and McDonald Islands', 'Îles Heard et Mcdonald'),
(98, 336, 'VA', 'VAT', 'Vatican City State', 'Saint-Siège (état de la Cité du Vatican)'),
(99, 340, 'HN', 'HND', 'Honduras', 'Honduras'),
(100, 344, 'HK', 'HKG', 'Hong Kong', 'Hong-Kong'),
(101, 348, 'HU', 'HUN', 'Hungary', 'Hongrie'),
(102, 352, 'IS', 'ISL', 'Iceland', 'Islande'),
(103, 356, 'IN', 'IND', 'India', 'Inde'),
(104, 360, 'ID', 'IDN', 'Indonesia', 'Indonésie'),
(105, 364, 'IR', 'IRN', 'Islamic Republic of Iran', 'République Islamique d''Iran'),
(106, 368, 'IQ', 'IRQ', 'Iraq', 'Iraq'),
(107, 372, 'IE', 'IRL', 'Ireland', 'Irlande'),
(108, 376, 'IL', 'ISR', 'Israel', 'Israël'),
(109, 380, 'IT', 'ITA', 'Italy', 'Italie'),
(110, 384, 'CI', 'CIV', 'Côte d''Ivoire', 'Côte d''Ivoire'),
(111, 388, 'JM', 'JAM', 'Jamaica', 'Jamaïque'),
(112, 392, 'JP', 'JPN', 'Japan', 'Japon'),
(113, 398, 'KZ', 'KAZ', 'Kazakhstan', 'Kazakhstan'),
(114, 400, 'JO', 'JOR', 'Jordan', 'Jordanie'),
(115, 404, 'KE', 'KEN', 'Kenya', 'Kenya'),
(116, 408, 'KP', 'PRK', 'Democratic People''s Republic of Korea', 'République Populaire Démocratique de Corée'),
(117, 410, 'KR', 'KOR', 'Republic of Korea', 'République de Corée'),
(118, 414, 'KW', 'KWT', 'Kuwait', 'Koweït'),
(119, 417, 'KG', 'KGZ', 'Kyrgyzstan', 'Kirghizistan'),
(120, 418, 'LA', 'LAO', 'Lao People''s Democratic Republic', 'République Démocratique Populaire Lao'),
(121, 422, 'LB', 'LBN', 'Lebanon', 'Liban'),
(122, 426, 'LS', 'LSO', 'Lesotho', 'Lesotho'),
(123, 428, 'LV', 'LVA', 'Latvia', 'Lettonie'),
(124, 430, 'LR', 'LBR', 'Liberia', 'Libéria'),
(125, 434, 'LY', 'LBY', 'Libyan Arab Jamahiriya', 'Jamahiriya Arabe Libyenne'),
(126, 438, 'LI', 'LIE', 'Liechtenstein', 'Liechtenstein'),
(127, 440, 'LT', 'LTU', 'Lithuania', 'Lituanie'),
(128, 442, 'LU', 'LUX', 'Luxembourg', 'Luxembourg'),
(129, 446, 'MO', 'MAC', 'Macao', 'Macao'),
(130, 450, 'MG', 'MDG', 'Madagascar', 'Madagascar'),
(131, 454, 'MW', 'MWI', 'Malawi', 'Malawi'),
(132, 458, 'MY', 'MYS', 'Malaysia', 'Malaisie'),
(133, 462, 'MV', 'MDV', 'Maldives', 'Maldives'),
(134, 466, 'ML', 'MLI', 'Mali', 'Mali'),
(135, 470, 'MT', 'MLT', 'Malta', 'Malte'),
(136, 474, 'MQ', 'MTQ', 'Martinique', 'Martinique'),
(137, 478, 'MR', 'MRT', 'Mauritania', 'Mauritanie'),
(138, 480, 'MU', 'MUS', 'Mauritius', 'Maurice'),
(139, 484, 'MX', 'MEX', 'Mexico', 'Mexique'),
(140, 492, 'MC', 'MCO', 'Monaco', 'Monaco'),
(141, 496, 'MN', 'MNG', 'Mongolia', 'Mongolie'),
(142, 498, 'MD', 'MDA', 'Republic of Moldova', 'République de Moldova'),
(143, 500, 'MS', 'MSR', 'Montserrat', 'Montserrat'),
(144, 504, 'MA', 'MAR', 'Morocco', 'Maroc'),
(145, 508, 'MZ', 'MOZ', 'Mozambique', 'Mozambique'),
(146, 512, 'OM', 'OMN', 'Oman', 'Oman'),
(147, 516, 'NA', 'NAM', 'Namibia', 'Namibie'),
(148, 520, 'NR', 'NRU', 'Nauru', 'Nauru'),
(149, 524, 'NP', 'NPL', 'Nepal', 'Népal'),
(150, 528, 'NL', 'NLD', 'Netherlands', 'Pays-Bas'),
(151, 530, 'AN', 'ANT', 'Netherlands Antilles', 'Antilles Néerlandaises'),
(152, 533, 'AW', 'ABW', 'Aruba', 'Aruba'),
(153, 540, 'NC', 'NCL', 'New Caledonia', 'Nouvelle-Calédonie'),
(154, 548, 'VU', 'VUT', 'Vanuatu', 'Vanuatu'),
(155, 554, 'NZ', 'NZL', 'New Zealand', 'Nouvelle-Zélande'),
(156, 558, 'NI', 'NIC', 'Nicaragua', 'Nicaragua'),
(157, 562, 'NE', 'NER', 'Niger', 'Niger'),
(158, 566, 'NG', 'NGA', 'Nigeria', 'Nigéria'),
(159, 570, 'NU', 'NIU', 'Niue', 'Niué'),
(160, 574, 'NF', 'NFK', 'Norfolk Island', 'Île Norfolk'),
(161, 578, 'NO', 'NOR', 'Norway', 'Norvège'),
(162, 580, 'MP', 'MNP', 'Northern Mariana Islands', 'Îles Mariannes du Nord'),
(163, 581, 'UM', 'UMI', 'United States Minor Outlying Islands', 'Îles Mineures Éloignées des États-Unis'),
(164, 583, 'FM', 'FSM', 'Federated States of Micronesia', 'États Fédérés de Micronésie'),
(165, 584, 'MH', 'MHL', 'Marshall Islands', 'Îles Marshall'),
(166, 585, 'PW', 'PLW', 'Palau', 'Palaos'),
(167, 586, 'PK', 'PAK', 'Pakistan', 'Pakistan'),
(168, 591, 'PA', 'PAN', 'Panama', 'Panama'),
(169, 598, 'PG', 'PNG', 'Papua New Guinea', 'Papouasie-Nouvelle-Guinée'),
(170, 600, 'PY', 'PRY', 'Paraguay', 'Paraguay'),
(171, 604, 'PE', 'PER', 'Peru', 'Pérou'),
(172, 608, 'PH', 'PHL', 'Philippines', 'Philippines'),
(173, 612, 'PN', 'PCN', 'Pitcairn', 'Pitcairn'),
(174, 616, 'PL', 'POL', 'Poland', 'Pologne'),
(175, 620, 'PT', 'PRT', 'Portugal', 'Portugal'),
(176, 624, 'GW', 'GNB', 'Guinea-Bissau', 'Guinée-Bissau'),
(177, 626, 'TL', 'TLS', 'Timor-Leste', 'Timor-Leste'),
(178, 630, 'PR', 'PRI', 'Puerto Rico', 'Porto Rico'),
(179, 634, 'QA', 'QAT', 'Qatar', 'Qatar'),
(180, 638, 'RE', 'REU', 'Réunion', 'Réunion'),
(181, 642, 'RO', 'ROU', 'Romania', 'Roumanie'),
(182, 643, 'RU', 'RUS', 'Russian Federation', 'Fédération de Russie'),
(183, 646, 'RW', 'RWA', 'Rwanda', 'Rwanda'),
(184, 654, 'SH', 'SHN', 'Saint Helena', 'Sainte-Hélène'),
(185, 659, 'KN', 'KNA', 'Saint Kitts and Nevis', 'Saint-Kitts-et-Nevis'),
(186, 660, 'AI', 'AIA', 'Anguilla', 'Anguilla'),
(187, 662, 'LC', 'LCA', 'Saint Lucia', 'Sainte-Lucie'),
(188, 666, 'PM', 'SPM', 'Saint-Pierre and Miquelon', 'Saint-Pierre-et-Miquelon'),
(189, 670, 'VC', 'VCT', 'Saint Vincent and the Grenadines', 'Saint-Vincent-et-les Grenadines'),
(190, 674, 'SM', 'SMR', 'San Marino', 'Saint-Marin'),
(191, 678, 'ST', 'STP', 'Sao Tome and Principe', 'Sao Tomé-et-Principe'),
(192, 682, 'SA', 'SAU', 'Saudi Arabia', 'Arabie Saoudite'),
(193, 686, 'SN', 'SEN', 'Senegal', 'Sénégal'),
(194, 690, 'SC', 'SYC', 'Seychelles', 'Seychelles'),
(195, 694, 'SL', 'SLE', 'Sierra Leone', 'Sierra Leone'),
(196, 702, 'SG', 'SGP', 'Singapore', 'Singapour'),
(197, 703, 'SK', 'SVK', 'Slovakia', 'Slovaquie'),
(198, 704, 'VN', 'VNM', 'Vietnam', 'Viet Nam'),
(199, 705, 'SI', 'SVN', 'Slovenia', 'Slovénie'),
(200, 706, 'SO', 'SOM', 'Somalia', 'Somalie'),
(201, 710, 'ZA', 'ZAF', 'South Africa', 'Afrique du Sud'),
(202, 716, 'ZW', 'ZWE', 'Zimbabwe', 'Zimbabwe'),
(203, 724, 'ES', 'ESP', 'Spain', 'Espagne'),
(204, 732, 'EH', 'ESH', 'Western Sahara', 'Sahara Occidental'),
(205, 736, 'SD', 'SDN', 'Sudan', 'Soudan'),
(206, 740, 'SR', 'SUR', 'Suriname', 'Suriname'),
(207, 744, 'SJ', 'SJM', 'Svalbard and Jan Mayen', 'Svalbard etÎle Jan Mayen'),
(208, 748, 'SZ', 'SWZ', 'Swaziland', 'Swaziland'),
(209, 752, 'SE', 'SWE', 'Sweden', 'Suède'),
(210, 756, 'CH', 'CHE', 'Switzerland', 'Suisse'),
(211, 760, 'SY', 'SYR', 'Syrian Arab Republic', 'République Arabe Syrienne'),
(212, 762, 'TJ', 'TJK', 'Tajikistan', 'Tadjikistan'),
(213, 764, 'TH', 'THA', 'Thailand', 'Thaïlande'),
(214, 768, 'TG', 'TGO', 'Togo', 'Togo'),
(215, 772, 'TK', 'TKL', 'Tokelau', 'Tokelau'),
(216, 776, 'TO', 'TON', 'Tonga', 'Tonga'),
(217, 780, 'TT', 'TTO', 'Trinidad and Tobago', 'Trinité-et-Tobago'),
(218, 784, 'AE', 'ARE', 'United Arab Emirates', 'Émirats Arabes Unis'),
(219, 788, 'TN', 'TUN', 'Tunisia', 'Tunisie'),
(220, 792, 'TR', 'TUR', 'Turkey', 'Turquie'),
(221, 795, 'TM', 'TKM', 'Turkmenistan', 'Turkménistan'),
(222, 796, 'TC', 'TCA', 'Turks and Caicos Islands', 'Îles Turks et Caïques'),
(223, 798, 'TV', 'TUV', 'Tuvalu', 'Tuvalu'),
(224, 800, 'UG', 'UGA', 'Uganda', 'Ouganda'),
(225, 804, 'UA', 'UKR', 'Ukraine', 'Ukraine'),
(226, 807, 'MK', 'MKD', 'The Former Yugoslav Republic of Macedonia', 'L''ex-République Yougoslave de Macédoine'),
(227, 818, 'EG', 'EGY', 'Egypt', 'Égypte'),
(228, 826, 'GB', 'GBR', 'United Kingdom', 'Royaume-Uni'),
(229, 833, 'IM', 'IMN', 'Isle of Man', 'Île de Man'),
(230, 834, 'TZ', 'TZA', 'United Republic Of Tanzania', 'République-Unie de Tanzanie'),
(231, 840, 'US', 'USA', 'United States', 'États-Unis'),
(232, 850, 'VI', 'VIR', 'U.S. Virgin Islands', 'Îles Vierges des États-Unis'),
(233, 854, 'BF', 'BFA', 'Burkina Faso', 'Burkina Faso'),
(234, 858, 'UY', 'URY', 'Uruguay', 'Uruguay'),
(235, 860, 'UZ', 'UZB', 'Uzbekistan', 'Ouzbékistan'),
(236, 862, 'VE', 'VEN', 'Venezuela', 'Venezuela'),
(237, 876, 'WF', 'WLF', 'Wallis and Futuna', 'Wallis et Futuna'),
(238, 882, 'WS', 'WSM', 'Samoa', 'Samoa'),
(239, 887, 'YE', 'YEM', 'Yemen', 'Yémen'),
(240, 891, 'CS', 'SCG', 'Serbia and Montenegro', 'Serbie-et-Monténégro'),
(241, 894, 'ZM', 'ZMB', 'Zambia', 'Zambie');

-- --------------------------------------------------------

--
-- Structure de la table `Region`
--

CREATE TABLE IF NOT EXISTS `Region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pays_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8CEF440A6E44244` (`pays_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `Region`
--

INSERT INTO `Region` (`id`, `pays_id`, `nom`) VALUES
(1, 75, 'Bourgogne'),
(2, 75, 'Île-de-France'),
(3, 75, 'Franche-Comté'),
(4, 75, 'Bretagne'),
(5, 75, 'Alsace');

-- --------------------------------------------------------

--
-- Structure de la table `Rubrique`
--

CREATE TABLE IF NOT EXISTS `Rubrique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `Rubrique`
--

INSERT INTO `Rubrique` (`id`, `nom`) VALUES
(1, 'conseils'),
(2, 'actu'),
(3, 'faq');

-- --------------------------------------------------------

--
-- Structure de la table `Tag`
--

CREATE TABLE IF NOT EXISTS `Tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `Tag`
--

INSERT INTO `Tag` (`id`, `nom`) VALUES
(1, 'Informatique'),
(2, 'Web'),
(3, 'Etranger'),
(4, 'Commerce'),
(5, '13e mois'),
(6, 'Freelance'),
(7, 'Vendange'),
(8, 'Hôtellerie'),
(9, 'Vente'),
(10, 'RH');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9B80EC6492FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_9B80EC64A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=48 ;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `email`, `enabled`, `username`, `username_canonical`, `email_canonical`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(4, 'admin@jobhub.com', 1, 'admin', 'admin', 'admin@jobhub.com', '3fi8iqh2gyucw48ccs4ko8cwc8scwg0', 'admin{3fi8iqh2gyucw48ccs4ko8cwc8scwg0}', '2014-02-12 15:05:23', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL),
(5, 'job@recrute.fr', 1, 'recruteur1', 'recruteur1', 'job@recrute.fr', 'c3ljixlb6e8gs4c8wk44g4404kscw4k', 'recruteur{c3ljixlb6e8gs4c8wk44g4404kscw4k}', '2014-02-16 01:43:13', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:15:"ROLE_ENTREPRISE";}', 0, NULL),
(6, 'candidat@hotmail.com', 1, 'candidat1', 'candidat1', 'candidat@hotmail.com', 'dbk6n1cf1s848kw0oowwkgok80kogwg', 'candidat{dbk6n1cf1s848kw0oowwkgok80kogwg}', '2014-02-16 01:37:59', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:13:"ROLE_CANDIDAT";}', 0, NULL),
(7, 'redacteur@hotmail.com', 1, 'redacteur1', 'redacteur1', 'redacteur@hotmail.com', 'qc794r7l368c8sgco00ckwkg0sckcks', 'redacteur{qc794r7l368c8sgco00ckwkg0sckcks}', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:14:"ROLE_REDACTEUR";}', 0, NULL),
(8, 'moderateur@hotmail.com', 1, 'moderateur1', 'moderateur1', 'moderateur@hotmail.com', '23ssp6ld6200ocwokc44o448008gcsc', 'moderateur{23ssp6ld6200ocwokc44o448008gcsc}', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:15:"ROLE_MODERATEUR";}', 0, NULL),
(9, 'super_admin@jobhub.com', 1, 'super_admin', 'super_admin', 'super_admin@jobhub.com', '2mnx1uyrjx0kocwkckkw0kcsosgwg4c', 'superadmin{2mnx1uyrjx0kocwkckkw0kcsosgwg4c}', '2014-02-16 02:01:05', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL),
(46, 'test', 1, 'dodo', 'dodo', 'test', 'faj48pm8nrww0c4gw0sggs0080kccs0', '456{faj48pm8nrww0c4gw0sggs0080kccs0}', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:13:"ROLE_CANDIDAT";}', 0, NULL),
(47, 'jblabla@1664.com', 1, 'jjsino1664', 'jjsino1664', 'jblabla@1664.com', 's3je1s3zm5wc48wc08sgsw8osc000kk', 'jjsino1664{s3je1s3zm5wc48wc08sgsw8osc000kk}', '2014-02-16 01:13:22', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:13:"ROLE_CANDIDAT";}', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Video`
--

CREATE TABLE IF NOT EXISTS `Video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `legende` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Ville`
--

CREATE TABLE IF NOT EXISTS `Ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) DEFAULT NULL,
  `code_postal` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8202F6C798260155` (`region_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `Ville`
--

INSERT INTO `Ville` (`id`, `region_id`, `code_postal`, `nom`) VALUES
(1, 1, 21000, 'Dijon'),
(2, 2, 75000, 'Paris'),
(3, 3, 25000, 'Besançon'),
(4, 3, 90000, 'Belfort'),
(5, 5, 67001, 'Strasbourg');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD CONSTRAINT `FK_FF8F2A304B7954BD` FOREIGN KEY (`compteUser_id`) REFERENCES `Utilisateur` (`id`);

--
-- Contraintes pour la table `Article`
--
ALTER TABLE `Article`
  ADD CONSTRAINT `FK_CD8737FA29C1004E` FOREIGN KEY (`video_id`) REFERENCES `Video` (`id`),
  ADD CONSTRAINT `FK_CD8737FA3BD38833` FOREIGN KEY (`rubrique_id`) REFERENCES `Rubrique` (`id`),
  ADD CONSTRAINT `FK_CD8737FAC06A9F55` FOREIGN KEY (`img_id`) REFERENCES `Image` (`id`);

--
-- Contraintes pour la table `Candidat`
--
ALTER TABLE `Candidat`
  ADD CONSTRAINT `FK_93C3D6274B7954BD` FOREIGN KEY (`compteUser_id`) REFERENCES `Utilisateur` (`id`),
  ADD CONSTRAINT `FK_93C3D627A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `Ville` (`id`);

--
-- Contraintes pour la table `Candidature`
--
ALTER TABLE `Candidature`
  ADD CONSTRAINT `FK_65A75C6F4CC8505A` FOREIGN KEY (`offre_id`) REFERENCES `Offre` (`id`),
  ADD CONSTRAINT `FK_65A75C6F8D0EB82` FOREIGN KEY (`candidat_id`) REFERENCES `Candidat` (`id`),
  ADD CONSTRAINT `FK_65A75C6FCFE419E2` FOREIGN KEY (`cv_id`) REFERENCES `CV` (`id`);

--
-- Contraintes pour la table `CV`
--
ALTER TABLE `CV`
  ADD CONSTRAINT `FK_1885FAF88D0EB82` FOREIGN KEY (`candidat_id`) REFERENCES `Candidat` (`id`);

--
-- Contraintes pour la table `Entreprise`
--
ALTER TABLE `Entreprise`
  ADD CONSTRAINT `FK_4244F9B04B7954BD` FOREIGN KEY (`compteUser_id`) REFERENCES `Utilisateur` (`id`),
  ADD CONSTRAINT `FK_4244F9B0A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `Ville` (`id`);

--
-- Contraintes pour la table `Experience`
--
ALTER TABLE `Experience`
  ADD CONSTRAINT `FK_4ACDC2D38D0EB82` FOREIGN KEY (`candidat_id`) REFERENCES `Candidat` (`id`);

--
-- Contraintes pour la table `Formation`
--
ALTER TABLE `Formation`
  ADD CONSTRAINT `FK_C2B1A31C8D0EB82` FOREIGN KEY (`candidat_id`) REFERENCES `Candidat` (`id`);

--
-- Contraintes pour la table `Offre`
--
ALTER TABLE `Offre`
  ADD CONSTRAINT `FK_6E47A96B4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `Domaine` (`id`),
  ADD CONSTRAINT `FK_6E47A96B9B0F88B1` FOREIGN KEY (`activite_id`) REFERENCES `Activite` (`id`),
  ADD CONSTRAINT `FK_6E47A96BA4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `Entreprise` (`id`),
  ADD CONSTRAINT `FK_6E47A96BA73F0036` FOREIGN KEY (`ville_id`) REFERENCES `Ville` (`id`);

--
-- Contraintes pour la table `offre_tag`
--
ALTER TABLE `offre_tag`
  ADD CONSTRAINT `FK_E3AFAFAABAD26311` FOREIGN KEY (`tag_id`) REFERENCES `Tag` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E3AFAFAA4CC8505A` FOREIGN KEY (`offre_id`) REFERENCES `Offre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Region`
--
ALTER TABLE `Region`
  ADD CONSTRAINT `FK_8CEF440A6E44244` FOREIGN KEY (`pays_id`) REFERENCES `Pays` (`id`);

--
-- Contraintes pour la table `Ville`
--
ALTER TABLE `Ville`
  ADD CONSTRAINT `FK_8202F6C798260155` FOREIGN KEY (`region_id`) REFERENCES `Region` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
