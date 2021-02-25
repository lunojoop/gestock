<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210221012947 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE entrepot_departement');
        $this->addSql('ALTER TABLE entree ADD entrepot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entree ADD CONSTRAINT FK_598377A672831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id)');
        $this->addSql('CREATE INDEX IDX_598377A672831E97 ON entree (entrepot_id)');
        $this->addSql('ALTER TABLE entrepot ADD article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entrepot ADD CONSTRAINT FK_D805175A7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_D805175A7294869C ON entrepot (article_id)');
        $this->addSql('ALTER TABLE inventaire ADD entrepot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inventaire ADD CONSTRAINT FK_338920E072831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id)');
        $this->addSql('CREATE INDEX IDX_338920E072831E97 ON inventaire (entrepot_id)');
        $this->addSql('ALTER TABLE retour ADD entrepot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE retour ADD CONSTRAINT FK_ED6FD32172831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id)');
        $this->addSql('CREATE INDEX IDX_ED6FD32172831E97 ON retour (entrepot_id)');
        $this->addSql('ALTER TABLE sortie ADD entrepot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F272831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id)');
        $this->addSql('CREATE INDEX IDX_3C3FD3F272831E97 ON sortie (entrepot_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entrepot_departement (entrepot_id INT NOT NULL, departement_id INT NOT NULL, INDEX IDX_87BCA2DD72831E97 (entrepot_id), INDEX IDX_87BCA2DDCCF9E01E (departement_id), PRIMARY KEY(entrepot_id, departement_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE entrepot_departement ADD CONSTRAINT FK_87BCA2DD72831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrepot_departement ADD CONSTRAINT FK_87BCA2DDCCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entree DROP FOREIGN KEY FK_598377A672831E97');
        $this->addSql('DROP INDEX IDX_598377A672831E97 ON entree');
        $this->addSql('ALTER TABLE entree DROP entrepot_id');
        $this->addSql('ALTER TABLE entrepot DROP FOREIGN KEY FK_D805175A7294869C');
        $this->addSql('DROP INDEX IDX_D805175A7294869C ON entrepot');
        $this->addSql('ALTER TABLE entrepot DROP article_id');
        $this->addSql('ALTER TABLE inventaire DROP FOREIGN KEY FK_338920E072831E97');
        $this->addSql('DROP INDEX IDX_338920E072831E97 ON inventaire');
        $this->addSql('ALTER TABLE inventaire DROP entrepot_id');
        $this->addSql('ALTER TABLE retour DROP FOREIGN KEY FK_ED6FD32172831E97');
        $this->addSql('DROP INDEX IDX_ED6FD32172831E97 ON retour');
        $this->addSql('ALTER TABLE retour DROP entrepot_id');
        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F272831E97');
        $this->addSql('DROP INDEX IDX_3C3FD3F272831E97 ON sortie');
        $this->addSql('ALTER TABLE sortie DROP entrepot_id');
    }
}
