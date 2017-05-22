<?php

use Illuminate\Database\Seeder;
use App\models\sessionclose;

class SessionCloseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        sessionclose::truncate();
        foreach(range (1,150) as $number)
        {
        	$Issued_by_who =990000 + $faker->numberBetween($min = 0, $max = 5);
        	$date = $faker->dateTime($max = 'now');
            sessionclose::insert ([
            	'session'=>$number,
            	'issuance'=>$faker->numberBetween($min = 0,$max = 3000),
            	'void'=>$faker->numberBetween($min = 0,$max = 3000),
            	'redemption'=>$faker->numberBetween($min = 0,$max = 3000),
            	'handpay'=>$faker->numberBetween($min = 0,$max = 3000),
            	'net_cash_flow'=>$faker->numberBetween($min = 0,$max = 3000),
            ]);
        }
    }
}
