-- SCRIPT PER RICREARE IL DATABASE, DA ESEGUIRE SU PHPMYADMIN

CREATE DATABASE IF NOT EXISTS utenti;   --crea il db, se non esiste già

USE utenti; --seleziona il db

CREATE TABLE utenti (   --crea la tabella "utenti"
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL, --creazione del singolo campo
    password VARCHAR(255) NOT NULL
);

INSERT INTO utenti (username,password) VALUES   --inseriamo manualmente degli utenti
    ('admin', '$2y$10$xHMvNdLv.xxxqKlG2HABHuWE4.T7AAuuaxOaMTqIS0Hbj6yMLqWsW'),  --pw: Passw0rd
    ('utente', '$2y$10$4oNTPFb5WZP3/Ly6dj3LRe0z9DqeJEGMXTvEpOM6iBip5D23sLxhW'); --pw: 1234