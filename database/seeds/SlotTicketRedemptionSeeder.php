<?php

use Illuminate\Database\Seeder;
use App\models\slotticketredemption;


class SlotTicketRedemptionSeeder extends Seeder
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
        slotticketredemption::truncate();
        foreach(range (1,150) as $number)
        {
        	$Issued_by_who =990000 + $faker->numberBetween($min = 0, $max = 5);
        	$date = $faker->dateTime($max = 'now');
            slotticketredemption::insert ([
                'MachineTKTSeqNo'=>$faker->numberBetween($min = 1,$max = 150),
                'Validation_Code'=>$faker->numerify('##-####-####-####-####'),
                'Issued'=>$date,
                'Issued_by'=>$Issued_by_who,
                'Amount'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
                'Validation_by'=>$Issued_by_who,
                'Paid_Date'=>$date,
            ]);
        }
    }
}
