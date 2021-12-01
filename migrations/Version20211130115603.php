<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130115603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fan ADD hero_id INT DEFAULT NULL, DROP hero');
        $this->addSql('ALTER TABLE fan ADD CONSTRAINT FK_65F7783945B0BCD FOREIGN KEY (hero_id) REFERENCES hero (id)');
        $this->addSql('CREATE INDEX IDX_65F7783945B0BCD ON fan (hero_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fan DROP FOREIGN KEY FK_65F7783945B0BCD');
        $this->addSql('DROP INDEX IDX_65F7783945B0BCD ON fan');
        $this->addSql('ALTER TABLE fan ADD hero VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP hero_id');
    }
}
