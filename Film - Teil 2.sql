-- Teil 2

CREATE SCHEMA if not exists filme;

USE filme;

CREATE TABLE Film (
FilmNr int PRIMARY KEY AUTO_INCREMENT,
Filmtitel varchar(255),
Erscheinungsdatum date,
FirmenNr int
);

ALTER TABLE Film AUTO_INCREMENT = 3000;

CREATE TABLE Studio (
StudioID int,
StudioName varchar(255)
)

