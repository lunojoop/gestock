<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210218134528 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entrepot_departement (entrepot_id INT NOT NULL, departement_id INT NOT NULL, INDEX IDX_87BCA2DD72831E97 (entrepot_id), INDEX IDX_87BCA2DDCCF9E01E (departement_id), PRIMARY KEY(entrepot_id, departement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entrepot_departement ADD CONSTRAINT FK_87BCA2DD72831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrepot_departement ADD CONSTRAINT FK_87BCA2DDCCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD fournisseur_id INT DEFAULT NULL, ADD famille_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6697A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66670C757F ON article (fournisseur_id)');
        $this->addSql('CREATE INDEX IDX_23A0E6697A77B84 ON article (famille_id)');
        $this->addSql('ALTER TABLE famille ADD departement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE famille ADD CONSTRAINT FK_2473F213CCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
        $this->addSql('CREATE INDEX IDX_2473F213CCF9E01E ON famille (departement_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE entrepot_departement');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66670C757F');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6697A77B84');
        $this->addSql('DROP INDEX IDX_23A0E66670C757F ON article');
        $this->addSql('DROP INDEX IDX_23A0E6697A77B84 ON article');
        $this->addSql('ALTER TABLE article DROP fournisseur_id, DROP famille_id');
        $this->addSql('ALTER TABLE famille DROP FOREIGN KEY FK_2473F213CCF9E01E');
        $this->addSql('DROP INDEX IDX_2473F213CCF9E01E ON famille');
        $this->addSql('ALTER TABLE famille DROP departement_id');
    }
}
