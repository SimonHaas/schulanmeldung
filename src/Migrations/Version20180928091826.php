<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180928091826 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE besuchte_schule (id INT AUTO_INCREMENT NOT NULL, schueler_id INT NOT NULL, eintritt DATE NOT NULL, austritt DATE NOT NULL, name VARCHAR(255) NOT NULL, ort VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE betriebedaten (B_SCHLUESSEL VARCHAR(255) NOT NULL, B_NAME1 VARCHAR(255) DEFAULT NULL, B_NAME2 VARCHAR(255) DEFAULT NULL, B_NAME4 VARCHAR(255) DEFAULT NULL, B_PLZ INT DEFAULT NULL, B_STRASSE VARCHAR(255) DEFAULT NULL, B_ORT VARCHAR(255) DEFAULT NULL, B_TELEFON1 VARCHAR(255) DEFAULT NULL, B_TELEFON2 VARCHAR(255) DEFAULT NULL, B_TELEFON3 VARCHAR(255) DEFAULT NULL, B_E_MAIL VARCHAR(255) DEFAULT NULL, B_GEMEINDEKZ VARCHAR(255) NOT NULL, B_BBIG VARCHAR(255) DEFAULT NULL, PRIMARY KEY(B_SCHLUESSEL)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE beruf (id INT AUTO_INCREMENT NOT NULL, kurzbezeichnung VARCHAR(255) NOT NULL, bezeichnung VARCHAR(255) NOT NULL, klasse VARCHAR(255) DEFAULT NULL, raum VARCHAR(255) DEFAULT NULL, erster_schultag DATE DEFAULT NULL, ab_nr VARCHAR(255) NOT NULL, ab_gefuehrt INT NOT NULL, kammer VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schueler (SID INT AUTO_INCREMENT NOT NULL, ANREDE VARCHAR(1) NOT NULL, VORNAMEN VARCHAR(255) NOT NULL, RUFNAME VARCHAR(255) NOT NULL, GESCHLECHT VARCHAR(1) NOT NULL, GEBURTSDATUM DATE NOT NULL, GEBURTSORT VARCHAR(255) NOT NULL, GEBURTSLAND VARCHAR(255) NOT NULL, STAAT VARCHAR(255) NOT NULL, BEKENNTNIS VARCHAR(255) NOT NULL, FAMILIENSTAND VARCHAR(255) NOT NULL, E_MAIL1 VARCHAR(255) NOT NULL, ANSCHR1_STR VARCHAR(255) NOT NULL, ANSCHR1_PLZ VARCHAR(5) NOT NULL, ANSCHR1_ORT VARCHAR(255) NOT NULL, ANSCHR1_TEL VARCHAR(255) NOT NULL, ANSCHR1_FUER1 VARCHAR(255) NOT NULL, ANSCHR1_FUER2 VARCHAR(255) NOT NULL, ERZB1_ART VARCHAR(255) NOT NULL, ERZB1_ANREDE VARCHAR(255) NOT NULL, ERZB1_FAMNAME VARCHAR(255) NOT NULL, ERZB1_RUFNAME VARCHAR(255) NOT NULL, ERZB1_TELEFON VARCHAR(255) NOT NULL, E_MAIL2 VARCHAR(255) NOT NULL, ERZB2_ART VARCHAR(255) NOT NULL, ERZB2_ANREDE VARCHAR(255) NOT NULL, ERZB2_FAMNAME VARCHAR(255) NOT NULL, ERZB2_RUFNAME VARCHAR(255) NOT NULL, ERZB2_TELEFON VARCHAR(255) NOT NULL, ANSCHR2_STR VARCHAR(255) NOT NULL, ANSCHR2_PLZ VARCHAR(255) NOT NULL, ANSCHR2_ORT VARCHAR(5) NOT NULL, ANSCHR2_TEL VARCHAR(255) NOT NULL, ANSCHR2_FUER1 VARCHAR(255) NOT NULL, ANSCHR2_FUER2 VARCHAR(255) NOT NULL, GASTSCHUELER TINYINT(1) NOT NULL, UMSCHUELER TINYINT(1) NOT NULL, KOSTENTRAEGER VARCHAR(255) NOT NULL, TRAEGERSITZ VARCHAR(255) NOT NULL, FOERDERUNGSNR VARCHAR(255) NOT NULL, SCHULPFLICHT TINYINT(1) NOT NULL, TAGESHEIM TINYINT(1) NOT NULL, AUSB_BEGINN DATE NOT NULL, AUSB_ENDE DATE NOT NULL, AUSB_DAUER VARCHAR(255) NOT NULL, AUSB_ART VARCHAR(255) NOT NULL, AUSB_BERUF VARCHAR(255) NOT NULL, AUSB_BETRIEB VARCHAR(255) NOT NULL, EINTRITTSDATUM DATE NOT NULL, KLASSE VARCHAR(255) NOT NULL, EINTR_JGST VARCHAR(255) NOT NULL, VON_SCHULART VARCHAR(255) NOT NULL, VON_SCHULNR VARCHAR(255) NOT NULL, SCHUL_VORBILD VARCHAR(255) NOT NULL, VORBILD_SCHUL VARCHAR(255) NOT NULL, sv_slbschule1 VARCHAR(255) NOT NULL, sv_slbschule1eintritt VARCHAR(255) NOT NULL, sv_slbschule1austritt VARCHAR(255) NOT NULL, sv_slbschule2 VARCHAR(255) NOT NULL, sv_slbschule2eintritt VARCHAR(255) NOT NULL, sv_slbschule2austritt VARCHAR(255) NOT NULL, sv_slbschule3 VARCHAR(255) NOT NULL, sv_slbschule3eintritt VARCHAR(255) NOT NULL, sv_slbschule3austritt VARCHAR(255) NOT NULL, sv_slbschule4 VARCHAR(255) NOT NULL, sv_slbschule4eintritt VARCHAR(255) NOT NULL, sv_slbschule4austritt VARCHAR(255) NOT NULL, ZUZUG_ART VARCHAR(255) NOT NULL, ZUZUG_DATUM DATE NOT NULL, KOMMENTAR VARCHAR(255) NOT NULL, ANMELDEDATUM DATE NOT NULL, ANMELDEZEIT VARCHAR(255) NOT NULL, DEUTSCH VARCHAR(255) NOT NULL, PRIMARY KEY(SID)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE herkunftsschulen (HKS_NUMMER INT AUTO_INCREMENT NOT NULL, HKS_NAME VARCHAR(255) NOT NULL, HKS_STRASSE VARCHAR(255) NOT NULL, HKS_PLZ INT NOT NULL, HKS_ORT VARCHAR(255) NOT NULL, PRIMARY KEY(HKS_NUMMER)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE besuchte_schule');
        $this->addSql('DROP TABLE betriebedaten');
        $this->addSql('DROP TABLE beruf');
        $this->addSql('DROP TABLE schueler');
        $this->addSql('DROP TABLE herkunftsschulen');
    }
}
