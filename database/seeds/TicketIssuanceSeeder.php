<?php

use Illuminate\Database\Seeder;
use App\models\ticketissuance as ticketissuance;
class TicketIssuanceSeeder extends Seeder
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
        ticketissuance::truncate();
        foreach(range (1,150) as $number)
        {
            ticketissuance::create ([
                'MachineTKTSeqNo'=>$faker->numberBetween($min = 1,$max = 150),
                'Validation_Code'=>$faker->numerify('##-####-####-####-####'),
                'Issued'=>$faker->dateTime($max = 'now'),
                'Amount'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999999999.99),
                'Paid_Void_Flag'=>'Paid',
                'Paid_Date'=>$faker->dateTime($max = 'now'),
            ]);
        }
    }
}
