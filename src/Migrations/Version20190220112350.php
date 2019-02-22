<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190220112350 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE admin_account (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ausbildung ADD beruf_id INT NOT NULL');
        $this->addSql('ALTER TABLE ausbildung ADD CONSTRAINT FK_E482F6FEDEF76C65 FOREIGN KEY (beruf_id) REFERENCES berufsdaten (id)');
        $this->addSql('CREATE INDEX IDX_E482F6FEDEF76C65 ON ausbildung (beruf_id)');
        $this->addSql('ALTER TABLE berufsdaten ADD bezeichnung VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE schueler DROP FOREIGN KEY FK_C382476DDEF76C65');
        $this->addSql('DROP INDEX IDX_C382476DDEF76C65 ON schueler');
        $this->addSql('ALTER TABLE schueler DROP beruf_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE admin_account');
        $this->addSql('ALTER TABLE ausbildung DROP FOREIGN KEY FK_E482F6FEDEF76C65');
        $this->addSql('DROP INDEX IDX_E482F6FEDEF76C65 ON ausbildung');
        $this->addSql('ALTER TABLE ausbildung DROP beruf_id');
        $this->addSql('ALTER TABLE berufsdaten DROP bezeichnung');
        $this->addSql('ALTER TABLE schueler ADD beruf_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE schueler ADD CONSTRAINT FK_C382476DDEF76C65 FOREIGN KEY (beruf_id) REFERENCES berufsdaten (id)');
        $this->addSql('CREATE INDEX IDX_C382476DDEF76C65 ON schueler (beruf_id)');
    }
}
