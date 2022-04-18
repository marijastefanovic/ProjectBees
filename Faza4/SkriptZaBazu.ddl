
CREATE TABLE Administrastor
(
	IdA                  INTEGER NOT NULL
);

ALTER TABLE Administrastor
ADD CONSTRAINT XPKAdministrastor PRIMARY KEY (IdA);

CREATE TABLE Film
(
	IdF                  INTEGER NOT NULL,
	Naziv                VARCHAR(20) NOT NULL,
	Opis                 TEXT NULL,
	Duzina               VARCHAR(20) NULL,
	Drzava_Godina        VARCHAR(50) NULL,
	Pocetak_prikazivanja DATE NULL,
	Zanr                 VARCHAR(20) NULL,
	Status               VARCHAR(20) NULL,
	Poster               VARBINARY NULL,
	Trejler              VARBINARY NULL,
	IdUG                 INTEGER NOT NULL,
	IdUR                 INTEGER NOT NULL,
	IdPF                 INTEGER NULL
);

ALTER TABLE Film
ADD CONSTRAINT XPKFilm PRIMARY KEY (IdF);

CREATE TABLE Gledalac
(
	IdG                  INTEGER NOT NULL
);

ALTER TABLE Gledalac
ADD CONSTRAINT XPKGledalac PRIMARY KEY (IdG);

CREATE TABLE Glumac
(
	IdUG                 INTEGER NOT NULL
);

ALTER TABLE Glumac
ADD CONSTRAINT XPKGlumac PRIMARY KEY (IdUG);

CREATE TABLE Korisnik
(
	IdK                  INTEGER NOT NULL,
	Ime                  VARCHAR(20) NULL,
	Prezime              VARCHAR(20) NULL,
	Mejl                 VARCHAR(50) NOT NULL,
	Lozinka              VARCHAR(20) NOT NULL
);

ALTER TABLE Korisnik
ADD CONSTRAINT XPKKorisnik PRIMARY KEY (IdK);

CREATE TABLE Mesto
(
	IdM                  INTEGER NOT NULL,
	Red                  INTEGER NOT NULL,
	Mesto                INTEGER NOT NULL,
	IdS                  INTEGER NOT NULL,
	IdR                  INTEGER NULL
);

ALTER TABLE Mesto
ADD CONSTRAINT XPKMesto PRIMARY KEY (IdM);

CREATE TABLE Predstavnik_filma
(
	Kompanija            VARCHAR(50) NULL,
	IdPF                 INTEGER NOT NULL
);

ALTER TABLE Predstavnik_filma
ADD CONSTRAINT XPKPredstavnik_filma PRIMARY KEY (IdPF);

CREATE TABLE Projekcija
(
	IdP                  INTEGER NOT NULL,
	Datum                DATE NOT NULL,
	Vreme                TIME NOT NULL,
	Premijera            boolean NULL,
	IdF                  INTEGER NOT NULL,
	IdS                  INTEGER NOT NULL
);

ALTER TABLE Projekcija
ADD CONSTRAINT XPKProjekcija PRIMARY KEY (IdP);

CREATE TABLE Rezervacija
(
	IdR                  INTEGER NOT NULL,
	Broj_Karata          INTEGER NOT NULL,
	IdP                  INTEGER NOT NULL,
	IdG                  INTEGER NOT NULL
);

ALTER TABLE Rezervacija
ADD CONSTRAINT XPKRezervacija PRIMARY KEY (IdR);

CREATE TABLE Reziser
(
	IdUR                 INTEGER NOT NULL
);

ALTER TABLE Reziser
ADD CONSTRAINT XPKReziser PRIMARY KEY (IdUR);

CREATE TABLE Sala
(
	IdS                  INTEGER NOT NULL,
	Naziv                VARCHAR(20) NULL,
	Broj_Mesta           INTEGER NOT NULL
);

ALTER TABLE Sala
ADD CONSTRAINT XPKSala PRIMARY KEY (IdS);

CREATE TABLE Ucesnik_u_filmu
(
	IdU                  INTEGER NOT NULL,
	Ime                  VARCHAR(20) NULL,
	Prezime              VARCHAR(20) NULL
);

ALTER TABLE Ucesnik_u_filmu
ADD CONSTRAINT XPKUcesnik_u_filmu PRIMARY KEY (IdU);

ALTER TABLE Administrastor
ADD CONSTRAINT R_3 FOREIGN KEY (IdA) REFERENCES Korisnik (IdK)
		ON DELETE CASCADE;

ALTER TABLE Film
ADD CONSTRAINT R_6 FOREIGN KEY (IdUG) REFERENCES Glumac (IdUG);

ALTER TABLE Film
ADD CONSTRAINT R_7 FOREIGN KEY (IdUR) REFERENCES Reziser (IdUR);

ALTER TABLE Film
ADD CONSTRAINT R_19 FOREIGN KEY (IdPF) REFERENCES Predstavnik_filma (IdPF);

ALTER TABLE Gledalac
ADD CONSTRAINT R_1 FOREIGN KEY (IdG) REFERENCES Korisnik (IdK)
		ON DELETE CASCADE;

ALTER TABLE Glumac
ADD CONSTRAINT R_5 FOREIGN KEY (IdUG) REFERENCES Ucesnik_u_filmu (IdU)
		ON DELETE CASCADE;

ALTER TABLE Mesto
ADD CONSTRAINT R_12 FOREIGN KEY (IdS) REFERENCES Sala (IdS);

ALTER TABLE Mesto
ADD CONSTRAINT R_16 FOREIGN KEY (IdR) REFERENCES Rezervacija (IdR);

ALTER TABLE Predstavnik_filma
ADD CONSTRAINT R_2 FOREIGN KEY (IdPF) REFERENCES Korisnik (IdK)
		ON DELETE CASCADE;

ALTER TABLE Projekcija
ADD CONSTRAINT R_13 FOREIGN KEY (IdF) REFERENCES Film (IdF);

ALTER TABLE Projekcija
ADD CONSTRAINT R_14 FOREIGN KEY (IdS) REFERENCES Sala (IdS);

ALTER TABLE Rezervacija
ADD CONSTRAINT R_17 FOREIGN KEY (IdP) REFERENCES Projekcija (IdP);

ALTER TABLE Rezervacija
ADD CONSTRAINT R_18 FOREIGN KEY (IdG) REFERENCES Gledalac (IdG);

ALTER TABLE Reziser
ADD CONSTRAINT R_4 FOREIGN KEY (IdUR) REFERENCES Ucesnik_u_filmu (IdU)
		ON DELETE CASCADE;
