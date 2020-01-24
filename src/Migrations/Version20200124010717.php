<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200124010717 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE reply');
        $this->addSql('ALTER TABLE question ADD reply1 VARCHAR(255) NOT NULL, ADD reply2 VARCHAR(255) NOT NULL, ADD reply3 VARCHAR(255) NOT NULL, ADD reply4 VARCHAR(255) NOT NULL, ADD truth1 TINYINT(1) NOT NULL, ADD truth2 TINYINT(1) NOT NULL, ADD truth3 TINYINT(1) NOT NULL, ADD truth4 TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE reply (id INT AUTO_INCREMENT NOT NULL, question_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, truth TINYINT(1) NOT NULL, INDEX IDX_FDA8C6E01E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reply ADD CONSTRAINT FK_FDA8C6E01E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE question DROP reply1, DROP reply2, DROP reply3, DROP reply4, DROP truth1, DROP truth2, DROP truth3, DROP truth4');
    }
}
