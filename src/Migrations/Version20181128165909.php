<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181128165909 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oferta ADD game_status SMALLINT NOT NULL, ADD sleeve_status SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE oferta ADD CONSTRAINT FK_7479C8F213375255 FOREIGN KEY (juego_id) REFERENCES juego (id)');
        $this->addSql('ALTER TABLE oferta ADD CONSTRAINT FK_7479C8F2DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_7479C8F213375255 ON oferta (juego_id)');
        $this->addSql('CREATE INDEX IDX_7479C8F2DB38439E ON oferta (usuario_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oferta DROP FOREIGN KEY FK_7479C8F213375255');
        $this->addSql('ALTER TABLE oferta DROP FOREIGN KEY FK_7479C8F2DB38439E');
        $this->addSql('DROP INDEX IDX_7479C8F213375255 ON oferta');
        $this->addSql('DROP INDEX IDX_7479C8F2DB38439E ON oferta');
        $this->addSql('ALTER TABLE oferta DROP game_status, DROP sleeve_status');
    }
}
