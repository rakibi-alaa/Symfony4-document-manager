<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181101095243 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ressources_minerales (id INT AUTO_INCREMENT NOT NULL, nom_feuillet_id INT NOT NULL, zone VARCHAR(255) NOT NULL, numero_feuillet INT NOT NULL, identifiant VARCHAR(255) NOT NULL, coordonne_x INT NOT NULL, coordonne_y INT NOT NULL, nom VARCHAR(255) NOT NULL, etape VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, typologie VARCHAR(255) NOT NULL, annee VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, element_chimique VARCHAR(255) NOT NULL, teneur INT NOT NULL, lithologie VARCHAR(255) NOT NULL, file_name VARCHAR(255) NOT NULL, INDEX IDX_9F821A7440778ED2 (nom_feuillet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ressources_minerales ADD CONSTRAINT FK_9F821A7440778ED2 FOREIGN KEY (nom_feuillet_id) REFERENCES nom_feuillet (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE ressources_minerales');
    }
}
