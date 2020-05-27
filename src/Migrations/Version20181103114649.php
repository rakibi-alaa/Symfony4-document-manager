<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181103114649 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A7640778ED2');
        $this->addSql('DROP INDEX IDX_D8698A7640778ED2 ON document');
        $this->addSql('ALTER TABLE document ADD nom_feuillet VARCHAR(255) NOT NULL, DROP nom_feuillet_id');
        $this->addSql('ALTER TABLE document_chimie DROP FOREIGN KEY FK_A744F47E40778ED2');
        $this->addSql('DROP INDEX IDX_A744F47E40778ED2 ON document_chimie');
        $this->addSql('ALTER TABLE document_chimie ADD nom_feuillet VARCHAR(255) NOT NULL, DROP nom_feuillet_id');
        $this->addSql('ALTER TABLE document_chrono DROP FOREIGN KEY FK_8C4C8F5740778ED2');
        $this->addSql('DROP INDEX IDX_8C4C8F5740778ED2 ON document_chrono');
        $this->addSql('ALTER TABLE document_chrono ADD nom_feuillet VARCHAR(255) NOT NULL, DROP nom_feuillet_id');
        $this->addSql('ALTER TABLE document_heritage DROP FOREIGN KEY FK_5887B1E140778ED2');
        $this->addSql('DROP INDEX IDX_5887B1E140778ED2 ON document_heritage');
        $this->addSql('ALTER TABLE document_heritage ADD nom_feuillet VARCHAR(255) NOT NULL, DROP nom_feuillet_id');
        $this->addSql('ALTER TABLE ressources_minerales DROP FOREIGN KEY FK_9F821A7440778ED2');
        $this->addSql('DROP INDEX IDX_9F821A7440778ED2 ON ressources_minerales');
        $this->addSql('ALTER TABLE ressources_minerales ADD nom_feuillet VARCHAR(255) NOT NULL, DROP nom_feuillet_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE document ADD nom_feuillet_id INT NOT NULL, DROP nom_feuillet');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7640778ED2 FOREIGN KEY (nom_feuillet_id) REFERENCES nom_feuillet (id)');
        $this->addSql('CREATE INDEX IDX_D8698A7640778ED2 ON document (nom_feuillet_id)');
        $this->addSql('ALTER TABLE document_chimie ADD nom_feuillet_id INT NOT NULL, DROP nom_feuillet');
        $this->addSql('ALTER TABLE document_chimie ADD CONSTRAINT FK_A744F47E40778ED2 FOREIGN KEY (nom_feuillet_id) REFERENCES nom_feuillet (id)');
        $this->addSql('CREATE INDEX IDX_A744F47E40778ED2 ON document_chimie (nom_feuillet_id)');
        $this->addSql('ALTER TABLE document_chrono ADD nom_feuillet_id INT NOT NULL, DROP nom_feuillet');
        $this->addSql('ALTER TABLE document_chrono ADD CONSTRAINT FK_8C4C8F5740778ED2 FOREIGN KEY (nom_feuillet_id) REFERENCES nom_feuillet (id)');
        $this->addSql('CREATE INDEX IDX_8C4C8F5740778ED2 ON document_chrono (nom_feuillet_id)');
        $this->addSql('ALTER TABLE document_heritage ADD nom_feuillet_id INT NOT NULL, DROP nom_feuillet');
        $this->addSql('ALTER TABLE document_heritage ADD CONSTRAINT FK_5887B1E140778ED2 FOREIGN KEY (nom_feuillet_id) REFERENCES nom_feuillet (id)');
        $this->addSql('CREATE INDEX IDX_5887B1E140778ED2 ON document_heritage (nom_feuillet_id)');
        $this->addSql('ALTER TABLE ressources_minerales ADD nom_feuillet_id INT NOT NULL, DROP nom_feuillet');
        $this->addSql('ALTER TABLE ressources_minerales ADD CONSTRAINT FK_9F821A7440778ED2 FOREIGN KEY (nom_feuillet_id) REFERENCES nom_feuillet (id)');
        $this->addSql('CREATE INDEX IDX_9F821A7440778ED2 ON ressources_minerales (nom_feuillet_id)');
    }
}
