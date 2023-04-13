<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413061033 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE modele ADD marque VARCHAR(255) NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD carburant VARCHAR(50) NOT NULL, ADD boite_vitesse VARCHAR(255) NOT NULL, ADD image VARCHAR(1000) NOT NULL, ADD prix_base DOUBLE PRECISION NOT NULL, ADD cheveaux INT NOT NULL, ADD zero_cent DOUBLE PRECISION NOT NULL, DROP libelle');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE modele ADD libelle VARCHAR(512) NOT NULL, DROP marque, DROP nom, DROP carburant, DROP boite_vitesse, DROP image, DROP prix_base, DROP cheveaux, DROP zero_cent');
    }
}
