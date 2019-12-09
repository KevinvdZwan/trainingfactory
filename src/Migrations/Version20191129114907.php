<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191129114907 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE registration');
        $this->addSql('DROP TABLE training');
        $this->addSql('ALTER TABLE member ADD id INT AUTO_INCREMENT NOT NULL, DROP street, DROP postalcode, DROP place, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, time DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, date DATE NOT NULL, location VARCHAR(255) NOT NULL COLLATE utf8mb4_general_ci, max_persons INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, loginname VARCHAR(255) NOT NULL COLLATE utf8mb4_general_ci, password VARCHAR(300) NOT NULL COLLATE utf8mb4_general_ci, firstname VARCHAR(255) NOT NULL COLLATE utf8mb4_general_ci, preprovision TINYINT(1) NOT NULL, dateofbirth DATE NOT NULL, gender VARCHAR(10) NOT NULL COLLATE utf8mb4_general_ci, emailadress VARCHAR(255) NOT NULL COLLATE utf8mb4_general_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE registration (id INT AUTO_INCREMENT NOT NULL, payment NUMERIC(1, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE training (ìd INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL COLLATE utf8mb4_general_ci, description VARCHAR(300) NOT NULL COLLATE utf8mb4_general_ci, duration VARCHAR(255) NOT NULL COLLATE utf8mb4_general_ci, costs DOUBLE PRECISION NOT NULL, PRIMARY KEY(ìd)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE member MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE member DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE member ADD street VARCHAR(255) NOT NULL COLLATE utf8mb4_general_ci, ADD postalcode VARCHAR(10) NOT NULL COLLATE utf8mb4_general_ci, ADD place VARCHAR(255) NOT NULL COLLATE utf8mb4_general_ci, DROP id');
    }
}
