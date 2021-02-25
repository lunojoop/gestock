<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210220171622 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entree CHANGE numero_bc numero_be VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE inventaire ADD numero_fi VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sortie CHANGE numero_bl numero_bs INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entree CHANGE numero_be numero_bc VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE inventaire DROP numero_fi');
        $this->addSql('ALTER TABLE sortie CHANGE numero_bs numero_bl INT NOT NULL');
    }
}
