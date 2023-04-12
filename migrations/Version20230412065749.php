<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412065749 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formule (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, typeFormule VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formule_avec_chauffeur (id INT NOT NULL, nom_chauffeur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formule_sans_chauffeur (id INT NOT NULL, duree DOUBLE PRECISION NOT NULL, nb_kms_inclus INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formule_avec_chauffeur ADD CONSTRAINT FK_3C4DBFEEBF396750 FOREIGN KEY (id) REFERENCES formule (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formule_sans_chauffeur ADD CONSTRAINT FK_AD818768BF396750 FOREIGN KEY (id) REFERENCES formule (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location CHANGE type typeLocation VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formule_avec_chauffeur DROP FOREIGN KEY FK_3C4DBFEEBF396750');
        $this->addSql('ALTER TABLE formule_sans_chauffeur DROP FOREIGN KEY FK_AD818768BF396750');
        $this->addSql('DROP TABLE formule');
        $this->addSql('DROP TABLE formule_avec_chauffeur');
        $this->addSql('DROP TABLE formule_sans_chauffeur');
        $this->addSql('ALTER TABLE location CHANGE typeLocation type VARCHAR(255) NOT NULL');
    }
}
