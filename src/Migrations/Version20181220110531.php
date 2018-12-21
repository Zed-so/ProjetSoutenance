<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181220110531 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE objects (id INT AUTO_INCREMENT NOT NULL, repas INT DEFAULT NULL, heal LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', clothes LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', weapons LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', objects LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_inv (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, inventory LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:object)\', UNIQUE INDEX UNIQ_877EFABE79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_stats (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, strenght INT NOT NULL, dexterity INT NOT NULL, constitution INT NOT NULL, hp INT NOT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_E8351CEC79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_inv ADD CONSTRAINT FK_877EFABE79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE player_stats ADD CONSTRAINT FK_E8351CEC79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD is_active TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE objects');
        $this->addSql('DROP TABLE player_inv');
        $this->addSql('DROP TABLE player_stats');
        $this->addSql('ALTER TABLE user DROP roles, DROP is_active');
    }
}
