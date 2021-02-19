USE formation_php;

DROP TABLE IF EXISTS users_security_correction;
-- Création de la table
CREATE TABLE IF NOT EXISTS users_security_correction (
    id INT UNSIGNED AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    user_login VARCHAR(50) NOT NULL,
    user_password VARCHAR(50) NOT NULL,
    user_Avatar VARCHAR(50) NOT NULL DEFAULT 'default_avatar.jpg',
    PRIMARY KEY (id)
);