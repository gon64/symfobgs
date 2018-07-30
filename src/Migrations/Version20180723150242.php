<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180723150242 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE demanda (id INT AUTO_INCREMENT NOT NULL, estado VARCHAR(255) NOT NULL, comentario VARCHAR(2550) DEFAULT NULL, ubicacion_gps VARCHAR(255) DEFAULT NULL, ratio_gps INT DEFAULT NULL, precio_desde DOUBLE PRECISION NOT NULL, precio_hasta DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oferta (id INT AUTO_INCREMENT NOT NULL, estado VARCHAR(255) NOT NULL, comentario VARCHAR(2550) DEFAULT NULL, ubicacion_gps VARCHAR(255) DEFAULT NULL, ratio_gps INT DEFAULT NULL, precio_venta DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE demanda');
        $this->addSql('DROP TABLE oferta');
    }
}
