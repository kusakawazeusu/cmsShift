<?php

use Illuminate\Database\Seeder;
use App\models\validation;
class ValidationSeeder extends Seeder
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
        validation::truncate();
        foreach(range (1,150) as $number)
        {
        	$date = $faker->dateTime($max = 'now');
            validation::insert ([
                'Validation_Code'=>$faker->numerify('##-####-####-####-####'),
                'Issued'=>$date,
                'Issued_by'=>20000 + $faker->numberBetween($min = 0, $max = 5),
                'Amount'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999.99),
                'Paid_Date'=>$date,
            ]);
        }
    }
}
