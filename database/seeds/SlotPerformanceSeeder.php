<?php

use Illuminate\Database\Seeder;
use App\models\slotperformance;
class SlotPerformanceSeeder extends Seeder
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
        slotperformance::truncate();
        foreach(range (1,150) as $number)
        {
            slotperformance::insert ([
            	'Mnum' =>990000+$number,
            	'Location' =>$faker->numerify('AZ0###'),
            	'Denom' =>$faker->numberBetween($min = 1,$max = 4),
            	'Description' =>$faker->randomElement($array = array ('QinEmpire','Hexbreaker','testMachine')),
            	'Coin_In' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Coin_Out' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Xcredit' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Meter_Handpay' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Meter_Jackpot' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Progressive' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Actual_Handpay' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Soft_Drop' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Net_Win' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            ]);
        }
    }
}
