USE formation_php;

DROP TABLE IF EXISTS users_security;
-- Création de la table
CREATE TABLE IF NOT EXISTS users_security (
    id INT UNSIGNED AUTO_INCREMENT,
    Username VARCHAR(50) NOT NULL,
    Login VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);