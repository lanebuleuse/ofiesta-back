<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200525101202 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, entreprise_id_id INT NOT NULL, titre VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, texte VARCHAR(255) NOT NULL, nonlu TINYINT(1) NOT NULL, archiver TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_B6BD307F9D86650F (user_id_id), UNIQUE INDEX UNIQ_B6BD307FDAC5BE2B (entreprise_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, service_id_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, chemin VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_6A2CA10CD63673B0 (service_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, raison_sociale VARCHAR(255) NOT NULL, siret INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_D19FA609D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, genre VARCHAR(10) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(320) NOT NULL, telephone VARCHAR(10) NOT NULL, password VARCHAR(50) NOT NULL, adresse VARCHAR(255) NOT NULL, cp INT NOT NULL, ville VARCHAR(255) NOT NULL, role VARCHAR(15) NOT NULL, actif TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updates_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, entreprise_id_id INT NOT NULL, liste_prestation_id_id INT NOT NULL, titre VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, cp INT NOT NULL, ville VARCHAR(255) NOT NULL, departement VARCHAR(100) NOT NULL, prix INT NOT NULL, note NUMERIC(1, 0) NOT NULL, min_invite INT NOT NULL, max_invite INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_E19D9AD2DAC5BE2B (entreprise_id_id), UNIQUE INDEX UNIQ_E19D9AD2F906156B (liste_prestation_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favori (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, entreprise_id_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_EF85A2CC9D86650F (user_id_id), UNIQUE INDEX UNIQ_EF85A2CCDAC5BE2B (entreprise_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_prestation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FDAC5BE2B FOREIGN KEY (entreprise_id_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CD63673B0 FOREIGN KEY (service_id_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA609D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2DAC5BE2B FOREIGN KEY (entreprise_id_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2F906156B FOREIGN KEY (liste_prestation_id_id) REFERENCES liste_prestation (id)');
        $this->addSql('ALTER TABLE favori ADD CONSTRAINT FK_EF85A2CC9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favori ADD CONSTRAINT FK_EF85A2CCDAC5BE2B FOREIGN KEY (entreprise_id_id) REFERENCES entreprise (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FDAC5BE2B');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2DAC5BE2B');
        $this->addSql('ALTER TABLE favori DROP FOREIGN KEY FK_EF85A2CCDAC5BE2B');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F9D86650F');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA609D86650F');
        $this->addSql('ALTER TABLE favori DROP FOREIGN KEY FK_EF85A2CC9D86650F');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CD63673B0');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2F906156B');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE favori');
        $this->addSql('DROP TABLE liste_prestation');
    }
}
