<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250903001322 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE page_seo (id INT IDENTITY NOT NULL, home_page_title NVARCHAR(255) NOT NULL, about_us_page_title NVARCHAR(255) NOT NULL, about_us_page_description NVARCHAR(255) NOT NULL, product_listing_page_title NVARCHAR(255) NOT NULL, product_listing_page_description NVARCHAR(255) NOT NULL, news_listing_page_title NVARCHAR(255) NOT NULL, news_listing_page_description NVARCHAR(255) NOT NULL, service_listing_page_title NVARCHAR(255) NOT NULL, service_listing_page_description NVARCHAR(255) NOT NULL, financing_list_page_title NVARCHAR(255) NOT NULL, financing_list_page_description NVARCHAR(255) NOT NULL, video_listing_page_title NVARCHAR(255) NOT NULL, video_listing_page_description NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
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
        $this->addSql('DROP TABLE page_seo');
    }
}
