<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembercardtranslistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('membercardtranslist', function(Blueprint $table)
		{
			$table->integer('TransSeqNo')->primary();
			$table->string('CardSeqNo', 10)->nullable();
			$table->string('MemberNo', 6)->nullable();
			$table->string('SectionNo', 2)->nullable();
			$table->integer('SessionNo')->nullable();
			$table->dateTime('ModifyTime')->nullable();
			$table->string('Behavior', 4)->nullable();
			$table->integer('OperatorID')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('membercardtranslist');
	}

}
