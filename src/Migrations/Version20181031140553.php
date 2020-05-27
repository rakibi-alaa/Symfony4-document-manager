<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181031140553 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE document_heritage (id INT AUTO_INCREMENT NOT NULL, nom_feuillet_id INT NOT NULL, zone VARCHAR(255) NOT NULL, numero_feuillet INT NOT NULL, nom_site VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, coordonee_x INT NOT NULL, coordonee_y INT NOT NULL, file_name VARCHAR(255) NOT NULL, INDEX IDX_5887B1E140778ED2 (nom_feuillet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE document_heritage ADD CONSTRAINT FK_5887B1E140778ED2 FOREIGN KEY (nom_feuillet_id) REFERENCES nom_feuillet (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE document_heritage');
    }
}
