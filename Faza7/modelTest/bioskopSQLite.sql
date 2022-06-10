CREATE TABLE Sala
(
	IdS                  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	Naziv                VARCHAR(20) NULL,
	Broj_Mesta           INTEGER NOT NULL
);
CREATE TABLE Korisnik
(
	IdK                  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	Ime                  VARCHAR(20) NULL,
	Prezime              VARCHAR(20) NULL,
	Mejl                 VARCHAR(50) NOT NULL,
	Lozinka              VARCHAR(20) NOT NULL
);
CREATE TABLE Administrator
(
	IdA                  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  FOREIGN KEY(IdA) REFERENCES Korisnik(IdK)
);

CREATE TABLE Ucesnik_u_filmu
(
	IdU                  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	Ime                  VARCHAR(20) NULL,
	Prezime              VARCHAR(20) NULL
);

CREATE TABLE Predstavnik_filma
(
	IdPF                 INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	Kompanija            VARCHAR(50) NULL,
	FOREIGN KEY(IdPF) REFERENCES Korisnik(IdK)
);
CREATE TABLE Film
(
	IdF                  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	Naziv                VARCHAR(20) NOT NULL,
	Opis                 TEXT NULL,
	Duzina               VARCHAR(20) NULL,
	Drzava_Godina        VARCHAR(50) NULL,
	Pocetak_prikazivanja DATE NULL,
	Zanr                 VARCHAR(20) NULL,
	Status               VARCHAR(20) NULL,
	Poster 		     mediumblob DEFAULT NULL,
  	Trejler 	     longblob DEFAULT NULL,
	IdUG                 INTEGER NOT NULL,
	IdUR                 INTEGER NOT NULL,
	IdPF                 INTEGER NULL,
  FOREIGN KEY(IdUG) REFERENCES Ucesnik_u_filmu(IdU),
  FOREIGN KEY(IdUR) REFERENCES Ucesnik_u_filmu(IdU),
  FOREIGN KEY(IdUG) REFERENCES Predstavnik_filma(IdU)
);

CREATE TABLE Gledalac
(
	IdG                  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  FOREIGN KEY(IdG) REFERENCES Korisnik(IdK)
);

CREATE TABLE Glumac
(
	IdUG                 INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  FOREIGN KEY(IdUG) REFERENCES Ucesnik_u_Filmu(IdU)
);


CREATE TABLE Mesto
(
	IdM                  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	Red                  INTEGER NOT NULL,
	Mesto                INTEGER NOT NULL,
	IdS                  INTEGER NOT NULL,
	IdR                  INTEGER NULL,
  FOREIGN key(IdS) REFERENCES Sala(IdS),
  FOREIGN KEY(IdR) REFERENCES Rezervacija(IdR)
);

CREATE TABLE Projekcija
(
	IdP                  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	Datum                DATE NOT NULL,
	Vreme                TIME NOT NULL,
	Premijera            boolean NULL,
	IdF                  INTEGER NOT NULL,
	IdS                  INTEGER NOT NULL,
  FOREIGN key(IdF) REFERENCES Film(IdF),
  FOREIGN KEY(IdS) REFERENCES Sala(IdS)
);

CREATE TABLE Rezervacija
(
	IdR                  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	Broj_Karata          INTEGER NOT NULL,
	IdP                  INTEGER NOT NULL,
	IdG                  INTEGER NOT NULL,
  FOREIGN key(IdP) REFERENCES Projekcija(IdP),
  FOREIGN key(IdG) REFERENCES Gledalac(IdG)
);

CREATE TABLE Reziser
(
	IdUR                 INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  FOREIGN key(IdUR) REFERENCES Ucesnik_u_Filmu(IdU)
);


