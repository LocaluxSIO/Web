<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412071547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, nom_equipement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement_controle (equipement_id INT NOT NULL, controle_id INT NOT NULL, INDEX IDX_11E8374A806F0F5C (equipement_id), INDEX IDX_11E8374A758926A6 (controle_id), PRIMARY KEY(equipement_id, controle_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipement_controle ADD CONSTRAINT FK_11E8374A806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipement_controle ADD CONSTRAINT FK_11E8374A758926A6 FOREIGN KEY (controle_id) REFERENCES controle (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipement_controle DROP FOREIGN KEY FK_11E8374A806F0F5C');
        $this->addSql('ALTER TABLE equipement_controle DROP FOREIGN KEY FK_11E8374A758926A6');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE equipement_controle');
    }
}
