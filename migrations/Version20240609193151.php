<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240609193151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ciclu (id INT AUTO_INCREMENT NOT NULL, ciclu VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faculty (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gr_type (id INT AUTO_INCREMENT NOT NULL, form_of_education VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groups (id INT AUTO_INCREMENT NOT NULL, gr_type_id INT NOT NULL, ciclu_id INT NOT NULL, specialization_id INT NOT NULL, name VARCHAR(10) NOT NULL, start_year INT NOT NULL, end_year INT NOT NULL, INDEX IDX_F06D3970DAC22EAB (gr_type_id), INDEX IDX_F06D3970322BDA33 (ciclu_id), INDEX IDX_F06D3970FA846217 (specialization_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialization (id INT AUTO_INCREMENT NOT NULL, faculty_id INT NOT NULL, name VARCHAR(40) NOT NULL, INDEX IDX_9ED9F26A680CAB68 (faculty_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE students (id INT AUTO_INCREMENT NOT NULL, groups_id INT NOT NULL, name VARCHAR(15) NOT NULL, surname VARCHAR(20) NOT NULL, birth VARCHAR(10) NOT NULL, address VARCHAR(50) NOT NULL, INDEX IDX_A4698DB2F373DCF (groups_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D3970DAC22EAB FOREIGN KEY (gr_type_id) REFERENCES gr_type (id)');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D3970322BDA33 FOREIGN KEY (ciclu_id) REFERENCES ciclu (id)');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D3970FA846217 FOREIGN KEY (specialization_id) REFERENCES specialization (id)');
        $this->addSql('ALTER TABLE specialization ADD CONSTRAINT FK_9ED9F26A680CAB68 FOREIGN KEY (faculty_id) REFERENCES faculty (id)');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT FK_A4698DB2F373DCF FOREIGN KEY (groups_id) REFERENCES groups (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groups DROP FOREIGN KEY FK_F06D3970DAC22EAB');
        $this->addSql('ALTER TABLE groups DROP FOREIGN KEY FK_F06D3970322BDA33');
        $this->addSql('ALTER TABLE groups DROP FOREIGN KEY FK_F06D3970FA846217');
        $this->addSql('ALTER TABLE specialization DROP FOREIGN KEY FK_9ED9F26A680CAB68');
        $this->addSql('ALTER TABLE students DROP FOREIGN KEY FK_A4698DB2F373DCF');
        $this->addSql('DROP TABLE ciclu');
        $this->addSql('DROP TABLE faculty');
        $this->addSql('DROP TABLE gr_type');
        $this->addSql('DROP TABLE groups');
        $this->addSql('DROP TABLE specialization');
        $this->addSql('DROP TABLE students');
    }
}
