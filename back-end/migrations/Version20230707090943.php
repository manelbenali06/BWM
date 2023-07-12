<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230707090943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD payment_id VARCHAR(50) NOT NULL, DROP created_at, DROP status');
        $this->addSql('ALTER TABLE order_item DROP paid_at, DROP status, DROP reference');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_item ADD paid_at DATETIME NOT NULL, ADD status VARCHAR(255) NOT NULL, ADD reference VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD created_at DATETIME NOT NULL, ADD status VARCHAR(255) NOT NULL, DROP payment_id');
    }
}
