<?php

use Illuminate\Database\Seeder;
use App\models\arcade_game_type;

class arcade_game_type_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create();
        DB::table('GameType')->truncate();
        foreach(range (1,100) as $number)
        {
            arcade_game_type::create ([
            	'GameID'=>$faker->unique()->numberBetween($min = 1, $max = 100),
            	'GameDesc'=>$faker->unique()->word(),
            	'GroupId'=>$faker->numberBetween($min = 1, $max = 10),
            	'RewardPoint'=>$faker->numberBetween($min = 1, $max = 100),
            	'RewardRate'=>$faker->numberBetween($min = 1, $max = 100)
            ]);
        }
    }
}
