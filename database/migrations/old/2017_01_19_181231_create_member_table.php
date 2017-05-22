<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member', function(Blueprint $table)
		{
			$table->increments('MemberNo');
			$table->string('SectionNo', 2)->nullable()->default('00');
			$table->string('MemberName', 30)->nullable();
			$table->string('MemberID', 10)->nullable();
			$table->dateTime('AffiliationTime')->nullable();
			$table->dateTime('Birthday')->nullable();
			$table->string('Address', 100)->nullable();
			$table->string('CellPhone', 12)->nullable();
			$table->string('TelePhone', 12)->nullable();
			$table->string('Memo', 200)->nullable();
			$table->integer('MemberStatus')->nullable()->default(1);
			$table->string('MemberImage')->nullable();
			$table->integer('Rank')->nullable()->default(0);
			$table->integer('XCEnable')->nullable()->default(0);
			$table->integer('RPEnable')->nullable()->default(0);
			$table->string('Password', 4)->nullable();
			$table->dateTime('updated_at')->nullable();
			$table->string('Email')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member');
	}

}
