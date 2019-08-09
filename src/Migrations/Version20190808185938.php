<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190808185938 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX numero_compte ON compte');
        $this->addSql('ALTER TABLE transaction ADD code_transaction VARCHAR(255) NOT NULL, DROP cniexpediteur');
        $this->addSql('DROP INDEX cni ON user_partenaire');
        $this->addSql('DROP INDEX password ON user_partenaire');
        $this->addSql('DROP INDEX telephone ON user_partenaire');
        $this->addSql('DROP INDEX email ON user_partenaire');
        $this->addSql('DROP INDEX email ON partenaire');
        $this->addSql('DROP INDEX cni ON partenaire');
        $this->addSql('DROP INDEX password ON partenaire');
        $this->addSql('DROP INDEX ninea ON partenaire');
        $this->addSql('DROP INDEX telephone ON partenaire');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE UNIQUE INDEX numero_compte ON compte (numero_compte)');
        $this->addSql('CREATE UNIQUE INDEX email ON partenaire (email)');
        $this->addSql('CREATE UNIQUE INDEX cni ON partenaire (cni)');
        $this->addSql('CREATE UNIQUE INDEX password ON partenaire (password)');
        $this->addSql('CREATE UNIQUE INDEX ninea ON partenaire (ninea)');
        $this->addSql('CREATE UNIQUE INDEX telephone ON partenaire (telephone)');
        $this->addSql('ALTER TABLE transaction ADD cniexpediteur INT NOT NULL, DROP code_transaction');
        $this->addSql('CREATE UNIQUE INDEX cni ON user_partenaire (cni)');
        $this->addSql('CREATE UNIQUE INDEX password ON user_partenaire (password)');
        $this->addSql('CREATE UNIQUE INDEX telephone ON user_partenaire (telephone)');
        $this->addSql('CREATE UNIQUE INDEX email ON user_partenaire (email)');
    }
}
