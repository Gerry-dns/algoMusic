<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517212431 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupe_annee (groupe_id INT NOT NULL, annee_id INT NOT NULL, INDEX IDX_8B3F0B9F7A45358C (groupe_id), INDEX IDX_8B3F0B9F543EC5F0 (annee_id), PRIMARY KEY(groupe_id, annee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groupe_annee ADD CONSTRAINT FK_8B3F0B9F7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_annee ADD CONSTRAINT FK_8B3F0B9F543EC5F0 FOREIGN KEY (annee_id) REFERENCES annee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE instrument ADD type_instrument INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe_annee DROP FOREIGN KEY FK_8B3F0B9F7A45358C');
        $this->addSql('ALTER TABLE groupe_annee DROP FOREIGN KEY FK_8B3F0B9F543EC5F0');
        $this->addSql('DROP TABLE groupe_annee');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE instrument DROP type_instrument');
    }
}
