CREATE TABLE IF NOT EXISTS Employe (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
    job VARCHAR(155) NOT NULL,
    statut VARCHAR(255) DEFAULT 'jardinier'
);
CREATE TABLE IF NOT EXISTS Type_Service (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description_generale TEXT,
    prix_horaire DECIMAL(10, 2) UNSIGNED NOT NULL DEFAULT 0.00
);
CREATE TABLE IF NOT EXISTS Prestation (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ID_User INT UNSIGNED,
    ID_Type_Service INT UNSIGNED,
    ID_Adresse INT UNSIGNED,
    instructions TEXT,
    prix_prestation_historique DECIMAL(10, 2) UNSIGNED NOT NULL DEFAULT 0.00,
    statut ENUM('Pas commenser','En cour', 'Fini') DEFAULT 'Pas commenser',
    CONSTRAINT fk__Prestation__User FOREIGN KEY (ID_User) REFERENCES User (ID),
    CONSTRAINT fk__Prestation__Adresse FOREIGN KEY (ID_Adresse) REFERENCES Adresse (ID),
    CONSTRAINT fk__Prestation_Type__Service FOREIGN KEY (ID_Type_Service) REFERENCES Type_Service (ID)
);
CREATE TABLE IF NOT EXISTS Rendez_Vous (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ID_Prestation INT UNSIGNED,
    ID_Employe INT UNSIGNED,
    date_debut DATETIME,
    date_fin DATETIME,
    compte_rendu TEXT,
    CONSTRAINT fk__Rendez_Vous__Prestation FOREIGN KEY (ID_Prestation) REFERENCES User (ID) ON DELETE CASCADE,
    CONSTRAINT fk__Rendez_Vous__Prestation FOREIGN KEY (ID_Employe) REFERENCES Type_Service (ID)
);
