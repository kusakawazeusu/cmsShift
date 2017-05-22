<?php

use Illuminate\Database\Seeder;
use App\models\arcade_game_type_group;

class arcade_game_type_group_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*$faker = \Faker\Factory::create();
        DB::table('GameTypeGroup')->truncate();
        foreach(range (1,10) as $number)
        {
            arcade_game_type_group::create ([
            	'GroupID'=>$faker->unique()->numberBetween($min = 1, $max = 10),
            	'Description'=>$faker->unique()->word(),
            	'Rate'=>$faker->numberBetween($min = 1, $max = 100),
            	'SubPointShareRate'=>$faker->numberBetween($min = 1, $max = 100),
            	'SubPointEnable'=>$faker->numberBetween($min = 0, $max = 1)
            ]);
        }
        */

        $faker = \Faker\Factory::create();

        for($i=0;$i<100;$i++)
        {
            DB::table('GameType')->where('id',$i)
                                 ->update([
                                    'GameDesc' => $faker->randomElement( $array = array('Hexbreaker','Qin Empire','Test Slot 1','Test Slot 2','Test Slot 3','Test Slot 4','Test Slot 5','Test Slot 6') )
                                 ]);
        }
    }
}
