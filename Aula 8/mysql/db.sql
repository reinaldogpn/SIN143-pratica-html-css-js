DROP DATABASE IF EXISTS aula08;
CREATE DATABASE aula08;
USE aula08;

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    PRIMARY KEY (id)
);

CREATE TABLE games (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE,
    price DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE users_games (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES games(id)
);

INSERT INTO users (name, email) 
VALUES ('João', 'joao@email.com'),
       ('Maria', 'maria@email.com'),
       ('José', 'josé@email.com'),
       ('Ana', 'ana@email.com'),
       ('Pedro', 'pedro@email.com'),
       ('Paulo', 'paulo@email.com'),
       ('Lucas', 'lucas@email.com');

INSERT INTO games (name, price)
VALUES ('Grand Theft Auto V', 50.00),
       ('FIFA 2023', 100.00),
       ('Counter-Strike 2', 80.00),
       ('The Sims 4', 150.00),
       ('Minecraft', 100.00),
       ('The Witcher 3: Wild Hunt', 30.00),
       ('Project Zomboid', 20.00);