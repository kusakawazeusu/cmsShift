<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class period extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
		
		for($i=105;$i<148;$i++)
		{
			$mnum = DB::table('Period')->where('id',$i)->value('Mnum');

			DB::table('Period')->where('id',$i+44)
							   ->update([
									'Mnum' => $mnum
							   ]);
		}
        
        
    }
}
