<?php

use Illuminate\Database\Seeder;
use App\Models\member_model;

class member_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create();
        DB::table('GameTypeGroup')->truncate();
        foreach(range (1,100) as $number)
        {
            member_model::create ([
            	'SectionNo'=>$faker->lexify('??'),
            	'MemberName'=>$faker->name(),
            	'MemberID'=>$faker->bothify('?#########'),
            	'AffiliationTime'=>$faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
            	'Birthday'=>$faker->date($format = 'Y/m/d', $max = 'now'),
            	'Address'=>$faker->address(),
            	'CellPhone'=>$faker->numerify('####').'-'.$faker->numerify('######'),
            	'TelePhone'=>$faker->numerify('##').'-'.$faker->numerify('#######'),
            	'MemberStatus'=>$faker->numberBetween($min = 0, $max = 2),
            	'Rank'=>$faker->numberBetween($min = 0, $max = 2),
            	'XCEnable'=>$faker->numberBetween($min = 0, $max = 1),
            	'RPEnable'=>$faker->numberBetween($min = 0, $max = 1),
            	'Password'=>$faker->numerify('####'),
            	'updated_at'=>$faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
            	'Email'=>$faker->email()
            ]);
        }

    }
}
