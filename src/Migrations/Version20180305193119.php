<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20180305193119 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql('ALTER TABLE parcel ADD weight SMALLINT DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        $this->addSql('ALTER TABLE parcel DROP weight');
    }
}
