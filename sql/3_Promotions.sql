CREATE TABLE IF NOT EXISTS Promotion(
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(255) NULL UNIQUE,
    nom VARCHAR(100) NOT NULL,
    details TEXT,
    valeur_reduction DECIMAL(5, 2) DEFAULT 0.00,
    type_reduction ENUM('pourcentage', 'fixe') DEFAULT 'fixe',
    date_debut DATETIME DEFAULT CURRENT_TIMESTAMP,
    date_expiration DATETIME NOT NULL,
    usage_max INT UNSIGNED DEFAULT NULL,
    usage_actuel INT UNSIGNED DEFAULT 0
);
CREATE TABLE IF NOT EXISTS Plante_Promotion(
    ID_Plante ID INT UNSIGNED,
    ID_Promotion ID INT UNSIGNED,
    CONSTRAINT fk__Plante_Promotion__Plante FOREIGN KEY (ID_Plante) REFERENCES Plante (ID),
    CONSTRAINT fk__Plante_Promotion__Promotion FOREIGN KEY (ID_Promotion) REFERENCES Promotion (ID),
    PRIMARY KEY(ID_Plante, ID_Promotion)
);
CREATE TABLE IF NOT EXISTS Client_Promotion(
    ID_User ID INT UNSIGNED,
    ID_Promotion ID INT UNSIGNED,
    CONSTRAINT fk__Plante_Promotion__User FOREIGN KEY (ID_User) REFERENCES User (ID),
    CONSTRAINT fk__Plante_Promotion__Promotion FOREIGN KEY (ID_Promotion) REFERENCES Promotion (ID),
    PRIMARY KEY(ID_Plante, ID_Promotion)
);