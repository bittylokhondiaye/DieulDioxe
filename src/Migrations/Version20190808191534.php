<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190808191534 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX cnidestinataire ON transaction');
        $this->addSql('DROP INDEX numero_destinataire ON transaction');
        $this->addSql('DROP INDEX numero_expediteur ON transaction');
        $this->addSql('ALTER TABLE transaction ADD compte_id INT NOT NULL, CHANGE cnidestinataire cnidestinataire INT DEFAULT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('CREATE INDEX IDX_723705D1F2C56620 ON transaction (compte_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1F2C56620');
        $this->addSql('DROP INDEX IDX_723705D1F2C56620 ON transaction');
        $this->addSql('ALTER TABLE transaction DROP compte_id, CHANGE cnidestinataire cnidestinataire INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX cnidestinataire ON transaction (cnidestinataire)');
        $this->addSql('CREATE UNIQUE INDEX numero_destinataire ON transaction (numero_destinataire)');
        $this->addSql('CREATE UNIQUE INDEX numero_expediteur ON transaction (numero_expediteur)');
    }
}
