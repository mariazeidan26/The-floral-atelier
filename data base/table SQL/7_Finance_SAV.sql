CREATE TABLE IF NOT EXISTS Paiement (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ID_Commande INT UNSIGNED NULL,
    ID_Prestation INT UNSIGNED NULL,
    montant DECIMAL(9, 2) DEFAULT 0.00,
    -- type_paiement ENUM('pourcentage', 'fixe') DEFAULT 'fixe',
    methode_paiement ENUM('cart', 'cash') DEFAULT 'cash',
    is_pay BOOLEAN DEFAULT TRUE,
    CONSTRAINT chk__exclusion_mutuelle_paiement CHECK (
        (ID_Commande IS NOT NULL AND ID_Prestation IS NULL)
        OR
        (ID_Commande IS NULL AND ID_Prestation IS NOT NULL)
    ),
    CONSTRAINT fk__Paiement__Commande FOREIGN KEY (ID_Commande) REFERENCES Commande (ID),
    CONSTRAINT fk__Paiement__Prestation FOREIGN KEY (ID_Prestation) REFERENCES Prestation (ID)
);
--ou
-- CREATE TABLE IF NOT EXISTS Paiement_Commande (
--     ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
--     ID_Commande INT UNSIGNED,
--     montant DECIMAL(15, 2) DEFAULT 0.00,
--     type_paiement ENUM('pourcentage', 'fixe') DEFAULT 'fixe',
--     methode_paiement ENUM('cart', 'cash') DEFAULT 'cash',
--     is_pay BOOLEAN DEFAULT TRUE,
--     CONSTRAINT fk__Paiement__Commande FOREIGN KEY (ID_Commande) REFERENCES Commande (ID)
-- );
-- CREATE TABLE IF NOT EXISTS Paiement_Prestation (
--     ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
--     ID_Prestation INT UNSIGNED,
--     montant DECIMAL(15, 2) DEFAULT 0.00,
--     type_paiement ENUM('pourcentage', 'fixe') DEFAULT 'fixe',
--     methode_paiement ENUM('cart', 'cash') DEFAULT 'cash',
--     is_pay BOOLEAN DEFAULT TRUE,
--     CONSTRAINT fk__Paiement__Prestation FOREIGN KEY (ID_Prestation) REFERENCES Prestation (ID)
-- );
CREATE TABLE IF NOT EXISTS Retour (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ID_Ligne_Panier INT UNSIGNED,
    quantite INT UNSIGNED NOT NULL DEFAULT 0,
    motif TEXT,
    etat_produit ENUM('Comme neuf', 'Casser', 'Pouri') DEFAULT 'Comme neuf',
    date_retour DATETIME NOT NULL,
    statut_retour ENUM('En cour', 'Inspection', 'rejeter', 'remi') DEFAULT 'En cour',
    CONSTRAINT fk__Retour__Ligne_Panier FOREIGN KEY (ID_Ligne_Panier) REFERENCES Ligne_Panier (ID)
);
CREATE TABLE IF NOT EXISTS Remboursement_Plante (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ID_Paiement INT UNSIGNED,
    ID_Retour INT UNSIGNED,
    montant_rembourse DECIMAL(15, 2) DEFAULT 0.00,
    date_remboursement DATETIME NOT NULL,
    CONSTRAINT fk__Remboursement__Retour FOREIGN KEY (ID_Retour) REFERENCES Retour (ID),
    CONSTRAINT fk__Remboursement__Paiement FOREIGN KEY (ID_Paiement) REFERENCES Paiement (ID)
);
CREATE TABLE IF NOT EXISTS Remboursement_Prestation (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ID_Paiement INT UNSIGNED,
    ID_Prestation INT UNSIGNED,
    motif TEXT,
    montant_rembourse DECIMAL(15, 2) DEFAULT 0.00,
    date_remboursement DATETIME NOT NULL,
    CONSTRAINT fk__Remboursement__Prestation FOREIGN KEY (ID_Prestation) REFERENCES Prestation (ID),
    CONSTRAINT fk__Remboursement__Paiement FOREIGN KEY (ID_Paiement) REFERENCES Paiement (ID)
);
