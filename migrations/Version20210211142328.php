<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211142328 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manga (id INT AUTO_INCREMENT NOT NULL, serie_id INT DEFAULT NULL, nb_pages INT NOT NULL, prix_manga DOUBLE PRECISION NOT NULL, description_manga LONGTEXT NOT NULL, num_serie INT NOT NULL, chemin_image VARCHAR(255) NOT NULL, date_parution DATE NOT NULL, INDEX IDX_765A9E03D94388BD (serie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, editeur_id INT DEFAULT NULL, dessinateur_id INT DEFAULT NULL, senariste_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, etat TINYINT(1) NOT NULL, INDEX IDX_AA3A9334BCF5E72D (categorie_id), INDEX IDX_AA3A93343375BD21 (editeur_id), INDEX IDX_AA3A9334EF0AD3BC (dessinateur_id), INDEX IDX_AA3A933469F3B39D (senariste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E03D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A93343375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334EF0AD3BC FOREIGN KEY (dessinateur_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A933469F3B39D FOREIGN KEY (senariste_id) REFERENCES personne (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A9334BCF5E72D');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A93343375BD21');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A9334EF0AD3BC');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A933469F3B39D');
        $this->addSql('ALTER TABLE manga DROP FOREIGN KEY FK_765A9E03D94388BD');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE manga');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE utilisateur');
    }
}
