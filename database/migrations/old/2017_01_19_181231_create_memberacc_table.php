<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberaccTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memberacc', function(Blueprint $table)
		{
			$table->integer('MemberNo')->primary();
			$table->string('SectionNo', 2)->nullable();
			$table->integer('RewardPoint')->nullable();
			$table->decimal('XtraPoint', 15, 0)->nullable();
			$table->decimal('OPAddXCredit', 15, 0)->nullable();
			$table->decimal('EGMAddXCredit', 15, 0)->nullable();
			$table->integer('RewardPointRate')->nullable();
			$table->integer('LastRewardPoint')->nullable();
			$table->integer('LastRewardBet')->nullable();
			$table->integer('ReservedPoint')->nullable();
			$table->decimal('ReservedXTraCredit', 15, 0)->nullable();
			$table->integer('Status')->nullable();
			$table->integer('CurMNum')->nullable();
			$table->string('CurLocation', 8)->nullable();
			$table->dateTime('CurStartTime')->nullable();
			$table->decimal('CurLockXCredit', 15, 0)->nullable();
			$table->decimal('CurLockXCreditByOP', 15, 0)->nullable();
			$table->decimal('CurLockXCreditByEGM', 15, 0)->nullable();
			$table->integer('CurLockPoint')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('memberacc');
	}

}
