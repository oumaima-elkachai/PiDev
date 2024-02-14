<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240214214312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD lieu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA76AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3BAE0AA76AB213CC ON event (lieu_id)');
        $this->addSql('ALTER TABLE lieu DROP FOREIGN KEY FK_2F577D5971F7E88B');
        $this->addSql('DROP INDEX UNIQ_2F577D5971F7E88B ON lieu');
        $this->addSql('ALTER TABLE lieu DROP event_id');
        $this->addSql('ALTER TABLE partenaire ADD contrat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partenaire ADD CONSTRAINT FK_32FFA3731823061F FOREIGN KEY (contrat_id) REFERENCES contratpartenariat (id)');
        $this->addSql('CREATE INDEX IDX_32FFA3731823061F ON partenaire (contrat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA76AB213CC');
        $this->addSql('DROP INDEX UNIQ_3BAE0AA76AB213CC ON event');
        $this->addSql('ALTER TABLE event DROP lieu_id');
        $this->addSql('ALTER TABLE lieu ADD event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lieu ADD CONSTRAINT FK_2F577D5971F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2F577D5971F7E88B ON lieu (event_id)');
        $this->addSql('ALTER TABLE partenaire DROP FOREIGN KEY FK_32FFA3731823061F');
        $this->addSql('DROP INDEX IDX_32FFA3731823061F ON partenaire');
        $this->addSql('ALTER TABLE partenaire DROP contrat_id');
    }
}
