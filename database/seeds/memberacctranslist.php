<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class memberacctranslist extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0;$i<5500;$i++)
        {
            $randomSession = DB::table('OperatorClass')->inRandomOrder()->first();
            $randomMachine = DB::table('Machine')->inRandomOrder()->first();

            DB::table('memberacctranslist')->insert([
                'TransNo' => $i,
                'MemberNo' => $faker->numberBetween( $min=1000,$max=9999 ),
                'SectionNo' => 'kk',
                'SessionNo' => $randomSession->ClassID,
                'ModifyTime' => date('Y-m-d H-i-s',strtotime($randomSession->OpenTime) + $faker->numberBetween( $min=1000,$max=30000)),
                'OperatorID' => '12',
                'Point' => $faker->numberBetween( $min=1000,$max=9999 ),
                'PointType' => $faker->numberBetween( $min=0,$max=1 ),
                'Behavior' => $faker->numberBetween( $min=0,$max=4 ),
                'PointExpireDate' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()),
                'PointExpireFlag' => '0'
            ]);
            
        }
    }
}
