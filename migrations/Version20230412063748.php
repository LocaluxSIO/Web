<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412063748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location_avec_chauffeur (id INT NOT NULL, lieu_destination VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location_sans_chauffeur (id INT NOT NULL, nb_kms_depart INT NOT NULL, nb_kms_retour INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE location_avec_chauffeur ADD CONSTRAINT FK_C11B8749BF396750 FOREIGN KEY (id) REFERENCES location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location_sans_chauffeur ADD CONSTRAINT FK_50D7BFCFBF396750 FOREIGN KEY (id) REFERENCES location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location ADD type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location_avec_chauffeur DROP FOREIGN KEY FK_C11B8749BF396750');
        $this->addSql('ALTER TABLE location_sans_chauffeur DROP FOREIGN KEY FK_50D7BFCFBF396750');
        $this->addSql('DROP TABLE location_avec_chauffeur');
        $this->addSql('DROP TABLE location_sans_chauffeur');
        $this->addSql('ALTER TABLE location DROP type');
    }
}
