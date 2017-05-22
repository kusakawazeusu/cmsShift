<?php

use Illuminate\Database\Seeder;
use App\models\softdropvariance;
class SoftDropVarianceSeeder extends Seeder
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
        softdropvariance::truncate();
        foreach(range (1,150) as $number)
        {
        	$MeterSoftDrop =$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99);
        	$ActualSoftDrop=$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = $MeterSoftDrop);
            softdropvariance::insert ([
            	'Mnum'=>990000+$number,
            	'Location'=>$faker->numerify('AZ0###'),
            	'Denom' =>$faker->numberBetween($min = 1,$max = 4),
            	'Description'=>'TestSlot',
            	'MeterSoftDrop'=>$MeterSoftDrop,
            	'ActualSoftDrop'=>$ActualSoftDrop,
            	'Variance'=>$MeterSoftDrop-$ActualSoftDrop,
            	'Percentage'=>$faker->numberBetween($min = 1,$max = 100),
            ]);
        }
    }
}
