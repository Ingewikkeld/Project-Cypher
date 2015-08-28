<?php

/**
 * To seed the database, execute the following commands:
 * $ composer dump-autoload
 * $ php artisan db:seed
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder {
    var $faker;
    var $people;
    var $people_data;

    public function run()
    {
        // use the factory to create a Faker\Generator instance
        $this->faker = Faker\Factory::create();

        $this->runPeople();
        $this->runPeopleData();
        $this->runPeopleTags();
//        $this->run();
    }

    public function runPeople()
    {
        // comment the below to NOT wipe the table clean before populating
        DB::table('people')->delete();

        $this->people = array(
            ['id' => $this->faker->uuid, 'name' => 'Frank van den Brink', 'canonical' => 'frankvandenbrink'],
            ['id' => $this->faker->uuid, 'name' => 'Ramon de la Fuente', 'canonical' => 'ramondelafuente'],
            ['id' => $this->faker->uuid, 'name' => 'Mike van Riel', 'canonical' => 'mikevanriel']
        );

        // run the seeder
        DB::table('people')->insert($this->people);
    }


    public function runPeopleData()
    {
        // comment the below to NOT wipe the table clean before populating
        DB::table('people_data')->delete();

        $this->people_data = array(
            # Frank
            ['id' => $this->faker->uuid, 'person_id' => $this->people[0]['id'], 'type' => 'custom', 'label' => 'phone', 'value' => '+31 88 045 1000'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[0]['id'], 'type' => 'custom', 'label' => 'address', 'value' => 'De Friese Poort 9, 1823 BP Alkmaar'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[0]['id'], 'type' => 'custom', 'label' => 'birthday', 'value' => '12-12-1983'],

            ['id' => $this->faker->uuid, 'person_id' => $this->people[0]['id'], 'type' => 'custom', 'label' => 'tweet', 'value' => "I’ve never been so eager to play a game https://www.youtube.com/watch?v=MprR03CfyDA …"],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[0]['id'], 'type' => 'custom', 'label' => 'tweet', 'value' => "Apparently my phone has left me. Or it was stolen."],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[0]['id'], 'type' => 'custom', 'label' => 'tweet', 'value' => "Got an 8 hour slip course for Father's Day :)"],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[0]['id'], 'type' => 'custom', 'label' => 'tweet', 'value' => "A broader Meetup focussed on being a better problem solver and craftsman as opposed to being a programmer of a particular language. 2/2"],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[0]['id'], 'type' => 'custom', 'label' => 'tweet', 'value' => "Would anybody here be interested in meetups on how to be a better developer. How to sharpen your skills, personal growth, etc? 1/2"],

            ['id' => $this->faker->uuid, 'person_id' => $this->people[0]['id'], 'type' => 'email', 'label' => 'email', 'value' => 'frank@pragmatist.nl'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[0]['id'], 'type' => 'custom', 'label' => 'company', 'value' => 'Pragmatist'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[0]['id'], 'type' => 'url', 'label' => 'work', 'value' => 'http://pragmatist.nl'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[0]['id'], 'type' => 'url', 'label' => 'twitter', 'value' => 'https://twitter.com/fvdb'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[0]['id'], 'type' => 'url', 'label' => 'facebook', 'value' => 'https://www.facebook.com/fvdb1'],

            #'id' => $this->faker->uuid,  Ramon
            ['id' => $this->faker->uuid, 'person_id' => $this->people[1]['id'], 'type' => 'url', 'label' => 'work', 'value' => 'http://future500.nl'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[1]['id'], 'type' => 'url', 'label' => 'twitter', 'value' => 'https://twitter.com/f_u_e_n_t_e'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[1]['id'], 'type' => 'custom', 'label' => 'phone', 'value' => '085-877387'],

            #'id' => $this->faker->uuid,  Mike
            ['id' => $this->faker->uuid, 'person_id' => $this->people[2]['id'], 'type' => 'url', 'label' => 'twitter', 'value' => 'https://twitter.com/mvriel'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[2]['id'], 'type' => 'url', 'label' => 'facebook', 'value' => 'http://facebook.com/mvriel'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[2]['id'], 'type' => 'url', 'label' => 'github', 'value' => 'https://github.com/mvriel'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[2]['id'], 'type' => 'url', 'label' => 'blog', 'value' => 'http://blog.naenius.com/'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[2]['id'], 'type' => 'url', 'label' => 'personal', 'value' => 'http://mikevanriel.com/'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[2]['id'], 'type' => 'email', 'label' => 'personal', 'value' => 'me@mikevanriel.com'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[2]['id'], 'type' => 'date', 'label' => 'wedding date', 'value' => '2007-05-31'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[2]['id'], 'type' => 'url', 'label' => 'work', 'value' => 'http://ingewikkeld.net']
        );

        // Uncomment the below to run the seeder
        DB::table('people_data')->insert($this->people_data);
    }

    public function runPeopleTags()
    {
        $this->tags = [];

        foreach($this->people as $person) {
            array_push(
                $this->tags,
                ['person_id' => $person['id'], 'tag' => 'wecamp2015']
            );
            array_push(
                $this->tags,
                ['person_id' => $person['id'], 'tag' => 'wecamp']
            );
        }

        DB::table('tags')->insert($this->tags);
    }

}

