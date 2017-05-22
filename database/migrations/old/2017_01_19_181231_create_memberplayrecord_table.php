<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberplayrecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memberplayrecord', function(Blueprint $table)
		{
			$table->integer('TransNo')->nullable();
			$table->string('MemberNo', 6)->nullable();
			$table->string('SectionNo', 2)->nullable();
			$table->integer('Mnum')->nullable();
			$table->string('Location', 8)->nullable();
			$table->dateTime('StartTime')->nullable();
			$table->dateTime('EndTime')->nullable();
			$table->decimal('CoinIn', 20, 0)->nullable();
			$table->decimal('CoinOut', 20, 0)->nullable();
			$table->integer('Games')->nullable();
			$table->decimal('Jackpot', 20, 0)->nullable();
			$table->decimal('BillsIn', 20, 0)->nullable();
			$table->decimal('AverageBet', 20, 0)->nullable();
			$table->decimal('Win', 20, 0)->nullable();
			$table->decimal('XCUsed', 20, 0)->nullable();
			$table->decimal('XCEarned', 20, 0)->nullable();
			$table->decimal('RPointUsed', 20, 0)->nullable();
			$table->decimal('RPointEarned', 20, 0)->nullable();
			$table->char('AbandonCard', 1)->nullable();
			$table->dateTime('AccountingDate')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('memberplayrecord');
	}

}
