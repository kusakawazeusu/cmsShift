<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberbetlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memberbetlog', function(Blueprint $table)
		{
			$table->integer('LogNo', true);
			$table->string('MemberNo', 6)->nullable();
			$table->string('SectionNo', 2)->nullable();
			$table->dateTime('StartTime')->nullable();
			$table->dateTime('BetLogTime')->nullable();
			$table->integer('RewardPointRate')->nullable();
			$table->integer('LastRewardPoint')->nullable();
			$table->integer('LastRewardBet')->nullable();
			$table->decimal('CoinIn', 20, 0)->nullable();
			$table->decimal('CoinOut', 20, 0)->nullable();
			$table->integer('Games')->nullable();
			$table->decimal('Jackpot', 20, 0)->nullable();
			$table->decimal('BillsIn', 20, 0)->nullable();
			$table->decimal('XCUsed', 20, 0)->nullable();
			$table->decimal('XCEarned', 20, 0)->nullable();
			$table->decimal('RPointUsed', 20, 0)->nullable();
			$table->decimal('RPointEarned', 20, 0)->nullable();
			$table->decimal('XCLeft', 20, 0)->nullable();
			$table->decimal('RPointLeft', 20, 0)->nullable();
			$table->decimal('XCNotUsed', 20, 0)->nullable();
			$table->dateTime('AccoutingDate')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('memberbetlog');
	}

}
