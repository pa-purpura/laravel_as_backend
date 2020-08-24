<?php

use Illuminate\Database\Seeder;
use App\Agent;
use Faker\Generator as Faker;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 1; $i++) {

        $new_agent = new Agent;

        $data = [
            'name' => $faker->firstNameMale,
            'lastname' => $faker->lastname,
            'country' =>$faker->country,
            'address' =>$faker->address,
            'phone' =>$faker->phoneNumber,
        ];

        $new_agent->fill($data);

        $new_agent->save();
      }
    }
}
