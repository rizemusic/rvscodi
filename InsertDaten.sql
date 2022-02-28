use patientenverwaltung;

insert into sozialversicherung (sozname) VALUES 
('OEGK'),
('BVAB'),
('SVS');

INSERT INTO patient (svnr, vorname, nachname, geburtstag,Sozialversicherung_sozID) VALUES 
(43241, 'Jochen','Wagner','1960-03-22',1),
(12211, 'Joe','Schmidt','1971-11-12',3),
(65421, 'Monika','Hagn','1966-04-2',2),
(64222, 'Elfriede','Krüger','1960-03-22',2),
(43459, 'Elfriede','Krüger','1960-03-22',2);

INSERT INTO termin (datum) VALUES
('2021-12-03T09:12.34'),
('2021-11-04T10:12:12'),
('2021-09-06T14:01:01');


INSERT INTO befund (Beschreibung, Termin_terID, Patient_svnr ) VALUES
('Patient zeigt keine Symtome',1,43241),
('Zustand verschlechtert',2,65421),
('Medikamente reduziert',3, 43459);

INSERT INTO medikament (medname) VALUES
('ASPIRIN'),
('Pharmazol'),
('Moltodol');

INSERT INTO befund_has_medikament (Befund_befID, Medikament_medID, dosierung) VALUES
(1,1,'2 Tropfen'),
(2,2,'1 Packung in Wasser auflösen'),
(3,3, '3 mal 2 Tabletten pro Tag');


