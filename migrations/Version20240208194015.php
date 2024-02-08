<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208194015 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_a (id INT AUTO_INCREMENT NOT NULL, allocation_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_F0C54A299C83F4B2 (allocation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_a ADD CONSTRAINT FK_F0C54A299C83F4B2 FOREIGN KEY (allocation_id) REFERENCES allocation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_a DROP FOREIGN KEY FK_F0C54A299C83F4B2');
        $this->addSql('DROP TABLE category_a');
    }
}
