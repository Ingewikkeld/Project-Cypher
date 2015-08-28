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

        $this->people = [
            0 => ['id' => $this->faker->uuid, 'name' => 'Ben Peachey', 'canonical' => 'benpeachey'],
            1 => ['id' => $this->faker->uuid, 'name' => 'Dennis Snijder', 'canonical' => 'dennissnijder'],
            2 => ['id' => $this->faker->uuid, 'name' => 'Dennis de Greef', 'canonical' => 'dennisdegreef'],
            3 => ['id' => $this->faker->uuid, 'name' => 'Edwin Kortman', 'canonical' => 'edwinkortman'],
            4 => ['id' => $this->faker->uuid, 'name' => 'Eli White', 'canonical' => 'eliwhite'],
            5 => ['id' => $this->faker->uuid, 'name' => 'Frank van den Brink', 'canonical' => 'frankvandenbrink'],
            6 => ['id' => $this->faker->uuid, 'name' => 'Henri de Jong', 'canonical' => 'henridejong'],
            7 => ['id' => $this->faker->uuid, 'name' => 'Jasper N. Brouwer', 'canonical' => 'jaspernbrouwer'],
            8 => ['id' => $this->faker->uuid, 'name' => 'Jelrik van Hal', 'canonical' => 'jelrikvanhal'],
            9 => ['id' => $this->faker->uuid, 'name' => 'Jeremy Coates', 'canonical' => 'jeremycoates'],
            10 => ['id' => $this->faker->uuid, 'name' => 'Jerry Verhoef', 'canonical' => 'jerryverhoef'],
            11 => ['id' => $this->faker->uuid, 'name' => 'Joralf Quist', 'canonical' => 'joralfquist'],
            12 => ['id' => $this->faker->uuid, 'name' => 'Mike van Riel', 'canonical' => 'mikevanriel'],
            13 => ['id' => $this->faker->uuid, 'name' => 'Mitchel Verschoof', 'canonical' => 'mitchelverschoof'],
            14 => ['id' => $this->faker->uuid, 'name' => 'Monique Engelage', 'canonical' => 'moniqueengel'],
            15 => ['id' => $this->faker->uuid, 'name' => 'Pascal de Vink', 'canonical' => 'pascaldevink'],
            16 => ['id' => $this->faker->uuid, 'name' => 'Paul Edenburg', 'canonical' => 'pauledenburg'],
            17 => ['id' => $this->faker->uuid, 'name' => 'Petra Dreiskämper', 'canonical' => 'petradreiskamper'],
            18 => ['id' => $this->faker->uuid, 'name' => 'Pim Widdershoven', 'canonical' => 'pimwiddershoven'],
            19 => ['id' => $this->faker->uuid, 'name' => 'Ramon de la Fuente', 'canonical' => 'ramondelafuente'],
            20 => ['id' => $this->faker->uuid, 'name' => 'Randy Geraads', 'canonical' => 'randygeraads'],
            21 => ['id' => $this->faker->uuid, 'name' => 'Remco Janssen', 'canonical' => 'remcojanssen'],
            22 => ['id' => $this->faker->uuid, 'name' => 'Richard Tuin', 'canonical' => 'richardtuin'],
            23 => ['id' => $this->faker->uuid, 'name' => 'Stefan Koopmanschap', 'canonical' => 'stefankoopmanschap'],
            24 => ['id' => $this->faker->uuid, 'name' => 'Steven de Vries', 'canonical' => 'stevendevries'],
            25 => ['id' => $this->faker->uuid, 'name' => 'Toby Griffiths', 'canonical' => 'tobygriffiths'],
            26 => ['id' => $this->faker->uuid, 'name' => 'Vitalii Levchenko', 'canonical' => 'vitaliilevchenko']
        ];

        // run the seeder
        DB::table('people')->insert($this->people);
    }


    public function runPeopleData()
    {
        // comment the below to NOT wipe the table clean before populating
        DB::table('people_data')->delete();

        $this->people_data = array(
            # Frank
            ['id' => $this->faker->uuid, 'person_id' => $this->people[5]['id'], 'type' => 'custom', 'label' => 'phone', 'value' => '+31 88 045 1000'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[5]['id'], 'type' => 'custom', 'label' => 'address', 'value' => 'De Friese Poort 9, 1823 BP Alkmaar'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[5]['id'], 'type' => 'custom', 'label' => 'birthday', 'value' => '12-12-1983'],

            ['id' => $this->faker->uuid, 'person_id' => $this->people[5]['id'], 'type' => 'custom', 'label' => 'tweet', 'value' => "I’ve never been so eager to play a game https://www.youtube.com/watch?v=MprR03CfyDA …"],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[5]['id'], 'type' => 'custom', 'label' => 'tweet', 'value' => "Apparently my phone has left me. Or it was stolen."],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[5]['id'], 'type' => 'custom', 'label' => 'tweet', 'value' => "Got an 8 hour slip course for Father's Day :)"],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[5]['id'], 'type' => 'custom', 'label' => 'tweet', 'value' => "A broader Meetup focussed on being a better problem solver and craftsman as opposed to being a programmer of a particular language. 2/2"],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[5]['id'], 'type' => 'custom', 'label' => 'tweet', 'value' => "Would anybody here be interested in meetups on how to be a better developer. How to sharpen your skills, personal growth, etc? 1/2"],

            ['id' => $this->faker->uuid, 'person_id' => $this->people[5]['id'], 'type' => 'email', 'label' => 'email', 'value' => 'frank@pragmatist.nl'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[5]['id'], 'type' => 'custom', 'label' => 'company', 'value' => 'Pragmatist'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[5]['id'], 'type' => 'url', 'label' => 'work', 'value' => 'http://pragmatist.nl'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[5]['id'], 'type' => 'url', 'label' => 'twitter', 'value' => 'https://twitter.com/fvdb'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[5]['id'], 'type' => 'url', 'label' => 'facebook', 'value' => 'https://www.facebook.com/fvdb1'],

            #'id' => $this->faker->uuid,  Ramon
            ['id' => $this->faker->uuid, 'person_id' => $this->people[19]['id'], 'type' => 'url', 'label' => 'work', 'value' => 'http://future500.nl'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[19]['id'], 'type' => 'url', 'label' => 'twitter', 'value' => 'https://twitter.com/f_u_e_n_t_e'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[19]['id'], 'type' => 'custom', 'label' => 'phone', 'value' => '085-877387'],

            #'id' => $this->faker->uuid,  Mike
            ['id' => $this->faker->uuid, 'person_id' => $this->people[12]['id'], 'type' => 'url', 'label' => 'twitter', 'value' => 'https://twitter.com/mvriel'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[12]['id'], 'type' => 'url', 'label' => 'facebook', 'value' => 'http://facebook.com/mvriel'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[12]['id'], 'type' => 'url', 'label' => 'github', 'value' => 'https://github.com/mvriel'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[12]['id'], 'type' => 'url', 'label' => 'blog', 'value' => 'http://blog.naenius.com/'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[12]['id'], 'type' => 'url', 'label' => 'personal', 'value' => 'http://mikevanriel.com/'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[12]['id'], 'type' => 'email', 'label' => 'personal', 'value' => 'me@mikevanriel.com'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[12]['id'], 'type' => 'date', 'label' => 'wedding date', 'value' => '2007-05-31'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[12]['id'], 'type' => 'url', 'label' => 'work', 'value' => 'http://ingewikkeld.net'],

            ['id' => $this->faker->uuid, 'person_id' => $this->people[8]['id'], 'type' => 'url', 'label' => 'linkedin', 'value' => 'https://www.linkedin.com/profile/view?id=19762977&authType=NAME_SEARCH&authToken=d3Pt&locale=en_US&trk=tyah&trkInfo=clickedVertical%3Amynetwork%2CclickedEntityId%3A19762977%2CauthType%3ANAME_SEARCH%2Cidx%3A1-1-1%2CtarId%3A1440740589960%2Ctas%3Ajelrik'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[15]['id'], 'type' => 'url', 'label' => 'linkedin', 'value' => 'https://www.linkedin.com/profile/view?id=AAEAAAGLybcBUID1yRoU1lzvpYcC3hDagsmfdFs&authType=name&authToken=7IkL&trk=prof-sb-browse_map-name'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[24]['id'], 'type' => 'url', 'label' => 'linkedin', 'value' => 'https://www.linkedin.com/profile/view?id=AAEAAAL9JvAB1LAAgP4Qs6IE0YtMRQv3YlWIOAk&authType=name&authToken=Iy89&trk=prof-sb-browse_map-name'],
            ['id' => $this->faker->uuid, 'person_id' => $this->people[22]['id'], 'type' => 'url', 'label' => 'linkedin', 'value' => 'https://nl.linkedin.com/in/rtuin'],
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

