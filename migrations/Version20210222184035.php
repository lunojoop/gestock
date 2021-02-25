<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210222184035 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE stock_inventaire stock_inventaire INT NOT NULL');
        $this->addSql('ALTER TABLE entree DROP montant_ht');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE stock_inventaire stock_inventaire INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entree ADD montant_ht INT NOT NULL');
    }
}
