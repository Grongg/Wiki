<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220315134150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content_collection DROP FOREIGN KEY FK_6574D3C0FA7FD7EB');
        $this->addSql('DROP INDEX IDX_6574D3C0FA7FD7EB ON content_collection');
        $this->addSql('ALTER TABLE content_collection ADD champion LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', DROP champion_id, DROP champions');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content_collection ADD champion_id INT DEFAULT NULL, ADD champions LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', DROP champion');
        $this->addSql('ALTER TABLE content_collection ADD CONSTRAINT FK_6574D3C0FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_6574D3C0FA7FD7EB ON content_collection (champion_id)');
    }
}
