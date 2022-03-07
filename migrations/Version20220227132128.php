<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220227132128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell ADD champion_id INT NOT NULL');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8DFA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id)');
        $this->addSql('CREATE INDEX IDX_D03FCD8DFA7FD7EB ON spell (champion_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8DFA7FD7EB');
        $this->addSql('DROP INDEX IDX_D03FCD8DFA7FD7EB ON spell');
        $this->addSql('ALTER TABLE spell DROP champion_id');
    }
}
