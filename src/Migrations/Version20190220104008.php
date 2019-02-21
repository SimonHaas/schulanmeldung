<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190220104008 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ausbildung DROP FOREIGN KEY FK_E482F6FE5D3151DF');
        $this->addSql('DROP INDEX IDX_E482F6FE5D3151DF ON ausbildung');
        $this->addSql('ALTER TABLE ausbildung CHANGE betrieb_id_id beruf_id INT NOT NULL');
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

        $this->addSql('ALTER TABLE ausbildung DROP FOREIGN KEY FK_E482F6FEDEF76C65');
        $this->addSql('DROP INDEX IDX_E482F6FEDEF76C65 ON ausbildung');
        $this->addSql('ALTER TABLE ausbildung CHANGE beruf_id betrieb_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE ausbildung ADD CONSTRAINT FK_E482F6FE5D3151DF FOREIGN KEY (betrieb_id_id) REFERENCES betriebedaten (id)');
        $this->addSql('CREATE INDEX IDX_E482F6FE5D3151DF ON ausbildung (betrieb_id_id)');
        $this->addSql('ALTER TABLE berufsdaten DROP bezeichnung');
        $this->addSql('ALTER TABLE schueler ADD beruf_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE schueler ADD CONSTRAINT FK_C382476DDEF76C65 FOREIGN KEY (beruf_id) REFERENCES berufsdaten (id)');
        $this->addSql('CREATE INDEX IDX_C382476DDEF76C65 ON schueler (beruf_id)');
    }
}
