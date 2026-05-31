CREATE TABLE IF NOT EXISTS Avis (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    --ID_Ligne_Panier INT UNSIGNED,
    ID_User INT UNSIGNED,
    commentaire TEXT,
    note TINYINT UNSIGNED NOT NULL,
    date_publier DATETIME,
    CONSTRAINT chk__note_produit_valide CHECK (note >= 0 AND note <= 5),
    CONSTRAINT fk__Avis_Produit__User FOREIGN KEY (ID_User) REFERENCES User (ID),
    -- CONSTRAINT fk__Avis_Produit__Ligne_Panier FOREIGN KEY (ID_Ligne_Panier) REFERENCES Ligne_Panier (ID)
);
-- CREATE TABLE IF NOT EXISTS Avis_Service (
--     ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
--     ID_Rendez_Vous INT UNSIGNED,
--     ID_User INT UNSIGNED,
--     commentaire TEXT,
--     note TINYINT UNSIGNED NOT NULL,
--     date_publier DATETIME,
--     CONSTRAINT chk__note_Service_valide CHECK (note >= 0 AND note <= 5),
--     CONSTRAINT fk__Avis_Service__User FOREIGN KEY (ID_User) REFERENCES User (ID),
--     CONSTRAINT fk__Avis_Service__Rendez_Vous FOREIGN KEY (ID_Rendez_Vous) REFERENCES Rendez_Vous (ID)
-- );
