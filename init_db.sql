CREATE TABLE IF NOT EXISTS projetcd (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Titre VARCHAR(255) NOT NULL,
    Auteur VARCHAR(255) NOT NULL,
    Genre VARCHAR(100),
    Prix DECIMAL(10, 2),
    Image TEXT
);

INSERT INTO projetcd (Titre, Auteur, Genre, Prix, Image) VALUES
('Pulse', 'Auteur 1', 'Electro', 19.99, 'vignettes/Pulse.jpg');