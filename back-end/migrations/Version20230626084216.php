<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230626084216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE `order` CHANGE reference reference VARCHAR(50) NOT NULL, CHANGE payment_id payment_id VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09558FBEB9');
        $this->addSql('DROP INDEX IDX_52EA1F09558FBEB9 ON order_item');
        $this->addSql('ALTER TABLE order_item CHANGE purchase_id order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F098D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_52EA1F098D9F6D38 ON order_item (order_id)');
        $this->addSql('ALTER TABLE product CHANGE name name VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE `order` CHANGE reference reference VARCHAR(255) NOT NULL, CHANGE payment_id payment_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F098D9F6D38');
        $this->addSql('DROP INDEX IDX_52EA1F098D9F6D38 ON order_item');
        $this->addSql('ALTER TABLE order_item CHANGE order_id purchase_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09558FBEB9 FOREIGN KEY (purchase_id) REFERENCES `order` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_52EA1F09558FBEB9 ON order_item (purchase_id)');
        $this->addSql('ALTER TABLE product CHANGE name name VARCHAR(255) NOT NULL');
    }
}
