CREATE TABLE utilisateur
(
  id      int(11)       NOT NULL AUTO_INCREMENT,
  nom     varchar(50)   NOT NULL,
  prenom  varchar(50)   NOT NULL,
  genre   char(1)       NOT NULL,
  email   varchar(200),
  gsm     varchar(16),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO utilisateur (nom, prenom, genre, email, gsm) VALUES
('Dupond','Jean','S','mon.mail@mailing.be','+32488845411'),
('Duschmol','Jane','A','son.mailing@mail.be','+32484554411');
