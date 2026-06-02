-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2026 at 05:58 PM
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
  `date_publier` datetime DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `bouquets`
--

CREATE TABLE `bouquets` (
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
  `item_type` enum('Plante') DEFAULT NULL,
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
(14, 6, 'Plante', 5, 1);

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
(3, 'flower', 'Why perfume your apartment if Mother Nature can do it for you? Perfect for your living room, bedroom, or balcony.'),
(4, 'flower custom', 'for custom bouquet');

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `ID` int(10) UNSIGNED NOT NULL,
  `code` text NOT NULL,
  `discount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`ID`, `code`, `discount`) VALUES
(1, 'planting2026', 10);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_Panier` int(10) UNSIGNED DEFAULT NULL,
  `date_commande` datetime DEFAULT current_timestamp(),
  `statut_global` varchar(255) DEFAULT 'Preparation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(11, 5, NULL, 'ghadir jounieh ', 0, '12:00 PM', '2026-06-09', 'planting', NULL, 'Non');

-- --------------------------------------------------------

--
-- Table structure for table `ligne_panier`
--

CREATE TABLE `ligne_panier` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_Panier` int(10) UNSIGNED NOT NULL,
  `ID_Plante` int(10) UNSIGNED DEFAULT NULL,
  `ID_Bouquets` int(11) DEFAULT NULL,
  `quantite` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `prix_achat_historique` decimal(7,2) UNSIGNED NOT NULL DEFAULT 0.00
) ;

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
  `frequence` varchar(50) DEFAULT NULL,
  `week_day` varchar(50) NOT NULL,
  `number_plantes` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_User` int(10) UNSIGNED NOT NULL,
  `date_creation` datetime DEFAULT current_timestamp(),
  `est_actif` tinyint(1) DEFAULT 1
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
(1, 'Areca Palm', 1, 'Graceful fronds instantly bring a tropical breeze into your home. Perfect for creating a light, exotic vibe in interiors or patios.', 66.52, 'Available', 1082, 'assets/img/plant/Areca Palm.jpeg', 66.52),
(2, 'Bamboo', 1, 'Minimalist and calming. You can use it as a natural room divider or garden element - bamboo brings harmony and lightness.', 98.54, 'Out of Stock', 3216, 'assets/img/plant/Bamboo.jpeg', 98.54),
(3, 'Blooming charm', 2, ' ', 27.35, 'Available', 172, 'assets/img/plant/Blooming charm.jpeg', 3.00),
(4, 'Blue hydrangea', 3, 'it brings a calming and serene beauty to any room, symbolizing gratitude and grace.', 52.74, 'Out of Stock', 732, 'assets/img/plant/Blue hydrangea.jpeg', 3.00),
(6, 'Cactus flower', 1, 'it symbolizes endurance and strength. When in bloom, these resilient plants surprise with incredibly vibrant and often fragrant blossoms.', 18.53, 'Available', 3846, 'assets/img/plant/Cactus flower.jpeg', 18.53),
(7, 'Dendrobium', 3, 'known for its starry, cascading blossoms. It symbolizes beauty and wisdom.', 34.95, 'Available', 1344, 'assets/img/plant/Dendrobium.jpeg', 3.00),
(9, 'Dieffenbachia', 1, 'Striking leaf patterns bring color and texture. Ideal for shaded rooms needing a bold yet soft greenery accent.', 67.24, 'Available', 3503, 'assets/img/plant/Dieffenbachia.jpeg', 67.24),
(10, 'Heliconia', 1, 'Bold colors and dramatic forms make it a living sculpture. Adds vibrancy and a true tropical accent to modern interiors.', 29.63, 'Available', 2339, 'assets/img/plant/Heliconia.jpeg', 29.63),
(11, 'Iris', 3, 'it symbolizes wisdom, hope, and trust.', 33.74, 'Available', 2076, 'assets/img/plant/Iris.jpeg', 3.00),
(13, 'lilac love', 2, ' ', 31.00, 'Available', 205, 'assets/img/plant/lilac love.jpeg', 5.00),
(14, 'Pink clouds', 2, ' ', 47.00, 'Available', 268, 'assets/img/plant/Pink clouds.jpeg', 5.00),
(15, 'Red roses', 2, ' ', 39.60, 'Available', 638, 'assets/img/plant/Red roses.jpeg', 5.00),
(16, 'White orchid', 3, 'soft and graceful, the white orchid adds a peaceful charm to any setting.', 89.99, 'Available', 2895, 'assets/img/plant/White orchid.jpeg', 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `planting`
--

CREATE TABLE `planting` (
  `ID_Adresse` int(10) UNSIGNED NOT NULL,
  `date_visit` date NOT NULL,
  `quantite` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `ID_Plante` int(10) UNSIGNED DEFAULT NULL,
  `ID_User` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `planting`
--

INSERT INTO `planting` (`ID_Adresse`, `date_visit`, `quantite`, `ID_Plante`, `ID_User`) VALUES
(20, '0000-00-00', 1, 1, 5),
(22, '0000-00-00', 1, 7, 5);

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
  `usage_max` int(10) UNSIGNED DEFAULT NULL,
  `usage_actuel` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `remboursement_plante`
--

CREATE TABLE `remboursement_plante` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_Paiement` int(10) UNSIGNED DEFAULT NULL,
  `ID_Retour` int(10) UNSIGNED DEFAULT NULL,
  `montant_rembourse` decimal(15,2) DEFAULT 0.00,
  `date_remboursement` datetime NOT NULL,
  `is_Remboursement` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `remboursement_servise`
--

CREATE TABLE `remboursement_servise` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_Planting` int(10) UNSIGNED NOT NULL,
  `ID_Maintenance` int(10) UNSIGNED DEFAULT NULL,
  `ID_Paiement` int(10) UNSIGNED DEFAULT NULL,
  `motif` text DEFAULT NULL,
  `montant_rembourse` decimal(15,2) DEFAULT 0.00,
  `date_remboursement` datetime NOT NULL,
  `is_Remboursement` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retour`
--

CREATE TABLE `retour` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_Ligne_Panier` int(10) UNSIGNED DEFAULT NULL,
  `quantite` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `motif` text DEFAULT NULL,
  `etat_produit` enum('Comme neuf','Casser','Pouri') DEFAULT 'Comme neuf',
  `date_retour` datetime NOT NULL,
  `statut_retour` enum('En cour','Inspection','rejeter','remi') DEFAULT 'En cour'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `remember` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `nom`, `email`, `mot_de_passe`, `date_inscription`, `statut`, `remember`) VALUES
(5, 'kelly', 'kellykaram06@gmail.com', '$2y$10$LE.qdF9Mhwv/.d.OQq3HIuGKWVovOKwhJ03xGiFZvv42X6I1zToKG', '2026-06-02 18:12:45', 'client', NULL);

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
-- Indexes for table `bouquets`
--
ALTER TABLE `bouquets`
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
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `code` (`code`) USING HASH;

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Commande__Panier` (`ID_Panier`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Adresse__User` (`ID_User`);

--
-- Indexes for table `ligne_panier`
--
ALTER TABLE `ligne_panier`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_Bouquets` (`ID_Bouquets`),
  ADD KEY `fk__Ligne_Panier__Plante` (`ID_Plante`),
  ADD KEY `fk__Ligne_Panier__Panier` (`ID_Panier`);

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
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Panier__User` (`ID_User`);

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
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `remboursement_plante`
--
ALTER TABLE `remboursement_plante`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Remboursement_Plante__Retour` (`ID_Retour`),
  ADD KEY `fk__Remboursement_Plante__Paiement` (`ID_Paiement`);

--
-- Indexes for table `remboursement_servise`
--
ALTER TABLE `remboursement_servise`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Remboursement_servise__Planting` (`ID_Planting`),
  ADD KEY `fk__Remboursement_servise__Maintenance` (`ID_Maintenance`),
  ADD KEY `fk__Remboursement_servise__Paiement` (`ID_Paiement`);

--
-- Indexes for table `retour`
--
ALTER TABLE `retour`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk__Retour__Ligne_Panier` (`ID_Ligne_Panier`);

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
-- AUTO_INCREMENT for table `bouquets`
--
ALTER TABLE `bouquets`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ligne_panier`
--
ALTER TABLE `ligne_panier`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plante`
--
ALTER TABLE `plante`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `planting`
--
ALTER TABLE `planting`
  MODIFY `ID_Adresse` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `remboursement_plante`
--
ALTER TABLE `remboursement_plante`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `remboursement_servise`
--
ALTER TABLE `remboursement_servise`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retour`
--
ALTER TABLE `retour`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `fk__Avis_Produit__User` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID`);

--
-- Constraints for table `bouquets`
--
ALTER TABLE `bouquets`
  ADD CONSTRAINT `fk__Bouquets__Plante` FOREIGN KEY (`ID_Plante`) REFERENCES `plante` (`ID`),
  ADD CONSTRAINT `fk_bouquet_user` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk__Commande__Panier` FOREIGN KEY (`ID_Panier`) REFERENCES `panier` (`ID`);

--
-- Constraints for table `ligne_panier`
--
ALTER TABLE `ligne_panier`
  ADD CONSTRAINT `fk__Ligne_Panier__Panier` FOREIGN KEY (`ID_Panier`) REFERENCES `panier` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk__Ligne_Panier__Plante` FOREIGN KEY (`ID_Plante`) REFERENCES `plante` (`ID`);

--
-- Constraints for table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `fk__Livraison__Adresse` FOREIGN KEY (`ID_Adresse`) REFERENCES `consultation` (`ID`),
  ADD CONSTRAINT `fk__Livraison__Commande` FOREIGN KEY (`ID_Commande`) REFERENCES `commande` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `fk_Maintenance_Adresse` FOREIGN KEY (`ID_Adresse`) REFERENCES `consultation` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `fk__Paiement__Commande` FOREIGN KEY (`ID_Commande`) REFERENCES `commande` (`ID`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk__Panier__User` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID`) ON DELETE CASCADE;

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
-- Constraints for table `remboursement_plante`
--
ALTER TABLE `remboursement_plante`
  ADD CONSTRAINT `fk__Remboursement_Plante__Paiement` FOREIGN KEY (`ID_Paiement`) REFERENCES `paiement` (`ID`),
  ADD CONSTRAINT `fk__Remboursement_Plante__Retour` FOREIGN KEY (`ID_Retour`) REFERENCES `retour` (`ID`);

--
-- Constraints for table `remboursement_servise`
--
ALTER TABLE `remboursement_servise`
  ADD CONSTRAINT `fk__Remboursement_servise__Maintenance` FOREIGN KEY (`ID_Maintenance`) REFERENCES `maintenance` (`ID_Adresse`),
  ADD CONSTRAINT `fk__Remboursement_servise__Paiement` FOREIGN KEY (`ID_Paiement`) REFERENCES `paiement` (`ID`),
  ADD CONSTRAINT `fk__Remboursement_servise__Planting` FOREIGN KEY (`ID_Planting`) REFERENCES `planting` (`ID_Adresse`);

--
-- Constraints for table `retour`
--
ALTER TABLE `retour`
  ADD CONSTRAINT `fk__Retour__Ligne_Panier` FOREIGN KEY (`ID_Ligne_Panier`) REFERENCES `ligne_panier` (`ID`);

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
