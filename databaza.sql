CREATE DATABASE filmova_aplikacia;
USE filmova_aplikacia;

CREATE TABLE pouzivatelia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    meno VARCHAR(50)
);

CREATE TABLE filmy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pouzivatel_id INT,
    nazov VARCHAR(255),
    zaner VARCHAR(100),
    rok INT,
    hodnotenie INT,
    vytvorene TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (pouzivatel_id) REFERENCES pouzivatelia(id)
);

INSERT INTO pouzivatelia (meno) VALUES ('admin');

INSERT INTO filmy (pouzivatel_id, nazov, zaner, rok, hodnotenie)
VALUES 
(1, 'Inception', 'Sci-Fi', 2010, 9),
(1, 'Interstellar', 'Sci-Fi', 2014, 10);