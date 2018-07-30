<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180723145207 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE propuesta (id INT AUTO_INCREMENT NOT NULL, id_juego_id INT NOT NULL, usuario_id INT NOT NULL, estado VARCHAR(255) NOT NULL, comentario VARCHAR(2550) DEFAULT NULL, ubicacion_gps VARCHAR(255) DEFAULT NULL, ratio_gps INT DEFAULT NULL, INDEX IDX_949823E043ECBEC0 (id_juego_id), UNIQUE INDEX UNIQ_949823E0DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE propuesta ADD CONSTRAINT FK_949823E043ECBEC0 FOREIGN KEY (id_juego_id) REFERENCES juego (id)');
        $this->addSql('ALTER TABLE propuesta ADD CONSTRAINT FK_949823E0DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('DROP TABLE administrador');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE administrador (id INT AUTO_INCREMENT NOT NULL, nombre_usuario VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, clave VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, nombre VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, direccion VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ubicacion_gps VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, clave_admin VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE propuesta');
    }
}
