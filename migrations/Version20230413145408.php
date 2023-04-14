<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413145408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formule_avec_chauffeur DROP FOREIGN KEY FK_3C4DBFEEA601C6CC');
        $this->addSql('DROP INDEX IDX_3C4DBFEEA601C6CC ON formule_avec_chauffeur');
        $this->addSql('ALTER TABLE formule_avec_chauffeur DROP id_chauffeur_id, DROP nom_chauffeur');
        $this->addSql('ALTER TABLE location CHANGE id_client_id id_client_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formule_avec_chauffeur ADD id_chauffeur_id INT NOT NULL, ADD nom_chauffeur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE formule_avec_chauffeur ADD CONSTRAINT FK_3C4DBFEEA601C6CC FOREIGN KEY (id_chauffeur_id) REFERENCES chauffeur (id)');
        $this->addSql('CREATE INDEX IDX_3C4DBFEEA601C6CC ON formule_avec_chauffeur (id_chauffeur_id)');
        $this->addSql('ALTER TABLE location CHANGE id_client_id id_client_id INT DEFAULT NULL');
    }
}
