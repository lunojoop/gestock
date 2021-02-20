<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210218141909 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE retour_article');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66AF7BD910');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66CC72D953');
        $this->addSql('DROP INDEX IDX_23A0E66CC72D953 ON article');
        $this->addSql('DROP INDEX IDX_23A0E66AF7BD910 ON article');
        $this->addSql('ALTER TABLE article DROP entree_id, DROP sortie_id');
        $this->addSql('ALTER TABLE entree ADD article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entree ADD CONSTRAINT FK_598377A67294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_598377A67294869C ON entree (article_id)');
        $this->addSql('ALTER TABLE retour ADD article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE retour ADD CONSTRAINT FK_ED6FD3217294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_ED6FD3217294869C ON retour (article_id)');
        $this->addSql('ALTER TABLE sortie ADD article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F27294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_3C3FD3F27294869C ON sortie (article_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE retour_article (retour_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_F0632AEA28D6031F (retour_id), INDEX IDX_F0632AEA7294869C (article_id), PRIMARY KEY(retour_id, article_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE retour_article ADD CONSTRAINT FK_F0632AEA28D6031F FOREIGN KEY (retour_id) REFERENCES retour (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE retour_article ADD CONSTRAINT FK_F0632AEA7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD entree_id INT DEFAULT NULL, ADD sortie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66AF7BD910 FOREIGN KEY (entree_id) REFERENCES entree (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66CC72D953 FOREIGN KEY (sortie_id) REFERENCES sortie (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66CC72D953 ON article (sortie_id)');
        $this->addSql('CREATE INDEX IDX_23A0E66AF7BD910 ON article (entree_id)');
        $this->addSql('ALTER TABLE entree DROP FOREIGN KEY FK_598377A67294869C');
        $this->addSql('DROP INDEX IDX_598377A67294869C ON entree');
        $this->addSql('ALTER TABLE entree DROP article_id');
        $this->addSql('ALTER TABLE retour DROP FOREIGN KEY FK_ED6FD3217294869C');
        $this->addSql('DROP INDEX IDX_ED6FD3217294869C ON retour');
        $this->addSql('ALTER TABLE retour DROP article_id');
        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F27294869C');
        $this->addSql('DROP INDEX IDX_3C3FD3F27294869C ON sortie');
        $this->addSql('ALTER TABLE sortie DROP article_id');
    }
}
