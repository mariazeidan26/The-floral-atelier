-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2026 at 04:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `floral_atelier`
--

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_User` int(10) UNSIGNED DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `note` tinyint(3) UNSIGNED NOT NULL,
  `date_publier` datetime DEFAULT current_timestamp()
) ;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`ID`, `ID_User`, `commentaire`, `note`, `date_publier`) VALUES
(1, 6, 'feedback', 5, NULL),
(2, 6, 'feedback', 5, '2026-06-04 20:27:03'),
(3, 6, 'feedback', 5, '2026-06-04 20:43:35'),
(4, 6, 'feedback', 5, '2026-06-04 20:48:39'),
(5, 6, 'feedback', 5, '2026-06-04 20:49:17'),
(6, 6, 'feedback', 5, '2026-06-04 20:49:27'),
(7, 6, 'feedback', 5, '2026-06-04 20:50:30'),
(8, 6, 'feedback', 5, '2026-06-04 20:50:58'),
(9, 6, 'feedback', 5, '2026-06-04 20:51:04'),
(10, 6, 'feedback', 5, '2026-06-04 20:51:11'),
(11, 6, 'feedback', 5, '2026-06-04 20:52:08'),
(12, 6, 'feedback', 5, '2026-06-04 21:02:11'),
(13, 6, 'feedback', 5, '2026-06-04 21:04:17'),
(14, 6, 'feedback', 5, '2026-06-04 21:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `bouquet`
--

CREATE TABLE `bouquet` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_Plante` int(10) UNSIGNED DEFAULT NULL,
  `ID_User` int(10) UNSIGNED DEFAULT NULL,
  `is_paid` enum('Oui','Non') DEFAULT 'Non',
  `total` decimal(10,0) DEFAULT NULL,
  `ID_Bouquet` int(10) UNSIGNED DEFAULT NULL,
  `quantite` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bouquet`
--

INSERT INTO `bouquet` (`ID`, `ID_Plante`, `ID_User`, `is_paid`, `total`, `ID_Bouquet`, `quantite`) VALUES
(1, 11, 6, 'Non', 15, 1, 1),
(2, 16, 6, 'Non', 15, 1, 1),
(3, 11, 6, 'Non', 15, 1, 1),
(4, 16, 6, 'Non', 15, 1, 2),
(5, 11, 6, 'Non', 3, 2, 1),
(6, 11, 6, 'Non', 6, 3, 1),
(7, 16, 6, 'Non', 6, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bouquetcart`
--

CREATE TABLE `bouquetcart` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_User` int(10) UNSIGNED NOT NULL,
  `ID_Plante` int(10) UNSIGNED NOT NULL,
  `quantite` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_item` int(10) UNSIGNED NOT NULL,
  `item_type` enum('Plante','Bouquet') DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `quantite` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `ID_item`, `item_type`, `ID_user`, `quantite`) VALUES
(5, 3, 'Plante', 4, 3),
(6, 11, 'Plante', 4, 1),
(7, 11, 'Plante', 4, 13),
(8, 7, 'Plante', 4, 1),
(9, 7, 'Plante', 4, 1),
(10, 1, 'Plante', 4, 1),
(16, 3, 'Bouquet', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `ID` int(10) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`ID`, `nom`, `details`) VALUES
(1, 'Plant', 'To bring greenery back into your apartment or to give as a luxurious gift.'),
(2, 'bouquet', 'Looking to express your feelings? This beautiful cocktail of colors will be absolutely perfect.'),
(3, 'flower', 'Why perfume your apartment if Mother Nature can do it for you? Perfect for your living room, bedroom, or balcony.');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_Panier` int(10) UNSIGNED DEFAULT NULL,
  `date_commande` datetime DEFAULT current_timestamp(),
  `statut_global` varchar(255) DEFAULT 'Preparation',
  `ID_User` int(10) UNSIGNED DEFAULT NULL,
  `ID_item` int(10) UNSIGNED DEFAULT NULL,
  `item_type` enum('Plante','Bouquet','Service','Maintenance') DEFAULT NULL,
  `quantite` int(10) UNSIGNED DEFAULT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `discount_code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`ID`, `ID_Panier`, `date_commande`, `statut_global`, `ID_User`, `ID_item`, `item_type`, `quantite`, `name`, `email`, `phone`, `address`, `total`, `discount_code`) VALUES
(1, 1, '2026-06-06 16:50:09', 'Preparation', 5, 6, 'Plante', 1, 'test', 'test@gmail.com', '1234567', 'dsfgh', 175.00, NULL),
(2, 2, '2026-06-06 17:01:25', 'Preparation', 5, 24, 'Service', 1, 'test', 'test@gmail.com', '1234567', 'dsfgh', 336.00, NULL),
(3, 2, '2026-06-06 17:01:25', 'Preparation', 5, 25, 'Service', 1, 'test', 'test@gmail.com', '1234567', 'dsfgh', 336.00, NULL),
(4, 2, '2026-06-06 17:01:25', 'Preparation', 5, 1, 'Maintenance', 1, 'test', 'test@gmail.com', '1234567', 'dsfgh', 336.00, NULL),
(5, 2, '2026-06-06 17:01:25', 'Preparation', 5, 2, 'Maintenance', 1, 'test', 'test@gmail.com', '1234567', 'dsfgh', 336.00, NULL),
(6, 2, '2026-06-06 17:01:25', 'Preparation', 5, 3, 'Maintenance', 1, 'test', 'test@gmail.com', '1234567', 'dsfgh', 336.00, NULL),
(7, 3, '2026-06-06 17:04:21', 'Preparation', 5, 24, 'Service', 1, 'test', 'test@gmail.com', '1234567', 'dsfgh', 336.00, NULL),
(8, 3, '2026-06-06 17:04:21', 'Preparation', 5, 25, 'Service', 1, 'test', 'test@gmail.com', '1234567', 'dsfgh', 336.00, NULL),
(9, 3, '2026-06-06 17:04:21', 'Preparation', 5, 1, 'Maintenance', 1, 'test', 'test@gmail.com', '1234567', 'dsfgh', 336.00, NULL),
(10, 3, '2026-06-06 17:04:21', 'Preparation', 5, 2, 'Maintenance', 1, 'test', 'test@gmail.com', '1234567', 'dsfgh', 336.00, NULL),
(11, 3, '2026-06-06 17:04:21', 'Preparation', 5, 3, 'Maintenance', 1, 'test', 'test@gmail.com', '1234567', 'dsfgh', 336.00, NULL),
(12, 4, '2026-06-06 17:13:02', 'Preparation', 5, 7, 'Plante', 1, 'Customer 1', 'kellykaram06@gmail.com', '1234567', 'myAddress', 71.69, NULL),
(13, 4, '2026-06-06 17:13:02', 'Preparation', 5, 11, 'Plante', 1, 'Customer 1', 'kellykaram06@gmail.com', '1234567', 'myAddress', 71.69, NULL),
(14, 5, '2026-06-06 17:17:11', 'Preparation', 5, 16, 'Plante', 1, 'Customer 1', 'charbellichaa22@gmail.com', '1234567', 'myAddress', 92.99, NULL),
(15, 6, '2026-06-06 17:25:58', 'Preparation', 5, 7, 'Plante', 1, 'kelly', 'kellykaram06@gmail.com', '1234567', 'myAddress', 71.69, NULL),
(16, 6, '2026-06-06 17:25:58', 'Preparation', 5, 11, 'Plante', 1, 'kelly', 'kellykaram06@gmail.com', '1234567', 'myAddress', 71.69, NULL),
(17, 7, '2026-06-06 17:26:29', 'Preparation', 5, 7, 'Plante', 1, 'kelly', 'charbellichaa22@gmail.com', '1234567', 'myAddress', 37.95, NULL),
(18, 8, '2026-06-06 17:27:55', 'Preparation', 5, 11, 'Plante', 1, 'kelly', 'kellykaram06@gmail.com', '1234567', 'myAddress', 36.74, NULL),
(19, 9, '2026-06-06 17:28:43', 'Preparation', 5, 11, 'Plante', 1, 'charbel', 'charbellichaa22@gmail.com', '1234567', 'myAddress', 36.74, NULL),
(20, 10, '2026-06-06 19:19:57', 'Preparation', 5, 11, 'Plante', 1, '', '', '', '', 57.35, 'planting02'),
(21, 10, '2026-06-06 19:19:57', 'Preparation', 5, 7, 'Plante', 1, '', '', '', '', 57.35, 'planting02'),
(22, 11, '2026-06-06 19:27:28', 'Preparation', 5, 11, 'Plante', 1, '', '', '', '', 36.74, 'planting02'),
(23, 12, '2026-06-06 19:28:20', 'Preparation', 5, 11, 'Plante', 1, '', '', '', '', 36.74, '');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_User` int(10) UNSIGNED DEFAULT NULL,
  `telephone_contact` varchar(20) DEFAULT NULL,
  `ad_location` text DEFAULT NULL,
  `est_defaut` tinyint(1) DEFAULT 0,
  `preferred` text DEFAULT NULL,
  `date_chosen` date DEFAULT NULL,
  `type` enum('planting','maintenance') DEFAULT NULL,
  `number_plants` int(10) UNSIGNED DEFAULT NULL,
  `confirmed` enum('Oui','Non') DEFAULT 'Non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`ID`, `ID_User`, `telephone_contact`, `ad_location`, `est_defaut`, `preferred`, `date_chosen`, `type`, `number_plants`, `confirmed`) VALUES
(3, 2, NULL, '', 0, '8:00 AM', '0000-00-00', 'planting', NULL, 'Non'),
(5, 2, NULL, 'test', 0, '8:00 AM', '2026-06-24', 'maintenance', 12, 'Non'),
(7, 0, NULL, 'test', 0, '8:00 AM', '2026-06-24', 'planting', NULL, 'Non'),
(8, 0, NULL, 'test', 0, '8:00 AM', '2026-06-24', 'planting', NULL, 'Non'),
(9, 2, NULL, '', 0, '8:00 AM', '0000-00-00', 'planting', NULL, 'Non'),
(10, 4, NULL, 'test', 0, '8:00 AM', '2026-06-24', 'planting', NULL, 'Non'),
(15, 5, NULL, 'test', 0, '8:00 AM', '2026-06-24', 'planting', NULL, 'Oui'),
(16, 6, NULL, 'test', 0, '8:00 AM', '0000-00-00', 'planting', NULL, 'Oui'),
(17, 5, NULL, 'ghadir jounieh ', 0, '8:00 AM', '2026-06-03', 'maintenance', 15, 'Oui');

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

CREATE TABLE `livraison` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_Adresse` int(10) UNSIGNED DEFAULT NULL,
  `ID_Commande` int(10) UNSIGNED DEFAULT NULL,
  `date_prevu` datetime DEFAULT NULL,
  `date_reelle` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `ID_Adresse` int(10) UNSIGNED NOT NULL,
  `number_plantes` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `ID_User` int(10) UNSIGNED DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `m_date` date DEFAULT NULL,
  `is_paid` enum('Oui','Non') DEFAULT 'Non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`ID_Adresse`, `number_plantes`, `ID_User`, `adresse`, `time`, `m_date`, `is_paid`) VALUES
(1, 15, 5, 'ghadir jounieh ', '10:00 AM', '2026-06-05', 'Oui'),
(2, 15, 5, 'ghadir jounieh ', '10:00 AM', '2026-06-05', 'Oui'),
(3, 15, 5, 'ghadir jounieh ', '10:00 AM', '2026-06-05', 'Oui');

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

CREATE TABLE `paiement` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_Commande` int(10) UNSIGNED DEFAULT NULL,
  `montant` decimal(9,2) DEFAULT 0.00,
  `methode_paiement` enum('cart','cash') DEFAULT 'cash',
  `is_pay` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plante`
--

CREATE TABLE `plante` (
  `ID` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `ID_Categorie` int(10) UNSIGNED NOT NULL,
  `details` text DEFAULT NULL,
  `prix` decimal(7,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `statut` enum('Available','Out of Stock') NOT NULL DEFAULT 'Available',
  `quantite` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `img` text NOT NULL,
  `prix_unitaire` decimal(10,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plante`
--

INSERT INTO `plante` (`ID`, `nom`, `ID_Categorie`, `details`, `prix`, `statut`, `quantite`, `img`, `prix_unitaire`) VALUES
(4, 'Blue hydrangea', 3, 'it brings a calming and serene beauty to any room, symbolizing gratitude and grace.', 52.74, 'Available', 732, 'assets/img/plant/Blue hydrangea.jpeg', 3.00),
(6, 'Cactus flower', 1, 'it symbolizes endurance and strength. When in bloom, these resilient plants surprise with incredibly vibrant and often fragrant blossoms.', 18.53, 'Available', 3846, 'assets/img/plant/Cactus flower.jpeg', 18.53),
(7, 'Dendrobium', 3, 'known for its starry, cascading blossoms. It symbolizes beauty and wisdom.', 34.95, 'Available', 1344, 'assets/img/plant/Dendrobium.jpeg', 3.00),
(9, 'Dieffenbachia', 1, 'Striking leaf patterns bring color and texture. Ideal for shaded rooms needing a bold yet soft greenery accent.', 67.24, 'Available', 3503, 'assets/img/plant/Dieffenbachia.jpeg', 67.24),
(10, 'Heliconia', 1, 'Bold colors and dramatic forms make it a living sculpture. Adds vibrancy and a true tropical accent to modern interiors.', 29.63, 'Available', 2339, 'assets/img/plant/Heliconia.jpeg', NULL),
(11, 'Iris', 3, 'it symbolizes wisdom, hope, and trust.', 33.74, 'Available', 2076, 'assets/img/plant/Iris.jpeg', 3.00),
(13, 'lilac love', 2, ' ', 31.00, 'Available', 205, 'assets/img/plant/lilac love.jpeg', 5.00),
(14, 'Pink clouds', 2, ' ', 47.00, 'Available', 268, 'assets/img/plant/Pink clouds.jpeg', 5.00),
(15, 'Red roses', 2, ' ', 39.60, 'Available', 638, 'assets/img/plant/Red roses.jpeg', 5.00),
(29, 'Areca Palm', 1, 'Graceful fronds instantly bring a tropical breeze into your home. Perfect for creating a light, exotic vibe in interiors or patios.', 66.52, 'Available', 1082, 'assets/img/plant/areca palm.jpeg', NULL),
(30, 'Bamboo', 1, 'Minimalist and calming. You can use it as a natural room divider or garden element - bamboo brings harmony and lightness.', 98.54, 'Available', 3216, 'assets/img/plant/bamboo.jpeg', NULL),
(31, 'Blooming charm', 2, ' ', 27.35, 'Available', 172, 'assets/img/plant/blooming charm.jpeg', NULL),
(32, 'White orchid', 3, 'soft and graceful, the white orchid adds a peaceful charm to any setting.', 89.99, 'Available', 2895, 'assets/img/plant/white orchid.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `planting`
--

CREATE TABLE `planting` (
  `ID_Adresse` int(10) UNSIGNED NOT NULL,
  `date_visit` date NOT NULL,
  `quantite` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `ID_Plante` int(10) UNSIGNED DEFAULT NULL,
  `ID_User` int(10) UNSIGNED DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `ID_Planting` int(10) UNSIGNED DEFAULT NULL,
  `is_paid` enum('Oui','Non') DEFAULT 'Non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `planting`
--

INSERT INTO `planting` (`ID_Adresse`, `date_visit`, `quantite`, `ID_Plante`, `ID_User`, `total`, `ID_Planting`, `is_paid`) VALUES
(24, '0000-00-00', 1, 10, 5, 45, 1, 'Oui'),
(25, '0000-00-00', 1, 10, 5, 63, 2, 'Oui'),
(26, '0000-00-00', 1, 6, 5, 63, 2, 'Oui'),
(27, '0000-00-00', 1, 9, 6, 85, 1, 'Oui'),
(28, '0000-00-00', 1, 11, 6, 85, 1, 'Oui'),
(29, '0000-00-00', 1, 9, 6, 85, 2, 'Non'),
(30, '0000-00-00', 1, 11, 6, 85, 2, 'Non');

-- --------------------------------------------------------

--
-- Table structure for table `plantingcart`
--

CREATE TABLE `plantingcart` (
  `ID_PCart` int(10) UNSIGNED NOT NULL,
  `ID_Plante` int(10) UNSIGNED DEFAULT NULL,
  `ID_User` int(10) UNSIGNED DEFAULT NULL,
  `quantite` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plantingcart`
--

INSERT INTO `plantingcart` (`ID_PCart`, `ID_Plante`, `ID_User`, `quantite`) VALUES
(2, 10, 5, 1),
(4, 6, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `ID` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  `details` text DEFAULT NULL,
  `valeur_reduction` decimal(6,2) DEFAULT 0.00,
  `date_debut` datetime DEFAULT current_timestamp(),
  `date_expiration` datetime NOT NULL,
  `usage_max` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`ID`, `code`, `nom`, `details`, `valeur_reduction`, `date_debut`, `date_expiration`, `usage_max`) VALUES
(1, 'planting02', 'Planting', 'Planting promotion', 20.00, '2025-02-02 00:00:00', '2027-02-02 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `statistique_prix`
--

CREATE TABLE `statistique_prix` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_Plante` int(10) UNSIGNED NOT NULL,
  `prix_historique` decimal(10,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `motif` enum('Changement Admin','Promo Activée','Promo Expirée') DEFAULT 'Promo Activée',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statistique_stock`
--

CREATE TABLE `statistique_stock` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_Plante` int(10) UNSIGNED NOT NULL,
  `stock_historique` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_inscription` datetime DEFAULT current_timestamp(),
  `statut` varchar(255) DEFAULT 'client',
  `remember` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `nom`, `email`, `mot_de_passe`, `date_inscription`, `statut`, `remember`, `is_admin`) VALUES
(5, 'kelly', 'kellykaram06@gmail.com', '$2y$10$LE.qdF9Mhwv/.d.OQq3HIuGKWVovOKwhJ03xGiFZvv42X6I1zToKG', '2026-06-02 18:12:45', 'client', NULL, 1),
(6, 'test3', 'test3@gmail.com', '$2y$10$.7zasFMtXc1JEfmEYA52kOWKV22.Ez6ttlUbRhpmYDt2oK4uLCiGa', '2026-06-04 19:45:31', 'client', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Avis_Produit__User` (`ID_User`);

--
-- Indexes for table `bouquet`
--
ALTER TABLE `bouquet`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bouquetcart`
--
ALTER TABLE `bouquetcart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Bouquets__Plante` (`ID_Plante`),
  ADD KEY `fk_bouquet_user` (`ID_User`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`,`ID_item`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Adresse__User` (`ID_User`);

--
-- Indexes for table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Livraison__Adresse` (`ID_Adresse`),
  ADD KEY `fk__Livraison__Commande` (`ID_Commande`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`ID_Adresse`);

--
-- Indexes for table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Paiement__Commande` (`ID_Commande`);

--
-- Indexes for table `plante`
--
ALTER TABLE `plante`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Plante__Categorie` (`ID_Categorie`);

--
-- Indexes for table `planting`
--
ALTER TABLE `planting`
  ADD PRIMARY KEY (`ID_Adresse`),
  ADD KEY `fk_planting_user` (`ID_User`),
  ADD KEY `fk_planting_plante` (`ID_Plante`);

--
-- Indexes for table `plantingcart`
--
ALTER TABLE `plantingcart`
  ADD PRIMARY KEY (`ID_PCart`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `statistique_prix`
--
ALTER TABLE `statistique_prix`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Statistique_Prix__Plante` (`ID_Plante`);

--
-- Indexes for table `statistique_stock`
--
ALTER TABLE `statistique_stock`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Statistique_Stock__Plante` (`ID_Plante`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bouquet`
--
ALTER TABLE `bouquet`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bouquetcart`
--
ALTER TABLE `bouquetcart`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `ID_Adresse` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plante`
--
ALTER TABLE `plante`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `planting`
--
ALTER TABLE `planting`
  MODIFY `ID_Adresse` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `plantingcart`
--
ALTER TABLE `plantingcart`
  MODIFY `ID_PCart` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statistique_prix`
--
ALTER TABLE `statistique_prix`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistique_stock`
--
ALTER TABLE `statistique_stock`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `fk__Avis_Produit__User` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID`);

--
-- Constraints for table `bouquetcart`
--
ALTER TABLE `bouquetcart`
  ADD CONSTRAINT `fk__Bouquets__Plante` FOREIGN KEY (`ID_Plante`) REFERENCES `plante` (`ID`),
  ADD CONSTRAINT `fk_bouquet_user` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `fk__Livraison__Adresse` FOREIGN KEY (`ID_Adresse`) REFERENCES `consultation` (`ID`),
  ADD CONSTRAINT `fk__Livraison__Commande` FOREIGN KEY (`ID_Commande`) REFERENCES `commande` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `fk__Paiement__Commande` FOREIGN KEY (`ID_Commande`) REFERENCES `commande` (`ID`);

--
-- Constraints for table `plante`
--
ALTER TABLE `plante`
  ADD CONSTRAINT `fk__Plante__Categorie` FOREIGN KEY (`ID_Categorie`) REFERENCES `categorie` (`ID`);

--
-- Constraints for table `planting`
--
ALTER TABLE `planting`
  ADD CONSTRAINT `fk_planting_plante` FOREIGN KEY (`ID_Plante`) REFERENCES `plante` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_planting_user` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `statistique_prix`
--
ALTER TABLE `statistique_prix`
  ADD CONSTRAINT `fk__Statistique_Prix__Plante` FOREIGN KEY (`ID_Plante`) REFERENCES `plante` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `statistique_stock`
--
ALTER TABLE `statistique_stock`
  ADD CONSTRAINT `fk__Statistique_Stock__Plante` FOREIGN KEY (`ID_Plante`) REFERENCES `plante` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
