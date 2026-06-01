INSERT INTO Categorie (nom, details) VALUES 
('Plant', 'To bring greenery back into your apartment or to give as a luxurious gift.'),
('bouquet', 'Looking to express your feelings? This beautiful cocktail of colors will be absolutely perfect.'),
('flower', 'Why perfume your apartment if Mother Nature can do it for you? Perfect for your living room, bedroom, or balcony.'),
('flower custom', 'for custom bouquet');

INSERT INTO Plante (nom, ID_Categorie, details, prix, quantite) VALUES
('Areca Palm', 1, 'Graceful fronds instantly bring a tropical breeze into your home. Perfect for creating a light, exotic vibe in interiors or patios.', 66.52, 1082),
('Bamboo', 1, 'Minimalist and calming. You can use it as a natural room divider or garden element - bamboo brings harmony and lightness.', 98.54, 3216),
('Blooming charm', 2, ' ', 27.35 ,172),
('Blue hydrangea', 3, 'it brings a calming and serene beauty to any room, symbolizing gratitude and grace.', 52.74, 732),
('Blue hydrangea', 4, '', 5.28, 732),
('Cactus flower', 1, 'it symbolizes endurance and strength. When in bloom, these resilient plants surprise with incredibly vibrant and often fragrant blossoms.', 18.53, 3846),
('Dendrobium', 3, 'known for its starry, cascading blossoms. It symbolizes beauty and wisdom.', 34.95, 1344),
('Dendrobium', 4, '', 3.50, 1344),
('Dieffenbachia', 1, 'Striking leaf patterns bring color and texture. Ideal for shaded rooms needing a bold yet soft greenery accent.', 67.24, 3503),
('Heliconia', 1, 'Bold colors and dramatic forms make it a living sculpture. Adds vibrancy and a true tropical accent to modern interiors.', 29.63 ,2339),
('Iris', 3, 'it symbolizes wisdom, hope, and trust.', 33.74 ,2076),
('Iris', 4, '', 3.37 ,2076),
('lilac love', 2, ' ', 31 ,205),
('Pink clouds', 2, ' ', 47 ,268),
('Red roses', 2, ' ', 39.6 ,638),
('White orchid', 3, 'soft and graceful, the white orchid adds a peaceful charm to any setting.', 89.99,2895),
('White orchid', 4, '', 8.9,2895);

INSERT INTO Image_Plante (ID_Plante, url_image) VALUES
(1, 'assets/img/plant/Areca Palm.jpeg'),
(2, 'assets/img/plant/Bamboo.jpeg'),
(3, 'assets/img/plant/Blooming charm.jpeg'),
(4, 'assets/img/plant/Blue hydrangea.jpeg'),
(5, 'assets/img/plant/Blue hydrangea.jpeg'),
(6, 'assets/img/plant/Cactus flower.jpeg'),
(7, 'assets/img/plant/Dendrobium.jpeg'),
(8, 'assets/img/plant/Dendrobium.jpeg'),
(9, 'assets/img/plant/Dieffenbachia.jpeg'),
(10, 'assets/img/plant/Heliconia.jpeg'),
(11, 'assets/img/plant/Iris.jpeg'),
(12, 'assets/img/plant/lilac love.jpeg'),
(13, 'assets/img/plant/Pink clouds.jpeg'),
(14, 'assets/img/plant/Red roses.jpeg'),
(15, 'assets/img/plant/White orchid.jpeg'),
(16, 'assets/img/plant/White orchid.jpeg');