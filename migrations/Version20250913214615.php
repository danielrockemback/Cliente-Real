<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250913214615 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_property_value (id INT IDENTITY NOT NULL, product_id INT, product_property_id INT, value NVARCHAR(255), language INT, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_880DE7154584665A ON product_property_value (product_id)');
        $this->addSql('CREATE INDEX IDX_880DE715F8BD8DF3 ON product_property_value (product_property_id)');
        $this->addSql('ALTER TABLE product_property_value ADD CONSTRAINT FK_880DE7154584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_property_value ADD CONSTRAINT FK_880DE715F8BD8DF3 FOREIGN KEY (product_property_id) REFERENCES product_property (id)');
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
        $this->addSql('ALTER TABLE product_property_value DROP CONSTRAINT FK_880DE7154584665A');
        $this->addSql('ALTER TABLE product_property_value DROP CONSTRAINT FK_880DE715F8BD8DF3');
        $this->addSql('DROP TABLE product_property_value');
    }
}
