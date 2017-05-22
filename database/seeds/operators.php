<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class operators extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $faker = Faker::create();

        for($i=0;$i<=10;$i++)
        {
        	DB::table('Operator')->insert([
        		'OperatorName' => $faker->name,
        		'password' => Hash::make('123123'),
        		'GroupID' => $faker->numberBetween($min=1,$max=5),
        		'Active' => '1',
        	]);
        }
        
        DB::table('Operator')->insert([
            'OperatorName' => 'GameLab',
            'password' => Hash::make('GameLab'),
            'GroupID' => '666',
            'Active' => '1',
        ]);

        DB::table('Operator')->insert([
            'OperatorName' => 'Guest1',
            'password' => Hash::make('Guest1'),
            'GroupID' => '666',
            'Active' => '1',
        ]);
    }
}
