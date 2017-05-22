<?php

use Illuminate\Database\Seeder;
use App\models\Arcade;

class arcade_machine_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
    	$faker = \Faker\Factory::create();
        DB::table('machine')->truncate();
        foreach(range (1,100) as $number)
        {
            $temp_SectionName = $faker->lexify('??');
            $temp_BankNo = $faker->numerify('##');
            $temp_SeqNo = $faker->numerify('##');
            arcade::create ([
            	'Mnum'=>$faker->numerify('######'),
            	'IPAddress'=>$faker->ipv4,
            	'SerialNum'=>$faker->bothify('??################'),
            	'SectionName'=>$temp_SectionName,
            	'BankNo'=>$temp_BankNo,
            	'SeqNo'=>$temp_SeqNo,
            	'Location'=>$temp_SectionName.$temp_BankNo.$temp_SeqNo,
            	'GameType'=>$faker->numberBetween($min = 1, $max = 100),
            	'DenomCode'=>$faker->numberBetween($min = 1, $max = 30),
            	'PayTable'=>$faker->bothify('?######'),
            	'Status'=>$faker->numberBetween($min = 0, $max = 2)
            ]);
        }
    }
}