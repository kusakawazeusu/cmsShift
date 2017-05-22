<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberacctranslistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memberacctranslist', function(Blueprint $table)
		{
			$table->integer('TransNo')->primary();
			$table->string('MemberNo', 6)->nullable();
			$table->string('SectionNo', 2)->nullable();
			$table->string('SessionNo', 4)->nullable();
			$table->dateTime('ModifyTime')->nullable();
			$table->integer('OperatorID')->nullable();
			$table->decimal('Point', 15, 0)->nullable();
			$table->integer('PointType')->nullable();
			$table->integer('Behavior')->nullable();
			$table->dateTime('PointExpireDate')->nullable();
			$table->integer('PointExpireFlag')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('memberacctranslist');
	}

}
