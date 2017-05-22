<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class sessions_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        /*
        // Session
        for($i=0;$i<20;$i++)
        {
        	$date = '2017-01-'.$faker->numberBetween($min=11,$max=20);

        	DB::table('Sessions')->insert([
	            'SessionDate' => $date,
	            'SessionOpen' => $date." ".$faker->time($format = 'H:i'),
	            'SessionClose' => $date." ".$faker->time($format = 'H:i'),
	            'OpenBy' => $faker->numberBetween($min=1,$max=11),
	            'ClodeBy' => $faker->numberBetween($min=1,$max=11),
	            'SectionName' => $faker->randomLetter.$faker->randomLetter,
	            'SystemTKTPaid' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 10000),
	            'SystemTKTIssued' => $faker->numberBetween($min=1000,$max=100000),
	            'SystemTKTVoid' => $faker->numberBetween($min=1000,$max=100000),
	            'ActualTKTPaid' => $faker->numberBetween($min=1000,$max=100000),
	            'ActualTKTIssued' => $faker->numberBetween($min=1000,$max=100000),
	            'ActualTKTVoid' => $faker->numberBetween($min=1000,$max=100000),
	            'VarianceAmt' => $faker->numberBetween($min=100,$max=1000),
	            'LastModifyTime' => $date." ".$faker->time($format = 'H:i'),
	            'TKTTransSeqNo' => '0',
	            'Status' => '0',
	            'Accept' => '0',
        	]);
        }
		*/

		DB::table('users')->insert([
			'name' => 'admin',
			'email' => 'b10115013@mail.ntust.edu.tw',
			'password' => Hash::make('123123'),
			 ]);
    }
}
