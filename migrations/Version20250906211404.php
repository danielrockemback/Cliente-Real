<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250906211404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE who_we_are_page ADD image_two NVARCHAR(255)');
        $this->addSql('ALTER TABLE who_we_are_page ADD image_updated_at_two DATETIME2(6)');
        $this->addSql('ALTER TABLE who_we_are_page ADD image_three NVARCHAR(255)');
        $this->addSql('ALTER TABLE who_we_are_page ADD image_updated_at_three DATETIME2(6)');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime_immutable)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'who_we_are_page\', N\'COLUMN\', \'image_updated_at_two\'');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime_immutable)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'who_we_are_page\', N\'COLUMN\', \'image_updated_at_three\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE who_we_are_page DROP COLUMN image_two');
        $this->addSql('ALTER TABLE who_we_are_page DROP COLUMN image_updated_at_two');
        $this->addSql('ALTER TABLE who_we_are_page DROP COLUMN image_three');
        $this->addSql('ALTER TABLE who_we_are_page DROP COLUMN image_updated_at_three');
    }
}
