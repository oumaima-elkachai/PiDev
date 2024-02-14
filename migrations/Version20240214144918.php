<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240214144918 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allocation (id INT AUTO_INCREMENT NOT NULL, category_a_id INT DEFAULT NULL, event_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, date DATE NOT NULL, quantity INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_5C44232AB045291F (category_a_id), INDEX IDX_5C44232A71F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_a (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_e (id INT AUTO_INCREMENT NOT NULL, event_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_F7A88E3071F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_l (id INT AUTO_INCREMENT NOT NULL, lieu_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_8E7436946AB213CC (lieu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contratpartenariat (id INT AUTO_INCREMENT NOT NULL, partenaire_id INT DEFAULT NULL, datedebut DATE NOT NULL, datefin DATE NOT NULL, UNIQUE INDEX UNIQ_612ED99598DE13AC (partenaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, partenaire_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone INT NOT NULL, date DATE NOT NULL, category VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_3BAE0AA7A76ED395 (user_id), INDEX IDX_3BAE0AA798DE13AC (partenaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, category_l_id INT DEFAULT NULL, event_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, date DATE NOT NULL, prix DOUBLE PRECISION NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_2F577D59422FF1C2 (category_l_id), UNIQUE INDEX UNIQ_2F577D5971F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, note_id INT DEFAULT NULL, appreciation VARCHAR(255) NOT NULL, date DATE NOT NULL, UNIQUE INDEX UNIQ_CFBDFA1426ED0855 (note_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire (id INT AUTO_INCREMENT NOT NULL, nom_p VARCHAR(255) NOT NULL, tel INT NOT NULL, don DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, contenu VARCHAR(255) NOT NULL, date DATE NOT NULL, INDEX IDX_CE606404A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, fname VARCHAR(255) NOT NULL, lname VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phonenumber INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE allocation ADD CONSTRAINT FK_5C44232AB045291F FOREIGN KEY (category_a_id) REFERENCES category_a (id)');
        $this->addSql('ALTER TABLE allocation ADD CONSTRAINT FK_5C44232A71F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE category_e ADD CONSTRAINT FK_F7A88E3071F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE category_l ADD CONSTRAINT FK_8E7436946AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
        $this->addSql('ALTER TABLE contratpartenariat ADD CONSTRAINT FK_612ED99598DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA798DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id)');
        $this->addSql('ALTER TABLE lieu ADD CONSTRAINT FK_2F577D59422FF1C2 FOREIGN KEY (category_l_id) REFERENCES category_l (id)');
        $this->addSql('ALTER TABLE lieu ADD CONSTRAINT FK_2F577D5971F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1426ED0855 FOREIGN KEY (note_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE allocation DROP FOREIGN KEY FK_5C44232AB045291F');
        $this->addSql('ALTER TABLE allocation DROP FOREIGN KEY FK_5C44232A71F7E88B');
        $this->addSql('ALTER TABLE category_e DROP FOREIGN KEY FK_F7A88E3071F7E88B');
        $this->addSql('ALTER TABLE category_l DROP FOREIGN KEY FK_8E7436946AB213CC');
        $this->addSql('ALTER TABLE contratpartenariat DROP FOREIGN KEY FK_612ED99598DE13AC');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7A76ED395');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA798DE13AC');
        $this->addSql('ALTER TABLE lieu DROP FOREIGN KEY FK_2F577D59422FF1C2');
        $this->addSql('ALTER TABLE lieu DROP FOREIGN KEY FK_2F577D5971F7E88B');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1426ED0855');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A76ED395');
        $this->addSql('DROP TABLE allocation');
        $this->addSql('DROP TABLE category_a');
        $this->addSql('DROP TABLE category_e');
        $this->addSql('DROP TABLE category_l');
        $this->addSql('DROP TABLE contratpartenariat');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
