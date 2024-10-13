<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241013013737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chauffeur (permis_conduire VARCHAR(255) NOT NULL, id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE passager (moyenne_evaluation DOUBLE PRECISION NOT NULL, id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, disc VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE trajet (id INT AUTO_INCREMENT NOT NULL, point_depart VARCHAR(255) NOT NULL, point_arrivee VARCHAR(255) NOT NULL, heure_depart TIME NOT NULL, prix DOUBLE PRECISION NOT NULL, place_disponibles INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, modele VARCHAR(50) NOT NULL, marque VARCHAR(50) NOT NULL, annee DATE NOT NULL, immatriculation VARCHAR(10) NOT NULL, nombre_de_places VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE chauffeur ADD CONSTRAINT FK_5CA777B8BF396750 FOREIGN KEY (id) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE passager ADD CONSTRAINT FK_BFF42EE9BF396750 FOREIGN KEY (id) REFERENCES personne (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chauffeur DROP FOREIGN KEY FK_5CA777B8BF396750');
        $this->addSql('ALTER TABLE passager DROP FOREIGN KEY FK_BFF42EE9BF396750');
        $this->addSql('DROP TABLE chauffeur');
        $this->addSql('DROP TABLE passager');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE trajet');
        $this->addSql('DROP TABLE voiture');
    }
}
