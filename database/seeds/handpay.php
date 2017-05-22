<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class handpay extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<2000;$i++)
        {
            $faker = Faker::create();
            $randomClass = DB::table('OperatorClass')->inRandomOrder()->first();

            DB::table('MemberCashlessTrans')->insert([
                'MemberNo' => $faker->numberBetween( $min=1,$max=999 ),
                'SectionNo' => $faker->numberBetween( $min=1,$max=999 ),
                'SessionNo' => $randomClass->ClassID,
                'TransTime' => $faker->dateTimeThisMonth($max = 'now'),
                'OperatorID' => $faker->numberBetween( $min=1,$max=19 ),
                'TransType' => $faker->numberBetween( $min=0,$max=4 ),
                'Amount' => $faker->numberBetween( $min=1,$max=9999 ),
                'OldBalance' => $faker->numberBetween( $min=1,$max=99999 ),
                'NewBalance' => $faker->numberBetween( $min=1,$max=99999 ),
                'Location' => $faker->numberBetween( $min=1,$max=999 ),
                'Success' => $faker->numberBetween( $min=0,$max=1 )
            ]);
        }
    }
}
