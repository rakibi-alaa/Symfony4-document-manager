<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181030171650 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A7643C43EA0');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A768826AFA6');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A769F2C3FAB');
        $this->addSql('DROP INDEX IDX_D8698A768826AFA6 ON document');
        $this->addSql('DROP INDEX IDX_D8698A769F2C3FAB ON document');
        $this->addSql('DROP INDEX IDX_D8698A7643C43EA0 ON document');
        $this->addSql('ALTER TABLE document ADD type_document VARCHAR(255) NOT NULL, ADD zone VARCHAR(255) NOT NULL, ADD domaine_lithosctructural VARCHAR(255) NOT NULL, DROP type_document_id, DROP zone_id, DROP domaine_lithosctructural_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE document ADD type_document_id INT NOT NULL, ADD zone_id INT NOT NULL, ADD domaine_lithosctructural_id INT NOT NULL, DROP type_document, DROP zone, DROP domaine_lithosctructural');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7643C43EA0 FOREIGN KEY (domaine_lithosctructural_id) REFERENCES domaine_lithosctructural (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A768826AFA6 FOREIGN KEY (type_document_id) REFERENCES type_document (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A769F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('CREATE INDEX IDX_D8698A768826AFA6 ON document (type_document_id)');
        $this->addSql('CREATE INDEX IDX_D8698A769F2C3FAB ON document (zone_id)');
        $this->addSql('CREATE INDEX IDX_D8698A7643C43EA0 ON document (domaine_lithosctructural_id)');
    }
}
