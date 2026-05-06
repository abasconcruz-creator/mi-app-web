-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS ranking_videojuegos;
USE ranking_videojuegos;

-- Crear tabla: plataformas
CREATE TABLE IF NOT EXISTS plataformas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    fabricante VARCHAR(100) NOT NULL
);

-- Crear tabla: juegos
CREATE TABLE IF NOT EXISTS juegos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    genero VARCHAR(100) NOT NULL,
    puntuacion DECIMAL(4, 2) NOT NULL,
    id_plataforma INT,
    FOREIGN KEY (id_plataforma) REFERENCES plataformas(id) ON DELETE SET NULL
);

-- Insertar 5 registros de ejemplo en la tabla plataformas
INSERT INTO plataformas (nombre, fabricante) VALUES
('PlayStation 5', 'Sony'),
('Xbox Series X', 'Microsoft'),
('Nintendo Switch', 'Nintendo'),
('PC', 'Varios'),
('PlayStation 4', 'Sony');

-- Insertar 5 registros de ejemplo en la tabla juegos
INSERT INTO juegos (titulo, genero, puntuacion, id_plataforma) VALUES
('The Legend of Zelda: Breath of the Wild', 'Acción/Aventura', 9.7, 3),
('God of War Ragnarök', 'Acción/Aventura', 9.4, 1),
('Elden Ring', 'RPG de Acción', 9.6, 4),
('Halo Infinite', 'Shooter', 8.7, 2),
('Bloodborne', 'RPG de Acción', 9.2, 5);
