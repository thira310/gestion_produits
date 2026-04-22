CREATE DATABASE IF NOT EXISTS boutique;
USE boutique;

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(20) NOT NULL,
    label VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    quantite INT NOT NULL,
    prix INT NOT NULL,
    category VARCHAR(50) NOT NULL
);

INSERT INTO categories (code, label) VALUES 
('BS001', 'Sucrerie'),
('AL001', 'Alcool');

INSERT INTO produits (nom, description, quantite, prix, category) VALUES
('Coca Cola', 'Boisson avec sucre', 12, 500, 'Sucrerie'),
('Fanta', 'Boisson avec sucre', 10, 300, 'Sucrerie'),
('Heineken', 'Boisson avec alcool', 6, 800, 'Alcool');