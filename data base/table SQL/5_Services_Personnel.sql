CREATE TABLE IF NOT EXISTS Planting(
    ID_Adresse INT unsigned PRIMARY KEY,
    date_visit DATE NOT NULL,
    number_plantes INT UNSIGNED NOT NULL DEFAULT 1,
    CONSTRAINT fk_Planting_Adresse FOREIGN KEY (ID_Adresse) REFERENCES Adresse(ID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Maintenance(
    ID_Adresse INT unsigned PRIMARY KEY,
    frequence VARCHAR(50),
    week_day VARCHAR(50) NOT NULL,
    number_plantes INT UNSIGNED NOT NULL DEFAULT 1,
    CONSTRAINT fk_Maintenance_Adresse FOREIGN KEY (ID_Adresse) REFERENCES Adresse(ID) ON DELETE CASCADE
);