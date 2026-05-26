CREATE TABLE IF NOT EXISTS Adresse (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ID_User INT UNSIGNED,
    rue VARCHAR(255) NOT NULL,
    ville VARCHAR(255) NOT NULL,
    code_postal VARCHAR(10) NOT NULL,
    telephone_contact VARCHAR(20),
    latitude DECIMAL(10, 8),
    longitude DECIMAL(10, 8),
    instructions TEXT,
    est_defaut BOOLEAN DEFAULT FALSE,
    -- OU est_defaut TINYINT(1) DEFAULT 0 en ca erreur
    CONSTRAINT fk__Adresse__User FOREIGN KEY (ID_user) REFERENCES User (ID) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS Livraison (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ID_Adresse INT UNSIGNED,
    ID_Commande INT UNSIGNED,
    date_prevu DATETIME,
    date_reelle DATETIME,
    CONSTRAINT fk__Livraison__Adresse FOREIGN KEY (ID_Adresse) REFERENCES Adresse (ID),
    CONSTRAINT fk__Livraison__Commande FOREIGN KEY (ID_Commande) REFERENCES Commande (ID) ON DELETE CASCADE
);
