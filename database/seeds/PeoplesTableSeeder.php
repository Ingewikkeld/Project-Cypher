<?php

/**
 * To seed the database, execute the following commands:
 * $ composer dump-autoload
 * $ php artisan db:seed
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeoplesTableSeeder extends Seeder {
    var $faker;
    var $people;
    var $people_data;

    public function run()
    {
        // use the factory to create a Faker\Generator instance
        $this->faker = Faker\Factory::create();

        $this->runPeoples();
        $this->runPeopleData();
//        $this->run();
    }

    public function runPeoples()
    {
        // comment the below to NOT wipe the table clean before populating
        DB::table('people')->delete();

        $this->people = array(
            ['id' => $this->faker->uuid, 'name' => $this->faker->name],
            ['id' => $this->faker->uuid, 'name' => $this->faker->name],
            ['id' => $this->faker->uuid, 'name' => $this->faker->name]
        );

        // run the seeder
        DB::table('people')->insert($this->people);
    }


    public function runPeopleData()
    {
        // comment the below to NOT wipe the table clean before populating
        DB::table('people_data')->delete();

        $this->people_data = array(
            ['person_id' => $this->people[0]['id'], 'type' => 'custom', 'label' => 'phone', 'value' => $this->faker->phoneNumber],
            ['person_id' => $this->people[0]['id'], 'type' => 'custom', 'label' => 'address', 'value' => $this->faker->streetAddress],
            ['person_id' => $this->people[0]['id'], 'type' => 'custom', 'label' => 'company', 'value' => $this->faker->company],
            ['person_id' => $this->people[0]['id'], 'type' => 'custom', 'label' => 'birthday', 'value' => $this->faker->date],

            ['person_id' => $this->people[1]['id'], 'type' => 'custom', 'label' => 'phone', 'value' => $this->faker->phoneNumber],
            ['person_id' => $this->people[1]['id'], 'type' => 'custom', 'label' => 'address', 'value' => $this->faker->streetAddress],
            ['person_id' => $this->people[1]['id'], 'type' => 'custom', 'label' => 'birthday', 'value' => $this->faker->date],

            ['person_id' => $this->people[2]['id'], 'type' => 'custom', 'label' => 'phone', 'value' => $this->faker->phoneNumber]
        );

        // Uncomment the below to run the seeder
        DB::table('people_data')->insert($this->people_data);
    }

}

