<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180723145709 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE propuesta DROP FOREIGN KEY FK_949823E043ECBEC0');
        $this->addSql('DROP INDEX IDX_949823E043ECBEC0 ON propuesta');
        $this->addSql('ALTER TABLE propuesta CHANGE id_juego_id juego_id INT NOT NULL');
        $this->addSql('ALTER TABLE propuesta ADD CONSTRAINT FK_949823E013375255 FOREIGN KEY (juego_id) REFERENCES juego (id)');
        $this->addSql('CREATE INDEX IDX_949823E013375255 ON propuesta (juego_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE propuesta DROP FOREIGN KEY FK_949823E013375255');
        $this->addSql('DROP INDEX IDX_949823E013375255 ON propuesta');
        $this->addSql('ALTER TABLE propuesta CHANGE juego_id id_juego_id INT NOT NULL');
        $this->addSql('ALTER TABLE propuesta ADD CONSTRAINT FK_949823E043ECBEC0 FOREIGN KEY (id_juego_id) REFERENCES juego (id)');
        $this->addSql('CREATE INDEX IDX_949823E043ECBEC0 ON propuesta (id_juego_id)');
    }
}
