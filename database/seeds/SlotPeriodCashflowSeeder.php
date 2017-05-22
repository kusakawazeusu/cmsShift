<?php

use Illuminate\Database\Seeder;
use App\models\slotperiodcashflow;
class SlotPeriodCashflowSeeder extends Seeder
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
        slotperiodcashflow::truncate();
        foreach(range (1,150) as $number)
        {
            slotperiodcashflow::insert ([
            	'Period'=>$faker->date($format = 'Y-m-d', $max = 'now'),
            	'Coin_In' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Coin_Out' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Meter_Jackpot' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Net_Win' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Issue' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Validation' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Void' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Handpay' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Cashflow' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Soft_Drop' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Cashflow' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Total_Cash_Received' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
            	'Variance' =>$faker->randomFloat($nbMaxDecimals = 2, $min = -9999.99, $max = 9999.99),
            ]);
        }
    }
}
