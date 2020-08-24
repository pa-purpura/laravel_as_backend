<?php

use Illuminate\Database\Seeder;
use App\Player;
use Faker\Generator as Faker;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

      for ($i=0; $i < 200; $i++) {

        $new_player = new Player;

        $data = [
            'name' =>  $faker->firstNameMale,
            'lastname' => $faker->lastname,
            'age' => rand(18, 35),
            'country' =>$faker->country,
            'contract_expiry' =>$faker->dateTimeBetween($startDate = '+1 year', $endDate = '+3 years'),
            'team_id' =>rand(1, 10),
            'agent_id' =>rand(1, 9),
        ];

        $new_player->fill($data);

        $new_player->save();
      }
    }
}
