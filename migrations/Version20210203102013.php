<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203102013 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lesson_card (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(40) NOT NULL, content LONGTEXT NOT NULL, is_draft TINYINT(1) NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson_card_tag (lesson_card_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_1B3E795BBFB0C887 (lesson_card_id), INDEX IDX_1B3E795BBAD26311 (tag_id), PRIMARY KEY(lesson_card_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, bio LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lesson_card_tag ADD CONSTRAINT FK_1B3E795BBFB0C887 FOREIGN KEY (lesson_card_id) REFERENCES lesson_card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lesson_card_tag ADD CONSTRAINT FK_1B3E795BBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lesson_card_tag DROP FOREIGN KEY FK_1B3E795BBFB0C887');
        $this->addSql('ALTER TABLE lesson_card_tag DROP FOREIGN KEY FK_1B3E795BBAD26311');
        $this->addSql('DROP TABLE lesson_card');
        $this->addSql('DROP TABLE lesson_card_tag');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE user');
    }
}
