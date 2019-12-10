<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191210133604 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, time TIME NOT NULL, date DATE NOT NULL, location VARCHAR(255) NOT NULL, max_persons NUMERIC(10, 3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, duration NUMERIC(10, 2) NOT NULL, costs NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member ADD lesson_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA7835A24AD0 FOREIGN KEY (lesson_id_id) REFERENCES lesson (id)');
        $this->addSql('CREATE INDEX IDX_70E4FA7835A24AD0 ON member (lesson_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA7835A24AD0');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP INDEX IDX_70E4FA7835A24AD0 ON member');
        $this->addSql('ALTER TABLE member DROP lesson_id_id');
    }
}
