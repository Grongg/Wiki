<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220316101906 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE champion (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, main_image VARCHAR(255) NOT NULL, price INT NOT NULL, title VARCHAR(255) NOT NULL, blurb VARCHAR(255) NOT NULL, tags LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', icon VARCHAR(255) NOT NULL, bright TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command_shop (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, created_at DATETIME NOT NULL, is_payed TINYINT(1) NOT NULL, total_price INT NOT NULL, INDEX IDX_DC0E22FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command_shop_line (id INT AUTO_INCREMENT NOT NULL, command_shop_id INT NOT NULL, product_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_97D71D86A27C973E (command_shop_id), INDEX IDX_97D71D864584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_collection (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', champions LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery_address (id INT AUTO_INCREMENT NOT NULL, command_shop_id INT NOT NULL, country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, street VARCHAR(255) NOT NULL, commentary VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_750D05FA27C973E (command_shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, price INT NOT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spell (id INT AUTO_INCREMENT NOT NULL, champion_id INT NOT NULL, name VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, is_passive TINYINT(1) NOT NULL, resume VARCHAR(255) NOT NULL, spell_image VARCHAR(255) NOT NULL, cost INT NOT NULL, type VARCHAR(255) NOT NULL, cooldown INT NOT NULL, INDEX IDX_D03FCD8DFA7FD7EB (champion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, cover VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE command_shop ADD CONSTRAINT FK_DC0E22FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE command_shop_line ADD CONSTRAINT FK_97D71D86A27C973E FOREIGN KEY (command_shop_id) REFERENCES command_shop (id)');
        $this->addSql('ALTER TABLE command_shop_line ADD CONSTRAINT FK_97D71D864584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE delivery_address ADD CONSTRAINT FK_750D05FA27C973E FOREIGN KEY (command_shop_id) REFERENCES command_shop (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8DFA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8DFA7FD7EB');
        $this->addSql('ALTER TABLE command_shop_line DROP FOREIGN KEY FK_97D71D86A27C973E');
        $this->addSql('ALTER TABLE delivery_address DROP FOREIGN KEY FK_750D05FA27C973E');
        $this->addSql('ALTER TABLE command_shop_line DROP FOREIGN KEY FK_97D71D864584665A');
        $this->addSql('ALTER TABLE command_shop DROP FOREIGN KEY FK_DC0E22FA76ED395');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE champion');
        $this->addSql('DROP TABLE command_shop');
        $this->addSql('DROP TABLE command_shop_line');
        $this->addSql('DROP TABLE content_collection');
        $this->addSql('DROP TABLE delivery_address');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE spell');
        $this->addSql('DROP TABLE user');
    }
}
