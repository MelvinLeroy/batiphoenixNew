-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  db668059619.db.1and1.com
-- Généré le :  Ven 17 Mars 2017 à 09:04
-- Version du serveur :  5.5.54-0+deb7u2-log
-- Version de PHP :  5.4.45-0+deb7u7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db668059619`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `name`, `description`) VALUES
(1, 'Bois', 'Catégorie du Bois'),
(2, 'Sanitaire', 'Sanytol tout dans la maison');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_fk` int(11) NOT NULL,
  `num_commande` varchar(255) NOT NULL,
  `produts_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `map` varchar(3) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `name`, `adresse`, `map`) VALUES
(7, 'Kevin CHERUEL', '4 Place du Berry 92390 Villeneuve-la-garenne', 'Oui'),
(10, 'Ecole 42', '96 Boulevard Bessières 75017 Paris', 'Oui'),
(11, 'Melvin Leroy', '43 Rue Richelieu 92230 Genneviliers', 'Oui'),
(12, 'So''ouest', '38 Rue d''Alsace  92300  Levallois-Perret', 'Oui'),
(13, 'Test_user test_user', '1 Avenue de la paix 75001 Paris', 'Non');

-- --------------------------------------------------------

--
-- Structure de la table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `address` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Contenu de la table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(33, 'Kevin CHERUEL', '4 Place du Berry 92390 Villeneuve-la-garenne', 48.933937, 2.330560, ''),
(37, 'Ecole 42', '96 Boulevard Bessières 75017 Paris', 48.896683, 2.318376, ''),
(39, 'Melvin Leroy', '43 Rue Richelieu 92230 Genneviliers', 48.929455, 2.293117, ''),
(40, 'So''ouest', '38 Rue d''Alsace  92300  Levallois-Perret', 48.892342, 2.298438, '');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(255) NOT NULL AUTO_INCREMENT,
  `nom_du_produit` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `id_provider` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Dimension` varchar(255) NOT NULL,
  `Date_entry` date NOT NULL,
  `Date_out` date NOT NULL,
  `Prix` int(11) NOT NULL,
  UNIQUE KEY `idProduit` (`idProduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nom_du_produit`, `description`, `cat_id`, `picture`, `id_provider`, `status`, `Stock`, `Dimension`, `Date_entry`, `Date_out`, `Prix`) VALUES
(1, 'Compost', 'du Compost', 1, '../img/articles/article4.jpg', 7, 'valide', 200, '250x250x35', '2017-03-08', '2017-05-08', 125),
(2, 'test', 'test', 2, '../img/articles/article2.jpg', 7, 'valide', 3, '50x50x50', '2017-03-01', '2017-05-01', 25);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `telephone` int(25) NOT NULL,
  `date_inscription` date NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `power_rank` int(1) NOT NULL,
  `color` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Societe` varchar(255) NOT NULL,
  `Fonction` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail / pseudo` (`mail`,`pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `adresse`, `telephone`, `date_inscription`, `pseudo`, `password`, `power_rank`, `color`, `status`, `Societe`, `Fonction`) VALUES
(11, 'CHERUEL', 'Kévin', 'kevin.cheruel.dev@gmail.com', '4 Place du Berry 92390 Villeneuve-la-garenne', 785826547, '2017-02-09', 'Gootime', '$1$QRrSNHLr$T2R67wHME5He..88VP9la/', 10, '#222261', 'valide', 'Batiphoenix', 'Développeur Web'),
(12, 'Test_user', 'test_user', 'test_user@test.fr', '1 Avenue de la paix 75001 Paris', 601020304, '2017-02-14', 'test_user', '$1$XJtQU3Ng$9..Zmo064U.Pnbh4WeMDk.', 2, '#37611F', 'valide', 'Test.fr', 'Module de test'),
(13, 'test_admin', 'test_admin', 'test_admin@test.fr', '1 Avenue de la paix 75001 Paris', 601020304, '2017-02-14', 'test_admin', '$1$YfiRRc14$krZki4P6T4LjJmoDGvznn/', 2, '#628C32', 'valide', 'test.fr', 'Module primaire de test'),
(16, 'Kesia', 'Vasco', 'K.v@hotmail.fr', '', 122330099, '2017-03-12', 'K.v', '$1$FI1Dc3/8$kHaa/1RiWCVBacErZ0NcJ1', 0, '#214761', 'no-valide', 'Hec', 'Etudiante'),
(17, 'Kesia', 'VASCO', 'kesia.vasconcelos@hec.edu', '', 627366070, '2017-03-15', 'kesia.vasconcelos', '$1$vfzAKNvx$pWcP7.kWtF0LdpQrzgPQk0', 0, '#214761', 'no-valide', 'BATIPHOENIX', 'Co-founder'),
(18, 'Lucile', 'Hamon', 'lucile.hamon@hec.edu', '', 658634431, '2017-03-15', 'lucile.hamon', '$1$qDdQ0uYi$JVb9AX5pjybQ7ouZvE5621', 0, '#214761', 'no-valide', 'BATIPHOENIX', 'Reine du royaume des chats ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
