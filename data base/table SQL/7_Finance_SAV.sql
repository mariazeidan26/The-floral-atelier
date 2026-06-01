CREATE TABLE IF NOT EXISTS Paiement (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ID_Commande INT UNSIGNED NULL,
    montant DECIMAL(9, 2) DEFAULT 0.00,
    methode_paiement ENUM('cart', 'cash') DEFAULT 'cash',
    is_pay BOOLEAN DEFAULT FALSE,
    CONSTRAINT fk__Paiement__Commande FOREIGN KEY (ID_Commande) REFERENCES Commande (ID)
);
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
    is_Remboursement BOOLEAN DEFAULT TRUE,
    CONSTRAINT fk__Remboursement_Plante__Retour FOREIGN KEY (ID_Retour) REFERENCES Retour (ID),
    CONSTRAINT fk__Remboursement_Plante__Paiement FOREIGN KEY (ID_Paiement) REFERENCES Paiement (ID)
);
CREATE TABLE IF NOT EXISTS Remboursement_servise (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ID_Planting INT UNSIGNED NOT NULL,
    ID_Maintenance INT UNSIGNED,
    ID_Paiement INT UNSIGNED,
    motif TEXT,
    montant_rembourse DECIMAL(15, 2) DEFAULT 0.00,
    date_remboursement DATETIME NOT NULL,
    is_Remboursement BOOLEAN DEFAULT TRUE,
    CONSTRAINT fk__Remboursement_servise__Planting FOREIGN KEY (ID_Planting) REFERENCES Planting (ID_Adresse),
    CONSTRAINT fk__Remboursement_servise__Maintenance FOREIGN KEY (ID_Maintenance) REFERENCES Maintenance (ID_Adresse),
    CONSTRAINT fk__Remboursement_servise__Paiement FOREIGN KEY (ID_Paiement) REFERENCES Paiement (ID)
);
