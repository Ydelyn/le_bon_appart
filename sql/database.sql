-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 25 juil. 2022 à 12:09
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_intermediaire_lorris`
--
CREATE DATABASE IF NOT EXISTS `php_intermediaire_lorris` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `php_intermediaire_lorris`;

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `id` int(3) NOT NULL,
  `photo` text NOT NULL,
  `title` tinytext NOT NULL,
  `description` varchar(255) NOT NULL,
  `postal_code` char(5) NOT NULL,
  `city` tinytext NOT NULL,
  `type` enum('location','vente') NOT NULL,
  `price` int(10) NOT NULL,
  `reservation_message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`id`, `photo`, `title`, `description`, `postal_code`, `city`, `type`, `price`, `reservation_message`) VALUES
(1, 'https://img.freepik.com/photos-gratuite/conception-appartement-studio-moderne-chambre-espace-vie_1262-12375.jpg?t=st=1658737422~exp=1658738022~hmac=569c8ec9a970acad6aa649a3006909dda9bfb09f914853398a3cd476cc4caa2f&w=900', 'Appart Chic Paris', 'Un superbe appartement en plein coeur de Paris', '75001', 'Paris', 'vente', 350000, 'Je désire ce logement à l\'achat.'),
(2, 'https://img.freepik.com/photos-gratuite/maquette-mur-interieur-salon-dans-tons-chauds-canape-cuir-qui-se-trouve-derriere-cuisine-rendu-3d_41470-3753.jpg?t=st=1658737422~exp=1658738022~hmac=3de516845055dd3588cae1b3cf2d3fc4f0abf57d505646f1d0c33896dfdbf52e&w=900', 'Appart Moderne Lille', 'Un superbe appartement moderne en plein coeur du centre-ville lillois', '59000', 'Lille', 'location', 730, 'Je veux cet appart !'),
(3, 'https://img.freepik.com/photos-gratuite/style-salon-moderne_53876-144814.jpg?t=st=1658750397~exp=1658750997~hmac=2cf980a8abf2a49fdc4247cf8c1244710d59d794dca92698c2be082de81196c7&w=900', 'Location 33m2 Bordeaux', 'Un appartement tout beau tout neuf à 5min de Bordeaux', '33000', 'Bordeaux', 'location', 570, NULL),
(4, 'https://img.freepik.com/photos-gratuite/plan-interieur-cuisine-maison-moderne-grandes-fenetres_181624-24368.jpg?t=st=1658750397~exp=1658750997~hmac=b6337dab01ac030b6a35d9cfc850183c085a25b47b1c912c2adc065330e1135c&w=900', '50m2 coeur Lyon', 'Un superbe appartement en plein coeur de Lyon', '69000', 'Lyon', 'vente', 600000, NULL),
(5, 'https://img.freepik.com/photos-gratuite/beau-plan-interieur-maison-moderne-murs-relaxants-blancs-meubles-technologie_181624-3828.jpg?t=st=1658750397~exp=1658750997~hmac=cc86d3b9b8e7659c60be1d98af6130e0497f7093591020d031596342543ccb26&w=900', 'Duplex Marseille', 'Un appartement tout beau tout neuf à 5min de Marseille', '13002', 'Marseille', 'vente', 540370, NULL),
(6, 'https://img.freepik.com/photos-gratuite/beau-plan-interieur-maison-moderne-murs-relaxants-blancs-meubles-technologie_181624-3828.jpg?t=st=1658750397~exp=1658750997~hmac=cc86d3b9b8e7659c60be1d98af6130e0497f7093591020d031596342543ccb26&w=900', 'Duplex Marseille 2', 'Un appartement tout beau tout neuf à 5min de Marseille', '13002', 'Marseille', 'vente', 540370, NULL),
(7, 'https://img.freepik.com/photos-gratuite/conception-appartement-studio-moderne-chambre-espace-vie_1262-12375.jpg?t=st=1658737422~exp=1658738022~hmac=569c8ec9a970acad6aa649a3006909dda9bfb09f914853398a3cd476cc4caa2f&w=900', 'Appart Chic Paris 2', 'Un superbe appartement en plein coeur de Paris', '75001', 'Paris', 'vente', 350000, 'Je désire ce logement à l\'achat.'),
(8, 'https://img.freepik.com/photos-gratuite/plan-interieur-cuisine-maison-moderne-grandes-fenetres_181624-24368.jpg?t=st=1658750397~exp=1658750997~hmac=b6337dab01ac030b6a35d9cfc850183c085a25b47b1c912c2adc065330e1135c&w=900', '50m2 coeur Lyon 2', 'Un superbe appartement en plein coeur de Lyon', '69000', 'Lyon', 'vente', 600000, NULL),
(9, 'https://img.freepik.com/photos-gratuite/maquette-mur-interieur-salon-dans-tons-chauds-canape-cuir-qui-se-trouve-derriere-cuisine-rendu-3d_41470-3753.jpg?t=st=1658737422~exp=1658738022~hmac=3de516845055dd3588cae1b3cf2d3fc4f0abf57d505646f1d0c33896dfdbf52e&w=900', 'Appart Moderne Lille 2', 'Un superbe appartement moderne en plein coeur du centre-ville lillois', '59000', 'Lille', 'location', 730, 'Je veux cet appart !'),
(10, 'https://img.freepik.com/photos-gratuite/style-salon-moderne_53876-144814.jpg?t=st=1658750397~exp=1658750997~hmac=2cf980a8abf2a49fdc4247cf8c1244710d59d794dca92698c2be082de81196c7&w=900', 'Location 33m2 Bordeaux 2', 'Un appartement tout beau tout neuf à 5min de Bordeaux', '33000', 'Bordeaux', 'location', 570, NULL),
(11, 'https://img.freepik.com/photos-gratuite/conception-appartement-studio-moderne-chambre-espace-vie_1262-12375.jpg?t=st=1658737422~exp=1658738022~hmac=569c8ec9a970acad6aa649a3006909dda9bfb09f914853398a3cd476cc4caa2f&w=900', 'Appart Chic Paris 3', 'Un superbe appartement en plein coeur de Paris', '75001', 'Paris', 'vente', 350000, 'Je désire ce logement à l\'achat.'),
(12, 'https://img.freepik.com/photos-gratuite/maquette-mur-interieur-salon-dans-tons-chauds-canape-cuir-qui-se-trouve-derriere-cuisine-rendu-3d_41470-3753.jpg?t=st=1658737422~exp=1658738022~hmac=3de516845055dd3588cae1b3cf2d3fc4f0abf57d505646f1d0c33896dfdbf52e&w=900', 'Appart Moderne Lille 3', 'Un superbe appartement moderne en plein coeur du centre-ville lillois', '59000', 'Lille', 'location', 730, 'Je veux cet appart !'),
(13, 'https://img.freepik.com/photos-gratuite/style-salon-moderne_53876-144814.jpg?t=st=1658750397~exp=1658750997~hmac=2cf980a8abf2a49fdc4247cf8c1244710d59d794dca92698c2be082de81196c7&w=900', 'Location 33m2 Bordeaux 3', 'Un appartement tout beau tout neuf à 5min de Bordeaux', '33000', 'Bordeaux', 'location', 570, NULL),
(14, 'https://img.freepik.com/photos-gratuite/plan-interieur-cuisine-maison-moderne-grandes-fenetres_181624-24368.jpg?t=st=1658750397~exp=1658750997~hmac=b6337dab01ac030b6a35d9cfc850183c085a25b47b1c912c2adc065330e1135c&w=900', '50m2 coeur Lyon 3', 'Un superbe appartement en plein coeur de Lyon', '69000', 'Lyon', 'vente', 600000, NULL),
(16, 'https://img.freepik.com/photos-gratuite/beau-plan-interieur-maison-moderne-murs-relaxants-blancs-meubles-technologie_181624-3828.jpg?t=st=1658750397~exp=1658750997~hmac=cc86d3b9b8e7659c60be1d98af6130e0497f7093591020d031596342543ccb26&w=900', 'Duplex Marseille 3', 'Un appartement tout beau tout neuf à 5min de Marseille', '13002', 'Marseille', 'vente', 540370, NULL),
(17, 'https://img.freepik.com/photos-gratuite/conception-appartement-studio-moderne-chambre-espace-vie_1262-12375.jpg?t=st=1658737422~exp=1658738022~hmac=569c8ec9a970acad6aa649a3006909dda9bfb09f914853398a3cd476cc4caa2f&w=900', 'Appart Chic Paris 4', 'Un superbe appartement en plein coeur de Paris', '75001', 'Paris', 'vente', 350000, 'Je désire ce logement à l\'achat.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
