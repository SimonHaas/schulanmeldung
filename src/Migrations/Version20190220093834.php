<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190220093834 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE kontaktperson (id INT AUTO_INCREMENT NOT NULL, schueler_id INT NOT NULL, anrede VARCHAR(255) NOT NULL, vorname VARCHAR(255) NOT NULL, nachname VARCHAR(255) NOT NULL, strasse VARCHAR(255) NOT NULL, hausnummer VARCHAR(255) NOT NULL, plz VARCHAR(255) NOT NULL, ort VARCHAR(255) NOT NULL, telefonnummer VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, INDEX IDX_1A28E53D9AC0A64E (schueler_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ausbildung (id INT AUTO_INCREMENT NOT NULL, betrieb_id INT NOT NULL, betrieb_id_id INT NOT NULL, beginn DATE NOT NULL, ende DATE NOT NULL, relation VARCHAR(255) NOT NULL, INDEX IDX_E482F6FE587A3BD (betrieb_id), INDEX IDX_E482F6FE5D3151DF (betrieb_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schuldaten (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, art VARCHAR(255) NOT NULL, strasse VARCHAR(255) NOT NULL, hausnummer VARCHAR(255) NOT NULL, ort VARCHAR(255) NOT NULL, plz VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schulbesuch (id INT AUTO_INCREMENT NOT NULL, schueler_id INT NOT NULL, schule_id INT NOT NULL, eintritt DATE NOT NULL, austritt DATE NOT NULL, INDEX IDX_4B6D821F9AC0A64E (schueler_id), INDEX IDX_4B6D821F5BCF5349 (schule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE betriebedaten (id INT AUTO_INCREMENT NOT NULL, kammer_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, anspr_partner VARCHAR(255) DEFAULT NULL, strasse VARCHAR(255) NOT NULL, hsnr VARCHAR(5) NOT NULL, plz VARCHAR(5) NOT NULL, ort VARCHAR(255) NOT NULL, tel_zentrale VARCHAR(255) NOT NULL, tel_durchwahl VARCHAR(255) DEFAULT NULL, fax VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, ist_verifiziert TINYINT(1) NOT NULL, INDEX IDX_4FE64E849D381217 (kammer_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE berufsdaten (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schueler (id INT AUTO_INCREMENT NOT NULL, beruf_id INT DEFAULT NULL, vorname VARCHAR(255) NOT NULL, nachname VARCHAR(255) NOT NULL, rufname VARCHAR(255) NOT NULL, geburtsdatum DATE NOT NULL, geburtsort VARCHAR(255) NOT NULL, INDEX IDX_C382476DDEF76C65 (beruf_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kammer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE umschueler (id INT AUTO_INCREMENT NOT NULL, traeger VARCHAR(255) NOT NULL, traeger_sitz VARCHAR(255) NOT NULL, foerderer_nr INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fluechtling (id INT AUTO_INCREMENT NOT NULL, deutsch_kenntnis TINYINT(1) NOT NULL, anmelde_stelle VARCHAR(255) NOT NULL, ansprech_partner VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registrierung (id INT AUTO_INCREMENT NOT NULL, schueler_id INT NOT NULL, datum DATETIME NOT NULL, mitteilung LONGTEXT DEFAULT NULL, wohnheim TINYINT(1) NOT NULL, eintritt_am DATE NOT NULL, ip VARCHAR(255) NOT NULL, typ INT NOT NULL, ist_eqmassnahme TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_6E7E4FFD9AC0A64E (schueler_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE kontaktperson ADD CONSTRAINT FK_1A28E53D9AC0A64E FOREIGN KEY (schueler_id) REFERENCES schueler (id)');
        $this->addSql('ALTER TABLE ausbildung ADD CONSTRAINT FK_E482F6FE587A3BD FOREIGN KEY (betrieb_id) REFERENCES betriebedaten (id)');
        $this->addSql('ALTER TABLE ausbildung ADD CONSTRAINT FK_E482F6FE5D3151DF FOREIGN KEY (betrieb_id_id) REFERENCES betriebedaten (id)');
        $this->addSql('ALTER TABLE schulbesuch ADD CONSTRAINT FK_4B6D821F9AC0A64E FOREIGN KEY (schueler_id) REFERENCES schueler (id)');
        $this->addSql('ALTER TABLE schulbesuch ADD CONSTRAINT FK_4B6D821F5BCF5349 FOREIGN KEY (schule_id) REFERENCES schuldaten (id)');
        $this->addSql('ALTER TABLE betriebedaten ADD CONSTRAINT FK_4FE64E849D381217 FOREIGN KEY (kammer_id_id) REFERENCES kammer (id)');
        $this->addSql('ALTER TABLE schueler ADD CONSTRAINT FK_C382476DDEF76C65 FOREIGN KEY (beruf_id) REFERENCES berufsdaten (id)');
        $this->addSql('ALTER TABLE registrierung ADD CONSTRAINT FK_6E7E4FFD9AC0A64E FOREIGN KEY (schueler_id) REFERENCES schueler (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE schulbesuch DROP FOREIGN KEY FK_4B6D821F5BCF5349');
        $this->addSql('ALTER TABLE ausbildung DROP FOREIGN KEY FK_E482F6FE587A3BD');
        $this->addSql('ALTER TABLE ausbildung DROP FOREIGN KEY FK_E482F6FE5D3151DF');
        $this->addSql('ALTER TABLE schueler DROP FOREIGN KEY FK_C382476DDEF76C65');
        $this->addSql('ALTER TABLE kontaktperson DROP FOREIGN KEY FK_1A28E53D9AC0A64E');
        $this->addSql('ALTER TABLE schulbesuch DROP FOREIGN KEY FK_4B6D821F9AC0A64E');
        $this->addSql('ALTER TABLE registrierung DROP FOREIGN KEY FK_6E7E4FFD9AC0A64E');
        $this->addSql('ALTER TABLE betriebedaten DROP FOREIGN KEY FK_4FE64E849D381217');
        $this->addSql('DROP TABLE kontaktperson');
        $this->addSql('DROP TABLE ausbildung');
        $this->addSql('DROP TABLE schuldaten');
        $this->addSql('DROP TABLE schulbesuch');
        $this->addSql('DROP TABLE betriebedaten');
        $this->addSql('DROP TABLE berufsdaten');
        $this->addSql('DROP TABLE schueler');
        $this->addSql('DROP TABLE kammer');
        $this->addSql('DROP TABLE umschueler');
        $this->addSql('DROP TABLE fluechtling');
        $this->addSql('DROP TABLE registrierung');
    }
}
