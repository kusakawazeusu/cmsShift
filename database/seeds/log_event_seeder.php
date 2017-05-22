<?php

use Illuminate\Database\Seeder;
use App\log_excel_export;

class log_event_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$code_array = array(
					'0x11' , 
					'0x12' , 
					'0x13' , 
					'0x14' , 
					'0x15' , 
					'0x16' , 
					'0x19' , 
					'0x1A' , 
					'0x1B' , 
					'0x1C' , 
					'0x1D' , 
					'0x1E' , 
					'0x27' , 
					'0x28' , 
					'0x29' , 
					'0x2B' , 
					'0x31' , 
					'0x32' , 
					'0x33' , 
					'0x3C' , 
					'0x4F' , 
					'0x60' , 
					'0x61' , 
					'0x66' , 
					'0x67' , 
					'0x68' , 
					'0x69' , 
					'0x6A' , 
					'0x6B' , 
					'0x6C' , 
					'0x6D' , 
					'0x6E' , 
					'0x6F' , 
					'0x7A' , 
					'0x7E' , 
					'0x7F' , 
					'0x82' , 
					'0x83' , 
					'0x84' , 
					'0x85' , 
					'0x86' , 
					'0x99');
		
        $faker = \Faker\Factory::create();
        DB::table('LogEvent')->truncate();
		
        foreach(range (1,600000) as $number)
        {
			$temp_time = $faker->dateTime($max = 'now', $timezone = date_default_timezone_get());
			$temp_number = $faker->numberBetween($min = 0, $max = 41);
			
            log_excel_export::create ([
            	'code'=>$code_array[$temp_number],
				'created_at'=>$temp_time,
				'updated_at'=>$temp_time
            ]);
        }
    }
}
