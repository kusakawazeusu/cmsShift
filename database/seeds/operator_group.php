<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;




class operator_group extends Seeder
{

    public function run()
    {
    	$faker = Faker::create();
    	
    	for($i=0;$i<5;$i++)
    	{
    		if($i==0)	$gname="實習生";
    		if($i==1)	$gname="營業員";
    		if($i==2)	$gname="主管";
    		if($i==3)	$gname="高階主管";
    		if($i==4)	$gname="管理員";


	        DB::table('OperatorGroup')->insert([
	            'GroupName' => $gname,
	            'Active' => '1',
	            'MaxTKTIssueAmount' => $faker->randomNumber($nbDigits = 5),
	            'MaxTKTValidAmount' => $faker->randomNumber($nbDigits = 5),
	            'MaxTKTVoidAmount' => $faker->randomNumber($nbDigits = 5),
	            'MaxTKTOverrideLimitAmount' => $faker->randomNumber($nbDigits = 5),
	            'XtraCreditAdd' => $faker->randomNumber($nbDigits = 5),
	            'RewardPointAdd' => $faker->randomNumber($nbDigits = 2),
	            'XtraCreditSub' => $faker->randomNumber($nbDigits = 5),
	            'RewardPointSub' => $faker->randomNumber($nbDigits = 2),
	            'PrivilegeOfFunctions0' => $faker->boolean,
	            'PrivilegeOfFunctions1' => $faker->boolean,
	            'PrivilegeOfFunctions2' => $faker->boolean,
	            'PrivilegeOfFunctions3' => $faker->boolean,
	            'PrivilegeOfFunctions4' => $faker->boolean,
	            'PrivilegeOfFunctions5' => $faker->boolean,
	            'PrivilegeOfFunctions6' => $faker->boolean,
	            'PrivilegeOfFunctions7' => $faker->boolean,
	        ]);
    	}
	        DB::table('OperatorGroup')->insert([
	        	'GroupID' => '666',
	            'GroupName' => 'Testing',
	            'Active' => '1',
	            'MaxTKTIssueAmount' => $faker->randomNumber($nbDigits = 5),
	            'MaxTKTValidAmount' => $faker->randomNumber($nbDigits = 5),
	            'MaxTKTVoidAmount' => $faker->randomNumber($nbDigits = 5),
	            'MaxTKTOverrideLimitAmount' => $faker->randomNumber($nbDigits = 5),
	            'XtraCreditAdd' => $faker->randomNumber($nbDigits = 5),
	            'RewardPointAdd' => $faker->randomNumber($nbDigits = 2),
	            'XtraCreditSub' => $faker->randomNumber($nbDigits = 5),
	            'RewardPointSub' => $faker->randomNumber($nbDigits = 2),
	            'PrivilegeOfFunctions0' => '1',
	            'PrivilegeOfFunctions1' => '1',
	            'PrivilegeOfFunctions2' => '1',
	            'PrivilegeOfFunctions3' => '1',
	            'PrivilegeOfFunctions4' => '1',
	            'PrivilegeOfFunctions5' => '1',
	            'PrivilegeOfFunctions6' => '1',
	            'PrivilegeOfFunctions7' => '1',
	            ]);
    }
}
