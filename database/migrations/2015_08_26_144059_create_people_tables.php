<?php

use Illuminate\Database\Migrations\Migration;

class CreatePeopleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var PDO $pdo */
        $pdo = DB::connection()->getPdo();

        $pdo->exec(
            <<<EOQ
CREATE TABLE `people` (
    `id` CHAR(36) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
EOQ
        );

        $pdo->exec(
            <<<EOQ
CREATE TABLE `people_data` (
    `person_id` CHAR(36) NOT NULL,
    `type` VARCHAR(32) NOT NULL,
    `label` VARCHAR(255) NOT NULL,
    `value` TEXT NOT NULL,
    PRIMARY KEY (`person_id`,`type`,`label`),
    CONSTRAINT `person_id` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
EOQ
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /** @var PDO $pdo */
        $pdo = DB::connection()->getPdo();

        $pdo->exec('DROP TABLE `people_data`');
        $pdo->exec('DROP TABLE `people`');
    }
}
