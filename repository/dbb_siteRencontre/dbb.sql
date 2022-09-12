DROP DATABASE IF EXISTS dbb_siteRenccontre ;

CREATE DATABASE
    dbb_siteRenccontre CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

use dbb_siteRenccontre;

CREATE TABLE
    User (
        idUser INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nameUser VARCHAR(255) NOT NULL,
        mailUser VARCHAR(255) NOT NULL,
        passwordUser VARCHAR(255) NOT NULL,
        numDpt INT(11) UNSIGNED NOT NULL,
        CONSTRAINT fk_Departement_User FOREIGN KEY (numDpt) REFERENCES User(numDpt)
    );

CREATE TABLE
    Departement (
        numDpt INT (11) UNSIGNED NOT NULL PRIMARY KEY,
        Dpt VARCHAR(255) NOT NULL
    );

CREATE TABLE
    Pratique(
        idUser INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        idSport INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        CONSTRAINT fk_Pratique_User FOREIGN KEY (idUser) REFERENCES User(idUser),
        CONSTRAINT fk_Sport_User FOREIGN KEY (idSport) REFERENCES User(idSport)
    );

CREATE TABLE
    Sport (
        idSport INT (11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nameSport VARCHAR (255) NOT NULL,
    );