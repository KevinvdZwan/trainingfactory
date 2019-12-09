<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191202113008 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE member ADD id_member_id INT NOT NULL');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78F5A26FD9 FOREIGN KEY (id_member_id) REFERENCES registration (id)');
        $this->addSql('CREATE INDEX IDX_70E4FA78F5A26FD9 ON member (id_member_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78F5A26FD9');
        $this->addSql('DROP INDEX IDX_70E4FA78F5A26FD9 ON member');
        $this->addSql('ALTER TABLE member DROP id_member_id');
    }
}
