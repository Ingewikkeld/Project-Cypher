<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
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
CREATE TABLE `tags` (
    `person_id` CHAR(36) NOT NULL,
    `tag` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`person_id`,`tag`),
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

        $pdo->exec('DROP TABLE `tags`');
    }
}
