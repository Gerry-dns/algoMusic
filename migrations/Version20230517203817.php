<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517203817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupe_instrument (groupe_id INT NOT NULL, instrument_id INT NOT NULL, INDEX IDX_845258017A45358C (groupe_id), INDEX IDX_84525801CF11D9C (instrument_id), PRIMARY KEY(groupe_id, instrument_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instrument_genre (instrument_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_5B8A8791CF11D9C (instrument_id), INDEX IDX_5B8A87914296D31F (genre_id), PRIMARY KEY(instrument_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groupe_instrument ADD CONSTRAINT FK_845258017A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_instrument ADD CONSTRAINT FK_84525801CF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE instrument_genre ADD CONSTRAINT FK_5B8A8791CF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE instrument_genre ADD CONSTRAINT FK_5B8A87914296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annee ADD decennie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annee ADD CONSTRAINT FK_DE92C5CFA90CDF61 FOREIGN KEY (decennie_id) REFERENCES decennie (id)');
        $this->addSql('CREATE INDEX IDX_DE92C5CFA90CDF61 ON annee (decennie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe_instrument DROP FOREIGN KEY FK_845258017A45358C');
        $this->addSql('ALTER TABLE groupe_instrument DROP FOREIGN KEY FK_84525801CF11D9C');
        $this->addSql('ALTER TABLE instrument_genre DROP FOREIGN KEY FK_5B8A8791CF11D9C');
        $this->addSql('ALTER TABLE instrument_genre DROP FOREIGN KEY FK_5B8A87914296D31F');
        $this->addSql('DROP TABLE groupe_instrument');
        $this->addSql('DROP TABLE instrument_genre');
        $this->addSql('ALTER TABLE annee DROP FOREIGN KEY FK_DE92C5CFA90CDF61');
        $this->addSql('DROP INDEX IDX_DE92C5CFA90CDF61 ON annee');
        $this->addSql('ALTER TABLE annee DROP decennie_id');
    }
}
