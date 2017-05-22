<?php

use Illuminate\Database\Seeder;
use App\models\slotticketcashout;
class SlotTicketCashoutSeeder extends Seeder
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
        slotticketcashout::truncate();
        foreach(range (1,150) as $number)
        {
        	$Issued_by_who =990000 + $faker->numberBetween($min = 0, $max = 5);
        	$date = $faker->dateTime($max = 'now');
            slotticketcashout::insert ([
                'TktSeq'=>$faker->numberBetween($min = 1,$max = 150),
                'Validation_Code'=>$faker->numerify('##-####-####-####-####'),
                'Issued'=>$date,
                'Issued_by'=>$Issued_by_who,
                'Amount'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
                'Paid_Void_Flag'=>'Paid',
                'Validation_by'=>$Issued_by_who,
                'Paid_Date'=>$date,
            ]);
        }
    }
}
