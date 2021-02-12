<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210212123435 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manga ADD image VARCHAR(255) NOT NULL, CHANGE serie_id serie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE serie RENAME INDEX idx_aa3a933469f3b39d TO IDX_AA3A93341674CEC6');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manga DROP image, CHANGE serie_id serie_id INT NOT NULL');
        $this->addSql('ALTER TABLE serie RENAME INDEX idx_aa3a93341674cec6 TO IDX_AA3A933469F3B39D');
    }
}
