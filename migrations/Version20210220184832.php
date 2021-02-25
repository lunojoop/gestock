<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210220184832 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, fournisseur_id INT DEFAULT NULL, famille_id INT DEFAULT NULL, designation VARCHAR(255) NOT NULL, conditionnement VARCHAR(255) NOT NULL, stock_initial INT NOT NULL, stock_actuel INT NOT NULL, INDEX IDX_23A0E66670C757F (fournisseur_id), INDEX IDX_23A0E6697A77B84 (famille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entree (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, numero_be VARCHAR(255) NOT NULL, quantite INT NOT NULL, prix_unitaire_ht INT NOT NULL, montant_ht INT NOT NULL, INDEX IDX_598377A67294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrepot (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrepot_departement (entrepot_id INT NOT NULL, departement_id INT NOT NULL, INDEX IDX_87BCA2DD72831E97 (entrepot_id), INDEX IDX_87BCA2DDCCF9E01E (departement_id), PRIMARY KEY(entrepot_id, departement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, departement_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_2473F213CCF9E01E (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inventaire (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, date_inventaire DATE NOT NULL, quantite INT NOT NULL, numero_fi VARCHAR(255) NOT NULL, INDEX IDX_338920E07294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE retour (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, numero_br VARCHAR(255) NOT NULL, quantite INT NOT NULL, date_retour DATE NOT NULL, INDEX IDX_ED6FD3217294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sortie (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, numero_bs INT NOT NULL, quantite INT NOT NULL, date_sortie DATE NOT NULL, INDEX IDX_3C3FD3F27294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6697A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('ALTER TABLE entree ADD CONSTRAINT FK_598377A67294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE entrepot_departement ADD CONSTRAINT FK_87BCA2DD72831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrepot_departement ADD CONSTRAINT FK_87BCA2DDCCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE famille ADD CONSTRAINT FK_2473F213CCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE inventaire ADD CONSTRAINT FK_338920E07294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE retour ADD CONSTRAINT FK_ED6FD3217294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F27294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entree DROP FOREIGN KEY FK_598377A67294869C');
        $this->addSql('ALTER TABLE inventaire DROP FOREIGN KEY FK_338920E07294869C');
        $this->addSql('ALTER TABLE retour DROP FOREIGN KEY FK_ED6FD3217294869C');
        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F27294869C');
        $this->addSql('ALTER TABLE entrepot_departement DROP FOREIGN KEY FK_87BCA2DDCCF9E01E');
        $this->addSql('ALTER TABLE famille DROP FOREIGN KEY FK_2473F213CCF9E01E');
        $this->addSql('ALTER TABLE entrepot_departement DROP FOREIGN KEY FK_87BCA2DD72831E97');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6697A77B84');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66670C757F');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE entree');
        $this->addSql('DROP TABLE entrepot');
        $this->addSql('DROP TABLE entrepot_departement');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE inventaire');
        $this->addSql('DROP TABLE retour');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE sortie');
        $this->addSql('DROP TABLE user');
    }
}
