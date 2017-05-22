<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembertranslistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('membertranslist', function(Blueprint $table)
		{
			$table->integer('TransSeqNo')->primary();
			$table->string('MemberNo', 6)->nullable();
			$table->string('SectionNo', 2)->nullable();
			$table->integer('SessionNo')->nullable();
			$table->dateTime('ModifyTime')->nullable();
			$table->integer('Behavior')->nullable();
			$table->integer('OperatorID')->nullable();
			$table->string('MemberName', 30)->nullable();
			$table->string('MemberID', 10)->nullable();
			$table->dateTime('AffiliationTime')->nullable();
			$table->dateTime('Birthday')->nullable();
			$table->string('Address', 100)->nullable();
			$table->string('CellPhone', 12)->nullable();
			$table->string('TelePhone', 12)->nullable();
			$table->integer('MemberStatus')->nullable();
			$table->integer('Rank')->nullable();
			$table->integer('XCEnable')->nullable();
			$table->integer('RPEnable')->nullable();
			$table->string('Password', 4)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('membertranslist');
	}

}
