<?php

use Illuminate\Database\Seeder;
use App\Team;
use Faker\Generator as Faker;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

      // $genders = ['AC','F.c','C.F.','FC.','SS', 'A.C'];

      for ($i=0; $i < 3; $i++) {

        $new_team = new Team;

        $data = [
            'name' =>$faker->word,  
            'town' => $faker->city,
            'address' =>$faker->address,
            'phone' =>$faker->phoneNumber,
        ];

        $new_team->fill($data);

        $new_team->save();
      }
    }
}
