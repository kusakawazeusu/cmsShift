<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class OperatorClass extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0;$i<30;$i++)
        {
            for($class=0;$class<3;$class++)
            {
                if( $class == 0 )
                {
                    $startDate = mktime(8,0,0,5,$i+1,2017);
                    $endDate = mktime(16,0,0,5,$i+1,2017);
                    $className = '201705'.($i+1)."0800";
                }
                else if( $class == 1 )
                {
                    $startDate = mktime(16,0,0,5,$i+1,2017);
                    $endDate = mktime(0,0,0,5,$i+1,2017);
                    $className = '201705'.($i+1)."1600";
                }
                else
                {
                    $startDate = mktime(0,0,0,5,$i+1,2017);
                    $endDate = mktime(8,0,0,5,$i+1,2017);
                    $className = '201705'.($i+1)."0000";
                }

                DB::table('OperatorClass')->insert([
                    'OperatorID' => '12',
                    'SectionName' => 'RE',
                    'ClassID' => $className,
                    'OpenTime' => date("Y-m-d H:i:s",$startDate),
                    'CloseTime' => date("Y-m-d H:i:s",$endDate),
                    'HandpayLimit' => '20000',
                    'TotalHandpay' => '0'
                ]);
            }
        }
    }
}
