<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210302202239 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE consultorio.especialidade (id INT AUTO_INCREMENT NOT NULL, descricao VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultorio.medico (id INT AUTO_INCREMENT NOT NULL, especialidade_id INT NOT NULL, crm VARCHAR(30) NOT NULL, nome VARCHAR(150) NOT NULL, INDEX IDX_DE24B1C63BA9BFA5 (especialidade_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE consultorio.medico ADD CONSTRAINT FK_DE24B1C63BA9BFA5 FOREIGN KEY (especialidade_id) REFERENCES consultorio.especialidade (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE consultorio.especialidade');
        $this->addSql('DROP TABLE consultorio.medico');
    }
}
