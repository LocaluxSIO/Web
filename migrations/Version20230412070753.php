<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412070753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formule CHANGE nom nom_formule VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE location_avec_chauffeur ADD id_formule_id INT NOT NULL');
        $this->addSql('ALTER TABLE location_avec_chauffeur ADD CONSTRAINT FK_C11B87498FE27406 FOREIGN KEY (id_formule_id) REFERENCES formule_avec_chauffeur (id)');
        $this->addSql('CREATE INDEX IDX_C11B87498FE27406 ON location_avec_chauffeur (id_formule_id)');
        $this->addSql('ALTER TABLE location_sans_chauffeur ADD id_formule_id INT NOT NULL');
        $this->addSql('ALTER TABLE location_sans_chauffeur ADD CONSTRAINT FK_50D7BFCF8FE27406 FOREIGN KEY (id_formule_id) REFERENCES formule_sans_chauffeur (id)');
        $this->addSql('CREATE INDEX IDX_50D7BFCF8FE27406 ON location_sans_chauffeur (id_formule_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location_avec_chauffeur DROP FOREIGN KEY FK_C11B87498FE27406');
        $this->addSql('DROP INDEX IDX_C11B87498FE27406 ON location_avec_chauffeur');
        $this->addSql('ALTER TABLE location_avec_chauffeur DROP id_formule_id');
        $this->addSql('ALTER TABLE location_sans_chauffeur DROP FOREIGN KEY FK_50D7BFCF8FE27406');
        $this->addSql('DROP INDEX IDX_50D7BFCF8FE27406 ON location_sans_chauffeur');
        $this->addSql('ALTER TABLE location_sans_chauffeur DROP id_formule_id');
        $this->addSql('ALTER TABLE formule CHANGE nom_formule nom VARCHAR(255) NOT NULL');
    }
}
