-- Teil 2                                           Create Film tabelle
/*
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
*/


-- Datenbank erweitern

USE filme;

CREATE TABLE Schauspieler (
SId int PRIMARY KEY,
Vorname varchar(255),
Nachname varchar(255),
Herkunftsland varchar(255),
FilmNr int,
CONSTRAINT FK_FilmNr 
FOREIGN KEY (FilmNr) REFERENCES film(FilmNr)
);


