/*
Tabellennamen noch nicht final
*/
DROP TABLE IF EXISTS `stammdaten_beruf`;
DROP TABLE IF EXISTS `stammdaten_herkunftsschule`;
DROP TABLE IF EXISTS `stammdaten_betrieb`;

CREATE TABLE `stammdaten_beruf`
(
  `nr`              int         NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `kurzbezeichnung` varchar(35) NOT NULL DEFAULT '',
  `bezeichnung`     varchar(60) NOT NULL DEFAULT '',
  `klasse`          varchar(8)  NOT NULL DEFAULT '',
  `raum`            varchar(4)  NOT NULL DEFAULT '',
  `gefuehrt`        int         NOT NULL DEFAULT 0,
  `erster_schultag` date                 DEFAULT NULL,
  `kammer`          char(3)              DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE =utf8_general_ci;


CREATE TABLE `stammdaten_herkunftsschule`
(
  `nr`      int         NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name`    varchar(50) NOT NULL DEFAULT '',
  `strasse` varchar(30) NOT NULL DEFAULT '',
  `hausnr`  varchar(5)  NOT NULL 0,
  `plz`     varchar(5)  NOT NULL DEFAULT '',
  `ort`     varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE =utf8_general_ci;


CREATE TABLE `stammdaten_betrieb`
(
  `schluessel`  varchar(6)  NOT NULL DEFAULT '' PRIMARY KEY,
  `name1`       varchar(50) NOT NULL DEFAULT '',
  `name2`       varchar(50) NOT NULL DEFAULT '',
  `name3`       varchar(45) NOT NULL DEFAULT '',
  `name4`       varchar(45) NOT NULL DEFAULT '',
  `strasse`     varchar(30) NOT NULL DEFAULT '',
  `hausnr`      varchar(5)  NOT NULL 0,
  `plz`         varchar(5)  NOT NULL DEFAULT '',
  `ort`         varchar(30) NOT NULL DEFAULT '',
  `telefon1`    varchar(18) NOT NULL DEFAULT '',
  `telefon2`    varchar(18) NOT NULL DEFAULT '',
  `telefon3`    varchar(18) NOT NULL DEFAULT '',
  `email`       varchar(45) NOT NULL DEFAULT '',
  `gemeinde_kz` varchar(6)  NOT NULL DEFAULT '',
  `bbig`        varchar(6)  NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE =utf8_unicode_ci;


