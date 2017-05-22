<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class memberbetlog extends Seeder
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
            $mnum = DB::table('Machine')->inRandomOrder()->first();

            DB::table('memberbetlog')->insert([
                'id' => $i,
                'MemberNo' => $faker->numberBetween( $min=1000,$max=9999 ),
                'SectionNo' => 'kk',
                'StartTime' => $faker->dateTimeThisMonth(),
                'BetLogTime' => $faker->dateTimeThisMonth(),
                'RewardPointRate' => '800',
                'LastRewardPoint' => '1',
                'CoinIn' => $faker->numberBetween( $min=10000,$max=99999 ),
                'CoinOut' => $faker->numberBetween( $min=10000,$max=99999 ),
                'Games' => '1',
                'Jackpot' => $faker->numberBetween( $min=10000,$max=99999 ),
                'BillsIn' => $faker->numberBetween( $min=10000,$max=99999 ),
                'XCUsed' => $faker->numberBetween( $min=10000,$max=99999 ),
                'XCEarned' => $faker->numberBetween( $min=10000,$max=99999 ),
                'RPointUsed' => $faker->numberBetween( $min=10000,$max=99999 ),
                'RPointEarned' => $faker->numberBetween( $min=10000,$max=99999 ),
                'XCLeft' => $faker->numberBetween( $min=10000,$max=99999 ),
                'RPointLeft' => $faker->numberBetween( $min=10000,$max=99999 ),
                'AccountingSession' => '20',
                'Mnum' => $mnum->MNum
            ]);
            
        }
    }
}
