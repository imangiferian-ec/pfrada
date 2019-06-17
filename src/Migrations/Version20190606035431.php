<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190606035431 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE roles (id BIGINT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corporations (id BIGINT AUTO_INCREMENT NOT NULL, business_type_id BIGINT NOT NULL, user_id BIGINT NOT NULL, business_name VARCHAR(255) NOT NULL, date_registered DATE NOT NULL, bir_no VARCHAR(255) NOT NULL, tin_no VARCHAR(255) NOT NULL, philgeps VARCHAR(255) DEFAULT NULL, owner_name VARCHAR(255) NOT NULL, contact_person_name VARCHAR(255) NOT NULL, email_of_contact_person VARCHAR(255) NOT NULL, contact_no VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_6F3B37C7987F37DE (business_type_id), UNIQUE INDEX UNIQ_6F3B37C7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE citizens (id BIGINT AUTO_INCREMENT NOT NULL, user_id BIGINT NOT NULL, citizen_image LONGTEXT DEFAULT NULL, lastname VARCHAR(100) NOT NULL, firstname VARCHAR(100) NOT NULL, middlename VARCHAR(100) DEFAULT NULL, extension_name VARCHAR(100) DEFAULT NULL, maiden_name VARCHAR(100) DEFAULT NULL, address LONGTEXT NOT NULL, barangay VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, gender VARCHAR(1) NOT NULL, civil_status VARCHAR(30) NOT NULL, email VARCHAR(255) NOT NULL, contact_no VARCHAR(20) NOT NULL, citizen_voter_id VARCHAR(255) DEFAULT NULL, is_brgy_employee TINYINT(1) DEFAULT \'0\' NOT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, UNIQUE INDEX UNIQ_59150470A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clearance_fees (id BIGINT AUTO_INCREMENT NOT NULL, clearance_purpose_id BIGINT NOT NULL, voter_fee_amount DOUBLE PRECISION DEFAULT \'0\' NOT NULL, non_voter_fee_amount DOUBLE PRECISION DEFAULT \'0\' NOT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, INDEX IDX_31D31E4063CCB60E (clearance_purpose_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clearance_purposes (id BIGINT AUTO_INCREMENT NOT NULL, purpose VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE business_permit_fees (id BIGINT AUTO_INCREMENT NOT NULL, business_type_id BIGINT NOT NULL, new_applicant_charge DOUBLE PRECISION DEFAULT \'0\' NOT NULL, renewal_applicant_charge DOUBLE PRECISION DEFAULT \'0\' NOT NULL, is_for_citizen TINYINT(1) DEFAULT \'1\' NOT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_C31DABF1987F37DE (business_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE business_types (id BIGINT AUTO_INCREMENT NOT NULL, business_type_name VARCHAR(255) NOT NULL, business_type_description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE system_modules (id BIGINT AUTO_INCREMENT NOT NULL, module_name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, allowed_roles JSON NOT NULL COMMENT \'(DC2Type:json_array)\', position SMALLINT NOT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles_function_permissions (id BIGINT AUTO_INCREMENT NOT NULL, module_id BIGINT NOT NULL, function_name VARCHAR(100) NOT NULL, route VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, permitted_roles JSON NOT NULL COMMENT \'(DC2Type:json_array)\', position SMALLINT NOT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, is_side_menu TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX IDX_46D4D2B0AFC2B591 (module_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id BIGINT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(100) NOT NULL, firstname VARCHAR(100) NOT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, birth_date DATE NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_fees (id BIGINT AUTO_INCREMENT NOT NULL, facility_id BIGINT NOT NULL, fee_per_hour DOUBLE PRECISION DEFAULT \'0\' NOT NULL, maintenance_fee DOUBLE PRECISION DEFAULT \'0\', is_active TINYINT(1) DEFAULT \'1\' NOT NULL, INDEX IDX_B6AA0C04A7014910 (facility_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facilities (id BIGINT AUTO_INCREMENT NOT NULL, facility_name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE corporations ADD CONSTRAINT FK_6F3B37C7987F37DE FOREIGN KEY (business_type_id) REFERENCES business_types (id)');
        $this->addSql('ALTER TABLE corporations ADD CONSTRAINT FK_6F3B37C7A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE citizens ADD CONSTRAINT FK_59150470A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE clearance_fees ADD CONSTRAINT FK_31D31E4063CCB60E FOREIGN KEY (clearance_purpose_id) REFERENCES clearance_purposes (id)');
        $this->addSql('ALTER TABLE business_permit_fees ADD CONSTRAINT FK_C31DABF1987F37DE FOREIGN KEY (business_type_id) REFERENCES business_types (id)');
        $this->addSql('ALTER TABLE roles_function_permissions ADD CONSTRAINT FK_46D4D2B0AFC2B591 FOREIGN KEY (module_id) REFERENCES system_modules (id)');
        $this->addSql('ALTER TABLE reservation_fees ADD CONSTRAINT FK_B6AA0C04A7014910 FOREIGN KEY (facility_id) REFERENCES facilities (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE clearance_fees DROP FOREIGN KEY FK_31D31E4063CCB60E');
        $this->addSql('ALTER TABLE corporations DROP FOREIGN KEY FK_6F3B37C7987F37DE');
        $this->addSql('ALTER TABLE business_permit_fees DROP FOREIGN KEY FK_C31DABF1987F37DE');
        $this->addSql('ALTER TABLE roles_function_permissions DROP FOREIGN KEY FK_46D4D2B0AFC2B591');
        $this->addSql('ALTER TABLE corporations DROP FOREIGN KEY FK_6F3B37C7A76ED395');
        $this->addSql('ALTER TABLE citizens DROP FOREIGN KEY FK_59150470A76ED395');
        $this->addSql('ALTER TABLE reservation_fees DROP FOREIGN KEY FK_B6AA0C04A7014910');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE corporations');
        $this->addSql('DROP TABLE citizens');
        $this->addSql('DROP TABLE clearance_fees');
        $this->addSql('DROP TABLE clearance_purposes');
        $this->addSql('DROP TABLE business_permit_fees');
        $this->addSql('DROP TABLE business_types');
        $this->addSql('DROP TABLE system_modules');
        $this->addSql('DROP TABLE roles_function_permissions');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE reservation_fees');
        $this->addSql('DROP TABLE facilities');
    }
}
