
CREATE TABLE Administrator
(
	IdA                  INTEGER NOT NULL
);

ALTER TABLE Administrator
ADD CONSTRAINT XPKAdministrator PRIMARY KEY (IdA);

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
	Poster 		     mediumblob DEFAULT NULL,
  	Trejler 	     longblob DEFAULT NULL,
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
	IdPF                 INTEGER NOT NULL,
	Kompanija            VARCHAR(50) NULL
	
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

ALTER TABLE `administrator` CHANGE `IdA` `IdA` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `film` CHANGE `IdF` `IdF` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `gledalac` CHANGE `IdG` `IdG` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `glumac` CHANGE `IdUG` `IdUG` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `korisnik` CHANGE `IdK` `IdK` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `mesto` CHANGE `IdM` `IdM` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `predstavnik_filma` CHANGE `IdPF` `IdPF` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `projekcija` CHANGE `IdP` `IdP` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `rezervacija` CHANGE `IdR` `IdR` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `reziser` CHANGE `IdUR` `IdUR` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `sala` CHANGE `IdS` `IdS` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `ucesnik_u_filmu` CHANGE `IdU` `IdU` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE Administrator
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
INSERT INTO `korisnik`(`IdK`, `Ime`, `Prezime`, `Mejl`, `Lozinka`) VALUES ('','Petar','Petrovic','gledalac1@gmail.com','gledalac1');
INSERT INTO `korisnik`(`IdK`, `Ime`, `Prezime`, `Mejl`, `Lozinka`) VALUES ('','Marko','Markovic','gledalac2@gmail.com','gledalac2');
INSERT INTO `korisnik`(`IdK`, `Ime`, `Prezime`, `Mejl`, `Lozinka`) VALUES ('','Milica','Saric','gledalac3@gmail.com','gledalac3');
INSERT INTO `korisnik`(`IdK`, `Ime`, `Prezime`, `Mejl`, `Lozinka`) VALUES ('','Nemanja','Milovanovic','admin1@gmail.com','admin1');
INSERT INTO `korisnik`(`IdK`, `Ime`, `Prezime`, `Mejl`, `Lozinka`) VALUES ('','Anja','Despotovic','admin2@gmail.com','admin2');
INSERT INTO `korisnik`(`IdK`, `Ime`, `Prezime`, `Mejl`, `Lozinka`) VALUES ('','Filip','Miletic','admin3@gmail.com','admin3');
INSERT INTO `korisnik`(`IdK`, `Ime`, `Prezime`, `Mejl`, `Lozinka`) VALUES ('','Milena','Petrovic','predstavnik1@gmail.com','predstavnik1');
INSERT INTO `korisnik`(`IdK`, `Ime`, `Prezime`, `Mejl`, `Lozinka`) VALUES ('','Marija','Maric','predstavnik2@gmail.com','predstavnik2');
INSERT INTO `korisnik`(`IdK`, `Ime`, `Prezime`, `Mejl`, `Lozinka`) VALUES ('','Ana','Mijailovic','predstavnik3@gmail.com','predstavnik3');

INSERT INTO `gledalac`(`IdG`) VALUES ('1');
INSERT INTO `gledalac`(`IdG`) VALUES ('2');
INSERT INTO `gledalac`(`IdG`) VALUES ('3');

INSERT INTO `administrator`(`IdA`) VALUES ('4');
INSERT INTO `administrator`(`IdA`) VALUES ('5');
INSERT INTO `administrator`(`IdA`) VALUES ('6');

INSERT INTO `predstavnik_filma`(`IdPF`, `Kompanija`) VALUES ('7','kompanija1');
INSERT INTO `predstavnik_filma`(`IdPF`, `Kompanija`) VALUES ('8','kompanija2');
INSERT INTO `predstavnik_filma`(`IdPF`, `Kompanija`) VALUES ('9','kompanija3');

INSERT INTO `ucesnik_u_filmu`(`IdU`, `Ime`, `Prezime`) VALUES ('','Johnny','Depp');
INSERT INTO `ucesnik_u_filmu`(`IdU`, `Ime`, `Prezime`) VALUES ('','Robert','Pattinson');
INSERT INTO `ucesnik_u_filmu`(`IdU`, `Ime`, `Prezime`) VALUES ('','Tom','Holland');
INSERT INTO `ucesnik_u_filmu`(`IdU`, `Ime`, `Prezime`) VALUES ('','Matt','Reeves');
INSERT INTO `ucesnik_u_filmu`(`IdU`, `Ime`, `Prezime`) VALUES ('','Ruben','Fleischer');
INSERT INTO `ucesnik_u_filmu`(`IdU`, `Ime`, `Prezime`) VALUES ('','Martin','Verbinski');
INSERT INTO `ucesnik_u_filmu`(`IdU`, `Ime`, `Prezime`) VALUES ('','Joseph','Kosinski');
INSERT INTO `ucesnik_u_filmu`(`IdU`, `Ime`, `Prezime`) VALUES ('','Tom','Cruise');


INSERT INTO `reziser`(`IdUR`) VALUES ('4');
INSERT INTO `reziser`(`IdUR`) VALUES ('5');
INSERT INTO `reziser`(`IdUR`) VALUES ('6');
INSERT INTO `reziser`(`IdUR`) VALUES ('7');

INSERT INTO `glumac`(`IdUG`) VALUES ('1');
INSERT INTO `glumac`(`IdUG`) VALUES ('2');
INSERT INTO `glumac`(`IdUG`) VALUES ('3');
INSERT INTO `glumac`(`IdUG`) VALUES ('8');

INSERT INTO `film`(`IdF`, `Naziv`, `Opis`, `Duzina`, `Drzava_Godina`, `Pocetak_prikazivanja`, `Zanr`, `Status`, `Poster`, `Trejler`, `IdUG`, `IdUR`, `IdPF`) VALUES ('','Skriveni Grad','Pogrešna želja mladog oposuma zamrzava ceo njen rodni grad Sanktuari Siti i preti svima koji tamo žive.','143','AUS 2022','2022-06-11','Komedija','prihvacen','','','1','6','7');

INSERT INTO `film`(`IdF`, `Naziv`, `Opis`, `Duzina`, `Drzava_Godina`, `Pocetak_prikazivanja`, `Zanr`, `Status`, `Poster`, `Trejler`, `IdUG`, `IdUR`, `IdPF`) VALUES ('','Betmen','When a sadistic serial killer begins murdering key political figures in Gotham, Batman is forced to investigate the citys hidden corruption and question his familys involvement.','176','USA 2022','2022-06-06','Avantura','prihvacen','','','2','4','8');

INSERT INTO `film`(`IdF`, `Naziv`, `Opis`, `Duzina`, `Drzava_Godina`, `Pocetak_prikazivanja`, `Zanr`, `Status`, `Poster`, `Trejler`, `IdUG`, `IdUR`, `IdPF`) VALUES ('','Doktor Strejndž','U Marvel studiju „Doktor Strejndž u multiverzumu ludila“, MCU otklju?ava Multiverzum i pomera svoje granice dalje nego ikada ranije.','126','USA 2022','2022-06-12','Akcija, Fantastika','prihvacen','','','2','4','8');


INSERT INTO `film`(`IdF`, `Naziv`, `Opis`, `Duzina`, `Drzava_Godina`, `Pocetak_prikazivanja`, `Zanr`, `Status`, `Poster`, `Trejler`, `IdUG`, `IdUR`, `IdPF`) VALUES ('','Uncharted','Street-smart Nathan Drake is recruited by seasoned treasure hunter Victor "Sully" Sullivan to recover a fortune amassed by Ferdinand Magellan, and lost 500 years ago by the House of Moncada.','116','USA 2022','','Avantura','neresen','','','3','5','8');


INSERT INTO `film`(`IdF`, `Naziv`, `Opis`, `Duzina`, `Drzava_Godina`, `Pocetak_prikazivanja`, `Zanr`, `Status`, `Poster`, `Trejler`, `IdUG`, `IdUR`, `IdPF`) VALUES ('','Top Gan Maverik','Jedna od filmskih pri?a koja je obeležila živote mnogih od nas i zna?ajno uticala na veoma uspešnu karijeru jedne od najve?ih holivudskih zvezda, Toma Kruza, dobila je svoj nastavak','119','USA 2022','2022-06-09','Drama','prihvacen','','','8','7','7');


INSERT INTO `sala`(`IdS`, `Naziv`, `Broj_Mesta`) VALUES ('','Sala 1','48');
INSERT INTO `sala`(`IdS`, `Naziv`, `Broj_Mesta`) VALUES ('','Sala 2','48');
INSERT INTO `sala`(`IdS`, `Naziv`, `Broj_Mesta`) VALUES ('','Sala 3','48');

INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-11','18:00:00','1','1','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-12','12:00:00','0','1','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-12','18:00:00','0','1','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-13','15:00:00','0','1','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-13','12:00:00','0','1','3');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','18:00:00','0','1','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','20:00:00','0','1','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','15:00:00','0','1','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-16','18:00:00','0','1','1');

INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-11','18:00:00','0','2','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-12','12:00:00','0','2','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-12','18:00:00','0','2','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-12','15:00:00','0','2','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-14','12:00:00','0','2','3');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-14','18:00:00','0','2','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','12:00:00','0','2','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','15:00:00','0','2','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','12:00:00','0','2','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','15:00:00','0','2','3');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','21:00:00','0','2','1');

INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-12','20:00:00','1','3','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-13','12:00:00','0','3','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-13','15:00:00','0','3','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-13','18:00:00','0','3','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-14','15:00:00','0','3','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-14','19:00:00','0','3','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','15:00:00','0','3','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','15:00:00','0','3','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','18:00:00','0','3','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','21:00:00','0','3','2');

INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-11','14:00:00','0','5','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-11','18:00:00','0','5','3');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-11','20:00:00','0','5','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-12','15:00:00','0','5','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-13','12:00:00','0','5','3');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-14','14:00:00','0','5','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-14','17:00:00','0','5','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-14','20:00:00','0','5','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','16:00:00','0','5','1');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','19:00:00','0','5','2');
INSERT INTO `projekcija`(`IdP`, `Datum`, `Vreme`, `Premijera`, `IdF`, `IdS`) VALUES ('','2022-06-15','21:00:00','0','5','3');



INSERT INTO `rezervacija`(`IdR`, `Broj_Karata`, `IdP`, `IdG`) VALUES ('','2','1','1');
INSERT INTO `rezervacija`(`IdR`, `Broj_Karata`, `IdP`, `IdG`) VALUES ('','3','1','3');
INSERT INTO `rezervacija`(`IdR`, `Broj_Karata`, `IdP`, `IdG`) VALUES ('','6','1','2');
INSERT INTO `rezervacija`(`IdR`, `Broj_Karata`, `IdP`, `IdG`) VALUES ('','1','2','1');
INSERT INTO `rezervacija`(`IdR`, `Broj_Karata`, `IdP`, `IdG`) VALUES ('','3','2','1');

INSERT INTO `mesto`(`IdM`, `Red`, `Mesto`, `IdS`, `IdR`) VALUES ('','2','3','1','1');
INSERT INTO `mesto`(`IdM`, `Red`, `Mesto`, `IdS`, `IdR`) VALUES ('','2','4','1','1');
INSERT INTO `mesto`(`IdM`, `Red`, `Mesto`, `IdS`, `IdR`) VALUES ('','6','3','2','2');
INSERT INTO `mesto`(`IdM`, `Red`, `Mesto`, `IdS`, `IdR`) VALUES ('','6','4','2','2');
INSERT INTO `mesto`(`IdM`, `Red`, `Mesto`, `IdS`, `IdR`) VALUES ('','6','5','2','2');



