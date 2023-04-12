<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412071315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE controle (id INT AUTO_INCREMENT NOT NULL, id_location_id INT NOT NULL, id_salarie_id INT NOT NULL, INDEX IDX_E39396E1E5FEC79 (id_location_id), INDEX IDX_E39396EFDD3139D (id_salarie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE controle ADD CONSTRAINT FK_E39396E1E5FEC79 FOREIGN KEY (id_location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE controle ADD CONSTRAINT FK_E39396EFDD3139D FOREIGN KEY (id_salarie_id) REFERENCES salarie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE controle DROP FOREIGN KEY FK_E39396E1E5FEC79');
        $this->addSql('ALTER TABLE controle DROP FOREIGN KEY FK_E39396EFDD3139D');
        $this->addSql('DROP TABLE controle');
    }
}
