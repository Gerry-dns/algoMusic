<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517191016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupe_genre (groupe_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_D6FDFDA87A45358C (groupe_id), INDEX IDX_D6FDFDA84296D31F (genre_id), PRIMARY KEY(groupe_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groupe_genre ADD CONSTRAINT FK_D6FDFDA87A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_genre ADD CONSTRAINT FK_D6FDFDA84296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe_genre DROP FOREIGN KEY FK_D6FDFDA87A45358C');
        $this->addSql('ALTER TABLE groupe_genre DROP FOREIGN KEY FK_D6FDFDA84296D31F');
        $this->addSql('DROP TABLE groupe_genre');
    }
}
