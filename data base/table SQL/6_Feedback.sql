CREATE TABLE IF NOT EXISTS Avis (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ID_User INT UNSIGNED,
    commentaire TEXT,
    note TINYINT UNSIGNED NOT NULL,
    date_publier DATETIME,
    CONSTRAINT chk__note_produit_valide CHECK (note >= 0 AND note <= 5),
    CONSTRAINT fk__Avis_Produit__User FOREIGN KEY (ID_User) REFERENCES User (ID)
);