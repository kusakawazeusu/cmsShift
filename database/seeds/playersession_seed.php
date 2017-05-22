<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class playersession_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Session
        for($i=0;$i<20;$i++)
        {
        	$date = '2017-01-'.$faker->numberBetween($min=11,$max=20);

        	DB::table('PlayerSession')->insert([
        		'SessionNo' => $i,
	            'SectionNo' => strtoupper($faker->randomLetter.$faker->randomLetter),
	            'TotalPointAdd' => $faker->numberBetween($min=1000,$max=100000),
	            'TotalPointSub' => $faker->numberBetween($min=1000,$max=100000),
	            'TotalXtraAdd' => $faker->numberBetween($min=1000,$max=100000),
	            'TotalXtraSub' => $faker->numberBetween($min=1000,$max=100000),
                'SessionDate' => $date,
	            'OpenTime' => $date." ".$faker->time($format = 'H:i'),
	            'CloseTime' => $date." ".$faker->time($format = 'H:i'),
	            'Accept' => '0',
        	]);
        }

    }
}
