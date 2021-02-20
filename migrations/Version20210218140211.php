<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210218140211 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE retour_article (retour_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_F0632AEA28D6031F (retour_id), INDEX IDX_F0632AEA7294869C (article_id), PRIMARY KEY(retour_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE retour_article ADD CONSTRAINT FK_F0632AEA28D6031F FOREIGN KEY (retour_id) REFERENCES retour (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE retour_article ADD CONSTRAINT FK_F0632AEA7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE retour_article');
    }
}
