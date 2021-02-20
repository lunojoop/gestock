<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210218135450 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD entree_id INT DEFAULT NULL, ADD sortie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66AF7BD910 FOREIGN KEY (entree_id) REFERENCES entree (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66CC72D953 FOREIGN KEY (sortie_id) REFERENCES sortie (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66AF7BD910 ON article (entree_id)');
        $this->addSql('CREATE INDEX IDX_23A0E66CC72D953 ON article (sortie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66AF7BD910');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66CC72D953');
        $this->addSql('DROP INDEX IDX_23A0E66AF7BD910 ON article');
        $this->addSql('DROP INDEX IDX_23A0E66CC72D953 ON article');
        $this->addSql('ALTER TABLE article DROP entree_id, DROP sortie_id');
    }
}
