<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190802171338 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD image_name VARCHAR(255) NOT NULL, DROP image_name_name, DROP image_name_original_name, DROP image_name_mime_type, DROP image_name_size, DROP image_name_dimensions');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD image_name_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD image_name_original_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD image_name_mime_type VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD image_name_size INT DEFAULT NULL, ADD image_name_dimensions LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:simple_array)\', DROP image_name');
    }
}
