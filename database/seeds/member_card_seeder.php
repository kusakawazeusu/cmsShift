<?php

use Illuminate\Database\Seeder;
use App\Models\member_card_model;

class member_card_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create();
        DB::table('membercard')->truncate();
        foreach(range (1,100) as $number)
        {
            member_card_model::create ([
            	'SectionNo'=>$faker->lexify('??'),
            	'CardSeqNo'=>$faker->bothify('??########'),
            	'CardStatus'=>$faker->numberBetween($min = 0, $max = 1)
            ]);
        }
    }
}
