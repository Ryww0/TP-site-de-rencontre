-- Active: 1659692303810@@127.0.0.1@3306@bdd

DROP DATABASE IF EXISTS bdd ;

CREATE DATABASE
    bdd CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

use bdd;

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
        idUser INT(11) UNSIGNED NOT NULL,
        idSport INT(11) UNSIGNED NOT NULL,
        level VARCHAR(255) NOT NULL,
        CONSTRAINT fk_Pratique_User FOREIGN KEY (idUser) REFERENCES User(idUser),
        CONSTRAINT fk_Sport_User FOREIGN KEY (idSport) REFERENCES User(idSport)
    );

CREATE TABLE
    Sport (
        idSport INT (11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nameSport VARCHAR (255) NOT NULL
    );

INSERT INTO
    User (
        nameUser,
        mailUser,
        passwordUser,
        numDpt
    )
VALUES (
        'MathMoiCa',
        'MathMoiCa@gmail.com',
        '123456',
        '01'
    ), (
        'SuleyPine',
        'SuleyPine@outlook.fr',
        '56789',
        '38'
    ), (
        'Natashatte',
        'Natashatte@yahoo.fr',
        '98765',
        '38'
    ), (
        'PtiCulEnFeu69',
        'PtiCul@outlook.fr',
        '543210',
        '69'
    ), (
        'Pauline2quilatienne..',
        'Pauline@gmail.com',
        '02468',
        '69'
    );

INSERT INTO
    departement (numDpt, Dpt)
VALUES ('01', 'Ain'), ('69', 'Rhone'), ('38', 'Isère'), ('39', 'Jura'), ('29', 'Finistere');

INSERT INTO Sport (nameSport)
VALUES ('football'), ('basketball'), ('tennis'), ('aqua-poney');

INSERT INTO
    Pratique (idUser, idSport, level)
VALUES (0, 3, 'pro'), (1, 0, 'debutant'), (2, 1, 'supporter'), (3, 2, 'confirme'), (4, 0, 'supporter');