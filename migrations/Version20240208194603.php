<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208194603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note ADD note_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1426ED0855 FOREIGN KEY (note_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA1426ED0855 ON note (note_id)');
        $this->addSql('ALTER TABLE partenaire ADD partenaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partenaire ADD CONSTRAINT FK_32FFA37398DE13AC FOREIGN KEY (partenaire_id) REFERENCES contratpartenariat (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_32FFA37398DE13AC ON partenaire (partenaire_id)');
        $this->addSql('ALTER TABLE reclamation ADD reclamation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064042D6BA2D9 FOREIGN KEY (reclamation_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CE6064042D6BA2D9 ON reclamation (reclamation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1426ED0855');
        $this->addSql('DROP INDEX UNIQ_CFBDFA1426ED0855 ON note');
        $this->addSql('ALTER TABLE note DROP note_id');
        $this->addSql('ALTER TABLE partenaire DROP FOREIGN KEY FK_32FFA37398DE13AC');
        $this->addSql('DROP INDEX UNIQ_32FFA37398DE13AC ON partenaire');
        $this->addSql('ALTER TABLE partenaire DROP partenaire_id');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064042D6BA2D9');
        $this->addSql('DROP INDEX UNIQ_CE6064042D6BA2D9 ON reclamation');
        $this->addSql('ALTER TABLE reclamation DROP reclamation_id');
    }
}
