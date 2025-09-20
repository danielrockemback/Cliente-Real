<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250920000034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE news (id INT IDENTITY NOT NULL, status BIT, highlighted BIT, date DATE, title NVARCHAR(255), short_description NVARCHAR(255), youtube_video_code NVARCHAR(255), full_description VARCHAR(MAX), image NVARCHAR(255), image_updated_at DATETIME2(6), language INT, PRIMARY KEY (id))');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime_immutable)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'news\', N\'COLUMN\', \'image_updated_at\'');
        $this->addSql('CREATE TABLE news_news_category (news_id INT NOT NULL, news_category_id INT NOT NULL, PRIMARY KEY (news_id, news_category_id))');
        $this->addSql('CREATE INDEX IDX_1A91D6D6B5A459A0 ON news_news_category (news_id)');
        $this->addSql('CREATE INDEX IDX_1A91D6D63B732BAD ON news_news_category (news_category_id)');
        $this->addSql('ALTER TABLE news_news_category ADD CONSTRAINT FK_1A91D6D6B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_news_category ADD CONSTRAINT FK_1A91D6D63B732BAD FOREIGN KEY (news_category_id) REFERENCES news_category (id) ON DELETE CASCADE');
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
        $this->addSql('ALTER TABLE news_news_category DROP CONSTRAINT FK_1A91D6D6B5A459A0');
        $this->addSql('ALTER TABLE news_news_category DROP CONSTRAINT FK_1A91D6D63B732BAD');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE news_news_category');
    }
}
