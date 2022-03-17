<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220317005554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE champion_content_collection (champion_id INT NOT NULL, content_collection_id INT NOT NULL, INDEX IDX_9B39FFFFA7FD7EB (champion_id), INDEX IDX_9B39FFFA9370EC (content_collection_id), PRIMARY KEY(champion_id, content_collection_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE champion_content_collection ADD CONSTRAINT FK_9B39FFFFA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE champion_content_collection ADD CONSTRAINT FK_9B39FFFA9370EC FOREIGN KEY (content_collection_id) REFERENCES content_collection (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE content_collection DROP champions');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE champion_content_collection');
        $this->addSql('ALTER TABLE content_collection ADD champions LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }
}
