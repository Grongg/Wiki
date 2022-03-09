<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220308135316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE command_shop (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, created_at DATETIME NOT NULL, is_payed TINYINT(1) NOT NULL, total_price INT NOT NULL, INDEX IDX_DC0E22FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command_shop_line (id INT AUTO_INCREMENT NOT NULL, command_shop_id INT NOT NULL, product_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_97D71D86A27C973E (command_shop_id), INDEX IDX_97D71D864584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery_address (id INT AUTO_INCREMENT NOT NULL, command_shop_id INT NOT NULL, country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, street VARCHAR(255) NOT NULL, commentary VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_750D05FA27C973E (command_shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE command_shop ADD CONSTRAINT FK_DC0E22FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE command_shop_line ADD CONSTRAINT FK_97D71D86A27C973E FOREIGN KEY (command_shop_id) REFERENCES command_shop (id)');
        $this->addSql('ALTER TABLE command_shop_line ADD CONSTRAINT FK_97D71D864584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE delivery_address ADD CONSTRAINT FK_750D05FA27C973E FOREIGN KEY (command_shop_id) REFERENCES command_shop (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command_shop_line DROP FOREIGN KEY FK_97D71D86A27C973E');
        $this->addSql('ALTER TABLE delivery_address DROP FOREIGN KEY FK_750D05FA27C973E');
        $this->addSql('DROP TABLE command_shop');
        $this->addSql('DROP TABLE command_shop_line');
        $this->addSql('DROP TABLE delivery_address');
    }
}
