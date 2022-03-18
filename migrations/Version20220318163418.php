<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220318163418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE selected_champion (id INT AUTO_INCREMENT NOT NULL, content_collection_id INT DEFAULT NULL, champion_id INT NOT NULL, INDEX IDX_521C8489A9370EC (content_collection_id), INDEX IDX_521C8489FA7FD7EB (champion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE selected_champion ADD CONSTRAINT FK_521C8489A9370EC FOREIGN KEY (content_collection_id) REFERENCES content_collection (id)');
        $this->addSql('ALTER TABLE selected_champion ADD CONSTRAINT FK_521C8489FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE selected_champion');
    }
}
