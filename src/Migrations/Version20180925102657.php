<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180925102657 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE beruf (id INT AUTO_INCREMENT NOT NULL, kurzbezeichnung VARCHAR(255) NOT NULL, bezeichnung VARCHAR(255) NOT NULL, klasse VARCHAR(255) DEFAULT NULL, raum VARCHAR(255) DEFAULT NULL, erster_schultag DATE DEFAULT NULL, ab_nr VARCHAR(255) NOT NULL, ab_gefuehrt INT NOT NULL, kammer VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schueler (SID INT AUTO_INCREMENT NOT NULL, ANREDE VARCHAR(255) NOT NULL, VORNAMEN VARCHAR(255) NOT NULL, RUFNAME VARCHAR(255) NOT NULL, GESCHLECHT VARCHAR(255) NOT NULL, GEBURTSDATUM DATE NOT NULL, GEBURTSORT VARCHAR(255) NOT NULL, GEBURTSLAND VARCHAR(255) NOT NULL, STAAT VARCHAR(255) NOT NULL, BEKENNTNIS VARCHAR(255) NOT NULL, FAMILIENSTAND VARCHAR(255) NOT NULL, E_MAIL1 VARCHAR(255) NOT NULL, ANSCHR1_STR VARCHAR(255) NOT NULL, ANSCHR1_PLZ VARCHAR(5) NOT NULL, ANSCHR1_ORT VARCHAR(255) NOT NULL, ANSCHR1_TEL VARCHAR(255) NOT NULL, ANSCHR1_FUER1 VARCHAR(255) NOT NULL, ANSCHR1_FUER2 VARCHAR(255) NOT NULL, ERZB1_ART VARCHAR(255) NOT NULL, ERZB1_ANREDE VARCHAR(255) NOT NULL, ERZB1_FAMNAME VARCHAR(255) NOT NULL, ERZB1_RUFNAME VARCHAR(255) NOT NULL, ERZB1_TELEFON VARCHAR(255) NOT NULL, E_MAIL2 VARCHAR(255) NOT NULL, ERZB2_ART VARCHAR(255) NOT NULL, ERZB2_ANREDE VARCHAR(255) NOT NULL, ERZB2_FAMNAME VARCHAR(255) NOT NULL, ERZB2_RUFNAME VARCHAR(255) NOT NULL, ERZB2_TELEFON VARCHAR(255) NOT NULL, ANSCHR2_STR VARCHAR(255) NOT NULL, ANSCHR2_PLZ VARCHAR(255) NOT NULL, ANSCHR2_ORT VARCHAR(5) NOT NULL, ANSCHR2_TEL VARCHAR(255) NOT NULL, ANSCHR2_FUER1 VARCHAR(255) NOT NULL, ANSCHR2_FUER2 VARCHAR(255) NOT NULL, GASTSCHUELER TINYINT(1) NOT NULL, UMSCHUELER TINYINT(1) NOT NULL, KOSTENTRAEGER VARCHAR(255) NOT NULL, TRAEGERSITZ VARCHAR(255) NOT NULL, FOERDERUNGSNR VARCHAR(255) NOT NULL, SCHULPFLICHT TINYINT(1) NOT NULL, TAGESHEIM TINYINT(1) NOT NULL, AUSB_BEGINN DATE NOT NULL, AUSB_ENDE DATE NOT NULL, AUSB_DAUER VARCHAR(255) NOT NULL, AUSB_ART VARCHAR(255) NOT NULL, AUSB_BERUF VARCHAR(255) NOT NULL, AUSB_BETRIEB VARCHAR(255) NOT NULL, EINTRITTSDATUM DATE NOT NULL, KLASSE VARCHAR(255) NOT NULL, EINTR_JGST VARCHAR(255) NOT NULL, VON_SCHULART VARCHAR(255) NOT NULL, VON_SCHULNR VARCHAR(255) NOT NULL, SCHUL_VORBILD VARCHAR(255) NOT NULL, VORBILD_SCHUL VARCHAR(255) NOT NULL, sv_slbschule1 VARCHAR(255) NOT NULL, sv_slbschule1eintritt VARCHAR(255) NOT NULL, sv_slbschule1austritt VARCHAR(255) NOT NULL, sv_slbschule2 VARCHAR(255) NOT NULL, sv_slbschule2eintritt VARCHAR(255) NOT NULL, sv_slbschule2austritt VARCHAR(255) NOT NULL, sv_slbschule3 VARCHAR(255) NOT NULL, sv_slbschule3eintritt VARCHAR(255) NOT NULL, sv_slbschule3austritt VARCHAR(255) NOT NULL, sv_slbschule4 VARCHAR(255) NOT NULL, sv_slbschule4eintritt VARCHAR(255) NOT NULL, sv_slbschule4austritt VARCHAR(255) NOT NULL, ZUZUG_ART VARCHAR(255) NOT NULL, ZUZUG_DATUM DATE NOT NULL, KOMMENTAR VARCHAR(255) NOT NULL, ANMELDEDATUM DATE NOT NULL, ANMELDEZEIT VARCHAR(255) NOT NULL, DEUTSCH VARCHAR(255) NOT NULL, PRIMARY KEY(SID)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE berufekennungen');
        $this->addSql('DROP TABLE schuelerdaten');
        $this->addSql('ALTER TABLE betriebedaten CHANGE B_SCHLUESSEL B_SCHLUESSEL VARCHAR(255) NOT NULL, CHANGE B_NAME1 B_NAME1 VARCHAR(255) DEFAULT NULL, CHANGE B_NAME2 B_NAME2 VARCHAR(255) DEFAULT NULL, CHANGE B_NAME4 B_NAME4 VARCHAR(255) DEFAULT NULL, CHANGE B_PLZ B_PLZ INT DEFAULT NULL, CHANGE B_ORT B_ORT VARCHAR(255) DEFAULT NULL, CHANGE B_STRASSE B_STRASSE VARCHAR(255) DEFAULT NULL, CHANGE B_TELEFON1 B_TELEFON1 VARCHAR(255) DEFAULT NULL, CHANGE B_TELEFON2 B_TELEFON2 VARCHAR(255) DEFAULT NULL, CHANGE B_TELEFON3 B_TELEFON3 VARCHAR(255) DEFAULT NULL, CHANGE B_E_MAIL B_E_MAIL VARCHAR(255) DEFAULT NULL, CHANGE B_GEMEINDEKZ B_GEMEINDEKZ VARCHAR(255) NOT NULL, CHANGE B_BBIG B_BBIG VARCHAR(255) DEFAULT NULL, ADD PRIMARY KEY (B_SCHLUESSEL)');
        $this->addSql('ALTER TABLE herkunftsschulen CHANGE HKS_NUMMER HKS_NUMMER INT AUTO_INCREMENT NOT NULL, CHANGE HKS_NAME HKS_NAME VARCHAR(255) NOT NULL, CHANGE HKS_STRASSE HKS_STRASSE VARCHAR(255) NOT NULL, CHANGE HKS_PLZ HKS_PLZ INT NOT NULL, CHANGE HKS_ORT HKS_ORT VARCHAR(255) NOT NULL, ADD PRIMARY KEY (HKS_NUMMER)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE berufekennungen (AB_KURZBEZ VARCHAR(35) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, AB_BEZEICHNG VARCHAR(60) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, AB_NR VARCHAR(5) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, Klasse VARCHAR(8) DEFAULT NULL COLLATE utf8_unicode_ci, Raum VARCHAR(4) DEFAULT NULL COLLATE utf8_unicode_ci, Erster_Schultag VARCHAR(100) DEFAULT \'12.09.2005\' COLLATE utf8_unicode_ci, AB_GEFUEHRT INT DEFAULT 0 NOT NULL, Kammer CHAR(3) DEFAULT NULL COLLATE utf8_unicode_ci) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schuelerdaten (SID INT DEFAULT 0 NOT NULL, ANREDE CHAR(1) DEFAULT NULL COLLATE utf8_unicode_ci, FAMILIENNAME VARCHAR(30) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, VORNAMEN VARCHAR(30) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, RUFNAME VARCHAR(20) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, GESCHLECHT CHAR(1) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, GEBURTSDATUM VARCHAR(10) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, GEBURTSJAHR VARCHAR(4) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, GEBURTSORT VARCHAR(45) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, GEBURTSLAND CHAR(3) DEFAULT NULL COLLATE utf8_unicode_ci, STAAT CHAR(3) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, BEKENNTNIS CHAR(2) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, FAMILIENSTAND CHAR(1) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, E_MAIL1 VARCHAR(45) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, ANSCHR1_STR VARCHAR(30) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, ANSCHR1_PLZ VARCHAR(5) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, ANSCHR1_ORT VARCHAR(30) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, ANSCHR1_TEL VARCHAR(18) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, ANSCHR1_FUER1 CHAR(2) DEFAULT NULL COLLATE utf8_unicode_ci, ANSCHR1_FUER2 CHAR(2) DEFAULT NULL COLLATE utf8_unicode_ci, ERZB1_ART CHAR(2) DEFAULT NULL COLLATE utf8_unicode_ci, ERZB1_ANREDE CHAR(1) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, ERZB1_FAMNAME VARCHAR(30) DEFAULT NULL COLLATE utf8_unicode_ci, ERZB1_RUFNAME VARCHAR(25) DEFAULT NULL COLLATE utf8_unicode_ci, ERZB1_TELEFON VARCHAR(18) DEFAULT NULL COLLATE utf8_unicode_ci, E_MAIL2 VARCHAR(45) DEFAULT NULL COLLATE utf8_unicode_ci, ERZB2_ART CHAR(2) DEFAULT NULL COLLATE utf8_unicode_ci, ERZB2_ANREDE CHAR(1) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, ERZB2_FAMNAME VARCHAR(30) DEFAULT NULL COLLATE utf8_unicode_ci, ERZB2_RUFNAME VARCHAR(25) DEFAULT NULL COLLATE utf8_unicode_ci, ERZB2_TELEFON VARCHAR(18) DEFAULT NULL COLLATE utf8_unicode_ci, ANSCHR2_STR VARCHAR(30) DEFAULT NULL COLLATE utf8_unicode_ci, ANSCHR2_PLZ VARCHAR(5) DEFAULT NULL COLLATE utf8_unicode_ci, ANSCHR2_ORT VARCHAR(30) DEFAULT NULL COLLATE utf8_unicode_ci, ANSCHR2_TEL VARCHAR(18) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, ANSCHR2_FUER1 CHAR(2) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, ANSCHR2_FUER2 CHAR(2) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, GASTSCHUELER CHAR(1) DEFAULT NULL COLLATE utf8_unicode_ci, UMSCHUELER CHAR(1) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, KOSTENTRAEGER CHAR(3) DEFAULT NULL COLLATE utf8_unicode_ci, TRAEGERSITZ VARCHAR(30) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, FOERDERUNGSNR VARCHAR(15) DEFAULT NULL COLLATE utf8_unicode_ci, SCHULPFLICHT CHAR(1) DEFAULT NULL COLLATE utf8_unicode_ci, TAGESHEIM CHAR(1) DEFAULT NULL COLLATE utf8_unicode_ci, AUSB_BEGINN VARCHAR(10) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, AUSB_ENDE VARCHAR(10) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, AUSB_DAUER CHAR(3) DEFAULT NULL COLLATE utf8_unicode_ci, AUSB_ART VARCHAR(4) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, AUSB_BERUF VARCHAR(5) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, AUSB_BETRIEB VARCHAR(6) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, B_NAME1 VARCHAR(50) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, B_NAME4 VARCHAR(50) DEFAULT NULL COLLATE utf8_unicode_ci, B_STRASSE VARCHAR(30) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, B_PLZ VARCHAR(5) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, B_ORT VARCHAR(30) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, B_TELEFON1 VARCHAR(18) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, B_TELEFON2 VARCHAR(18) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, B_TELEFON3 VARCHAR(18) DEFAULT NULL COLLATE utf8_unicode_ci, B_E_MAIL VARCHAR(45) DEFAULT NULL COLLATE utf8_unicode_ci, B_BBIG CHAR(3) DEFAULT NULL COLLATE utf8_unicode_ci, KAMMER CHAR(3) DEFAULT NULL COLLATE utf8_unicode_ci, EINTRITTSDATUM VARCHAR(10) DEFAULT NULL COLLATE utf8_unicode_ci, KLASSE VARCHAR(9) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, EINTR_JGST INT DEFAULT 0 NOT NULL, VON_SCHULART CHAR(3) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, VON_SCHULNR VARCHAR(4) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, SCHUL_VORBILD VARCHAR(4) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, VORBILD_SCHUL CHAR(3) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, sv_slbschule1 VARCHAR(40) DEFAULT NULL COLLATE utf8_unicode_ci, sv_slbschule1eintritt VARCHAR(7) DEFAULT NULL COLLATE utf8_unicode_ci, sv_slbschule1austritt VARCHAR(7) DEFAULT NULL COLLATE utf8_unicode_ci, sv_slbschule2 VARCHAR(40) DEFAULT NULL COLLATE utf8_unicode_ci, sv_slbschule2eintritt VARCHAR(7) DEFAULT NULL COLLATE utf8_unicode_ci, sv_slbschule2austritt VARCHAR(7) DEFAULT NULL COLLATE utf8_unicode_ci, sv_slbschule3 VARCHAR(40) DEFAULT NULL COLLATE utf8_unicode_ci, sv_slbschule3eintritt VARCHAR(7) DEFAULT NULL COLLATE utf8_unicode_ci, sv_slbschule3austritt VARCHAR(7) DEFAULT NULL COLLATE utf8_unicode_ci, sv_slbschule4 VARCHAR(40) DEFAULT NULL COLLATE utf8_unicode_ci, sv_slbschule4eintritt VARCHAR(7) DEFAULT NULL COLLATE utf8_unicode_ci, sv_slbschule4austritt VARCHAR(7) DEFAULT NULL COLLATE utf8_unicode_ci, ZUZUG_ART CHAR(2) DEFAULT NULL COLLATE utf8_unicode_ci, ZUZUG_DATUM VARCHAR(10) DEFAULT NULL COLLATE utf8_unicode_ci, KOMMENTAR TEXT NOT NULL COLLATE utf8_unicode_ci, ANMELDEDATUM VARCHAR(10) DEFAULT NULL COLLATE utf8_unicode_ci, ANMELDEZEIT VARCHAR(10) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, DEUTSCH VARCHAR(1) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(FAMILIENNAME, RUFNAME, GEBURTSDATUM)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE beruf');
        $this->addSql('DROP TABLE schueler');
        $this->addSql('ALTER TABLE betriebedaten DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE betriebedaten CHANGE B_SCHLUESSEL B_SCHLUESSEL VARCHAR(6) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, CHANGE B_NAME1 B_NAME1 VARCHAR(50) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE B_NAME2 B_NAME2 VARCHAR(50) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE B_NAME4 B_NAME4 VARCHAR(45) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE B_PLZ B_PLZ VARCHAR(5) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE B_STRASSE B_STRASSE VARCHAR(30) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE B_ORT B_ORT VARCHAR(30) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE B_TELEFON1 B_TELEFON1 VARCHAR(18) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE B_TELEFON2 B_TELEFON2 VARCHAR(18) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE B_TELEFON3 B_TELEFON3 VARCHAR(18) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE B_E_MAIL B_E_MAIL VARCHAR(45) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE B_GEMEINDEKZ B_GEMEINDEKZ VARCHAR(6) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, CHANGE B_BBIG B_BBIG VARCHAR(6) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE herkunftsschulen MODIFY HKS_NUMMER INT NOT NULL');
        $this->addSql('ALTER TABLE herkunftsschulen DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE herkunftsschulen CHANGE HKS_NUMMER HKS_NUMMER VARCHAR(4) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, CHANGE HKS_NAME HKS_NAME VARCHAR(50) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, CHANGE HKS_STRASSE HKS_STRASSE VARCHAR(30) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, CHANGE HKS_PLZ HKS_PLZ VARCHAR(5) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci, CHANGE HKS_ORT HKS_ORT VARCHAR(30) DEFAULT \'\' NOT NULL COLLATE utf8_unicode_ci');
    }
}
